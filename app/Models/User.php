<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
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

    static function getEmailSingle($email)
    {
        //! we call the where function from our own class
        //! this will return a first match email row from table user
        return User::where('email', '=', $email)->first();
    }
    static function getTokenSingle($remember_token)
    {
        return User::where('remember_token', '=', $remember_token)->first();
    }

    static function getAccount()
    {
        // ? select every thing from table users and order it by id big to low
        $return = self::select("users.*")->where('is_delete', '=', false);

        // ? this is for search
        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }
        if (!empty(Request::get('name'))) {
            $return = $return->where('name', 'like', '%' . Request::get('name') . '%');
        }
        if (!empty(Request::get('date'))) {
            $return = $return->whereDate('created_at', '=', Request::get('date'));
        }
        $return = $return->orderBy('id')->paginate(20);
        return $return;
    }
    static function getSingleAccount($id)
    {
        return self::find($id);
    }
}
