@extends('layouts.master')
@section('content')
<header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for Slides -->
        <div class="carousel-inner">
            <div class="item active">
                <!-- Set the first background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{asset('uploads/slider.png')}}');"></div>
                <div class="carousel-caption">
                    <h2 class="sliderheader">THE LEADERS FORUM</h2>
                    <p class="sliderheaderp">"Never doubt that a small group of thoughtful, committed citizens can change the world; indeed, it's the only thing that ever has." </p>
                    <p class="mig">-Margaret Mead-</p>
                    <br>
                    <a href="#" title="Read more" class="button">Read more</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{asset('uploads/slider2.png')}}');"></div>
               <div class="carousel-caption">
                    <h2 class="sliderheader">THE LEADERS FORUM</h2>
                    <p class="sliderheaderp">"Never doubt that a small group of thoughtful, committed citizens can change the world; indeed, it's the only thing that ever has." </p>
                    <p class="mig">-Margaret Mead-</p>
                    <br>
                    <a href="# " title="Read more" class="button">Read more</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the third background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{asset('uploads/slider.png')}}');"></div>
                <div class="carousel-caption">
                    <h2 class="sliderheader">THE LEADERS FORUM</h2>
                    <p class="sliderheaderp">"Never doubt that a small group of thoughtful, committed citizens can change the world; indeed, it's the only thing that ever has." </p>
                    <p class="mig">-Margaret Mead-</p>
                    <br>
                    <a href="#" title="Read more" class="button">Read more</a>
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>

    </header>
		@stop
		
	    			