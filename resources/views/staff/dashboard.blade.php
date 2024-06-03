@extends('layouts.master')

@section('content')

    <div class="content-wrapper">
        {{-- Content Header (Page header) --}}
        <div class="content-header">
            <div class="container-fluid text-center ">
                <div class="login-logo">
                    <img style="max-width: 200px; max-height: 200px;" src={{ URL::to('assets/dist/img/logo.jpg') }}
                        alt="">
                </div>
                <h1>បង្កើតដោយក្រុម IT programing ជំនាន់ទី 18</h1>
                {{-- list of name --}}
                <h2 class="mt-4">សមាជិកក្រុម</h2>
                <ul class="list-group">
                    <li class="list-group-item">វ៉េត ប៉ុណ្ណារី</li>
                    <li class="list-group-item">ឈុន ឈុនឡេង</li>
                    <li class="list-group-item">ឆាយ រតនះ</li>
                    <li class="list-group-item">វិន តេនវិសាល</li>
                    <li class="list-group-item">ជីន វ៉ានលាន</li>
                </ul>
            </div>{{-- /.container-fluid --}}
        </div>
        {{-- /.content-header --}}

        {{-- Main content --}}

        {{-- /.content --}}
    </div>

@endsection
