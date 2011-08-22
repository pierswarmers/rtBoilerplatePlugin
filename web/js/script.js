/*!
 *
 * script.js
 *
 * RediType: rtBoilerplatePlugin
 * Based upon: http://html5boilerplate.com/
 *
 */

// Hide unstyled order form
$("form.rt-shop-product-order-panel").hide();

/* Optiptimise screen layout
================================================== */
var rtOptiptimiseLayout = function() {
    if ($(window).width() <= 520 && !$("#rtProductHolder").hasClass('microOptimised')) { $('.rt-shop-product-gallery').prependTo($("#rtProductHolder")); $("#rtProductHolder").addClass('microOptimised').removeClass('macroOptimised'); }
    if ($(window).width() >  520 && !$("#rtProductHolder").hasClass('macroOptimised')) { $('.rt-shop-product-gallery').appendTo($("#rtProductHolder"));  $("#rtProductHolder").addClass('macroOptimised').removeClass('microOptimised'); }
}

/* Optiptimise screen layout
================================================== */
var rtAttributesValid = function(parentHolder) {
  var i = 0; var button = parentHolder.find('button');

  $(".rt-shop-option-set").each(function(){ $(this).children('input:checked').each(function(){ i++; }); });
    
  if(i == parentHolder.find(".rt-shop-option-set").size()) {
    if(rtAttributesAllSelectedSelected(parentHolder)) {
      button.text("Add to Cart").attr("disabled", false).removeClass("disabled").next('span').hide();
    } else {
      button.text("Not available").attr("disabled", true).addClass("disabled").next('span').show().addClass('error').html('That combination isn\'t in stock!');
    }
  }
}

/* Are all options selected?
================================================== */
var rtAttributesAllSelectedSelected = function(parentHolder) {
    var check = true;
    parentHolder.find(".rt-shop-option-set input:checked").each(function() { if(!$(this).button('widget').hasClass('available')) { check = false; } });
    return check;
}

/* On load...
================================================== */

$(function() {

    // rtOptiptimiseLayout after window resizes
    $(window).resize(function() { rtOptiptimiseLayout(); });
    
    // rtOptiptimiseLayout on load
    rtOptiptimiseLayout();

    $('form.rt-shop-product-order-panel').each(function(){ rtAttributesValid($(this)); });

    $('form.rt-shop-product-order-panel').submit(function(e) {

        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr('action') + '.json',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(data)
            {
                $('form.rt-shop-product-order-panel .order-response').hide();
                $('span.rt-shop-cart-items').html(data.cartItems);
                $('span.rt-shop-cart-total').html(data.cartTotalFormatted);
                $('form.rt-shop-product-order-panel').append('<p class="order-response '+ data.status +'">'+ data.message +'</p>');
            }
        }, "json");
    });

    // Activate attribute selection buttons
    $(".rt-shop-option-set").each(function(){
        $(this).buttonset().find(':radio').click(function(e) {
            $(".rt-shop-product-primary-image a[class*=rt-image-ref-" + $(this).attr("title").toLowerCase().replace(/[^a-zA-Z0-9]/g, "") + "]").css("display","inline").siblings('a').css("display","none");
            $(this).closest('form').find(".rt-shop-option-set input[type=radio]").each(function() { $(this).button( "widget" ).fadeTo(1, 0.4).removeClass('available'); });
            $($(this).next('.ref').html()).each(function() { if(!$(this).hasClass('unavailable')) { $(this).button( "widget" ).fadeTo(1, 1).addClass('available'); } });
            rtAttributesValid($(this).closest('form'));
        }).each(function() {
            if($(this).button( "widget" ).hasClass('unavailable')) { $(this).button('disable', true).button( "widget" ).fadeTo(1, 0.4); }
        });
    });

    // Re-enable the order form... see earlier in this script
    $("form.rt-shop-product-order-panel").show();

    // Handle clicks on the wishlist and the Ajax call to save the item.
    $(".rt-shop-add-to-wishlist a").click(function(e) {
        e.preventDefault(); $('.rt-shop-add-to-wishlist').addClass('loading').html('Adding to wishlist...');
        $.ajax({ type: "POST", url: '/add-to-wishlist', data: ({ id : $('#rt-shop-product-id').attr('value') }), dataType: "xhr", success: function(data) { $('.rt-shop-add-to-wishlist').removeClass('loading').addClass('success'); $('.rt-shop-add-to-wishlist').html(data); } });
      });

    /*
     * Skeleton V1.0.3
     * Copyright 2011, Dave Gamache
     * www.getskeleton.com
     * Free to use under the MIT license.
     * http://www.opensource.org/licenses/mit-license.php
     * 7/17/2011
     */

    /* Tabs activiation
     ================================================== */
    var tabs = $('ul.tabs');
    tabs.each(function(i) {
        var tab = $(this).find('> li > a');
        tab.click(function(e) {
            var contentLocation = $(this).attr('href') + "Tab";
            if (contentLocation.charAt(0) == "#") {
                e.preventDefault();
                tab.removeClass('active');
                $(this).addClass('active');
                $(contentLocation).show().addClass('active').siblings().hide().removeClass('active');
            }
        });
    });
});

