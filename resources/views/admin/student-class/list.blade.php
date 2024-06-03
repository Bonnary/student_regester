@extends('layouts.master')

@section('content')
    @php
        use App\Models\SubjectsModel;
        use App\Models\StudentClass;
        use App\Models\SessionsModel;
        use App\Models\SubjectsAndCollegesModel;
        use App\Models\CollegesModel;
    @endphp
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/student-class/add') }}" class="btn btn-primary">Add student to class</a>
                    </div>

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
                                <h3 class="card-title">Search Student</h3>


                            </div>
                            <form action="" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="form-group col-md-3">
                                            <label>Student ID</label>
                                            <input name="student_id" value="{{ Request::get('student_id') }}" type="text"
                                                class="form-control" placeholder="ID">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Subject</label>
                                            <select class="form-control" name="subject_id">
                                                <option value="">Select</option>
                                                @foreach ($subject as $sub)
                                                    <option {{ Request::get('subject_id') == $sub->id ? 'selected' : '' }}
                                                        value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>College</label>
                                            <select class="form-control" name="college_id">
                                                <option value="">Select</option>
                                                @foreach ($college as $coll)
                                                    <option {{ Request::get('college_id') == $coll->id ? 'selected' : '' }}
                                                        value="{{ $coll->id }}">{{ $coll->college_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Class</label>
                                            <select class="form-control" name="class_id">
                                                <option value="">Select</option>
                                                @foreach ($getClass as $class)
                                                    <option {{ Request::get('class_id') == $class->id ? 'selected' : '' }}
                                                        value="{{ $class->id }}">{{ $class->room }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Sessions</label>
                                            <select class="form-control" name="session_id">
                                                <option value="">Select</option>
                                                @foreach ($sessions as $sess)
                                                    <option {{ Request::get('session_id') == $sess->id ? 'selected' : '' }}
                                                        value="{{ $sess->id }}">{{ $sess->session_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/student-class/list') }}" class="btn btn-success"
                                                type="submit" style="margin-top: 30px">Clear</a>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <x-message></x-message>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Student Table </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Class Room</th>
                                            <th>Student ID</th>
                                            <th>Sessions</th>
                                            <th>Generation</th>
                                            <th>Subject</th>
                                            <th>College</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $getRecord->total(); $i++)
                                            @php
                                                $class_room = StudentClass::getSingleClass($getRecord[$i]->class_id)
                                                    ->room;
                                                $session = SessionsModel::getSingleSessionByID(
                                                    $getRecord[$i]->session_id,
                                                )->session_name;
                                                // dd($getRecord[$i]->subjects_and_colleges_id);
                                                $subject_and_college = SubjectsAndCollegesModel::getSingleSubjectAndCollegeByID(
                                                    $getRecord[$i]->subjects_and_colleges_id,
                                                );
                                                // dd($subject_and_college);
                                                $subject = SubjectsModel::getSubjectByID(
                                                    $subject_and_college->subject_id,
                                                )->subject_name;
                                                $college = CollegesModel::getCollegeName(
                                                    $subject_and_college->college_id,
                                                );
                                            @endphp
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $class_room }}</td>
                                                <td>{{ $getRecord[$i]->student_id }}</td>
                                                <td>{{ $session }}</td>
                                                <td>{{ $getRecord[$i]->generation }}</td>
                                                <td>{{ $subject }}</td>
                                                <td>{{ $college }}</td>

                                                <td>
                                                    <a href="{{ url('admin/student-class/delete/' . $getRecord[$i]->id) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>

                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{-- ! pagination --}}
                        @if ($getRecord->hasPages())
                            <div class="pagination-wrapper float-right">
                                {{ $getRecord->links() }}
                            </div>
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
