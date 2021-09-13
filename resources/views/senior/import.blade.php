@extends('layouts.app', ['title' => __('PWD Information')])

@section('content')
    @include('users.partials.info-header', [
            'title' => __('Import Information'),
            'class' => 'col-lg-9'
        ])

<div class="container-fluid mt--7">

    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="col-12 mb-0 d-flex justify-content-between">{{ __('Import Excel File') }}
                        <form action="{{ route('senior.import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb--1">
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form></h3>
                </div>
            </div>
            <div class="card-body">

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </div>
                @endif

                @if (session()->has('failures'))

                    <table class="table table-danger">
                        <tr>
                            <th>Row</th>
                            <th>Value</th>
                            <th>Error</th>
                        </tr>

                        @foreach (session()->get('failures') as $validation)
                            <tr>
                                <td>{{ $validation->row() }}</td>
                                <td>
                                    {{ $validation->values()[$validation->attribute()] }}
                                </td>
                                {{-- <td>{{ $validation->attribute() }}</td> --}}
                                <td>
                                    <ul>
                                        @foreach ($validation->errors() as $e)
                                            <li>The Identification number is already saved in the database.</li>
                                        @endforeach
                                    </ul>
                                </td>

                            </tr>
                        @endforeach
                    </table>

                @endif

                <div class="container-fluid text-center">

                    {{-- <form action="{{ route('senior.import.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb--1">
                            <input type="file" name="file">
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </form> --}}

                </div>

            </div>
        </div>
    </div>

</div>


@endsection
