<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pasien extends Model
{
    use HasApiTokens, Notifiable, SoftDeletes, HasFactory;

    protected $table = 'pasien'; 

    protected $fillable = [
        'nama_pasien',
        'email_pasien',
        'nomor_antrean',
        'tanggal',
        'jam',
    ];

    protected static function booted()
    {
        static::creating(function ($pasien) {
            $jumlahAntrean = self::where('tanggal', $pasien->tanggal)
                                ->where('jam', $pasien->jam)
                                ->count();
            $pasien->nomor_antrean = $jumlahAntrean + 1;
        });
    }
   
}
