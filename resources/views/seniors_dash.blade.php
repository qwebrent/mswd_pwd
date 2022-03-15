@extends('layouts.app')

{{-- @section("page_level_css")

    <link rel="stylesheet"  href="{{url('https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css')}}"/>
    <link href="{{url('https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

@endsection --}}

@section('content')
@include('layouts.headers.dash_cards')

<div class="container-fluid mt--7">

        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="col-12 mb-0">{{ now()->format('F') }}{{__(' Birthday List') }}</h3>
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

{{-- @section('page_level_scripts')

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

    <script>
        //print table content
        $(document).ready(function() {
            $('#pwdtable').DataTable( {
                "language": {
            "lengthMenu": "Show _MENU_",
            "paginate":
            {
                "next": ">",
                "previous": "<"
            }
        },
                info: false,
                dom: 'Bfrtilp',
                buttons: [
                    'print',
                    {
             extend: 'pdfHtml5',
             download: 'open',
             orientation: 'landscape',
             pageSize: 'A4',
             exportOptions:{
                 columns: [0,1,2,3,4,]
             },
             customize : function(doc){
    doc.styles.tableHeader.alignment = 'left'; //Title Justification
    doc.content[1].table.widths = ['30%', '10%', '20%', '20%', '20%']; //Column Size
}
         }
                ]
            } );
        } );
    </script>
@endsection --}}


@push('js')


@endpush
