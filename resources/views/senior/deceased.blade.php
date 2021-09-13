@extends('layouts.app', ['title' => __('PWD Information')])

@section('page_level_css')

<link rel="stylesheet"  href="{{url('https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css')}}"/>
    <link href="{{url('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    {{-- Export CSS Buttons--}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">


@endsection

@section('content')
    @include('users.partials.search-header', [
        'title' => __('Deceased Table'),
        'description' => __('This is where saved informations about Seniors who have died is stored'),
        'class' => 'col-lg-7'
    ])

        @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show mt--5" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Success!</strong>   {{ Session::get('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif


<div class="container-fluid mt--7">
<div class="row">
    <div class="col-12">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
    <div class="table-responsive py-4">
        <table class="table table-sm" style="width: 100%" id="pwdtable">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Address</th>
                <th>ID No.</th>
                <th>Status</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody class="font-weight-bold">
            @foreach ($deceasedSeniors as $dSenior)
            <tr>
                <td>{{ $dSenior -> id}}</td>
                <td>{{ $dSenior -> getFullNameAttribute()}}</td>
                <td>Brgy. {{ $dSenior -> barangay -> barangay }} {{ $dSenior -> municipality }}, {{ $dSenior -> province }}</td>
                <td>{{ $dSenior -> reg_num }}</td>
                <td>@if ($dSenior -> status == 1)
                    <button class="btn btn-success btn-sm disabled">Pensioner</button>
                @else
                <button class="btn btn-danger btn-sm disabled">w/o Pension</button>
                @endif</td>

                {{-- <td class="dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @foreach ($pwdinfo -> disabilities as $disabilities)
                      <h4 class="d-flex align-items-center m-3">{{ $disabilities->disability_name }}</h4>
                      @endforeach
                    </div>
                </td> --}}

                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('senior.restore', $dSenior) }}">Restore</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td align="right">Filter by Barangay: </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tfoot>
    </table>
</div>

</div>

        </div>
    </div>
</div>
</div>

@endsection

@section('page_level_scripts')

    <script src="{{ url('https://code.jquery.com/jquery-3.5.1.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js') }}"></script>


    <!-- Export -->
    <script src="{{ url('https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js') }}"></script>
    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js') }}"></script>


    <script src="{{asset('/js/filter.js')}}"></script>
@endsection
