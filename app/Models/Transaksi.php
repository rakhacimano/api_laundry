<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_transaksi',
        'id_member',
        'id_user',
        'tanggal',
        'batas_waktu',
        'tanggal_bayar',
        'status_cucian',
        'status_pembayaran',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $table = 'transaksi';

    protected $primaryKey = 'id_transaksi';
}
