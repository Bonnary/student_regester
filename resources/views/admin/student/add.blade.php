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


        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">

                                <div class="card-body ">
                                    <div class="row">

                                        {{-- ! left side --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Khmer Name</label>
                                                <input name="khmer_name" type="text" class="form-control"
                                                    placeholder="Khmer Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <div class="input-group date reservationdate" data-target-input="nearest">
                                                    <input name="date_of_birth" type="text"
                                                        class="form-control datetimepicker-input"
                                                        data-target=".reservationdate" value="{{ old('date_of_birth') }}" />
                                                    <div class="input-group-append" data-target=".reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Address">
                                            </div>

                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input name="phone_number" type="text" class="form-control"
                                                    placeholder="Phone number">
                                            </div>

                                            <div class="form-group">
                                                <label>Father's Name</label>
                                                <input name="father_name" type="text" class="form-control"
                                                    placeholder="Father's Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Mother's Name</label>
                                                <input name="mother_name" type="text" class="form-control"
                                                    placeholder="Mother's Name">
                                            </div>

                                            <div class="form-group">
                                                <label>Father's Tel</label>
                                                <input name="father_phone_number" type="text" class="form-control"
                                                    placeholder="Father's Tel">
                                            </div>
                                        </div>

                                        {{-- ! right side --}}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>English Name</label>
                                                <input name="english_name" type="text" class="form-control"
                                                    placeholder="English Name">
                                            </div>

                                            <div class="form-group mt-5 pt-2 ml-5">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio2" value="Female">
                                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Address">
                                            </div>

                                            <div class="form-group">
                                                <label>Facebook/Email</label>
                                                <input name="facebook_or_email" type="text" class="form-control"
                                                    placeholder="Email">
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <label>Nationality</label>
                                                    <input name="father_nationality" type="text" class="form-control"
                                                        placeholder="Nationality">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Occupation</label>
                                                    <input name="father_occupation" type="text" class="form-control"
                                                        placeholder="Occupation">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label>Nationality</label>
                                                    <input name="mother_nationality" type="text" class="form-control"
                                                        placeholder="Nationality">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Occupation</label>
                                                    <input name="mother_occupation" type="text" class="form-control"
                                                        placeholder="Occupation">
                                                </div>
                                            </div>

                                            <div class="form-group m-3">
                                                <label>Mother's Tel</label>
                                                <input name="mother_phone_number" type="text" class="form-control"
                                                    placeholder="Mother's Tel">
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



                            </div>



                        </div>

                    </div>

                </div>
            </section>


            <section class="content border-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-secondary">
                                {{-- cart header --}}
                                <div class="card-header">

                                    <div class="form-group">
                                        <div class="form-check form-check-inline pr-5">
                                            <input class="form-check-input" type="radio" name="sex"
                                                id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Associate</label>
                                        </div>
                                        <div class="form-check form-check-inline pr-5">
                                            <input class="form-check-input" type="radio" name="sex"
                                                id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Bachelor</label>
                                        </div>
                                        <div class="form-check form-check-inline pr-5">
                                            <input class="form-check-input" type="radio" name="sex"
                                                id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Master</label>
                                        </div>
                                        <div class="form-check form-check-inline pr-5">
                                            <input class="form-check-input" type="radio" name="sex"
                                                id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Doctor</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-body ">
                                    <h5 class="text-center">Associate & Bachelor</h5>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5>១. សិល្បះ មនុស្សសាស្រ្ត និង ភាសា</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">English for
                                                        Communication</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Teaching
                                                        English</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>២. វិទ្យាសាស្រ្ត និង បច្ចេកវិទ្យា</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Finance and
                                                        Banking</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Development
                                                        Economics</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>៣. នីតិសាស្រ្ត</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Law</label>
                                                </div>
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio2" value="Female">
                                                    <label class="form-check-label" for="inlineRadio2">Public
                                                        Administration</label>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio1" value="Male">
                                                    <label class="form-check-label" for="inlineRadio1">Diplomatic
                                                        Law</label>
                                                </div>
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio" name="sex"
                                                        id="inlineRadio2" value="Female">
                                                    <label class="form-check-label" for="inlineRadio2">International
                                                        Organization Law</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>



                    </div>

                </div>

    </div>
    </section>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
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

        document.getElementById('upload-image').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('image-preview').style.display = 'block';
                document.getElementById('image-preview').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    </script>
@endsection
