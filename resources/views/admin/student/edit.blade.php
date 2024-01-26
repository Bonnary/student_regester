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

                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body ">
                                    <div class="row">

                                        {{-- ! left side --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>ID</label>
                                                {{-- ! this is for show --}}
                                                <input disabled type="text" class="form-control" placeholder="ID"
                                                    value="{{ $getRecord->student_id }}">

                                                {{-- ! this is for input --}}

                                                <input style="display: none" name="student_id" type="text"
                                                    class="form-control" placeholder="ID"
                                                    value="{{ $getRecord->student_id }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Khmer name</label>
                                                <input name="khmer_name" type="text" class="form-control"
                                                    placeholder="Khmer name"
                                                    value="{{ old('khmer_name', $getRecord->khmer_name) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Sex</label>
                                                <select name="sex" class="form-control">
                                                    @foreach ($sex as $item)
                                                        <option value="{{ $item }}" @selected($item == old('sex', $getRecord->sex))>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Phone number</label>
                                                <input name="phone_number" type="text" class="form-control"
                                                    placeholder="Phone number"
                                                    value="{{ old('phone_number', $getRecord->phone_number) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Session</label>
                                                <select name="session_id" class="form-control">
                                                    @foreach ($sessions as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('session_id', $getRecord->session_id))>
                                                            {{ $item->session_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Student Job</label>
                                                <select name="student_job_id" class="form-control">
                                                    @foreach ($studentJobs as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('student_job_id', $getRecord->student_job_id))>
                                                            {{ $item->student_job_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Father occupation</label>
                                                <input name="father_occupation" type="text" class="form-control"
                                                    placeholder="Father occupation"
                                                    value="{{ old('father_occupation', $parentsInfoData->father_occupation) }}">

                                            </div>

                                            <div class="form-group">
                                                <label>Father phone number</label>
                                                <input name="father_phone_number" type="text" class="form-control"
                                                    placeholder="Father phone number"
                                                    value="{{ old('father_phone_number', $parentsInfoData->father_phone_number) }}">

                                            </div>

                                            <div class="form-group">
                                                <label>Mother occupation</label>
                                                <input name="mother_occupation" type="text" class="form-control"
                                                    placeholder="Mother occupation"
                                                    value="{{ old('mother_occupation', $parentsInfoData->mother_occupation) }}">

                                            </div>

                                        </div>

                                        {{-- ! middle side --}}
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label>Generation</label>
                                                <select name="generation" class="form-control">
                                                    @foreach ($generations as $item)
                                                        <option value="{{ $item }}" @selected($item == old('generation', $getRecord->generation))>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>English name</label>
                                                <input name="english_name" type="text" class="form-control"
                                                    placeholder="English name"
                                                    value="{{ old('english_name', $getRecord->english_name) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input name="nationality" type="text" class="form-control"
                                                    placeholder="Nationality"
                                                    value="{{ old('nationality', $getRecord->nationality) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Facebook or email</label>
                                                <input name="facebook_or_email" type="text" class="form-control"
                                                    placeholder="facebook or email"
                                                    value="{{ old('facebook_or_email', $getRecord->facebook_or_email) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Colleges</label>
                                                <select name="college_id" class="form-control">
                                                    @foreach ($colleges as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->college_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>




                                            <div class="form-group">
                                                <label>Family situation</label>
                                                <select name="family_situation_id" class="form-control">
                                                    @foreach ($familySituation as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('family_situations', $familySituationData->id))>
                                                            {{ $item->family_situation_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="form-group">
                                                <label>Mother name</label>
                                                <input name="mother_name" type="text" class="form-control"
                                                    placeholder="Mother name"
                                                    value="{{ old('mother_name', $parentsInfoData->mother_name) }}">

                                            </div>

                                            <div class="form-group">
                                                <label>Mother nationality</label>
                                                <input name="mother_nationality" type="text" class="form-control"
                                                    placeholder="Mother nationality"
                                                    value="{{ old('mother_nationality', $parentsInfoData->mother_nationality) }}">
                                            </div>


                                            <div class="form-group">
                                                <label>Enrollment</label>
                                                <select name="enrollment_type_id" class="form-control">
                                                    @foreach ($enrollment_types as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('enrollment_type_id', $enrollment_typeData->id))>
                                                            {{ $item->enrollment_type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        </div>

                                        {{-- ! right side --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input name="image" class="form-control" type="file"
                                                    id="upload-image">
                                                <img id="image-preview" src="{{ asset($getRecord->image) }}"
                                                    alt="Image Preview" style="width: 5rem;" />
                                            </div>

                                            <?php
                                            $getRecord->date_of_birth = date('m/d/Y', strtotime($getRecord->date_of_birth));
                                            ?>

                                            <div class="form-group">
                                                <label>Birthday</label>

                                                <input id="old-value" class="form-control" name="date_of_birth"
                                                    type="text" disabled value="{{ $getRecord->date_of_birth }}">

                                                <div id="new-value" style="display: none"
                                                    class="input-group date reservationdate" data-target-input="nearest">
                                                    <input name="date_of_birth" type="text"
                                                        class=" datetimepicker-input"
                                                        data-target=".reservationdate"
                                                        value="{{ old('date_of_birth') }}" />
                                                    <div class="input-group-append" data-target=".reservationdate"
                                                        data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>

                                                <button id="toggle-button" type="button">Change Date</button>
                                            </div>


                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" type="text" class="form-control"
                                                    placeholder="Address"
                                                    value="{{ old('address', $getRecord->address) }}">
                                            </div>

                                            <div class="form-group">
                                                <label>Father name</label>
                                                <input name="father_name" type="text" class="form-control"
                                                    placeholder="Father name"
                                                    value="{{ old('father_name', $parentsInfoData->father_name) }}">

                                            </div>

                                            <div class="form-group">
                                                <label>Father nationality</label>
                                                <input name="father_nationality" type="text" class="form-control"
                                                    placeholder="Father nationality"
                                                    value="{{ old('father_nationality', $parentsInfoData->father_nationality) }}">

                                            </div>


                                            <div class="form-group">
                                                <label>Subjects</label>
                                                <select name="subject_id" class="form-control">
                                                    @foreach ($subjects as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('subject_id', $subjectData->id))>
                                                            {{ $item->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Grade</label>
                                                <select name="grade_id" class="form-control">
                                                    @foreach ($grades as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('grade_id', $gradeData->id))>
                                                            {{ $item->grade_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Mother phone number</label>
                                                <input name="mother_phone_number" type="text" class="form-control"
                                                    placeholder="Mother phone number"
                                                    value="{{ old('mother_phone_number', $parentsInfoData->mother_phone_number) }}">

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

        document.getElementById('upload-image').addEventListener('change', function(e) {
            var reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('image-preview').style.display = 'block';
                document.getElementById('image-preview').src = event.target.result;
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        document.getElementById('toggle-button').addEventListener('click', function() {
            var oldValue = document.getElementById('old-value');
            var newValue = document.getElementById('new-value');

            if (oldValue.style.display === 'none') {
                oldValue.style.display = 'block';
                newValue.style.display = 'none';
            } else {
                oldValue.style.display = 'none';
                newValue.style.display = 'block';
            }
        });
    </script>
@endsection
