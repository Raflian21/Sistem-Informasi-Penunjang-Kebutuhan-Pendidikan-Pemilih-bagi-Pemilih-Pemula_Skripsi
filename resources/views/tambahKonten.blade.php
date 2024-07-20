@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="tambahKonten.css"></link>
@endsection

@section('content')
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="insertdatakonten" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Video</label>
                          <input id="video" type="file" name="video" class="form-control" autocomplete="on" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
@endsection