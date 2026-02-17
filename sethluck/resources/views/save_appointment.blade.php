<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set appointment</title>
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

        <div class="container">
            <div class="registration_box">
                <div class="regi-header">
                    <span id="regi"> Set Appointments <span>
                </div>
                <div style="height: 30px;">
                </div>

                @isset($patient)

                    <div class="user_input">
                        <label for="nicdisabled">Patient's Details: </label>
                        <input type="text" for="nicdisabled" class="input"
                            value="{{ $patient->fname }} {{ $patient->lname }} ( {{ $patient->nicnumber }} )" disabled>
                    </div>

                    <div class="user_input">
                        <label for="appDatedisabled">Appointment Date: </label>
                        <input type="text" for="appDatedisabled" class="input" value="{{ $patient->appointmentdate }}"
                            disabled>
                    </div>

                @endisset

                <!-- Content  -->

                <div class="registrationhome">

                    <div style="height: 30px;">
                    </div>

                    <!-- Print pass data -->
                    @isset($timeSlots)

                        <table class="apptb">
                            <thead>
                                <tr>
                                    <th>Time Slot</th>
                                    <th>Patient Name</th>
                                    <th>Set Appointment</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($timeSlots as $time => $slot)

                                    <tr>
                                        <td>{{ date('g:i A', strtotime($time)) }}</td>
                                        <td>{{ $slot['name'] }}</td>
                                        <td>
                                            @if (is_null($slot['id']))
                                                <form action="{{ route('appointment.save') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="time" id="appointment_time"
                                                        value="{{ $patient->appointmentdate }} {{ date('H:i:s', strtotime($time)) }}">
                                                    <input type="hidden" name="patient_id" id="patient_id" value={{ $patient->patientid }}>
                                                    <!-- You can also include visible fields if needed -->
                                                    <button type="submit">

                                                        SET

                                                    </button>
                                                </form>
                                            @endif

                                        </td>

                                    </tr>



                                @endforeach
                            </tbody>
                        </table>
                    @endisset

                </div>


                @if ($errors->any())
                <div style="height: 30px;">
                </div>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div style="height: 30px;">
                </div>
            </div>
        </div>
    </div>


</body>

</html>