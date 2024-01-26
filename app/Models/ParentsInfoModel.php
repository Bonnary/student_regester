<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentsInfoModel extends Model
{
    use HasFactory;
    protected $table = 'parents_info';
    public $timestamps = false;

    static function getParentsInfoByID($id)
    {
        $return = self::where('id', $id)->first();
        return $return;
    }
}
