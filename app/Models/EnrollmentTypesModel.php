<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollmentTypesModel extends Model
{
    use HasFactory;
    protected $table = 'enrollment_types';
    public $timestamps = false;

    static function getEnrollmentType(){
        $return = self::all();
        return $return;
    }

}
