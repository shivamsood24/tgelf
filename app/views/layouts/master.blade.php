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
                        <li><a href="index.html" title="Home">Home</a></li>
                        <li><a href="fellows.html" title="Fellows" class="active">Fellows</a></li>
                        <li><a href="k50.html" title="K50">K50</a></li>
                        <li><a href="klabs.html" title="K Labs">KLabs</a></li>
                        <li><a href="partners.html" title="Partners">Partners</a></li>
                        <li><a href="case-studies.html" title="Case studies">Case Studies</a></li>
                        <li><a href="blog.html" title="Blog">Blog</a></li>
                        <li><a href="events.html" title="Events">Events</a></li>
                        <li><a href="about.html" title="About">About</a></li>
                        <li><a href="get-involved.html" title="Get Involved">Get Involved</a></li>
                        <li><a href="jobs.html" title="Jobs">Jobs</a></li>
                    </ul>
                    <a href="about.html#newsletter" title="Sign up for newsletter" class="button dark-blue">Sign up for newsletter</a>
                </div>              
            </div>              
        </nav>

        <div id="main-search">
            <div class="content-wrapper">
                <a href="#" title="Close" class="close-search">Close</a>
                <form action="http://kairossociety.com/ajax/search" method="get" class="search-form">
                    <input type="text" class="search-input" value="" tabindex="-1" />
                    <div class="search-input-placeholder">Search ...</div>
                    <button type="button" class="search-submit">Search</button>
                </form>
            </div>              
        </div>


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
