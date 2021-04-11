<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;
    protected $primaryKey = "email"; // truyền để biết key chính là email vì trong auth.php nó định nghĩa id là key
    protected $keyType = 'string';//để kiểu string mới đúng dạng chuỗi key
    public $timestamps = false;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'email', 'name', 'password',
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function donhang()
    {
        return $this->HasMany('App\Models\donhang','madonhang','email');
    } 
}


