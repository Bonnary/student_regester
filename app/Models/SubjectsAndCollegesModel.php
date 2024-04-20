<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectsAndCollegesModel extends Model
{
    use HasFactory;
    protected $table = 'subjects_and_colleges';
    public $timestamps = false;
    // Add subject_id to the fillable array
    protected $fillable = ['id','subject_id', 'college_id'];


    static function getSubjectAndCollege(){
        $return = self::all();
        return $return;
    }

    static function getSingleSubjectAndCollegeByID($id){
        $return = self::where('id', $id)->first();
        return $return;
    }

    static function getSingleSubjectAndCollege($subject_id, $college_id){
        $return = self::where('subject_id', $subject_id)->where('college_id', $college_id)->first();
        return $return;
    }

    static function upsertDB($subject_id, $college_id)
    {
        // Attempt to find the record
        $record = self::where('subject_id', $subject_id)->where('college_id', $college_id)->first();

        if ($record) {
            // If the record exists, update it
            $record->update([
                'subject_id' => $subject_id,
                'college_id' => $college_id,
            ]);
        } else {
            // If the record does not exist, insert a new one
            $record = self::create([
                'subject_id' => $subject_id,
                'college_id' => $college_id,
            ]);
        }

        // Return the ID of the affected record
        return $record->id;
    }
}
