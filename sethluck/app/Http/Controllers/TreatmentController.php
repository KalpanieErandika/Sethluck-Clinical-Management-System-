<?php

namespace App\Http\Controllers;
use App\Models\Treatment;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TreatmentController extends Controller
{
    public function add_treatment(Request $request)
    {

        $patient = Patient::where("nicnumber", $request->patientnic)->first();

        // Create  new treatment record
        Treatment::create([
            'patientid' => $patient->patientid,
            'treatmentdate' => Carbon::now(),
            'treatmenttype' => 1,
            'description' => $request->textarea,
        ]);


        return redirect()->route('patient_managment');

    }


    public function load_treatments(Request $request)
    {

        $patientid = Patient::where('nicnumber', $request->patientId)->select('patientid')->first();

        $teatmentRecords = Treatment::where('patientid', $patientid->patientid)->orderBy('treatmentid', 'asc')->get();

        // return $teatmentRecords;
        return view('patient_managment_tab3', ['teatmentRecords' => $teatmentRecords]);

    }


}
