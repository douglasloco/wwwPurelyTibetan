/*------------------------------------------------------------------------------------------------------------
# VP ProMart! Joomla 2.5 Template for VirtueMart 2.0 Ver. 1.0.7
# ------------------------------------------------------------------------------------------------------------
# Copyright (C) 2012 VirtuePlanet Services LLP. All Rights Reserved.
# License - GNU General Public License version 2. http://www.gnu.org/licenses/gpl-2.0.html
# Author: VirtuePlanet Services LLP
# Email: info@virtueplanet.com
# Websites:  http://www.virtueplanet.com
------------------------------------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	$('.vm-mini-cart').mouseover(function(){
  	$('.vm-mini-cart .vm_cart_products .container:first-child').addClass('first-child');
		$('.vm-mini-cart .vm_cart_products .container:last-child').addClass('last-child');
	});
	$('#header .visible-desktop .menu.nav > li:first-child').addClass('home');
	$('#header .visible-desktop .menu.nav > li.home a').wrapInner('<span>');
	$('#header .visible-desktop .menu.nav > li.home a').prepend($('<i class="icon-home icon-white"></i>'));
  $('.visible-desktop nav .parent').addClass('dropdown');
  $('.visible-desktop nav .parent > a, .visible-desktop nav .parent > span').addClass('dropdown-toggler');
  $('nav .parent > a, nav .parent > span').append('<b class="caret"></b>');
  $('.visible-desktop nav .parent > ul').addClass('dropdown-menu');
  $('ul.nav li.dropdown, ul.nav li.dropdown ul').hover(function() {
  	$(this).find('.dropdown-menu').stop(true, true).slideDown(100);
 	 $(this).addClass('open');
	}, function() {
  	$(this).find('.dropdown-menu').stop(true, true).slideUp(0);
  	$(this).removeClass('open');
	});
	$('.submenu .deeper.dropdown b').removeClass('caret').addClass('right-arrow');
	$('.hidden-desktop > nav > .menu.nav').removeClass('nav').addClass('mobile-nav');
	$('.navbar-inverse .mobile-nav li.parent').hover(function(){
		$(this).children('.submenu').slideDown('slow');
	},function(){
		$(this).children('.submenu').slideUp('slow');
	});
	$('.VM-menu li.parent > a').removeAttr('href').attr('href','Javascript: void(0);');	
	$('.VM-menu li.active.parent > ul').show().parent().addClass('open');
	$('.VM-menu li.parent.inactive > a').click(function(){
		$(this).siblings('.submenu').slideToggle({
			duration: 500, 
			easing: 'jswing'});
		$(this).parent().toggleClass('open', 200);
	});
	$('.VM-menu li.parent.active.open').removeClass('active').addClass('parent-active');
	$('.VM-menu li.parent.parent-active > a').click(function(){
		$(this).siblings('.submenu').slideToggle({
			duration: 500, 
			easing: 'jswing'});
		$(this).parent().toggleClass('open', 200);
		$(this).parent().toggleClass('active', 200);
	});	
	$('.side-menu li').each(function(){
		$(this).not('.active').addClass('inactive');
	});		
	$('.side-menu li.parent > a').removeAttr('href').attr('href','Javascript: void(0);');	
	$('.side-menu li.active.parent > ul').show().parent().addClass('open');
	$('.side-menu li.parent.inactive > a, .side-menu li.parent.inactive > span').click(function(){
		$(this).siblings('.submenu').slideToggle({
			duration: 500, 
			easing: 'jswing'});
		$(this).parent().toggleClass('open', 200);
	});
	$('.side-menu li.parent.active.open').removeClass('active').addClass('parent-active');
	$('.side-menu li.parent.parent-active > a, .side-menu li.parent.parent-active > span').click(function(){
		$(this).siblings('.submenu').slideToggle({
			duration: 500, 
			easing: 'jswing'});
		$(this).parent().toggleClass('open', 200);
		$(this).parent().toggleClass('active', 200)
	});	
	$('.side-menu li > a, .VM-menu li > a, .side-menu li > span').append($('<b class="menu-arrow"></b>'));
	
	$('dl.article-info > dt.article-info-term').hide();
	$('dl.article-info > dd:last-child').addClass('last-child');
	$('.item-page ul.pagenav a').addClass('btn btn-small');
	$('.add-control-label label').addClass('control-label');

	$('#scroll-top').click(function() {
		$('html, body').animate({scrollTop: 0}, 500);
  });
	
	$('.product-field-type-R a img, .product-field-type-Z a img').after($('<br/>'));
	$('.final-price-class-restore').append( $('.price-class-move > div.PricesalesPrice > span.PricesalesPrice') );	
	$('.price-before-dicount-class-restore').append( $('.price-class-move > .price-before-dicount') );	
	$('.product-discount-class-restore').append( $('.price-class-move > .product-discount') );	
	    $('.tooltip-demo.well').tooltip({
      selector: "a[rel=tooltip]"
    })
	$('.price-container').hover(
		function() {
			$(this).children('.price').fadeTo(500, 1, function(){				
				$(this).addClass('active');
			}).end().children('.price-pop-up').fadeIn(200).show();
		},
		function() {
		    $(this).children('.price').fadeTo(500, 1, function(){				
				$(this).removeClass('active');
			}).end().children('.price-pop-up').fadeOut(200).hide();
		}
	);

	$('#ask-question').modal({remote : true, show:false});
	$('#PromartTab a').click(function(e) {
	    e.preventDefault();
	    $(this).tab('show');
	})
	$('#PromartTab a:first').tab('show');


	$('.product-image-gallery .image-thumbnails a').click(function() {
		$('a.active').removeClass('active');
		$(this).addClass('active');
	});
	$('.scroll-pane').jScrollPane();
	$('.nav-tabs li a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    $('.tab-content > .tab-pane.active').jScrollPane();
	});
	$('.title-tip').tooltip('hide');
	$("div.product-field-type-M div.product-field-display label img, div.product-field-type-S div.product-field-display label p").live("click", function() {
		$("#" + $(this).parents("label").attr("for")).click();
	});	
	$('div.product-field-type-M div.product-field-display, div.product-field-type-S div.product-field-display').wrapInner('<ul>');
	var $set = $('div.product-field-type-M div.product-field-display ul, div.product-field-type-S div.product-field-display ul').children();    
	for(var i=0, len = $set.length; i < len; i+=2){
    	$set.slice(i, i+2).wrapAll('<li class="cart-options"/>');
	}  
	$('div.product-field-type-M div.product-field-display ul li:first-child, div.product-field-type-S div.product-field-display ul li:first-child').addClass('active');	
	$('.addtocart-area .product-field-type-S > .product-field-display .active p').addClass('active');	
	$("div.product-field-type-S div.product-field-display label p, div.product-field-type-M div.product-field-display label img").live("click", function() {
		$(this).parent().parent().find('input[type="radio"]').click(); // Click Radion on click of button or image
		$(this).parents('li').addClass('active').siblings().removeClass('active');
		$(this).parent().parent().siblings().children().children().removeClass('active');	
		$(this).addClass('active');	
	});	
	$('li.cart-options label').contents().filter(function() {
  		return this.nodeType == 3;
	})
  .wrap('<span class="option-cost"></span>')
	.end();
	$("a[rel^='prettyPhoto']").prettyPhoto({
		social_tools:false
	
	});
	$('.product-hover').hover(
		function() {
			$(this).children('.spacer').fadeTo(100, 1, function(){				
				$(this).addClass('active');
			}).end().children('.quick-view-cont').fadeIn(200).show();
		},
		function() {
			$(this).children('.spacer').fadeTo(150, 1, function(){				
				$(this).removeClass('active');
			}).end().children('.quick-view-cont').fadeOut(200).hide();
		}
	);
	
	$(".simple-gallery .large-image-container").append('<div id="image-loading"><p>Loading...</p></div>');
	var large_img_url = $('.simple-gallery .large-image-container #simple-large-image').attr('src');
	$(".simple-gallery .large-image-container #simple-large-image").load(large_img_url, function () {
		$('.simple-gallery #image-loading').hide();
	});	
	
	$(".simple-gallery .thumbnails-container a").click(function () {	
		$('a.active').removeClass('active');
		$(this).addClass('active');
		var large_img_url = $(this).attr("href");					
		$("#simple-large-image").attr("src", large_img_url);
		$('.simple-gallery #image-loading').show();
		$(".simple-gallery .large-image-container #simple-large-image").load(large_img_url, function () {
			$('.simple-gallery #image-loading').hide();
		});		
		return false;
	});
	
	$(".quick-view .large-image-container").append('<div id="image-loading"><p>Loading...</p></div>');
	var mobile_large_img_url = $('.quick-view .large-image-container #quick-enlarged').attr('src');
	$(".quick-view .large-image-container #quick-enlarged").load(mobile_large_img_url, function () {
		$('.quick-view #image-loading').hide();
	});
		
	$(".quick-view .thumbnails-container a").click(function () {	
		$('a.active').removeClass('active');
		$(this).addClass('active');
		var mobile_large_img_url = $(this).attr("href");					
		$("#quick-enlarged").attr("src", mobile_large_img_url);	
		$('.quick-view #image-loading').show();
		var mobile_large_img_url = $('.quick-view .large-image-container #quick-enlarged').attr('src');
		$(".quick-view .large-image-container #quick-enlarged").load(mobile_large_img_url, function () {
			$('.quick-view #image-loading').hide();
		});			
		return false;
	});
	$(".quick-view .thumbnails-container a").mousemove(function () {	
		$('a.active').removeClass('active');
		$(this).addClass('active');
		var mobile_large_img_url = $(this).attr("href");					
		$("#quick-enlarged").attr("src", mobile_large_img_url);	
		return false;
	});
	
	$('.hidden-phone .vm-mini-cart-module').hover(
		function() {
			$(this).children('.visible-cart-content').fadeTo(50, 1, function(){
				$(this).addClass('active');
			}).end().children('.hidden-cart-content').slideDown({
					duration: 200, 
					easing: 'easeOutQuart'
				});
    },
    function() {
			$(this).children('.visible-cart-content').fadeTo(200, 1, function(){	
				$(this).removeClass('active');
			}).end().children('.hidden-cart-content').slideUp({
									duration: 200, 
					easing: 'easeInQuart'
			});
		}
	);		
   if (!$.browser.opera) {
        $('select.select').each(function(){
            var title = $(this).attr('title');
            if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="select">' + title + '</span>')
                .change(function(){
                    val = $('option:selected',this).text();
                    $(this).next().text(val);
                    })
        });
    };	
	$('.activeOrder a').text($('.activeOrder a').text().replace('+/-',''));
	$('.activeOrder a').text($('.activeOrder a').text().replace('-/+',''));
	$('.manufacturer-sort .activeOrder').addClass('hide');
	$('.manufacturer-sort .orderlist > div:first-child').addClass('first-child');
	$('.product-list-limit-box > select.inputbox').addClass('input-mini');			
	$('#product-details .addtocart-area .product-field-type-S > .product-field-display p').addClass('btn');	
	$('.product-listing .product .product-price > .price-class > div.PricesalesPrice').contents().filter(function() {
  		return this.nodeType == 3;
	})
  	.wrap('<span class="price-heading"></span>')
		.end();
	$('.continue-checkout-box .checkout-cont a').addClass('btn btn-large btn-primary');	
	$('.continue-checkout-box .continue-cont .continue_link').addClass('btn btn-large btn-inverse');
		
	$('.product-field-display label').find(":contains('0'),:contains('1'),:contains('2'),:contains('3'),:contains('4'),:contains('5'),:contains('6'),:contains('7'),:contains('8'),:contains('9')").addClass('not-free');
	
	/* Add to Cart FaceBox Animation */	
	$(document).bind('afterReveal.facebox', function() {
		$('#facebox .showcart, #facebox .continue').attr('target','_parent').wrapAll('<div class="continue-showcart"></div>');
		$('.showcart').addClass('btn btn-primary btn-small').removeClass('floatright');
		$('.continue').addClass('btn btn-inverse btn-small');
		$('#facebox .content > div > div:eq(1)').addClass('okay-message');
	});	
	
});

jQuery.noConflict();
jQuery(window).load(function () { 
	var biggestHeight = 0; 
	jQuery('.product-listing .row-fluid .product .spacer').each(function(){  
		if(jQuery(this).height() > biggestHeight){  
			biggestHeight = jQuery(this).height();  
		}  
	});  
	jQuery('.product-listing .row-fluid .product .spacer').height(biggestHeight);

	var biggestCatHeight = 0; 
	jQuery('.category-view .category .spacer').each(function(){  
		if(jQuery(this).height() > biggestCatHeight){  
			biggestCatHeight = jQuery(this).height();  
		}  
	});  
	jQuery('.category-view .category .spacer').height(biggestCatHeight);
	
	var biggestManHeight = 0; 
	jQuery('.manufacturer-view-default .manufacturer .spacer').each(function(){  
		if(jQuery(this).height() > biggestManHeight){  
			biggestManHeight = jQuery(this).height();  
		}  
	});  
	jQuery('.manufacturer-view-default .manufacturer .spacer').height(biggestManHeight);	

	var biggestManImgHeight = 0; 
	jQuery('.manufacturer-view-default .manufacturer .spacer .image-cont').each(function(){  
		if(jQuery(this).height() > biggestManImgHeight){  
			biggestManImgHeight = jQuery(this).height();  
		}  
	});  
	jQuery('.manufacturer-view-default .manufacturer .spacer .image-cont').height(biggestManImgHeight);	

	var biggestGalHeight = 0; 
	jQuery('.product-image-gallery > div').each(function(){  
		if(jQuery(this).height() > biggestGalHeight){  
			biggestGalHeight = jQuery(this).height();  
		}  
	});  
	jQuery('#product-details.hproduct .product-image-gallery > div').height(biggestGalHeight);
	
	var biggestAddressHeight = 0; 
	jQuery('.billto-shipto .output-billto, .billto-shipto .output-shipto').each(function(){  
		if(jQuery(this).height() > biggestAddressHeight){  
			biggestAddressHeight = jQuery(this).height();  
		}  
	});  
	jQuery('.billto-shipto .output-billto, .billto-shipto .output-shipto').height(biggestAddressHeight);
	
	var galleryMinHeight = 0; 
	galleryMinHeight = jQuery('#product-details .top-content-area').height();
	jQuery('#product-details.hproduct .product-image-gallery').css('min-height', galleryMinHeight);	
	
	$j = jQuery;		
	$j('.manufacturer-view-default .manufacturer .spacer .image-cont img').each(
	function(){
		var $img = $j(this);
		var h = $img.height();
		var w = $img.width();
		$img.css('margin-top', + h / -2 + "px");
		$img.css('margin-left', + w / -2 + "px");
		$img.css('position', 'absolute');
	}
	);
	
});

