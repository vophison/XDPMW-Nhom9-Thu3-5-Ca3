<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hang extends Model
{
    protected $table = "hang";

    public function sanpham()
    {
        return $this->hasMany('App\Models\sanpham','masanpham','mahang');
    }
}
