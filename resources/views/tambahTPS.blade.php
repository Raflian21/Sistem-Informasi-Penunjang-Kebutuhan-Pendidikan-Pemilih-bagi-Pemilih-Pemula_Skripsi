@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="tambahTPS.css"></link>
@endsection

@section('content')
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="insertdataTPS" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Alamat</label>
                          <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">No TPS</label>
                          <input type="text" name="notps" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Latitude</label>
                          <input type="text" name="latitude" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Longitude</label>
                          <input type="text" name="longitude" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Total Pemilih</label>
                          <input type="text" name="totalpemilih" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="statusSelect" class="form-label">Kelurahan</label>
                          <select name="kelurahan" class="form-control" id="statusSelect">
                            <option value="ORO-ORO OMBO" class="">ORO-ORO OMBO</option>
                            <option value="SUMBEREJO" class="">SUMBEREJO</option>
                            <option value="PESANGGRAHAN" class="">PESANGGRAHAN</option>
                            <option value="SIDOMULYO" class="">SIDOMULYO</option>
                            <option value="SONGGOKERTO" class="">SONGGOKERTO</option>
                            <option value="TEMAS" class="">TEMAS</option>
                            <option value="SISIR" class="">SISIR</option>
                            <option value="NGAGLIK" class="">NGAGLIK</option>
                            <option value="TULUNGREJO" class="">TULUNGREJO</option>
                            <option value="PUNTEN" class="">PUNTEN</option>
                            <option value="GUNUNGSARI" class="">GUNUNGSARI</option>
                            <option value="SUMBERGONDO" class="">SUMBERGONDO</option>
                            <option value="BULUKERTO" class="">BULUKERTO</option>
                            <option value="BUMIAJI" class="">BUMIAJI</option>
                            <option value="PANDANREJO" class="">PANDANREJO</option>
                            <option value="GIRIPURNO" class="">GIRIPURNO</option>
                            <option value="BEJI" class="">BEJI</option>
                            <option value="DADAPREJO" class="">DADAPREJO</option>
                            <option value="JUNREJO" class="">JUNREJO</option>
                            <option value="MOJOREJO" class="">MOJOREJO</option>
                            <option value="PENDEM" class="">PENDEM</option>
                            <option value="TLEKUNG" class="">TLEKUNG</option>
                            <option value="TORONGREJO" class="">TORONGREJO</option>
                          </select>
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