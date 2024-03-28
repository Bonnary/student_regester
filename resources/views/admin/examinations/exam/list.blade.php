@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Exam List (Total : {{ $getRecord->total() }})</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <a href="{{ url('admin/examinations/exam/add') }}" class="btn btn-primary">Add New Exam</a>
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
                                <h3 class="card-title">Search Exam</h3>
                            </div>
                            <form action="" method="GET">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Exam Name</label>
                                            <input name="name" value="{{ Request::get('name') }}" type="text"
                                                class="form-control" placeholder="Exam Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label>Date</label>
                                            <input name="date" value="{{ Request::get('date') }}" type="date"
                                                class="form-control" placeholder="Date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <button class="btn btn-primary"
                                                style="margin-top: 30px">Search</button>
                                            <a href="{{ url('admin/examinations/exam/list') }}" class="btn btn-success"
                                                style="margin-top: 30px">Reset</a>
                                        </div>
                                    </div>
                                </div>


                            </form>
                        </div>

                        <x-message></x-message>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Exam List </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Exam Name</th>
                                            <th>Note</th>
                                            <th>Created By</th>
                                            <th>Created Date</th>
                                            {{-- <th>Updated Date</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < $getRecord->total(); $i++)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                {{-- <td>{{ $getRecord[$i]->id }}</td> --}}
                                                <td>{{ $getRecord[$i]->name }}</td>
                                                <td>{{ $getRecord[$i]->note }}</td>
                                                <td>{{ $getRecord[$i]->created_name }}</td>
                                                <td>{{ date('d-m-Y h:i A', strtotime($getRecord[$i]->created_at)) }}</td>
                                                <td>
                                                    <a href="{{ url('admin/examinations/exam/edit/' . $getRecord[$i]->id) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a href="{{ url('admin/examinations/exam/delete/' . $getRecord[$i]->id) }}"
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
