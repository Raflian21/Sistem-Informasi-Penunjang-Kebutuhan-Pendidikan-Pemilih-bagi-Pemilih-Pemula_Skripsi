@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="tambahSejarah.css"></link>
@endsection

@section('content')
<main class="d-flex flex-column h-100">
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="insertdatasejarah" method="POST" enctype="multipart/form-data">
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
                          <input type="text" name="tahunpemilu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Jumlah Partai</label>
                          <input type="text" name="jumlahpartai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Total Suara</label>
                          <input type="text" name="totalsuara" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Suara Dimenangkan</label>
                          <input type="text" name="suaradimenangkan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Presiden terpilih</label>
                          <input type="text" name="presiden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Wakil Presiden terpilih</label>
                          <input type="text" name="wakilpresiden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Foto</label>
                          <input id="foto" type="file" name="foto" class="form-control" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Link Tentang Partai</label>
                          <input type="text" name="linkpartai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
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