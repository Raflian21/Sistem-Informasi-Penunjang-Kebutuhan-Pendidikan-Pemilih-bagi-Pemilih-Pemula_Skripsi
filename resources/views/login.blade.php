@extends('navbar')
 
@section('link_rel')
<link rel="stylesheet" href="login.css"></link>
@endsection

@section('content')
<body>

<div class="card">
    <div class="card-content">
        <div class="card-title">
                <h2 class="judul">LOGIN</h2>

        </div>
            <form action="postlogin" method="post" class="form">
                @csrf
                <label for="user-username" style="padding-top: 13px">&nbsp;
                Username
                </label>
                <input id="username" class="form-content" type="username"
                name="username" autocomplete="on" required/>
                <div class="form-border"></div>
                <label for="user-password" style="padding-top: 13px">&nbsp;
                Password
                </label>
                <input id="password" class="form-content" type="Password"
                name="password"  required/>
                <div class="form-border"></div>
                <!-- <a href="#">
                    <legend id="forgot-pass">Lupa Password?</Legend>
                </a> -->
                <input id="submit-btn" type="submit" name="submit" value="LOGIN">
                <div class="akun">
                <a href="registrasi">Buat Akun</a>
                <p><a class="lupa" href="password">Lupa Password?</a></p>
                </div>
                
                <!-- <p>Belum punya akun?<a href="registrasi" id="signup">Registrasi</a></p> -->
            </form>

    </div>
    @if ($message = Session::get('danger'))
                <div class="alert alert-danger" role="alert">
                {{ $message }}
            </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
</div>
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

   