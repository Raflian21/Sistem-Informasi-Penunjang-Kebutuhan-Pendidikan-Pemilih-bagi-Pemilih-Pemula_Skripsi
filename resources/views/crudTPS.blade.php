@extends('navbarAdmin')

@section('link_rel')
<link rel="stylesheet" href="crudTPS.css"></link>
@endsection

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TPS</title>
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
        .btn-flat {
            margin-right: 5px; /* Adjust button margin */
        }
    </style>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>

    <main class="d-flex flex-column h-100">
        <div class="container">
            <div class="row">
                <!-- Menampilkan pesan sukses -->
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <h2><a href="tambahTPS" class="btn btn-success btn-flat">Tambah TPS</a></h2>

                <!-- Form pencarian -->
                <form action="{{ route('search') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="keyword" class="col-form-label">Cari berdasarkan alamat TPS:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Alamat TPS">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <div class="col-auto">
                            <label for="kelurahan" class="col-form-label">Filter berdasarkan kelurahan:</label>
                        </div>
                        <div class="col-auto">
                            <select name="kelurahan" id="kelurahan" class="form-control">
                                <option value="">Pilih Kelurahan</option>
                                @foreach ($kelurahanOptions as $option)
                                    <option value="{{ $option->kelurahan }}">{{ $option->kelurahan }}</option>
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
                                <th scope="col">Alamat</th>
                                <th scope="col">No TPS</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col">Total Pemilih</th>
                                <th scope="col">Kelurahan</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $value)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{$value->alamat}}</td>
                                <td>{{$value->notps}}</td>
                                <td>{{$value->latitude}}</td>
                                <td>{{$value->longitude}}</td>
                                <td>{{$value->totalpemilih}}</td>
                                <td>{{$value->kelurahan}}</td>
                                <td>{{$value->created_at}}</td> <!-- Tampilkan waktu dibuat -->
                                <td>{{$value->created_by}}</td>
                                <td>
                                    <!-- <form action="dashboardMatkul{{ $value->id }}" method="POST">
                                    @method("delete")
                                    @csrf
                                    <button class="btn btn-danger btn-flat" type='submit'>Delete</button> -->
                                    <!-- {{-- <form action="{{ route('DeleteMatkul', $value->id_matkul) }}" method="GET"> --}} -->
                                    
                                    <!-- {{-- </form> --}} -->
                                    </form>
                                    <a href="getdataTPS/{{ $value->id }}" class="btn btn-warning btn-flat">Edit</a>
                                    <a href="deletedataTPS/{{ $value->id }}" class="btn btn-danger btn-flat">Delete</a>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

</body>
@endsection
