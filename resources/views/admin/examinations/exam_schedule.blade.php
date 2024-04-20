@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam Schedule</h1>
                    </div>
                    {{-- <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/examinations/exam/add') }}" class="btn btn-primary">Add New Exam</a>
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
                                <h3 class="card-title">Search Exam Schedule</h3>
                            </div>
                            <form action="" method="GET">
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
                                                    <option
                                                        {{ Request::get('college_id') == $coll->id ? 'selected' : '' }}
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
                        {{-- /.card-header --}}
                        @if (!empty($getRecord))
                            <form action="{{ url('admin/examinations/exam_schedule_insert') }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Exam Schedule </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>College Name</th>
                                                    <th>Subject Name</th>
                                                    <th>Session Name</th>
                                                    <th>Exam Date</th>
                                                    <th>Start Time</th>
                                                    <th>End Time</th>
                                                    {{-- <th>Room Number</th> --}}
                                                    <th>Full Marks</th>
                                                    <th>Passing Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach ($getRecord as $value)
                                                    <tr>
                                                        <td>{{ $value['college_name'] }}
                                                            <input type="hidden" class="form-control"
                                                                value="{{ Request::get('college_id') }}"
                                                                name="schedule[{{ $i }}][college_id]">
                                                        </td>
                                                        <td>{{ $value['subject_name'] }}
                                                            <input type="hidden" class="form-control"
                                                                value="{{ Request::get('subject_id') }}"
                                                                name="schedule[{{ $i }}][subject_id]">
                                                        </td>
                                                        <td>{{ $value['session_name'] }}
                                                            <input type="hidden" class="form-control"
                                                                value="{{ Request::get('session_id') }}"
                                                                name="schedule[{{ $i }}][session_id]">
                                                        </td>
                                                        <td><input type="date" class="form-control"
                                                                value="{{ $value['exam_date'] }}"
                                                                name="schedule[{{ $i }}][exam_date]"></td>
                                                        <td><input type="time" class="form-control"
                                                                value="{{ $value['start_time'] }}"
                                                                name="schedule[{{ $i }}][start_time]"></td>
                                                        <td><input type="time" class="form-control"
                                                                value="{{ $value['end_time'] }}"
                                                                name="schedule[{{ $i }}][end_time]"></td>
                                                        <td><input type="text" class="form-control"
                                                                value="{{ $value['full_marks'] }}"
                                                                name="schedule[{{ $i }}][full_marks]"></td>
                                                        <td><input type="text" class="form-control"
                                                                value="{{ $value['passing_mark'] }}"
                                                                name="schedule[{{ $i }}][passing_mark]"></td>
                                                    </tr>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div style="text-align: center; padding: 20px;">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                            </form>
                        @endif

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
