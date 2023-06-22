<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs';

    protected $fillable = [
        'mahasiswa_id',
        'matkul_id'
    ];

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class);
    }
    public function matkul() {
        return $this->belongsTo(Matkul::class);
    }
}
