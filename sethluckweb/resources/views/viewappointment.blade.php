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
            <div class="app_box_wa">
                <div class="app-header_wa">
                    <span> View Appointments <span>
                </div>

                <div class="registrationhome">

                    <div style="height: 30px;">
                    </div>

                    <!-- Print pass data -->
                    @isset($appintments)

                        <table class="apptb">
                            <thead>
                                <tr>
                                    <th>Appointment Date and Time</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($appintments as $appintment)

                                    <tr>
                                        <td>

                                            {{ $appintment->appoinment->format('d M Y, h:i A') }}

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