<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = "admin";
    public $timestamps = false;

    public function donhang()
    {
        return $this->HasMany('App\Models\donhang','madonhang','taikhoan');
    } 
}
