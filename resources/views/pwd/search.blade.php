@extends('layouts.app', ['title' => __('PWD Information')])

@section('page_level_css')

    <link rel="stylesheet" href="{{ asset('css/datatable/datatables.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/datatable/dataTables.bootstrap4.min.css') }}"/>

    {{-- Export CSS Buttons--}}
    <link rel="stylesheet" href="{{ asset('css/datatable/buttons.dataTables.min.css') }}">


@endsection

@section('content')
    @include('users.partials.search-header', [
        'title' => __('View/Search'),
        'description' => __('This is where you search for all saved informations about PWD\'s'),
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
                <th>Birth Date</th>
                <th>ID No.</th>
                <th>Type of Disability</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody class="font-weight-bold">
            @foreach ($pwdinfos as $pwdinfo)
            <tr>
                <td>{{ $pwdinfo -> id }}</td>
                <td>{{ $pwdinfo -> getFullNamePWD() }}</td>
                <td>Brgy. {{ $pwdinfo -> barangay -> barangay }} {{ $pwdinfo -> municipality }}, {{ $pwdinfo -> province }}</td>
                <td>{{ $pwdinfo -> b_day }}</td>
                <td>{{ $pwdinfo -> reg_num }}</td>

                {{-- <td class="dropdown dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      @foreach ($pwdinfo -> disabilities as $disabilities)
                      <h4 class="d-flex align-items-center m-3">{{ $disabilities->disability_name }}</h4>
                      @endforeach
                    </div>
                </td> --}}

                <td>
                    <ul>
                        @foreach ($pwdinfo -> disability_name as $disability)
                        <li>{{ $disability }}</li>
                        @endforeach
                    </ul>
                </td>


                <td>
                    <a class="btn btn-sm btn-primary" href="{{ route('pwd.show', $pwdinfo->id) }}">View</a>
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




@endsection

@section('page_level_scripts')

    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Export -->
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/buttons.print.min.js') }}"></script>


    <script src="{{asset('/js/export.js')}}"></script>
@endsection
