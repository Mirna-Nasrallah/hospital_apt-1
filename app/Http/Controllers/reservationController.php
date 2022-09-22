<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class reservationController extends Controller
{

    public function index()
    {
        $appointments = Reservation::where('user_id',auth('sanctum')->user()->id)->get();
        return view('appointments', compact('appointments'));
    }


    public function create()
    {

        return view('reservation');
    }


    public function store(Request $request)
    {
        $user_id = auth('sanctum')->user()->id;
        $apt_found = Reservation::whereDate('appointment_date',$request->appointment_date)
        ->where('appointment_time',$request->appointment_time)
        ->where('speciality',$request->speciality)
        ->first();
        if($apt_found !== null)
        {
            Alert::error('Appointment already taken', "please select another appointment");
            return redirect()->back();
        }
        else{
            Reservation::create([
                "user_id" => $user_id,
                "appointment_date" => $request->appointment_date,
                "appointment_time" => $request->appointment_time,
                "speciality" => $request->speciality,
                "message" => $request->message,
            ]);
            Alert::success('Congrats', 'Appointment Created Successfully ');
                 return redirect()->back();
        }

        // $data = $request->all();
        // $validator = Validator::make(
        //     $data,
        //     [
        //         "appointment_date" => "required|date",
        //         "appointment_time" => "required|time",
        //         "speciality" => ['required', Rule::in(['General practice', 'Pediatrics', 'Radiology', 'Ophthalmology', 'Sports medicine and rehabilitation', 'Oncology', 'Dermatology', 'Emergency Medicine'])],

        //     ]
        // );
        // if ($validator->fails()) {
        //    // return response()->json(["status" => "400", "message" => "failed to pass validation", "data" => ["errors" => $validator->errors()]], 400);
        //    Alert::error('Error', $validator->errors());
        //     return redirect()->back();
        // } else {
        //     $reservation = Reservation::create($data);
        //     Alert::success('Congrats', 'Product Created Successfully ');
        //     return redirect()->back();
        // }

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $reservation = Reservation::find($id);
        return view('edit_reservation',[
            'reservation' => $reservation,
        ]);
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
        Alert::success('Congrats', 'Appointment Edited Successfully ');
             return redirect()->route('view.appointments');
    }


    public function destroy($id)
    {
        //
        $reservation = Reservation::find($id);
        $reservation->delete();
        Alert::success('Success', 'Appointment Deleted Successfully ');
        return redirect()->back();
    }
}
