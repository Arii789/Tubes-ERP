<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MO extends Model
{
    use HasFactory;

    protected $table = "mo";
    protected $primaryKey = 'kode_mo'; // Set the primary key field.
    public $incrementing = false; // Set to true for auto-increment.
    protected $fillable = ['kode_mo', 'kode_bom', 'kuantitas', 'tanggal', 'status'];
    public $timestamps = false;

    protected $casts = [
        'status' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();
    
        // Creating a new MO, generate a unique kode_mo
        static::creating(function ($mo) {
            $lastMO = self::orderBy('kode_mo', 'desc')->first();
            $lastMOId = $lastMO ? intval(substr($lastMO->kode_mo, 5)) : 0; // Adjusted to start from the fifth character
            $newMOId = $lastMOId + 1;
            $mo->kode_mo = 'KDMO-' . str_pad($newMOId, 4, '0', STR_PAD_LEFT);
        });
    }
}
