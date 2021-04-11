<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loai extends Model
{
    protected $table = "loai";

    public function sanpham()
    {
        return $this->hasMany('App\Models\sanpham','masanpham','maloai');
    }
}
