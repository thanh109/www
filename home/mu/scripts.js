$(function(){
	$('.feature-prev').click(function(){
		var _active = $('.feature-slides .active');
		var _prev = $('.feature-slides .prev');
		var _next = $('.feature-slides .next');
		var _f = $('.feature-slides .feature');
		_f.removeClass('active prev next')
		_prev.addClass('active');
		_prev = _prev.index() == 0 ? _f.eq(_f.length-1) : _prev.prev();
		_prev.addClass('prev');
		_active.addClass('next');
	});
	$('.feature-next').click(function(){
		var _active = $('.feature-slides .active');
		var _prev = $('.feature-slides .prev');
		var _next = $('.feature-slides .next');
		var _f = $('.feature-slides .feature');
		_f.removeClass('active prev next')
		_next.addClass('active');
		_next = _next.index() >= _f.length-1 ? _f.eq(0) : _next.next();
		_next.addClass('next');
		_active.addClass('prev');
	});
	$('.list-character-controls .char-control').click(function(){
		$('.list-character-controls .char-control, .list-characters .char-content').removeClass('active');
		$(this).addClass('active');
		$('.list-characters .char-content:eq('+$(this).index()+')').addClass('active');
	});
	var _day = 10,
	_month = 12,
	_year = 2011,
	_hour = 00,
	_minute = 00;
	var datetime = new Date(_year, _month, _day, _hour, _minute, 00, 00);
	$(".c2ountdown").attr('time',Math.round(datetime.getTime()/1000)).kkcountdown({
    	dayText		: 'ngày ',
    	daysText 	: 'ngày ',
        hoursText	: 'giờ ',
        minutesText	: 'phút ',
        secondsText	: 'giây ',
        displayZeroDays : false,
        callback	: function(){
        	return;
        },
        addClass	: 'shadow'
    });
    $('#scene').parallax();



	var startTime, startY, endY;
	var endCoords = {};
	var globFailCounter = 0;
	var rangeY = 0;
	var aniComplete = true;

	var isMobile = {
	    Android: function() {
	        return navigator.userAgent.match(/Android/i);
	    },
	    BlackBerry: function() {
	        return navigator.userAgent.match(/BlackBerry/i);
	    },
	    iOS: function() {
	        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
	    },
	    Opera: function() {
	        return navigator.userAgent.match(/Opera Mini/i);
	    },
	    Desktop: function() {
	        return navigator.userAgent.match(/Windows NT/i);
	    },
	    Windows: function() {
	        return navigator.userAgent.match(/IEMobile/i);
	    },
	    any: function() {
	        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
	    }
	};
	
	function msieversion() {
		var myNav = navigator.userAgent.toLowerCase();
		return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : 999;
	}
var idleTime = 0;
var ieVersion = msieversion();
var indexPage = 0;
var winWidth = $(window).width();
var winHeight = $(window).height();
var scaleWidth = winWidth / 640;
var scaleHeight = winHeight / 960;

var logoWidth = 193;
var logoHeight = 133;
var logoTop = 100;

var textWidth = 417;
var textHeight = 193;
var textTop = 240;

var countWidth = 350;
var countHeight = 48;
var countTop = 430;

var fanpageWidth = 71,
	fanpageHeight = 88,
	fanpageTop = 500;

var groupWidth = 60,
	groupHeight = 82,
	groupTop = 506;

var downloadWidth = 219,
	downloadHeight = 73;

var iosWidth = 34,
	iosHeight = 44;

var androidWidth = 31,
	androidHeight = 38;

var barHeight = 124;



var char1TextWidth = 475,
	char1TextHeight = 168,
	char1TextTop = 130;

var char1ImgWidth = 534,
	char1ImgHeight = 456,
	char1ImgTop = 310;

var char2TextWidth = 484,
	char2TextHeight = 180,
	char2TextTop = 130;

var char2ImgWidth = 449,
	char2ImgHeight = 454,
	char2ImgTop = 310;

var char3TextWidth = 473,
	char3TextHeight = 168,
	char3TextTop = 130;

var char3ImgWidth = 508,
	char3ImgHeight = 468,
	char3ImgTop = 310;

var char4TextWidth = 477,
	char4TextHeight = 276,
	char4TextTop = 130;

var char4ImgWidth = 547,
	char4ImgHeight = 439,
	char4ImgTop = 410;

var fea1Width = 428,
	fea1Height = 489,
	fea1Top = 100;

var fea2Width = 437,
	fea2Height = 466,
	fea2Top = 100;

var fea3Width = 419,
	fea3Height = 456,
	fea3Top = 100;

var fea4Width = 419,
	fea4Height = 456,
	fea4Top = 100;

var fea5Width = 419,
	fea5Height = 446,
	fea5Top = 100;


$(window).bind('resize', function(){
	IntitContent();
});

function IntitContent() {
	winWidth = $(window).width();
    winHeight = $(window).height();
    scaleWidth = winWidth / 640;
    scaleHeight = winHeight / 960;
    if(winWidth>1080) return;
    if(scaleWidth >= scaleHeight){
    	$('.body').addClass('landscape')
    }
	$('.page, .char, .fea').css({
		width : winWidth,
		height : winHeight
	});

	$('.logo').css({
		width : logoWidth * scaleWidth,
		height : logoHeight * scaleWidth,
		marginLeft : -(logoWidth * scaleWidth) / 2,
		top : logoTop * scaleWidth
	});

	$('.text').css({
		width : textWidth * scaleWidth,
		height : textHeight * scaleWidth,
		marginLeft : -(textWidth * scaleWidth) / 2,
		top : textTop * scaleWidth
	});

	$('.countdown').css({
		width : countWidth * scaleWidth,
		height : countHeight * scaleWidth,
		marginLeft : -(countWidth * scaleWidth) / 2,
		top : countTop * scaleWidth
	});

	$('.btn-fanpage').css({
		width : fanpageWidth * scaleWidth,
		height : fanpageHeight * scaleWidth,
		marginLeft : '-15%',
		top : fanpageTop * scaleWidth
	});

	$('.btn-group').css({
		width : groupWidth * scaleWidth,
		height : groupHeight * scaleWidth,
		marginLeft : '0',
		top : groupTop * scaleWidth
	});

	$('.link-download').css({
		width : downloadWidth * scaleWidth,
		height : downloadHeight * scaleWidth
	});

	$('.icon-ios').css({
		width : iosWidth * scaleWidth,
		height : iosHeight * scaleWidth
	});

	$('.icon-android').css({
		width : androidWidth * scaleWidth,
		height : androidHeight * scaleWidth
	});

	$('.download').css({
		height : barHeight * scaleWidth
	});

	$('.char-elf .char-text').css({
		width : char1TextWidth * scaleWidth,
		height : char1TextHeight * scaleWidth,
		top : char1TextTop * scaleWidth,
		marginLeft : -(char1TextWidth * scaleWidth)/2
	});

	$('.char-elf .char-img').css({
		width : char1ImgWidth * scaleWidth,
		height : char1ImgHeight * scaleWidth,
		top : char1ImgTop * scaleWidth,
		marginLeft : -(char1ImgWidth * scaleWidth)/2
	});

	$('.char-dk .char-img').css({
		width : char2ImgWidth * scaleWidth,
		height : char2ImgHeight * scaleWidth,
		top : char2ImgTop * scaleWidth,
		marginLeft : -(char2ImgWidth * scaleWidth)/2
	});

	$('.char-dk .char-text').css({
		width : char2TextWidth * scaleWidth,
		height : char2TextHeight * scaleWidth,
		top : char2TextTop * scaleWidth,
		marginLeft : -(char2TextWidth * scaleWidth)/2
	});

	$('.char-dw .char-img').css({
		width : char3ImgWidth * scaleWidth,
		height : char3ImgHeight * scaleWidth,
		top : char3ImgTop * scaleWidth,
		marginLeft : -(char3ImgWidth * scaleWidth)/2
	});

	$('.char-dw .char-text').css({
		width : char3TextWidth * scaleWidth,
		height : char3TextHeight * scaleWidth,
		top : char3TextTop * scaleWidth,
		marginLeft : -(char3TextWidth * scaleWidth)/2
	});

	$('.char-mg .char-img').css({
		width : char4ImgWidth * scaleWidth,
		height : char4ImgHeight * scaleWidth,
		top : char4ImgTop * scaleWidth,
		marginLeft : -(char4ImgWidth * scaleWidth)/2
	});

	$('.char-mg .char-text').css({
		width : char4TextWidth * scaleWidth,
		height : char4TextHeight * scaleWidth,
		top : char4TextTop * scaleWidth,
		marginLeft : -(char4TextWidth * scaleWidth)/2
	});

	$('.fea-1').css({
		width : fea1Width * scaleWidth,
		height : fea1Height * scaleWidth,
		marginLeft : -(fea1Width * scaleWidth)/2
	});

	$('.fea-2').css({
		width : fea2Width * scaleWidth,
		height : fea2Height * scaleWidth,
		marginLeft : -(fea2Width * scaleWidth)/2
	});

	$('.fea-3').css({
		width : fea3Width * scaleWidth,
		height : fea3Height * scaleWidth,
		marginLeft : -(fea3Width * scaleWidth)/2
	});

	$('.fea-4').css({
		width : fea4Width * scaleWidth,
		height : fea4Height * scaleWidth,
		marginLeft : -(fea4Width * scaleWidth)/2
	});

	$('.fea-5').css({
		width : fea5Width * scaleWidth,
		height : fea5Height * scaleWidth,
		marginLeft : -(fea5Width * scaleWidth)/2
	});
}
IntitContent();


var owl = $(".owl-carousel");
owl.owlCarousel({
	autoWidth:true,
	loop:true,
	autoplay:true,
	autoplayTimeout:2000,
	nav:false,
	dots:false,
	onInitialized : function(){
		IntitContent();
	}
});



});