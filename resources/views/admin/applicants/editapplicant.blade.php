@extends('admin.layout.template')

@section('admin-title')
    Edit Applicant information
@endsection

@section('admin-content')

    <div id="content">
        <div id="content-header">
            <h1>Edit Applicant Information</h1>
        </div>
        <div id="breadcrumb">
            <a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Home</a>
            <a href="#" class="current">Applicant's information</a>
        </div>
        <div class="container-fluid">
            <br />
            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="widget-box">
                                <div style="display: flex;  align-items: center" class="widget-title">
                                </div>
                                <div class="widget-content">
                                    <span>
                                        @foreach($errors->all() as $error)
                                            <strong style="color: red">*{{ $error }}</strong> <br>
                                        @endforeach
                                        @if(Session::has('error'))
                                            <strong style="color: red">* {{ Session::get('error') }}</strong> <br>
                                        @endif
                                    </span>
                                    <div class="row">
                                        @if(Session::has('success'))
                                            <strong style="color: green">* {{ Session::get('success') }}</strong>
                                        @endif

                                        <form style="display: grid; grid-template-columns: 1fr 1fr" method="post" action="{{route('applicants.updateapplicant', ['studentapplicant' => $student->id])}}" class="form-horizontal">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Surname:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="surname" value="{{ $student->surname }}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">First Name</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="first_name" value="{{ $student->first_name }}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Middle Name:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="middle_name" value="{{ $student->middle_name }}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Gender:</label>
                                                    <div class='col-sm-6'>
                                                        <select class='form-control custom-select' name='gender' required>
                                                            <option selected='{{$student->gender}}' value=''></option>
                                                            <option value='MALE'>MALE</option>
                                                            <option value='FEMALE'>FEMALE</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Religion:</label>
                                                    <div class='col-sm-6'>
                                                        <select class='form-control custom-select' name='religion' required>
                                                            <option selected='{{$student->religion}}' value=''></option>
                                                            <option value='Christianity'>CHRISTIANITY</option>
                                                            <option value='Islam'>ISLAM</option>
                                                            <option value='Other'>OTHER</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Phone Number:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="phone"  value="{{$student->phone}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Date of Birth:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="dob"  value="{{date("Y-m-d", strtotime($student->dob))}}" type="date"  class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <input type="hidden" name="role" value="2">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Email:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="email" value="{{ $student->email}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's name:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required name="sponsor_name"  value="{{ $student->sponsor_name}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">sponsor's phone:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input required  name="sponsor_phone" value="{{ $student->sponsor_phone}}" type="number" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Sponsor's Address:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <textarea required value="" name="sponsor_add" cols="30" rows="3" class="form-control">{{$student->sponsor_add}}</textarea>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col">
                                              <div class='row form-group'>
                                              <div col="col-lg-6">
                                                  <img src="{{asset($student->pic_url)}}" class="pull-center img-responsive" alt="loading" height="100" width="70">
                                              </div>
                                            </div>

                                              <div class='row form-group'>
                                                  <div class='col-lg-2'>
                                                      <label>
                                                          State of Origin</label>
                                                  </div>
                                                  <div class='col-lg-6'>

                                                      <select onchange="getLga(event)" class="form-control input-sm" name="state_of_origin" id="" required>
                                                          <option selected value="{{$student->state_of_origin}}">{{$states->find($student->state_of_origin)->name}}</option>
                                                          @foreach($states as $dep)
                                                              <option value="{{$dep->id}}">{{$dep->name}}</option>
                                                          @endforeach
                                                      </select>
                                                  </div>
                                              </div>

                                              <div class='row form-group'>
                                                    <div class='col-lg-2'>
                                                        <label>
                                                            LGA</label>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <div class='form-group'>
                                                            <select class="form-control input-sm" required placeholder="local government area" name="lga" id="lga"></select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    function getLga(event)
                                                    {
                                                        event.preventDefault();
                                                        let stateId = event.target.value;
                                                        fetch(`/api/get-location/${stateId}`, {
                                                            method: 'GET'
                                                        })
                                                            .then(response => response.json())
                                                            .then(data => {
                                                                let select = document.getElementById('lga');
                                                                select.innerHTML = "";
                                                                data.forEach((ele) => {
                                                                    let op = document.createElement('option');
                                                                    op.appendChild(document.createTextNode(ele.lga));
                                                                    op.setAttribute('value', ele.id);
                                                                    select.insertAdjacentElement('beforeend', op);
                                                                })
                                                            });
                                                    }
                                                </script>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">Address:</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <textarea value="" name="home_address" cols="30" rows="3" class="form-control">{{$student->home_address}}</textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-3 col-md-3 col-lg-2 control-label">city</label>
                                                    <div class="col-sm-9 col-md-6 col-lg-6">
                                                        <input name="city" value="{{$student->state}}" type="text" class="form-control input-sm" />
                                                    </div>
                                                </div>
                                                <input type="hidden" name="_method" value="PUT">
                                                <br>
                                                <div class='row form-group'>
                                                    <div class='col-lg-2'>
                                                        <label>
                                                            Exam Number</label>
                                                    </div>
                                                    <div class='col-lg-6'>
                                                        <input type='text' name='exam_no'  value="{{ $student->exam_no }}" class='form-control' required>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exam_no" class="col-md-2 col-form-label text-md-right">{{ __('Mathematics') }}</label>
                                                    <div class="col-md-6">
                                                      <select class="form-control" id="mathematics" name="mathematics" required>
                                                          <option value="{{$student->mathematics}}">{{$student->mathematics}} </option>
                                                          <option value="AR">AR</option>
                                                          <option value="A1">A1</option>
                                                          <option value="B2">B2</option>
                                                          <option value="B3">B3</option>
                                                          <option value="C4">C4</option>
                                                          <option value="C5">C5</option>
                                                          <option value="C6">C6</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exam_no" class="col-md-2 col-form-label text-md-right">{{ __('English') }}</label>
                                                    <div class="col-md-6">
                                                      <select class="form-control" id="english" name="english" required>
                                                          <option value="{{$student->english}}">{{$student->english}} </option>
                                                          <option value="AR">AR</option>
                                                          <option value="A1">A1</option>
                                                          <option value="B2">B2</option>
                                                          <option value="B3">B3</option>
                                                          <option value="C4">C4</option>
                                                          <option value="C5">C5</option>
                                                          <option value="C6">C6</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="index_no" class="col-md-2 col-form-label text-md-right">{{ __('Biology') }}</label>
                                                    <div class="col-md-6">
                                                      <select class="form-control" id="biology" name="biology" required>
                                                          <option value="{{$student->biology}}">{{$student->biology}} </option>
                                                          <option value="AR">AR</option>
                                                          <option value="A1">A1</option>
                                                          <option value="B2">B2</option>
                                                          <option value="B3">B3</option>
                                                          <option value="C4">C4</option>
                                                          <option value="C5">C5</option>
                                                          <option value="C6">C6</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exam_no" class="col-md-2 col-form-label text-md-right">{{ __('Physics') }}</label>
                                                    <div class="col-md-6">
                                                      <select class="form-control" id="physics" name="physics" required>
                                                          <option value="{{$student->physics}}">{{$student->physics}} </option>
                                                          <option value="AR">AR</option>
                                                          <option value="A1">A1</option>
                                                          <option value="B2">B2</option>
                                                          <option value="B3">B3</option>
                                                          <option value="C4">C4</option>
                                                          <option value="C5">C5</option>
                                                          <option value="C6">C6</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exam_no" class="col-md-2 col-form-label text-md-right">{{ __('Chemistry') }}</label>
                                                    <div class="col-md-6">
                                                      <select class="form-control" id="chemistry" name="chemistry" required>
                                                          <option value="{{$student->chemistry}}"> {{$student->chemistry}}</option>
                                                          <option value="AR">AR</option>
                                                          <option value="A1">A1</option>
                                                          <option value="B2">B2</option>
                                                          <option value="B3">B3</option>
                                                          <option value="C4">C4</option>
                                                          <option value="C5">C5</option>
                                                          <option value="C6">C6</option>
                                                      </select>
                                                    </div>
                                                </div>
                                              </div>


                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary btn-sm">Update Profile</button>
                                            </div>
                                            {{ csrf_field() }}
                                        </form>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

@stop
