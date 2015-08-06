@extends('layouts.master')
@section('content')
<div class="row">
	 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
</div>
<div class="container">
<div class="row col-md-4 col-md-offset-4">
<h1>Login</h1>
{{ Form::open(array('url' => 'createuser','method' => 'post')) }}
<?php 
	echo Form::text('email', 'User Name', array('class' => 'form-control'));
	echo "<br>";
	echo Form::text('password', 'PASSWORD', array('class' => 'form-control'));
	echo "<br>";
	echo Form::text('confirmpassword', 'CONFIRM PASSWORD', array('class' => 'form-control'));
	echo "<br>";
	echo Form::text('uniquecode', 'VERIFICATION CODE', array('class' => 'form-control'));
	echo "<br>";
	echo Form::submit('Submit!', array('class' => 'btn btn-default'));
	?>
	{{ Form::close() }}
</div>
</div>
@stop
