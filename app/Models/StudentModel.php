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

        // if (!empty(Request::get('room'))) {
        //     $return = $return->where('room', 'like', '%' . Request::get('room') . '%');
        // }
        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;
    }

    static function getHighestID()
    {
        $return = self::orderBy('id', 'desc')->first();
        return $return;
    }
}
