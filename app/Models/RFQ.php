<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    use HasFactory;

    protected $table = "rfq";
    protected $primaryKey = 'kode_rfq';
    public $incrementing = false;
    protected $fillable = ['kode_rfq', 'kode_vendor', 'tanggal_order', 'status', 'total_harga', 'metode_pembayaran'];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Creating a new RFQ, generate a unique kode_rfq
            $lastRFQ = self::orderBy('kode_rfq', 'desc')->first();

            if ($lastRFQ) {
                $newRFQId = intval(substr($lastRFQ->kode_rfq, 5)) + 1;
            } else {
                // No existing records, start with 1
                $newRFQId = 1;
            }

            $model->kode_rfq = 'KDRFQ-' . str_pad($newRFQId, 4, '0', STR_PAD_LEFT);
        });
    }
}
