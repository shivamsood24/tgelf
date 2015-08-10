 @extends('layouts.master')
 @section('content')

 <div class="container login-container">
    <div class="row">
        <div class="col-md-3">
            <div id="circle">
            <img src="{{asset($username->userprofiles->photo)}}" alt="" width="200px" height="200px" style="border-radius: 50%;">
             </div>
        </div>
        <div class="col-md-5" >
            <h1><span style="color:#c6c6c6">{{ $username->firstname }}</span><span class="profile_head"> {{ $username->lastname }}</span></h1>
            <hr>
            <h3 class="profile_head">{{$username->userprofiles->universitycompany}} | {{$username->userprofiles->majorposition}}</h3>
            <h3 class="desig"><span style="color:#c6c6c6">{{$username->useraddress->state}}</span>,<span style="color:#808080">{{$username->useraddress->country}}</span></h3>    

        </div>
        <div class="col-md-3">
            <div id="">
            <img src="{{asset('uploads/'.$username->useraddress->country)}}.png" alt="" style="width: 99%;">
            <br>
<h3 class="desig"  style="text-align: center"><span class="profile_head">{{$username->useraddress->country}}</span></h3>    
             </div>
        </div>

    </div>
    <br>
    <br>
    <div class="row">
        
        <div class="col-md-7" style="border-right: 1px #A83334 solid;">

            <h3>BIO</h3>

            <p class="profilep">{{$username->userprofiles->bio}}</p>

        </div>

        <div class="col-md-5" style="text-align: center;">
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
    <br>
    <div class="row">
    <div class="col-md-12">
    <h2 style="text-align: center;color: #D0CECE;">AREAS OF INTEREST</h2>
     <a href="#" ><img src="{{asset('uploads/line.png')}}" style="width:100%;"></a>
      <div>
                @foreach ($username->userinterests as $user)
            @if ($user->isprimary == 0)
            <div class="col-md-4" style="text-align: center;">
            <a href="#" class="soclicon">{{$user->name}}</a>
            </div>
            @endif
            @endforeach
                </div>
    </div>
    </div>
</div>
@stop
