@extends('layouts.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Account</h1>
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
                                        <label>Email address</label>
                                        <input disabled type="email" value="{{ old('email', $getRecord->email) }}"
                                            class="form-control" placeholder="email">
                                        {{-- ! this is for validate error --}}
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input required name="name" type="text"
                                            value="{{ old('email', $getRecord->name) }}" class="form-control"
                                            placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" name="password" class="form-control" placeholder="Password">
                                        <p>If you want to change the password add a new one else leave it blank</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>

                                        <select name="role" class="form-control">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}" @selected($getRecord->role == $role)>
                                                    {{ $role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>



                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
