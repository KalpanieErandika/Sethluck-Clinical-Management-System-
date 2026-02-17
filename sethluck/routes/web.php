<?php

use App\Http\Controllers\TreatmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffRegistrationController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\DrugController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.user')->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');


    Route::get('/', function () {
        return redirect()->route('home');
    });


    Route::get('/patient_registration', function () {
        return view('patient_registration');
    })->name('patient_registration');

    Route::get('/edit_patientdetails', function () {
        return view('edit_patientdetails');
    })->name('edit_patientdetails');

    Route::get('/patient_managment', function () {
        return view('patient_managment');
    })->name('patient_managment');

    Route::get('/set_appointments', function () {
        return view('set_appointments');
    })->name('set_appointments');

    Route::get('/set_appointmentsdate', function () {
        return view('set_appointmentsdate');
    })->name('set_appointmentsdate');

    Route::get('/save_appointment', function () {
        return view('save_appointment');
    })->name('save_appointment');

    Route::get('/view_appointments', function () {
        return view('view_appointments');
    });

    Route::get('/search_patients', function () {
        return view('search_patients');
    });

    Route::get('/treatment_history', function () {
        return view('treatment_history');
    })->name('treatment_history');

    Route::get('/prescriptions', function () {
        return view('prescriptions');
    });

    Route::get('/inventory_of_drugs', function () {
        return view('inventory_of_drugs');
    })->name('inventory_of_drugs');

    Route::get('/drug_add', function () {
        return view('drug_add');
    })->name('drug_add');

    Route::get('/drug_update', function () {
        return view('drug_update');
    })->name('drug_update');

    Route::get('/pricing', function () {
        return view('pricing');
    });
    Route::get('/invoice', function () {
        return view('invoice');
    });

    Route::get('/patient_managment_tab3', function () {
        return view('patient_managment_tab3');
    })->name('patient_managment_tab3');

    Route::get('/staff_registration', [StaffRegistrationController::class, 'showForm'])->name('staff.registration');
    Route::post('/staff_registration', [StaffRegistrationController::class, 'register'])->name('staff.register');

    Route::post('/search_patient', [PatientsController::class, 'search'])->name('patient.search');
    Route::put('/update_patient/{id}', [PatientsController::class, 'update'])->name('patient.update');
    Route::post('/register_patient', [PatientsController::class, 'register'])->name('patient.register');

    Route::post('/get_appointmentsfordate', [AppointmentsController::class, 'getAppointmentsForDay'])->name('appointment.getdate');
    Route::post('/searchpatient_appointments', [AppointmentsController::class, 'patientserach'])->name('appointment.patientsearch');
    Route::post('/appointments_save', [AppointmentsController::class, 'saveAppointment'])->name('appointment.save');
    Route::post('/appointments_view', [AppointmentsController::class, 'viewAppointment'])->name('appointment.view');
    Route::get('/appointments_view', [AppointmentsController::class, 'show'])->name('appointments_view'); // For displaying the form

    Route::post('/view_drug', [DrugController::class, 'view'])->name('drug.view');
    Route::post('/add_drug', [DrugController::class, 'add'])->name('drug.add');
    Route::post('/edit_drug', [DrugController::class, 'edit'])->name('drug.edit');
    Route::post('/update_drug', [DrugController::class, 'update'])->name('drug.update');


    Route::get('/patient_managment_tab1', [PatientsController::class, 'patient_managment_tab1'])->name('patient_managment_tab1');
    Route::post('/search_patient_mgt', [PatientsController::class, 'search_patient_managment'])->name('search_patient_managment');
    Route::post('/save_summary', [PatientsController::class, 'save_summary'])->name('save_summary');

    Route::get('/patient_managment_tab2', [PatientsController::class, 'patient_managment_tab2'])->name('patient_managment_tab2');

    Route::get('/patient_managment_tab4', [PatientsController::class, 'patient_managment_tab4'])->name('patient_managment_tab4');
    Route::get('/patient_managment_tab5', [PatientsController::class, 'patient_managment_tab5'])->name('patient_managment_tab5');


    Route::post('/add_treatment', [TreatmentController::class, 'add_treatment'])->name('add_treatment');
    Route::get('/load_treatments', [TreatmentController::class, 'load_treatments'])->name('load_treatments');


});
