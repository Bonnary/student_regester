<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentJobsModel extends Model
{
    use HasFactory;
    protected $table ='student_jobs';

    static function getStudentJob(){
        $return = self::all();
        return $return;
    }

    static function getSingleStudentJobByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }
}
