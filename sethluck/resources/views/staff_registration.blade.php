<!DOCTYPE html>
<html>

<head>
    <title>Staff Registration</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                    <span id="regi"> Staff Registration <span>
                </div>
                <div style="height: 30px;">
                </div>

                <form action="{{ route('staff.register') }}" method="POST">
                    @csrf

                    <div class="registration">
                        <div class="user_input">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" maxlength="30" class="input" required><br>
                        </div>

                        <div class="user_input">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" minlength="5" class="input"
                                required><br>
                        </div>

                        <div class="user_input">
                            <label for="fname">First Name:</label>
                            <input type="text" id="fname" name="fname" maxlength="30" class="input" required><br>
                        </div>

                        <div class="user_input">
                            <label for="lname">Last Name:</label>
                            <input type="text" id="lname" name="lname" maxlength="30" class="input" required><br>
                        </div>

                        <div class="user_input">
                            <label for="usertype">User Type:</label>
                            <select id="usertype" name="usertype" class="input" required>
                                @foreach ($userTypes as $type)
                                    <option value="{{ $type->usertype }}">{{ $type->usertypename }}</option>
                                @endforeach
                            </select><br>
                        </div>

                        <div class="user_input">
                            <button type="submit" class="input_save"><span>Register</span></button>
                        </div>

                </form>
</body>

</html>