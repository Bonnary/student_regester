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
        $return = self::select('class.*','class.room as class_room','subjects.subject_name as subject_name','users.name as created_by_name')
            ->join('subjects','subjects.id','=','class.subject_id')
            ->join('class','class.id','=','class.class_id')
            ->join('users','users.id','=','class.created_by')
            ->where('class.is_active','=',0);

            if(!empty(Request::get('class_room')))
            {
                $return = $return->where('class.room','like','%'.Request::get('class_room').'%');
            }

            if(!empty(Request::get('subject_name')))
            {
                $return = $return->where('subjects.subject_name','like','%'.Request::get('subject_name').'%');
            }
        $return = $return->orderBy('class.id','desc')
                    ->paginate(50);

        return $return;
    }
    static public function MySubject($class_id) {
        return self::select('class.*','subjects.subject_name as subject_name')
                ->join('subjects','subjects.id','=','class.subject_id')
                ->join('users','users.id','=','class.created_by')
                ->where('class.id','=',$class_id)
                ->where('class.is_active','=',0)
                ->orderBy('class.id','desc')
                ->get();
    }

}
