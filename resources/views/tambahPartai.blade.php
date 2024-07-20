@extends('navbarAdmin')
 
@section('link_rel')
<link rel="stylesheet" href="tambahPartai.css"></link>
@endsection

@section('content')
<style>
  .belum { color: orange; }
  .tidak { color: red; }
  .terpilih { color: green; }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="insertdata" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">No Urut</label>
                          <input type="text" name="nourut" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="statusSelect" class="form-label">Partai</label>
                          <select name="partai" class="form-control" id="statusSelect">
                            <option value="PKB" class="">PKB</option>
                            <option value="GERINDRA" class="">GERINDRA</option>
                            <option value="PDIP" class="">PDIP</option>
                            <option value="GOLKAR" class="">GOLKAR</option>
                            <option value="NASDEM" class="">NASDEM</option>
                            <option value="BURUH" class="">BURUH</option>
                            <option value="PSI" class="">PSI</option>
                            <option value="GELORA" class="">GELORA</option>
                            <option value="PKS" class="">PKS</option>
                            <option value="PKN" class="">PKN</option>
                            <option value="PBB" class="">PBB</option>
                            <option value="HANURA" class="">HANURA</option>
                            <option value="GARUDA" class="">GARUDA</option>
                            <option value="PAN" class="">PAN</option>
                            <option value="PERINDO" class="">PERINDO</option>
                            <option value="DEMOKRAT" class="">DEMOKRAT</option>
                            <option value="PPP" class="">PPP</option>
                            <option value="UMMAT" class="">UMMAT</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="statusSelect" class="form-label">Jenis Pemilihan</label>
                          <select name="jenis" class="form-control" id="statusSelect">
                            <option value="DPRD Dapil 1" class="">DPRD Dapil 1</option>
                            <option value="DPRD Dapil 2" class="">DPRD dapil 2</option>
                            <option value="DPRD Dapil 3" class="">DPRD dapil 3</option>
                            <option value="DPRD Dapil 4" class="">DPRD dapil 4</option>
                            <option value="Walikota" class="">Walikota</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Foto</label>
                          <input id="foto" type="file" name="foto" class="form-control" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Nama</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Alamat</label>
                          <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Agama</label>
                          <input type="text" name="agama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="statusSelect" class="form-label">Jenis Kelamin</label>
                          <select name="jeniskelamin" class="form-control" id="statusSelect">
                            <option value="Laki-laki" class="">Laki-laki</option>
                            <option value="Perempuan" class="">Perempuan</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Usia</label>
                          <input type="text" name="usia" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Pendidikan Terakhir</label>
                          <input type="text" name="pendidikan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                          <input type="text" name="pekerjaan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>

                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Tahun Pemilu</label>
                          <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="on" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                      <script>
                          function updateColor(selectElement) {
                            selectElement.className = '';  // Remove any existing classes
                            selectElement.classList.add(selectElement.options[selectElement.selectedIndex].className);
                          }

                          // Initial color update on page load
                          document.addEventListener("DOMContentLoaded", function() {
                              var selectElement = document.getElementById("statusSelect");
                              updateColor(selectElement);
                          });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection