<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <h2>search_patients.blade.php</h2>
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
                        <span id="regi"> Patient Registration <span>
                        </div>
                        <form action="" method="post">
                        @csrf
                        <div class="registration">
                        <div class="user_input">
                            <label class="label">First Name</label>
                            <input type="text" name="fname" class="input" required>
                        </div>

                        <div class="user_input">
                            <label class="label">NIC Number</label>
                            <input type="text" name="nic" class="input" required>
                        </div>

                        <div class="user_input">
                            <label class="label">Last Name</label>
                            <input type="text" name="lname" class="input" required>
                        </div>

                        <div class="user_input">
                            <label class="label" id="email-label">Email Address</label>
                            <input type="email" id="email-field" class="input" onkeyup="validateEmail()">
                            <span id="email-error"> </span>
                        </div>
                        
                        <div class="user_input">
                            <label class="label">Date of Birth</label>
                            <input type="date" class="input" required>
                        </div>

                        <div class="user_input">
                            <label class="label">Address</label>
                            <input type="text" name="add" class="input" required>
                            <input type="text" name="add" class="input" required>
                            <input type="text" name="add" class="input" required>
                            <input type="text" name="add" class="input" required>
                        </div>

                        <div class="user_input">
                            <label class="label">Contact Number</label>
                            <input type="text" class="input" id="phone" onkeyup="validateContactNo()" required>
                            <span id="phone-error"> </span>
                        </div>

                        <div class="user_input">
                        <label class="label"> Gender </label> <p>
	                        Male <input type="radio" value="Yes" name="Gender" class="radio-spacing">
	                        Female <input type="radio" value="No" name="Gender" class="radio-spacing">
                        </div>

                        <div class="user_input">
                            <button type="submit" class="input_regi"><span>Save</span></button>
                        </div>

                        <div class="user_input">
                            <button type="reset" class="input_regi"><span>Clear</span></button>
                        </div>

                        <script>
    var emailField = document.getElementById("email-field");
    var emailLabel = document.getElementById("email-label");
    var emailError = document.getElementById("email-error");
    
    function validateEmail(){
        emailLabel.style.bottom = "45px";

        if(!emailField.value.match(/^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)){
            emailError.innerHTML = "Please enter a valid Email";
            emailField.style.borderBottomColor = "red";
            emailError.style.top = "120%"
            return false;
        }

        emailError.innerHTML = "";
        emailField.style.borderBottomColor = "green";
        emailError.style.top = "100%"
        return true;
    }
    </script>

<script>
        function validateContactNo(){
            
            var phoneError = document.getElementById("phone-error");
            var contactNo = document.getElementById("phone").value;
            var phone = contactNo.replace(/\D/g, '');

            
            if(phone.charAt(0) !== '0'){
                phoneError.innerHTML = "Please enter a valid contact Number";
                return false;
            }

            else if(phone.length !==10){
                phoneError.innerHTML = "Please enter a 10-digit contact Number";
                return false;
            }

            else if(!/^\d+$/.test(phone)){
                phoneError.innerHTML = "Please enter a valid contact Number";
                return false;
            }
            phoneError.innerHTML = "";
        return true;
        }
        </script>

    </form>

</body>
</html>