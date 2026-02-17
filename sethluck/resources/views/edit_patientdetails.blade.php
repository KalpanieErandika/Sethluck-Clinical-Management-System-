<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <div class="edit">
                <div class="edit_box">
                <div class="edit-header">
                    <span> Edit Patient Details <span>
                </div>
                <div style="height: 30px;">
                </div>


                <div class="input_box">
                        <form action="{{ route('patient.search') }}" method="post">
                            @csrf
                            <label class="label">Enter NIC Number</label>
                            <input type="text" name="search" class="input-field" required placeholder="Enter NIC Number">
                        </div>

                        <div class="user_input">
                            <button type="submit" name="ID" class="input_regi"><span>Search Data</span></button>
                        </div>
            
                        </form>
                    </div>

                    @isset($patient)

                    <div class="container">
                        <div class="registration_box">
                        <form action="{{ route('patient.update', $patient->patientid) }}" method="POST">

                            @csrf
                            @method('PUT')

                            <div class="registration">
                                <div class="user_input">
                                    <label class="label">First Name</label>
                                    <input type="text" name="fname" value="{{ $patient->fname }}" class="input">
                                </div>

                                <div class="user_input">
                                    <label class="label">Last Name</label>
                                    <input type="text" name="lname" value="{{ $patient->lname }}" class="input">
                                </div>

                                <div class="user_input">
                                    <label class="label">Email Address</label>
                                    <input type="text" name="email-field" value="{{ $patient->emailaddress }}" class="input">
                                </div>

                                <div class="user_input">
                                    <label class="label">Date of Birth</label>
                                    <input type="date" name="dob"
                                    value="{{ \Carbon\Carbon::parse($patient->dob)->format('Y-m-d') }}" class="input">
                                </div>

                                <div class="user_input">
                                    <label class="label">Address</label>
                                    <input type="text" name="add1" value="{{ $patient->street }}" class="input">
                                    <input type="text" name="add2" value="{{ $patient->area }}" class="input">
                                    <input type="text" name="add3" value="{{ $patient->province }}" class="input">
                                    <input type="text" name="add4" value="{{ $patient->postalcode }}" class="input">
                                </div>

                                <div class="user_input">
                                    <label class="label">Contact Number</label>
                                    <input type="text" name="phone" value="{{ $patient->phonenumber }}" class="input">
                                </div>

                                <button type="submit" class="input_regi"><span>Save Changes</span></button>

                        </form>
</div>
</div>

                    @else
                        <p></p>
                    @endisset

                    @if (session('success'))
                        <p>{{ session('success') }}</p>
                    @endif

                </div>
                <div style="height: 30px;">
                </div>
            </div>
        </div>
    </div>

</body>

</html>