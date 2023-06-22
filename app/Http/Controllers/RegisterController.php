<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Mahasiswa;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required',
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($request->role == 'Mahasiswa') {
            $new = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'nim' => $request->nim,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            $this->createMahasiswa($request, $new->id);
        } else if($request->role == 'Administrator'){
            $new = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'nip' => $request->nim,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $this->createAdmin($request, $new->id);
        }else {
            $new = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'nip' => $request->nim,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            $this->createDosen($request, $new->id);
        }

        return redirect('/login')->with('success', 'Regristrasi telah berhasil, silahkan login');
    }

    public function createMahasiswa(Request $request, $id) {
        Mahasiswa::create([
            'id' => $id,
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
        ]);
    }

    public function createAdmin(Request $request, $id) {
        Admin::create([
            'id' => $id,
            'nama' => $request->nama,
            'nip' => $request->nim,
            'email' => $request->email,
        ]);
    }

    public function createDosen(Request $request, $id) {
        Dosen::create([
            'id' => $id,
            'nama' => $request->nama,
            'nip' => $request->nim,
            'email' => $request->email,
        ]);
    }
}
