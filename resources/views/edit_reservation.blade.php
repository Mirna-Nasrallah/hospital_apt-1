@extends('layouts.app')
{{ View::make('header') }}

<section id="appointment" class="appointment section-bg">
    <div class="container">

        <div class="section-title">
            <h2>Edit Your Appointment</h2>

        </div>

        <form action="{{ route('update.apt', $reservation->id) }}" method="POST" class="php-email-form">
            @csrf
            <div class="row">

                <div class="col-md-4 form-group mt-3">
                    <label class="form-label"><strong>Day</strong></label>
                    <input class="form-control datepicker" type="date" id="appointment_date" name="appointment_date" min="{{date("Y-m-d")}}" placeholder="Select date">

                    <style>
                        label {
                            display: block;
                            font: 1rem 'Fira Sans', sans-serif;
                        }

                        input,
                        label {
                            margin: .4rem 0;
                        }
                    </style>
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label class="form-label"><strong>Time</strong></label>
                    <input type="time" name="appointment_time" class="form-control datepicker" id="appointment_time"
                        placeholder="Select time" min="12:00:00" max="21:00:00">
                    <div class="validate"></div>
                </div>
                <div class="col-md-4 form-group mt-3">
                    <label class="form-label"><strong>Speciality</strong></label>
                    <select name="speciality" id="speciality" class="form-select">
                        <option value="" name="speciality">Select speciality</option>
                        <option value="General practice">General practice</option>
                        <option value="Pediatrics">Pediatrics</option>
                        <option value="Radiology">Radiology</option>
                        <option value="Ophthalmology">Ophthalmology</option>
                        <option value="Sports medicine and rehabilitation">Sports medicine and rehabilitation</option>
                        <option value="Oncology">Oncology</option>
                        <option value="Dermatology">Dermatology</option>
                        <option value="Emergency Medicine">Emergency Medicine</option>
                    </select>
                    <div class="validate"></div>
                </div>

            </div>

            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                <div class="validate"></div>
            </div>
            <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Update Appointment</button></div>
        </form>

    </div>
</section><!-- End Appointment Section -->
