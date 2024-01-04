<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'tb_karyawan';
    protected $fillable = [
        'id_departemen', 'nama', 'posisi', 'telp', 'email', 'departemen', 'manager'
    ];

    // Karyawan.php
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'id_departemen', 'id');
    }
}
