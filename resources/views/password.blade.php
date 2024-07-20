@extends('navbar')

@section('link_rel')
<link rel="stylesheet" href="password.css"></link>
@endsection

@section('content')
<body>
<div class="card">
    <div class="card-content">
        <div class="card-title">
            <h2 class="judul">RENEW</h2>

        </div>
        <form action="{{ route('password.update') }}" method="POST" id="renew-password-form">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                @if ($errors->has('email'))
                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
            @endif
                <input id="email" class="form-content" type="text" name="email" autocomplete="on" required/>
                <div class="form-border"></div>
            </div>
            <div class="form-group">
                <label for="password">Password Baru</label>
                @if ($errors->has('password'))
                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
            @endif
                <input id="password" class="form-content" type="password" name="password" required/>
                <div class="form-border"></div>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" class="form-content" type="password" name="password_confirmation" required/>
                <div class="form-border"></div>
            </div>
            <input id="submit-btn" type="submit" name="submit" value="UBAH PASSWORD">
        </form>
    </div>
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
