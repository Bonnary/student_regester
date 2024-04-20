<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table ='class';

    static public function getClass() {
            $return = ClassModel::select('class.*')
            ->join('users', 'users.id', '=','class.created_by')
            ->where('class.is_active', '=',0)
            // ->where('class.status', '=',0)
            ->orderBy('class.room','asc')
            ->get();
        return $return;
    }
}
