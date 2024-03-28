<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class Class_and_studentModel extends Model
{
    use HasFactory;

    protected $table = 'subjects_and_colleges';
    static public function getSingle($id)
    {
        return self::find($id);
    }

    // static public function getRecord()
    // {
    //     $return = self::select('subjects_and_colleges.*','subjects.id as subject_id', 'colleges.id as college_id')
    //         ->join('subjects','subjects.id','=','subjects_and_colleges.subject_id')
    //         ->join('colleges','colleges.id','=','subjects_and_colleges.college_id')
    //         ->orderBy('subjects_and_colleges.id','desc')
    //         ->get();
    //         if (!empty(Request::get('subject_id')))
    //         {
    //             $return = $return->where('subjects.id','like','%'.Request::get('subject_id').'%');
    //         }
    //         if (!empty(Request::get('college_id')))
    //         {
    //             $return = $return->where('colleges.id','like','%'.Request::get('college_id').'%');
    //         }

    //     $return = $return->orderBy('subjects_and_colleges.id','desc')
    //             ->paginate(100);
    //     return $return;
    // }

    // static public function mySubject($class_room)
    // {
    //     $return =  self::select('class_and_students.*','students.id ad student_id', 'class.room as class_room','generation', 'days.id as day_id', 'sessions.id as session_id', 'subjects.id as subject_id')
    //         ->join('students','students.id','=','class_and_students.student_id')
    //         ->join('class','class.room','=','class_and_students.class_room')
    //         ->join('days','days.id','=','class_and_students.day_id')
    //         ->join('sessions','sessions.id','=','class_and_students.session_id')
    //         ->join('subjects','subjects.id','=','class_and_students.subject_id')
    //         ->where('class_and_students.class_room','=',$class_room)
    //         // ->where('class_and_students.generation','=','generation')
    //         ->orderBy('class_and_students.id','desc')
    //         ->get();
    //     return $return;

    // }
    // static public function mySubject($class_id)
    // {
    //     return self::select('')
    // }

}
