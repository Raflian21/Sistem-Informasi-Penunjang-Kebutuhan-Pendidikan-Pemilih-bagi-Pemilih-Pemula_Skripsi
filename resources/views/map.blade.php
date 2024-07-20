@extends('navbar')

@section('link_rel')
<link rel="stylesheet" href="map.css"></link>
@endsection

@section('content')
<head>
    <title>Leaflet Map with Search</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
          crossorigin=""/>
    <style type="text/css">
        #map { height: 100vh; }
        #search-panel {
            position: absolute;
            top: 140px;
            left: 60px;
            z-index: 1000;
            background: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        #kelurahan-filter {
            margin-top: 10px;
            margin-bottom: 10px;
            width: 100%;
            padding: 5px;
        }
    </style>
</head>
<body>
<div id="search-panel">
    <select id="kelurahan-filter">
        <option value="">Pilih Kelurahan</option>
        <!-- Opsi kelurahan akan ditambahkan di sini melalui JavaScript -->
    </select>
    <select id="tps-filter">
        <option value="">Pilih Nomor TPS</option>
        <!-- Opsi nomor TPS akan ditambahkan di sini melalui JavaScript -->
    </select>
    <!-- <input type="text" id="search" placeholder="Cari Nomor TPS"> -->
</div>
    <div id="map"></div>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
            crossorigin=""></script>
    <script src="leaflet.ajax.js"></script>

    <script type="text/javascript">
    var map = L.map('map').setView([-7.8806967, 112.4811042], 12);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    function popUp(f, l) {
        var out = [];
        if (f.properties) {
            for (key in f.properties) {
                out.push(key + ": " + f.properties[key]);
            }
            l.bindPopup(out.join("<br />"));
        }
    }

    // Fungsi untuk mengatur gaya default dari GeoJSON layer
    function style(feature) {
        return {
            fillColor: '',
            weight: 2,
            opacity: 1,
            color: '',
            // fillOpacity: 0.7
        };
    }

    // Ikon normal dan ikon highlight untuk marker
    var defaultIcon = new L.Icon({
        iconUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.3.4/images/marker-icon.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var highlightIcon = new L.Icon({
        iconUrl: 'https://upload.wikimedia.org/wikipedia/commons/e/ec/RedDot.svg',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
    });

    var markers = [];
    var kelurahans = new Set(); // Set untuk menyimpan kelurahan unik

    <?php foreach ($data as $value) { ?>
        var marker = L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {icon: defaultIcon})
            .bindPopup("<h5><b>Nomor TPS : <?= $value->notps ?></b></h5><br>Alamat : <?= $value->alamat ?><br>Latitude : <?= $value->latitude ?><br>Longitude : <?= $value->longitude ?><br>Total Pemilih : <?= $value->totalpemilih ?>")
            .addTo(map);

        marker.on('mouseover', function (e) {
            this.setIcon(highlightIcon);
        });

        marker.on('mouseout', function (e) {
            this.setIcon(defaultIcon);
        });

        markers.push({ marker: marker, notps: <?= $value->notps ?>, kelurahan: "<?= $value->kelurahan ?>" });
        kelurahans.add("<?= $value->kelurahan ?>"); // Tambahkan kelurahan ke set
    <?php } ?>

    // Tambahkan kelurahan ke dropdown
    var kelurahanFilter = document.getElementById('kelurahan-filter');
    kelurahans.forEach(function(kelurahan) {
        var option = document.createElement('option');
        option.value = kelurahan;
        option.text = kelurahan;
        kelurahanFilter.appendChild(option);
    });

    // Fungsi untuk menyorot fitur GeoJSON yang diklik
    function highlightFeature(e) {
        var layer = e.target;

        if (layer.setStyle) {
            layer.setStyle({
                weight: 5,
                color: 'red',
                fillOpacity: 0.7
            });

            if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
                layer.bringToFront();
            }
        }
    }

    // Fungsi untuk mengatur kembali gaya ke default ketika tidak lagi disorot
    function resetHighlight(e) {
        var layer = e.target;

        if (layer.setStyle) {
            geojson1.resetStyle(layer);
        }
    }

    // Fungsi untuk menangani klik pada fitur GeoJSON
    function onEachFeature(feature, layer) {
        layer.on({
            click: highlightFeature,
            mouseout: resetHighlight
        });
    }

    var geojson1 = new L.GeoJSON.AJAX(["geojson/BatuBaru2.geojson"], {
        style: style,
        onEachFeature: function (feature, layer) {
            onEachFeature(feature, layer); // Tambahkan event handler klik dan mouseout
            popUp(feature, layer); // Tambahkan popup
        }
    }).addTo(map);

    // Fungsi untuk memuat nomor TPS berdasarkan kelurahan terpilih
    document.getElementById('kelurahan-filter').addEventListener('change', function() {
        var kelurahan = this.value.toLowerCase();
        var bounds = []; // Array untuk menampung batas wilayah kelurahan yang dipilih

        // Kosongkan pilihan nomor TPS sebelumnya
        var selectTPS = document.getElementById('tps-filter');
        selectTPS.innerHTML = '<option value="">Pilih Nomor TPS</option>';

        markers.forEach(function(obj) {
            if (kelurahan === "" || obj.kelurahan.toLowerCase() === kelurahan) {
                obj.marker.addTo(map);
                bounds.push(obj.marker.getLatLng()); // Tambahkan koordinat marker ke array bounds

                // Tambahkan nomor TPS ke dropdown jika belum ada
                var optionExists = Array.from(selectTPS.options).some(option => option.value === obj.notps.toString());
                if (!optionExists) {
                    var option = document.createElement('option');
                    option.value = obj.notps;
                    option.text = 'TPS ' + obj.notps;
                    selectTPS.appendChild(option);
                }
            } else {
                map.removeLayer(obj.marker);
            }
        });

        // Zoom dan pindahkan peta ke wilayah kelurahan yang dipilih
        if (bounds.length > 0) {
            map.fitBounds(bounds, { padding: [150, 150] }); // Zoom peta ke batas wilayah kelurahan yang dipilih
        } else {
            map.setView([-7.8806967, 112.4811042], 14); // Set view kembali ke lokasi awal jika tidak ada kelurahan yang dipilih
        }

        // Highlight wilayah kelurahan yang dipilih
        geojson1.eachLayer(function(layer) {
            if (layer.feature.properties.Kelurahan.toLowerCase() === kelurahan) {
                highlightFeature({ target: layer });
            } else {
                resetHighlight({ target: layer });
            }
        });
    });

    // Fungsi untuk memilih nomor TPS dari dropdown
    document.getElementById('tps-filter').addEventListener('change', function() {
        var selectedTPS = parseInt(this.value);

        markers.forEach(function(obj) {
            if (obj.notps === selectedTPS) {
                obj.marker.openPopup();
                map.setView(obj.marker.getLatLng(), 13); // Zoom dan pindahkan peta ke marker yang dipilih
            } else {
                obj.marker.closePopup();
            }
        });
    });

</script>


</body>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="https://kota-batu.kpu.go.id/">Tentang kami</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4 class="sosmed">Sosial Media</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/officialKPUKotaBatu/"><img src="img/logoface.png" alt="Facebook"></a>
                        <a href="https://x.com/KPUBatu"><img src="img/twitter.png" alt="Twitter"></a>
                        <a href="https://www.instagram.com/kpukotabatu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="img/instagram.png" alt="Instagram"></a>
                        <a href="https://www.tiktok.com/@kpukotabatu?is_from_webapp=1&sender_device=pc"><img src="img/logotiktok.png" alt="TikTok"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
