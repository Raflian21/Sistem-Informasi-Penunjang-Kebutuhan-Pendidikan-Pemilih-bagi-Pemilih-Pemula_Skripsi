@extends('navbarAdmin')

@section('link_rel')
<link rel="stylesheet" href="crudKonten.css">
@endsection

@section('content')
<main class="d-flex flex-column h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table th {
            background-color: #343a40; /* Dark background */
            color: #ffffff; /* White text */
            font-weight: bold; /* Bold text */
            text-align: center; /* Centered text */
            padding: 10px; /* Padding for spacing */
            border: 1px solid #dee2e6; /* Border color */
        }
        .table td {
            border: 1px solid #dee2e6; /* Border color */
            text-align: center; /* Centered text */
            vertical-align: middle; /* Middle alignment */
            padding: 10px; /* Padding for spacing */
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <!-- Menampilkan pesan sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <h2><a href="tambahKonten" class="btn btn-success btn-flat">Tambah Konten</a></h2>

                <!-- Form pencarian -->
                <form action="{{ route('searchByNameKonten') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="keyword" class="col-form-label">Cari berdasarkan nama konten:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="nama" id="keyword" class="form-control" placeholder="Nama Konten">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            @php $no = 1; @endphp
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Video</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$value->nama}}</td>
                                <td>
                                    <video controls width="320" height="240">
                                        <source src="{{ asset('kontenvideo/'.$value->video) }}" type="video/mp4"> 
                                    </video>
                                </td>
                                <td>{{$value->created_at}}</td> <!-- Tampilkan waktu dibuat -->
                                <td>{{$value->created_by}}</td>
                                <td>
                                    <a href="getdatakonten/{{ $value->id }}" class="btn btn-warning btn-flat">Edit</a>
                                    <a href="deletedatakonten/{{ $value->id }}" class="btn btn-danger btn-flat">Delete</a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</main>
@endsection
