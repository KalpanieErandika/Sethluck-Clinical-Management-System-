<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <head>

    <body>
        <div class="image">
            <nav class="nav">
                <img src="{{ asset('images/logo1.jpeg') }}" class="positioned-image">
                <ul>
                    <li> <a href="{{ route('home') }}"><span>Home </span></a></li>
                </ul>
            </nav>

            <div class="wrapper">
                <div class="regi_box">
                    <div class="regi-header">
                        <span> Register <span>
                    </div>

                    <form action="{{ route('register_user') }}" method="post">
                        @csrf
                        <div class="input_box">
                            <label class="label">Username</label>
                            <input type="text" name="username" class="input-field" required autocapitalize="off"
                                value="{{ old('username') }}">
                        </div>

                        <div class="input_box">
                            <label class="label">Password</label>
                            <input type="password" name="password" class="input-field" autocapitalize="off"
                                value="{{ old('password') }}" required>
                        </div>

                        <div class="input_box">
                            <label class=" label">NIC Number</label>
                            <input type="text" name="nic" placeholder="Enter patient's NIC " class="input-field"
                                value="{{ old('nic') }}" required>
                        </div>

                        <div class="input_box">
                            <label class="label">Date of Birth</label>
                            <input type="date" name="dob" class="input-field" required value="{{ old('dob') }}">
                        </div>

                        <div class="input_box">
                            <label class="label">Contact Number</label>
                            <input type="text" class="input-field" name="phonenumber"
                                placeholder="10 Digit phone number" value="{{ old('phonenumber') }}" required>
                        </div>

                        <div class="input">
                            <button type="submit" class="input-regi"><span>Save</span></button>
                        </div>

                        <div class="input">
                            <button type="reset" class="input-regi"><span>Clear</span></button>
                        </div>

                    </form>
                    @if ($errors->any())
                        <br>
                        <div style="font-size: initial;color: red;">
                            <strong>Errors:</strong>
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
    </body>

</html>