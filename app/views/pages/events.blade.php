 @extends('layouts.master')
 @section('content')
<div class="container login-container">
<h1 id="war-header" style="text-align: center;margin-bottom: 1px !important;"><span id="war-header-inner">EVENTS</span><br><img src="{{asset('uploads/cal.png')}}" style="text-align: center;"></h1>

<div class="section-content">
                <div class="grid absolute-nav">
                    <div class="grid-slider" style="transform: translate3d(0%, 0px, 0px);">
    

                        <div class="box quarter-box solid-bg grid-slide" style="background-image: url({{asset('uploads/event1.png')}});    background-color: #808080;">
                            <article class="box-article">
                                <div class="article-text">
                                <h1>LIFE 2015 </h1>
                                    <p>Education for Leadership</p>
                                </div>
                                
                                <a href="http://www.tgelf.org/life2015/" target="_blank" title="Read more" class="button white">Learn more</a>       
                            </article>
                        </div>
                        <div class="box quarter-box solid-bg1 grid-slide1" style="background-image: url({{asset('uploads/event2.png')}});background-color: #c6c6c6;border-top-right-radius: 70px;">
                            <article class="box-article">
                                <div class="article-text">
                                <h1>LIFE 2014 </h1>
                                    <p>LEADING CHANGE FROM WITHIN</p>
                                    
                                </div>
                                
                                <a href="http://www.tgelf.org/life2014/" target="_blank" title="Read more" class="button white">Learn more</a>        
                            </article>
                        </div>
                        <div class="box quarter-box  grid-slide"style="background-image: url({{asset('uploads/event3.png')}});    background-color: #808080;border-top-left-radius: 70px;">
                            <article class="box-article">
                                <div class="article-text">
                                     <h1>LIFE 2013 </h1>
                                    <p>leadership initiative for excelence</p>
                                    
                                </div>
                                <a href="http://www.lifetalks.in " title="Read more" class="button white">Learn more</a>        
                            </article>
                        </div>
                        <div class="box quarter-box dark-bg grid-slide" style="background-image: url({{asset('uploads/event4.png')}});background-color: #c6c6c6;">
                            <article class="box-article">
                            <div class="article-text">
                                 <h1>LIFE 2014 </h1>
                            </div>
                                <a href="http://www.lifetalks.in "  target="_blank" title="Read more" class="button white">Learn more</a>        
                            </article>
                        </div>

        
                    </div>
                <div class="grid-nav light-bg"><a href="#" title="" class="active"></a><a href="#" title=""></a><a href="#" title=""></a><a href="#" title=""></a></div></div><!-- .grid -->
               
            </div>
            </div>
 
@stop
