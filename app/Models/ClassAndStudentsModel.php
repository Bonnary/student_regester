<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassAndStudentsModel extends Model
{
    use HasFactory;
    protected $table = 'class_and_students';
    public $timestamps = false;

    static function getClassAndStudents()
    {
        $return = self::orderBy('id', 'desc');

        if(!empty(Request::get('student_id'))) {
            $return = $return->where('student_id','=',Request::get('student_id'));
        }

        if(!empty(Request::get('class_id'))) {
            $return = $return->where('class_id','=',Request::get('class_id'));
        }

        $return = $return->paginate(20);
        return $return;
    }

}
