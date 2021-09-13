@extends('layouts.app', ['title' => __('PWD Information')])

@section('page_level_css')

@endsection

@section('content')
    @include('users.partials.info-header', [
            'title' => __('View Information'),
            'description' => __('This is where you can view all saved informations about a specific Senior Citizen'),
            'class' => 'col-lg-9'
        ])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-2 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                            <div class="avatar-upload">
                                <div class="avatar-preview">
                                    @if ($seniorinfo->senior_img && File::exists(public_path("/uploads/senior_images/".$seniorinfo->senior_img)))
                                    <div id="imagePreview" style="background-image: url('{{ asset('/uploads/senior_images/'. $seniorinfo->senior_img) }}');">
                                    </div>
                                    @else
                                    <div id="imagePreview" style="background-image: url('/argon/img/theme/profile.png');">
                                    </div>
                                    @endif


                                </div>
                            </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    {{-- <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                            </div>
                        </div>
                    </div> --}}
                    <div class="text-center">
                        <h3>
                            Member Photo<span class="font-weight-light"></span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-10 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row justify-content-between">
                        <h4 class="col-12 mb-0 d-flex justify-content-between">{{ __('Pension Status') }}
                            <input type="checkbox" data-id="{{ $seniorinfo->id }}" name="status" class="js-switch" {{ $seniorinfo->status == 1 ? 'checked' : '' }}>
                        </h4>
                    </div>
                </div>
                <div class="card-body">


                        <h3 class="text-muted mb-4">{{ __('Member Information') }}

                        </h3>


                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="pl-lg-0">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Full Name:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> getFullNameAttribute() }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Registration Number:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> reg_num }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Contact Number:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> mobile_num }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Address:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo->getFullAddress() }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Height:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> height }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Weight:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> weight }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Birthdate:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> b_day }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Age:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> getAge() }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Gender:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> gender -> gender}}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Civil Status:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> civstatus -> civil_status}}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Emergency Contact Person:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> e_name }}</span>
                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Emergency Contact Number:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> e_contact }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Address:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> e_address }}</span>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label class="heading-small text-muted">Illness:</label>
                                </div>
                                <span class="col-md-6 font-weight-normal">{{ $seniorinfo -> senior_illness }}</span>
                            </div>

                            <div class="text-center mt-4">
                                <button type="button" class="btn btn-outline-info " data-toggle="modal" data-target="#modal-qrcode">Generate QR Code</button>
                            </div>

                            {{-- <hr class="my-4" />
                            <h6 class="heading-small text-muted mb-4">{{ __('Address') }}</h6> --}}

                            <div class="text-center">
                                <hr>
                                @if (!empty($seniorinfo->senior_file))
                                <div class="heading-small font-weight-bold text-muted">Medical Certificate</div>
                                <button type="button" class="btn btn-default mb--4" data-toggle="modal" data-target="#modal-notification">Download</button>
                                @else
                                {{-- <a href="#" onclick="return alert('Data not available')">Download</a> --}}
                                <div>No Available Document</div>
                                @endif
                            </div>


                            <hr>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <a class="btn btn-primary" href="{{ route('senior.edit', $seniorinfo->id) }}">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">Delete</button>
                                </div>

                            </div>

                            <hr>
                            <div class="text-center">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <label class="heading-small text-muted">In case of death, move to deceased table</label>
                                    </div>
                                    <form action="{{ route('senior.deceased', $seniorinfo) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" class="btn btn-outline-warning btn-sm">Move</button>
                                    </form>
                                </div>

                            </div>



                        </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Download Modal -->
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-bell-55 ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>A copy of this members document will be downloaded.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-white" >Ok, Got it</button> --}}
                    <a href="{{ route('senior.download', $seniorinfo -> id) }}" class="btn btn-white">Ok, Got it</a>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="modal-delete" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-danger">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">Delete Information</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                        <i class="ni ni-fat-remove ni-3x"></i>
                        <h4 class="heading mt-4">You should read this!</h4>
                        <p>Are you sure you want to delete this members information?</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('senior.destroy', $seniorinfo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-white">Yes, Delete</button>
                    </form>
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- qrCode Modal -->
    <div class="modal fade" id="modal-qrcode" tabindex="-1" role="dialog" aria-labelledby="modal-qrcode" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
            <div class="modal-content bg-gradient-primary">
                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-notification">QR Code Generated</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="py-3 text-center">
                       @include('layouts.qrCodeSenior')
                    </div>
                </div>
                <div class="modal-footer">
                     {{-- <button type="button" class="btn btn-white" >Ok, Got it</button> --}}
                    <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    @include('layouts.footers.auth')
</div>

@endsection

@section('page_level_scripts')
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' , speed: '.3s', color: '#3BA55D', secondaryColor: '#ED4245'});
    });
    $(document).ready(function(){
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 0;
            let seniorId = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: '{{ route('seniors.update.status') }}',
                data: {'status': status, 'senior_id': seniorId},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 100;
                    toastr.success(data.message);
                }
            });
        });
    });
</script>
@endsection

