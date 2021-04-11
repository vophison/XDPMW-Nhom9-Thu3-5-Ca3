<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table = "sanpham";

    
    public function loai()
    {
        return $this->belongsTo('App\Models\loai','maloai','masanpham');
    }
    public function hang()
    {
        return $this->belongsTo('App\Models\hang','mahang','masanpham');
    }
    public function chitietdonhang()
    {
        return $this->HasMany('App\Models\chitietdonhang','masanpham','masanpham');
    }
}
