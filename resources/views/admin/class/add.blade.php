@extends('layouts.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Class</h1>
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
                                        <label>Room</label>
                                        <input required name="name" value="{{ old('name') }}" type="text"
                                            class="form-control" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="" class="form-control">
                                            
                                        </select>
                                        <input required name="name" value="{{ old('name') }}" type="text"
                                            class="form-control" placeholder="Full Name">
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
