@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Marks Register</h1>
                    </div>
                    {{-- <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/examinations/exam/add') }}" class="btn btn-primary">Add Mark Register</a>
                    </div> --}}

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Marks Register</h3>
                            </div>
                            <form action="" method="get">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Exam</label>
                                            <select class="form-control" name="exam_id" required>
                                                <option value="">Select</option>
                                                @foreach ($getExam as $exam)
                                                    <option {{ Request::get('exam_id') == $exam->id ? 'selected' : '' }}
                                                        value="{{ $exam->id }}">{{ $exam->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Subject</label>
                                            <select class="form-control" name="subject_id" required>
                                                <option value="">Select</option>
                                                @foreach ($subject as $sub)
                                                    <option {{ Request::get('subject_id') == $sub->id ? 'selected' : '' }}
                                                        value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>College</label>
                                            <select class="form-control" name="college_id" required>
                                                <option value="">Select</option>
                                                @foreach ($college as $coll)
                                                    <option {{ Request::get('college_id') == $coll->id ? 'selected' : '' }}
                                                        value="{{ $coll->id }}">{{ $coll->college_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id" required>
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->room }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Sessions</label>
                                            <select class="form-control" name="session_id" required>
                                                <option value="">Select</option>
                                                @foreach ($sessions as $sess)
                                                    <option {{ Request::get('session_id') == $sess->id ? 'selected' : '' }}
                                                        value="{{ $sess->id }}">{{ $sess->session_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/examinations/exam_schedule') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <x-message></x-message>

                        @if (!empty($getSubject) && !empty($getSubject->count()))
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Marks Register </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0" style="overflow: auto;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Student Name</th>
                                                @foreach ($getSubject as $subject)
                                                    <th>{{ $subject->subject_name }}<br />
                                                        ({{ $subject->passing_mark }} / {{ $subject->full_marks }})
                                                    </th>
                                                @endforeach
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($getStudent) && !empty($getStudent->count()))
                                                @foreach ($getStudent as $student)
                                                    <form action={{ url('admin/examinations/submit_marks_register') }}
                                                        method="POST" name="post" class="SubmitForm">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="student_id"
                                                            value="{{ $student->id }}">
                                                        <input type="hidden" name="exam_id"
                                                            value="{{ Request::get('exam_id') }}">
                                                        <input type="hidden" name="class_id"
                                                            value="{{ Request::get('class_id') }}">

                                                        <input type="hidden" name="subject_id"
                                                            value="{{ Request::get('subject_id') }}">
                                                        <input type="hidden" name="college_id"
                                                            value="{{ Request::get('college_id') }}">
                                                        <input type="hidden" name="session_id"
                                                            value="{{ Request::get('session_id') }}">
                                                        <tr>
                                                            <td>{{ $student->name }} {{ $student->english_name }}</td>
                                                            @php
                                                                $i = 1;
                                                                $totalStudentMark = 0;
                                                                $totalFullMarks = 0;
                                                                $totalPassingMarks = 0;
                                                                $pass_fail_vali = 0;
                                                            @endphp
                                                            @foreach ($getSubject as $subject)
                                                                @php
                                                                    $totalMark = 0;
                                                                    $totalFullMarks =
                                                                        $totalFullMarks + $subject->full_marks;
                                                                    $totalPassingMarks =
                                                                        $totalPassingMarks + $subject->passing_mark;
                                                                    $getMark = $subject->getMark(
                                                                        $student->id,
                                                                        Request::get('exam_id'),
                                                                        Request::get('class_id'),
                                                                        $subject->subject_id,
                                                                    );
                                                                    if (!empty($getMark)) {
                                                                        $totalMark =
                                                                            $getMark->class_work +
                                                                            $getMark->home_work +
                                                                            $getMark->test_work +
                                                                            $getMark->exam;
                                                                    }
                                                                    $totalStudentMark = $totalStudentMark + $totalMark;
                                                                @endphp
                                                                <td>
                                                                    <div style="margin-bottom: 10px;">
                                                                        Class Work
                                                                        <input type="hidden"
                                                                            name="mark[{{ $i }}][id]"
                                                                            value="{{ $subject->id }}">
                                                                        <input type="hidden"
                                                                            name="mark[{{ $i }}][subject_id]"
                                                                            value="{{ $subject->subject_id }}">
                                                                        <input type="text"
                                                                            name="mark[{{ $i }}][class_work]"
                                                                            id="class_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                            placeholder="Enter Marks"
                                                                            value="{{ !empty($getMark->class_work) ? $getMark->class_work : 0 }}"
                                                                            style="width: 200px;" class="form-control">
                                                                    </div>
                                                                    <div style="margin-bottom: 10px;">
                                                                        Home Work
                                                                        <input type="text"
                                                                            name="mark[{{ $i }}][home_work]"
                                                                            id="home_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                            placeholder="Enter Marks"
                                                                            value="{{ !empty($getMark->home_work) ? $getMark->home_work : 0 }}"
                                                                            style="width: 200px;" class="form-control">
                                                                    </div>
                                                                    <div style="margin-bottom: 10px;">
                                                                        Test Work
                                                                        <input type="text"
                                                                            name="mark[{{ $i }}][test_work]"
                                                                            id="test_work_{{ $student->id }}{{ $subject->subject_id }}"
                                                                            placeholder="Enter Marks"
                                                                            value="{{ !empty($getMark->test_work) ? $getMark->test_work : 0 }}"
                                                                            style="width: 200px;" class="form-control">
                                                                    </div>
                                                                    <div style="margin-bottom: 10px;">
                                                                        Exam
                                                                        <input type="text"
                                                                            name="mark[{{ $i }}][exam]"
                                                                            id="exam_{{ $student->id }}{{ $subject->subject_id }}"
                                                                            placeholder="Enter Marks"
                                                                            value="{{ !empty($getMark->exam) ? $getMark->exam : 0 }}"
                                                                            style="width: 200px;" class="form-control">
                                                                    </div style="margin-bottom: 10px;">
                                                                    <div style="margin-bottom: 10px;">
                                                                        {{-- <button type="button"
                                                                            class="btn btn-primary SaveSingleSubject"
                                                                            id="{{ $student->id }}"
                                                                            data-val="{{ $subject->subject_id }}"
                                                                            data-exam="{{ Request::get('exam_id') }}"
                                                                            data-schedule="{{ $subject->id }}"
                                                                            data-class="{{ Request::get('class_id') }}">Save</button> --}}
                                                                    </div>
                                                                    @if (!empty($getMark))
                                                                        <div style="margin-bottom: 10px;">
                                                                            <b>Total Mark : </b>{{ $totalMark }}<br />
                                                                            <b>Passing Mark :
                                                                            </b>{{ $subject->passing_mark }}<br />
                                                                            @php
                                                                                $getLoopGrade = App\Models\MarksGradeModel::getGrade(
                                                                                    $totalMark,
                                                                                );
                                                                            @endphp
                                                                            @if (!empty($getLoopGrade))
                                                                                <b>Grade : </b>{{ $getLoopGrade }}<br />
                                                                            @endif
                                                                            @if ($totalMark >= $subject->passing_mark)
                                                                                <b>Result : </b> <span
                                                                                    style="color: green; font-weight: bold">Pass</span>
                                                                            @else
                                                                                <b>Result : </b> <span
                                                                                    style="color: red; font-weight: bold">Fail</span>
                                                                                @php
                                                                                    $pass_fail_vali = 1;
                                                                                @endphp
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                </td>
                                                                @php
                                                                    $i++;
                                                                @endphp
                                                            @endforeach
                                                            <td style="min-width: 250px">
                                                                <button type="submit"
                                                                    class="btn btn-success">Save</button>
                                                                @if (!empty($totalStudentMark))
                                                                    <br />
                                                                    <br />
                                                                    <b>Total Subject mark :</b> {{ $totalFullMarks }}
                                                                    <br />
                                                                    <b>Total Passing mark :</b> {{ $totalPassingMarks }}
                                                                    <br />
                                                                    <b>Total Student mark :</b> {{ $totalStudentMark }}
                                                                    <br />
                                                                    @php
                                                                        $percentage =
                                                                            ($totalStudentMark * 100) / $totalFullMarks;

                                                                        $getGrade = App\Models\MarksGradeModel::getGrade(
                                                                            $percentage,
                                                                        );
                                                                    @endphp
                                                                    <br />
                                                                    <b>Percentage : </b> {{ round($percentage, 2) }}%
                                                                    <br />
                                                                    <b>Grade : </b> {{ $getGrade }}
                                                                    <br />
                                                                    @if ($pass_fail_vali == 0)
                                                                        <b>Result : </b> <span
                                                                            style="color: green; font-weight: bold">Pass</span>
                                                                    @else
                                                                        <b> Result : </b> <span
                                                                            style="color: red; font-weight: bold">Fail</span>
                                                                    @endif
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </form>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        @endif
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                {{-- <div style="text-align: center; padding: 20px;">
                    <button class="btn btn-primary">Submit</button>
                </div> --}}
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    {{-- <script>
        $('.SubmitForm').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "admin/examinations/submit_marks_register",
                data: $(this).serialize(),
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                }
            });
        });

        $('.SaveSingleSubject').click(function(e) {

            var student_id = $(this).attr('id');
            var subject_id = $(this).attr('data-val');
            var exam_id = $(this).attr('data-exam');
            var class_id = $(this).attr('data-class');
            var id = $(this).attr('data-schedule');

            var class_work = $('#class_work_' + student_id + subject_id).val();
            var home_work = $('#home_work_' + student_id + subject_id).val();
            var test_work = $('#test_work_' + student_id + subject_id).val();
            var exam = $('#exam_' + student_id + subject_id).val();

            $.ajax({
                type: "POST",
                url: "http://localhost:8000/",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    student_id: student_id,
                    subject_id: subject_id,
                    exam_id: exam_id,
                    class_id: class_id,
                    class_work: class_work,
                    home_work: home_work,
                    test_work: test_work,
                    exam: exam,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                }
            });
        })
    </script> --}}
@endsection
