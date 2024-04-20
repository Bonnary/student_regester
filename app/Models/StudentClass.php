<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class StudentClass extends Model
{
    use HasFactory;
    protected $table = 'class';
    public $timestamps = false;

    static function getClass()
    {
        $return = self::where('is_active', true);

        if (!empty(Request::get('room'))) {
            $return = $return->where('room', 'like', '%' . Request::get('room') . '%');
        }

        $return = $return->orderBy('id', 'desc')->paginate(20);
        return $return;
    }

    static function getSingleClass($id)
    {
        return self::find($id);
    }

    static function getClassRaw()
    {
        return self::where('is_active', true)->get();
    }



}
