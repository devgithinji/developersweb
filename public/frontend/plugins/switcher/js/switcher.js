/*** Add Switcher */
function addSwitcher()
{
	var currentURL      = window.location.href; 
	var urlLTR = '';
	var urlRTL = '';
	if(currentURL.indexOf('xhtml-rtl') > -1){
		urlLTR = currentURL.replace('xhtml-rtl', 'xhtml')
		urlRTL = currentURL;
	}else{
		urlRTL = currentURL.replace('xhtml', 'xhtml-rtl')
		urlLTR = currentURL;
	}
	
	var dzSwitcher = '<div id="dzSwitcher" class="styleswitcher"><div class="switcher-btn-bx"><a class="switch-btn closed"><span class="fa fa-cogs fa-lg"></span></a></div><div class="styleswitcher-inner"><h6 class="switcher-title">Layout</h6><ul class="layout-view"><li class="wide-layout active">Wide</li><li class="boxed">Boxed</li></ul><h6 class="switcher-title">Nav</h6><ul class="nav-view"><li class="nav-light active">Light</li><li class="nav-dark">Dark</li></ul><h6 class="switcher-title">Header</h6><ul class="header-view"><li class="header-fixed active">Fixed</li><li class="header-static">Static</li></ul><h6 class="switcher-title">Header</h6><ul class="header-view"><li class="header-fixed active">Fixed</li><li class="header-static">Static</li></ul><h6 class="switcher-title">Skin View</h6><ul class="skin-view"><li class="active"><a href="'+urlLTR+'">LTR</a></li><li class=""><a href="'+urlRTL+'">RTL</a></li></ul><h6 class="switcher-title">Color Skin</h6><ul class="color-skins"><li><a class="theme-skin skin-1" href="?theme=css/skin/skin-1" title="default Theme"></a></li><li><a class="theme-skin skin-2" href="?theme=css/skin/skin-2" title="pink Theme"></a></li><li><a class="theme-skin skin-3" href="?theme=css/skin/skin-3" title="sky Theme"></a></li><li><a class="theme-skin skin-4" href="?theme=css/skin/skin-4" title="green Theme"></a></li><li><a class="theme-skin skin-5" href="?theme=css/skin/skin-5" title="red Theme"></a></li><li><a class="theme-skin skin-6" href="?theme=css/skin/skin-6" title="orange Theme"></a></li><li><a class="theme-skin skin-7" href="?theme=css/skin/skin-7" title="purple Theme"></a></li><li><a class="theme-skin skin-8" href="?theme=css/skin/skin-8" title="blue Theme"></a></li></ul><h6 class="switcher-title">Background Image</h6><ul class="background-switcher"><li><img width="35" height="35" src="images/switcher/switcher-bg/bg1.jpg" dir="images/background/bg1.jpg" alt=""></li><li><img width="35" height="35" src="images/switcher/switcher-bg/bg2.jpg" dir="images/background/bg2.jpg"  alt=""></li><li><img width="35" height="35" src="images/switcher/switcher-bg/bg3.jpg" dir="images/background/bg3.jpg"  alt=""></li><li><img width="35" height="35" src="images/switcher/switcher-bg/bg4.jpg" dir="images/background/bg4.jpg"  alt=""></li></ul><h6 class="switcher-title">Background Pattern</h6><ul class="pattern-switcher"><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg1.jpg" dir="images/pattern/pt1.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg2.jpg" dir="images/pattern/pt2.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg3.jpg" dir="images/pattern/pt3.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg4.jpg" dir="images/pattern/pt4.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg5.jpg" dir="images/pattern/pt5.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg6.jpg" dir="images/pattern/pt6.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg7.jpg" dir="images/pattern/pt7.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg8.jpg" dir="images/pattern/pt8.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg9.jpg" dir="images/pattern/pt9.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg10.jpg" dir="images/pattern/pt10.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg11.jpg" dir="images/pattern/pt11.jpg" alt=""></li><li><img width="19" height="19" src="images/switcher/switcher-patterns/bg12.jpg" dir="images/pattern/pt12.jpg" alt=""></li></ul></div></div>';
	
	if($("#dzSwitcher").length == 0) {
		jQuery('body').append(dzSwitcher);
	}
}

jQuery(window).on('load',function(){
	
	//=== Switcher panal slide function	=====================//
	jQuery('.styleswitcher').animate({
		'left': '-220px'
	});
	jQuery('.styleswitcher-right').animate({
		'right': '-220px',
		'left': 'auto'
	});
	jQuery('.switch-btn').addClass('closed');
	//=== Switcher panal slide function END	=====================//
	
});
	
$(function(){		
	"use strict";
	
	addSwitcher();
	
	//=== Switcher panal slide function	=====================//
	jQuery('.switch-btn').on('click',function () {	
		if (jQuery(this).hasClass('open')) {
			jQuery(this).addClass('closed');
			jQuery(this).removeClass('open');
			jQuery('.styleswitcher').animate({
				'left': '-220px'
			});
			jQuery('.styleswitcher-right').animate({
				'right': '-220px',
				'left': 'auto'
			});
		} else {
			if (jQuery(this).hasClass('closed')) {
			jQuery(this).addClass('open');
			jQuery(this).removeClass('closed');
			jQuery('.styleswitcher').animate({
				'left': '0'
			});
			jQuery('.styleswitcher-right').animate({
				'right': '0',
				'left': 'auto'
			});
			}
		}	
	});
	//=== Switcher panal slide function END	=====================//

	//=== Color css change function	=====================//
    // Color changer
    jQuery(".skin-1").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-1.css");
		jQuery(".logo-header img").attr("src", "images/logo.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo1.png");
        return false;
    });
    
    jQuery(".skin-2").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-2.css");
		jQuery(".logo-header img").attr("src", "images/logo2.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-2.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark2.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-2.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo2.png");
        return false;
    });
    
    jQuery(".skin-3").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-3.css");
		jQuery(".logo-header img").attr("src", "images/logo3.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-3.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark3.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-3.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo3.png");
        return false;
    });
	
    jQuery(".skin-4").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-4.css");
		jQuery(".logo-header img").attr("src", "images/logo4.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-4.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark4.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-4.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo4.png");
        return false;
    });
	
    jQuery(".skin-5").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-5.css");
		jQuery(".logo-header img").attr("src", "images/logo5.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-5.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark5.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-5.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo5.png");
        return false;
    });	
	
    jQuery(".skin-6").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-6.css");
		jQuery(".logo-header img").attr("src", "images/logo6.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-6.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark6.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-6.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo6.png");
        return false;
    });		
		
    jQuery(".skin-7").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-7.css");
		jQuery(".logo-header img").attr("src", "images/logo7.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-7.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark7.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-7.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo7.png");
        return false;
    });
	
    jQuery(".skin-8").on('click',function(){
        jQuery(".skin").attr("href", "css/skin/skin-8.css");
		jQuery(".logo-header img").attr("src", "images/logo8.png");
		jQuery(".logo-header.dark img").attr("src", "images/logo-black-8.png");
		jQuery(".logo-footer img").attr("src", "images/logo-dark8.png");
		jQuery(".sidenav .logo-header img").attr("src", "images/logo-black-8.png");
		jQuery(".full-blog-dark .sidenav .logo-header img").attr("src", "images/logo8.png");
        return false;
    });	
	//=== Color css change function	=====================//	
	
	//=== Background image change function	=====================//
	jQuery('.background-switcher li img').on('click',function(){
	 var imgbg = jQuery(this).attr('dir');
	 //console.<span id="IL_AD2" class="IL_AD">log</span>(imgbg);
	 jQuery('#bg').css({backgroundImage: "url("+imgbg+")"});
	 });
	//=== Background image change function	End=====================//
	
	
	//=== Background pattern change function	=====================//
	jQuery('.pattern-switcher li img').on('click',function(){
	 var imgbg = jQuery(this).attr('dir');
	 //console.<span id="IL_AD2" class="IL_AD">log</span>(imgbg);
	 jQuery('#bg').css({backgroundImage: "url("+imgbg+")"});
	 jQuery("#bg").css( "background-size", "auto")
	 
	 });
	//=== Background pattern change function End=====================//
	

	//=== Layout boxed & fullscreen change function	=====================//
	jQuery('.layout-view li ').on('click', function(){
		jQuery('.layout-view li ').removeClass('active');
		jQuery(this).addClass('active');	
	});
	
	jQuery('.wide-layout').on('click',function() { 
		jQuery("body").addClass('wide-layout')
		jQuery("body").removeClass('boxed')
	});
	
	jQuery('.boxed').on('click',function() { 
		jQuery("body").addClass('boxed')
		jQuery("body").removeClass('wide-layout')
	});
	//=== Layout boxed & fullscreen change function	END=====================//
	


	//=== Nav light & dark change function	END=====================//
	jQuery('.nav-view li ').on('click', function(){
		jQuery('.nav-view li ').removeClass('active');
		jQuery(this).addClass('active');	
	});
	
	jQuery('.nav-light').on('click',function() { 
		jQuery(".header-nav").addClass('nav-light')
		jQuery(".header-nav").removeClass('nav-dark')
	});
	
	jQuery('.nav-dark').on('click',function() { 
		jQuery(".header-nav").addClass('nav-dark')
		jQuery(".header-nav").removeClass('nav-light')
	});
	//=== Nav light & dark change function	END=====================//	
	
	jQuery('.header-view li ').on('click', function(){
		jQuery('.header-view li ').removeClass('active');
		jQuery(this).addClass('active');	
	});
	
	jQuery('.header-fixed').on('click',function() { 
		jQuery(".main-bar-wraper").addClass('sticky-header')
		jQuery(".main-bar-wraper").removeClass('sticky-no')
	});
	
	jQuery('.header-static').on('click',function() { 
		jQuery(".main-bar-wraper").addClass('sticky-no')
		jQuery(".main-bar-wraper").removeClass('sticky-header')
	});
});