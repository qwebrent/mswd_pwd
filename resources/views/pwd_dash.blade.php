@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
    <div class="card bg-secondary shadow">
        <div class="card-body shadow rounded bg-white">
            {!! $chart->container() !!}

            <script src="{{ $chart->cdn() }}"></script>


            {{ $chart->script() }}
        </div>
</div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
