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
<div class="container regiter-container">
<h1 style="text-align: center;text-decoration: line-through;"><span style="background-color:#fff;">Login</span></h1>
<div class="row col-md-4 col-md-offset-4 ">

{{ Form::open(array('url' => 'createuser','method' => 'post')) }}
<?php 
	echo Form::text('email', '', array('class' => 'form-control','placeholder' => 'USER NAME'));
	echo "<br>";
	echo Form::password('', array('class' => 'form-control','placeholder' => 'PASSWORD'));
	echo "<br>";
	echo Form::password('', array('class' => 'form-control','placeholder' => 'CONFIRM PASSWORD'));
	echo "<br>";
	echo Form::text('uniquecode', '', array('class' => 'form-control','placeholder' => 'VERIFICATION CODE'));
	echo "<br>";
	echo Form::submit('Submit!', array('class' => 'btn btn-default login-btn'));
	?>
	{{ Form::close() }}
</div>
</div>
@stop
