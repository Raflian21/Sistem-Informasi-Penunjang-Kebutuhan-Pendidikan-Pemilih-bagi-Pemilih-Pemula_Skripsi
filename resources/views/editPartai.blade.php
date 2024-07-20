@extends('navbarAdmin')

@section('link_rel')
    <link rel="stylesheet" href="{{ asset('editPartai.css') }}">
@endsection

@section('content')
<style>
    .belum { color: orange; }
    .tidak { color: red; }
    .terpilih { color: green; }
</style>
<body>
<main class="d-flex flex-column h-100">
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <div class="col-10">
                    <form action="/updatedata/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No Urut</label>
                            <input type="text" name="nourut" value="{{ $data->nourut }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="statusSelect" class="form-label">Partai</label>
                            <select name="partai" class="form-control" id="statusSelect">
                                <option value="PKB" {{ $data->partai == 'PKB' ? 'selected' : '' }}>PKB</option>
                                <option value="GERINDRA" {{ $data->partai == 'GERINDRA' ? 'selected' : '' }}>GERINDRA</option>
                                <option value="PDIP" {{ $data->partai == 'PDIP' ? 'selected' : '' }}>PDIP</option>
                                <option value="GOLKAR" {{ $data->partai == 'GOLKAR' ? 'selected' : '' }}>GOLKAR</option>
                                <option value="NASDEM" {{ $data->partai == 'NASDEM' ? 'selected' : '' }}>NASDEM</option>
                                <option value="BURUH" {{ $data->partai == 'BURUH' ? 'selected' : '' }}>BURUH</option>
                                <option value="PSI" {{ $data->partai == 'PSI' ? 'selected' : '' }}>PSI</option>
                                <option value="GELORA" {{ $data->partai == 'GELORA' ? 'selected' : '' }}>GELORA</option>
                                <option value="PKS" {{ $data->partai == 'PKS' ? 'selected' : '' }}>PKS</option>
                                <option value="PKN" {{ $data->partai == 'PKN' ? 'selected' : '' }}>PKN</option>
                                <option value="PBB" {{ $data->partai == 'PBB' ? 'selected' : '' }}>PBB</option>
                                <option value="HANURA" {{ $data->partai == 'HANURA' ? 'selected' : '' }}>HANURA</option>
                                <option value="GARUDA" {{ $data->partai == 'GARUDA' ? 'selected' : '' }}>GARUDA</option>
                                <option value="PAN" {{ $data->partai == 'PAN' ? 'selected' : '' }}>PAN</option>
                                <option value="PERINDO" {{ $data->partai == 'PERINDO' ? 'selected' : '' }}>PERINDO</option>
                                <option value="DEMOKRAT" {{ $data->partai == 'DEMOKRAT' ? 'selected' : '' }}>DEMOKRAT</option>
                                <option value="PPP" {{ $data->partai == 'PPP' ? 'selected' : '' }}>PPP</option>
                                <option value="UMMAT" {{ $data->partai == 'UMMAT' ? 'selected' : '' }}>UMMAT</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="statusSelect" class="form-label">Jenis Pemilihan</label>
                            <select name="jenis" class="form-control" id="statusSelect">
                                <option value="DPRD Dapil 1" {{ $data->jenis == 'DPRD Dapil 1' ? 'selected' : '' }}>DPRD Dapil 1</option>
                                <option value="DPRD Dapil 2" {{ $data->jenis == 'DPRD Dapil 2' ? 'selected' : '' }}>DPRD dapil 2</option>
                                <option value="DPRD Dapil 3" {{ $data->jenis == 'DPRD Dapil 3' ? 'selected' : '' }}>DPRD dapil 3</option>
                                <option value="DPRD Dapil 4" {{ $data->jenis == 'DPRD Dapil 4' ? 'selected' : '' }}>DPRD dapil 4</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Foto</label>
                            <input type="file" name="foto" value="{{ $data->foto }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama</label>
                            <input type="text" name="nama" value="{{ $data->nama }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Alamat</label>
                            <input type="text" name="alamat" value="{{ $data->alamat }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Agama</label>
                            <input type="text" name="agama" value="{{ $data->agama }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="statusSelect" class="form-label">Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control" id="statusSelect">
                                <option value="Laki-laki" {{ $data->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $data->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Usia</label>
                            <input type="text" name="usia" value="{{ $data->usia }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pendidikan Terakhir</label>
                            <input type="text" name="pendidikan" value="{{ $data->pendidikan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="{{ $data->pekerjaan }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tahun Pemilu</label>
                            <input type="text" name="tahun" value="{{ $data->tahun }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                            <a href="crudPartai" class="btn btn-secondary">Back</a>

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
</main>
</body>
@endsection
