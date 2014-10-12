$(function () {

   

    /* map */
    if ($('#map').length) {

        $('#map').append('<div class="loading"/>');
        $('.map_top').append('<div class="loading"/>');
        $('.map_area').hide();
        $(window).load(function () {
            $('.map_area').fadeIn(300);
            $('.loading').remove();
            $('.map_img').maphilight({
                fillOpacity:0.8,
                stroke:false,
                fade:true
            });
        });




        /* map floors */
        $('.brand_page .map_levels a').live('click', function (event) {
            var a = $(this);
            var url = a.attr('href');
            url = url.slice(0, 8) + 'floor/' + url.slice(8, 9) + '/zoom/1?dark=1';
            var map = $('#map');
            var map_area = $('.map_area');
            var map_view = $('#levels');
            var active = $('#map .box.active');
            if (!map.data('active')) {
                if (active.length) map.data('active', active.data('brand').url);
            }
            $.ajax({
                dataType:'html',
                url:url,
                beforeSend:function () {
                    map_area.animate({'opacity':0.3}, 300);
                    map.append('<div class="loading"/>');
                    if ($('.map_tooltip').length) $('.map_tooltip').fadeOut(100).remove();
                    $('.map_levels li').removeClass('current');
                },
                error:function (jqXHR, textStatus) {
                    console.log(jqXHR);
                },
                success:function (data) {
                    map_area.stop().css({'opacity':1}).hide().html(data);
                    map_view.css({
                        'left':0,
                        'top':0
                    });
                    $('img.map_img').load(function () {
                        map_area.fadeIn(300);
                        $('.map_img').maphilight({
                            fillOpacity:0.8,
                            stroke:false,
                            fade:true
                        });
                        if (map.data('active')) {
                            $('#map .box').each(function () {
                                if ($(this).data('brand').url == map.data('active')) {
                                    var active_id = $(this).attr('id').replace('box_', '');
                                    selectBox(active_id, 'active');
                                }
                            });
                        }
                        $('.loading').remove();
                        a.parent().addClass('current');
                        map.removeClass('zoom_2').removeClass('zoom_3').addClass('zoom_1');
                        $('#map #zoom_in').removeClass('disabled')
                        $('#map #zoom_out').addClass('disabled');
                    });
                }
            });
            return false;
        });


        /* map areas */

        $('#map .box').live('mouseenter mouseleave mousemove mouseover click', function (event) {
            var a = $(this);
            var id = parseInt(a.attr('id').replace('box_', ''));
            var title = a.data('brand').title;
            if (event.type == 'mouseover') {
                if ($('body').hasClass('brand_page')) event.preventDefault();
                if (a.hasClass('current') && !a.hasClass('active')) {
                    deselectBox(a, id);
                    return false;
                } else {
                    var cur = $('#map .box.current').not('.active');
                    if (cur.length) {
                        var cur_id = parseInt(cur.attr('id').replace('box_', ''));
                        deselectBox(cur, cur_id);
                    }
                    selectBox(id);
                }
            } else if (event.type == 'mouseover' && !a.hasClass('current')) {
                $('body').append('<div id="tooltip" class="white">&laquo;' + title + '&raquo;</div>');
                $('#tooltip').css({
                    'top':event.pageY - 30,
                    'left':event.pageX + 5
                }).fadeIn(200);
            } else if (event.type == 'mousemove' && !a.hasClass('current')) {
                $('#tooltip').css({
                    'top':event.pageY - 30,
                    'left':event.pageX + 5
                });
            } else if (event.type == 'mouseleave' && !a.hasClass('current')) {
                $('#tooltip').fadeOut(100).remove();
            }
        });


        $('.map_categories a').live('click', function () {
            var cur, color, color_start, id, data;

            /* deselect highlighted box */
            var cur_box = $('#map .box.current');
            if (cur_box.length) {
                var cur_box_id = parseInt(cur_box.attr('id').replace('box_', ''));
                deselectBox(cur_box, cur_box_id);
            }

            /* remove previous selections */
            cur = $('.map_categories li.current');
            if (cur.length) {
                id = cur.find('a').attr('id');
                $('#map .box.' + id).each(function () {
                    toggleHighlight($(this), false, 'old');
                });
                cur.removeClass('current');
            }

            /* highlight new one */
            if (!cur.is($(this).parent())) {
                cur = $(this);
                color = cur.find('span.clr').attr('style');
                color_start = color.indexOf('#') + 1;
                if (color_start == 0) {
                    color_start = color.indexOf('rgb');
                    color = color.slice(color_start).replace(';', '');
                    color = rgb2hex(color).replace('#', '');
                } else {
                    color = color.slice(color_start, color_start + 6);
                }
                id = cur.attr('id');
                $('#map .box.' + id).each(function () {
                    toggleHighlight($(this), true, color);
                });
                cur.parent().addClass('current');
            }

            return false;
        });


        /* layers icons */

        $('.map_layers a').live('mouseenter mouseleave click mousemove', function (event) {
            var a = $(this);
            var id = a.attr('id');
            var title = a.data('title');
            if (event.type == 'click') {
                return false;
            } else if (event.type == 'mouseenter') {
                $('#map img.' + id).show();
                $('body').append('<div id="tooltip">' + title + '</div>');
                $('#tooltip').css({
                    'top':event.pageY - 30,
                    'left':event.pageX + 5
                }).fadeIn(200);
            } else if (event.type == 'mousemove') {
                $('#tooltip').css({
                    'top':event.pageY - 30,
                    'left':event.pageX + 5
                });
            } else {
                $('#map img.' + id).hide();
                $('#tooltip').fadeOut(100).remove();
            }
            return false;
        });

        $('#map .layers img').live('click', function () {
            $(this).hide();
        });

    }


    buildForm();





 

    $('.popup_close').live('click', function () {
        popupClose($(this));
        $('html').removeClass('popup_open');
    });


    $('.popup_photo_container .popup_nav_button').live('click', function () {
        location.hash = '#photo_' + ($(this).attr('data-id'));
        return false;
    });


    $('.popup_video_container .popup_nav_button').live('click', function () {
        location.hash = '#video_' + ($(this).attr('data-id'));
        return false;
    });


    $(window).resize(function () {

        /* resize popup */
        var popup = $('.popup:visible');
        waitForFinalEvent(function () {
            popupResize(popup);
        }, 500, "some unique string");


        /* mainpage carousel resize */
        if ($('.mainpage_carousel').length) mainpageCarousel();

        if ($('.brands_carousel').length) brandsCarousel();

        if ($('.news_carousel').length) newsCarousel();
    });


});


function carouselWidth() {
    var cwidth = 0;
    $('.carousel_item').each(function () {
        //console.log($(this).outerWidth());
        cwidth += $(this).outerWidth() + 2;
    });
    $('.carousel_items').css('width', cwidth + 'px');
    return cwidth;
}


/* form actions */

function buildForm() {

    /* create fields' placeholders */
    $('input, textarea').each(function () {
        var t = $(this);
        if (t.attr('placeholder')) {
            var defval = t.attr('placeholder');
            if (t.val() == '') t.val(defval).addClass('empty');
            else if (t.val() == defval) t.addClass('empty');
            t.live('focus blur', function (event) {
                if (event.type == 'focus') {
                    if ($(this).val() == defval) {
                        $(this).removeClass('empty').val('');
                    }
                } else {
                    if ($(this).val() == '') {
                        $(this).addClass('empty').val(defval);
                    }
                }
            });
        }
    });

    /* custom checkboxes */
    $('input[type=checkbox]:not(.designed)').each(function () {
        var id = $(this).addClass('designed').attr('id');
        var checked = '';

        if ($(this).is(':checked')) checked = ' checked';
        $(this).after('<span class="check_btn' + checked + '" id="' + id + '_span"></span>');
        $('.check_btn').bind('click', function () {
            var id = $(this).attr('id').replace('_span', '');
            if ($(this).hasClass('checked')) {
                $(this).removeClass('checked');
                $('#' + id).attr('checked', false);
            } else {
                $(this).addClass('checked');
                $('#' + id).attr('checked', true);
            }
        });

        $(this).css({
            'position':'absolute',
            'left':'-1000px'
        }).parent().css('overflow', 'hidden');
        $(this).live('change', function () {
            if ($(this).is(':checked')) {
                $(this).attr('checked', true);
                $('#' + id + '_span').addClass('checked');
            } else {
                $(this).attr('checked', false);
                $('#' + id + '_span').removeClass('checked');
            }
        });
    });
}


/* form validation */

function checkFields(field) {
    var parent_div = field.parent();
    var pattern = new RegExp();
    var placeholder;
    if (field.attr('pattern')) {
        pattern = new RegExp(field.attr('pattern'));
    }
    if (field.attr('placeholder')) {
        placeholder = field.attr('placeholder');
    }
    if (field.attr('type') == 'checkbox') {
        if (!field.is(':checked')) {
            if (!parent_div.hasClass('error')) {
                parent_div.addClass('error').append('<div class="error_text">Подтвердите свое согласие</div>');
            }
        } else {
            parent_div.removeClass('error').addClass('checked');
            parent_div.find('.error_text').remove();
        }
    } else if (field[0].nodeName == 'SELECT') {
        if (field.val() == 0) {
            if (!parent_div.hasClass('error')) {
                parent_div.addClass('error').append('<div class="error_text">Это поле необходимо заполнить</div>');
            }
        } else {
            parent_div.removeClass('error').addClass('checked');
            parent_div.find('.error_text').remove();
        }
    } else {
        if (field.val() == '' || field.val() == placeholder) {
            if (!parent_div.hasClass('error')) {
                parent_div.addClass('error').append('<div class="error_text">Это поле необходимо заполнить</div>');
            }
            parent_div.find('.error_text').html('Это поле необходимо заполнить');
        } else if (pattern.test(field.val()) === false) {
            if (!parent_div.hasClass('error')) {
                parent_div.addClass('error').append('<div class="error_text">Неверный формат данных</div>');
            }
            parent_div.find('.error_text').html('Неверный формат данных');
        } else {
            parent_div.removeClass('error').addClass('checked');
            parent_div.find('.error_text').remove();
        }
    }
}


/* mainpage carousel */

function mainpageCarousel() {
    var car = $('.mainpage_carousel');
    var win_width = $(window).width();
    var carousel_width = 0;
    var item_width = 0;
    var margins = 0;
    car.find('.carousel_item').each(function (e) {
        item_width = $(this).outerWidth() + margins;
        carousel_width += ($(this).outerWidth() + margins);
    });
    if (carousel_width <= win_width) {
        // no slider
        if (car.find('.carousel_content').hasClass('iosslider')) {
            car.find('.carousel_content').removeClass('iosslider').removeClass('infinity').iosSlider('destroy');
        }
        car.find('.carousel_items').width(carousel_width).css('margin', '0 auto');
        car.find('.carousel_button').hide();
        car.find('.carousel_hand').hide();
    } else if (carousel_width <= (item_width + win_width)) {
        // simple slider
        car.find('.carousel_content').addClass('iosslider').iosSlider({
            desktopClickDrag:true,
            keyboardControls:true,
            navNextSelector:$('.button_next'),
            navPrevSelector:$('.button_prev'),
            //responsiveSlideContainer: false,
            //responsiveSlides: false
            snapToChildren:true,
        });
        //$('.carousel_content').iosSlider('update');
        car.find('.carousel_button').show();
        car.find('.carousel_hand').show();
    } else {
        // infinite slider 
		
        car.find('.carousel_content').addClass('iosslider infinity').iosSlider({
            desktopClickDrag:true,
            keyboardControls:true,
            navNextSelector:$('.button_next'),
            navPrevSelector:$('.button_prev'),
            //responsiveSlideContainer: false,
            //responsiveSlides: false,
            infiniteSlider:true,
            snapToChildren:true,
            snapSlideCenter:true
        });
        car.find('.carousel_content').iosSlider('goToSlide', 2);
		var isiPad = navigator.userAgent.match(/iPad/i) != null;
		if(isiPad){
        	$('.carousel_content').iosSlider('update');
		}
    }
    car.find('.carousel_content').css('background', 'none');
    car.find('.carousel_items').fadeIn(500);
}

/* mainpage popup funtions */


function mpCarouselOpen(item) {
    //mpCarouselFastClose();

    var car = $('.mainpage_carousel');
    var car_items = car.find('.carousel_items');
    var view_width = $(window).width();

    /* close others */
    var open = car.find('.carousel_item.open');
    if (open.length) {
        open.removeClass('open');
        open.find('.carousel_item_content').hide().css({
            'display':'none',
            'width':'336px',
            'height':'360px',
            'margin':'0 0 0 -167px'
        });
        car.find('.carousel_item').removeClass('dimmed');

        if (!car.find('.carousel_content').hasClass('iosslider')) {
            if (car_items.offset().left != (($(window).width() - car_items.width()) / 2)) {
                car_items.stop().animate({left:0});
            }
        }
    }

    var popup = item.find('.carousel_item_content');
    popup.show().animate({
        'width':'805px',
        'height':'398px',
        'margin':'-20px 0 0 -402px'
    }, 400, 'easeOutQuint', function () {
        item.addClass('open');
    });
    car.find('.carousel_item').not(item).addClass('dimmed');
    car.find('.carousel_hand').hide();


    if (!car.find('.carousel_content').hasClass('infinity')) {
        var item_left = item.offset().left;
        var item_width = item.width();
        item_left = item_left - Math.round((805 - item_width) / 2);
        if (item_left < 0) {
            var offset = -item_left;
            car_items.stop().animate({left:'+=' + offset});
        } else if ((item_left + 805) > view_width) {
            var offset = -(view_width - (item_left + 805 + 8));
            car_items.stop().animate({left:'-=' + offset});
        }
    }

    $('body').bind('click', function (ele) {
        if (ele.target.parentNode.parentNode.className == 'carousel_item_link') {
            //return false;
        } else if (ele.target.className != 'carousel_item_link') {
            mpCarouselClose();
        }

    });
}

function mpCarouselClose() {
    $('body').unbind('click');

    var car = $('.mainpage_carousel');
    var open = car.find('.carousel_item.open');
    if (open.length) {
        open.find('.carousel_item_content').animate({
            'width':'336px',
            'height':'360px',
            'margin':'0 0 0 -167px'
        }, 300, 'easeInQuint', function () {
            open.removeClass('open');
            car.find('.carousel_item').removeClass('dimmed');
            if ($('.carousel_content').hasClass('iosslider')) car.find('.carousel_hand').show();
        });
        open.find('.carousel_item_content').fadeOut(100);
        var car_items = car.find('.carousel_items');
        if (!car.find('.carousel_content').hasClass('iosslider')) {
            if (car_items.offset().left != (($(window).width() - car_items.width()) / 2)) {
                car_items.stop().animate({left:0});
            }
        } else if (!car.find('.carousel_content').hasClass('infinity')) {
            if (open.is(':last-child')) {
                car_items.stop().animate({left:'+=240'});
            } else if (open.is(':first-child')) {
                car_items.stop().animate({left:'-=235'});
            }
        }
    }

    /*
     if (!car.hasClass('iosslider')) {
     var car_items = car.find('.carousel_items');
     if (car_items.offset().left != (($(window).width() - car_items.width()) / 2)) {
     if (car.find('.carousel_content').hasClass('iosslider')) {
     if (open.is(':last-child')) {
     car_items.stop().animate({left: '+=240'});
     }
     } else {
     car_items.stop().animate({left:0});
     }
     }
     }
     }
     */
}


/* brands carousel */

function brandsCarousel() {
    var car = $('.brands_carousel');
    var win_width = $(window).width();
    var carousel_width = 0;
    var item_width = 0;
    var margins = 2;
	var $carousel_items = $('.carousel_item',car);
	var carousel_item__width = $carousel_items.eq(0).width();
	var count__elements__on__window = Math.ceil(win_width/carousel_item__width);

    car.find('.carousel_item').each(function (e) {
        item_width = $(this).outerWidth() + margins;
        carousel_width += ($(this).outerWidth() + margins);
    });
    if (carousel_width <= win_width) {
        if (car.find('.carousel_content').hasClass('iosslider')) {
            car.find('.carousel_content').removeClass('iosslider').iosSlider('destroy');
        }
        car.find('.carousel_items').width(carousel_width).css('margin', '0 auto');
        car.find('.carousel_button').hide();
        car.css('background-position', 'center -100px');
		var $img = $carousel_items.find('.img');
		$img.each(function(){
			var $obj = $(this);
			$obj.attr('src',$obj.attr('data-src'));
		});
    } else {
        car.find('.carousel_content').addClass('iosslider').iosSlider({
            desktopClickDrag:true,
            keyboardControls:true,
            navNextSelector:$('.button_next'),
            navPrevSelector:$('.button_prev'),
            //responsiveSlideContainer: false,
            //responsiveSlides: false,
            //infiniteSlider: true,
            //snapToChildren: true,
            //snapSlideCenter: true,
			
			onSliderLoaded : function(args) {
				
				brandsCarouselLoadImages(args);
			},
			
            onSlideStart : function (args) {
                collapseBrands();
				
            },
			onSlideChange : function(args){
				brandsCarouselLoadImages(args);
			}
        });
        car.css('background-position', 'center bottom').find('.carousel_button').show();
    }
    car.find('.carousel_content').css('background', 'none');
    car.find('.carousel_items').fadeIn(500);
	function brandsCarouselLoadImages(args) {
		var cur = parseInt(args.currentSlideNumber)-1;
		 
		for(var i=cur,l=cur+count__elements__on__window; i<l; i+=1) {
			var $img = $carousel_items.eq(i).find('.img');
			$img.each(function(){
				var $obj = $(this);
				$obj.attr('src',$obj.attr('data-src'));
			});
		}
		
		
	}
}



function collapseBrands() {
    var car = $('.brands_carousel');
    var open = car.find('.carousel_item.open');
    var next = open.next();
    if (open.length) {
        open.find('.carousel_item_content').fadeOut(100, function () {
            open.removeClass('open');
            car.find('.carousel_item').removeClass('dimmed');
        });
        var car_items = car.find('.carousel_items');
        if (car_items.offset().left < (($(window).width() - car_items.width()) / 2)) {
            if (car.find('.carousel_content').hasClass('iosslider')) {
                if (open.is(':last-child')) car_items.stop().animate({left:'+=237'});
                else if (next.is(':last-child')) car_items.stop().animate({left:'+=64'});
            } else {
                car_items.stop().animate({left:0});
            }
        }
    }
    $('body').unbind('click');
}


/* news carousel */

function newsCarousel() {
    var car = $('.news_carousel');
    var win_width = $(window).width();
    var carousel_width = 0;
    var item_width = 0;
    var margins = 10;
    car.find('.carousel_item').each(function (e) {
        item_width = $(this).outerWidth() + margins;
        carousel_width += ($(this).outerWidth() + margins);
    });
    if (carousel_width <= win_width) {
        if (car.find('.carousel_content').hasClass('iosslider')) {
            car.find('.carousel_content').removeClass('iosslider').iosSlider('destroy');
        }
        car.find('.carousel_items').width(carousel_width).css('margin', '0 auto');
        car.find('.carousel_button').hide();
        car.css('background-position', 'center -100px');
    } else {
        car.find('.carousel_content').addClass('iosslider').iosSlider({
            desktopClickDrag:true,
            keyboardControls:true,
            navNextSelector:$('.button_next'),
            navPrevSelector:$('.button_prev'),
            //responsiveSlideContainer: false,
            //responsiveSlides: false,
            //infiniteSlider: true,
            //snapToChildren: true,
            //snapSlideCenter: true,
        });
        car.css('background-position', 'center bottom').find('.carousel_button').show();
    }
    car.find('.carousel_content').css('background', 'none');
    car.find('.carousel_items').fadeIn(500);
}


/* popup funtions */

function popupOpen(popup) {
    if (!popup) var popup = $('.popup');
    popup.show().find('.popup_close').hide();
    popupResize(popup);
    $('html').addClass('popup_open');
}

function popupResize(popup) {
    var popup_content = popup.find('.popup_data_wrapper div:first');
    var width = popup_content.outerWidth();
    var height = popup_content.height();
    var win_height = $(window).height() - 80;
    var padding = '20px';
    if (height > win_height) {
        height = win_height;
        width = width + 20;
        padding = '20px 0 20px 20px';
    } else {
        padding = '20px';
    }
    if (popup) {
        popup.find('.popup_data_wrapper').css('height', height);
        popup.find('.popup_close').hide();
        popup.find('.popup_content').animate({
            'width':width,
            'height':height,
            'padding':padding,
            'margin-left':-((width + 20) / 2),
            'margin-top':-((height + 40) / 2)
        }, 200, function () {
            popup.find('.popup_close').show();
        });
    }
    buildForm();
}

function popupClose(t) {
    t.parent().animate({
        'width':100,
        'height':100,
        'margin-left':-50,
        'margin-top':-50
    }, 100, function () {
        t.parent().parent().hide();
    });

    var wrapper = $('.popup_data_wrapper');
    if (wrapper) {
        wrapper.html('')
    }
    // remove hash
    if ($.browser.msie) window.location.hash = '';
    else history.pushState('', document.title, window.location.pathname);

    $('html').removeClass('popup_open');
}

function galleryPopupOpen(photoId, hrefClass) {
    var popup = $('.popup');
    var content = popup.find('.popup_content');
    var wrapper = popup.find('.popup_data_wrapper');
    var link = $('a.' + hrefClass + '[data-id=' + photoId + ']');
    var photo = link.attr('href');
    content.css('background-image', 'url(/img/layout/ajax-loader.gif)');
    if (photo) {
        var $facebook_like = '';
        if(hrefClass!='image_class'){
            $facebook_like='<div class="ib vm fb"><iframe src="//www.facebook.com/plugins/like.php?href='+link.data('url')+'&amp;send=false&amp;layout=button_count&amp;width=137&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:137px; height:21px;" allowTransparency="true">'+'</iframe></div>';

        }
        // adding photo
            wrapper.html('<div class="popup_photo_container"><img src="' + photo + '" alt="" style="opacity:0;">' +
                                '<div class="popup_social">' +
                                '<div class="ib vm">' + '<div id="vk_photo_like"></div></div>' +
                                '<div class="ib vm tw"><a href="https://twitter.com/share" class="twitter-share-button" data-url="' + document.location.href + '" data-text="Фотографии в ТРЦ Афимолл СИТИ" data-lang="ru">Твитнуть</a>' +
                                '</div>' +
                                 $facebook_like +
                                '</div></div>');


        var photo_container = wrapper.find('.popup_photo_container');

        popup.show().find('.popup_close').hide();

        // resize popup when image is loaded
        wrapper.find('img').load(function () {
            content.css('background-image', 'none');
            $(this).animate({'opacity':1}, 100);

            // add next & prev arrows
            var cur = $.inArray(photoId, gallery_items);
            var next = gallery_items[cur + 1];
            var prev = gallery_items[cur - 1];
            if (next) {
                photo_container.append('<a href="#" class="popup_nav_button button_next" data-id="' + next + '"></a>');
                photo_container.css('padding-right', '42px');
            }
            if (prev) {
                photo_container.append('<a href="#" class="popup_nav_button button_prev" data-id="' + prev + '"></a>');
                photo_container.css('padding-left', '42px');
            }
            photo_container.css('width', $(this).width());
            popupResize(popup);

        });
        wrapper.find('img').error(function () {
            popupResize(popup);

        });
    }

    $('html').addClass('popup_open');
    VK.Widgets.Like(
        "vk_photo_like",
        {
            type:"mini",
            height:20,
            pageTitle:"Фото в ТРЦ Афимолл СИТИ",
            pageUrl:document.location.href,
            pageImage:photo
        }
    );

    $.ajax({ url: 'http://platform.twitter.com/widgets.js', dataType: 'script', cache:true});

}

function galleryPopupClose(popup) {
    popup.find('.popup_content').animate({
        'width':100,
        'height':100,
        'margin-left':-50,
        'margin-top':-50
    }, 100, function () {
        popup.hide();
    });

    // remove hash
    if ($.browser.msie) window.location.hash = '';
    else history.pushState('', document.title, window.location.pathname);

    $('html').removeClass('popup_open');
}


/* map draggable */

function mapDraggable() {
    var view_height = $('.map_content').height();
    var view_width = $('.map_content').width();
    var max_top = 0;
    var max_left = 0;
    if ($('#map').hasClass('zoom_2')) {
        max_top = -(552 - view_height);
        max_left = -(1882 - view_width);
    } else if ($('#map').hasClass('zoom_3')) {
        max_top = -(827 - view_height);
        max_left = -(2823 - view_width);
    }
    $('#levels').draggable({
        scroll:false,
        drag:function (event, ui) {
            var cur = $('#map .box.current');//.not('.active');
            if (cur.length) {
                cur.each(function () {
                    var cur_id = parseInt($(this).attr('id').replace('box_', ''));
                    deselectBox($(this), cur_id);
                });
            }
            if (ui.position.top > 0) {
                ui.position.top = 0;
            } else if (ui.position.top < max_top) {
                ui.position.top = max_top;
            }
            if (ui.position.left > 0) {
                ui.position.left = 0;
            } else if (ui.position.left < max_left) {
                ui.position.left = max_left;
            }
            /*
             if ($('.map_tooltip').length) {
             $('.map_tooltip').css({
             'left' : $('.map_tooltip').data('coords').x + ui.position.left,
             'top' : $('.map_tooltip').data('coords').y + ui.position.top
             });
             }
             */
        }
    });
}

function mapDraggableDestroy() {
    if ($('.ui-draggable').length) {
        $('.ui-draggable').css({
            'left':0,
            'top':0
        }).draggable('destroy');
    }
}

/* select map area */

function selectBox(id, active) {
    if ($('.map_tooltip').length) $('.map_tooltip').not('#map_tooltip_' + id).fadeOut(100).remove();
    if ($('#tooltip').length) $('#tooltip').fadeOut(100).remove();
    var ele = $('#box_' + id);
    if (ele.length) {
        toggleHighlight(ele, true);
        showMapTooltip(ele);
        ele.addClass('current');
        if (active) {
            ele.addClass('active');
        }
        $('body').not('.brand_page').bind('click', function (event) {
            if (event.target.nodeName != 'AREA') deselectBox(ele, id);
        });
    }
}

/* deselect map area */

function deselectBox(a, id) {
    if (a && id) {
        $('#map_tooltip_' + id).fadeOut(100).remove();
        if (a.hasClass('active')) return false;

        toggleHighlight(a, false);
        a.removeClass('current');
        if (location.hash != '') {
            if ($.browser.msie) window.location.hash = '?';
            else history.pushState('', document.title, window.location.pathname);
            //history.pushState(null, document.title, window.location.pathname);
        }
        $('body').unbind('click');
    }
}

/* highlight map area */

function toggleHighlight(ele, o, color) {
    data = ele.data('maphilight') || {};
    data.alwaysOn = o;
    if (color) {
        if (color != 'old') {
            var old_color = data.fillColor;
            data.fillTrueColor = old_color;
            data.fillColor = color;
        } else {
            data.fillColor = data.fillTrueColor;
            delete data['fillTrueColor'];
        }
    }
    ele.data('maphilight', data).trigger('alwaysOn.maphilight');
}


/* map tooltip */

function showMapTooltip(a) {
    if (a) {
        // параметры выбранного блока
        var coords = getAreaCorners(a.attr('coords'));
        var area = {'width':0, 'height':0, 'x':0, 'y':0};
        area.x = coords[0];
        area.y = coords[2];
        area.width = coords[1] - coords[0];
        area.height = coords[3] - coords[2];

        // параметры всей карты
        var map = {'width':0, 'height':0, 'x':0, 'y':0};
        var map_obj = $('.map_img');
        map.x = map_obj.offset().left;
        map.y = map_obj.offset().top;
        map.width = map_obj.width();
        map.height = map_obj.height();

        // параметры видимой области
        var map_area = {'width':0, 'height':0, 'x':0, 'y':0};
        var map_area_obj = $('.map_content');
        map_area.x = map_area_obj.offset().left;
        map_area.y = map_area_obj.offset().top;
        map_area.width = map_area_obj.width();
        map_area.height = map_area_obj.height();

        map.x -= map_area.x;
        map.y -= map_area.y;


        var tooltip = {'width':0, 'height':0, 'x':0, 'y':0};
        tooltip.x = map_area.x + area.x + map.x + parseInt(area.width / 2, 10);
        tooltip.y = map_area.y + area.y + map.y;

        var tooltip_vert_margin = -5;


        var id = a.attr('id').replace('box_', '');
        var data = a.data('brand');
        $('body').append('<div class="map_tooltip" id="map_tooltip_' + id + '"><a href="' + data.url + '"><span class="txt"><b>' + data.title + '</b><br/><span class="lnk">Подробнее</span></span></a></div>');
        var tooltip_obj = $('#map_tooltip_' + id);

        if (data.img != '') {
            tooltip_obj.find('img').load(function () {
                tooltip.width = tooltip_obj.outerWidth();
                tooltip.height = tooltip_obj.outerHeight();
                tooltip.x = tooltip.x - Math.round(tooltip.width / 2, 10);
                tooltip.y = tooltip.y - (tooltip.height + tooltip_vert_margin);
                tooltip_obj.css({
                    'top':tooltip.y,
                    'left':tooltip.x
                }).fadeIn(200);

                mapScrollTo(tooltip, area, map, map_area);
            });
        } else {
            tooltip_obj.find('img').remove();
            tooltip.width = tooltip_obj.outerWidth();
            tooltip.height = tooltip_obj.outerHeight();
            tooltip.x = tooltip.x - Math.round(tooltip.width / 2, 10);
            tooltip.y = tooltip.y - (tooltip.height + tooltip_vert_margin);
            tooltip_obj.css({
                'top':tooltip.y,
                'left':tooltip.x
            }).fadeIn(200);

            mapScrollTo(tooltip, area, map, map_area);
        }

    }
}

function mapScrollTo(tooltip, area, map, map_area) {
    if (!$('#map').hasClass('zoom_1')) {

        var tooltip_vert_margin = 20;
        var scroll_x = map.x;
        var scroll_y = map.y;

        tooltip.x = tooltip.x - map_area.x - map.x;
        tooltip.y = tooltip.y - map_area.y - map.y;

        var must_be_seen_area = {'width':0, 'height':0, 'x':0, 'y':tooltip.y + 4};
        must_be_seen_area.x = area.x - 4 < tooltip.x ? area.x - 4 : tooltip.x;
        must_be_seen_area.width = area.width + 8 > tooltip.width ? area.width + 8 : tooltip.width;
        must_be_seen_area.height = tooltip.height + tooltip_vert_margin + area.height;


        if (must_be_seen_area.x < -(map.x)) scroll_x = -must_be_seen_area.x;
        else if ((must_be_seen_area.x + must_be_seen_area.width) > (map_area.width - map.x)) {
            scroll_x = map_area.width - (must_be_seen_area.x + must_be_seen_area.width);
        }
        if (must_be_seen_area.y < -(map.y) || (must_be_seen_area.height > map_area.height)) scroll_y = -must_be_seen_area.y;
        else if ((must_be_seen_area.y + must_be_seen_area.height) > (map_area.height - map.y)) {
            scroll_y = map_area.height - (must_be_seen_area.y + must_be_seen_area.height);
        }

        if (scroll_x > 0) scroll_x = 0;
        if (scroll_y > 0) scroll_y = 0;

        $('#levels').animate({
            'left':scroll_x,
            'top':scroll_y
        }, 'fast');
        if ($('.map_tooltip').length) {
            $('.map_tooltip').css({
                'left':'-=' + (map.x - scroll_x),
                'top':'-=' + (map.y - scroll_y)
            });
        }
    }
}



function getAreaCenter(coords) {
    var coordsArray = coords.split(','),
        center = [];
    // For rect and poly areas we need to loop through the coordinates
    var coord,
        minX = maxX = parseInt(coordsArray[0], 10),
        minY = maxY = parseInt(coordsArray[1], 10);
    for (var i = 0, l = coordsArray.length; i < l; i++) {
        coord = parseInt(coordsArray[i], 10);
        if (i % 2 == 0) { // Even values are X coordinates
            if (coord < minX) {
                minX = coord;
            } else if (coord > maxX) {
                maxX = coord;
            }
        } else { // Odd values are Y coordinates
            if (coord < minY) {
                minY = coord;
            } else if (coord > maxY) {
                maxY = coord;
            }
        }
    }
    center = [parseInt((minX + maxX) / 2, 10), parseInt(minY)];
    return(center);
}

function getAreaCorners(coords) {
    var coordsArray = coords.split(','),
        center = [];
    // For rect and poly areas we need to loop through the coordinates
    var coord,
        minX = maxX = parseInt(coordsArray[0], 10),
        minY = maxY = parseInt(coordsArray[1], 10);
    for (var i = 0, l = coordsArray.length; i < l; i++) {
        coord = parseInt(coordsArray[i], 10);
        if (i % 2 == 0) { // Even values are X coordinates
            if (coord < minX) {
                minX = coord;
            }
            if (coord > maxX) {
                maxX = coord;
            }
        } else { // Odd values are Y coordinates
            if (coord < minY) {
                minY = coord;
            }
            if (coord > maxY) {
                maxY = coord;
            }
        }
    }
    //center = [parseInt((minX + maxX) / 2, 10), parseInt((minY + maxY) / 2, 10)];
    center = [minX, maxX, minY, maxY];
    return(center);
}


/* timer for window resizing */

var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();


/* rgb to hex convertion for ie9 */

function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }

    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}
