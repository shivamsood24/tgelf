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
<div class="row">
 	<fieldset class="warlock-field">
 	<div class="row">
 	<div class="col-md-3">
 	<div class="warlock-inline-head" >PERSONAL INFO</div>
 	<div class="warlock-inline">
	{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FIRST NAME'))}}
	<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
	{{Form::text('lastname', '', array('class' => 'form-control warlock-right','placeholder' => 'LAST NAME'))}}
	<span class="warlock-error">{{$errors->login->first('lastname')}}</span>
	</div>
	<br>
	{{ Form::email('personalemail','', array('class' => 'form-control','placeholder' => 'EMAIL ADDRESS(PERSONAL)'))}}
	<span class="warlock-error">{{$errors->login->first('personalemail')}}</span>
	<br>
	{{ Form::email('professionalemail','', array('class' => 'form-control','placeholder' => 'EMAIL ADDRESS(PROFESSIONAL)'))}}
	<span class="warlock-error">{{$errors->login->first('professionalemail')}}</span>
	<br>
	<div>
		{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
		{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
	</div>
	<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
	<br>
	</div>
	<div class="col-md-3">
	<div class="warlock-inline-head">PARENTAL INFO</div>
	{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
	<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
	<br>
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'PASSWORD'))}}
	<span class="warlock-error">{{$errors->login->first('password')}}</span>
	<br>
	{{ Form::password('mothername', array('class' => 'form-control','placeholder' => 'MOTHERS NAME'))}}
	<span class="warlock-error">{{$errors->login->first('mothername')}}</span>
	<br>
	{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
	<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
	<br>
	</div>
	<div class="col-md-3">
	<div class="warlock-inline-head">PERMANENT ADDRESS</div>
	{{Form::text('paddressline1', '', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 1'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('username')}}</span>
	
	{{ Form::text('paddressline2','', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 2'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('password')}}</span>
	{{ Form::password('confirmpassword', array('class' => 'form-control','placeholder' => 'CONFIRM PASSWORD'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('confirmpassword')}}</span>
	{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
	{{ Form::submit('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1'))}}
	</div>
	<div class="col-md-3">
	<div class="warlock-inline-head">PRESENT ADDRESS</div>
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
	</div>
	</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop