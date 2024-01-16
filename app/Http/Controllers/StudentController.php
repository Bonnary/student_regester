<?php

namespace App\Http\Controllers;

use App\Models\CollegesModel;
use App\Models\EnrollmentTypesModel;
use App\Models\FamilySituationModel;
use App\Models\GradesModel;
use App\Models\ParentsInfoModel;
use App\Models\SessionsModel;
use App\Models\StudentJobsModel;
use App\Models\StudentModel;
use App\Models\SubjectsAndCollegesModel;
use App\Models\SubjectsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    function list()
    {
        $data['header_title'] = "Student List";
        $data['getRecord'] = StudentModel::getStudent();
        return view('admin.student.list', $data);
    }

    function add()
    {
        $data['header_title'] = 'Add Student';
        $data['familySituation'] = FamilySituationModel::getFamilySituation();
        $data['grades'] = GradesModel::getGrade();
        $data['studentJobs'] = StudentJobsModel::getStudentJob();
        $data['sessions'] = SessionsModel::getSession();
        $data['sex'] = ['Male', 'Female'];
        $data['generations'] = [20, 21, 22, 23, 24, 25];
        $data['colleges'] = CollegesModel::getCollege();
        $data['subjects'] = SubjectsModel::getSubject();
        $data['enrollment_types'] = EnrollmentTypesModel::getEnrollmentType();
        // ! convert 23 to 0000023
        // ? the plus 1 is for the ID to start with 00000001 not 0000000
        $data['HighestID'] = str_pad(StudentModel::getHighestID() + 1, 7, '0', STR_PAD_LEFT);


        return view('admin.student.add', $data);
    }

    function insert(Request $request)
    {
        // ! add subject
        $subect_and_college = new SubjectsAndCollegesModel();
        $subect_and_college->subject_id = $request->subject_id;
        $subect_and_college->college_id = $request->college_id;
        $subect_and_college_id = $subect_and_college->save();

        // ! add parent info
        $parents_info = new ParentsInfoModel();
        $parents_info->father_name = $request->father_name;
        $parents_info->father_nationality = $request->father_nationality;
        $parents_info->father_occupation = $request->father_occupation;
        $parents_info->father_phone_number = $request->father_phone_number;
        $parents_info->mother_name = $request->mother_name;
        $parents_info->mother_nationality = $request->mother_nationality;
        $parents_info->mother_occupation = $request->mother_occupation;
        $parents_info->mother_phone_number = $request->mother_phone_number;
        $parents_info_id = $parents_info->save();

        // ! add student
        $student = new StudentModel();
        $student->student_id = $request->student_id;
        $student->generation = $request->generation;
        $student->khmer_name = $request->khmer_name;
        $student->english_name = $request->english_name;
        $student->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
        $student->sex = $request->sex;
        $student->nationality = $request->nationality;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->facebook_or_email = $request->facebook_or_email;
        $student->parentInfo_id = $parents_info_id;
        $student->enrollment_type_id = $request->enrollment_type_id;
        $student->session_id = $request->session_id;
        $student->subjects_and_colleges_id = $subect_and_college_id;
        $student->grade_id = $request->grade_id;
        $student->family_situation_id = $request->family_situation_id;
        $student->student_job_id = $request->student_job_id;
        $student->create_by = Auth::user()->id;

        //! add timestamp in unicode to the front of the image same
        $fileName = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $fileName, 'public');
        $student->image = '/storage/' . $path;
        $student->save();
        // dd($request->student_id);
    }

    // function add_subject(Request $request)
    // {
    //     $data['header_title'] = 'Add Subject';
    //     $data['colleges'] = CollegesModel::getCollege();
    //     $data['subjects'] = SubjectsModel::getSubject();
    //     $data['subect_and_college_id'] = $request->subect_and_college_id;
    //     $data['college_name'] = $request->college_name;
    //     $data['subject_name'] = $request->subject_name;
    //     return view('admin.student.add_subject', $data);
    // }

    // function insert_subject(Request $request)
    // {
    //     $subect_and_college = new SubjectsAndCollegesModel();
    //     $subect_and_college->subject_id = $request->subject_id;
    //     $subect_and_college->college_id = $request->college_id;
    //     $subect_and_college_id = $subect_and_college->save();

    //     $college_name = CollegesModel::getCollegeName($request->college_id);
    //     $subject_name = SubjectsModel::getSubjectName($request->subject_id);
    //     // dd('ID: '. $subect_and_college_id . 'College Name: '. $college_name.'Subject Name: '. $subject_name);
    //     return redirect('admin/student/add?' . http_build_query([
    //         'subect_and_college_id' => $subect_and_college_id,
    //         'college_name' => $college_name,
    //         'subject_name' => $subject_name
    //     ]));
    // }
}
