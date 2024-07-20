<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="{{ asset('view.css') }}">
    @yield('link_rel')
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a><img src="{{ asset('img/kpu1.png') }}" width="90px" height="60px"></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="{{ route('home') }}">Beranda</a></li>
                    @auth
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <input id="submit-btn" type="submit" name="submit" value="Logout">
                            </form>
                        </li>
                    @else
                        <li><a href="{{ route('login') }}" class="tbl-satu">Login</a></li>
                    @endauth  
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="sejarah">
        
        <div id="sejarah-container" class="sejarah-slide">
            <div class="container">
                <div class="judul">
                    <h1>{{ $data->nama }}</h1>
                </div>
                <div class="content">
                    <div class="gambar">
                        <p>Foto</p>
                        <img src="{{ asset('fotocalon/'.$data->foto) }}" alt="">
                    </div>
                    <div class="halfimg">
                        <div class="form">
                            <div class="card">
                                <div class="form-field">
                                    <div class="label">Usia</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->usia }}</div>
                                </div>
                                <div class="form-field">
                                    <div class="label">Agama</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->agama }}</div>
                                </div>
                                <div class="form-field">
                                    <div class="label">Jenis Kelamin</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->jeniskelamin }}</div>
                                </div>
                                <div class="form-field">
                                    <div class="label">Pendidikan Terakhir</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->pendidikan }}</div>
                                </div>
                                <div class="form-field">
                                    <div class="label">Pekerjaan</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->pekerjaan }}</div>
                                </div>
                                <div class="form-field">
                                    <div class="label">Alamat</div>
                                    <div class="value">: </div>
                                    <div class="isi"> {{ $data->alamat }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation-buttons">
                <a href="{{ route('partai') }}" class="tbl-dua">Kembali</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal HTML -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modalHeading"></h2>
            <p id="modalText"></p>
        </div>
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
                        <a href="https://www.facebook.com/officialKPUKotaBatu/"><img src="/img/logoface.png" alt="Facebook"></a>
                        <a href="https://x.com/KPUBatu"><img src="/img/twitter.png" alt="Twitter"></a>
                        <a href="https://www.instagram.com/kpukotabatu?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><img src="/img/instagram.png" alt="Instagram"></a>
                        <a href="https://www.tiktok.com/@kpukotabatu?is_from_webapp=1&sender_device=pc"><img src="/img/logotiktok.png" alt="TikTok"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script>
        function openModal(heading, content) {
            document.getElementById("modalHeading").innerText = heading;
            document.getElementById("modalText").innerText = content;
            document.getElementById("myModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
        }
    </script>
</body>
</html>
