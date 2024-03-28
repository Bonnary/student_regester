<?php

namespace App\Http\Controllers;

use App\Models\Class_and_studentModel;
use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamModel;
use App\Models\ExamScheduleModel;
use App\Models\MarkRegisterModel;
use App\Models\MarksGradeModel;
use App\Models\StudentModel;
use App\Models\SubjectsModel;
use App\Models\User;

class ExaminationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function exam_list()
    {
        $data['header_title'] = 'Exam List';
        $data['getRecord'] = ExamModel::getRecord();
        return view('admin.examinations.exam.list', $data);
    }
    public function exam_add()
    {
        $data['header_title'] = 'Add new Exam';
        return view('admin.examinations.exam.add', $data);
    }
    public function exam_insert(Request $request)
    {
        // dd($request->all());

        $exam = new ExamModel;
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->created_by = Auth::user()->id;
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success','Exam successfully created');
    }

    public function exam_edit($id)
    {
        $data['getRecord'] = ExamModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Exam";
            return view('admin.examinations.exam.edit',$data);
        }
        else
        {
            abort(404);
        }
    }

    public function exam_update($id, Request $request)
    {
        $exam = ExamModel::getSingle($id);
        $exam->name = trim($request->name);
        $exam->note = trim($request->note);
        $exam->save();

        return redirect('admin/examinations/exam/list')->with('success','Exam successfully updated');
    }

    public function exam_delete($id)
    {
        $getRecord = ExamModel::getSingle($id);
        if (!empty($getRecord)) {
            $getRecord->is_delete =1;
            $getRecord->save();
            return redirect()->back()->with('success','Exam successfully deleted');

        }
        else
        {
            abort(404);
        }
    }

    public function exam_schedule(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        $result = array();
        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $getSubject = ClassSubjectModel::MySubject($request->get('class_id'));
            foreach ($getSubject as $value) {

                $dataS=array();
                $dataS['subject_id']=$value->subject_id;
                $dataS['class_id']=$value->class_id;
                $dataS['subject_name']=$value->subject_name;

                $ExamSchedule = ExamScheduleModel::getRecordSingle($request->get('exam_id'), $request->get('class_id'), $value->subject_id);
                if (!empty($ExamSchedule)) {
                    $dataS['exam_date'] = $ExamSchedule->exam_date;
                    $dataS['start_time'] = $ExamSchedule->start_time;
                    $dataS['end_time'] = $ExamSchedule->end_time;
                    $dataS['room_number'] = $ExamSchedule->room_number;
                    $dataS['full_marks'] = $ExamSchedule->full_marks;
                    $dataS['passing_mark'] = $ExamSchedule->passing_mark;
                }
                else {
                    $dataS['exam_date'] = '';
                    $dataS['start_time'] = '';
                    $dataS['end_time'] = '';
                    $dataS['room_number'] = '';
                    $dataS['full_marks'] = '';
                    $dataS['passing_mark'] = '';
                }
                $result[]=$dataS;
            }
        }
        // dd('$result');
        $data['getRecord']=$result;
        $data['header_title'] = "Exam Schedule";
        return view('admin.examinations.exam_schedule',$data);
    }

    public function exam_schedule_insert(Request $request) {
        // dd($request->all());
        ExamScheduleModel::deleteRecord($request->exam_id,$request->class_id);
        if (!empty($request->schedule)) {
            foreach ($request -> schedule as $schedule) {
                // dd($schedule['subject_id'])
                if (!empty($schedule['subject_id']) && !empty($schedule['exam_date']) && !empty($schedule['start_time']) && !empty($schedule['end_time']) && !empty($schedule['room_number']) && !empty($schedule['full_marks']) && !empty($schedule['passing_mark'])) {
                    $exam = new ExamScheduleModel;
                    $exam->exam_id =$request->exam_id;
                    $exam->class_id =$request->class_id;
                    $exam->subject_id =$schedule['subject_id'];
                    $exam->exam_date =$schedule['exam_date'];
                    $exam->start_time =$schedule['start_time'];
                    $exam->end_time =$schedule['end_time'];
                    $exam->room_number =$schedule['room_number'];
                    $exam->full_marks =$schedule['full_marks'];
                    $exam->passing_mark =$schedule['passing_mark'];
                    $exam->created_by = Auth::user()->id;
                    $exam->save();
                }
            }
        }
        return redirect()->back()->with('success', "Exam Schedule Successfully Saved");
    }

    public function marks_register(Request $request) {
        $data['getClass'] = ClassModel::getClass();
        $data['getExam'] = ExamModel::getExam();

        if (!empty($request->get('exam_id')) && !empty($request->get('class_id'))) {
            $data['getSubject'] = ExamScheduleModel::getSubject($request->get('exam_id'), $request->get('class_id'));
            $data['getStudent'] = StudentModel::getStudentClass( $request->get('class_id'));
            //  dd($getSubject);
            //  dd($data['getStudent']);
        }

        $data['header_title'] = "Marks Register";
        return view('admin.examinations.marks_register',$data);
    }

    public function submit_marks_register(Request $request) {
        // dd($request->all());
        $valaition = 0;
        if (!empty($request->mark)) {
            foreach ($request ->mark as $mark) {
                $getExamSchedule = ExamScheduleModel::getSingle($mark['id']);
                $full_marks = $getExamSchedule->full_marks;

                $class_work = !empty($mark['class_work']) ? $mark['class_work'] : 0;
                $home_work = !empty($mark['home_work']) ? $mark['home_work'] : 0;
                $test_work = !empty($mark['test_work']) ? $mark['test_work'] : 0;
                $exam = !empty($mark['exam']) ? $mark['exam'] : 0;

                $total_mark = $class_work + $home_work + $test_work + $exam;

                if ($full_marks >= $total_mark) {
                    $getMark = MarkRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $mark['subject_id']);
                    if (!empty($getMark)) {
                        $save = $getMark;
                    } else {

                        $save = new MarkRegisterModel;
                        $save->created_by = Auth::user()->id;
                    }

                    $save->student_id = $request->student_id;
                    $save->exam_id = $request->exam_id;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $mark['subject_id'];
                    $save->class_work = $class_work;
                    $save->home_work = $home_work;
                    $save->test_work = $test_work;
                    $save->exam = $exam;

                    $save->save();
                } else {
                    $valaition = 1;
                }
            }
        }
        if ($valaition == 0) {
            $json['message'] = "Mark Register successfully saved";
        } else {
            $json['message'] = "Mark Register successfully saved. Some subject mark greater than full mark";
        }


        echo json_decode($json['message']);

    }
    public function single_submit_marks_register(Request $request) {
        // dd($request->all());
        $id = $request->id;
        $getExamSchedule = ExamScheduleModel::getSingle($id);

        $full_marks = $getExamSchedule->full_marks;

        $class_work = !empty($request->class_work) ? $request->class_work : 0;
        $home_work = !empty($request->home_work) ? $request->home_work : 0;
        $test_work = !empty($request->test_work) ? $request->test_work : 0;
        $exam = !empty($request->exam) ? $request->exam : 0;

        $total_mark = $class_work + $home_work + $test_work + $exam;

        if ($full_marks >= $total_mark) {
            $getMark = MarkRegisterModel::CheckAlreadyMark($request->student_id, $request->exam_id, $request->class_id, $request->subject_id);
                if (!empty($getMark)) {
                    $save = $getMark;
                } else {

                    $save = new MarkRegisterModel;
                    $save->created_by = Auth::user()->id;
                }

                $save->student_id = $request->student_id;
                $save->exam_id = $request->exam_id;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->class_work = $class_work;
                $save->home_work = $home_work;
                $save->test_work = $test_work;
                $save->exam = $exam;
                $save->save();

                $json['message'] = "Mark Register successfully saved";
        }
        else {
            $json['message'] = "Your total mark greater than full mark";
        }

            echo json_decode($json['message']);
    }

    public function marks_grade() {
        $data['getRecord'] = MarksGradeModel::getRecord();
        $data['header_title'] = "Marks Grade";
        return view('admin.examinations.marks_grade.list',$data);
    }

    public function marks_grade_add() {
        $data['header_title'] = "Add New Marks Grade";
        return view('admin.examinations.marks_grade.add',$data);
    }
    public function marks_grade_insert(Request $request) {
        $mark = new MarksGradeModel;
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->created_by = Auth::user()->id;
        $mark->save();

        return redirect('admin/examinations/marks_grade')->with('success','Mark Grade successfully created');
    }

    public function marks_grade_edit($id) {
        $data['getRecord'] = MarksGradeModel::getSingle($id);
        $data['header_title'] = "Edit Marks Grade";
        return view('admin.examinations.marks_grade.edit',$data);
    }

    public function marks_grade_update($id, Request $request) {
        $mark = MarksGradeModel::getSingle($id);
        $mark->name = trim($request->name);
        $mark->percent_from = trim($request->percent_from);
        $mark->percent_to = trim($request->percent_to);
        $mark->save();

        return redirect('admin/examinations/marks_grade')->with('success','Mark Grade successfully updated');
    }

    public function marks_grade_delete($id)
    {
        $mark = MarksGradeModel::getSingle($id);

        $mark->delete($id);

        return redirect()->back()->with('success','Mark Grade successfully deleted');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
