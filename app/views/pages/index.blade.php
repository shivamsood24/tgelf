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
                    <a href="#" title="Read more" class="button" style="text-shadow: none;">LEARN MORE</a>
                </div>
            </div>
            <div class="item">
                <!-- Set the second background image using inline CSS below. -->
                <div class="fill" style="background-image:url('{{asset('uploads/slider2.png')}}');"></div>
               <div class="carousel-caption">
                    <h2 class="sliderheader">THE LEADERS FORUM</h2>
                    <p class="sliderheaderp">"Our vision is strategic, our voice credible, our results are unmistakable and our impact global." </p>
                    
                    <br>
                    <a href="#" title="Read more" class="button" style="text-shadow: none;">LEARN MORE</a>
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
                    <a href="#" title="Read more" class="button" style="text-shadow: none;">LEARN MORE</a>
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
    <section class="section without-heading">
                <div class="section-content">
                    <div id="filter" data-base="http://kairossociety.com/k50" class="">
                
                        <form method="post" action="http://kairossociety.com/">
<div class="hiddenFields">
<input type="hidden" name="params" value="eyJyZXN1bHRfcGFnZSI6ImFqYXhcL2ZpbHRlciJ9">
<input type="hidden" name="ACT" value="20">
<input type="hidden" name="site_id" value="1">
<input type="hidden" name="csrf_token" value="702e55564582b7875baec73d51a3c5e7e784b63e">
</div>


                
                            <input type="hidden" name="collection" value="companies">
                            <input type="hidden" name="category:content" value="77">
                
                            <div class="column">
                                <div class="filter-title">Filters<div class="clear-filter" style="display: none;">Clear filter</div></div>
                                <div class="column-content">
                                    <div class="column-footer">
                                        <a href="#" title="Collapse" class="collapse-filter">Collapse</a>
                                    </div>
                                </div>
                            </div>
                
                            <div class="column" data-section="region">
                            <div class="column-title">Region<span></span></div>
                            <div class="column-content">
                                <div class="column-slider">
                                    <ul>
        
        
                                        <li><label><input type="checkbox" name="category:region[]" value="87" class="filter" data-url-title="germany">Germany</label></li><li><label><input type="checkbox" name="category:region[]" value="64" class="filter" data-url-title="asean">ASEAN</label></li><li><label><input type="checkbox" name="category:region[]" value="35" class="filter" data-url-title="australia">Australia</label></li><li><label><input type="checkbox" name="category:region[]" value="36" class="filter" data-url-title="austria">Austria</label></li><li><label><input type="checkbox" name="category:region[]" value="37" class="filter" data-url-title="bangladesh">Bangladesh</label></li><li><label><input type="checkbox" name="category:region[]" value="38" class="filter" data-url-title="belgium">Belgium</label></li><li><label><input type="checkbox" name="category:region[]" value="39" class="filter" data-url-title="brazil">Brazil</label></li><li><label><input type="checkbox" name="category:region[]" value="40" class="filter" data-url-title="bulgaria">Bulgaria</label></li><li><label><input type="checkbox" name="category:region[]" value="41" class="filter" data-url-title="canada">Canada</label></li><li><label><input type="checkbox" name="category:region[]" value="42" class="filter" data-url-title="china">China</label></li><li><label><input type="checkbox" name="category:region[]" value="43" class="filter" data-url-title="croatia">Croatia</label></li><li><label><input type="checkbox" name="category:region[]" value="44" class="filter" data-url-title="denmark">Denmark</label></li><li><label><input type="checkbox" name="category:region[]" value="45" class="filter" data-url-title="france">France</label></li><li><label><input type="checkbox" name="category:region[]" value="46" class="filter" data-url-title="georgia">Georgia</label></li><li><label><input type="checkbox" name="category:region[]" value="47" class="filter" data-url-title="ghana">Ghana</label></li><li><label><input type="checkbox" name="category:region[]" value="81" class="filter" data-url-title="global">Global</label></li><li><label><input type="checkbox" name="category:region[]" value="48" class="filter" data-url-title="hong-kong">Hong Kong</label></li><li><label><input type="checkbox" name="category:region[]" value="49" class="filter" data-url-title="hungary">Hungary</label></li><li><label><input type="checkbox" name="category:region[]" value="50" class="filter" data-url-title="illinois">Illinois</label></li><li><label><input type="checkbox" name="category:region[]" value="51" class="filter" data-url-title="india">India</label></li><li><label><input type="checkbox" name="category:region[]" value="52" class="filter" data-url-title="israel">Israel</label></li><li><label><input type="checkbox" name="category:region[]" value="53" class="filter" data-url-title="italy">Italy</label></li><li><label><input type="checkbox" name="category:region[]" value="54" class="filter" data-url-title="kenya">Kenya</label></li><li><label><input type="checkbox" name="category:region[]" value="55" class="filter" data-url-title="massachussets">Massachussets</label></li><li><label><input type="checkbox" name="category:region[]" value="56" class="filter" data-url-title="mexico">Mexico</label></li><li><label><input type="checkbox" name="category:region[]" value="57" class="filter" data-url-title="michigan">Michigan</label></li><li><label><input type="checkbox" name="category:region[]" value="58" class="filter" data-url-title="new-york">New York</label></li><li><label><input type="checkbox" name="category:region[]" value="60" class="filter" data-url-title="north-carolina">North Carolina</label></li><li><label><input type="checkbox" name="category:region[]" value="59" class="filter" data-url-title="northern-california">Northern California</label></li><li><label><input type="checkbox" name="category:region[]" value="82" class="filter" data-url-title="other">Other</label></li><li><label><input type="checkbox" name="category:region[]" value="61" class="filter" data-url-title="pennsylvania">Pennsylvania</label></li><li><label><input type="checkbox" name="category:region[]" value="62" class="filter" data-url-title="poland">Poland</label></li><li><label><input type="checkbox" name="category:region[]" value="63" class="filter" data-url-title="portugal">Portugal</label></li><li><label><input type="checkbox" name="category:region[]" value="65" class="filter" data-url-title="south-africa">South Africa</label></li><li><label><input type="checkbox" name="category:region[]" value="66" class="filter" data-url-title="southern-california">Southern California</label></li><li><label><input type="checkbox" name="category:region[]" value="67" class="filter" data-url-title="spain">Spain</label></li><li><label><input type="checkbox" name="category:region[]" value="68" class="filter" data-url-title="texas">Texas</label></li><li><label><input type="checkbox" name="category:region[]" value="69" class="filter" data-url-title="the-netherlands">The Netherlands</label></li><li><label><input type="checkbox" name="category:region[]" value="70" class="filter" data-url-title="uk">UK</label></li><li><label><input type="checkbox" name="category:region[]" value="71" class="filter" data-url-title="washington-dc">Washington DC</label></li><li><label><input type="checkbox" name="category:region[]" value="72" class="filter" data-url-title="zambia">Zambia</label></li><li><label><input type="checkbox" name="category:region[]" value="73" class="filter" data-url-title="zimbabwe">Zimbabwe</label></li>
        
                                    </ul>
                                </div><!-- .column-slider -->
                                <div class="column-footer">
                                    <a href="" title="" class="slider-arrow up-arrow" style="opacity: 0.25;">up</a>
                                    <a href="" title="" class="slider-arrow down-arrow">down</a>                                    
                                </div>
                            </div>
                        </div>  
                            <div class="column" data-section="industry">
                            <div class="column-title">Industry<span></span></div>
                            <div class="column-content">
                                <div class="column-slider">
                                    <ul>
        
                                        <li><label><input type="checkbox" name="category:industry[]" value="5" class="filter" data-url-title="advanced-manufacturing">Advanced Manufacturing </label></li><li><label><input type="checkbox" name="category:industry[]" value="6" class="filter" data-url-title="aerospace">Aerospace</label></li><li><label><input type="checkbox" name="category:industry[]" value="7" class="filter" data-url-title="ai-and-machine-learning">AI and Machine Learning</label></li><li><label><input type="checkbox" name="category:industry[]" value="8" class="filter" data-url-title="automotive">Automotive</label></li><li><label><input type="checkbox" name="category:industry[]" value="9" class="filter" data-url-title="biotech">Biotech</label></li><li><label><input type="checkbox" name="category:industry[]" value="10" class="filter" data-url-title="commerce-and-marketplaces">Commerce and Marketplaces</label></li><li><label><input type="checkbox" name="category:industry[]" value="11" class="filter" data-url-title="consumer-goods">Consumer Goods</label></li><li><label><input type="checkbox" name="category:industry[]" value="12" class="filter" data-url-title="data-and-analytics">Data and Analytics</label></li><li><label><input type="checkbox" name="category:industry[]" value="13" class="filter" data-url-title="developer-tools">Developer Tools</label></li><li><label><input type="checkbox" name="category:industry[]" value="14" class="filter" data-url-title="education">Education</label></li><li><label><input type="checkbox" name="category:industry[]" value="15" class="filter" data-url-title="energy">Energy</label></li><li><label><input type="checkbox" name="category:industry[]" value="16" class="filter" data-url-title="enterprise-software">Enterprise Software</label></li><li><label><input type="checkbox" name="category:industry[]" value="17" class="filter" data-url-title="environmental-engineering-and-resource-scarcity">Environmental Engineering and Resource Scarcity</label></li><li><label><input type="checkbox" name="category:industry[]" value="18" class="filter" data-url-title="food-and-agriculture">Food and Agriculture</label></li><li><label><input type="checkbox" name="category:industry[]" value="19" class="filter" data-url-title="gaming-and-entertainment">Gaming and Entertainment</label></li><li><label><input type="checkbox" name="category:industry[]" value="20" class="filter" data-url-title="government-and-public-sector">Government and Public Sector</label></li><li><label><input type="checkbox" name="category:industry[]" value="21" class="filter" data-url-title="healthcare">Healthcare</label></li><li><label><input type="checkbox" name="category:industry[]" value="22" class="filter" data-url-title="information-privacy-and-security">Information Privacy and Security</label></li><li><label><input type="checkbox" name="category:industry[]" value="23" class="filter" data-url-title="information-technology">Information Technology</label></li><li><label><input type="checkbox" name="category:industry[]" value="24" class="filter" data-url-title="infrastructure-and-urban-planning">Infrastructure and Urban Planning</label></li><li><label><input type="checkbox" name="category:industry[]" value="25" class="filter" data-url-title="internet-of-everything">Internet of Everything</label></li><li><label><input type="checkbox" name="category:industry[]" value="26" class="filter" data-url-title="media-and-communications">Media and Communications</label></li><li><label><input type="checkbox" name="category:industry[]" value="27" class="filter" data-url-title="network-infrastructure-and-telecommunications">Network Infrastructure and Telecommunications</label></li><li><label><input type="checkbox" name="category:industry[]" value="85" class="filter" data-url-title="other">Other</label></li><li><label><input type="checkbox" name="category:industry[]" value="28" class="filter" data-url-title="payments-banking-and-financial-management">Payments, Banking and Financial Management</label></li><li><label><input type="checkbox" name="category:industry[]" value="29" class="filter" data-url-title="robotics">Robotics</label></li><li><label><input type="checkbox" name="category:industry[]" value="30" class="filter" data-url-title="transportation-and-logistics">Transportation and Logistics</label></li>
        
                                    </ul>
                                </div><!-- .column-slider -->
                                <div class="column-footer">
                                    <a href="" title="" class="slider-arrow up-arrow" style="opacity: 0.25;">up</a>
                                    <a href="" title="" class="slider-arrow down-arrow">down</a>                                    
                                </div>
                            </div>
                        </div>  
                            <div class="column" data-section="year">
                            <div class="column-title">Year<span></span></div>
                            <div class="column-content">
                                <div class="column-slider">
                                    <ul>
        
        
                                        <li><label><input type="checkbox" name="category:year[]" value="83" class="filter" data-url-title="year-2012">2012</label></li><li><label><input type="checkbox" name="category:year[]" value="76" class="filter" data-url-title="year-2013">2013</label></li><li><label><input type="checkbox" name="category:year[]" value="75" class="filter" data-url-title="year-2014">2014</label></li><li><label><input type="checkbox" name="category:year[]" value="74" class="filter" data-url-title="year-2015">2015</label></li>
        
                                    </ul>
                                </div><!-- .column-slider -->
                                <div class="column-footer">
                                    <a href="" title="" class="slider-arrow down-arrow" style="display: none;">down</a>
                                    <a href="" title="" class="slider-arrow up-arrow" style="display: none; opacity: 0.25;">up</a>
                                </div>
                            </div>
                        </div>
                
                        </form>
                
                    </div><!--  #filter -->
                    <div class="content-search">
                        <!--  -->
    <div class="grid">
        

             
                 

<article class="content-search-box dark-bg">

    <a href="http://kairossociety.com/k50/1st-round" title="1st Round">
        
            <img src="http://kairossociety.com/uploads/companies/_640_640/1st-round.jpg" width="640" height="640" alt="1st Round" class="article-img">
        
        <div class="article-details">
            <h3 class="article-title">1st Round</h3>
        </div>
    </a>
</article> 

<article class="content-search-box light-bg">

    <a href="http://kairossociety.com/k50/advocates-for-health" title="Advocates for Health">
        
            <img src="http://kairossociety.com/uploads/companies/_640_640/advocates-for-world-health.jpg" width="640" height="640" alt="Advocates for Health" class="article-img">
        
        <div class="article-details">
            <h3 class="article-title">Advocates for Health</h3>
        </div>
    </a>
</article> 

<article class="content-search-box light-bg">

    <a href="http://kairossociety.com/k50/afthon" title="Afthon (formerly Detonation Dynamics)">
        
            <img src="http://kairossociety.com/uploads/companies/_640_640/afthon.jpg" width="640" height="640" alt="Afthon (formerly Detonation Dynamics)" class="article-img">
        
        <div class="article-details">
            <h3 class="article-title">Afthon (formerly Detonation Dynamics)</h3>
        </div>
    </a>
</article> 

<article class="content-search-box light-bg">

    <a href="http://kairossociety.com/k50/alcohoot" title="Alcohoot">
        
            <img src="http://kairossociety.com/uploads/companies/_640_640/alcohoot.jpg" width="640" height="640" alt="Alcohoot" class="article-img">
        
        <div class="article-details">
            <h3 class="article-title">Alcohoot</h3>
        </div>
    </a>
</article> 
</div>
                </div>
            </section>
		@stop
		
	    			