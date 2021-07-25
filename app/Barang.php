<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['id'];
    public function pesanan_detail()
    {
        return $this->hasMany('App\Pesanan_detail', 'id_barang','id');
    }
}
