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


            {{-- ! student detail --}}
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
                                                <label>Student Job</label>
                                                <select name="student_job_id" class="form-control">
                                                    @foreach ($studentJobs as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('student_job_id'))>
                                                            {{ $item->student_job_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Session</label>
                                                <select name="session_id" class="form-control">
                                                    @foreach ($sessions as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('session_id'))>
                                                            {{ $item->session_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nationality</label>
                                                <input name="nationality" type="text" class="form-control"
                                                    placeholder="Nationality" value="{{ old('nationality') }}">
                                            </div>
                                            <div class="form-group">
                                                <label>Image</label>
                                                <input name="image" class="form-control" type="file" id="upload-image">
                                                <img id="image-preview" src="#" alt="Image Preview"
                                                    style="display: none; width: 5rem;" />
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

                                            <div class="form-group">
                                                <label>Family situation</label>
                                                <select name="family_situation_id" class="form-control">
                                                    @foreach ($familySituation as $item)
                                                        <option value="{{ $item->id }}" @selected($item->id == old('family_situations'))>
                                                            {{ $item->family_situation_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Generation</label>
                                                <select name="generation" class="form-control">
                                                    @foreach ($generations as $item)
                                                        <option value="{{ $item }}" @selected($item == old('generation'))>
                                                            {{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Enrollment</label>
                                                <select name="enrollment_type_id" class="form-control">
                                                    @foreach ($enrollment_types as $item)
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->enrollment_type_name }}</option>
                                                    @endforeach
                                                </select>
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
                                                <label>Facebook/Email</label>
                                                <input name="facebook_or_email" type="text" class="form-control"
                                                    placeholder="Email">
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <label>Father Nationality</label>
                                                    <input name="father_nationality" type="text" class="form-control"
                                                        placeholder="Nationality">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Father Occupation</label>
                                                    <input name="father_occupation" type="text" class="form-control"
                                                        placeholder="Occupation">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-6">
                                                    <label>Mother Nationality</label>
                                                    <input name="mother_nationality" type="text" class="form-control"
                                                        placeholder="Nationality">
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Mother Occupation</label>
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

            {{-- ! Subject --}}
            <section class="content border-dark">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-secondary">

                                <div class="card-body ">
                                    <h4 class="text-center">Associate & Bachelor</h4>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5>១. សិល្បះ មនុស្សសាស្រ្ត និង ភាសា</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="1|1">
                                                    <label class="form-check-label" for="inlineRadio1">English for
                                                        Communication</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="2|1">
                                                    <label class="form-check-label" for="inlineRadio1">Teaching
                                                        English</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>២. វិទ្យាសាស្រ្ត និង បច្ចេកវិទ្យា</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="3|2">
                                                    <label class="form-check-label" for="inlineRadio1">Networking</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="4|2">
                                                    <label class="form-check-label" for="inlineRadio1">Programming</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>៣. នីតិសាស្រ្ត</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="5|3">
                                                    <label class="form-check-label" for="inlineRadio1">Law</label>
                                                </div>
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio2" value="6|3">
                                                    <label class="form-check-label" for="inlineRadio2">Public
                                                        Administration</label>
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="7|3">
                                                    <label class="form-check-label" for="inlineRadio1">Diplomatic
                                                        Law</label>
                                                </div>
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio2" value="8|3">
                                                    <label class="form-check-label" for="inlineRadio2">International
                                                        Organization Law</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5>៤. វិទ្យាសាស្រ្តសង្គម និងគ្រប់គ្រងសេដ្ឋកិច្ច</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="9|4">
                                                    <label class="form-check-label" for="inlineRadio1">Finance and
                                                        Banking</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="10|4">
                                                    <label class="form-check-label" for="inlineRadio1">Development
                                                        Economics</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="11|4">
                                                    <label class="form-check-label" for="inlineRadio1">Investment and
                                                        Stock Market</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>៥. គ្រប់គ្រងពាណិជ្ជកម្ម និង គណនេយ្យ</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="12|5">
                                                    <label class="form-check-label" for="inlineRadio1">Marketing and
                                                        Communication</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="13|5">
                                                    <label class="form-check-label" for="inlineRadio1">Management and
                                                        Leadership</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="14|5">
                                                    <label class="form-check-label" for="inlineRadio1">Accounting and
                                                        Auditing</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <h5>៦. គ្រប់គ្រងសណ្ឋាគារ និង ទេសចរណ៍</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="15|6">
                                                    <label class="form-check-label" for="inlineRadio1">Hospitality and
                                                        Tourism Mannagement</label>
                                                </div>


                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio2" value="16|6">
                                                    <label class="form-check-label" for="inlineRadio2">International
                                                        Hospital and MICE Management</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio2" value="17|6">
                                                    <label class="form-check-label" for="inlineRadio2">Hospitality and
                                                        Tourism Mannagement</label>
                                                </div>
                                            </div>



                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <h5>៧. វិទ្យាសាស្រ្ត វិស្វកម្ម ណិងបច្ចេកវិទ្យា</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="18|7">
                                                    <label class="form-check-label" for="inlineRadio1">Achitechural and
                                                        Interior Design</label>
                                                </div>
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="19|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Bridge, Road & Hydraulic Design & Contraction
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="20|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Urban Planning and Lanscape Design
                                                    </label>

                                                </div>

                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="21|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Electrical Installation in Building
                                                    </label>

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="22|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Building Design & Contraction
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="23|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Electrical control System
                                                    </label>
                                                </div>

                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="24|7">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Power Transmission and Distribution Line
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <h5>៨. វិទ្យាសាស្រ្តអប់រំ</h5>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="25|8">
                                                    <label class="form-check-label" for="inlineRadio1">History</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="26|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Philosophy
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="27|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Khmer Literature
                                                    </label>

                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="28|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Mathematics
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="29|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Chemistry
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="30|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Physics
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="31|8">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Biology
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <h4 class="text-center">Master</h4>

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="32|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Business Adminstration
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="33|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Arts in English
                                                    </label>

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="6|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Public Administration
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="34|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Fanance and Banking
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="35|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Science and Information Technology
                                                    </label>

                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="36|9">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Hospitality and Tourism Management
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <h4 class="text-center">Doctor</h4>

                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="33|10">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Business Adminstration
                                                    </label>
                                                </div>

                                            </div>


                                        </div>

                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <div class="form-check form-check-inline pr-5">
                                                    <input class="form-check-input" type="radio"
                                                        name="subject_and_college" id="inlineRadio1" value="6|10">
                                                    <label class="form-check-label" for="inlineRadio1">
                                                        Public Administration
                                                    </label>
                                                </div>

                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </div>



                        </div>



                    </div>

                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
    </div>

    </section>
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
