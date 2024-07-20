@extends('navbar')

@section('link_rel')
    <link rel="stylesheet" href="konten.css">
@endsection

@section('content')
    <div class="main-content">
        <div class="sidebar">
            <h3>Daftar Konten</h3>
            <input type="text" id="searchInput" placeholder="Cari Konten" onkeyup="searchFunction()">
            <ul id="videoList">
                @foreach ($data as $key => $value)
                    <li><a href="#{{$value->nama}}" onclick="showSlide({{ $key }})">{{$value->nama}}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="content">
            @foreach ($data as $key => $value)
                <div id="{{$value->nama}}" class="judul" style="display: {{$key == 0 ? 'block' : 'none'}};">
                    <h1>{{$value->nama}}</h1>
                </div>
                <div class="container">
                    <div class="tape">
                        <video controls>
                            <source src="{{ asset('kontenvideo/'.$value->video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
            @endforeach
            <div class="navigation-buttons">
                <button class="btn2" onclick="prevSlide()">Sebelumnya</button>
                <button class="btn1" onclick="nextSlide()">Selanjutnya</button>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="kotak">
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
        var currentIndex = 0; // Index of current slide
        var totalSlides = {{ count($data) }}; // Total number of slides

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
            var slides = document.querySelectorAll('.judul');
            var containers = document.querySelectorAll('.container');
            slides.forEach(function(slide) {
                slide.style.display = 'none';
            });
            containers.forEach(function(container) {
                container.style.display = 'none';
            });
            slides[index].style.display = 'block';
            containers[index].style.display = 'block';
        }

        function showSlide(index) {
            currentIndex = index;
            updateContent(currentIndex);
        }

        function searchFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            ul = document.getElementById('videoList');
            li = ul.getElementsByTagName('li');

            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName('a')[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        // Update content to show the initial slide (index 0)
        updateContent(currentIndex);
    </script>
@endsection
