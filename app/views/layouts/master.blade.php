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
    {{ HTML::script('assets/js/plugins/jquery-1.11.2.min.js') }}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::script('assets/js/plugins/jquery.easing.1.3.js') }}
    {{ HTML::script('assets/js/plugins/jquery.event.move.js') }}
    {{ HTML::script('assets/js/plugins/jquery.event.swipe.js') }}
    {{ HTML::script('assets/js/main.js') }}
   
    
    
</head>
<body>
   <section id="header">
            
            
                <div id="announcement">
                    <div class="content-wrapper">           
                        <p>K50 Applications = Currently Open! <a href="http://www.f6s.com/k50/apply" target="_blank" title="Apply here">Apply here</a>. Kairos Global Summit Registration = Now Open for Invited Attendees. <a href="globalsummit/index.html" target="_blank" title="Register">Register here</a></p>
                    </div>
                </div>
            

            <div class="content-wrapper">
                <a href="#" ><img src="{{asset('uploads/logo.png')}}" style="float: left;"></a>
                <a href="#" class="nav-icon" id="nav-trigger">Menu</a>              
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
                    <a href="index.html" class="logo" title="The Kairos Society">The Kairos Society</a>
                    
                    <div class="copyrights">
                        <a href="https://www.facebook.com/TheKairosSociety" target="_blank" title="Facebook" class="fb-link">Facebook</a>
                        <a href="https://twitter.com/KairosSociety" target="_blank" title="Twitter" class="tw-link">Twitter</a>
                        <a href="https://angel.co/the-kairos-society" target="_blank" title="AngelList" class="al-link">AngelList</a>
                    </div>
                    <div class="social-links">
                        <div>&copy; 2015 The Kairos Society. All rights reserved.</div>

                        <a href="ajax/terms.html" title="Terms of Use" class="popup-trigger">Terms of Use</a>
                        <a href="ajax/privacy.html" title="Privacy Policy" class="popup-trigger">Privacy Policy</a>                     
                    </div>
                </div>
            </footer>
        </div><!-- #content -->

        

</div>


</body>
</html>
