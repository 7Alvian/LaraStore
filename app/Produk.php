<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama_barang','stok_barang','harga_barang'];
}
