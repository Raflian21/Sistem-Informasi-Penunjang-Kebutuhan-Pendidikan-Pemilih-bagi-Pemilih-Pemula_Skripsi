<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link rel="stylesheet" href="{{ asset('navbarcalon.css') }}">
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
                    @auth
                        <li>
                            <form action="logout" method="POST">
                                @csrf
                                <input id="submit-btn" type="submit" name="submit" value="Logout">
                            </form>
                        </li>
                    @else
                        <li><a href="partai" class="tbl-satu">Back</a></li>
                    @endauth  
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>
