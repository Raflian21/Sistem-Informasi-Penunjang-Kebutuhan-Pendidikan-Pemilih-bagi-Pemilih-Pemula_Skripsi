@extends('navbarAdmin')

@section('link_rel')
<link rel="stylesheet" href="crudUser.css"></link>
@endsection

@section('content')
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
        .status-belum {
            color: orange;
        }
        .status-tidak {
            color: red;
        }
        .status-terpilih {
            color: green;
        }
    </style>
</head>
<main class="d-flex flex-column h-100">
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>


        <div class="container">
            <div class="row">
                <!-- Menampilkan pesan sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Menampilkan pesan error -->
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Form pencarian -->
                <form action="{{ route('searchByUser') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="keyword" class="col-form-label">Cari berdasarkan nama user:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="name" id="keyword" class="form-control" placeholder="Nama user">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </form>
                <!-- <h2><a href="tambahPartai" class="btn btn-success btn-flat">Tambah Calon</a></h2> -->

                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            @php $no = 1; @endphp
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Email</th>
                                <th scope="col">Username</th>
                                <th scope="col">Aktivasi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        <img src="{{ asset('fotoregister/'.$value->foto) }}" alt="" style="width: 80px;">
                                    </td>
                                    <td>{{ $value->email }}</td>
                                    <td>{{ $value->username }}</td>
                                    <td>
                                        @if ($value->id !== 0) <!-- Pengguna dengan ID 0 adalah super admin -->
                                            @if ($value->is_active)
                                                <form action="{{ route('deactivate.user', $value->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-warning btn-flat" type="submit">Nonaktifkan</button>
                                                </form>
                                            @else
                                                <form action="{{ route('activate.user', $value->id) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-success btn-flat" type="submit">Aktifkan</button>
                                                </form>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($data->count() > 1 && $value->id != 1) <!-- Memeriksa jumlah akun dan ID yang tidak boleh dihapus -->
                                            <button type="button" class="btn btn-danger btn-flat delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $value->id }}">
                                                Delete
                                            </button>
                                        @endif
                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal{{ $value->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($value->id == 1)
                                                            <p>User dengan ID teratas tidak dapat dihapus. Minimal satu akun harus disisakan.</p>
                                                        @else
                                                            <p>Apakah Anda yakin ingin menghapus akun dengan nama <strong>{{ $value->name }}</strong>?</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                        @if ($value->id != 1)
                                                            <a href="{{ route('deletedatauser', $value->id) }}" class="btn btn-danger">Hapus</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</body>
</main>
@endsection
