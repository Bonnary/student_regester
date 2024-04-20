<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamScheduleModel extends Model
{
    use HasFactory;

    protected $table = 'exam_schedule';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getRecordSingle($exam_id, $class_id, $subject_id, $college_id, $session_id)
    {
        return ExamScheduleModel::where('exam_id', '=', $exam_id)->where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->where('college_id', '=', $college_id)
            ->where('session_id', '=', $session_id)
            ->first();
    }

    static public function deleteRecord($exam_id, $class_id, $subject_id, $college_id, $session_id)
    {
        ExamScheduleModel::where('exam_id', '=', $exam_id)
            ->where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->where('college_id', '=', $college_id)
            ->where('session_id', '=', $session_id)

            ->delete();
    }

    static public function getExam($class_id)
    {
        return ExamScheduleModel::select('exam_schedule.*', 'exam.name as exam_name')
            ->join('exam', 'exam.id', '=', 'exam_schedule.exam_id')
            ->where('exam_schedule.class_id', '=', $class_id)
            ->groupBy('exam_schedule.exam_id')
            ->orderBy('exam_schedule.id', 'desc')
            ->get();
    }

    static public function getSubject($exam_id, $class_id, $subject_id, $college_id,$session_id)
    {
        return ExamScheduleModel::select('exam_schedule.*', 'subjects.subject_name as subject_name')
            ->join('subjects', 'subjects.id', '=', 'exam_schedule.subject_id')
            ->join('colleges', 'colleges.id', '=', 'exam_schedule.college_id')
            ->where('exam_schedule.exam_id', '=', $exam_id)
            ->where('exam_schedule.class_id', '=', $class_id)
            ->where('exam_schedule.subject_id', '=', $subject_id)
            ->where('exam_schedule.college_id', '=', $college_id)
            ->where('exam_schedule.session_id', '=', $session_id)

            ->get();
    }

    static public function getMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return MarkRegisterModel::CheckAlreadyMark($student_id, $exam_id, $class_id, $subject_id);
    }
}
