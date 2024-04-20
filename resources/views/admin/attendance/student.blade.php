@extends('layouts.master')
@section('content')
    @php
        use App\Models\StudentModel;
        use App\Models\StudentAttendanceModel;
    @endphp
    <div class ="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student Attendance</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section> I
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Search Student Attendance</h3>
                            </div>
                            <form method="get" action="">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id" id="getClass" required >
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->room }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                         <div class="form-group col-md-3">
                                            <label>Subject</label>
                                            <select class="form-control" name="subject_id" id="getSubject" required>
                                                <option value="">Select</option>
                                                @foreach ($subject as $sub)
                                                    <option {{ Request::get('subject_id') == $sub->id ? 'selected' : '' }}
                                                        value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>College</label>
                                            <select class="form-control" name="college_id" id="getCollege" required>
                                                <option value="">Select</option>
                                                @foreach ($college as $coll)
                                                    <option {{ Request::get('college_id') == $coll->id ? 'selected' : '' }}
                                                        value="{{ $coll->id }}">{{ $coll->college_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>



                                        <div class="form-group col-md-3">
                                            <label>Sessions</label>
                                            <select class="form-control" name="session_id" id="getSession" required>
                                                <option value="">Select</option>
                                                @foreach ($sessions as $sess)
                                                    <option {{ Request::get('session_id') == $sess->id ? 'selected' : '' }}
                                                        value="{{ $sess->id }}">{{ $sess->session_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Attendance Date</label>
                                            <input type="date" class="form-control" id="getAttendanceDate"
                                                value="{{ Request::get('attendance_date') }}" required
                                                name="attendance_date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/attendance/student') }}" class="btn btn-success"
                                                style="margin-top: 30px;">
                                                Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- @if (!empty(Request::get('class_id')) && !empty(Request::get('attendance_date'))) --}}
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Student ID</th>
                                            <th> Student Name</th>
                                            <th>Attendance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @if (!empty($getSubject) && !empty($getSubject->count())) --}}
                                        @foreach ($getStudent as $value)
                                            @php
                                                // use App\Models\StudentModel;

                                                $attendance_type = '';
                                                // $getAttendance = StudentModel::getAttendance(
                                                //     $value->id,
                                                //     Request::get('class_id'),
                                                //     Request::get('attendance_date'),
                                                // );
                                                $getAttendance = StudentAttendanceModel::CheckAlreadyAttendance(
                                                    $value->id,
                                                    Request::get('class_id'),
                                                    Request::get('subject_id'),
                                                    Request::get('college_id'),
                                                    Request::get('session_id'),
                                                    Request::get('attendance_date')
                                                );
                                                // dd($getAttendance);
                                                if (!empty($getAttendance->attendance_type)) {
                                                    $attendance_type = $getAttendance->attendance_type;
                                                }
                                            @endphp
                                            <tr>

                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->english_name }}</td>
                                                <td>
                                                    <label style="margin-right: 10px;"><input value="1" type="radio"
                                                            {{ $attendance_type == '1' ? 'checked' : '' }}
                                                            id ="{{ $value->id }}" class="SaveAttendance"
                                                            name="attendance{{ $value->id }}">
                                                        Present</label>
                                                    <label style="margin-right: 10px;"><input value="2" type="radio"
                                                            {{ $attendance_type == '2' ? 'checked' : '' }}
                                                            id ="{{ $value->id }}" class="SaveAttendance"
                                                            name="attendance{{ $value->id }}">
                                                        Permission</label>
                                                    <label style="margin-right: 10px;"><input value="3" type="radio"
                                                            {{ $attendance_type == '3' ? 'checked' : '' }}
                                                            id ="{{ $value->id }}" class="SaveAttendance"
                                                            name="attendance{{ $value->id }}">
                                                        Absent
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- @endif --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
    <script defer type="text/javascript">
        $('.SaveAttendance').change(function(e) {
            var student_id = $(this).attr('id');
            var attendance_type = $(this).val();
            var class_id = $('#getClass').val();
            var subject_id = $('#getSubject').val();
            var college_id = $('#getCollege').val();
            var session_id = $('#getSession').val();
            var attendance_date = $('#getAttendanceDate').val();

            $.ajax({
                type: "POST",
                url: "/admin/attendance/student/save",
                data: {
                    "_token": "{{ csrf_token() }}",
                    student_id: student_id,
                    attendance_type: attendance_type,
                    class_id: class_id,
                    subject_id: subject_id,
                    college_id: college_id,
                    session_id: session_id,
                    attendance_date: attendance_date,
                },
                dataType: "json",
                success: function(data) {
                    alert(data.message);
                }
            });
        });
    </script>
@endsection
