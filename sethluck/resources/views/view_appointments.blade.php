<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
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
                    <span id="regi"> View Appointments <span>
                </div>
                <div style="height: 30px;">
                </div>

                <!-- Content  -->

                <form action="{{ route('appointment.view') }}" method="post">
                    @csrf
                    <div class="user_input">
                        <label for="appointmentdate">Enter DATE to View appointment</label>
                        <input type="date" name="appointmentdate" id="appointmentdate" class="input" value={{ old('appointmentdate') }}>
                    </div>
                    <div style="height: 20px;">
                    </div>
                    <div class="user_input">
                        <button type="submit" class="input_regi"><span>Search</span></button>
                    </div>

                </form>

                @isset($timeSlots)
                    <div style="height: 30px;">
                    </div>
                    <table>

                        <tr>
                            <th>Time</th>
                            <th>Details</th>
                        </tr>

                        @foreach($timeSlots as $time => $slot)
                            <tr>
                                <td>{{ date('g:i A', strtotime($time)) }}</td>
                                <td>
                                    @if($slot['name'] !== null)
                                        {{ $slot['name']->fname }} {{ $slot['name']->lname }}<br>
                                        {{ $slot['name']->street ?? '' }} <br>
                                        {{ $slot['name']->area ?? '' }} <br>
                                        {{ $slot['name']->province ?? '' }} <br>
                                        {{ $slot['name']->postalcode ?? '' }} <br>
                                        {{ $slot['name']->phonenumber ?? '' }} <br>
                                    @else
                                        <p>No patient information available.</p>
                                    @endif

                                </td>
                            </tr>

                        @endforeach

                    </table>

                @endisset

                <div style="height: 30px;">
                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


</body>

</html>