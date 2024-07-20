@extends('navbar')

@section('link_rel')
<link rel="stylesheet" href="home.css">
@endsection

@section('content')
    <div class="wrapper1">
        <section id="home">
            <img src="img/kpu1.png" width="90px" class="responsive-img" />
            <div class="kolom">
                <p class="deskripsi">Sistem Informasi</p>
                <h1>Penunjang Kebutuhan Pendidikan Pemilih Pemula</h1>
                <p> 
                </p>
            </div>
        </section>
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
@endsection
