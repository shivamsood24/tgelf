 @extends('layouts.master')
@section('content')

        <div class="container login-container">
            <div class="row">
                <div class="col-md-4">
                <div  id="circles" class="left"><h4>User Name</h4></div>
                <div id="right">
                    
                </div>
                </div>
                <div class="col-md-5">
                <h1></h1>
                <hr>
                <h3>Ford Foundation</h3>
                <h3>Regional Vice President</h3>
                    
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
                 <a href="#" class="soclicon">Design</a>
                <a href="#" class="soclicon">Technology</a>
                <a href="#" class="soclicon">Research</a>
                </div>
                <div class="col-md-5" style="border-right: 1px #A83334 solid;border-left: 1px #A83334 solid;">
                
                <h3 style="text-align: center">BIO</h3>
                
                <p style="text-align:center" class="profilep">Lorem ipsum” dummy text is used by many web-developers to test how their HTML templates will look with real data. Often</p>
                
                </div>
                
                <div class="col-md-3">
                    <p class="profilep">"Lorem ipsum” dummy text is used by many web-developers to test."</p>
                    <div style="margin-top: 10%;">
                <a href="../icon/github" class="soclicon"><i class="icon-github"></i></a>
                <a href="../icon/github" class="soclicon"><i class="icon-github"></i></a>
                <a href="../icon/github" class="soclicon"><i class="icon-youtube-play"></i></a>
                <a href="../icon/github" class="soclicon"><i class="icon-twitter-sign"></i></a>
                <a href="../icon/github" class="soclicon"><i class="icon-linkedin-sign"></i></a>
                </div>
               
                            
            
                </div>
                
            </div>
        </div>
@stop
