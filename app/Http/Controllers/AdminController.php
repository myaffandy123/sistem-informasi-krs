<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matkul;

class AdminController extends Controller
{
    //
    public function index() {
        $matkul = Matkul::all();

        return view('/admin.index', ['matkul' => $matkul]);
    }
}
