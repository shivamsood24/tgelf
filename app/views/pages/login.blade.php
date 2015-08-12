@extends('layouts.master')
@section('content')

<div class="container login-container">
<h1 id="war-header" style="text-align: center;"><span id="war-header-inner" >LOGIN</span></h1>
<div class="row col-md-4 col-md-offset-4 ">

{{ Form::open(array('url' => 'login','method' => 'post','autocomplete' => 'off')) }}
 	<div style="text-align: center;color:#a83334">{{Session::get('message')}}</div>
	{{Form::text('username', '', array('class' => 'form-control','placeholder' => 'USER NAME'))}}
	<span class="warlock-error">{{$errors->login->first('username')}}</span>
	<br>
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'PASSWORD'))}}
	<span class="warlock-error">{{$errors->login->first('password')}}</span>
	<br>
	{{ Form::submit('SUBMIT', array('class' => 'btn btn-default login-btn'))}}
	{{ Form::close() }}
</div>
<div class="row col-md-4 col-md-offset-4" style="margin-top: 5px;">
	
</div>
</div>
@stop
