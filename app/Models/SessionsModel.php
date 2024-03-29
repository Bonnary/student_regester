<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionsModel extends Model
{
    use HasFactory;
    protected $table ='sessions';

    static function getSession(){
        $return = self::all();
        return $return;
    }

    static function getSingleSessionByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }
}
