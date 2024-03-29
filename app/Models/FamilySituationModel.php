<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilySituationModel extends Model
{
    use HasFactory;
    protected $table = 'family_situations';

    static function getFamilySituation(){
        $return = self::all();
        return $return;
    }

    static function getSingleFamilySituationByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }
}
