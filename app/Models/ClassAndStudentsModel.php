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

        if (!empty(Request::get('student_id'))) {
            $return = $return->where('student_id', '=', Request::get('student_id'));
        }

        if (!empty(Request::get('class_id'))) {
            $return = $return->where('class_id', '=', Request::get('class_id'));
        }

        $return = $return->paginate(20);
        return $return;
    }

    static function getSingle($id)
    {
        $return = self::where('id', $id)->first();
        return $return;
    }


    static public function getRecord()
    {
        $return = self::select('class.*', 'class.room as class_room', 'subjects.*', 'colleges.*', 'users.name as created_by_name')
            ->join('subjects_and_colleges', 'subjects_and_colleges.id', '=', 'class_and_students.subjects_and_colleges_id')
            ->join('subjects', 'subjects.id', '=', 'subjects_and_colleges.subject_id')
            ->join('colleges', 'colleges.id', '=', 'subjects_and_colleges.college_id')
            ->join('class', 'class.id', '=', 'class.class_id')
            ->join('users', 'users.id', '=', 'class.created_by')
            ->where('class.is_active', '=', 0);

        if (!empty(Request::get('class_room'))) {
            $return = $return->where('class.room', 'like', '%' . Request::get('class_room') . '%');
        }

        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subjects.subject_name', 'like', '%' . Request::get('subject_name') . '%');
        }
        $return = $return->orderBy('class.id', 'desc')
            ->paginate(50);

        return $return;
    }
    static public function MySubject($class_id, $subject_id, $college_id)
    {
        $subject_and_college = SubjectsAndCollegesModel::getSingleSubjectAndCollege($subject_id, $college_id);
        //    dd($subject_and_college->id);
        return
            self::select('class_and_students.*', 'subjects.*', 'colleges.*', 'sessions.*')
            ->join('subjects_and_colleges', 'subjects_and_colleges.id', '=', 'class_and_students.subjects_and_colleges_id')
            ->join('subjects', 'subjects.id', '=', 'subjects_and_colleges.subject_id')
            ->join('colleges', 'colleges.id', '=', 'subjects_and_colleges.college_id')
            ->join('sessions', 'sessions.id', '=', 'class_and_students.session_id')
            ->where('class_and_students.class_id', '=', $class_id)
            ->where('class_and_students.subjects_and_colleges_id', '=', $subject_and_college->id)
            ->orderBy('class_and_students.id', 'desc')
            ->get();
    }

    static public function getStudents($class_id, $subject_id, $college_id, $session_id)
    {
        $subject_and_college = SubjectsAndCollegesModel::getSingleSubjectAndCollege($subject_id, $college_id);
        return
            self::select('students.*')
            ->join('students', 'students.id', '=', 'class_and_students.student_id')
            ->where('class_and_students.class_id', '=', $class_id)
            ->where('class_and_students.subjects_and_colleges_id', '=', $subject_and_college->id)
            ->where('class_and_students.session_id', '=', $session_id)
            ->orderBy('class_and_students.id', 'desc')
            ->get();
    }
}
