/*!
 *
 * script.js
 *
 * RediType: rtBoilerplatePlugin
 * Based upon: http://html5boilerplate.com/
 *
 */

$(function(){
  /*
    Section: Your code goes here...
  */

    //
    $(window).resize(function() {

        var holder = $("#rtProductHolder");

        if($(this).width() <= 520 && !holder.hasClass('microOptimised')) {
            $('.rt-shop-product-gallery').prependTo($("#rtProductHolder"));
            holder.addClass('microOptimised').removeClass('macroOptimised');
        }
        if($(this).width() > 520 && !holder.hasClass('macroOptimised')) {
            $('.rt-shop-product-gallery').appendTo($("#rtProductHolder"));
            holder.addClass('macroOptimised').removeClass('microOptimised');
        }
    });

    /*
    * Skeleton V1.0.3
    * Copyright 2011, Dave Gamache
    * www.getskeleton.com
    * Free to use under the MIT license.
    * http://www.opensource.org/licenses/mit-license.php
    * 7/17/2011
    */

	/* Tabs Activiation
	================================================== */
	var tabs = $('ul.tabs');
	tabs.each(function(i) {
		var tab = $(this).find('> li > a');
		tab.click(function(e) {
			var contentLocation = $(this).attr('href') + "Tab";
			if(contentLocation.charAt(0)=="#") {
				e.preventDefault();
				tab.removeClass('active');
				$(this).addClass('active');
				$(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
			}
		});
	});
});