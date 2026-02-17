@php
    $user = Auth::guard('web')->user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="image">
        <nav class="nav">
            <img src="{{ asset('images/logo1.jpeg') }}" class="positioned-image">
            <ul>
                <li> <a href="{{ route('loginhome') }}"><span>Home </span></a></li>
                <li> <a href="{{ route('logout') }}"><span>Logout</span></a></li>
            </ul>
        </nav>

        <div class="container" style="font-size: initial;">
            <div class="app_box">
                <div class="app-header">
                    <span> Appointments <span>
                </div>

                <form action="{{ route('getappointments') }}" method="post">
                    @csrf

                    <div class="user_input"></div>
                    <label for="app_date">Select Date to set Appointment :</label>
                    <div style="height: 20px;">
                    </div>
                    <input type="date" name="app_date" id="app_date" class="dateinput" value="{{ old('app_date') }}">
                    <div style="height: 30px;">
                    </div>
                    <div class="input">
                        <button type="submit" class="input-regi"><span>Search</span></button>
                    </div>

                    <div class="input">
                        <button type="reset" class="input-regi"><span>Clear</span></button>
                    </div>
                </form>

                <div class="registrationhome">

                    <div style="height: 30px;">
                    </div>

                    <!-- Print pass data -->
                    @isset($timeSlots)

                        <table class="apptb">
                            <thead>
                                <tr>
                                    <th>Time Slot</th>
                                    <th>Description</th>
                                    <th>Set Appointment</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($timeSlots as $time => $slot)

                                    <tr>
                                        <td>{{ date('g:i A', strtotime($time)) }}</td>
                                        <td>{{ $slot['name'] }}</td>
                                        <td class="timeslot">

                                            @if ($slot['id'] != 0)

                                                <form action="{{ route('setappointment') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="time" id="appointment_time"
                                                        value="{{ $appointmentDate }} {{ date('H:i:s', strtotime($time)) }}">
                                                    <input type="hidden" name="patient_id" id="patient_id"
                                                        value="{{ $user->patientid }}">
                                                    <button type="submit">SET</button>
                                                </form>
                                            @else
                                                --
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