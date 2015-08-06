@extends('layouts.master')
@section('content')

<div class="container login-container">
<h1 id="war-header" style="text-align: center;"><span id="war-header-inner" >Login</span></h1>
<div class="row col-md-4 col-md-offset-4 ">

{{ Form::open(array('url' => 'login','method' => 'post')) }}
 
	{{Form::text('username', '', array('class' => 'form-control','placeholder' => 'USER NAME'))}}
	<br>
	<span>{{$errors->login->first('username')}}</span>
	
	{{ Form::password('password', array('class' => 'form-control','placeholder' => 'PASSWORD'))}}
	<br>
	<span>{{$errors->login->first('password')}}</span>
	{{ Form::submit('SUBMIT', array('class' => 'btn btn-default login-btn'))}}
	{{ Form::close() }}
</div>
<div class="row col-md-4 col-md-offset-4" style="margin-top: 5px;">
	
</div>
</div>
@stop
