<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;

class MatkulController extends Controller
{
    public function index(){
        return view('/admin.tambah');
    }
    public function tambah(Request $request){
        $validated = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'ruang' => 'required',
            'kelas' => 'required',
        ]);

        $new = Matkul::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'ruang' => $request->ruang,
            'kelas' => $request->kelas,
        ]);
        return redirect()->route('admin')->with('success', 'Data matakuliah berhasil ditambah.');
    }

    public function hapus(Request $request){
        $matakuliah = Matkul::findOrFail($request->id);
        $matakuliah->delete();

        return redirect()->route('admin')->with('success', 'Data matakuliah berhasil dihapus.');
    }

    public function indexedit(Request $request){
        $data = Matkul::find($request->id);
        return view('/admin.edit', ['id' => $request->id, 'data' => $data]); 
    }

    public function edit(Request $request){
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'ruang' => 'required',
            'kelas' => 'required',
        ]);

        $matakuliah = Matkul::find($request->id);
        // dd($request->id);
        $matakuliah->kode = $request->kode;
        $matakuliah->nama = $request->nama;
        $matakuliah->ruang = $request->ruang;
        $matakuliah->kelas = $request->kelas;
        $matakuliah->update();

        return redirect()->route('admin')->with('success', 'Data matakuliah berhasil diperbarui.');
    }

    
}
