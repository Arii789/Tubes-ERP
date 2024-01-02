<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    use HasFactory;
    protected $table = 'bahan';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['nama', 'kode', 'harga', 'stok', 'gambar', 'bahan_qr'];
}

