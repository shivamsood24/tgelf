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
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'CON'))}}
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
	<span class="warlock-error">{{$errors->login->first('paddressline1')}}</span>
	
	{{ Form::text('paddressline2','', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 2'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('paddressline2')}}</span>
	<div class="warlock-inline">
	{{Form::text('pcity', '', array('class' => 'form-control warlock-left','placeholder' => 'CITY'))}}
	<span class="warlock-error">{{$errors->login->first('pcity')}}</span>
	{{Form::text('pstate', '', array('class' => 'form-control warlock-right','placeholder' => 'STATE'))}}
	<span class="warlock-error">{{$errors->login->first('pstate')}}</span>
	</div>
	<br>
	<div class="warlock-inline">
	{{Form::text('pcode', '', array('class' => 'form-control warlock-left','placeholder' => 'PIN CODE'))}}
	<span class="warlock-error">{{$errors->login->first('pcode')}}</span>
	{{Form::text('pcountry', '', array('class' => 'form-control warlock-right','placeholder' => 'COUNTRY'))}}
	<span class="warlock-error">{{$errors->login->first('pcountry')}}</span>
	</div>
	</div>
	<div class="col-md-3">
	<div class="warlock-inline-head">PRESENT ADDRESS</div>
	{{Form::text('caddressline1', '', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 1'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('caddressline1')}}</span>
	
	{{ Form::text('caddressline2','', array('class' => 'form-control','placeholder' => 'ADDRESS LINE 2'))}}
	<br>
	<span class="warlock-error">{{$errors->login->first('caddressline2')}}</span>
	<div class="warlock-inline">
	{{Form::text('ccity', '', array('class' => 'form-control warlock-left','placeholder' => 'CITY'))}}
	<span class="warlock-error">{{$errors->login->first('ccity')}}</span>
	{{Form::text('cstate', '', array('class' => 'form-control warlock-right','placeholder' => 'STATE'))}}
	<span class="warlock-error">{{$errors->login->first('cstate')}}</span>
	</div>
	<br>
	<div class="warlock-inline">
	{{Form::text('ccode', '', array('class' => 'form-control warlock-left','placeholder' => 'PIN CODE'))}}
	<span class="warlock-error">{{$errors->login->first('ccode')}}</span>
	{{Form::text('ccountry', '', array('class' => 'form-control warlock-right','placeholder' => 'COUNTRY'))}}
	<span class="warlock-error">{{$errors->login->first('ccountry')}}</span>
	</div>
	<br>
	{{ Form::submit('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1'))}}
	</div>
	</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop