@isset($patient)


    <form action="{{ route('add_treatment') }}" method="POST" id="dynamic-form">
        @csrf
        <div>
            <div style="height: 10px; clear: both; min-height: 10px;">
            </div>
            <!-- Controller 1: Textarea -->
            <label for="textarea">Enter treatment details as text :</label>
            <div style="height: 20px; clear: both; min-height: 20px;">

            </div>
            <textarea name="textarea" id="textarea" class="summary_textarea" required></textarea>
            <div style="height: 15px; clear: both; min-height: 15px;">
            </div>
            <input type="hidden" name="patientnic" id="patientnic" value="{{ $patient->nicnumber }}">
            <button type="submit" class="input_regi"><span>Submit</span></button>
            <button type="reset" class="input_regi"><span>Clear</span></button>
    </form>


    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif


@endisset