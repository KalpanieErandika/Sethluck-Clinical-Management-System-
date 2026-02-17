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

        @php
            $user = Auth::guard('web')->user();
            $usertype = $user->usertype;
        @endphp



        <div class="tab-container">
            <!-- Tab buttons -->
            <div style="height: 30px;">
            </div>

            @isset($patient)

            <div >
                        <label for="nicdisabled" style="margin-left: 40px;margin-right: 30px;">Patient's Details: </label>
                        <input type="text" for="nicdisabled" class="input"
                            value="{{ $patient->fname }} {{ $patient->lname }} ( {{ $patient->nicnumber }} )" disabled>
                    </div>

                <script>
                    const patientId = "{{ $patient->nicnumber }}";
                </script>

            @else
            <form action="{{ route('search_patient_managment') }}" method="post">
                @csrf
                <label for="pat_nic" style="margin-left: 40px;">Enter Patient NIC number to search</label>
                <input type="text" name="pat_nic" id="pat_nic" value="{{ old('pat_nic') }}" class="input" style="margin-left: 40px;margin-right: 30px;">
                <button type="submit" class="input_regi"><span>Search</span></button>
            </form>
            @endisset


            @if ($errors->any())
                <div style="margin-left: 50px;">
                    <strong>Errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div style="height: 30px;">
            </div>
            <div class="tab-buttons">
                @switch($usertype)
                    @case(1)
                        <button class="tab-button active" onclick="openTab(event, 'patient_managment_tab1')">Details</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab2')">Treatment</button>
                        <button class="tab-button" onclick="openTab(event, 'load_treatments')">History</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab4')">Prescription</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab5')">Invoice</button>
                    @break

                    @case(2)
                        <button class="tab-button active" onclick="openTab(event, 'patient_managment_tab1')">Details</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab2')">Treatment</button>
                        <button class="tab-button" onclick="openTab(event, 'load_treatments')">History</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab4')">Prescription</button>
                        <_tabt class="tab-button" onclick="openTab(event, 'patient_managment_tab5')">Invoice</button>
                    @break

                    @case(3)
                        <button class="tab-button active" onclick="openTab(event, 'patient_managment_tab1')">Details</button>
                        <button class="tab-button" onclick="openTab(event, 'load_treatments')">History</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab4')">Prescription</button>
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab5')">Invoice</button>
                    @break

                    @case(4)
                        <button class="tab-button" onclick="openTab(event, 'patient_managment_tab4')">Prescription</button>
                    @break

                @endswitch


            </div>

            <!-- Tab content -->
            <div id="patient_managment_tab1" class="tab-content active"></div>
            <div id="patient_managment_tab2" class="tab-content"></div>
            <div id="load_treatments" class="tab-content"></div>
            <div id="patient_managment_tab4" class="tab-content"></div>
            <div id="patient_managment_tab5" class="tab-content"></div>

        </div>

        <script>

           // Function to open a specific tab
            function openTab(event, tabId) {

                // Hide all tab content
                const tabContents = document.querySelectorAll('.tab-content');
                tabContents.forEach(content => content.classList.remove('active'));

                // Remove active class from all buttons
                const tabButtons = document.querySelectorAll('.tab-button');
                tabButtons.forEach(button => button.classList.remove('active'));

                // Show the selected tab and mark the button as active
                const activeTab = document.getElementById(tabId);
                activeTab.classList.add('active');
                event.currentTarget.classList.add('active');

                // Check if the content is already loaded
                if (!activeTab.innerHTML) { // Load content only if not loaded before
                    fetch(`/sethluck/${tabId}?patientId=${patientId}`) // Adjust route based on your setup
                    .then(response => response.text())
                    .then(data => {
                        activeTab.innerHTML = data;
                    })
                    .catch(error => console.error('Error loading tab content:', error));
                }

            }




        </script>

    </div>
</body>

</html>