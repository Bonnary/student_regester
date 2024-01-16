<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollegesModel extends Model
{
    use HasFactory;
    protected $table = 'colleges';
    public $timestamps = false;

    static function getCollege(){
        $return = self::all();
        return $return;
    }

    static function getCollegeName($id){
        $return = self::where('id', $id)->get();
        return $return->first()->college_name;
    }
}
