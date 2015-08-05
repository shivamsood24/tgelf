"use strict";

if (!String.prototype.trim) {
  String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, '');
  };
}
if ( !Array.prototype.forEach ) {
	Array.prototype.forEach = function(fn, scope) {
		for(var i = 0, len = this.length; i < len; ++i) {
			if (i in this) {
				fn.call(scope, this[i], i, this);
			}
		}
	};
}
if (!Array.prototype.indexOf)
{
  Array.prototype.indexOf = function(elt /*, from*/)
  {
    var len = this.length >>> 0;

    var from = Number(arguments[1]) || 0;
    from = (from < 0)
         ? Math.ceil(from)
         : Math.floor(from);
    if (from < 0)
      from += len;

    for (; from < len; from++)
    {
      if (from in this &&
          this[from] === elt)
        return from;
    }
    return -1;
  };
}

if(!Number.prototype.Between){
	Number.prototype.Between = function(range){
		return this >= range[0] && this <= range[1];
	}
}

var c = {
		isActive: true,
		log: function(t){
			if(!this.isActive) return;
			
			window.console ? console.log(t) : alert("Log: " + t);
		},
		info: function(t){
			if(!this.isActive) return;
			
			window.console ? console.info(t) : alert("Info: " + t);
		},
		error: function(t){
			if(!this.isActive) return;
						
			window.console ? console.error(t) : alert("Error: " + t);
		}
	};
	
var App = window.App ||  {
		Conf: {
			transitions: {
				e: 'onwebkittransitionend' in window ? 'webkitTransitionEnd' : 'transitionend',
				s: (function(){
				    var thisBody = document.body || document.documentElement, thisStyle = thisBody.style;

				    return thisStyle.transition !== undefined || thisStyle.WebkitTransition !== undefined || thisStyle.MozTransition !== undefined || thisStyle.MsTransition !== undefined || thisStyle.OTransition !== undefined;
				}())
			},
			isTouch: !!('ontouchstart' in window),
// 			clickEvent: !!('ontouchstart' in window) ? 'touchstart' : 'click',
			clickEvent: 'click',
			historyIsEnabled: !! (window.history && history.replaceState),
			layouts: {
				'm': [0, 767],
				't': [768, 1259],
				'd': [1260, 99999]
			}
		},
		Announcement: {
			init: function(){
				c.log('App.Announcement.init');

				var elm = App.Conf.body.find('#announcement'),
					isViewed = App.Cookie.get('App.Announcement');

				if(elm.length == 0 || isViewed != false)
					return;
					
				App.Cookie.set('App.Announcement', "true", 1);					

				this.elm = elm;
				
				this.content = App.Conf.body.find('#static-content');
				
				App.Conf.body.addClass('with-announcement');

				//Register for load event
				App.WindowLoad.add(function(){

					if(App.Resize.current.l != 'm') {
						
						App.Conf.body.addClass('will-toggle-announcement');						

						setTimeout(function(){
							App.Announcement.toggle();
						}, 1000);							

					} else {
						App.Announcement.attach();
					}
				});
				
			},
			contentHeight: function(){
				return this.elm.find('.content-wrapper').outerHeight(true);	
			},
			attach: function(){

				App.Resize.addPerLayout('Announcement', function(s){
					App.Announcement.layout(s);
				});
				
				this.layout(App.Resize.current);
			},
			layout: function(s){
				
				if(s.l != 'm'){
					
					App.Resize.add('Announcement:resize', function(s){
						App.Announcement.resize(s);
					});

				} else {
					App.Resize.remove('immediate', 'Announcement:resize');
					
					this.elm.height('');	


					App.Conf.contentElm
					.css({
						'top': '',
						'height': ''
					});
					
					if(App.Filter.filterElm && App.Conf.body.hasClass('fixed-filter')){
						App.Filter.filterElm.css('margin-top', '');
					}
				}
			},
			resize: function(s){
				
				this.elm.height('');
				
				var h = this.contentHeight();
				
				this.elm.height(h);
				
				App.Conf.contentElm
				.css({
					'top': h,
					'height': (s.h - h)					
				});
				
				if(App.Filter.filterElm && App.Conf.body.hasClass('fixed-filter')){
					App.Filter.filterElm
					.css({
						'margin-top': h
					});
				}
				
			},
			toggle: function(){

				if(App.Conf.transitions.s) {

					this.elm
					.on(App.Conf.transitions.e, function(e){
						App.Announcement.finishToggle(e);
					});
				}

				this.resize(App.Resize.current);				
				
				if(!App.Conf.transitions.s) {
					this.finishToggle();
				}
			},
			finishToggle: function(){

				this.elm
				.off(App.Conf.transitions.e);

				App.Conf.body.removeClass('will-toggle-announcement');

				this.attach();				
			}
		},
		RMap: {
			init: function(){

				c.log('App.RMap.init');
				
				var elm = App.Conf.body.find('#regions-map');
				
				if(elm.length == 0)
					return;

				if(typeof L === "undefined"){
					c.error('RMap: Map element found, but mapbox library is missing!');
					return;
				}

				this.elm = elm;
				
				var dataSourceUrl = elm.data('regionsDataUrl');
				
				if(!dataSourceUrl || dataSourceUrl.length == 0){
					c.error('RMap:DataSource missing!');
					return;					
				}
				
				this.overlay = App.Conf.body.find('#regions-map-overlay');
				this.detailsWrapper = this.overlay.find('.region-details');
				this.detailsAreVisible = false;
				
				this.detailsHeader = this.overlay.find('.header');				
				this.detailsHeaderDefaultContent = this.detailsHeader.html();
				
				this.dataSourceUrl = dataSourceUrl;
				this.activeFeature = false;
				
				App.Resize.add('RMap', function(s){
					if(App.RMap.detailsAreVisible)
						App.RMap.hideDetails();
				});
				
				var filter = App.Conf.body.find('#regions-map-filter');

				if(filter.length  > 0){

					this.filter = filter;

					this.filter
					.change(function(){
						
						var m = $(this).val();
						
						App.RMap.mode = m;
						App.RMap.hideDetails();
						App.RMap.update();
						App.RMap.detailsWrapper[(m != 'all' ? 'add' : 'remove') + 'Class']('k50-mode');						
					});
					
					this.mode = this.filter.val();
					
				} else {
					this.mode = 'all';
				}
				
				//Close button
				this.overlay
				.find('a.close')
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();
					App.RMap.hideDetails();					
				});				
				
				this.buildMap();				
				
				this.getData(function(data){
					App.RMap.regions = data;
					App.RMap.update();
				});
			},
			getData: function(callback){

				if(!callback) {
					c.log('RMap:getData without callback!');
					return;					
				}
				
				$.ajax({
					url: this.dataSourceUrl,
					type: 'get',
					dataType: 'json',
					error: function(xhr, ajaxOptions, thrownError) {
						c.log('RMap:Erroe white pulling data.');						
						c.log(thrownError);
					},
					beforeSend: function() {
						c.log('RMap:Begin data pulling.');
					},
					success: function(data, textStatus, request) {

						c.log('RMap:Finish data pulling.');

						if (callback && typeof callback === 'function') {
							callback.call(undefined, data);
						}
					}
				});
			},
			buildMap: function(){
				
				this.map = L.mapbox.map('regions-map', 'kairos.jwdsra4i', {
																				zoomControl: false,
																				center: [40, -3.7],
																				zoom: 3,
// 																				minZoom: 2,
																				scrollWheelZoom: false,
																				worldCopyJump: true,
																				attributionControl: false,
																				inertia: false
																			});
				this.map
				.on('drag click', function(){
					App.RMap.hideDetails();
				});
				
				//Zoom control
				this.overlay
				.find('.zoom-control a')
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();
					
					var control = $(this),
						isOut = control.hasClass('out');
						
					App.RMap.map['zoom' + (isOut ? 'Out' : 'In')]();
				});
			},
			update: function(){
				
				if(this.geoJSON){
					this.map.removeLayer(this.geoJSON);
				}

				this.geoJSON = L.geoJson(this.regions, {
					style: this.styleFeature,
					onEachFeature: this.onEachFeature,
					filter: function(f){
						return App.RMap.mode == 'all' ? true : (f.properties.info['k50'].length > 0);
					}
				});
				
				this.geoJSON.addTo(this.map);

				this.elm.removeClass('loading');				

/*
				this.map
				.once('moveend', function(){
					App.RMap.elm.removeClass('loading');
				})
  				.fitBounds(this.geoJSON.getBounds(), {
	  				'paddingTopLeft': L.point(0, (App.Resize.current.l == 'm' ? 0 : -250))
  				});
*/
			},
			onEachFeature: function(feature, layer) {
				
				layer
				.on({
					mouseover: App.RMap.highlightFeature,
					mouseout: App.RMap.resetHighlight,
					click: App.RMap.toggleDetails
				})
				.bindLabel(feature.properties.info.name);
			},
			styleFeature: function(feature){
				return {
					weight: 1,
					color: '#d4d4d4',
					fillOpacity: 0.8,
					fillColor: '#da291c'
				};				
			},
			highlightFeature: function(e){

				var layer = e.target;
				
				if(App.RMap.activeFeature){
					App.RMap.geoJSON.resetStyle(App.RMap.activeFeature);
				}
	
				App.RMap.activeFeature = layer; 
	
				layer.setStyle({
					fillOpacity: 1
				});
	
				if (!L.Browser.ie && !L.Browser.opera) {
					layer.bringToFront();
				}
				
				App.RMap.detailsHeader.html('Click region for more details.');
				
				App.RMap.updateDetails(layer.feature.properties.info);
			},
			resetHighlight: function(e) {

				App.RMap.detailsHeader.html(App.RMap.detailsHeaderDefaultContent);
								
				if(!App.RMap.detailsAreVisible){
					App.RMap.geoJSON.resetStyle(e.target);
				}
			},
			updateDetails: function(data){
				
				var title = $('<div class="region-title">' + (this.mode == 'all' ? 'Info about the region' : 'K50 companies from') + '<span>' + data.name + '</span></div>'),
					info = $('<ul class="region-info"></ul>'),
					founded = $('<li class="founded"><span>Founded</span><strong>' + data.founded + '</strong></li>'),
					regionLink = $('<div class="center-content"><a href="' + data.url + '" title="Go to region" class="button black">Go to region</a></div>');

				this.detailsWrapper
				.html('')
				.append(title);

				if(this.mode == 'all'){

					this.detailsWrapper.append(info);
					
					info.append(founded);
					
					if(data.exec && (data.exec.title || data.exec.photo || data.exec.name)){
						info.append('<li class="president">' + (data.exec.photo ? '<img src="' + data.exec.photo + '" alt="" width="90" height="90" />' : '') + '<span>' + (data.exec.title || "") + '</span><strong>' + (data.exec.name || "") + '</strong></li>');
					}
					
					if(data.fellows > 0){
						info.append('<li class="fellows"><span>Fellows</span><strong>' + data.fellows + '</strong></li>');
					}
				}
				
				if(data['k50'].length > 0){

					if(this.mode == 'all')
						info.append('<li class="companies"><span>K50 Companies</span><strong>' + data['k50'].length + '</strong></li>');
					
					var companiesSlider = $('<div class="companies-slider"></div>'),
						ul = $('<ul></ul>'),
						prevArrow = $('<a href="" class="arrow prev-arrow"></a>'),
						nextArrow = $('<a href="" class="arrow next-arrow"></a>');

					this.detailsWrapper.append(companiesSlider.append(ul, prevArrow, nextArrow));
						
					data['k50'].forEach(function(company){
						
						var li = $('<li class="slider-item"></li>'),
							link = $('<a href="' + company.url + '" title="' + company.name + '"></a>'),
							img = $('<img src="' + company.logo + '" alt="' + company.name + '" width="70" height="70" />');
							
						img.appendTo(link);
						link.appendTo(li);
						li.appendTo(ul);
					});
					
					var w = ul[0].clientWidth; //perform "read" on elm to trigger layout update http://gent.ilcore.com/2011/03/how-not-to-trigger-layout-in-webkit.html
					
					prevArrow
					.add(nextArrow)
					.css('display', (ul.prop('scrollWidth') > ul.width() ? '' : 'none'))
					.on(App.Conf.clickEvent, function(e){

						e.preventDefault();

						var arrow = $(this),
							scrollNext = arrow.hasClass('next-arrow'),
							step = ul.width(),
							newLeft = ul.scrollLeft() + (!scrollNext ? -(step) : step);

						nextArrow.css('opacity', ((newLeft >= (ul.prop('scrollWidth') - step)) ? .25 : ''));
						prevArrow.css('opacity', ((newLeft <= 0) ? .25 : ''));

						ul
						.stop()
						.animate({
						    scrollLeft: newLeft
						});
					});

					prevArrow.css('opacity', .25);
					
					companiesSlider
					.on('swipeleft', function(e) {
						nextArrow.trigger(App.Conf.clickEvent);
					})
					.on('swiperight', function(e) {
						prevArrow.trigger(App.Conf.clickEvent);						
					})
					.on('movestart', function(e) {
						if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
							e.preventDefault();
						}
					});
				}

					
				this.detailsWrapper.append(regionLink);

			},
			toggleDetails: function(e){

				if(App.Conf.isTouch && !App.RMap.detailsAreVisible){
					App.RMap.updateDetails(e.target.feature.properties.info);
				}

				App.RMap.detailsWrapper.css('height', App.RMap.detailsAreVisible ? 0 : (App.Resize.current.l != 'm' ? App.RMap.detailsWrapper.prop('scrollHeight') : (App.Resize.current.h - (App.Header.height() + parseInt(App.RMap.overlay.css('paddingTop'), 10) + parseInt(App.RMap.overlay.css('paddingBottom'), 10)))));
 				App.Conf.body.toggleClass('with-regions-map-overlay');				
				App.RMap.detailsAreVisible = !App.RMap.detailsAreVisible;
			},
			hideDetails: function(){
				
 				App.Conf.body.removeClass('with-regions-map-overlay');
				App.RMap.detailsAreVisible = false;				

				App.RMap.detailsWrapper.css('height', '');

				if(App.RMap.activeFeature){
					App.RMap.geoJSON.resetStyle(App.RMap.activeFeature);
				}
			
			}
		},
		Header: {
			init: function(){

				c.log('App.Header.init');

				var elm = App.Conf.body.find('#header'),
					trigger = App.Conf.body.find('.nav-solid-bg-trigger');

				if(elm.length == 0)
					return;

				if(trigger.length == 0)
					trigger = App.Conf.body.find('#static-content');

				this.elm = elm;
				this.trigger = trigger;

				App.Scroll.add(function(top, scrollingDown){
					App.Header.scroll(top);
				});

				this.isSolidBGActive = false;
			},
			height: function(){
				return this.elm ? this.elm.outerHeight() : 0;
			},
			scroll: function(top){
				
				var offset = this.trigger.offset().top - this.elm.height();
				
				if(top >= offset && !this.isSolidBGActive){
					this.toggleBg(true);
				} else if(top <= offset && this.isSolidBGActive && offset > 0) {
					this.toggleBg();
				}
			},
			toggleBg: function(solid){
				
				solid = solid || false;
				
				this.elm[(solid ? 'add' : 'remove') + 'Class']('solid-bg');
				this.isSolidBGActive = solid;
			}
		},
		QuotesSlider: {
			init: function(){

				var elms = App.Conf.body.find('.quotes-slider');

				if(elms.length == 0)
					return;

				this.elms = elms;

				this.build();
			},
			build: function(){

				var QSlider = this,
					autoPlay = false;

				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide');

					if(slides.length < 2)
						return true; //continue
						
					//if at least one slider has enough slides
					QSlider.autoPlay = true;

					var pages = $('<div class="slider-nav"></div>');

					pages.appendTo(slider);

					slides.each(function(index){

						var page = $('<a href=""></a>');

						page
						.appendTo(pages)
						.on(App.Conf.clickEvent, function(e){
							e.preventDefault();

							QSlider.slide(slider, index);
							
							slider.addClass('dirty');							
						});

						if(index == 0){
							page.addClass('active');
						}
					});

					//arrows
					var nextArrow = $('<a href="#" class="slider-arrow next-arrow"></a>');

					nextArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.min((slides.length - 1), (pages.find('a.active').index() + 1));
						QSlider.slide(slider, to);
						
						slider.addClass('dirty');						
					});

					var prevArrow = $('<a href="#" class="slider-arrow prev-arrow"></a>');

					prevArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.max(0, (pages.find('a.active').index() - 1));
						QSlider.slide(slider, to);
						
						slider.addClass('dirty');
					})
					.css('display', 'none');

					slider
					.on('swipeleft', function(e) {

						var nextPage = pages.find('a.active').next();

						if(nextPage.length > 0)
							QSlider.slide(slider, nextPage.index());
							
						slider.addClass('dirty');							

					})
					.on('swiperight', function(e) {

						var prevPage = pages.find('a.active').prev();

						if(prevPage.length  > 0)
							QSlider.slide(slider, prevPage.index());
							
						slider.addClass('dirty');
													
					})
					.on('movestart', function(e) {
						if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
							e.preventDefault();
						}
					});

				});
				
				if(this.autoPlay) {
					
					App.WindowLoad.add(function(){
						
						QSlider.timer = setTimeout(function(){
							QSlider.rotate();
						}, 3000);
					});
				}
			},
			rotate: function(){
				
				var QSlider = this,
					keepAutoPlaying = false;
				
				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide'),
						pages = slider.find('.slider-nav');

					if(slides.length < 2 || slider.hasClass('dirty'))
						return true; //continue
						
					keepAutoPlaying = true;

					var to = pages.find('a.active').next().length > 0 ? pages.find('a.active').next().index() : 0;
					
					App.QuotesSlider.slide(slider, to);
				});
				
				if(keepAutoPlaying) {
					this.timer = setTimeout(function(){
						QSlider.rotate();
					}, 3000);
				}
			},
			slide: function(slider, to){

				var ul = slider.find('ul'),
					nav = slider.find('.slider-nav'),
					nextArrow = slider.find('a.slider-arrow.next-arrow'),
					prevArrow = slider.find('a.slider-arrow.prev-arrow'),
					slides = ul.find('.slide');

				if(App.Conf.transitions.s) {
					ul.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					ul.css('left', -(to * 100) + '%');
				}

				nav.find('a.active').removeClass('active');
				nav.find('a:eq(' + to + ')').addClass('active');

				slides.filter('.active').removeClass('active');
				slides.filter(':eq(' + to + ')').addClass('active');

				nextArrow.css('display', ((slides.length - 1) > to ? '' : 'none'));
				prevArrow.css('display', (to <= 0 ? 'none' : ''));
			}
		},

		ImagesSlider: {
			init: function(){

				var elms = App.Conf.body.find('.images-slider');

				if(elms.length == 0)
					return;

				this.elms = elms;

				this.build();
			},
			build: function(){

				var ISlider = this;

				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide');

					if(slides.length < 2)
						return true; //continue

					var pages = $('<div class="slider-nav"></div>');

					pages.appendTo(slider);

					slides.each(function(index){

						var slide = $(this),
							page = $('<a href=""></a>'),
							img = slide.find('.slide-img');

						page
						.appendTo(pages)
						.on(App.Conf.clickEvent, function(e){
							e.preventDefault();

							ISlider.slide(slider, index);
						});

						if(index == 0){
							page.addClass('active');
							slide.addClass('active');
						}

						slide.css('background-image', 'url(' + img.attr('src') + ')');
					});

					//arrows
					var nextArrow = $('<a href="#" class="slider-arrow next-arrow"></a>');

					nextArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.min((slides.length - 1), (pages.find('a.active').index() + 1));
						App.ImagesSlider.slide(slider, to);
					});

					var prevArrow = $('<a href="#" class="slider-arrow prev-arrow"></a>');

					prevArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.max(0, (pages.find('a.active').index() - 1));
						App.ImagesSlider.slide(slider, to);
					})
					.css('display', 'none');

					slider
					.on('swipeleft', function(e) {

						var nextPage = pages.find('a.active').next();

						if(nextPage.length > 0)
							ISlider.slide(slider, nextPage.index());

					})
					.on('swiperight', function(e) {

						var prevPage = pages.find('a.active').prev();

						if(prevPage.length  > 0)
							ISlider.slide(slider, prevPage.index());
					})
					.on('movestart', function(e) {
						if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
							e.preventDefault();
						}
					});


				});
			},
			slide: function(slider, to){

				var ul = slider.find('ul'),
					nav = slider.find('.slider-nav'),
					nextArrow = slider.find('a.slider-arrow.next-arrow'),
					prevArrow = slider.find('a.slider-arrow.prev-arrow'),
					slides = ul.find('.slide');

				if(App.Conf.transitions.s) {
					ul.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					ul.css('left', -(to * 100) + '%');
				}

				nav.find('a.active').removeClass('active');
				nav.find('a:eq(' + to + ')').addClass('active');

				slides.filter('.active').removeClass('active');
				slides.filter(':eq(' + to + ')').addClass('active');

				nextArrow.css('display', ((slides.length - 1) > to ? '' : 'none'));
				prevArrow.css('display', (to <= 0 ? 'none' : ''));
			}
		},
		CaseStudiesSlider: {
			init: function(){

				var elms = App.Conf.body.find('.case-studies-slider');

				if(elms.length == 0)
					return;

				this.elms = elms;

				this.build();
			},
			build: function(){

				var CSSlider = this,
					autoPlay = false;

				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide');

					if(slides.length < 2)
						return true; //continue
						
					autoPlay = true;

					var pages = $('<div class="slider-nav"></div>');

					pages.appendTo(slider);

					slides.each(function(index){

						var slide = $(this),
							page = $('<a href=""></a>'),
							img = slide.find('.slide-img');

						page
						.appendTo(pages)
						.on(App.Conf.clickEvent, function(e){
							e.preventDefault();

							CSSlider.slide(slider, index);
							
							slider.addClass('dirty');
						});

						if(index == 0){
							page.addClass('active');
							slide.addClass('active');
						}

						if(img.length > 0)
							slide.css('background-image', 'url(' + img.attr('src') + ')');
					});


					slider
					.on('swipeleft', function(e) {

						var nextPage = pages.find('a.active').next();

						if(nextPage.length > 0)
							CSSlider.slide(slider, nextPage.index());

							slider.addClass('dirty');
					})
					.on('swiperight', function(e) {

						var prevPage = pages.find('a.active').prev();

						if(prevPage.length  > 0)
							CSSlider.slide(slider, prevPage.index());
							
							slider.addClass('dirty');							
					})
					.on('movestart', function(e) {
						if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
							e.preventDefault();
						}
					});
				});
				
				
				if(autoPlay) {
					App.WindowLoad.add(function(){
						CSSlider.timer = setTimeout(function(){
							CSSlider.rotate();
						}, 3000);
					});
				}
			},
			rotate: function(){
				
				var CSSlider = this,
					keepAutoPlaying = false;
				
				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide'),
						pages = slider.find('.slider-nav');

					if(slides.length < 2 || slider.hasClass('dirty'))
						return true; //continue
						
					keepAutoPlaying = true;

					var to = pages.find('a.active').next().length > 0 ? pages.find('a.active').next().index() : 0;
					
					CSSlider.slide(slider, to);
				});
				
				if(keepAutoPlaying) {
					this.timer = setTimeout(function(){
						CSSlider.rotate();
					}, 3000);
				}
			},
			slide: function(slider, to){

				var ul = slider.find('ul'),
					nav = slider.find('.slider-nav'),
					slides = ul.find('.slide');

				if(App.Conf.transitions.s) {
					ul.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					ul.css('left', -(to * 100) + '%');
				}

				nav.find('a.active').removeClass('active');
				nav.find('a:eq(' + to + ')').addClass('active');

				slides.filter('.active').removeClass('active');
				slides.filter(':eq(' + to + ')').addClass('active');

			}
		},
		TextSlider: {
			init: function(){

				var elms = $('.text-slider');
				
				if(elms.length == 0)
					return;
					
				this.elms = elms;
				
				this.elms.each(function(){

					var elm = $(this),
						scrollHeight = elm.prop('scrollHeight'),
						arrows = $('<div class="text-slider-arrows"></div>'),
						upArrow = $('<a href="#" title="Scroll up" class="up"></a>'),
						downArrow = $('<a href="#" title="Scroll down" class="down"></a>');


					upArrow.appendTo(arrows);
					downArrow.appendTo(arrows);
											
					arrows
					.css('display', (scrollHeight > elm.height() ? '' : 'none'))
					.insertAfter(elm);					
					
					upArrow
					.add(downArrow)
					.on(App.Conf.clickEvent, function(e){

						e.preventDefault();

						var arrow = $(this),
							scrollDown = arrow.hasClass('up'),
							step = elm.height(),
							newTop = elm.scrollTop() + (scrollDown ? -(step) : step);

						downArrow.css('opacity', ((newTop >= (elm.prop('scrollHeight') - step)) ? .25 : ''));
						upArrow.css('opacity', ((newTop <= 0) ? .25 : ''));

						elm
						.stop()
						.animate({
						    scrollTop: newTop
						});
					});

					upArrow.css('opacity', .25);
				});
				
				App.Resize.add('TextSlider:resize', function(s){
					App.TextSlider.resize();
				});
			},
			resize: function(){

				this.elms.each(function(){

					var elm = $(this),
						scrollHeight = elm.prop('scrollHeight'),
						arrows = elm.next('.text-slider-arrows');


					arrows.css('display', (scrollHeight > elm.height() ? '' : 'none'));

				});
			}
		},
		FoundersSection: {
			init: function(){

				var elms = $('.founders.full-width');

				elms.each(function(){

					var elm = $(this),
						img = elm.find('.img');

					if(img.length > 0){
						elm.css('background-image', 'url(' + img.attr('src') + ')');
					}
				});
			}
		},
		InlineMap: {
			init: function(){

				var elms = $('.inline-map');

				elms.each(function(){

					var elm = $(this),
						img = elm.find('.img');

					if(img.length > 0){
						elm.css('background-image', 'url(' + img.attr('src') + ')');
					}
				});
			}
		},
		VideoSlider: {
			init: function(){

				var elms = App.Conf.body.find('.video-slider');

				if(elms.length == 0)
					return;

				this.elms = elms;

				this.build();
			},
			build: function(){

				var VSlider = this;

				this.elms.each(function(){

					var slider = $(this),
						slides = slider.find('.slide');

					var pages = $('<div class="slider-nav"></div>');

					slides.each(function(index){

						var slide = $(this),
							page = $('<a href=""></a>');

						if(slides.length > 1){

							page
							.appendTo(pages)
							.on(App.Conf.clickEvent, function(e){
								e.preventDefault();

								VSlider.slide(slider, index);
							});

							if(index == 0){
								pages.appendTo(slider);								
								page.addClass('active');
							}
						}
						
						var video = slide.find('.video');

						video
						.on(App.Conf.clickEvent, function(e){
							
							if(App.Conf.isTouch)
								return;

							e.preventDefault();

							var iframe = video.find('iframe');

							App.PopUp.toggle(iframe.clone());

						});
					});
					
					if(slides.length < 2)
						return true; //continue
						
					//arrows
					var nextArrow = $('<a href="#" class="slider-arrow next-arrow"></a>');

					nextArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.min((slides.length - 1), (pages.find('a.active').index() + 1));
						App.VideoSlider.slide(slider, to);
					});

					var prevArrow = $('<a href="#" class="slider-arrow prev-arrow"></a>');

					prevArrow
					.appendTo(slider)
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var to = Math.max(0, (pages.find('a.active').index() - 1));
						App.VideoSlider.slide(slider, to);
					})
					.css('display', 'none');

					slider
					.on('swipeleft', function(e) {

						var nextPage = pages.find('a.active').next();

						if(nextPage.length > 0)
							VSlider.slide(slider, nextPage.index());

					})
					.on('swiperight', function(e) {

						var prevPage = pages.find('a.active').prev();

						if(prevPage.length  > 0)
							VSlider.slide(slider, prevPage.index());
					})
					.on('movestart', function(e) {
						if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
							e.preventDefault();
						}
					});


				});
			},
			slide: function(slider, to){

				var ul = slider.find('ul'),
					nav = slider.find('.slider-nav'),
					nextArrow = slider.find('a.slider-arrow.next-arrow'),
					prevArrow = slider.find('a.slider-arrow.prev-arrow'),
					slides = ul.find('.slide');

				if(App.Conf.transitions.s) {
					ul.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					ul.css('left', -(to * 100) + '%');
				}

				nav.find('a.active').removeClass('active');
				nav.find('a:eq(' + to + ')').addClass('active');

				slides.filter('.active').removeClass('active');
				slides.filter(':eq(' + to + ')').addClass('active');

				nextArrow.css('display', ((slides.length - 1) > to ? '' : 'none'));
				prevArrow.css('display', (to <= 0 ? 'none' : ''));
			}
		},
		Nav: {
			init: function(){
				c.log('App.Nav.init');

				var elm = App.Conf.body.find('#main-nav');

				if(elm.length == 0)
					return;

				this.elm = elm;

				this.elm.find('.close-nav').click(function(e){
					e.preventDefault();
					App.Nav.hide();
				});

				App.Conf.body.find('#nav-trigger').click(function(e){
					e.preventDefault();
					App.Nav.toggle();
				});

				if(App.Conf.transitions.s) {
					this.elm
					.on(App.Conf.transitions.e, function(e){
						App.Nav.finishToggle(e);
					});
				}
			},
			isActive: function(){
				return App.Conf.body.hasClass('with-nav');
			},
			toggle: function(){
				c.log('App.Nav.toggle');

				App.Conf.body.addClass('will-toggle-nav').toggleClass('with-nav');

				if(!App.Conf.transitions.s) {
					App.Nav.finishToggle();
				}
			},
			hide: function(){
				c.log('App.Nav.hide');

				App.Conf.body.removeClass('with-nav');

				if(!App.Conf.transitions.s) {
					this.finishToggle();
				}
			},
			finishToggle: function(e){

				c.log('App.Nav.finishToggle');

				if(App.Conf.body.hasClass('with-nav')){
					
					$(document).on('keyup.AppNavKeyUp', function(e) {
						if(e.which == 27){
							App.Nav.toggle();
						}
					});
					
					return;
				}

				if(e){
					e = e.originalEvent || e;

					var property = e.propertyName || false;

					if(property && property == 'opacity'){
						App.Conf.body.removeClass('will-toggle-nav');
					}
				} else {
					App.Conf.body.removeClass('will-toggle-nav');
				}
				
				$(document).off('keyup.AppNavKeyUp');
			}
		},
		Search: {
			init: function(){
				c.log('App.Search.init');

				var elm = App.Conf.body.find('#main-search');

				if(elm.length == 0)
					return;

				this.elm = elm;

				this.elm.find('.close-search').click(function(e){
					e.preventDefault();
					App.Search.hide();
				});

				App.Conf.body.find('#main-search-trigger').click(function(e){
					e.preventDefault();
					App.Search.toggle();
				});

				if(App.Conf.transitions.s) {
					this.elm
					.on(App.Conf.transitions.e, function(e){
						App.Search.finishToggle(e);
					});
				}
				
				$(document).on('keydown.AppSearchTrigger', function(e) {
					
					if(e.which == 70 && (e.ctrlKey || e.metaKey)){
						e.preventDefault();
						App.Search.toggle();
					}
				});

				this.buildForm();
			},
			buildForm: function(){

				this.form = this.elm.find('.search-form');
				this.formInput = this.form.find('.search-input');
				this.formInputPlaceholder = this.form.find('.search-input-placeholder');
				this.formInputPlaceholderDefaultContent = this.formInputPlaceholder.html();

				this.formSubmit = this.form.find('.search-submit');

				var resultsWrapper = $('<div class="list-wrapper"></div>');
				resultsWrapper.insertAfter(this.form);

				this.resultsList = $('<ul></ul>');
				this.resultsList.appendTo(resultsWrapper);

				this.form.submit(function(e){
					e.preventDefault();
				});

				this.searchResults = {};
				this.lastQ = '';

				var Search = this;
				
				this.form
				.on(App.Conf.clickEvent + '.AppSearchFormClick', function(e){ //Will prevent .AppSearchCloseClick trigger
					e.stopPropagation();
				})
				.attr('autocomplete', 'off');

				this.formInput
				.on('keydown', function(e){

					var q = $(this).val();

					if(Search.lastQ != q)
						Search.clearResults();

					Search.formInputPlaceholder.addClass('changing');
				})
				.on('keyup', function(e){

					var q = $(this).val();

					if(Search.lastQ != q)
						Search.clearResults();

					if(q.length == 0) {
						Search.formInputPlaceholder.html(Search.formInputPlaceholderDefaultContent);
						Search.form.removeClass('dirty');
					} else {
						Search.form.addClass('dirty');
						Search.formInputPlaceholder.html(q);
					}

					Search.formInputPlaceholder.removeClass('changing');

					Search.lastQ = q;

					if(App.Search.searchResults[q]){
						App.Search.showResults(q);
					} else if(e.which == 13){
						App.Search.submit();
					}
				});
				
				var initVal = this.formInput.val().trim();
				
				if(initVal.length > 0){
					Search.form.addClass('dirty');
					Search.formInputPlaceholder.html(initVal);
				}

				this.formSubmit
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();
					Search.submit();
				});

				this.formInputPlaceholder
				.on(App.Conf.clickEvent, function(e){
					Search.elm.toggleClass('with-results');
				});

				this.working = false;
			},
			submit: function(){

				if(this.working == true)
					return;

				var q = this.lastQ;

				if(q.length > 2){
					
					this.formInputPlaceholder.html(q);
	
					if(this.searchResults[q]){
						this.showResults(q);
						return;
					}					

					this.working = true;

					var form = this.form,
						url = form.attr('action');

					$.ajax({
						url: url + '/' + q,
						type: 'get',
						dataType: 'json',
						error: function(xhr, ajaxOptions, thrownError) {
							c.log(thrownError);
							form.removeClass('loading');
							App.Search.working = false;
						},
						beforeSend: function() {
							App.Search.clearResults();
							form.addClass('loading');
						},
						success: function(data, textStatus, request) {

							form.removeClass('loading');
							App.Search.working = false;

			                if(data.status == 'ok') {
					
								App.Search.searchResults[q] = data.results ? data.results : [];
								App.Search.showResults(q);				
			                }
						}
					});
				}
			},
			clearResults: function(){
				this.resultsList.html('');
				this.elm.removeClass('with-results');
			},
			showResults: function(key){

				this.clearResults();

				var results = this.searchResults[key] || [];

				$('<span>' + results.length + ' Result' + (results.length != 1 ? 's':'') + '</span>').appendTo(this.formInputPlaceholder);

				results.forEach(function(result){
					$('<li><a href="' + result.link + '">' + result.title + '</a><span>' + result.type + '</span></li>').appendTo(App.Search.resultsList);
				});

				this.elm.addClass('with-results');
			},
			isActive: function(){
				return App.Conf.body.hasClass('with-search');
			},
			toggle: function(){
				c.log('App.Search.toggle');

				App.Conf.body.addClass('will-toggle-search').toggleClass('with-search');

				if(!App.Conf.transitions.s) {
					App.Search.finishToggle();
				}
			},
			hide: function(){
				c.log('App.Search.hide');

				App.Conf.body.removeClass('with-search');

				if(!App.Conf.transitions.s) {
					this.finishToggle();
				}
			},
			finishToggle: function(e){

				c.log('App.Search.finishToggle');

				if(App.Conf.body.hasClass('with-search')){

					if(App.Resize.current.l != 'm')
						this.formInput.focus();
						
					$(document).on('keyup.AppSearchEscKeyUp', function(e) {
						if(e.which == 27){
							App.Search.toggle();
						}
					});
					
					this.elm
					.on(App.Conf.clickEvent + '.AppSearchCloseClick', function(e){
						$(this).off(App.Conf.clickEvent + '.AppSearchCloseClick');
						App.Search.hide();							
					});

					return;
				}

				this.formInput.blur();
				
				if(e){
					e = e.originalEvent || e;

					var property = e.propertyName || false;

					if(property && property == 'opacity'){
						App.Conf.body.removeClass('will-toggle-search');
					}
				} else {
					App.Conf.body.removeClass('will-toggle-search');
				}
				
				$(document).off('keyup.AppSearchEscKeyUp');
			}
		},
		Grid: {
			init: function(){

				var elms = $('.grid'),
					sliders = elms.find('.grid-slider');

				if(elms.length == 0 || sliders.length == 0)
					return;

				this.elms = elms;
				this.build();

				App.Resize.addPerLayout('Grid', function(s){
					App.Grid.layout(s);
				});
			},
			build: function(){

				this.elms.each(function(){

					var grid = $(this),
						slider = grid.find('.grid-slider'),
						nav = $('<div class="grid-nav"></div>'),
						isAbsoluteNav = grid.hasClass('absolute-nav'),
						isDarkBlueSection = grid.closest('.section').hasClass('dark-blue-section'),
						slides = grid.find('.grid-slide');

					if(slides.length > 1){

						nav.appendTo(grid);

						slides.each(function(index){

							var slide = $(this),
								page = $('<a href="#" title=""></a>');

							if(index == 0){
								page.addClass('active');
								nav.addClass(((isAbsoluteNav && slide.hasClass('dark-bg')) || isDarkBlueSection ? 'dark-bg' : 'light-bg'));
							}

							page
							.on(App.Conf.clickEvent, function(e){
								e.preventDefault();

								App.Grid.slide(index, grid);
							})
							.appendTo(nav);
						});


						if(App.Conf.transitions.s) {
							slider
							.on(App.Conf.transitions.e, function(e){
								App.Grid.slideEnd(grid);
							});
						}
					}
				});
			},
			layout: function(s){

				if(s.l == 'm'){

					this.elms.each(function(){

						var grid = $(this),
							nav = grid.find('.grid-nav'),
							slides = grid.find('.grid-slide');

						if(slides.length > 1){

							grid
							.on('swipeleft.AppSwipe', function(e) {

								var nextIndex = nav.find('a.active').index() + 1;

								if(nextIndex < slides.length){
									App.Grid.slide(nextIndex, grid);
								}

							})
							.on('swiperight.AppSwipe', function(e) {

								var prevIndex = nav.find('a.active').index() - 1;

								if(prevIndex >= 0){
									App.Grid.slide(prevIndex, grid);
								}
							})
							.on('movestart.AppSwipe', function(e) {
								if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
									e.preventDefault();
								}
							});
						}
					});

				} else {
					this.elms.each(function(index){
						App.Grid.slide(0, $(this), true);
					})
					.off('swipeleft.AppSwipe swiperight.AppSwipe movestart.AppSwipe');
				}

			},
			slide: function(to, grid, notAnimated){

				var slider = grid.find('.grid-slider'),
					nav = grid.find('.grid-nav'),
					isAbsoluteNav = grid.hasClass('absolute-nav'),
					isDarkBlueSection = grid.closest('.section').hasClass('dark-blue-section'),
					isDarkBG = (isAbsoluteNav && slider.find('.grid-slide:eq(' + to + ')').hasClass('dark-bg')) || isDarkBlueSection;

				if(!notAnimated)
					grid.addClass('will-slide');

				if(App.Conf.transitions.s) {
					slider.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					slider.css('left', -(to * 100) + '%');
				}

				nav
				.removeClass((isDarkBG ? 'light' : 'dark') + '-bg')
				.addClass((isDarkBG ? 'dark' : 'light') + '-bg')
				.find('a.active').removeClass('active')
				.end()
				.find('a:eq(' + to + ')').addClass('active');
			},
			slideEnd: function(grid){
				grid.removeClass('will-slide');
			}
		},
		Box: {
			init: function(){

				var partnerBoxes = $('.partner-box');

				if(partnerBoxes.length > 0){

					App.Eq.add({ //Partner box title
						'elm': '.article-title',
						'row': '.partners-grid .grid-slide',
						'onMobile': false,
						'inner': true
					});

					App.Eq.add({ //Partner box details
						'elm': '.article-details',
						'row': '.partners-grid .grid-slide',
						'onMobile': false
					});
				}

				var honorBoxes = $('.honor-box');

				if(honorBoxes.length > 0){

					App.Eq.add({ //Partner box details
						'elm': '.honor-box',
						'row': '.grid-row',
						'onMobile': true,
						'lineHeight': true
					});
				}

				this.refresh();
				this.build();
			},
			refresh: function(){

				var elms = $('.box');

				if(elms.length == 0){
					
					App.Resize.remove('perLayout', 'Box');

				} else {

					this.elms = elms;

					App.Resize.addPerLayout('Box', function(s){
						App.Box.layout(s);
					});
				}
			},
			build: function(collection){
				
				collection = collection || this.elms;
				
				if(collection) {

					collection.each(function(index){
	
						var box = $(this),
							title = box.find('.article-title:not(.no-fix)'),
							img = box.find('.article-img');
	
						if(!box.hasClass('solid-bg') && img.length > 0){
							box.css({
								'background-image': 'url(' + img.attr('src') + ')'
							});
						}
	
						if(title.length > 0)
							title.data('fullTitle', title.text());
					});
				}
			},
			layout: function(s){

				if(s.l != 'm'){
					App.Resize.add('Box:fixTitle', function(s){
						App.Box.fixTitle();
					});

				} else {
					App.Resize.remove('immediate', 'Box:fixTitle');
					
					//Reset titles
					this.elms.each(function(index){
	
						var elm = $(this),
							title = elm.find('.article-title:not(.no-fix)');
							
						if(title.length > 0) {
							title.html(title.data('fullTitle'));
						}
					});
				}
			},
			fixTitle: function(collection){
//				c.log('App.Box.resize');

				collection = collection || this.elms;

				if(collection){
					//Fix titles
					collection.each(function(index){
	
						var elm = $(this),
							title = elm.find('.article-title:not(.no-fix)');
							
						if(title.length > 0) {

							var text = title.data('fullTitle').split(' ');							
							title.html(text.join(' '));
		
							var max = 100;
		
							while(title.prop('scrollHeight') > title.outerHeight() && max > 0){
								text.pop();
								title.html(text.join(' ') + ' &hellip;');
								max--;
							};
							
							if(max == 0){
								c.info('Box:fixTitle: reach maximum iterations for title: ' + text.join(' '));
							}
						}
					});
				}
			}
		},
		Columns: {
			init: function(){

				var elm = $('#columns');

				if(elm.length == 0)
					return;

				this.elm = elm;

				App.Resize.addPerLayout('Columns', function(s){
					App.Columns.layout(s);
				});

				this.wrapper = this.elm.find('.columns-wrapper');

				var columns = this.elm.find('.column');

				if(columns.length == 0)
					return;

				this.columns = columns;

				this.columns.each(function(){

					var column = $(this),
						slider = column.find('.column-slider'),
						arrows = $('<div class="column-arrows"></div>'),
						up = $('<a href="#" class="up" title="Scroll Up">Scroll Up</a>'),
						down = $('<a href="#" class="down" title="Scroll Down">Scroll Down</a>');


					arrows.insertAfter(slider);

					up
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();
						App.Columns.scrollColumn(column);
					})
					.appendTo(arrows);

					down
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();
						App.Columns.scrollColumn(column, true);
					})
					.appendTo(arrows);

					column.addClass('at-top');
				});

				this.activeColumnIndex = 0;

				App.Eq.add({ //Columns text
					'elm': '.column-text',
					'row': '#columns',
					'onMobile': true
				});

				var prevArrow = $('<a href="#" class="columns-arrow prev-arrow"></a>');

				prevArrow
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();

					App.Columns.slide();
				})
				.appendTo(this.elm);

				var nextArrow = $('<a href="#" class="columns-arrow next-arrow"></a>');

				nextArrow
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();

					App.Columns.slide(true);
				})
				.appendTo(this.elm);

				var nav = $('<div class="columns-nav"></div>');

				nav.appendTo(this.elm);

				this.nav = nav;

				this.columns.each(function(index){
					var page = $('<span></span>');

					if(index == 0)
						page.addClass('active');

					page.appendTo(nav);
				});

				this.lastSize = {};
			},
			slide: function(next){

				var to = this.activeColumnIndex + (next ? 1 : (-1));

				if(to >= this.columns.length || to < 0)
					return;

				this.nav
				.find('.active').removeClass('active')
				.end()
				.find('span:eq(' + to + ')').addClass('active');

				if(App.Conf.transitions.s) {
					this.wrapper.css('transform', 'translate3d(' + -(to * 100) + '%, 0, 0)');
				} else {
					this.wrapper.css('left', -(to * 100) + '%');
				}

				this.activeColumnIndex = to;

			},
			scrollColumn: function(column, scrollDown){

				var slider = column.find('.column-slider'),
					currentElm = slider.data('currentElm'),
					targetElm = false;

				if(!currentElm && scrollDown){
					targetElm = slider.children().first().next();
				} else if(currentElm) {
					targetElm = currentElm[scrollDown ? 'next' : 'prev']();
				}

				if(targetElm.length > 0) {

					slider
					.stop()
					.animate({
						'scrollTop': targetElm.position().top + slider.scrollTop()
					}, 350);

					slider.data('currentElm', targetElm);

					if(scrollDown && targetElm.next().length == 0){
						column.addClass('at-bottom');
					} else if(!scrollDown && targetElm.prev().length == 0) {
						column.addClass('at-top');
					} else {
						column.removeClass('at-top at-bottom');
					}
				}
			},
			layout: function(s){

				if(s.l != 'd') {

					App.Resize.remove('immediate', 'Columns');

					if(App.Conf.transitions.s) {
						this.wrapper.css('transform', 'translate3d(0, 0, 0)');
					} else {
						this.wrapper.css('left', '');
					}

					this.activeColumnIndex = 0;
					this.elm.css('height', '');

					this.columns.find('.column-slider').data('currentElm', '');

					this.nav
					.find('.active').removeClass('active')
					.end()
					.find('span:first').addClass('active');
					
					if(s.l == 'm') {
						
						this.elm
						.off('swipeleft.AppSwipe swiperight.AppSwipe movestart.AppSwipe')						
						.on('swipeleft.AppSwipe', function(e) {
		
								App.Columns.slide(true);
						})
						.on('swiperight.AppSwipe', function(e) {
		
								App.Columns.slide();
						})
						.on('movestart.AppSwipe', function(e) {
							if ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY)) {
								e.preventDefault();
							}
						});
						
					}					

				} else {
					App.Resize.add('Columns', function(s){
						App.Columns.resize(s);
					});
					
					this.elm
					.off('swipeleft.AppSwipe swiperight.AppSwipe movestart.AppSwipe');
				}
				

			},
			resize: function(s){
				this.lastSize = s;
				
				var h = (s.h - App.Header.height());
				
				if(App.Announcement.elm){
					h -= App.Announcement.contentHeight();
				}

				this.elm.css('height', h);
			}
		},
		ScrollToHash: function(callback){

            var target = $(App.GetPath('hash'));

            if(target.length > 0){
			    App.Scroll.to(target.offset().top, function(){
					if (callback && typeof callback === 'function') {
						callback.call();
					}
			    });
            } else {
				if (callback && typeof callback === 'function') {
					callback.call();
				}
            }
		},
		BigSlider: {
			init: function(){

				var elm = App.Conf.body.find('#big-slider');

				if(elm.length == 0){
					
					App.WindowLoad.add(function(){
	
						App.Conf.body.addClass('no-big-slider');
						App.ScrollToHash();
					});

					return;
				}

				this.elm = elm;

				App.Conf.body.addClass('with-big-slider');


				var slides = this.elm.find('.slider-list-item');

				this.slides = slides;

				this.toggling = false;
				this.activeSlide = 0;
				this.sliding = false;

				this.build();

				var BigSlider = this;

				//Toggle callback
				if(App.Conf.transitions.s) {

					App.Conf.body.find('#content')
					.on(App.Conf.transitions.e, function(e){

						e = e.originalEvent || e;
						
						if(e.propertyName.indexOf('transform') > -1) {
							BigSlider.didToggle();
						}						
					});
				}

				if(App.Conf.isTouch){

					this.elm
					.on('swipeup', function(e) {

						if(BigSlider.isActive() && !App.Nav.isActive())
							BigSlider.slide(true);
					})
					.on('swipedown', function(e) {

						if(BigSlider.isActive() && !App.Nav.isActive())
							BigSlider.slide();
					})
					.on('touchmove', function(e) {
						if (BigSlider.isActive() && !App.Nav.isActive() && ((e.distX > e.distY && e.distX < -e.distY) || (e.distX < e.distY && e.distX > -e.distY))) {
							e.preventDefault();
						}
					});

				} else {

					this.elm
					.bind('DOMMouseScroll.AppScroll mousewheel.AppScroll', function(e){

						e.preventDefault();

						if(!BigSlider.isActive() || BigSlider.toggling)
							return;

						var originalEvent = e.originalEvent || e,
							delta = originalEvent.wheelDelta ? originalEvent.wheelDelta : -(originalEvent.detail * 10);

						if(Math.abs(delta) < 15)
							return;

						BigSlider.slide(delta < 0);
					});
				}

				//Scroll down arrow
				this.elm
				.find('.scroll-down-arrow')
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();

					BigSlider.toggle();
				});

				App.Resize.add('BigSlider', function(s){
					BigSlider.resize(s);
				});

				//Scroll window to top
				App.WindowLoad.add(function(){

                    if(App.GetPath('hash')) {
	                    App.Conf.body.addClass('with-hidden-big-slider');

						App.ScrollToHash(function(){
							BigSlider.attach();
						});
                    } else {
					    App.Scroll.to(0, function(){
							BigSlider.attach();
					    });
                    }
				});
			},
			attach: function(){

				var BigSlider = this;

				App.Scroll.add(function(top, scrollingDown){

					if(!BigSlider.isActive() && top <= 0 && !BigSlider.toggling){
						BigSlider.toggle();
					}
				});
			},
			resize: function(s){

				var elmSize = {
					w: this.elm.width(),
					h: this.elm.height()
				},
				elmR = elmSize.h / elmSize.w;

				this.slides.each(function(){
					var slide = $(this),
						slideImageSize = slide.data('imageSize'),
						slideItem = slide.find('.slider-item'),
						slideContent = slideItem.find('.slider-item-content'),
						r = slideImageSize.w / slideImageSize.h,
						bgSize = {
							w: 0,
							h: 0
						},
						bgPosition = {
							t: 0,
							l: 0
						};

					if(elmR > 1){ //portrait
					
						bgSize.h = parseInt(elmSize.h);
						bgSize.w = parseInt(elmSize.h * r);
						
						if(bgSize.w < elmSize.w){ //if image is not wide enought resize it like in landscape
							bgSize.w = parseInt(elmSize.w);
							bgSize.h = parseInt(elmSize.w / r);
						}
						
					} else { //landscape
					
						bgSize.h = parseInt(elmSize.w / r);
						bgSize.w = parseInt(elmSize.w);						
						
						if(bgSize.h < elmSize.h){ //if image is not tall enought resize it like in portrait
							bgSize.w = parseInt(elmSize.h * r);
							bgSize.h = parseInt(elmSize.h);							
						}
					}
					
					bgPosition.l = bgSize.h > elmSize.h ? ((elmSize.h - bgSize.h) / 2) : 0;
					bgPosition.t = bgSize.w > elmSize.w ? ((elmSize.w - bgSize.w) / 2) : 0;

					slideItem.css('height', slideContent.height());

					slide.css({
						'background-size': bgSize.w + 'px ' + bgSize.h + 'px',
						'background-position': bgPosition.t + 'px ' + bgPosition.l + 'px'
					});


				});
			},
			isActive: function(){
				return !App.Conf.body.hasClass('with-hidden-big-slider') && !App.Nav.isActive();
			},
			build: function(){

				var total = this.slides.length,
					nav = $('<div class="slider-nav"></div>');

				nav.appendTo(this.elm);

				this.slides.each(function(index){

					var slide = $(this),
						bg = slide.find('.slider-item-img'),
						page = $('<a href="#"></a>');


					slide.data("imageSize", {
						w: bg.width(),
						h: bg.height()
					});

					if(index == 0)
						page.addClass('active');

					page
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();

						var forward = App.BigSlider.activeSlide < index;

						App.BigSlider.activeSlide = forward ? (index - 1) : (index + 1);
						App.BigSlider.slide(forward);
						App.BigSlider.nav.find('.active').removeClass('active');

						$(this).addClass('active');
					})
					.appendTo(nav);

					slide.css({
						'background-image': 'url(' + bg.attr('src') + ')',
						'z-index': total - index
					});
				});

				nav.css('margin-top', -(nav.height()/2));

				this.nav = nav;
			},
			toggle: function(){

				if(this.toggling)
					return;

				this.willToggle();

				App.Conf.body.removeClass('anchor_forward');

				App.Conf.body[(this.isActive() ? 'add' : 'remove') + 'Class']('with-hidden-big-slider');

				if(!App.Conf.transitions.s) {
					this.didToggle();
				}
			},
			willToggle: function(){
				this.toggling = true;

				App.Conf.body.addClass('will-toggle-big-slider');
				App.Header.toggleBg(this.isActive()); //force transparent header
			},
			didToggle: function(){
				this.toggling = false;
				App.Conf.body.removeClass('will-toggle-big-slider');
			},
			scroll: function(top, scrollingDown){

				if(!this.isActive() && !this.toggling && top <= 0 && !scrollingDown)
					App.BigSlider.toggle(); //Show
			},
			slide: function(forward){

				if(this.sliding || (!forward && this.activeSlide == 0))
					return;

				if(forward && this.activeSlide == (this.slides.length - 1)) { //Go out
					this.toggle();
					return;
				}

				var BigSlider = this;

				BigSlider.sliding = true;

				var nextSlideIndex = Math.min(Math.max(0, (forward ? BigSlider.activeSlide + 1 : BigSlider.activeSlide - 1)), (BigSlider.slides.length - 1)),
					lastAnimatedSlideIndex = forward ? BigSlider.activeSlide: BigSlider.activeSlide - 1;

				App.Scroll.to(0, function(){

					BigSlider.slides.each(function(index){

						var slide = $(this);

						if(index == lastAnimatedSlideIndex){

							slide
							.on(App.Conf.transitions.e, function(e){

								e.preventDefault();
								e.stopPropagation();

								$(this).off(App.Conf.transitions.e);

								App.BigSlider.sliding = false;
							});
						}

						slide[(index >= nextSlideIndex ? 'add' : 'remove') + 'Class']('active');
					});

					if(!App.Conf.transitions.s) {
						BigSlider.sliding = false;
					}

					BigSlider.nav.find('.active').removeClass('active');
					BigSlider.nav.find('a:eq(' + nextSlideIndex + ')').addClass('active');

					BigSlider.activeSlide = nextSlideIndex;
				});
			}
		},
		Filter: {
			init: function(){

				var elm = $('.content-search');

				if(elm.length == 0)
					return;

				this.elm = elm;

				var Filter = this;

				this.filterElm = App.Conf.body.find('#filter');
				
				this.grid = this.elm.find('.grid');				
				
				if(this.filterElm.length > 0) {

					this.form = this.filterElm.find('form');
					this.form
					.submit(function(e){
						e.preventDefault();
					});

					this.baseUrl = this.filterElm.data('base');
					if(this.baseUrl.slice(-1) == '/')
						this.baseUrl = this.baseUrl.slice(0, -1);

					this.columns = this.form.find('.column');
					this.columns
					.each(function(){
	
						var column = $(this),
							slider = column.find('.column-slider'),
							arrows = column.find('.slider-arrow'),
							scrollHeight = slider.prop('scrollHeight');
	
						column
						.find('.column-title')
						.on(App.Conf.clickEvent, function(e){
							e.preventDefault();
	
							if(App.Resize.current.l == 'm'){
	
								if(App.Filter.activeElm && !App.Filter.activeElm.is(column)){
									App.Filter.toggle(App.Filter.activeElm);
								}
	
								App.Filter.toggle(column);
							} else {
								App.Filter.toggle(App.Filter.filterElm);
							}
						});
	
						if(slider.length > 0){
	
							arrows
							.css('display', (scrollHeight > slider.height() ? '' : 'none'))
							.on(App.Conf.clickEvent, function(e){
	
								e.preventDefault();
	
								var arrow = $(this),
									scrollDown = arrow.hasClass('up-arrow'),
									step = slider.height(),
									newTop = slider.scrollTop() + (scrollDown ? -(step) : step);
	
								arrows.filter('.down-arrow').css('opacity', ((newTop >= (slider.prop('scrollHeight') - step)) ? .25 : ''));
								arrows.filter('.up-arrow').css('opacity', ((newTop <= 0) ? .25 : ''));
	
								slider
								.stop()
								.animate({
								    scrollTop: newTop
								});
							});
	
							arrows.filter('.up-arrow').css('opacity', .25);
						}
					});
	
					this.filterElm.find('.collapse-filter')
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();
						App.Filter.toggle(App.Filter.filterElm);
					});
	
					this.filters = this.columns.find('.filter');
	
					this.filters
					.change(function(e){
	
						e.preventDefault();
	
						var label = $(this).closest('label');
	
						Filter.updateState();
	
						(Filter.submitTimer)&&(clearTimeout(Filter.submitTimer));
	
						Filter.submitTimer = setTimeout(function(){
							Filter.submit();
						}, 1000);
					});
	
					this.clear = $('<div class="clear-filter">Clear filter</div>');
	
					this.clear
					.appendTo(this.filterElm.find('.filter-title'))
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();
	
						Filter.filters.attr('checked', false);
						Filter.updateState();
						Filter.submit();
					});
					
					this.hideOnFiltering = App.Conf.body.find('.hide-on-filtering');
	
					this.activeElm = false;
					this.submitTimer = false;
					this.updateState();
	
					App.Resize.addPerLayout('Filter', function(s){
						App.Filter.layout(s);
					});
					
				}

				var loadMore = this.elm.find('.load-more');

				if(loadMore.length == 0) {

					loadMore = $('<a href="" title="Load more" class="load-more">Load more +</a>');

					loadMore
					.css('display', 'none')
					.insertAfter(this.grid);
				}

				this.loadMore = loadMore;
				this.currentPage = 0;
				this.perPage = 8;

				this.loadMore
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();

					Filter.currentPage = Filter.currentPage + 1;

					var url = $(this).data('nextPage') + '/P' + (Filter.currentPage * Filter.perPage);

					$.ajax({
						url: url,
						type: 'get',
						dataType: 'json',
						error: function(xhr, ajaxOptions, thrownError) {
							c.log(thrownError);
							App.Filter.elm.removeClass('loading');
						},
						beforeSend: function() {
							App.Filter.elm.addClass('loading');
						},
						success: function(data, textStatus, request) {

							App.Filter.elm.removeClass('loading');

			                if(data.status == 'ok') {
								App.Filter.showResults(data, true);
			                }
						}
					});
				});
			},
			updateState: function(){

				this.columns.find('label.active').removeClass('active');
				this.filters.filter(':checked').closest('label').addClass('active');

				var activeFiltersLength = 0;

				this.columns.each(function(){

					var column = $(this),
						title = column.find('.column-title'),
						columnActiveFiltersLength = column.find(App.Filter.filters).filter(':checked').length;

					activeFiltersLength += columnActiveFiltersLength;

					if(title.length > 0){

						var span = title.find('span');

						if(span.length == 0){
							span = $('<span></span>');
							span.appendTo(title);
						}

						span.html(columnActiveFiltersLength > 0 ? '(' + columnActiveFiltersLength + ')' : '');
					}
				});

				this.clear.css('display', (activeFiltersLength > 0 ? '' : 'none'));
			},
			toggle: function(elm){

				if(!elm) return;

				var isActive = elm.hasClass('active');

				elm.toggleClass('active');

				this.activeElm = !isActive ? elm : false;
			},
			layout: function(s){

				if(this.activeElm){
 					this.toggle(this.activeElm);
				}
			},
			submit: function(){

				this.currentPage = 0;

				var sections = [],
					segments = [],
					anyCheckedFilter = false;

				this.columns.each(function(columnIndex){

					var column = $(this),
						sectionUrl = column.data('section'),
						checkedFilters = column.find(App.Filter.filters).filter(':checked');

					if(checkedFilters.length > 0){
						
						anyCheckedFilter = true;

						sections[columnIndex] = sectionUrl;
						segments[columnIndex] = [];

						checkedFilters
						.each(function(index){
							segments[columnIndex].push($(this).data('urlTitle'));
						});
					}
				});

				var newLocationUrl = this.baseUrl;

				if(anyCheckedFilter){
					newLocationUrl += '/filter';
				}

				sections.forEach(function(section, index){

					if(segments[index]){
						newLocationUrl += '/' + section + '/' + segments[index].join(':');
					}
				});

				if(newLocationUrl != document.location && App.Conf.historyIsEnabled){
					window.history.replaceState(null, document.title, newLocationUrl);
				}
				
				this.hideOnFiltering.css('display', (sections.length > 0 ? 'none' : ''));

				$.ajax({
					url: this.form.attr('action'), //Submit to form action, ee:low_search will redirect request to his result_page tag value with query segment attached
					type: 'post',
					dataType: 'json',
					data: App.Filter.form.serialize(),
					error: function(xhr, ajaxOptions, thrownError) {
						c.log(thrownError);
						App.Filter.elm.removeClass('loading');
					},
					beforeSend: function() {
						App.Filter.elm.addClass('loading');
					},
					success: function(data, textStatus, request) {

						App.Filter.elm.removeClass('loading');

		                if(data.status == 'ok') {
							App.Filter.showResults(data);
		                }
					}
				});
			},
			showResults: function(data, append){

				if(!append)
					this.grid.html("");

				if(data.results && data.results.length > 0){
					
					var scrollTo = 0,
						collection = $();

					data.results.forEach(function(result, index){

						var article = $('<article></article>'),
							link = $('<a href="' + result.link + '" title="' + result.title + '"></a>'),
							img = $('<img src="' + result.image + '" alt="' + result.title + '" class="article-img" />'),
							details = $('<div class="article-details"></div>'),
							title = $('<h3 class="article-title">' + result.title + '</h3>');

						if(result.type == 'blog' || result.type == 'events' || result.type == 'case_studies'){

							var box = $('<div class="box"></div>'),
								text = $('<div class="article-text">' + result.summary + '</div>');

							box.appendTo(App.Filter.grid).addClass(result.styles.join(' '));
							
								article.addClass('box-article').appendTo(box);
								
								if(result.image)
									img.appendTo(article);

								if(result.location){
									var location = $('<div class="article-location">' + result.location.join(' ') + '</div>');
									location.appendTo(article);
								}

								title.appendTo(article);
								text.appendTo(article);
								
								link.addClass('button').html("Read more").appendTo(article);

								if(result.details){

									details.appendTo(article);

									result.details.forEach(function(d){
										var span = $('<span>' + d + '</span>');
										span.appendTo(details);
									});
								}

							collection = collection.add(box);

						} else {

							article.appendTo(App.Filter.grid).addClass('content-search-box');
							
							if(result.styles)
								article.addClass(result.styles.join(' '));							

								link.appendTo(article);

									if(result.image)
										img.appendTo(link);

									details.appendTo(link);
									title.appendTo(details);

									if(result.details){
										var location = $('<div class="article-location"></div>');

										location.appendTo(details);

										result.details.forEach(function(d){
											var span = $('<span>' + d + '</span>');
											span.appendTo(location);
										});
									}
						}
						
						if(index == 0)
							scrollTo = article.offset().top;
					});

					App.Box.build(collection);					
					App.Box.fixTitle(collection);
					
					App.Box.elms = $('.box');

					if(append)
						App.Scroll.to(scrollTo);

				} else {
					var noResults = $('<div class="no-results">No results found.</div>');

					noResults.appendTo(this.grid);
				}

				this.loadMore
				.data('nextPage', (data.next_page ? data.next_page : ''))
				.css('display', (data.next_page ? '' : 'none'));
			}
		},
		Heading: {
			init: function(){

				var elms = App.Conf.body.find('.heading');

				if(elms.length == 0)
					return;

				this.elms = elms;
				this.swapBg();
			},
			swapBg: function(){

				this.elms.each(function(){

					var elm = $(this),
						img = elm.find('.heading-img');

					if(img.length > 0){
						elm.css('background-image', 'url(' + img.attr('src') + ')');
					}
				});
			}
		},
		HiddenContent: {
			init: function(){

				var elms = $('.hidden-content-wrapper');

				if(elms.length == 0)
					return;

				elms.each(function(){

					var elm = $(this),
						trigger = elm.find('.show-hidden-content-trigger, .toggle-hidden-content-trigger');

					if(trigger.length == 0)
						return true; //continue

					trigger
					.on(App.Conf.clickEvent, function(e){
						e.preventDefault();
						App.HiddenContent.toggleHiddenContent(elm, trigger);
					});
				});
			},
			toggleHiddenContent: function(elm, trigger){

				var hiddenContent = elm.find('.hidden-content:first'),
					isToggle = trigger.hasClass('toggle-hidden-content-trigger');

				if(hiddenContent.length > 0){

					App.ToggleHeight(hiddenContent, function(isHidden){

						if(isToggle){

							var text = trigger.text();

							hiddenContent[(!isHidden ? 'add' : 'remove') + 'Class']('active');
							trigger.text(text.replace(isHidden ? /less -/g : /more \+/g, !isHidden ? 'less -' : 'more +'));

						} else {

							hiddenContent.removeClass('hidden-content');
							trigger.css('visibility', (elm.find('.hidden-content').length == 0 ? 'hidden' : 'visible'));
						}

						hiddenContent.removeClass('will-toggle');

					});
				} else {
					trigger.css('visibility', 'hidden');
				}
			}
		},
		GetPath: function(type, returnArray) {

			type = type || 'full';
			var returnPath = "";

			switch (type) {
				case 'base':
					returnPath = window.location.protocol + '//' + window.location.host;
					break;
				case 'name':
					returnPath = window.location.pathname;
					break;
				case 'hash':
					returnPath = window.location.hash;
					break;
				case 'full':
					returnPath = this.GetPath('base') + this.GetPath('name') + this.GetPath('hash');
					break;
			}
			if (returnArray) {
				returnPath = returnPath.split('/').filter(function(s) {
					return s;
				});
			}
			return returnPath;
		},
		ToggleHeight: function(elm, callback){

			c.log('App.ToggleHeight');

			var isHidden = elm.height() == 0;

			if(App.Conf.transitions.s) {

				//Fix size
				elm
				.css('height', elm.height())
				.removeClass('active');

				var t = elm[0].clientWidth; //perform "read" on elm to trigger layout update http://gent.ilcore.com/2011/03/how-not-to-trigger-layout-in-webkit.html

				elm
				.on(App.Conf.transitions.e, function(e){

					$(this).off(App.Conf.transitions.e);

 					elm
 					.css('height', '')
 					.removeClass('will-toggle');

					if(callback && typeof callback === 'function'){
						callback.call(undefined, !isHidden);
					}
				})
				.addClass('will-toggle')
				.css('height', (isHidden ? elm.prop('scrollHeight') : ''));

			} else {

				if(callback && typeof callback === 'function'){
					callback.call(undefined, !isHidden);
				}
			}
		},
		BulletinForm: {
			init: function() {
				$('.bulletin-form').each(function() {
					var form = $(this);

					form.on('submit', function(e) {
						e.preventDefault();
						App.BulletinForm.submit(form);
						
					}).attr('autocomplete', 'off');
				});
			},
			submit: function(form) {
				
				if (App.BulletinForm.validate(form)) {

					var url = form.attr('action'),
						data = form.serialize();

					$.ajax({
						url: url,
						type: 'post',
						data: data,
						dataType: 'json',
						error: function(xhr, ajaxOptions, thrownError) {
							//c.log(thrownError);
						},
						beforeSend: function() {
							form.addClass('loading');
						},
						success: function(data, textStatus, request) {
							if (data.result === 'success') {

								App.BulletinForm.reset(form);
								form.addClass('success');

								setTimeout(function() {
									form.removeClass('success');
								}, 5000);

							} else {
								alert("Error, please try again later.");
							}
						}
					});
				}
			},
			validate: function(form) {

				var fieldsWrapper = form.find('.fields'),
					fields = fieldsWrapper.find('.required input'),
					pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i),
					valid = true;
					
				form.removeClass('error success');

				fields.each(function() {
					
					var field = $(this),
						val = $.trim(field.val()),
						type = field.attr('type'),
						parent = field.closest('div');

					if (val.length == 0 || (type == 'email' && !pattern.test(val))) {
						parent.addClass('error');
						valid = false;
					} else {
						parent.removeClass('error');
					}
				});
				
				!valid && form.addClass('error');
				
				return valid;
			},
			reset: function(form) {
				
				form.removeClass('error');
				
				var fieldsWrapper = form.find('.fields'),
					fields = fieldsWrapper.find('textarea, input:not(:checkbox):not(:radio):not(:submit), select');
					
				fields.each(function() {
					$(this).val("").trigger('change');
				});
			}
		},		
		CustomElms: {
			init: function(){
				c.log('App.CustomElms.init');
				this.select();
				this.inputSelect();
				this.placeholders();
				this.radio();
				//this.textarea();
			},
			placeholders: function(){
				c.log('App.CustomElms.placeholders');
				$('.input-text').each(function(){
					var elm = $(this),
						input = elm.find('input'),
						label = elm.find('label');

					input
					.on("keydown", function(e){
						label.css('display', 'none');						
					})
					.on("blur keyup change", function(e){
						if($(this).val().length > 0){
							elm.removeClass('error');
						} else {
							label.css('display', 'block');
						}
					});
					
					if(input.val().trim().length > 0)
						label.css('display', 'none');						

				});
			},
			textarea: function(){

				c.log('App.CustomElms.textarea');

				$('textarea', $('.input-textarea'))
				.bind("blur keyup change", function(){

					if($(this).val().length > 0){
						$('label', $(this).closest('.input-textarea')).css('display', 'none');
					} else {
						$('label', $(this).closest('.input-textarea')).css('display', 'block');
					}
				})
				.trigger("keyup");

			},
			radio: function(){
				$('.input-radio').each(function(){
					
					var that = $(this),
						container = that.closest('form'),
						input = $('input', that),
						name = input.attr('name');
						
					input.wrap('<div class="input-radio-wrapper"></div>');	
						
					that.click(function(e){
						e.preventDefault();
					
						$('input[name='+name+']', container).attr('checked', false).closest('.input-radio').removeClass('checked');
						
						input.attr('checked', 'checked');
						that.addClass('checked');
						
					});
					
					if(input.is(':checked')){ //Self check
						that.addClass('checked');
					}
				});				
			},			
			inputSelect: function() {
				
				$('.input-select').each(function() {
					var elm = $(this),
						select = elm.find('select'),
						ops = select.find('option'),
						ul = $('<ul></ul>'),
						label = elm.find('label'),
						title = label.text();
						
					select.on('change', function() {
						label.html(title + '<span>' + ops.filter(':selected').text() + '</span>');
					});
					
					if (App.Conf.isTouch) {

						select.css({
							'visibility': 'visible',
							'opacity': 0
						}).bind('focus', function() {
							elm.addClass('active');
						}).bind('blur', function() {
							elm.removeClass('active');
						});

						var selectedOption = ops.filter(':selected');
						
						if(selectedOption.length  > 0){
							label.html(title + '<span>' + selectedOption.text() + '</span>');
						}

					} else {
						ops.each(function() {

							var o = $(this),
								t = o.text(),
								li = $('<li>' + t + '</li>');
								
							li.on(App.Conf.clickEvent, function() {

								ops.prop('selected', false);
								o.prop('selected', true);

								elm.removeClass('error');
								select.trigger('change');

								ul.find('.active').removeClass('active');
								li.addClass('active');
							});

							if(o.prop('selected')){
								li.addClass('active');
								label.html(title + '<span>' + t + '</span>');
							}
							
							ul.append(li);
						});
						
						elm.append(ul)
						.on(App.Conf.clickEvent, function(e) {
							e.preventDefault();
							e.stopPropagation();
							
							var isActive = elm.hasClass('active');
							
							ul.stop()[isActive ? 'fadeOut' : 'fadeIn']('fast');
							
							if (!isActive) {
								App.Conf.body.on(App.Conf.clickEvent + '.oneClick', function() {
									ul.fadeOut('fast');
									elm.removeClass('active');
								});
							} else {
								App.Conf.body.off(App.Conf.clickEvent + '.oneClick');
							}
							
							elm.toggleClass('active');
						});
					}
				});
			},
            select: function(){
                $('.custom-select').each(function(){
                    if ($(this).parents('.custom-select-box').length == 0 && $(this).parents('.product_section_template').length == 0){
                        var elm = $(this),
                            elmWrapper = elm.closest('.drop-down'),
                            ops = elm.find('option'),
                            wrapper,
                            ul = $('<ul></ul>'),
                            label = $('<div class="custom-select-label"></div>');

                        elm.wrap('<div class="custom-select-box"></div>');

                        wrapper = elm.closest('.custom-select-box');

                        var elmClasses = elm.attr('class').split(' ');
                        var originalClassIndex = elmClasses.indexOf('custom-select');
                        elmClasses.splice(originalClassIndex,1);
                        jQuery.each(elmClasses, function(index, item) {
                            wrapper.addClass(item);
                        });

                        //Update label with selected/first option
                        label.html(ops.filter(':' + (ops.filter(':selected').length > 0 ? 'selected' : 'first')).text());

                        wrapper.append(label);

                        elm.bind('change', function(){

                            var o = ops.filter(':' + (ops.filter(':selected').length > 0 ? 'selected' : 'first'));

                            label.html(o.text());

                            if(o.val().length > 0){
                                elmWrapper.removeClass('error');
                            }

                        });


                        if(App.Conf.isTouch){

                            elm.css({
                                'visibility': 'visible',
                                'opacity': 0
                            }).bind('focus', function(){
                                wrapper.addClass('active');
                            }).bind('blur', function(){
                                wrapper.removeClass('active');
                            });

                        } else {


                            ops.each(function(){

                                var o = $(this),
                                    t = o.text(),
                                    v = o.val(),
                                    li = $('<li>' + t + '</li>');

                                li.bind('click.custom-select-click', function(){

                                    ops.prop('selected', false);

                                    o.prop('selected', true);
                                    label.text(t);

                                    if(v.length > 0){
                                        elmWrapper.removeClass('error');
                                    }

                                    elm.trigger('change');
                                });

                                ul.append(li);
                            });

                            wrapper
                            .append(ul)
                            .bind('click.custom-select-click', function(e){
                                e.preventDefault();

                                if(wrapper.hasClass('active')){

                                    ul
                                        .stop()
                                        .fadeOut('fast');

                                    wrapper.removeClass('active');

                                } else {
                                    ul
                                        .stop()
                                        .fadeIn('fast');

                                    wrapper.addClass('active');
                                }
                            });
                        }
                    }
                });
            }
        },
        PopUp: {
	        init: function(){
		        
				this.elm = $('<div id="popup-overlay"></div>'),
				this.content = $('<div class="overlay-content"></div>');
					
				this.elm.appendTo(App.Conf.body);
				this.content.appendTo(this.elm);
				
				this.isActive = false;
				
				this.elm
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();

					App.Conf.body.removeClass('with-popup-overlay');
					App.PopUp.content.html('');
					
				});
				
				this.content
				.on(App.Conf.clickEvent, function(e){
					e.stopPropagation();
				});
				
				var triggers = App.Conf.body.find('.popup-trigger');
				
				triggers
				.on(App.Conf.clickEvent, function(e){
					e.preventDefault();
					
					App.PopUp.trigger($(this).attr('href'));
				});
				
	        },
	        trigger: function(url){

				if(!url || url.length == 0)
					return;
					
				
				$.ajax({
					url: url,
					type: 'get',
					data: 'html',
					error: function(xhr, ajaxOptions, thrownError) {
						c.log('PopUp:Erroe white pulling data.');						
						c.log(thrownError);
					},
					beforeSend: function() {
						c.log('PopUp:Begin data pulling.');
					},
					success: function(data, textStatus, request) {

						c.log('PopUp:Finish data pulling.');

						App.PopUp.toggle(data);
					}
				});

		        
	        },
	        toggle: function(content){
		        
		        c.log(content);
		        
		        this.content.html(content);
		        
				App.Conf.body[(content ? 'add' : 'remove') + 'Class']('with-popup-overlay');		        
				
				if(this.isActive){
					
					$(document).on('keyup.AppPopUpKeyUp', function(e) {
						if(e.which == 27){
							App.Conf.body.removeClass('with-popup-overlay');
							App.PopUp.content.html('');						
						}
					});

				} else {
					$(document).off('keyup.AppNavKeyUp');					
				}
				
				this.isActive = !this.isActive;
	        }
        },
        IframeGenerator: {
	
	        init: function(){

				var elms = $('.iframe_placeholder');

				if(elms.length == 0)
					return;

				this.elms = elms;

				App.WindowLoad.add(function(){
					App.IframeGenerator.generate();
				});
	        },
	        generate: function(){
	            this.elms.each(function(){

	                var elm = $(this),
	                	newIframe = $('<iframe src="' + elm.attr("href") + '" width="500" height="206" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
	
	                newIframe.insertAfter(elm);
	
	                elm.remove();
	            });		
	        }

        },
		Eq: {
			init: function(){
				c.log('App.Eq.init');
				//Subscribe for resize e
				App.Resize.add('Eq', function(s){

					if(App.Eq.immediate.length > 0){
						App.Eq.resize(s);
					}

					(App.Eq.t)&&(clearTimeout(App.Eq.t));
					App.Eq.t = setTimeout(function(){
						App.Eq.resize(s, true);
					}, 150);
				});
			},
			t: null,
			debounced: [],
			immediate: [],
			add: function(e, debounced){
				c.log('App.Eq.add: ' + (debounced ? 'debounced' : 'immediate'));

				this[debounced ? 'debounced' : 'immediate'].push(e);
			},
			resize: function(s, debounced){

//				c.info('App.Eq.resize.' + (debounced ? 'debounced' : 'immediate'));

				var isMobile = s.l == 'm',
					collection = this[debounced ? 'debounced' : 'immediate'];

				collection.forEach(function(r){

					var max = 0,
						rows = $(r.row),
						allElms = rows.find(r.elm);

					//Clear all
					allElms.css('min-height', '');

					if(r.lineHeight){
						allElms.css('line-height', '');
					}

					if(isMobile === true && r.onMobile !== true){
						return true; //continue
					}

					rows.each(function(){

						var row = $(this),
							elms = row.find(r.elm);
							
						elms.each(function(){
	
							var h = $(this)[(r.inner ? 'inner' : 'outer') + 'Height']();
							
							max = h > max ? h : max;
						});
						
						if(max != 0){
							
							elms.css('min-height', max);
	
							if(r.lineHeight){
								elms.css('line-height', max + 'px');
							}
						}
					});
				});
			}
		},
		Cookie: {
			set: function(cname, cvalue, exdays) {
			    var d = new Date();
			    d.setTime(d.getTime() + (exdays*24*60*60*1000));
			    var expires = "expires="+d.toUTCString()+"; ";
			    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
			},
			get: function(cname) {
			    var name = cname + "=";
			    var ca = document.cookie.split(';');
			    for(var i=0; i<ca.length; i++) {
			        var c = ca[i];
			        while (c.charAt(0)==' ') c = c.substring(1);
			        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
			    }
			    return false;
			}		
		},
		Resize: {
			init: function(){

				c.log('App.Resize.init');

				var Resize = this;

				$(window)
				.bind(Resize.e, function(e){

					var size = {
						'h': $(window).prop('innerHeight'),
						'w': $(window).prop('innerWidth')
					};

					size.l = size.w.Between(App.Conf.layouts.m) ? 'm' : (size.w.Between(App.Conf.layouts.t) ? 't' : 'd');

					Resize.trigger(size);

					(Resize.t)&&(clearTimeout(Resize.t));
					Resize.t = setTimeout(function(){
						Resize.trigger(size, true);
					}, 150);
				});

				//Register for load event
				App.WindowLoad.add(function(){

					var size = {
						'h': $(window).height(),
						'w': $(window).width()
					};

					size.l = size.w.Between(App.Conf.layouts.m) ? 'm' : (size.w.Between(App.Conf.layouts.t) ? 't' : 'd');

					Resize.trigger(size);
					Resize.trigger(size, true);
				});

			},
// 			e: typeof window.orientation !== 'undefined' ? 'orientationchange' : 'resize',
			e: !!('orientation' in window) ? 'orientationchange' : 'resize',
			t: null,
			debounced: {},
			immediate: {},
			perLayout: {},
			add: function(identifier, f, debounced){
				c.log('App.Resize.add: ' + identifier + ' ' + (debounced ? 'debounced' : 'immediate'));
				this[debounced ? 'debounced' : 'immediate'][identifier] = f;
			},
			remove: function(collection, identifier){
				c.log('App.Resize.remove: ' + collection + ':' + identifier);

				if(this[collection][identifier])
					delete this[collection][identifier];
			},
			addPerLayout: function(identifier, f){
				c.log('App.Resize.addPerLayout: ' + identifier);
				this.perLayout[identifier] = f;
			},
			current: {
				'h': 0,
				'w': 0,
				'l': ''
			},
			trigger: function(size, debounced){

//				c.info('App.Resize.trigger.' + (debounced ? 'debounced' : 'immediate') + ' ' + size.w + 'x' + size.h + ' ' + size.l);

				if(size.l != this.current.l){

					c.info('App.Resize.trigger.layout: ' + size.l);

					for( var i in this.perLayout){
						if(typeof this.perLayout[i] === 'function'){
							this.perLayout[i].call(undefined, size);
						}
					}
				}

				var collection = this[debounced ? 'debounced' : 'immediate'];

				for(var i in collection){
					if(typeof collection[i] === 'function'){
						collection[i].call(undefined, size);
					}
				}

				this.current = size;
			}
		},
		Scroll: {
			init: function() {

				c.log('App.Scroll.init');

				var Scroll = this;

				$(window).bind(this.e, function(e) {

					var newVal = $(window).scrollTop();

					Scroll.lastDirectionDown = Scroll.current < newVal;
					Scroll.current = newVal;

					if(Scroll.immediate.length > 0){
						Scroll.trigger(false, Scroll.lastDirectionDown);
					}

					clearTimeout(App.Scroll.timer);
					App.Scroll.timer = setTimeout(function() {
						Scroll.trigger(true, Scroll.lastDirectionDown);
					}, 150);
				});

				this.current = $(window).scrollTop();

				//Register for load event
				App.WindowLoad.add(function(){
					App.Scroll.trigger();
					App.Scroll.trigger(true);
				});

			},
			e: 'scroll.AppScroll',
			timer: null,
			debounced: [],
			immediate: [],
			to: function(to, callback) {

				c.info('App.Scroll.to: ' + to);

				var dur = to != this.current ? 750 : 0;

				to -= App.Header.height();
				
				if(App.Filter.filterElm){
					to -= App.Filter.filterElm.height();					
				}

				$('html, body')
				.animate({
					'scrollTop': to
				}, {
					duration: dur,
					easing: "easeInOutExpo",
					complete: function() {
						if (callback && typeof callback === 'function') {
							callback.call();
							callback = false;
						}
					}
				});
			},
			add: function(f, debounced){
				c.log('App.Scroll.add: ' + (debounced ? 'debounced' : 'immediate'));

				this[debounced ? 'debounced' : 'immediate'].push(f);
			},
			current: 0,
			trigger: function(debounced) {

//				c.info('App.Scroll.trigger.' + (debounced ? 'debounced' : 'immediate') + ' ' + this.current + ': ' + (this.lastDirectionDown ? 'down' : 'up'));

				var collection = this[debounced ? 'debounced' : 'immediate'];

				for(var i in collection){
					if(typeof collection[i] === 'function'){
						collection[i].call(undefined, this.current);
					}
				}
			}
		},
		WindowLoad: {
			all:[],
			add: function(f){
				c.log('App.WindowLoad.add');
				this.all.push(f);
			},
			trigger: function(){

				c.info('App.WindowLoad.trigger');

				for(var i in this.all){
					if(typeof this.all[i] === 'function'){
						this.all[i].call();
					}
				}
			}
		},

		DocReady: {
			all:[],
			add: function(f){
				c.log('App.DocReady.add');
				this.all.push(f);
			},
			trigger: function(){

				c.info('App.DocReady.trigger');

				for(var i in this.all){
					if(typeof this.all[i] === 'function'){
						this.all[i].call();
					}
				}
			}
		},
		Init: function(){
			
			
			this.DocReady.add(function(){

				c.info('App.DocReady:Begin');
	
				$(window).load(function(){
					App.WindowLoad.trigger();
				});
	
				App.Conf.body = $('body');
				App.Conf.body.addClass((App.Conf.isTouch ? '' : 'no-') + 'touch');
				
				App.Conf.contentElm = App.Conf.body.find('#content');
	
				App.Resize.init();
				App.Scroll.init();
	
				App.Announcement.init();
				App.Header.init();
				App.Nav.init();
				App.Search.init();
	
				App.Eq.init();
	
				App.BigSlider.init();
	
				App.Filter.init();
				App.Grid.init();
				App.Box.init();
				App.Columns.init();
				App.HiddenContent.init();
				App.Heading.init();
				App.QuotesSlider.init();
				App.ImagesSlider.init();
				App.CaseStudiesSlider.init();
				App.TextSlider.init();
				App.VideoSlider.init();
				App.PopUp.init();
				App.FoundersSection.init();
				App.InlineMap.init();
				App.IframeGenerator.init();
				App.RMap.init();
				App.BulletinForm.init();
	
				App.CustomElms.init();
	
				c.info('App.DocReady:Finish');
				
			});
			
			$(document).ready(function(){
				App.DocReady.trigger();
			});
		}
	};

App.Init();