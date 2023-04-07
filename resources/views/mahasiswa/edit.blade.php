@extends('layouts.template')
@section('konten')
<!-- START FORM -->

    
<form action='{{ url('mahasiswa/'.$data->nim) }}' method='post'>
    @csrf
    @method('PUT')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Edit Data Mahasiswa</h4>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                {{ $data->nim }}
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='nama' value="{{ $data->nama }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='jurusan' value="{{ $data->jurusan }}" id="jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="ormawa" class="col-sm-2 col-form-label">Ormawa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='ormawa' value="{{ $data->ormawa }}" id="ormawa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">EDIT</button></div>
            <div>
                <a href='{{ url('mahasiswa')}}'class="btn btn-secondary">KEMBALI</a>
            </div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
@endsection