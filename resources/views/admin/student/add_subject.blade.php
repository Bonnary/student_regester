@extends('layouts.master')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add New Student</h1>
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
                                <div class="card-body ">
                                    <div class="row">

                                        {{-- ! left side --}}
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Colleges</label>
                                                <select name="college_id" class="form-control">
                                                    @foreach ($colleges as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->college_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        {{-- ! right side --}}
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Subjects</label>
                                                <select name="subject_id" class="form-control">
                                                    @foreach ($subjects as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                    </div>

                                    {{-- <select name="is_active" class="form-control">
                                        @foreach ($is_active as $role)
                                            <option value="{{ $role }}" @selected($role == 'Active')>
                                                {{ $role }}</option>
                                        @endforeach
                                    </select> --}}

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

@section('script')
    <script>
        $(function() {
            // Date picker
            $('.reservationdate').datetimepicker({
                format: 'DD/MM/YYYY',
                timePicker: false
            });

        })
    </script>
@endsection
