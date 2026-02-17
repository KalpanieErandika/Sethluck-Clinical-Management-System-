@isset($teatmentRecords)


    @foreach ($teatmentRecords as $records)

        <b>{{  \Carbon\Carbon::parse($records->treatmentdate)->format('Y-m-d') }}</b><br>
        <p>{{ $records->description }}</p>
        <br><br>
    @endforeach

@endisset