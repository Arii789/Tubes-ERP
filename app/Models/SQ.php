<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SQ extends Model
{
    use HasFactory;
    protected $table = "sq";
    protected $primaryKey = 'kode_sq';
    public $incrementing = false;
    protected $fillable = ['kode_sq', 'kode_pembeli', 'tanggal_order', 'status', 'total_harga', 'metode_pembayaran'];
    public $timestamps = true;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = $model->generateUniqueKodeSq();
        });
    }

    public static function generateUniqueKodeSq()
    {
        $prefix = 'KDSL-';
        $newSQId = 1;
    
        while (true) {
            $newSQCode = $prefix . str_pad($newSQId, 4, '0', STR_PAD_LEFT);
    
            if (!self::where('kode_sq', $newSQCode)->exists()) {
                break;
            }
    
            $newSQId++;
    
            if ($newSQId > 9999) {
                // Jika sudah mencapai KDRFQ-9999, bisa dihandle sesuai kebutuhan.
                // Misalnya, dilempar ke exception atau mengambil langkah lain.
                throw new \Exception('Exceeded maximum limit for KDRFQ.');
            }
        }
    
        return $newSQCode;
    }
}
