<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientsController extends Controller
{
    public function search(Request $request)
    {
        $nic = $request->input('search');

        // Query to find the patient by NIC
        $patient = Patient::where('nicnumber', $nic)->first();

        // Check if patient data exists
        if ($patient) {
            // Pass patient data to the view
            return view('edit_patientdetails', compact('patient'));
        } else {
            // Redirect back with a message if no patient found
            return redirect()->back()->with('error', 'Patient not found');
        }
    }


    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $patient->update($request->all());

        return redirect()->route('edit_patientdetails')->with('success', 'Patient information updated successfully.');
    }

    public function register(Request $request)
    {
        // return $request;

        $exists = Patient::where('nicnumber', $request->nic)->first();

        if (!$exists) {
            // Save new patient
            $patient = new Patient();

            $patient->fname = $request->fname;
            $patient->lname = $request->lname;
            $patient->street = $request->add1;
            $patient->area = $request->add2;
            $patient->province = $request->add3;
            $patient->postalcode = $request->add4;
            $patient->dob = $request->dob;
            $patient->nicnumber = $request->nic;
            $patient->gender = $request->gender;
            $patient->emailaddress = $request->email;
            $patient->phonenumber = $request->phonenumber;


            $patient->save();

            // return view('patient_registration')->with('success','Patient Created Sucessfully');
            return redirect()->route('patient_registration')->with('success', 'Patient Created Sucessfully');


        } else {
            return redirect()->route('patient_registration')->with('success', 'Patient Already Exists!');
        }


    }


    public function patient_managment_tab1(Request $request)
    {

        $patient = Patient::where('nicnumber', $request->patientId)->first();

        // return $patient;
        // $test = "This is a test";
        return view('patient_managment_tab1', compact('patient'));
    }


    public function search_patient_managment(Request $request)
    {

        $validated = $request->validate([
            'pat_nic' => 'required|string|size:12|regex:/^[0-9]{12}$/',
        ]);

        $patient = Patient::where('nicnumber', $request->pat_nic)->first();



        return view('patient_managment', compact('patient'));
    }


    public function save_summary(Request $request)
    {
        $patient = Patient::where('nicnumber', $request->patientnic)->first();

        if ($patient) {
            $patient->summary = $request->summary;
            $patient->update();
        }

        return redirect()->route('patient_managment');


    }

    public function patient_managment_tab2(Request $request)
    {

        $patient = Patient::where('nicnumber', $request->patientId)->first();

        // return $patient;
        // $test = "This is a test";
        return view('patient_managment_tab2', compact('patient'));

    }


    public function patient_managment_tab3(Request $request)
    {

        $patient = Patient::where('nicnumber', $request->patientId)->first();

        // return $patient;
        // $test = "This is a test";
        return view('patient_managment_tab3', compact('patient'));

    }


    public function patient_managment_tab4(Request $request)
    {

        $patient = Patient::where('nicnumber', $request->patientId)->first();

        // return $patient;
        // $test = "This is a test";
        return view('patient_managment_tab4', compact('patient'));

    }


    public function patient_managment_tab5(Request $request)
    {

        $patient = Patient::where('nicnumber', $request->patientId)->first();

        // return $patient;
        // $test = "This is a test";
        return view('patient_managment_tab5', compact('patient'));

    }



}
