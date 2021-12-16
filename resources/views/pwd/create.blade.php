@extends('layouts.app', ['title' => __('PWD Information')])



@section('content')
    @include('users.partials.header', [
        'title' => __('New Entry'),
        'description' => __('This is where you enter all of the information related to Person with Disabilities'),
        'class' => 'col-lg-7'
    ])
<form method="post" action="{{ route('pwd.store') }}" autocomplete="off" enctype="multipart/form-data">
    @csrf

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-2 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" id="imageUpload" name="pwd_img" accept=".png, .jpg, .jpeg"/>
                                        <label for="imageUpload"></label>
                                    </div>
                                    <div class="avatar-preview">
                                        <div id="imagePreview" style="background-image: url('/argon/img/theme/profile.png');">
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
                                            <input type="text" name="lname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lname') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" value="{{ old('lname') }}" required autofocus>

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
                                            <input type="text" name="fname" id="input-name" class="form-control form-control-alternative{{ $errors->has('fname') ? ' is-invalid' : '' }}" placeholder="{{ __('First Name') }}" value="{{ old('fname') }}" required autofocus>

                                            @if ($errors->has('fname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('fname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('mname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Middle Name') }}</label>
                                            <input type="text" name="mname" id="input-name" class="form-control form-control-alternative{{ $errors->has('mname') ? ' is-invalid' : '' }}" placeholder="{{ __('Middle Name') }}" value="{{ old('mname') }}" required autofocus>

                                            @if ($errors->has('mname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('reg_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Identification Number') }}</label>
                                            <input type="text" name="reg_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('reg_num') ? ' is-invalid' : '' }}" placeholder="{{ __('ID Number (12 Digit)') }}" value="{{ old('reg_num') }}" required autofocus>

                                            @if ($errors->has('reg_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('reg_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('sss_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('SSS or GSIS Number') }}</label>
                                            <input type="text" name="sss_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('sss_num') ? ' is-invalid' : '' }}" placeholder="{{ __('SSS or GSIS No. (10 Digit)') }}" value="{{ old('sss_num') }}" required autofocus>

                                            @if ($errors->has('sss_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sss_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('phealth_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Phil Health Number') }}</label>
                                            <input type="text" name="phealth_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('phealth_num') ? ' is-invalid' : '' }}" placeholder="{{ __('Phil Health No. (12 Digit)') }}" value="{{ old('phealth_num') }}" required autofocus>

                                            @if ($errors->has('phealth_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phealth_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('b_day') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Birthdate') }}</label>
                                            <input type="date" name="b_day" id="input-name" class="form-control form-control-alternative{{ $errors->has('b_day') ? ' is-invalid' : '' }}" placeholder="" value="{{ old('b_day') }}" required autofocus>

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

                                                @foreach ($pwd_gender as $pwdgender)
                                                    <option value="{{ $pwdgender->id }}">{{ $pwdgender->gender }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('civstatus_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Civil Status') }}</label>
                                            <select class="form-control form-control-alternative" name="civstatus_id" id="civstatus_id">

                                                @foreach ($civil_status as $civstatus)
                                                    <option value="{{ $civstatus->id }}">{{ $civstatus->civil_status }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('educbg_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Educational Background') }}</label>
                                            <select class="form-control form-control-alternative" name="educbg_id" id="educbg_id">

                                                @foreach ($educ_bg as $educbg)
                                                    <option value="{{$educbg->id}}">{{ $educbg->educ_bg }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group{{ $errors->has('mobile_num') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Mobile Number') }}</label>
                                            <input type="text" name="mobile_num" id="input-name" class="form-control form-control-alternative{{ $errors->has('mobile_num') ? ' is-invalid' : '' }}" placeholder="Mobile No." value="{{ old('mobile_num') }}" required autofocus>

                                            @if ($errors->has('mobile_num'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile_num') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div id="dynamic-field-1" class="form-group dynamic-field">
                                                <label class="form-control-label" for="field">{{ __('Type of Disability #1')}}</label>
                                                {{-- <input type="text" id="field" class="form-control form-control-alternative" name="field[]" /> --}}
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
                                </div>

                                <hr class="my-4" />
                                <h6 class="heading-small text-muted mb-4">{{ __('Address') }}</h6>


                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('street_address') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('House No. Street') }}</label>
                                                <input type="text" name="street_address" id="input-name" class="form-control form-control-alternative{{ $errors->has('street_address') ? ' is-invalid' : '' }}" placeholder="{{ __('1234 Main St.') }}" value="{{ old('street_address') }}" required autofocus>

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

                                                    @foreach ($barangays as $barangay)
                                                        <option value="{{$barangay->id}}">{{ $barangay->barangay }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group{{ $errors->has('municipality') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Municipality') }}</label>
                                                <input type="text" name="municipality" id="input-name" class="form-control form-control-alternative{{ $errors->has('municipality') ? ' is-invalid' : '' }}" placeholder="{{ __('Municipality') }}" value="Calauan" readonly>

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
                                                <input type="text" name="province" id="input-name" class="form-control form-control-alternative{{ $errors->has('province') ? ' is-invalid' : '' }}" placeholder="{{ __('Province') }}" value="Laguna" readonly>

                                                @if ($errors->has('province'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('province') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <h6 class="heading-small text-muted mb-4">{{ __('Employment') }}</h6>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('emp_status') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Employement Status') }}</label>
                                                <input type="text" name="emp_status" id="input-name" class="form-control form-control-alternative{{ $errors->has('emp_status') ? ' is-invalid' : '' }}" placeholder="{{ __('e.g. Employed') }}" value="{{ old('emp_status') }}" required autofocus>

                                                @if ($errors->has('emp_status'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('emp_status') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('emp_type') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Employement Type') }}</label>
                                                <input type="text" name="emp_type" id="input-name" class="form-control form-control-alternative{{ $errors->has('emp_type') ? ' is-invalid' : '' }}" placeholder="{{ __('e.g. Regular, Seasonal') }}" value="{{ old('emp_type') }}" required autofocus>

                                                @if ($errors->has('emp_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('emp_type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('pwd_skill') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Skill') }}</label>
                                                <input type="text" name="pwd_skill" id="input-name" class="form-control form-control-alternative{{ $errors->has('pwd_skill') ? ' is-invalid' : '' }}" placeholder="{{ __('e.g. Welding, Painting') }}" value="{{ old('pwd_skill') }}" required autofocus>

                                                @if ($errors->has('pwd_skill'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('pwd_skill') }}</strong>
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
                                            <span class="file-msg">or drag and drop files here</span>
                                            <input class="file-input" type="file" name="pwd_file" multiple>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
    <script>

    $(document).ready(function() {
  var buttonAdd = $("#add-button");
  var buttonRemove = $("#remove-button");
  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields = 3;

  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Type of Disability #" + count);
    field.find("input").val("");
    $(className + ":last").after($(field));
  }

  function removeLastField() {
    if (totalFields() > 1) {
      $(className + ":last").remove();
    }
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  function disableButtonRemove() {
    if (totalFields() === 1) {
      buttonRemove.attr("disabled", "disabled");
      buttonRemove.removeClass("shadow-sm");
    }
  }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });

  buttonRemove.click(function() {
    removeLastField();
    disableButtonRemove();
    enableButtonAdd();
  });
});
    </script>
@endsection
