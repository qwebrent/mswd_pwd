@extends('layouts.app')

@section('content')
@include('layouts.headers.dash_cards')

<div class="container-fluid mt--7">

    
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="col-12 mb-0">{{ __('Today\'s Birthday List') }}</h3>
                </div>
            </div>
            <div class="card-body">

                <div class="container-fluid">
                    <div class="table-responsive py-4">
                        <table class="table table-bordered" style="width: 100%" id="pwdtable">
                        <thead class="thead-light">
                            <tr>
                                <th>Full Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Birthdate</th>
                                <th>ID No.</th>
                            </tr>
                        </thead>
                        <tbody class="font-weight-bold">
                            @foreach ($seniorbday as $senior)
                            <tr>
                                <td>{{ $senior -> getFullNameAttribute() }}</td>
                                <td>{{ $senior -> getAge() }}</td>
                                {{-- <td>Brgy. {{ $senior -> barangay -> barangay }} {{ $senior -> municipality }}, {{ $senior -> province }}</td> --}}
                                <td>{{ $senior -> getFullAddress() }}</td>
                                <td>{{ $senior -> b_day }}</td>
                                <td>{{ $senior-> reg_num }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    

</div>

@endsection


@push('js')

@endpush
