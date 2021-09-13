<div class="visible-print">
    <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')
    //->backgroundColor(106,109,228)
    ->style('round')
    //->merge('https://www.clipartmax.com/png/middle/157-1575059_dswd-logo-philippines-department-of-social-welfare-and-development.png', 0.3, true)
    ->size(150)
    ->errorCorrection('H')
    ->generate(Request::url())) !!} ">
    {{-- {!! QrCode::size(150)->generate(Request::url()); !!} --}}
    <p>{{ $seniorinfo -> getFullNameAttribute() }}</p>
</div>
