<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradesModel extends Model
{
    use HasFactory;
    protected $table = 'grades';

    static function getGrade(){
        $return = self::all();
        return $return;
    }

    static function getSingleGradeByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }
}
