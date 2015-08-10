<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{$title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    {{HTML::style('assets/css/all.css')}}
    {{HTML::style('assets/css/bootstrap.css')}}
    {{HTML::style('assets/css/full-slider.css')}}
    {{HTML::style('assets/css/bootstrap.min.css')}}
    {{HTML::style('assets/css/warlock.css')}}
    {{HTML::style('assets/css/font-awesome.css')}}
    {{HTML::style('assets/css/font-awesome.min.css')}}
    {{ HTML::script('assets/js/plugins/jquery-1.11.2.min.js') }}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/plugins/jquery.easing.1.3.js') }}
    {{ HTML::script('assets/js/plugins/jquery.event.move.js') }}
    {{ HTML::script('assets/js/plugins/jquery.event.swipe.js') }}
    {{ HTML::script('assets/js/main.js') }}
   
    
    
</head>
<body style="background-color: #F9F9F9;">
   <section id="header">
   <div class="row">
   <div class="col-md-4 ">
   
   </div>
   <div class="col-md-4 col-xs-6">
            <div class="content-wrapper">
                <a href="/" ><img src="{{asset('uploads/logo.png')}}" style="width: 67%;padding: 4%;"></a>
                            
            </div>
            </div>
            <div class="col-md-4 col-xs-6"> 
            <a href="#"  id="nav-trigger" ><img src="{{asset('uploads/menuicon.png')}}" style="width: 8%;float: right;margin-right: 5%;"></a>
            <a href="#" ><img src="{{asset('uploads/map.png')}}" style="width:8%;float:right;"></a>
           
            
            </div>
            </div>
        </section>

        <nav id="main-nav">
            <div class="content-wrapper">
                <a href="#" title="Close" class="close-nav">Close</a>
                <div class="list-wrapper">
                    <ul>
                        <li><a href="index" title="Home">Home</a></li>
                        <li><a href="aboutus" title="Fellows">About Us</a></li>
                        <li><a href="events" title="K50">Events</a></li>
                        <li><a href="program" title="K Labs">Program</a></li>
                        <li><a href="leader" title="Partners">Leaders</a></li>
                        <li><a href="login" title="Case studies">Login</a></li>
                        
                    </ul>
                    
                </div>              
            </div>              
        </nav>

        


    @yield('content')
    

   <footer id="footer">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="content-wrapper col-md-2 col-md-offset-5">
                <a href="#" ><img src="{{asset('uploads/logo-footer.png')}}" style="margin-top: 3%;"></a>
                            
            </div>
            <div class="content-wrapper col-md-5" style="margin-top:1%">
                <a href="#" class="footer-right" title="Home"><img src="{{asset('uploads/phone.png')}}" style="width: 5%;">+91 124 4974 400</a>
                <a href="#" class="footer-right" title="Home"><img src="{{asset('uploads/location.png')}}" style="width: 5%;">New Delhi, India</a>
                <a href="#" class="footer-right" title="Home"><img src="{{asset('uploads/mail.png')}}" style="width: 5%;">contactus@tgelf.org</a>
                
                            
            </div>

                    </div>
                </div>
            </footer>
        </div><!-- #content -->

        

</div>


</body>
</html>
