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
                    <span id="regi"> Drug Inventory <span>
                </div>
                <div style="height: 30px;">
                </div>
                <form action="{{ route('drug.view') }}" method="post">
                    @csrf
                    <label for="drugname" class="label">Enter name of drug </label>
                    <input type="text" name="drugname" id="drugname" class="input" value="{{ old('drugname') }}">
                    <div class="user_input">
                        <button type="submit" class="input_regi"><span>Search</span></button>
                    </div>
                </form>

                <div class="registrationhome">
                    @isset($results)
                        <div style="height: 30px;">
                        </div>
                        <table>
                            <tr>
                                <th class="description">Drug Name</th>
                                <th class="qty">quantity</th>
                                <th class="uprice">unitprice</th>
                            </tr>

                            @foreach ($results as $result)

                                <tr data-drugnid="{{ $result->drugid }}" onclick="submitRow(event, this)">

                                    <td class="description">{{ $result->drugname }}</td>
                                    <td class="qty">{{ $result->quantity }}</td>
                                    <td class="upricetd">{{ $result->unitprice }}</td>
                                </tr>

                            @endforeach

                        </table>

                        <!-- Hidden logout form -->
                        <form id="edit-form" action="{{ route('drug.edit') }}" method="POST" style="display: none;">
                            @csrf
                            <input type="hidden" name="drugid" id="drugid">
                        </form>

                    @endisset
                </div>

                @error('drugname')
                    <div style="height: 30px;">
                    </div>
                    <div class="error">{{ $message }}</div> <!-- Displays the error message for 'drugname' -->
                @enderror
            </div>
</body>


</html>


<script>
    function submitRow(event, row) {
        // Prevent default behavior
        event.preventDefault();

        // Set hidden input values based on row data attributes
        document.getElementById('drugid').value = row.getAttribute('data-drugnid');
        // Submit the form
        document.getElementById('edit-form').submit();
    }
</script>