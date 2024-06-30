<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    Static public function get_record($request)
    {
        $return = self::select('users.*','vendor_type.name as vendor_type_name','category.name as category_name')->join('category','category.id','=','users.category_id','left')->join('vendor_type','vendor_type.id','=','users.vendor_type_id','left')->orderBy('users.id','desc')->where('users.is_admin','=',2)->where('users.is_delete','=',20);
        $return = $return->paginate(20);
        return $return;
    }
    Static public function get_single($id)
    {
        return self::find($id);
    }
    static public function get_record_user($request)
    {
        $return = self::select('users.*')->orderBy('users.id','desc')->where('users.is_admin',0)->where('users.is_delete',0);
        $return = $return->paginate(20);
        return $return;
    }
    public function getImage()
    {
        if(!empty($this->profile) && file_exists('upload/profile/'.$this->profile))
        {
            return url('upload/profile/'.$this->profile);
        }else{
            return "";
        }
    }
}
