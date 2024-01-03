<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BOM extends Model
{
    use HasFactory;

    protected $table = "bom";
    protected $primaryKey = 'kode_bom';
    public $incrementing = false;
    protected $fillable = ['kode_bom', 'kode_produk', 'kuantitas', 'total_harga'];
    public $timestamps = false;

    // Override boot method to generate kode_bom before saving
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bom) {
            $lastBOM = static::orderBy('kode_bom', 'desc')->first();

            if ($lastBOM) {
                $lastNumber = intval(substr($lastBOM->kode_bom, 5));
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $bom->kode_bom = 'KDBM-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
        });
    }
}
