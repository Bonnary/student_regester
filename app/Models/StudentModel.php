<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class StudentModel extends Model
{
    use HasFactory;
    protected $table = 'students';

    static function getStudent()
    {
        $return = self::where('is_active', true);

        if (!empty(Request::get('student_id'))) {
            $return = $return->where('student_id', '=', Request::get('student_id'));
        }

        if (!empty(Request::get('english_name'))) {
            $return = $return->where('english_name', 'like', '%' . Request::get('english_name') . '%');
        }

        if (!empty(Request::get('generation'))) {
            $return = $return->where('generation', '=', Request::get('generation'));
        }

        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;
    }

    public static function getHighestID()
    {
        // Assuming 'id' is the primary key and auto-incrementing
        $lastRecord = self::orderBy('id', 'desc')->first();
        return $lastRecord ? $lastRecord->id : 0;
    }

    static function getSingleStudent($id)
    {
        $return = self::where('id', $id)->first();
        return $return;
    }
}
