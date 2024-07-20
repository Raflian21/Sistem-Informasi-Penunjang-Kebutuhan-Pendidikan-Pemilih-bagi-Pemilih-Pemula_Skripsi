@extends('navbar')

@section('link_rel')
    <link rel="stylesheet" href="sejarah.css">
@endsection

@section('content')
    <div class="sejarah">
        @foreach ($data as $key => $value)
            <div class="sejarah-slide">
                <div class="container">
                    <div class="judul">
                        <h1>PEMILU {{ $value->tahunpemilu }}</h1>
                    </div>
                    <div class="content">
                        <div class="halfimg">
                            <div class="form">
                                <div class="card">
                                    <div class="form-field">
                                        <div class="label">Jenis Pemilu</div>
                                        <div class="isi">: {{ $value->jenis }}</div>
                                    </div>
                                    <div class="form-field">
                                        <div class="label">Jumlah Partai</div>
                                        <div class="isi">: {{ $value->jumlahpartai }}</div>
                                    </div>
                                    <div class="form-field">
                                        <div class="label">Total Suara</div>
                                        <div class="isi">: {{ $value->totalsuara }}</div>
                                    </div>
                                    <div class="form-field">
                                        <div class="label">Presiden Terpilih</div>
                                        <div class="isi">: {{ $value->presiden }}</div>
                                    </div>
                                    <div class="form-field">
                                        <div class="label">Wakil Presiden Terpilih</div>
                                        <div class="isi">: {{ $value->wakilpresiden }}</div>
                                    </div>
                                    <div class="form-field">
                                        <div class="label">Suara Dimenangkan</div>
                                        <div class="isi">: {{ $value->suaradimenangkan }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gambar">
                            <p>Partai Pemenang</p>
                            <img src="{{ asset('fotopartai/'.$value->foto) }}" alt="" width="200px" height="200px">
                            <p class="info"><a href="{{ $value->linkpartai }}">Info Detail</a></p>
                        </div>
                    </div>
                    <div class="navigation-buttons">
                        <button class="btn2" onclick="prevSlide()">Sebelumnya</button>
                        <button class="btn1" onclick="nextSlide()">Selanjutnya</button>
                    </div>
                </div>
            </div>
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

    <script>
        var currentIndex = 0;
        var totalSlides = {{ count($data) }};

        function prevSlide() {
            if (currentIndex === 0) {
                currentIndex = totalSlides - 1;
            } else {
                currentIndex--;
            }
            updateContent(currentIndex);
        }

        function nextSlide() {
            if (currentIndex === totalSlides - 1) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            updateContent(currentIndex);
        }

        function updateContent(index) {
            var sejarahSlides = document.querySelectorAll('.sejarah-slide');
            sejarahSlides.forEach(function(slide) {
                slide.style.display = 'none';
            });
            sejarahSlides[index].style.display = 'block';
        }

        updateContent(currentIndex);
    </script>
@endsection
