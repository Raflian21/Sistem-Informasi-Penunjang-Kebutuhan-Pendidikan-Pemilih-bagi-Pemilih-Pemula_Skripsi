@extends('navbarAdmin')

@section('link_rel')
<link rel="stylesheet" href="crudSejarah.css">
@endsection

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sejarah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table th {
            background-color: #343a40;
            /* Dark background */
            color: #ffffff;
            /* White text */
            font-weight: bold;
            /* Bold text */
            text-align: center;
            /* Centered text */
            padding: 10px;
            /* Padding for spacing */
            border: 1px solid #dee2e6;
            /* Border color */
        }

        .table td {
            border: 1px solid #dee2e6;
            /* Border color */
            text-align: center;
            /* Centered text */
            vertical-align: middle;
            /* Middle alignment */
            padding: 10px;
            /* Padding for spacing */
        }

        .btn-flat {
            margin-right: 5px;
            /* Adjust button margin */
        }
    </style>
</head>
<main class="d-flex flex-column h-100">
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>


        <div class="container">
            <div class="row">
                <!-- Menampilkan pesan sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <!-- Tombol Tambah Sejarah -->
                <h2><a href="tambahSejarah" class="btn btn-success btn-flat">Tambah Sejarah</a></h2>

                <!-- Form Filter Tahun Pemilu -->
                <form action="{{ route('searchByTahun') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="tahunpemilu" class="col-form-label">Filter Tahun Pemilu:</label>
                        </div>
                        <div class="col-auto">
                            <select name="tahunpemilu" id="tahunpemilu" class="form-control">
                                <option value="">Pilih Tahun Pemilu</option>
                                @foreach ($tahun_pemilu as $tahun)
                                <option value="{{ $tahun }}">{{ $tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            @php $no = 1; @endphp
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Pemilu</th>
                                <th scope="col">Tahun Pemilu</th>
                                <th scope="col">Jumlah Partai</th>
                                <th scope="col">Total Suara</th>
                                <th scope="col">Suara Dimenangkan</th>
                                <th scope="col">Presiden Terpilih</th>
                                <th scope="col">Wakil Presiden Terpilih</th>
                                <th scope="col">Foto Partai</th>
                                <th scope="col">Link Partai</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $value->jenis }}</td>
                                <td>{{ $value->tahunpemilu }}</td>
                                <td>{{ $value->jumlahpartai }}</td>
                                <td>{{ $value->totalsuara }}</td>
                                <td>{{ $value->suaradimenangkan }}</td>
                                <td>{{ $value->presiden }}</td>
                                <td>{{ $value->wakilpresiden }}</td>
                                <td>
                                    <img src="{{ asset('fotopartai/'.$value->foto) }}" alt=""
                                        style="width: 100px;">
                                </td>
                                <td>{{ $value->linkpartai }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->created_by }}</td>
                                <td>
                                    <a href="getdatasejarah/{{ $value->id }}"
                                        class="btn btn-warning btn-flat">Edit</a>
                                    <a href="deletedatasejarah/{{ $value->id }}"
                                        class="btn btn-danger btn-flat">Delete</a>
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
