@extends('layouts.app')
<header id="header">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="/">Medilab</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::guard('admin')->user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                <li><a class="nav-link scrollto" href="{{ route('todayAdmin') }}">Today's Appointments</a></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->
@section('content')
    <!-- ======= Departments Section ======= -->
    <section id="departments" class="departments">
        <div class="container">

            <div class="section-title">
                <h2>Appointments</h2>

            </div>

            <div class="row gy-4">
                <div class="col-lg-3">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">General practice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Pediatrics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Radiology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">Ophthalmology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-5">Sports medicine and rehabilitation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-6">Oncology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-7">Dermatology</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-8">Emergency Medicine</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>General practice</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            use App\Models\Reservation;
                                            use App\Models\User;
                                            $appointments = Reservation::where('speciality', 'General practice')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Pediatrics</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Pediatrics')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Radiology</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Radiology')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-4">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Ophthalmology</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Ophthalmology')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-5">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Sports medicine and rehabilitation</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Sports medicine and rehabilitation')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-6">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Oncology</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Oncology')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-7">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Dermatology</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Dermatology')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-8">
                            <div class="row gy-4">
                                <div class="col-lg-8 details order-2 order-lg-1">
                                    <h3>Emergency Medicine</h3>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Patient name</th>
                                                <th>Patient email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $appointments = Reservation::where('speciality', 'Emergency Medicine')->get();

                                            ?>
                                            @foreach ($appointments as $apt)
                                                <?php

                                                $user = User::find($apt->user_id);

                                                ?>
                                                <tr>
                                                    <td>{{ $apt->appointment_date }}</td>
                                                    <td>{{ $apt->appointment_time }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->email }} </td>

                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="col-lg-4 text-center order-1 order-lg-2">
                                    <img src="assets/img/departments-1.jpg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Departments Section -->
@endsection
