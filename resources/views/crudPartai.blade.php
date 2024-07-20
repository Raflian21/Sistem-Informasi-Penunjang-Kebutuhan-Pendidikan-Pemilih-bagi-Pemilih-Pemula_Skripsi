@extends('navbarAdmin')

@section('link_rel')
<link rel="stylesheet" href="crudPartai.css">
@endsection

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .table th {
            background-color: #343a40;
            color: #ffffff;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            border: 1px solid #dee2e6;
        }
        .table td {
            border: 1px solid #dee2e6;
            text-align: center;
            vertical-align: middle;
            padding: 10px;
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
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <h2><a href="tambahPartai" class="btn btn-success btn-flat">Tambah Calon</a></h2>

                <!-- Search and Filter Form -->
                <form action="{{ route('searchByName') }}" method="POST" class="mb-3">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="keyword" class="col-form-label">Cari Nama Calon:</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Nama Calon">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Cari</button>
                        </div>
                        <div class="col-auto">
                            <label for="partai" class="col-form-label">Filter berdasarkan partai:</label>
                        </div>
                        <div class="col-auto">
                            <select name="partai" id="partai" class="form-control">
                                <option value="">Pilih Partai</option>
                                @foreach ($partaiOptions as $option)
                                    <option value="{{ $option->partai }}">{{ $option->partai }}</option>
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
                            <tr>
                                <th scope="col">No Urut</th>
                                <th scope="col">Partai</th>
                                <th scope="col">Jenis Pemilihan</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Usia</th>
                                <th scope="col">Pendidikan Terakhir</th>
                                <th scope="col">Pekerjaan</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Created By</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @foreach ($data as $value)
                            <tr data-partai="{{ $value->partai }}">
                                <td>{{$value->nourut }}</td>
                                <td>{{$value->partai}}</td>
                                <td>{{$value->jenis}}</td>
                                <td>
                                    <img src="{{ asset('fotocalon/'.$value->foto) }}" alt="" style="width: 80px;">
                                </td>
                                <td>{{$value->nama}}</td>
                                <td>{{$value->alamat}}</td>
                                <td>{{$value->jeniskelamin}}</td>
                                <td>{{$value->agama}}</td>
                                <td>{{$value->usia}}</td>
                                <td>{{$value->pendidikan}}</td>
                                <td>{{$value->pekerjaan}}</td>
                                
                                <td>{{$value->created_at}}</td>
                                <td>{{$value->created_by}}</td>
                                <td>
                                    <a href="getdata/{{ $value->id }}" class="btn btn-warning btn-flat">Edit</a>
                                    <a href="deletedata/{{ $value->id }}" class="btn btn-danger btn-flat">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
</main>
@endsection
