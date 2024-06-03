@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add New Student</a>
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
                                            <label>English name</label>
                                            <input name="english_name" value="{{ Request::get('english_name') }}"
                                                type="text" class="form-control" placeholder="English name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Generation</label>
                                            <input name="generation" value="{{ Request::get('generation') }}" type="text"
                                                class="form-control" placeholder="Generation">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary" type="submit"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/student/list') }}" class="btn btn-success" type="submit"
                                                style="margin-top: 30px">Clear</a>
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Gender</th>
                                            <th>Major</th>
                                            <th>Generation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            use App\Models\SubjectsAndCollegesModel;
                                            use App\Models\SubjectsModel;

                                        @endphp


                                        @for ($i = 0; $i < $getRecord->total(); $i++)
                                            @php

                                                $subjects_and_college = SubjectsAndCollegesModel::getSingleSubjectAndCollegeByID(
                                                    $getRecord[$i]->subjects_and_colleges_id,
                                                );

                                                $subject = SubjectsModel::getSubjectByID(
                                                    $subjects_and_college->subject_id,
                                                );

                                            @endphp


                                            <div class="modal fade" id="popUp" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div
                                                            class="modal-body d-flex justify-content-center align-items-center flex-lg-column">
                                                            <img src="{{ $getRecord[$i]->image }}" style="width: 10rem"
                                                                alt="..." class="img-thumbnail">

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-sm-6">Hello</div>
                                                                    <div class="col-sm-6">Hello</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- <div class="modal-footer">

                                                            <button type="button" class="btn btn-primary">Close</button>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- !Table --}}
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $getRecord[$i]->id }}</td>
                                                <td>{{ $getRecord[$i]->english_name }}</td>
                                                <td>{{ $getRecord[$i]->sex }}</td>
                                                <td>{{ $subject->subject_name }}</td>
                                                <td>{{ $getRecord[$i]->generation }}</td>
                                                <td>

                                                    {{-- <button type="button" class="btn btn-secondary" data-toggle="modal"
                                                        data-target="#popUp">
                                                        Detail
                                                    </button> --}}
                                                    <a href="{{ url('admin/student/certificate/' . $getRecord[$i]->id) }}"
                                                        class="btn btn-secondary">Certificate</a>
                                                    <a href="{{ url('admin/student/edit/' . $getRecord[$i]->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/student/delete/' . $getRecord[$i]->id) }}"
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
