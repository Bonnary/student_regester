<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsAndCollegesModel extends Model
{
    use HasFactory;
    protected $table = 'subjects_and_colleges';
    public $timestamps = false;

    static function getSubjectAndCollege(){
        $return = self::all();
        return $return;
    }

    static function getSingleSubjectAndCollegeByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }
}
