<div class="visible-print">
    {!! QrCode::size(100)
    ->format('svg')
    ->size(130)
    ->errorCorrection('H')
    ->generate(Request::url()); !!}
    <p>{{ $seniorinfo -> getFullNameAttribute() }}</p>
</div>



{{-- <div class="visible-print">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
    ->style('round')
    ->size(150)
    ->errorCorrection('H')
    ->generate(Request::url())) !!} ">
    <p>{{ $seniorinfo -> getFullNameAttribute() }}</p>
</div> --}}
