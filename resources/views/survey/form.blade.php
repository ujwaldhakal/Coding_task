@extends('master')
@section('content')
    <h1>Survey Form 2016</h1>
    <h3><a href="{{$listRoute}}">List Survey</a></h3>
    {{--<form class="validate-form">--}}
    {!!Form::open(['class'=> 'validate-form','url' => $route])!!}
    <div class="form-group row">
        <label for="name" class="col-xs-2 col-form-label ">Name</label>

        <div class="col-xs-10">
            {!!Form::text('name',null,array('class' => 'required form-control','id' => 'name','placeholder' => 'Your Name'))!!}

            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
            @endif
        </div>

    </div>
    <div class="form-group row">
        <label for="example-search-input" class="col-xs-2 col-form-label">Gender</label>

        <div class="col-xs-10">
            <label for="male">Male</label>
            <input type="radio" class="required" id="male" name="gender" value="m" checked>
            <label for="female">Female</label>
            <input type="radio" class="required" id="female" name="gender" value="f">
        </div>
    </div>
    <div class="form-group row">
        <label for="phone" class="col-xs-2 col-form-label">Phone</label>

        <div class="col-xs-10">
            {!!Form::tel('phone',null,array('class' => 'required form-control','id' => 'name','placeholder' => 'Your Phone Number'))!!}
            @if ($errors->has('phone'))
                <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-xs-2 col-form-label">Email</label>

        <div class="col-xs-10">
            {!!Form::email('email',null,array('class' => 'required form-control','id' => 'email','placeholder' => 'Your Email Address'))!!}
            @if ($errors->has('email'))
                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="address" class="col-xs-2 col-form-label">Address</label>

        <div class="col-xs-10">
            {!!Form::text('address',null,array('class' => 'required form-control','id' => 'address','placeholder' => 'Your Address Details'))!!}
            @if ($errors->has('address'))
                <span class="help-block">
                        <strong>{{ $errors->first('address') }}</strong>
                    </span>
            @endif

        </div>
    </div>

    <div class="form-group row">
        <label for="address" class="col-xs-2 col-form-label">Nationality</label>

        <div class="col-xs-10">
            {!!Form::text('nationality',null,array('class' => 'required form-control','id' => 'nationality','placeholder' => 'Your Nationality Details'))!!}
            @if ($errors->has('nationality'))
                <span class="help-block">
                        <strong>{{ $errors->first('nationality') }}</strong>
                    </span>
            @endif

        </div>
    </div>
    <div class="form-group row">
        <label for="dob" class="col-xs-2 col-form-label">Date of birth</label>

        <div class="col-xs-10">
            {!!Form::date('dob',null,array('class' => 'required form-control','id' => 'dob','placeholder' => 'Date of birth'))!!}
            @if ($errors->has('dob'))
                <span class="help-block">
                        <strong>{{ $errors->first('dob') }}</strong>
                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="education" class="col-xs-2 col-form-label">Education Background</label>

        <div class="col-xs-10">
            {!!Form::textarea('education',null,array('class' => 'required form-control','id' => 'education','placeholder' => 'Your Education Background'))!!}
            @if ($errors->has('education'))
                <span class="help-block">
                        <strong>{{ $errors->first('education') }}</strong>
                    </span>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label for="contact_mode" class="col-xs-2 col-form-label">Preferred mode of contact</label>

        <div class="col-xs-10">
            {!!Form::select('contact_mode',array('None'=>'None','Email'=>'Email','Phone'=>'Phone'),'null',array('class' => 'form-control','id' =>'contact_mode'))!!}
            @if ($errors->has('contact_mode'))
                <span class="help-block">
                        <strong>{{ $errors->first('contact_mode') }}</strong>
                    </span>
            @endif
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    {{--{!!Form::close()!!}--}}
    </form>
@endsection
@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
@endpush
@push('scripts')
<script src="{{asset('assets/js/main.js')}}" type="text/javascript"></script>
@endpush
