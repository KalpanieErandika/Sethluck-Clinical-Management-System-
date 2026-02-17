
    <!-- <div class="gridcontainer">
        <div class="column">
            <div class="row">
                <label for="fname">First Name</label><br>
                <input type="text" name="fname" id="fname" class="pamaninputdisplay input" value="{{ $patient->fname }}"
                    disabled>
            </div>
            <div class="row">
                <label for="lname">Last Name</label><br>
                <input type="text" name="lname" id="lname" class="pamaninputdisplay input" value="{{ $patient->lname }}"
                    disabled>

            </div>
            <div class="row">
                <label for="gender">Gender</label><br>
                <input type="text" name="gender" id="gender" class="pamaninputdisplay input"
                    value="{{ $patient->gender == 1 ? 'Male' : 'Female' }}" disabled>

            </div>
        </div>
        <div class="column">
            <div class="row">
                <label for="add1">Address</label><br>
                <input type="text" name="add1" id="add1" class="pamaninputdisplay input" value="{{ $patient->street }}"
                    disabled>
                <br>
                <input type="text" name="add2" id="add2" class="pamaninputdisplay input" value="{{ $patient->area }}"
                    disabled>
                <br>
                <input type="text" name="add3" id="add3" class="pamaninputdisplay input" value="{{ $patient->province }}"
                    disabled>
                <br>
                <input type="text" name="add4" id="add4" class="pamaninputdisplay input" value="{{ $patient->postalcode }}"
                    disabled>
            </div>

        </div>
        <div class="column">
            <div class="row">
                <label for="dob">Date of Birth</label><br>
                <input type="text" name="dob" id="dob" class="pamaninputdisplay input"
                    value="{{ \Carbon\Carbon::parse($patient->dob)->format('Y-m-d') }}" disabled>
            </div>
            <div class="row">
                <label for="phone">Phone Number</label><br>
                <input type="text" name="phone" id="phone" class="pamaninputdisplay input"
                    value="{{ $patient->phonenumber }}" disabled>
            </div>
            <div class="row">
                <label for="email">First Name</label><br>
                <input type="text" name="email" id="email" class="pamaninputdisplay input"
                    value="{{ $patient->emailaddress }}" disabled>
            </div>
        </div>

        <div style="height: 30px; clear: both; min-height: 30px;">
        </div>
        <form action="{{ route('save_summary') }}" method="post">
            @csrf
            <textarea name="summary" id="summary" class="summary_textarea"> {{ $patient->summary }}</textarea>
            <input type="hidden" name="patientnic" id="patientnic" value="{{ $patient->nicnumber }}">
            <div style="height: 20px; clear: both; min-height: 20px;">
            </div>
            <button type="submit" class="input_regi"><span>Save</span></button>
        </form>
    </div> -->

    @isset($patient)

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <body>
    <form action="" method="post">
  
<div class="row">
  <div class="column" style="background-color:#bbb;">
    <h4>Description</h4>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h4>Unit Price</h4>
  </div>

  <div class="column" style="background-color:#bbb;">
    <h4>Number of Units</h4>
  </div>
  <div class="column" style="background-color:#bbb;">
    <h4>Subtotal</h4>
  </div>
</div>


<div class="row">
  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>

  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>

  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>


  <div class="column" >
    <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>
  <div class="column" >
  <input type="text" class="input-field">
  </div>

  <div class="pres">
    <button type="submit" class="input_pres"><span>Save</span></button>
</div>

    <div class="pres">
        <button type="reset" class="input_clear"><span>Clear</span></button>
    </div>

  </div>

</form>
</body>
</html>

@endisset