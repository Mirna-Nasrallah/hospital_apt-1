<?php

namespace App\Http\APIs;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class reservationApi
{


    public function store(Request $request)
    {
        $data = $request->all();
        $user_id = auth('sanctum')->user()->id;
        $validator = Validator::make(
            $data,
            [
                "appointment_date" => "required|date",
                "appointment_time" => "required",
                "message" => "nullable|text",
                "speciality" => ['required', Rule::in(['General practice', 'Pediatrics', 'Radiology', 'Ophthalmology', 'Sports medicine and rehabilitation', 'Oncology', 'Dermatology', 'Emergency Medicine'])],

            ]
        );
        if ($validator->fails()) {
            return response()->json(["status" => "400", "message" => "failed to pass validation", "data" => ["errors" => $validator->errors()]], 400);
        } else {
            $apt_found = Reservation::whereDate('appointment_date', $request->appointment_date)
                ->where('appointment_time', $request->appointment_time)
                ->where('speciality', $request->speciality)
                ->first();
            if ($apt_found !== null) {
                $message = 'Appointment already taken';
                return response()->json(["status" => "500", "message" => $message], 500);
            } else {
                $apt = Reservation::create([
                    "user_id" => $user_id,
                    "appointment_date" => $data['appointment_date'],
                    "appointment_time" => $data['appointment_time'],
                    "speciality" => $data['speciality'],
                    "message" => $data['message']
                ]);
                return response()->json(["status" => " 201", "message" => "appointment created successfully", "data" => ['appointment' => $apt]], 201);
            }
        }
    }

    public function update(Request $request, $id)
    {
        $user_id = auth('sanctum')->user()->id;
        $res = Reservation::find($id);

        $reservation = Reservation::find($id)->update([
            "user_id" => $user_id,
            "appointment_date" => $request->appointment_date ?? $res->appointment_date,
            "appointment_time" => $request->appointment_time ?? $res->appointment_time,
            "speciality" => $request->speciality ?? $res->speciality,
            "message" => $request->message ?? $res->message,
        ]);
        return response()->json(["status" => " 201", "message" => "appointment Edited successfully", "data" => ['appointment' => $reservation]], 201);
    }


    public function destroy($id)
    {
        //
        $reservation = Reservation::find($id);
        $reservation->delete();
        return response()->json(["status" => "200", "message" => "delete successfully"], 200);
    }
}
