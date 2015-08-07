@extends('layouts.master')
@section('content')

<div class="container login-container">
<h1 id="war-header" style="text-align: center;"><span id="war-header-inner" >REGISTER</span></h1>
<div class="row col-md-4 col-md-offset-4 ">

{{ Form::open(array('url' => 'createuser','method' => 'post','autocomplete' => 'off','id' => 'registerform')) }}
 	<fieldset>
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
	{{ Form::submit('GET STARTED', array('class' => 'btn btn-default login-btn next','data-val'=> '1'))}}
	</fieldset>
	{{ Form::close() }}
</div>
<div class="row col-md-4 col-md-offset-4" style="margin-top: 5px;">
	
</div>
</div>
{{ HTML::script('assets/js/script.js') }}@stop

