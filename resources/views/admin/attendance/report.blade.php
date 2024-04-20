@extends('layouts.master')
@section('content')
    <div class ="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Attendance Report </h1>
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
                                <h3 class="card-title">Search Attendance Report</h3>
                            </div>
                            <form method="post" action="">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id" id="getClass" required>
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
                                        <div class="form-group col-md-2">
                                            <label>Attendance Type</label>
                                            <select class="form-control" name="attendance_type">
                                                <option value="">Select</option>
                                                <option {{ Request::get('attendance_type') == 1 ? 'selected' : '' }}
                                                    value="1">Present</option>
                                                <option {{ Request::get('attendance_type') == 2 ? 'selected' : '' }}
                                                    value="2">Permission</option>
                                                <option {{ Request::get('attendance_type') == 3 ? 'selected' : '' }}
                                                    value="3">Absent</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px;">Search</button>
                                            <a href="{{ url('admin/attendance/report') }}" class="btn btn-success"
                                                style="margin-top: 30px;">
                                                Reset</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Attendance List</h3>
                                <form style="float: right;" action="{{ url('admin/attendance/report_export_excel') }}"
                                    method="post">
                                    @csrf
                                    <input type="hidden" name="student_id" value="{{ Request::get('student_id') }}">
                                    <input type="hidden" name="student_name" value="{{ Request::get('student_nname') }}">
                                    <input type="hidden" name="student_last_name"
                                        value="{{ Request::get('student_last_name') }}">
                                    <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                    <input type="hidden" name="start_attendance_date"
                                        value="{{ Request::get('start_attendance_date') }}">
                                    <input type="hidden" name="end_attendance_date"
                                        value="{{ Request::get('end_attendance_date') }}">
                                    <input type="hidden" name="attendance_type"
                                        value="{{ Request::get('attendance_type') }}">
                                    <button class = "btn btn-primary">Export Excel</button>
                                </form>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0" style="overflow: auto;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th> Student ID</th>
                                            <th> Student Name</th>
                                            <th> Class Name</th>
                                            <th>Attendance Type</th>
                                            <th>Attendance Date</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getRecord as $value)
                                            <tr>
                                                <td>{{ $value->student_id }}</td>
                                                <td>{{ $value->student_name }} {{ $value->student_last_name }}</td>
                                                <td> {{ $value->class_name }}</td>
                                                <td>
                                                    @if ($value->attendance_type == 1)
                                                        Present
                                                    @elseif($value->attendance_type == 2)
                                                        Permission
                                                    @elseif ($value->attendance_type == 3)
                                                        Absent
                                                    @endif
                                                </td>
                                                <td> {{ date('d-m-Y', strtotime($value->attendance_date)) }} </td>
                                                <td> {{ $value->created_name }} </td>
                                                <td> {{ date('d-m-Y H:i A', strtotime($value->created_at)) }} </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="100%">Record not found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- @if ($getRecord->hasPages())
                                    <div class="pagination-wrapper float-right">
                                        {{ $getRecord->links() }}
                                    </div>
                                @endif --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('script')
@endsection
