<?php

namespace App\Http\Controllers;
use App\Models\Patient;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function getAppointmentsForDay(Request $request)
    {

        // return $request;
        $returnrequest = (object) [];

        $patientData = json_decode($request->input(key: 'patient'));

        // return $patientData;

        $returnrequest->patientid = $patientData->patientid;
        $returnrequest->fname = $patientData->fname;
        $returnrequest->lname = $patientData->lname;
        $returnrequest->nicnumber = $patientData->nicnumber;

        $returnrequest->appointmentdate = $request->input('appointmentdate');

        $request->validate([
            'appointmentdate' => 'required|date|after_or_equal:today', // Example validation rule
        ]);

        // Define start and end times and the time interval
        $startTime = Carbon::createFromTime(17, 0); // 5 PM
        $endTime = Carbon::createFromTime(22, 0);   // 10 PM
        $interval = 15;                             // 15 minutes

        // Generate time slots in an array with placeholders for each slot
        $timeSlots = [];
        while ($startTime->lessThan($endTime)) {
            $timeSlots[$startTime->format('H:i:s')] = [
                'name' => '-',
                'id' => null
            ];
            $startTime->addMinutes($interval);
        }

        // Convert the input date to the start of the given day to match date only
        $dateStart = Carbon::parse($request->appointmentdate)->startOfDay();
        $dateEnd = Carbon::parse($request->appointmentdate)->endOfDay();

        // Query the appointments with patient names for the given day
        $appointments = DB::table(table: 'appointments')
            ->join('patients', 'appointments.patientid', '=', 'patients.patientid')
            ->whereBetween('appointments.appoinment', [$dateStart, $dateEnd])
            ->select(DB::raw("DATE_FORMAT(appointments.appoinment, '%H:%i:%s') as time"), 'patients.fname', 'patients.lname', 'patients.patientid')
            ->get();


        // Populate the time slots with appointment data
        foreach ($appointments as $appointment) {
            if (array_key_exists($appointment->time, $timeSlots)) {
                $name = ($appointment->fname ?? '-') . ' ' . ($appointment->lname ?? '-');
                $timeSlots[$appointment->time] = [
                    'name' => trim($name) === '-' ? '-' : $name,
                    'id' => $appointment->patientid ?? null
                ];
            }
        }

        // return $timeSlots;

        $appdate = Carbon::parse($request->appointmentdate)->format('Y-m-d');


        return view('save_appointment', [
            'timeSlots' => $timeSlots,
            'patient' => $returnrequest
        ])->withInput(request()->all());
    }



    public function patientserach(Request $request)
    {



        $patient = Patient::where('nicnumber', $request->nic)->first();

        // return $patient;

        if ($patient) {
            return view('set_appointmentsdate', ['patient' => $patient]);
        } else {
            return view(view: 'set_appointments');
        }



    }

    public function saveAppointment(Request $request)
    {
        // return $request;
        $validated = $request->validate([
            'time' => 'required|date_format:Y-m-d H:i:s',
            'patient_id' => 'required|integer'
        ]);

        // Convert the appointment time to the correct format
        $appointmentTime = Carbon::parse($request->appointmentdate . ' ' . $validated['time']);

        // Insert into the database
        DB::table('appointments')->insert([
            'appoinment' => $appointmentTime,
            'patientid' => $validated['patient_id']
        ]);

        // return response()->json(['success' => true]);
        return redirect()->route('home');
    }

    public function viewAppointment(Request $request)
    {

        $request->validate([
            'appointmentdate' => 'required|date_format:Y-m-d|after_or_equal:today',
            // 'patient_id' => 'required|integer'
        ]);

        // Define start and end times and the time interval
        $startTime = Carbon::createFromTime(17, minute: 0); // 5 PM
        $endTime = Carbon::createFromTime(22, 0);   // 10 PM
        $interval = 15;                             // 15 minutes

        // Generate time slots in an array with placeholders for each slot
        $timeSlots = [];
        while ($startTime->lessThan($endTime)) {
            $timeSlots[$startTime->format('H:i:s')] = [
                'name' => null,
            ];
            $startTime->addMinutes($interval);
        }

        $appointments = Appointment::whereDate('appoinment', $request->appointmentdate)
            ->join('patients', 'appointments.patientid', '=', 'patients.patientid')
            ->select(
                'appointments.appoinment',
                'appointments.patientid',
                'patients.username',
                'patients.fname',
                'patients.lname',
                'patients.street',
                'patients.area',
                'patients.province',
                'patients.postalcode',
                'patients.dob',
                'patients.nicnumber',
                'patients.gender',
                'patients.emailaddress',
                'patients.phonenumber',
                'patients.summary'
            )
            ->get();


        foreach ($appointments as $appointment) {
            $appointment->appointment = Carbon::parse($appointment->appoinment)->format('H:i:s');
            unset($appointment->appoinment);
        }

        // Populate the time slots with appointment data
        foreach ($appointments as $appointment) {
            if (array_key_exists($appointment->appointment, $timeSlots)) {
                $timeSlots[$appointment->appointment] = [
                    'name' => $appointment,
                    // 'id' => $appointment->patientid ?? null
                ];
            }
        }
        // "DATE_FORMAT(appointments.appoinment, '%H:%i:%s') as time"
        // return $timeSlots;

        // return $appointments;
        return view('view_appointments', compact('timeSlots'));


    }


    // Display the form
    public function show()
    {
        return view('view_appointments');
    }

}
