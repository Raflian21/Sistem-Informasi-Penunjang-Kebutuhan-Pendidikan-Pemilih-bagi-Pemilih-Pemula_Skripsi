@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="{{ asset('editTPS.css') }}"></link>
@endsection

@section('content')
<body>
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="/updatedataTPS/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Alamat</label>
                          <input type="text" name="alamat"  value="{{ $data->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">No TPS</label>
                          <input type="text" name="notps"  value="{{ $data->notps }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Latitude</label>
                          <input type="text" name="latitude"  value="{{ $data->latitude }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Longitude</label>
                          <input type="text" name="longitude"  value="{{ $data->longitude }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Total Pemilih</label>
                          <input type="text" name="totalpemilih"  value="{{ $data->totalpemilih }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Kelurahan</label>
                          <input type="text" name="kelurahan"  value="{{ $data->kelurahan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="crudTPS" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
@endsection