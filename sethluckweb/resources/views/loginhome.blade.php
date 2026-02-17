@php
    $user = Auth::guard('web')->user();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Sethluck Clinic -
        @if ($user)
            {{ $user->username }}
        @endif
    </title>

    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>

    <header>
        <div class="img">
            <img src="{{ asset('images/logo1.jpeg') }}" alt="">
        </div>

        <nav class="navbar">
            <a href="#"> Home</a>
            <a href="#about"> About Us</a>
            <a href="#services"> Services</a>
            <a href="#contact"> Contact Us</a>
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout</a>

            <!-- Hidden logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                @csrf
            </form>



        </nav>
        <div style="display: ruby;">
            <div class="log">
                <div class="btn"><a href="{{ route('viewappointments') }}"><span>View Appointment</span></a></div>
            </div>
            <div class="log">
                <div class="btn"><a href="{{ route('appointment') }}"><span>Make Appointment</span></a></div>
            </div>
        </div>
    </header>

    <div class="home-page">

        <div class="home" id="home">
            <div class="home-content">
                <span>Welcome to SethLuck Clinic</span>
                <h2>Healthcare at it's Finest</h2>
                <p class="content">Our clinic envisions becoming a trusted healthcare provider known for excellence in
                    patient centered care,
                    compassion, and innovative medical practices. We aim to create a healing environment where every
                    patient feels respected, supported, and empowered to take control of their health</p>

                <div style="display: ruby;">
                    <div class="home-btn">
                        <a href="{{ route('appointment') }}">Make Appointment</a>
                    </div>
                    <div class="home-btn">
                        <a href="{{ route('viewappointments') }}">View Appointment</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="about" id="about">
        <div class="about-heading">
            <h2>About us</h2>
        </div>

        <div class="inner-about">
            <div class="inner-about">
                <div class="about-content">
                    <h2>Your healthy is our priority</h2>
                    <p> We are a dedicated healthcare provider committed to delivering compassionate, high-quality
                        medical care to our community.
                        Our team of experienced doctors, nurses, pharmacists and support staff works together to
                        provide a wide range of services, from preventive care and routine check-ups to specialized
                        treatments and wellness programs.
                    <p>

                    <p>At SethLuck, we believe in a patient-centered approach where every individual receives
                        personalized care in a warm,
                        respectful environment. Our mission is to promote lifelong wellness and empower our patients to
                        make informed health decisions.
                        We prioritize accessibility, with convenient appointment scheduling, an in-house pharmacy, and
                        telemedicine options to ensure you receive the best possible care.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="services" id="services">
        <div class="service-heading">
            <h2>Our Services</h2>
        </div>

        <div class="main-services">
            <div class="inner-services">
                <span class="material-symbols-outlined">health_and_safety</span>
                <h2> General Consultations</h2>
                <p>Comprehensive consultations to diagnose and treat a wide range of health concerns, with personalized
                    treatment plans for each patient</p>
            </div>

            <div class="inner-services">
                <span class="material-symbols-outlined">stethoscope</span>
                <h2> Emergency Care</h2>
                <p>Immediate medical assistance for urgent, non-life-threatening injuries and conditions, ensuring
                    timely care when patients need it most</p>
            </div>

            <div class="inner-services">
                <span class="material-symbols-outlined">pill</span>
                <h2> In-House Pharmacy</h2>
                <p>Our in-house pharmacy provides quick access to medications right after your appointment,
                    ensuring you can start your treatment without delay</br>
                    Our friendly pharmacists offer guidance on medication use, dosage, and potential side effects,
                    making it easy and convenient to get the care you need—all in one place
            </div>

        </div>
    </div>

    <div class="contact" id="contact">
        <div class="contact-us">
            <div class="service-heading">
                <h2>Contact Us</h2>
            </div>

            <div class="inner-contact-left" style="padding-left: 200px;">
                <span class="material-symbols-outlined">location_on</span>
                <h2>Address</h2>
                <p>244, <br>
                    3rd lane,</br>
                    kalapaluwawa,</br>
                    rajagiriya</p>
            </div>

            <div class="inner-contact-left" style="padding-left: 200px;">
                <span class="material-symbols-outlined">call</span>
                <h2>Telephone</h2>
                <p>076-1234567</br>
                    011-98785655</p>
            </div>

            <div class="inner-contact-left" style="padding-left: 200px;">
                <span class="material-symbols-outlined">mail</span>
                <h2>E-mail Address</h2>
                <p>sethluck@gmail.com</p>
            </div>

        </div>
    </div>
</body>

</html>