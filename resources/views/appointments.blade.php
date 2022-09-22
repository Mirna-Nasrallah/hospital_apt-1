@extends('layouts.app')
{{ View::make('header') }}
<section id="appointments" class="appointment section-bg">
    <div class="section-title">
        <h2>{{ auth('sanctum')->user()->name }}'s Appointments</h2>

    </div>

    <table class="table" style="margin:10px 20px 10px 10px">
        <thead>
          <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Speciality</th>
            <th>Delete</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($appointments as $apt)
        <tr>
            <td>{{ $apt->appointment_date }}</td>
            <td>{{ $apt->appointment_time }}</td>
            <td>{{ $apt->speciality }}</td>

            <td>
                <a href="{{ url('destroy.apt') }}/{{ $apt->id }}"><span
                    class="fas fa-trash"></span></a>
            </td>
            <td>
                <a href="{{ url('edit.apt') }}/{{ $apt->id }}"><span
                    class="fas fa-edit"></span></a>
            </td>
        </tr>
        @endforeach

    </tbody>

    </table>
</section>
