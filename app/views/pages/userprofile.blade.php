 @extends('layouts.master')
 @section('content')

 <div class="container login-container">
    <div class="row">
        <div class="col-md-4">
            <div  id="circle"> </div>

        </div>
        <div class="col-md-5">
            <h1>{{ $username->username }}</h1>
            <hr>
            <h3>{{$username->userprofiles->universitycompany}},{{$username->userprofiles->majorposition}}</h3>
            <h3>{{$username->useraddress->state}},{{$username->useraddress->country}}</h3>    

        </div>
        <div class="col-md-3">
            <div  id="circle"> </div>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col-md-4">
            <h3>AREAS OF INTEREST</h3>
            <a href="#" ><img src="{{asset('uploads/line.png')}}" style="width:100%;"></a>
            @foreach ($username->userinterests as $user)
            @if ($user->isprimary == 0)
            <div>
            <a href="#" class="soclicon">{{$user->name}}</a>
            </div>
            @endif
            @endforeach
        </div>
        <div class="col-md-5" style="border-right: 1px #A83334 solid;border-left: 1px #A83334 solid;">

            <h3 style="text-align: center">BIO</h3>

            <p style="text-align:center" class="profilep">{{$username->userprofiles->bio}}</p>

        </div>

        <div class="col-md-3">
            <p class="profilep">"{{$username->userprofiles->funfact}}"</p>
            <div style="margin-top: 10%;">
                <a href="{{$username->sociallinks->twitter}}" class="soclicon" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="{{$username->sociallinks->linkedin}}" class="soclicon" target="_blank"><i class="fa fa-linkedin"></i></a>
                <a href="{{$username->sociallinks->youtube}}" class="soclicon" target="_blank"><i class="fa fa-youtube-play"></i></a>
                <a href="{{$username->sociallinks->github}}" class="soclicon" target="_blank"><i class="fa fa-github"></i></a>
                <a href="{{$username->sociallinks->behance}}" class="soclicon" target="_blank"><i class="fa fa-behance"></i></a>
                <a href="{{$username->sociallinks->academia}}" class="soclicon" target="_blank"><i class="fa fa-graduation-cap"></i></a>
            </div>


            
        </div>

    </div>
</div>
@stop
