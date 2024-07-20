@extends('navbar')

@section('link_rel')
    <link rel="stylesheet" href="partai.css">
@endsection

@section('content')
    <style>
        .status-belum {
            color: orange;
        }
        .status-tidak {
            color: red;
        }
        .status-terpilih {
            color: green;
        }

        .tabel {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Atur grid dengan auto-fill untuk responsif */
            gap: 20px; /* Jarak antar tabel */
            justify-items: center; /* Pusatkan tabel di dalam grid */
        }

        .calon {
            width: 100%; /* Pastikan tabel penuh lebar */
            border-collapse: collapse;
            text-align: center;
            background-color: #24262b;
            color: #fff;
            display: none; /* Sembunyikan tabel secara default */
        }

        .calon td {
            padding: 10px;
        }

        .calon img {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .nama {
            font-size: 20px;
            width: 150px; /* Lebar tetap untuk nama */
        }
    </style>

    @php
        $tahun = $data->first()->tahun;
    @endphp
    
    <div class="judul">
        <p>Daftar Calon Tetap Pemilu {{$tahun}} Kota Batu</p>
    </div>

    <!-- Form Filter Partai -->
    <div class="par">
    <select class="filter" id="partai-filter">
        <option class="opsi" value="">Pilih Partai</option>
        @php
            $uniqueParties = $data->unique('partai');
        @endphp
        @foreach ($uniqueParties as $party)
            <option value="{{$party->partai}}">{{$party->partai}}</option>
        @endforeach
    </select>
    </div>
    
    
    <!-- Deskripsi Partai yang Dipilih -->
    <p class="deskripsi2"></p>

    <div class="tabel">
        @foreach ($data as $value)
            <table class="calon" data-partai="{{$value->partai}}">
                <tr>
                    <td class="nourut">{{$value->nourut}}</td>
                </tr>
                <tr>
                    <td class="gam">
                        <img src="{{ asset('fotocalon/'.$value->foto) }}" alt="">
                    </td>    
                </tr> 
                <tr>
                    <td class="nama">{{$value->nama}}</td>
                </tr>
                <tr>
                    <td class="jenis">{{$value->jenis}}</td>
                </tr>
                <tr>
                    <td>
                        <div class="view">
                            <a href="getdatapartai/{{ $value->id }}">Profil</a>
                        </div>
                    </td>
                </tr>
            </table>
        @endforeach
    </div>

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

    <!-- JavaScript untuk Mengubah Deskripsi2 dan Tampilkan Tabel -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const partaiFilter = document.getElementById('partai-filter');
            const calonTables = document.querySelectorAll('.tabel table.calon');
            const deskripsi2 = document.querySelector('.deskripsi2');

            partaiFilter.addEventListener('change', function() {
                const selectedPartai = this.value;

                // Cari nama partai yang dipilih
                const selectedPartyName = Array.from(partaiFilter.options)
                    .find(option => option.value === selectedPartai)?.textContent;

                // Update deskripsi2 dengan nama partai yang dipilih
                deskripsi2.textContent = selectedPartyName ? `${selectedPartyName}` : '';

                // Tampilkan/mask table berdasarkan partai yang dipilih
                calonTables.forEach(table => {
                    const partai = table.dataset.partai;

                    if (!selectedPartai || partai === selectedPartai) {
                        table.style.display = 'table';
                    } else {
                        table.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
