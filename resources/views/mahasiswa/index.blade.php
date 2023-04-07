@extends('layouts.template')
@section('konten')
    
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Mahasiswa</h4>

  

<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    <!-- FORM PENCARIAN -->
    <div class="pb-3">
      <form class="d-flex" action="{{ url('mahasiswa') }}" method="get">
          <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
          <button class="btn btn-secondary" type="submit">Cari</button>
      </form>
    </div>
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">

    </div>
    @if(auth()->user()->is_admin==1)
            <a href='{{url('mahasiswa/create')}}' class="btn btn-primary"> Tambah Data</a>
          </div>
          
          @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-md-1">No</th>
                <th class="col-md-3">NIM</th>
                <th class="col-md-3">Nama</th>
                <th class="col-md-3">Jurusan</th>
                <th class="col-md-3">Ormawa</th>
                <th class="col-md-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = $data->firstItem() ?>
            @foreach ($data as $item)     
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jurusan }}</td>
                <td>{{ $item->ormawa }}</td>
                <td>
                  @if (auth()->user()->is_admin==1)
                  <a href='{{ url('mahasiswa/'.$item->nim.'/edit') }}' class="btn btn-warning btn-sm">Edit</a>         
                    @endif
                    <th class="col-md-1">
                      <form onsubmit="return confirm('Apakah yakin akan menghapus data?')" class='d-inline' action="{{ url('mahasiswa/'.$item->nim.'/') }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        @if (auth()->user()->is_admin==1)
                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>                         
                        @endif
                      </form>
                    <a href='' ></a>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach
        </tbody>
    </table>
    {{ $data->withQueryString()->links() }}
   
</div>
<!-- AKHIR DATA -->

@endsection


            