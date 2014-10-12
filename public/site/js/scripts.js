/* Placeholder plugin for jQuery Copyright 2010, Daniel Stocks (http://webcloud.se) Released under the MIT, BSD, and GPL Licenses. */
(function(b){function d(a){this.input=a;a.attr("type")=="password"&&this.handlePassword();b(a[0].form).submit(function(){if(a.hasClass("placeholder")&&a[0].value==a.attr("placeholder"))a[0].value=""})}d.prototype={show:function(a){if(this.input[0].value===""||a&&this.valueIsPlaceholder()){if(this.isPassword)try{this.input[0].setAttribute("type","text")}catch(b){this.input.before(this.fakePassword.show()).hide()}this.input.addClass("placeholder");this.input[0].value=this.input.attr("placeholder")}},
hide:function(){if(this.valueIsPlaceholder()&&this.input.hasClass("placeholder")&&(this.input.removeClass("placeholder"),this.input[0].value="",this.isPassword)){try{this.input[0].setAttribute("type","password")}catch(a){}this.input.show();this.input[0].focus()}},valueIsPlaceholder:function(){return this.input[0].value==this.input.attr("placeholder")},handlePassword:function(){var a=this.input;a.attr("realType","password");this.isPassword=!0;if(b.browser.msie&&a[0].outerHTML){var c=b(a[0].outerHTML.replace(/type=(['"])?password\1/gi,
"type=$1text$1"));this.fakePassword=c.val(a.attr("placeholder")).addClass("placeholder").focus(function(){a.trigger("focus");b(this).hide()});b(a[0].form).submit(function(){c.remove();a.show()})}}};var e=!!("placeholder"in document.createElement("input"));b.fn.placeholder=function(){return e?this:this.each(function(){var a=b(this),c=new d(a);c.show(!0);a.focus(function(){c.hide()});a.blur(function(){c.show(!1)});b.browser.msie&&(b(window).load(function(){a.val()&&a.removeClass("placeholder");c.show(!0)}),
a.focus(function(){if(this.value==""){var a=this.createTextRange();a.collapse(!0);a.moveStart("character",0);a.select()}}))})}})(jQuery);

                var currentTallest = 0,
                    currentRowStart = 0,
                    rowDivs = new Array();

                function setConformingHeight(el, newHeight) {
                        // set the height to something new, but remember the original height in case things change
                        el.data("originalHeight", (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight")));
                        el.height(newHeight);
                }

                function getOriginalHeight(el) {
                        // if the height has changed, send the originalHeight
                        return (el.data("originalHeight") == undefined) ? (el.height()) : (el.data("originalHeight"));
                }

                function columnConform(iddiv) {
                        // find the tallest DIV in the row, and set the heights of all of the DIVs to match it.
                        $(iddiv).each(function() {
                                // "caching"
                                var $el = $(this);
                                var topPosition = $el.position().top;

                                if (currentRowStart != topPosition) {
                                        // we just came to a new row.  Set all the heights on the completed row
                                        for(currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);

                                        // set the variables for the new row
                                        rowDivs.length = 0; // empty the array
                                        currentRowStart = topPosition;
                                        currentTallest = getOriginalHeight($el);
                                        rowDivs.push($el);
                                }
                                else {
                                        // another div on the current row.  Add it to the list and check if it's taller
                                        rowDivs.push($el);
                                        currentTallest = (currentTallest < getOriginalHeight($el)) ? (getOriginalHeight($el)) : (currentTallest);

                                }
                                // do the last row
                                for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) setConformingHeight(rowDivs[currentDiv], currentTallest);
                        });
                }
       
/**
 * Cookie plugin
 *
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

/**
 * Create a cookie with the given name and value and other optional parameters.
 *
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Set the value of a cookie.
 * @example $.cookie('the_cookie', 'the_value', { expires: 7, path: '/', domain: 'jquery.com', secure: true });
 * @desc Create a cookie with all available options.
 * @example $.cookie('the_cookie', 'the_value');
 * @desc Create a session cookie.
 * @example $.cookie('the_cookie', null);
 * @desc Delete a cookie by passing null as value. Keep in mind that you have to use the same path and domain
 *       used when the cookie was set.
 *
 * @param String name The name of the cookie.
 * @param String value The value of the cookie.
 * @param Object options An object literal containing key/value pairs to provide optional cookie attributes.
 * @option Number|Date expires Either an integer specifying the expiration date from now on in days or a Date object.
 *                             If a negative value is specified (e.g. a date in the past), the cookie will be deleted.
 *                             If set to null or omitted, the cookie will be a session cookie and will not be retained
 *                             when the the browser exits.
 * @option String path The value of the path atribute of the cookie (default: path of page that created the cookie).
 * @option String domain The value of the domain attribute of the cookie (default: domain of page that created the cookie).
 * @option Boolean secure If true, the secure attribute of the cookie will be set and the cookie transmission will
 *                        require a secure protocol (like HTTPS).
 * @type undefined
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */

/**
 * Get the value of a cookie with the given name.
 *
 * @example $.cookie('the_cookie');
 * @desc Get the value of a cookie.
 *
 * @param String name The name of the cookie.
 * @return The value of the cookie.
 * @type String
 *
 * @name $.cookie
 * @cat Plugins/Cookie
 * @author Klaus Hartl/klaus.hartl@stilbuero.de
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

$(document).ready(function() {
    $("#btn_nfo").click(function() {
      $("#nfoModal").reveal();
    });
    $("#btn_map").click(function() {
      $("#mapModal").reveal();
    });
    $("#btn_rules").click(function() {
      $("#confModal").reveal();
    });


$('a').each(function() {
   var a = new RegExp('/' + window.location.host + '/');
   if (!a.test(this.href)) {
      $(this).click(function(event) {
           event.preventDefault();
           event.stopPropagation();
           window.open(this.href, '_blank');
       });
   }
});





$('.news_full img').each(function() {
    $(this).addClass("img-responsive");
});




$('.tt-top').tooltip({ placement: 'top' });
$('.tt-bottom').tooltip({ placement: 'bottom' });
$('.tt-left').tooltip({ placement: 'left' });
$('.tt-right').tooltip({ placement: 'right' });
$('#totop').click(function() {
    $('body,html').animate({
                scrollTop: 0
            }, 700);
      return false;
    });

/*
$("body").css("display", "none");
$("body").fadeIn(1000);
	$("a.transition").click(function(event){
		event.preventDefault();
		linkLocation = this.href;
		$("body").fadeOut(1000, redirectPage);
	});
function redirectPage() {
	window.location = linkLocation;
}
*/

    $('input[placeholder], textarea[placeholder]').placeholder();





     $(".nav_ad").change(function() {
        window.location = $(this).find("option:selected").val();
     });

$(".collapse").collapse();

      /*      
                $(window).resize(function() {
                         if($(window).width() > 767) {columnConform('#main_first .columns > .block_body');}
                });

                $(function() {
                        if($(window).width() > 767) {columnConform('#main_first .columns > .block_body');}
                });
       */ 

	$('ul#shop-menu ul').each(function(i) { // Check each submenu:
		if ($.cookie('submenuMark-' + i)) {  // If index of submenu is marked in cookies:
			$(this).show().prev().removeClass('collapsed').addClass('expanded'); // Show it (add apropriate classes)
		}else {
			$(this).hide().prev().removeClass('expanded').addClass('collapsed'); // Hide it
		}
		$(this).prev().addClass('collapsible').click(function() { // Attach an event listener
			var this_i = $('ul#shop-menu ul').index($(this).next()); // The index of the submenu of the clicked link
			if ($(this).next().css('display') == 'none') {
				$(this).next().slideDown(200, function () { // Show submenu:
					$(this).prev().removeClass('collapsed').addClass('expanded');
					cookieSet(this_i);
				});
			}else {
				$(this).next().slideUp(200, function () { // Hide submenu:
					$(this).prev().removeClass('expanded').addClass('collapsed');
					cookieDel(this_i);
					$(this).find('ul').each(function() {
						$(this).hide(0, cookieDel($('ul#shop-menu ul').index($(this)))).prev().removeClass('expanded').addClass('collapsed');
					});
				});
			}
		return false; // Prohibit the browser to follow the link address
		});
	});
        
        
        
        function htmSlider(){
            var slideWrap = jQuery('.logos-wrap');
            var slideWidth = jQuery('.logos-item').outerWidth();
            var scrollSlider = slideWrap.position().left - slideWidth;
 
            timer = setInterval(function(){
             slideWrap.animate({ left: scrollSlider}, 500, function(){
              slideWrap
               .find('.logos-item:first')
               .appendTo(slideWrap)
               .parent()
               .css({'left': 0});
              });
            }, 3000);
        }
        htmSlider();

});

function cookieSet(index) {
	$.cookie('submenuMark-' + index, 'opened', {expires: null, path: '/'}); // Set mark to cookie (submenu is shown):
}
function cookieDel(index) {
	$.cookie('submenuMark-' + index, null, {expires: null, path: '/'}); // Delete mark from cookie (submenu is hidden):
}

    $(function() {
      if ($.browser.msie && $.browser.version.substr(0,1)<7)
      {
          $('#menu li').has('ul').click(function(){
              $(this).children('ul').show();
          }).click(function(){
             $(this).children('ul').hide();
          })
      }
    });
    
    
    
            /* portfolio thumbs */
         $(function() {
              $('.thumb:first').css('border','3px solid #00b1eb');
              
              $(".gthumb").click(function() {
                  var image = $(this).attr("rel");
                  var title = $(this).attr("title");
                  var description = $(this).attr("content");
                  var tgimg = $(this).attr("rev");


                  $('.thumb').css('border','3px solid #FFF');
                  $('.thumb img:hover').css('border','3px solid #000');
                  $('#photo_img').hide().fadeOut('fast').html('<img src="' + image + '"/>');
                  $('#title').html(title);
                  $('#thumb').html(image);
                  $('#description').html(description);
                  $('#tm'+tgimg).css('border','3px solid #00b1eb');
                  $('#photo_img').fadeIn('slow');
                  return false;
              });
              $('#photo_main').mouseover(function() {
                  $('#caption').css('visibility','visible');

              });
              $('#photo_main').mouseout(function() {
                  $('#caption').css('visibility','hidden');

              });
         });




