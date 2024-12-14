<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class DaftarMakanan extends Model
{
    use HasApiTokens, Notifiable;

    protected $table = 'daftar_menu_makanan';
    public $timestamps = false;

    protected $fillable = [
        'nama_makanan',
        'harga_makanan',
        'gambar_makanan',
        'tipe_makanan',
        'deskripsi_makanan'
    ];
}
