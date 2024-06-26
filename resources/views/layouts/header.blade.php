<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- Left navbar links --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href={{ URL::to('assets/#') }} role="button"><i
                    class="fas fa-bars"></i></a>
        </li>
    </ul>

    {{-- Right navbar links --}}
    <ul class="navbar-nav ml-auto">


        {{-- Messages Dropdown Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href={{ URL::to('assets/#') }}>
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    {{-- Message Start --}}
                    <div class="media">
                        <img src={{ URL::to('assets/dist/img/user1-128x128.jpg') }} alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    {{-- Message End --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    {{-- Message Start --}}
                    <div class="media">
                        <img src={{ URL::to('assets/dist/img/user8-128x128.jpg') }} alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    {{-- Message End --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    {{-- Message Start --}}
                    <div class="media">
                        <img src={{ URL::to('assets/dist/img/user3-128x128.jpg') }} alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                    {{-- Message End --}}
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        {{-- Notifications Dropdown Menu --}}
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href={{ URL::to('assets/#') }}>
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href={{ URL::to('assets/#') }} class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href='#'id="goFS" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

    </ul>
</nav>

{{-- Main Sidebar Container --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    {{-- Brand Logo --}}
    <a href='#' class="brand-link">
        <img src={{ URL::to('assets/dist/img/logo.jpg') }} alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Western University</span>
    </a>

    {{-- Sidebar --}}
    <div class="sidebar">
        {{-- Sidebar user panel (optional) --}}
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src={{ URL::to('assets/dist/img/user2-160x160.jpg') }} class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                {{-- ? This will change depand on the user name from the database --}}
                <a href={{ URL::to('assets/#') }} class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>


        {{-- Sidebar Menu --}}
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">


                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a href={{ url('admin/dashboard') }}
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                {{-- !
                                    Ex: 12.3.3.1/admin/dashboard
                                    12.3.3.1 is the url
                                    /admin/dashboard is segment
                                    admin is first segment
                                    dashboard is second segment
                                ! --}}
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/admin/list') }}
                            class="nav-link {{ Request::segment(2) == 'admin' ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Admin
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/class/list') }}
                            class="nav-link {{ Request::segment(2) == 'class' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-school"></i>
                            <p>
                                Class
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/student/list') }}
                            class="nav-link {{ Request::segment(2) == 'student' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-graduate"></i>
                            <p>
                                Student
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/student-class/list') }}
                            class="nav-link {{ Request::segment(2) == 'student-class' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-school"></i>
                            <p>
                                Student Class
                            </p>
                        </a>
                    </li>

                    <!-- Attendance -->

                    <li class="nav-item">
                        <a href="{{ url('admin/attendance/student') }}"
                            class="nav-link @if (Request::segment(3) == 'student') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Attendance</p>
                        </a>
                    </li>
                    <!-- Attendance report -->
                    <li class="nav-item">
                        <a href="{{ url('admin/attendance/report') }}"
                            class="nav-link @if (Request::segment(3) == 'report') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance Report</p>
                        </a>
                    </li>



                    <li
                        class="nav-item @if (Request::segment(2) == 'examinations') menu-is-opening
                    menu-open @endif">
                        <a href="#" class="nav-link @if (Request::segment(2) == 'examinations') active @endif">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Examinations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/exam/list') }}"
                                    class="nav-link @if (Request::segment(3) == 'exam') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/exam_schedule') }}"
                                    class="nav-link @if (Request::segment(3) == 'exam_schedule') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/marks_register') }}"
                                    class="nav-link @if (Request::segment(3) == 'marks_register') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marks Register</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ url('admin/examinations/marks_grade') }}"
                                    class="nav-link @if (Request::segment(3) == 'marks_grade') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marks Grade</p>
                                </a>
                            </li> --}}
                        </ul>

                    </li>
                @elseif(Auth::user()->role == 'staff')
                    <li class="nav-item">
                        <a href={{ url('staff/dashboard') }}
                            class="nav-link {{ Request::segment(2) == 'dashboard' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/class/list') }}
                            class="nav-link {{ Request::segment(2) == 'class' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-school"></i>
                            <p>
                                Class
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href={{ url('admin/student/list') }}
                            class="nav-link {{ Request::segment(2) == 'student' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user-graduate"></i>
                            <p>
                                Student
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href={{ url('admin/student-class/list') }}
                            class="nav-link {{ Request::segment(2) == 'student-class' ? 'active' : '' }}">
                            <i class="nav-icon fa fa-school"></i>
                            <p>
                                Student Class
                            </p>
                        </a>
                    </li>

                    <!-- Attendance -->

                    <li class="nav-item">
                        <a href="{{ url('admin/attendance/student') }}"
                            class="nav-link @if (Request::segment(3) == 'student') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Student Attendance</p>
                        </a>
                    </li>
                    <!-- Attendance report -->
                    <li class="nav-item">
                        <a href="{{ url('admin/attendance/report') }}"
                            class="nav-link @if (Request::segment(3) == 'report') active @endif">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Attendance Report</p>
                        </a>
                    </li>


                    <li
                        class="nav-item @if (Request::segment(2) == 'examinations') menu-is-opening
                    menu-open @endif">
                        <a href="#" class="nav-link @if (Request::segment(2) == 'examinations') active @endif">
                            <i class="nav-icon fas fa-table"></i>
                            <p>
                                Examinations
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/exam/list') }}"
                                    class="nav-link @if (Request::segment(3) == 'exam') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/exam_schedule') }}"
                                    class="nav-link @if (Request::segment(3) == 'exam_schedule') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam Schedule</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin/examinations/marks_register') }}"
                                    class="nav-link @if (Request::segment(3) == 'marks_register') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marks Register</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="{{ url('admin/examinations/marks_grade') }}"
                                    class="nav-link @if (Request::segment(3) == 'marks_grade') active @endif">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Marks Grade</p>
                                </a>
                            </li> --}}
                        </ul>

                    </li>
                @endif

                <li class="nav-item">
                    <a href={{ url('logout') }} class="nav-link">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        {{-- /.sidebar-menu --}}
    </div>
    {{-- /.sidebar --}}
</aside>
