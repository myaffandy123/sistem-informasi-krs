<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'kelas',
        'ruang',
        'dosen_id',
        'dosen_nama'
    ];

    protected $table = 'matkul';
    
    public function dosen() {
        return $this->belongsTo(Dosen::class);
    }
}
