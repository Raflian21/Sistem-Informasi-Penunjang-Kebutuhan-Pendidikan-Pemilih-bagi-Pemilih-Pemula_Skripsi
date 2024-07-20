<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="{{ asset('navbar.css') }}">
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
                    <li><a href="home">Beranda</a></li>
                    <li><a href="sejarah">Sejarah</a></li>
                    <li><a href="map">TPS</a></li>
                    <li><a href="konten">Konten</a></li>
                    <li><a href="partai">Calon</a></li>
                    @auth
                        <li>
                            <form action="logout" method="POST">
                                @csrf
                                <input id="submit-btn" type="submit" name="submit" value="Logout">
                            </form>
                        </li>
                    @else
                        <li><a href="/login" class="tbl-satu">Login</a></li>
                    @endauth  
                </ul>
            </div>
            <div class="menu-toggle">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>
    @yield('content')

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');
        menuToggle.addEventListener('click', () => {
            menu.classList.toggle('active');
        });
    </script>
</body>
</html>
