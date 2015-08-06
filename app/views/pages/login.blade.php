@extends('layouts.master')
@section('content')

<div class="container login-container">
<h1 id="war-header" style="text-align: center;"><span id="war-header-inner" >Login</span></h1>
<div class="row col-md-4 col-md-offset-4 ">

{{ Form::open(array('url' => 'login','method' => 'post')) }}
<?php 
	echo Form::text('email', '', array('class' => 'form-control','placeholder' => 'USER NAME'));
	echo "<br>";
	echo Form::password('', array('class' => 'form-control','placeholder' => 'PASSWORD'));
	echo "<br>";
	echo Form::submit('Submit!', array('class' => 'btn btn-default login-btn'));
	?>
	{{ Form::close() }}
</div>
<div class="row col-md-4 col-md-offset-4" style="margin-top: 5px;">
	 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif
</div>
</div>
@stop
