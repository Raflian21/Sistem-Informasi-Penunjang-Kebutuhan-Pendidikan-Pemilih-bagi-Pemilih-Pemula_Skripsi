@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="{{ asset('editKonten.css') }}"></link>
@endsection

@section('content')
<body>
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="/updatedatakonten/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Video</label>
                          <input type="file" name="video" value="{{ $data->video }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="crudkonten" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
@endsection