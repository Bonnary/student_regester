@extends('layouts.master')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Student to Class</h1>
                    </div>
                </div>
            </div>
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sessions</label>
                                                <select name="session_id" class="form-control">
                                                    @foreach ($sessions as $se)
                                                        <option value="{{ $se->id }}">
                                                            {{ $se->session_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Room</label>
                                                <select name="class_id" class="form-control">
                                                    @foreach ($class as $cla)
                                                        <option value="{{ $cla->id }}">
                                                            {{ $cla->room }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Subject</label>
                                                <select name="college_id" class="form-control">
                                                    @foreach ($college as $coll)
                                                        <option value="{{ $coll->id }}">
                                                            {{ $coll->college_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Student ID</label>
                                                <input required name="student_id" type="text" class="form-control"
                                                    placeholder="Student ID">
                                            </div>
                                            <div class="form-group">
                                                <label>Generation</label>
                                                <input required name="generation" type="number" class="form-control"
                                                    placeholder="Generation">
                                            </div>

                                            <div class="form-group">
                                                <label>Subject</label>
                                                <select name="subject_id" class="form-control">
                                                    @foreach ($subject as $sub)
                                                        <option value="{{ $sub->id }}">
                                                            {{ $sub->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>






                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
