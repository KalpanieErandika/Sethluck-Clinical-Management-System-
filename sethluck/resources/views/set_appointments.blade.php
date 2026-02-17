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

                <form action="{{ route('appointment.patientsearch') }}" method="post">
                    @csrf

                    <div class="user_input">
                        <label for="inc" name="nic">Please Enter Patient's NIC :</label>
                        <input type="text" name="nic" id="name" class="input">
                    </div>
                    <div class="user_input">
                        <button type="submit" class="input_regi"><span>Search</span></button>
                    </div>

                </form>

                <div style="height: 30px;">
                </div>
            </div>
        </div>
    </div>


</body>

</html>