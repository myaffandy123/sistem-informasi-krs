<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Matkul;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index() {
        $matkul = Matkul::all();

        $matkulAmpu = Matkul::where('dosen_id', auth()->user()->id)->get();

        return view('/dosen.index', ['matkul' => $matkul, 'matkulAmpu' => $matkulAmpu]);
    }

    public function ampuMatkul(Request $request) {
        $matkul_id = $request->id;
        $dosen = Dosen::where('id', auth()->user()->id)->first();

        $matkulAmpu = Matkul::find($matkul_id)->first();
        $matkulAmpu->dosen_id = $dosen->id;
        $matkulAmpu->dosen_nama = $dosen->nama;
        $matkulAmpu->update();
        // dd(auth()->user()->id);
        return redirect()->back()->with('success', 'Mata kuliah berhasil diampu');
    }
    public function hapusMatkul(Request $request) {
        $matkul_id = $request->id;
        
        $matkulAmpu = Matkul::where('id', $matkul_id)->first();
        $matkulAmpu->dosen_id = NULL;
        $matkulAmpu->dosen_nama = NULL;
        $matkulAmpu->update();

        return redirect()->back()->with('success', 'Mata kuliah tidak lagi diampu');
    }
}
