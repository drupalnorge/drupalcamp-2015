// JavaScript Document

var $ = jQuery.noConflict();

$(document).ready(function($) {
	$('.menunav-container').children('ul.menu').attr( "id", "menu-main-nav" );
	$('.menunav-container ul.menu li').each(function() {
	  if($('body').hasClass('front')) {
		  $(this).attr('class', '');
		  $(this).children('a').removeClass('active');
		  var hrefVal = $(this).children('a').attr('href');
		  var anchorVal = "#" + hrefVal.substr(hrefVal.indexOf("#") + 1);
		  if(hrefVal.indexOf("#") != -1) {
			$(this).children('a').attr('href', anchorVal);
		  }
		  if($(this).children('a').attr('href') == "#header") {
			$(this).addClass('active');
		  }
	  }
	});
	
});