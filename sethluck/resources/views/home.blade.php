                <!-- <li><a href="{{ url('/patient_registration') }}">Patents Registration</a></li>
                <li><a href="{{ url('/make_appointments') }}">Make Appointments</a></li>
                <li><a href="{{ url('/view_appointments') }}">View Appointments</a></li>
                <li><a href="{{ url('/search_patients') }}">Search Patients</a></li>
                <li><a href="{{ url('/treatment_history') }}">Treatment History</a></li>
                <li><a href="{{ url('/add_treatment_details') }}">Add Treatment Details</a></li>
                <li><a href="{{ url('/prescriptions') }}">Prescriptions</a></li>
                <li><a href="{{ url('/inventory_of_drugs') }}">Inventory of Drugs</a></li>
                <li><a href="{{ url('/pricing') }}">Pricing</a></li>
                <li><a href="{{ url('/invoice') }}">Invoice</a></li>
                <li><a href="{{ url('/staff_registration') }}">User Registration</a></li> -->



<!DOCTYPE html>
<html>

<head>
    <title>Home Page - Logged In</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="img">
        <nav>
                <img src="{{ asset('images/logo4.png') }}" class="positioned-image">
                <ul>
                    <li> <a href="{{ route('home') }}">Home </a></li>
                    <li> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout</a></li>
                </ul>
        </nav>
            <!-- Hidden logout form -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>


        @php
            $user = Auth::guard('web')->user();
            $usertype = $user->usertype;
        @endphp

        <div class="container">
            <div class="registration_box">
                <div class="regi-header">
                    <span id="regi"> Home <span>
                </div>
                <div style="height: 30px;">
                </div>

                <div class="registrationhome">
                    @switch($usertype)

                        @case(1)

                            <a href="{{ url('/patient_registration') }}" class="btnn">Register Patient</a>
                            <br>
                            <a href="{{ url('/edit_patientdetails') }}" class="btnn">Edit Patient Details</a>
                            <br>
                            <a href="{{ url('/patient_managment') }}" class="btnn">Patients Managment</a>
                            <br>
                            <a href="{{ url('/set_appointments') }}" class="btnn">Set Appointments</a>
                            <br>
                            <a href="{{ url('/view_appointments') }}" class="btnn">View Appointments</a>
                            <br>
                            <a href="{{ url('/inventory_of_drugs') }}" class="btnn">Drug Inventory</a>
                            <br>
                            <a href="{{ url('/drug_add') }}" class="btnn">Add New Drug</a>
                            <br>
                            <a href="{{ url('/staff_registration') }}" class="btnn">Staff Registration</a>
                            <br>

                        @break

                        @case(2)


                            <a href="{{ url('/patient_registration') }}" class="btnn">Register Patient</a>
                            <br>
                            <a href="{{ url('/edit_patientdetails') }}" class="btnn">Edit Patient Details</a>
                            <br>
                            <a href="{{ url('/patient_managment') }}" class="btnn">Patients Managment</a>
                            <br>
                            <a href="{{ url('/set_appointments') }}" class="btnn">Set Appointments</a>
                            <br>
                            <a href="{{ url('/view_appointments') }}" class="btnn">View Appointments</a>
                            <br>
                            <a href="{{ url('/inventory_of_drugs') }}" class="btnn">Drug Inventory</a>
                            <br>
                            <a href="{{ url('/drug_add') }}" class="btnn">Add New Drug</a>
                            <br>


                            @break

                        @case(3)


                            <a href="{{ url('/patient_registration') }}" class="btnn">Register Patient</a>
                            <br>
                            <a href="{{ url('/edit_patientdetails') }}" class="btnn">Edit Patient Details</a>
                            <br>
                            <a href="{{ url('/patient_managment') }}" class="btnn">Patients Managment</a>
                            <br>
                            <a href="{{ url('/set_appointments') }}" class="btnn">Set Appointments</a>
                            <br>
                            <a href="{{ url('/view_appointments') }}" class="btnn">View Appointments</a>
                            <br>


                            @break

                        @case(4)

                            <a href="{{ url('/patient_registration') }}" class="btnn">Register Patient</a>
                            <br>
                            <a href="{{ url('/edit_patientdetails') }}" class="btnn">Edit Patient Details</a>
                            <br>
                            <a href="{{ url('/patient_managment') }}" class="btnn">Patients Managment</a>
                            <br>
                            <a href="{{ url('/inventory_of_drugs') }}" class="btnn">Drug Inventory</a>
                            <br>
                            <a href="{{ url('/drug_add') }}" class="btnn">Add New Drug</a>
                            <br>

                            @break

                        @default

                    @endswitch

                </div>
                <!-- Bit of space at end -->
                <div style="height: 30px;">
                </div>

            </div>
        </div>

        </div>


</body>

</html>