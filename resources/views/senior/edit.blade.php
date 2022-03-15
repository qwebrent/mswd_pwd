@extends('layouts.app', ['title' => __('PWD Information')])



@section('content')
    @include('users.partials.header', [
        'title' => __('Edit Senior Information'),
        'description' => __('This is where you edit all of the information related to Person with Disabilities'),
        'class' => 'col-lg-7'
    ])
<form method="post" action="{{ route('senior.update', $seniorinfo->id) }}" autocomplete="off" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-2 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" name="senior_img" accept=".png, .jpg, .jpeg" value="{{ $seniorinfo -> senior_img }}"/>
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('{{ asset('/uploads/senior_images/'. $seniorinfo->senior_img) }}');">
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">

                        <div class="text-center">
                            <h3>
                                {{ __('Upload Photo') }}<span class="font-weight-light"></span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-10 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Enter Data') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">


                            <h6 class="heading-small text-muted mb-4">{{ __('Member information') }}</h6>

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
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Last Name') }}</label>
                                            <input type="text" name="lname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ $seniorinfo -> lname }}" required autofocus>

                                            @if ($errors->has('lname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('First Name') }}</label>
                                            <input type="text" name="fname" id="input-name" class="form-control form-control-alternative{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ $seniorinfo -> fname }}" required autofocus>

                                            @if ($errors->has('fname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('mname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Middle Name') }}</label>
                                            <input type="text" name="mname" id="input-name" class="form-control form-control-alternative{{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder="{{ __('Middle Name') }}" value="{{ $seniorinfo -> mname }}" required autofocus>

                                            @if ($errors->has('mname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group{{ $errors->has('suffix') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Suffix') }}</label>
                                            <input type="text" name="suffix" id="input-name" class="form-control form-control-alternative{{ $errors->has('suffix') ? ' is-invalid' : '' }}" placeholder="{{ __('Jr., I, II, III, etc here') }}" value="{{ $seniorinfo -> suffix }}" required autofocus>

                                            @if ($errors->has('suffix'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('suffix') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('reg_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Identification Number') }}</label>
                                            <input type="text" name="reg_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('reg_num') ? ' is-invalid' : '' }}" placeholder="{{ __('ID No.') }}" value="{{ $seniorinfo -> reg_num }}" required autofocus>

                                            @if ($errors->has('reg_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('reg_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('weight') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Weight (kg)') }}</label>
                                            <input type="text" name="weight" id="input-name" class="form-control form-control-alternative{{ $errors->has('weight') ? ' is-invalid' : '' }}" placeholder="{{ __('kg') }}" value="{{ $seniorinfo -> weight }}" required autofocus>

                                            @if ($errors->has('weight'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('height') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Height') }}</label>
                                            <input type="text" name="height" id="input-name" class="form-control form-control-alternative{{ $errors->has('height') ? ' is-invalid' : '' }}" placeholder="{{ __('cm') }}" value="{{ $seniorinfo -> height }}" required autofocus>

                                            @if ($errors->has('height'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('height') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('b_day') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Birthdate') }}</label>
                                            <input type="text" name="b_day" id="txtDate" class="form-control form-control-alternative{{ $errors->has('b_day') ? ' is-invalid' : '' }}" placeholder="yyyy/mm/dd" value="{{ $seniorinfo -> b_day }}" required autofocus readonly="readonly">

                                            @if ($errors->has('b_day'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('b_day') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('gender_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                            <select class="form-control form-control-alternative" name="gender_id" id="gender_id">
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($senior_gender as $seniorgender)
                                                    <option value="{{ $seniorgender->id }}" {{ ($seniorgender->id == old('gender_id',
                                                    $seniorinfo->gender_id)) ? 'selected' : '' }}>{{ $seniorgender->gender }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('civstatus_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Civil Status') }}</label>
                                            <select class="form-control form-control-alternative" name="civstatus_id" id="civstatus_id">
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($civil_status as $civstatus)
                                                <option value="{{ $civstatus->id }}" {{ ($civstatus->id == old('civstatus_id',
                                                $seniorinfo->civstatus_id)) ? 'selected' : '' }}>{{ $civstatus->civil_status }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('educbg_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Educational Background') }}</label>
                                            <select class="form-control form-control-alternative" name="educbg_id" id="educbg_id">

                                                @foreach ($educ_bg as $educbg)
                                                    <option value="{{$educbg->id}}">{{ $educbg->educ_bg }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div> --}}

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('mobile_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Mobile Number') }}</label>
                                            <input type="text" name="mobile_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('mobile_num') ? ' is-invalid' : '' }}" placeholder="Mobile No." value="{{ $seniorinfo -> mobile_num }}" required autofocus>

                                            @if ($errors->has('mobile_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('senior_illness') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Illness') }}</label>
                                            <input type="text" name="senior_illness" id="input-name" class="form-control form-control-alternative{{ $errors->has('senior_illness') ? ' is-invalid' : '' }}" placeholder="Illness" value="{{ $seniorinfo -> senior_illness }}" required autofocus>

                                            @if ($errors->has('senior_illness'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('senior_illness') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="dynamic-field-1" class="form-group dynamic-field">
                                                <label class="form-control-label" for="field">{{ __('Type of Disability #1')}}</label>
                                                    <select class="form-control form-control-alternative" name="disability_name[]" id="field">
                                                        @foreach ($pwd_disabilities as $pwddisability)
                                                            <option value="{{$pwddisability->pwd_disability}}">{{ $pwddisability->pwd_disability }}</option>
                                                        @endforeach
                                                    </select>


                                            </div>
                                            <div class="mt-4">
                                                <button type="button" id="add-button" class="btn btn-primary float-left text-uppercase shadow-sm"><i class="fas fa-plus fa-fw"></i> Add</button>
                                                <button type="button" id="remove-button" class="btn btn-danger float-left text-uppercase ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <hr class="my-4" />

                                <h6 class="heading-small text-muted mb-4">{{ __('Address') }}</h6>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('street_address') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('House No. Street') }}</label>
                                                <input type="text" name="street_address" id="input-name" class="form-control form-control-alternative{{ $errors->has('street_address') ? ' is-invalid' : '' }}" placeholder="{{ __('1234 Main St.') }}" value="{{ $seniorinfo -> street_address }}" required autofocus>

                                                @if ($errors->has('street_address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('street_address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('barangay_id') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Barangay') }}</label>
                                                <select class="form-control form-control-alternative" name="barangay_id" id="barangay_id">

                                                    <option value="" selected disabled>Select</option>
                                                    @foreach ($barangays as $barangay)
                                                    <option value="{{$barangay->id}}" {{ ($barangay->id == old('barangay_id',
                                                    $seniorinfo->barangay_id)) ? 'selected' : '' }}>{{ $barangay->barangay }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('municipality') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Municipality') }}</label>
                                                <input type="text" name="municipality" id="input-name" class="form-control form-control-alternative{{ $errors->has('municipality') ? ' is-invalid' : '' }}" placeholder="{{ __('Municipality') }}" value="{{ $seniorinfo -> municipality }}" readonly>

                                                @if ($errors->has('municipality'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('municipality') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('province') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Province') }}</label>
                                                <input type="text" name="province" id="input-name" class="form-control form-control-alternative{{ $errors->has('province') ? ' is-invalid' : '' }}" placeholder="{{ __('Province') }}" value="{{ $seniorinfo -> province }}" readonly>

                                                @if ($errors->has('province'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('province') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <h6 class="heading-small text-muted mb-4">{{ __('Emergency Contact Person') }}</h6>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('e_name') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Full Name') }}</label>
                                                <input type="text" name="e_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('e_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Full Name') }}" value="{{ $seniorinfo -> e_name }}" required autofocus>

                                                @if ($errors->has('e_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('e_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('e_contact') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Contact Number: ') }}</label>
                                                <input type="text" name="e_contact" id="input-name" class="form-control form-control-alternative{{ $errors->has('e_contact') ? ' is-invalid' : '' }}" placeholder="{{ __('Contact No. ') }}" value="{{ $seniorinfo -> e_contact }}" required autofocus>

                                                @if ($errors->has('e_contact'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('e_contact') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('e_address') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                                <input type="text" name="e_address" id="input-name" class="form-control form-control-alternative{{ $errors->has('e_address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}" value="{{ $seniorinfo -> e_address }}" required autofocus>

                                                @if ($errors->has('e_address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('e_address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="form-control-label" for="input-name">{{ __('Files') }}</label>
                                        <div class="file-drop-area form-control-alternative">
                                            <span class="fake-btn">Choose files</span>
                                            <span class="file-msg">{{ $seniorinfo -> senior_file }}</span>
                                            <input class="file-input" type="file" name="senior_file"  value="{{ $seniorinfo -> senior_file }}">
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <div class="row justify-content-center">
                                    <button type="submit" class="btn btn-success">{{ __('Update') }}</button>
                                    <a class="btn btn-info" href="{{ route('senior.show', $seniorinfo->id) }}">Cancel</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.footers.auth')
    </div>
</form>
@endsection

@section('page_level_scripts')
    <script src="{{asset('/js/dragdropupload.js')}}"></script>
    <script src="{{asset('/js/imageupload.js')}}"></script>
    <script src="{{ asset('js/1.6-jquery.min.js') }}"></script>
    <script src="{{ asset('js/1.8-jquery-ui.min.js') }}"></script>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"type="text/javascript"></script> --}}

    <script type="text/javascript">
        $(function () {
            $("#txtDate").datepicker({
                changeMonth: true,
                changeYear: true,
                showOn: 'button',
                buttonImageOnly: true,
                buttonImage: '{{ asset('calendar.gif') }}',
                buttonText: 'Enter Birthdate',
                dateFormat: 'mm/dd/yy',
                yearRange: '1900:+0',
                onSelect: function (dateString, txtDate) {
                    ValidateDOB(dateString);
                }
            });
        });
    </script>
@endsection
