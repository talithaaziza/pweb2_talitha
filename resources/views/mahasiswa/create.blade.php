@extends('layouts.template')
<!-- START FORM -->
@section('konten')

    
<form action='{{ url('mahasiswa') }}' method='post'>
    @csrf
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Tambah Data Mahasiswa</h4>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="number" class="form-control"  name='nim' value="{{ Session::get ('nim') }}" id="nim">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='nama' value="{{ Session::get ('nama') }}" id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='jurusan' value="{{ Session::get ('jurusan') }}" id="jurusan">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Ormawa</label>
            <div class="col-sm-10">
                <input type="text" class="form-control"  name='ormawa' value="{{ Session::get ('ormawa') }}" id="ormawa">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            <div>
                <a href='{{ url('mahasiswa')}}'class="btn btn-secondary" >KEMBALI</a>
            </div>

        </div>
    </div>
</form>
@endsection
    <!-- AKHIR FORM -->