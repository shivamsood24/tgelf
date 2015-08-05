@extends('layouts.temp')
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
<div class="row">
{{ Form::open(array('url' => 'createuser','method' => 'post')) }}
<?php 
	echo Form::label('usernamelabel', 'Username');
	echo Form::text('username');
	echo "<br>";
	echo Form::label('pass', 'Password');
	echo Form::text('password');
	echo "<br>";
	echo Form::label('confirmpass','Confirm Password');
	echo Form::text('confirmpassword');
	echo "<br>";
	echo Form::label('codelabel', 'Enter the Unique Code');
	echo Form::text('uniquecode');
	echo "<br>";
	echo Form::submit('Submit!');
	?>
	{{ Form::close() }}
</div>
@stop
