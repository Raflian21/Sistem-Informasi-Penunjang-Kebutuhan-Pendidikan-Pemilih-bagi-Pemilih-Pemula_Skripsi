@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="{{ asset('editSejarah.css') }}"></link>
@endsection

@section('content')
<body>
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="/updatedatasejarah/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="statusSelect" class="form-label">Jenis Pemilu</label>
                          <select name="jenis" class="form-control" id="statusSelect">
                            <option value="Eksekutif" class="">Eksekutif</option>
                            <option value="Legislatif" class="">Legislatif</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tahun Pemilu</label>
                          <input type="text" name="tahunpemilu" value="{{ $data->tahunpemilu }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Jumlah Partai</label>
                          <input type="text" name="jumlahpartai" value="{{ $data->jumlahpartai }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Total Suara</label>
                          <input type="text" name="totalsuara" value="{{ $data->totalsuara }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Suara Dimenangkan</label>
                          <input type="text" name="suaradimenangkan" value="{{ $data->suaradimenangkan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Presiden Terpilih</label>
                          <input type="text" name="presiden" value="{{ $data->presiden }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Wakil Presiden Terpilih</label>
                          <input type="text" name="wakilpresiden" value="{{ $data->wakilpresiden }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Foto</label>
                          <input type="file" name="foto" value="{{ $data->foto }}" class="form-control">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Link Tentang Partai</label>
                          <input type="text" name="linkpartai" value="{{ $data->linkpartai }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="crudsejarah" class="btn btn-secondary">Back</a>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>
@endsection