<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_transaksi';

    protected $fillable = [
        'id_transaksi',
        'id_barang',
        'nama_produk',
        'total_item',
        'total_harga',
        'status_pembayaran'
    ];

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id_barang', 'id_barang');
    }
}
