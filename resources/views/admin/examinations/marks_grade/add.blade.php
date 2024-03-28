@extends('layouts.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Marks Grade</h1>
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
                                    <div class="form-group">
                                        <label>Grade Name</label>
                                        <input required name="name" value="{{old('name')}}" type="text" class="form-control"
                                            placeholder="Grade Name">
                                    </div>

                                    <div class="form-group">
                                        <label>Percent From</label>
                                        <input required name="percent_from" value="{{old('percent_from')}}" type="number" class="form-control"
                                            placeholder="Percent From">
                                    </div>
                                    <div class="form-group">
                                        <label>Percent To</label>
                                        <input required name="percent_to" value="{{old('percent_to')}}" type="number" class="form-control"
                                            placeholder="Percent To">
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
