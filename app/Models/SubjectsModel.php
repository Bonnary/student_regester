<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsModel extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    public $timestamps = false;

    static function getSubject(){
        $return = self::all();
        return $return;
    }

    static function getSubjectName($id){
        $return = self::where('id', $id)->get();
        return $return->first()->subject_name;
    }
}
