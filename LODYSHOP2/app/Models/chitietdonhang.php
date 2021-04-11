<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitietdonhang extends Model
{
    protected $table = "chitietdonhang";
    public $timestamps = false;
    public function sanpham()
    {
        return $this->belongsTo('App\Models\sanpham','masanpham','masanpham');
    }

    public function donhang()
    {
        return $this->belongsTo('App\Models\donhang','madonhang','madonhang');
    }
}
