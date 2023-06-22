<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'nim',
        'email'
    ];

    protected $table = 'mahasiswa';

    public function krs()
    {
        return $this->hasMany(Krs::class);
    }
}