<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    protected $table = "khachhang";
    public $timestamps = false;

    public function donhang()
    {
        return $this->HasMany('App\Models\donhang','madonhang','taikhoankhachhang');
    } 
}
