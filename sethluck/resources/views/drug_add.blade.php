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


        <div class="container">
            <div class="registration_box">
                <div class="regi-header">
                    <span id="regi">Add New Drug<span>
                </div>
                <div style="height: 30px;">
                </div>
                <form action="{{ route('drug.add') }}" method="post">
                    @csrf
                    <label for="drugname" class="label">Enter Name of Drug </label><br>
                    <input type="text" name="drugname" id="drugname" class="input" value="{{ old('drugname') }}"><br>
                    <div style="height: 30px;">
                    </div>
                    <label for="quentity" class="label">Enter Quentity of Drug </label><br>
                    <input type="text" name="quentity" id="quentity" class="input" value="{{ old('quentity') }}"><br>
                    <div style="height: 30px;">
                    </div>
                    <label for="unitprice" class="label">Enter Unit Price</label><br>
                    <input type="text" name="unitprice" id="unitprice" class="input" value="{{ old('unitprice') }}"><br>
                    <div style="height: 30px;">
                    </div>
                    <div class="user_input">
                        <button type="submit" class="input_regi"><span>Save</span></button>
                    </div>
                </form>

                @if ($errors->any())
                        <div>
                            <strong>Errors:</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

            </div>
</body>

</html>