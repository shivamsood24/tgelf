@extends('layouts.master')
@section('content')

<div class="container login-container">
<h1 id="" style="text-align: center;margin-bottom: 30px"><span id="war-header-inner" style="color:#A83334">REGISTER</span></h1>


{{ Form::open(array('url' => 'createuser','method' => 'post','autocomplete' => 'off','id' => 'registerform')) }}
<ul id="progressbar">
		<li class="active">Account Setup</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
	</ul>
	<div class="row col-md-4 col-md-offset-4 ">
 	<fieldset class="warlock-field">
	{{Form::text('username', '', array('class' => 'form-control','placeholder' => 'USER NAME'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('username')}}</span>
	
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'PASSWORD'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('password')}}</span>
	{{ Form::password('confirmpassword', array('class' => 'form-control','placeholder' => 'CONFIRM PASSWORD'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('confirmpassword')}}</span>
	{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
	{{ Form::submit('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1'))}}
	</fieldset>
	{{ Form::close() }}
</div>
<div class="row col-md-4 col-md-offset-4" style="margin-top: 5px;">
	
</div>
</div>
{{ HTML::script('assets/js/script.js') }}@stop

