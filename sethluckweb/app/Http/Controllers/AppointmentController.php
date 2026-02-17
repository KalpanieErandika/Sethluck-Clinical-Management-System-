<?php

namespace App\Http\Controllers;
use App\Models\Appointments;
use Illuminate\Support\Facades\Auth;
use App\Models\Appiontments;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getappointments(Request $request)
    {

        $request->validate([
            'app_date' => 'required|date|after_or_equal:today'
        ]);

        $appointmentDate = $request->app_date;

        $user = $user = Auth::guard('web')->user();

        // Define start and end times and the time interval
        $startTime = Carbon::createFromTime(17, 0); // 5 PM
        $endTime = Carbon::createFromTime(22, 0);   // 10 PM
        $interval = 15;                             // 15 minutes

        // Generate time slots in an array with placeholders for each slot
        $timeSlots = [];
        while ($startTime->lessThan($endTime)) {
            $timeSlots[$startTime->format('H:i:s')] = [
                'name' => 'Time Slot Available',
                'id' => 1
            ];
            $startTime->addMinutes($interval);
        }

        // Convert the input date to the start of the given day to match date only
        $dateStart = Carbon::parse($request->app_date)->startOfDay();
        $dateEnd = Carbon::parse($request->app_date)->endOfDay();


        $appointments = Appointments::whereBetween('appoinment', [$dateStart, $dateEnd])->get();

        // return $appointments;

        // Populate the time slots with appointment data
        foreach ($appointments as $appointment) {
            // Convert the appointment time to the 'H:i:s' format
            $appointmentTime = Carbon::parse($appointment->appoinment)->format('H:i:s');

            if (array_key_exists($appointmentTime, $timeSlots)) {

                if ($appointment->patientid != null) {
                    if ($appointment->patientid == $user->patientid) {
                        $timeSlots[$appointmentTime] = [
                            'name' => 'Booked By Current User',
                            'id' => 0,
                        ];
                    } else {
                        $timeSlots[$appointmentTime] = [
                            'name' => 'Booked By Another User',
                            'id' => 0,
                        ];
                    }
                } else {
                    $timeSlots[$appointmentTime] = [
                        'name' => 'Available',
                        'id' => 1,
                    ];
                }

            }
        }


        return view('appointmenttime', compact('timeSlots', 'appointmentDate'));

    }


    public function setappointment(Request $request)
    {
        // return $request;
        Appointments::create([
            'appoinment' => $request->time,
            'patientid' => $request->patient_id,
        ]);

        return redirect()->route('loginhome');

    }

    public function viewappointments(Request $request)
    {

        $user = $user = Auth::guard('web')->user();

        $appintments = Appointments::where('patientid', $user->patientid)->get();
        return view('viewappointment', compact('appintments'));

    }

}
