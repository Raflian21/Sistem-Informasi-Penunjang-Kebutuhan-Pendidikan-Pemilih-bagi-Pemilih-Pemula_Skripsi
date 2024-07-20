<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('dashboard.css') }}">
    @yield('link_rel')

    <style>
        .navbar-nav .profile-picture {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
    </style>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-3 shadow">
    <div class="logo">
        <a><img src="{{ asset('img/kpu1.png') }}" width="90px" height="60px"></a>
    </div>
    <a class="navbar-brand" href="dashboard">Dashboard Admin</a>
    <div class="navbar-nav flex-row align-items-center ms-auto">
        @if(Auth::check())
        <div class="nav-item text-nowrap d-flex align-items-center">
            <a class="nav-link pe-3">{{ Auth::user()->name }}</a>
            <img src="{{ asset('fotoregister/' . Auth::user()->foto) }}" class="profile-picture" alt="Profile Picture">
        </div>
        <div class="nav-item text-nowrap">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link nav-link px-3">Sign out</button>
            </form>
        </div>
        @endif
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-2 d-md-block bg-dark sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="crudPartai">
                            <span data-feather="home" class="align-text-bottom"></span>
                            Calon
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crudKonten">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Konten
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crudTPS">
                            <span data-feather="file" class="align-text-bottom"></span>
                            TPS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crudsejarah">
                            <span data-feather="file" class="align-text-bottom"></span>
                            Sejarah
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="crudUser">
                            <span data-feather="file" class="align-text-bottom"></span>
                            User
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4" style="margin-top: 20px;">
            @yield('content')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
</body>
</html>
