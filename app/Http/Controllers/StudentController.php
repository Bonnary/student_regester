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
        // $subect_and_college = new SubjectsAndCollegesModel();
        list($subject_ID, $college_ID) = explode('|', $request->subject_and_college);
        // $subect_and_college->subject_id = $subject_ID;
        // $subect_and_college->college_id = $college_ID;
        $subect_and_college_id =
            SubjectsAndCollegesModel::upsertDB($subject_ID, $college_ID);

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
        return redirect('admin/student/list')->with('success', 'Student Added Successfully');;
    }

    function update($id, Request $request)
    {

        // ! add subject
        $subect_and_college_id = SubjectsAndCollegesModel::upsertDB($request->subject_id, $request->college_id);

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
        $student = StudentModel::find($id);
        // $student->student_id = $request->student_id;
        $student->generation = $request->generation;
        $student->khmer_name = $request->khmer_name;
        $student->english_name = $request->english_name;
        if (!empty($request->date_of_birth)) {

            $student->date_of_birth = Carbon::createFromFormat('d/m/Y', $request->date_of_birth)->format('Y-m-d');
        }
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

        if (!empty($request->file('image'))) {

            //! add timestamp in unicode to the front of the image same
            $fileName = time() . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $student->image = '/storage/' . $path;
        }
        $student->save();
        return redirect('admin/student/list')->with('success', 'Student Added Successfully');;
    }

    function edit($id)
    {
        $data['header_title'] = "Edit Student";
        $data['familySituation'] = FamilySituationModel::getFamilySituation();
        $data['grades'] = GradesModel::getGrade();
        $data['studentJobs'] = StudentJobsModel::getStudentJob();
        $data['sessions'] = SessionsModel::getSession();
        $data['sex'] = ['Male', 'Female'];
        $data['generations'] = [20, 21, 22, 23, 24, 25];
        $data['colleges'] = CollegesModel::getCollege();
        $data['subjects'] = SubjectsModel::getSubject();
        $data['enrollment_types'] = EnrollmentTypesModel::getEnrollmentType();

        $student = StudentModel::getSingleStudent($id);
        $data['getRecord'] = $student;
        $data['familySituationData'] = FamilySituationModel::getSingleFamilySituationByID($student->family_situation_id);
        $data['gradeData'] = GradesModel::getSingleGradeByID($student->grade_id);
        $data['studentJobData'] = StudentJobsModel::getSingleStudentJobByID($student->student_job_id);
        $data['sessionData'] = SessionsModel::getSingleSessionByID($student->session_id);
        $subjectsAndColleges = SubjectsAndCollegesModel::getSingleSubjectAndCollegeByID($student->subjects_and_colleges_id);
        $data['collegeData'] = CollegesModel::getCollegeByID($subjectsAndColleges->college_id);
        $data['subjectData'] = SubjectsModel::getSubjectByID($subjectsAndColleges->subject_id);
        $data['parentsInfoData'] = ParentsInfoModel::getParentsInfoByID($student->parentInfo_id);
        $data['enrollment_typeData'] =  EnrollmentTypesModel::getSingleEnrollmentTypeByID($student->enrollment_type_id);
        return view('admin.student.edit', $data);

        // dd($student->date_of_birth);
    }

    function delete($id)
    {
        $student = StudentModel::getSingleStudent($id);
        $student->is_active = false;
        $student->save();
        return redirect('admin/student/list')->with('success', 'Student delete successfully.');
    }
}
