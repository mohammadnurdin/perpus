<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPinjam extends Model
{
    protected $fillable = [
        'no_transaksi_pinjam',
        'kd_anggota',
        'tg_pinjam',
        'tg_bts_kembali',
        'kd_koleksi',
        'judul',
        'jns_bhn_pustaka',
        'jns_koleksi',
        'jns_media',
        'id_pengguna',
    ];
    
}