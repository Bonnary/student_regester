<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class ClassSubjectModel extends Model
{
    use HasFactory;
    protected $table = 'class_subject';

    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRecord(){
        $return = self::select('class_subject.*','class.room as class_room','subjects.subject_name as subject_name','users.name as created_by_name')
            ->join('subjects','subjects.id','=','class_subject.subject_id')
            ->join('class','class.id','=','class_subject.class_id')
            ->join('users','users.id','=','class_subject.created_by')
            ->where('class_subject.is_active','=',0);

            if(!empty(Request::get('class_room')))
            {
                $return = $return->where('class.room','like','%'.Request::get('class_room').'%');
            }

            if(!empty(Request::get('subject_name')))
            {
                $return = $return->where('subjects.subject_name','like','%'.Request::get('subject_name').'%');
            }
        $return = $return->orderBy('class_subject.id','desc')
                    ->paginate(100);

        return $return;
    }
    static public function MySubject($class_id) {
        return self::select('class_subject.*','subjects.subject_name as subject_name')
                ->join('subjects','subjects.id','=','class_subject.subject_id')
                ->join('class','class.id','=','class_subject.class_id')
                ->join('users','users.id','=','class_subject.created_by')
                ->where('class_subject.class_id','=',$class_id)
                ->where('class_subject.is_active','=',0)
                ->orderBy('class_subject.id','desc')
                ->get();
    }

}
