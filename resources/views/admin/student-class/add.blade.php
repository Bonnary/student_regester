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



                                    <select name="class_room" class="form-control">
                                        @foreach ($class as $cla)
                                            <option value="{{ $cla->room }}">
                                                {{ $cla->room }}</option>
                                        @endforeach
                                    </select>

                                    <div class="form-group">
                                        <label>Student ID</label>
                                        <input required name="student_id" type="text" class="form-control"
                                            placeholder="Student ID">
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
