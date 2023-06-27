<?php

namespace App\Http\Controllers;

use App\Models\Krs;
use App\Models\Matkul;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index() {
        // $mahasiswa = Mahasiswa::all();
        $matkul = Matkul::all();

        $matkulAmbilRaw = Krs::where('mahasiswa_id', auth()->user()->id)->get();
        $matkulAmbil = [];
        foreach ($matkulAmbilRaw as $ma) {
            $matkulAmbil[] = Matkul::where('id', $ma->matkul_id)->first();
        }
        // dd($matkulAmbil[0]->kode);
        return view('/mahasiswa.index', ['matkul' => $matkul, 'matkulAmbil' => $matkulAmbil]);
    }

    public function tambahMatkul(Request $request) {
        $matkul_id = $request->id;
        $mahasiswa_id = auth()->user()->id;
        if (!is_null(Krs::where('matkul_id', $matkul_id)->where('mahasiswa_id', $mahasiswa_id)->first())) {
            return redirect()->back()->with('danger', 'Mata kuliah ini sudah diambil');
        }
        Krs::create([
            'mahasiswa_id' => $mahasiswa_id,
            'matkul_id' => $matkul_id,
        ]);

        return redirect()->back()->with('success', 'Mata kuliah ditambahkan');
    }
    public function hapusMatkul(Request $request) {
        $matkul_id = $request->id;
        $mahasiswa_id = auth()->user()->id;

        $matkulHapus = Krs::where('matkul_id', $matkul_id)->where('mahasiswa_id', $mahasiswa_id)->delete();

        return redirect()->back()->with('success', 'Mata kuliah dihapus');
    }
}
