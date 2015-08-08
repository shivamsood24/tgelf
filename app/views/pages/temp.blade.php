@extends('layouts.master')
@section('content')

<div class="container login-container">
	<h1 id="" style="text-align: center;margin-bottom: 30px"><span id="war-header-inner" style="color:#A83334">REGISTER</span></h1>
	{{ Form::open(array('url' => 'createuser','method' => 'post','autocomplete' => 'off','id' => 'registerform')) }}
	<ul id="progressbar">
		<li class="l1 active">Account Setup</li>
		<li class="l2">Social Profiles</li>
		<li class="l3">Personal Details</li>
	</ul>
	<fieldset class="f1">
		<div class="row col-md-4 col-md-offset-4 ">
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
			{{ Form::button('GET STARTED', array('class' => 'btn btn-default login-btn next1 last-btn','data-val'=> '1'))}}
		</div>
	</fieldset>
	<fieldset class="f2">
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
				<div class="col-md-4 warlock-clear">
					{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
				</div>
				<div class="col-md-8 warlock-clear">
					{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
				</div>
				<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
				</div>
				
				<br>
			</div>
			<div class="col-md-3">
				<div class="warlock-inline-head">PARENTAL INFO</div>
				{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
				<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
				<br>
				<div>
				<div class="col-md-4 warlock-clear">
					{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
					<br>
				</div>
				<div class="col-md-8 warlock-clear">
					{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
					<br>
				</div>
				</div>
				<br>
				<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
				{{Form::text('fathername', '', array('class' => 'form-control','placeholder' => 'FATHERS NAME'))}}
				<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
				<br>
				<div>
				<div class="col-md-4 warlock-clear">
					{{Form::select('name', array('key' => 'value'))}}
				</div>
				<div class="col-md-8 warlock-clear">
					{{Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'))}}
				</div>
				<span class="warlock-error">{{$errors->login->first('uniquecode')}}</span>
				</div>
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
				{{ Form::button('GET STARTED', array('class' => 'btn btn-default login-btn next2 last-btn','data-val'=> '1'))}}
			</div>
		</div>
	</fieldset>
	<fieldset class="f3">
		<div class="row">
			<div class="col-md-5">
				<div class="col-md-3">
                    <div id="circleforregister" class="left"></div>
                </div>
				<div class="col-md-9">
				 
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					<br>
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'UNIVERSITY/COMPANY'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					<br>
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'MAJOR/POSITION'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
					
				</div>
				
			</div>
			<div class="col-md-4">
				{{Form::textarea('fathername', '', array('class' => 'form-control','placeholder' => 'BIO', 'rows' => 9, 'cols' => 40))}}
				<span class="warlock-error">{{$errors->login->first('fathername')}}</span>
				
			</div>
			<div class="col-md-3">
				
				{{ Form::select('key_skill', array('key'=>'KEY SKILL'), null,array('class' => 'form-control')); }}
				<br>
				<span class="warlock-error">{{$errors->login->first('paddressline1')}}</span>

				{{ Form::textarea('funfact','', array('class' => 'form-control','placeholder' => 'FUN FACT', 'rows' => 5, 'cols' => 40))}}
				<br>
				<span class="warlock-error">{{$errors->login->first('paddressline2')}}</span>
			</div>
			
		</div>
		<br>
		<div class="row">
		<p>SOCIAL MEDIA PROFILES</p>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
		<p>WORK MEDIA PROFILES</p>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="col-md-2 formpad">
					<a href="../icon/github" class="soclicon form-control formicons" style="border: 2px #A83334 solid;"><i class="icon-youtube-play"></i></a>
				</div>
				<div class="col-md-10 formpad">
						{{Form::text('firstname', '', array('class' => 'form-control warlock-left','placeholder' => 'FULL NAME'))}}
						
						<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
		<p>AREAS OF INTEREST</p>
			<div class="col-md-4">
					{{Form::text('firstname', '', array('class' => 'form-control warlock-left'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
			</div>
			<div class="col-md-4">
				{{Form::text('firstname', '', array('class' => 'form-control warlock-left'))}}
					<span class="warlock-error">{{$errors->login->first('firstname')}}</span>
				
			</div>
			<div class="col-md-4">
				{{Form::text('paddressline1', '', array('class' => 'form-control'))}}
		</div>
		</div>
	</fieldset>
	{{ Form::close() }}

	<div class="row col-md-4 col-md-offset-4" style="margin-bottom: 10%;">

	</div>
</div>
{{ HTML::script('assets/js/script.js') }}
@stop

