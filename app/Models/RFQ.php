<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    use HasFactory;

    protected $table = 'rfq';
    protected $primaryKey = 'kode_rfq';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'kode_vendor',
        'tanggal_order',
        'status',
        'total_harga',
        'metode_pembayaran',
    ];

    public $timestamps = true;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = $model->generateUniqueKodeRfq();
        });
    }

    public static function generateUniqueKodeRfq()
    {
        $prefix = 'KDRFQ-';
        $newRFQId = 1;
    
        while (true) {
            $newRFQCode = $prefix . str_pad($newRFQId, 4, '0', STR_PAD_LEFT);
    
            if (!self::where('kode_rfq', $newRFQCode)->exists()) {
                break;
            }
    
            $newRFQId++;
    
            if ($newRFQId > 9999) {
                // Jika sudah mencapai KDRFQ-9999, bisa dihandle sesuai kebutuhan.
                // Misalnya, dilempar ke exception atau mengambil langkah lain.
                throw new \Exception('Exceeded maximum limit for KDRFQ.');
            }
        }
    
        return $newRFQCode;
    }
}
