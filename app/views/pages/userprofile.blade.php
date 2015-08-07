 @extends('layouts.master')
@section('content')

		<div class="container login-container">
			<div class="row">
				<div class="col-md-4">
				<div  id="circle"> </div>
					
				</div>
				<div class="col-md-4">
				<h1>{{$username->firstname}}</h1>
				<hr>
				<h3>Ford Foundation</h3>
				<h3>Regional Vice President</h3>
					
				</div>
				<div class="col-md-4">
					<div  id="circle"> </div>
				</div>
				
			</div>
			<div class="row">
			<div class="col-md-4">
				<h1>AREAS OF INTEREST</h1>
				<hr>
				Ford Foundation	
				</div>
				<div class="col-md-4">
				<h3 style="text-align: center">BIO</h3>
				<hr>
				<p style="text-align:center" class="profilep">Lorem ipsum” dummy text is used by many web-developers to test how their HTML templates will look with real data. Often</p>
					
				</div>
				<p>/</p>
				<div class="col-md-4">
					<p class="profilep">"Lorem ipsum” dummy text is used by many web-developers to test how their HTML templates will look with real data. Often"</p>
				<a href="../icon/github" class="soclicon"><i class="icon-github"></i></a>
				<a href="../icon/github" class="soclicon"><i class="icon-github"></i></a>
				<a href="../icon/github" class="soclicon"><i class="icon-youtube-play"></i></a>
				<a href="../icon/github" class="soclicon"><i class="icon-twitter-sign"></i></a>
				<a href="../icon/github" class="soclicon"><i class="icon-linkedin-sign"></i></a>
				
               
                            
            
				</div>
				
			</div>
		</div>
@stop
