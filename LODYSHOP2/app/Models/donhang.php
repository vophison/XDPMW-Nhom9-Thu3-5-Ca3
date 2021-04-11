<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class donhang extends Model
{
    protected $table = "donhang";
    public $timestamps = false;
    public function chitietdonhang()
    {
        return $this->HasMany('App\Models\chitietdonhang','madonhang','madonhang');
    } 

    public function khachhang()
    {
        return $this->belongsTo('App\Models\khachhang','taikhoan','madonhang');
    } 
    public function User()
    {
        return $this->belongsTo('App\User','email','madonhang');
    } 
}
