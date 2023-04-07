<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = mahasiswa::where('nim', 'like',"%$katakunci%")
                ->orWhere('nama', 'like',"%$katakunci%")
                ->orWhere('jurusan', 'like',"%$katakunci%")
                ->orWhere('ormawa', 'like',"%$katakunci%")
                ->paginate($jumlahbaris);
        }else{

            $data = mahasiswa::orderBy('nim', 'desc')->paginate(5);
        }
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Session::flash('nim', $request->nim);
        Session::flash('nama', $request->nama);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('ormawa', $request->ormawa);

        $request->validate([
            'nim'=>'required | numeric | unique:mahasiswa,nim',
            'nama'=>'required',
            'jurusan'=>'required',
            'ormawa'=>'required',
        ],[
            'nim.required'=>'NIM Wajib Diisi',
            'nim.numerik'=>'NIM Wajib Dalam Angka',
            'nim.unique'=>'NIM Sudah Terdaftar',
            'nama.required'=>'Nama Wajib Diisi',
            'jurusan.required'=>'Jurusan Wajib Diisi',
            'ormawa.required'=>'Ormawa Wajib Diisi'
        ]);
        $data = [
            'nim'=>$request->nim,
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'ormawa'=>$request->ormawa,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama'=>'required',
            'jurusan'=>'required',
            'ormawa'=>'required',
        ],[
            'nama.required'=>'Nama Wajib Diisi',
            'jurusan.required'=>'Jurusan Wajib Diisi',
            'ormawa.required'=>'Ormawa Wajib Diisi'
        ]);
        $data = [
            'nama'=>$request->nama,
            'jurusan'=>$request->jurusan,
            'ormawa'=>$request->ormawa,
        ];
        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('nim',$id)->delete();
        return redirect()->to('mahasiswa')->with('success','Berhasil Menghapus Data');
    }
}
