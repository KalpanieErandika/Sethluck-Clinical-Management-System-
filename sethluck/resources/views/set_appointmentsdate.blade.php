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

                <!-- Content  -->



                @isset($patient)

                    <div class="user_input">
                        <label for="nicdisabled">Patient's Details: </label>
                        <input type="text" for="nicdisabled" class="input"
                            value="{{ $patient->fname }} {{ $patient->lname }} ( {{ $patient->nicnumber }} )" disabled>
                    </div>

                    <div style="height: 30px;">
                        
                    </div>

                    <form action="{{ route('appointment.getdate') }}" method="post">
                        @csrf

                        <!-- Hidden fields for $patient object -->
                        <input type="hidden" name="patient" value="{{ $patient }}">
                        <!-- <input type="hidden" name="patient_name" value="{{ $patient->fname }}">
                                                        <input type="hidden" name="patient_nic" value="{{ $patient->nicnumber }}"> -->

                        <div class="user_input">
                            <label for="appointmentdate">Enter DATE to set appointment</label>
                            <input type="date" name="appointmentdate" id="appointmentdate" class="input">
                        </div>

                        <div class="user_input">
                            <button type="submit" class="input_regi"><span>Save</span></button>
                        </div>
                    </form>




                @endisset


                <div style="height: 30px;">
                </div>

                @if ($errors->any())
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