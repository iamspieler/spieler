/*!
 * Bootstrap-select v1.6.2 (http://silviomoreto.github.io/bootstrap-select/)
 *
 * Copyright 2013-2014 bootstrap-select
 * Licensed under MIT (https://github.com/silviomoreto/bootstrap-select/blob/master/LICENSE)
 */
!function(a){"use strict";function b(a,b){return a.toUpperCase().indexOf(b.toUpperCase())>-1}function c(b){var c=[{re:/[\xC0-\xC6]/g,ch:"A"},{re:/[\xE0-\xE6]/g,ch:"a"},{re:/[\xC8-\xCB]/g,ch:"E"},{re:/[\xE8-\xEB]/g,ch:"e"},{re:/[\xCC-\xCF]/g,ch:"I"},{re:/[\xEC-\xEF]/g,ch:"i"},{re:/[\xD2-\xD6]/g,ch:"O"},{re:/[\xF2-\xF6]/g,ch:"o"},{re:/[\xD9-\xDC]/g,ch:"U"},{re:/[\xF9-\xFC]/g,ch:"u"},{re:/[\xC7-\xE7]/g,ch:"c"},{re:/[\xD1]/g,ch:"N"},{re:/[\xF1]/g,ch:"n"}];return a.each(c,function(){b=b.replace(this.re,this.ch)}),b}function d(b,c){var d=arguments,f=b,b=d[0],c=d[1];[].shift.apply(d),"undefined"==typeof b&&(b=f);var g,h=this.each(function(){var f=a(this);if(f.is("select")){var h=f.data("selectpicker"),i="object"==typeof b&&b;if(h){if(i)for(var j in i)i.hasOwnProperty(j)&&(h.options[j]=i[j])}else{var k=a.extend({},e.DEFAULTS,a.fn.selectpicker.defaults||{},f.data(),i);f.data("selectpicker",h=new e(this,k,c))}"string"==typeof b&&(g=h[b]instanceof Function?h[b].apply(h,d):h.options[b])}});return"undefined"!=typeof g?g:h}a.expr[":"].icontains=function(c,d,e){return b(a(c).text(),e[3])},a.expr[":"].aicontains=function(c,d,e){return b(a(c).data("normalizedText")||a(c).text(),e[3])};var e=function(b,c,d){d&&(d.stopPropagation(),d.preventDefault()),this.$element=a(b),this.$newElement=null,this.$button=null,this.$menu=null,this.$lis=null,this.options=c,null===this.options.title&&(this.options.title=this.$element.attr("title")),this.val=e.prototype.val,this.render=e.prototype.render,this.refresh=e.prototype.refresh,this.setStyle=e.prototype.setStyle,this.selectAll=e.prototype.selectAll,this.deselectAll=e.prototype.deselectAll,this.destroy=e.prototype.remove,this.remove=e.prototype.remove,this.show=e.prototype.show,this.hide=e.prototype.hide,this.init()};e.VERSION="1.6.2",e.DEFAULTS={noneSelectedText:"Nothing selected",noneResultsText:"No results match",countSelectedText:function(a){return 1==a?"{0} item selected":"{0} items selected"},maxOptionsText:function(a,b){var c=[];return c[0]=1==a?"Limit reached ({n} item max)":"Limit reached ({n} items max)",c[1]=1==b?"Group limit reached ({n} item max)":"Group limit reached ({n} items max)",c},selectAllText:"Select All",deselectAllText:"Deselect All",multipleSeparator:", ",style:"btn-default",size:"auto",title:null,selectedTextFormat:"values",width:!1,container:!1,hideDisabled:!1,showSubtext:!1,showIcon:!0,showContent:!0,dropupAuto:!0,header:!1,liveSearch:!1,actionsBox:!1,iconBase:"glyphicon",tickIcon:"glyphicon-ok",maxOptions:!1,mobile:!1,selectOnTab:!1,dropdownAlignRight:!1,searchAccentInsensitive:!1},e.prototype={constructor:e,init:function(){var b=this,c=this.$element.attr("id");this.$element.hide(),this.multiple=this.$element.prop("multiple"),this.autofocus=this.$element.prop("autofocus"),this.$newElement=this.createView(),this.$element.after(this.$newElement),this.$menu=this.$newElement.find("> .dropdown-menu"),this.$button=this.$newElement.find("> button"),this.$searchbox=this.$newElement.find("input"),this.options.dropdownAlignRight&&this.$menu.addClass("dropdown-menu-right"),"undefined"!=typeof c&&(this.$button.attr("data-id",c),a('label[for="'+c+'"]').click(function(a){a.preventDefault(),b.$button.focus()})),this.checkDisabled(),this.clickListener(),this.options.liveSearch&&this.liveSearchListener(),this.render(),this.liHeight(),this.setStyle(),this.setWidth(),this.options.container&&this.selectPosition(),this.$menu.data("this",this),this.$newElement.data("this",this),this.options.mobile&&this.mobile()},createDropdown:function(){var b=this.multiple?" show-tick":"",c=this.$element.parent().hasClass("input-group")?" input-group-btn":"",d=this.autofocus?" autofocus":"",e=this.$element.parents().hasClass("form-group-lg")?" btn-lg":this.$element.parents().hasClass("form-group-sm")?" btn-sm":"",f=this.options.header?'<div class="popover-title"><button type="button" class="close" aria-hidden="true">&times;</button>'+this.options.header+"</div>":"",g=this.options.liveSearch?'<div class="bs-searchbox"><input type="text" class="input-block-level form-control" autocomplete="off" /></div>':"",h=this.options.actionsBox?'<div class="bs-actionsbox"><div class="btn-group btn-block"><button class="actions-btn bs-select-all btn btn-sm btn-default">'+this.options.selectAllText+'</button><button class="actions-btn bs-deselect-all btn btn-sm btn-default">'+this.options.deselectAllText+"</button></div></div>":"",i='<div class="btn-group bootstrap-select'+b+c+'"><button type="button" class="btn dropdown-toggle selectpicker'+e+'" data-toggle="dropdown"'+d+'><span class="filter-option pull-left"></span>&nbsp;<span class="caret"></span></button><div class="dropdown-menu open">'+f+g+h+'<ul class="dropdown-menu inner selectpicker" role="menu"></ul></div></div>';return a(i)},createView:function(){var a=this.createDropdown(),b=this.createLi();return a.find("ul").append(b),a},reloadLi:function(){this.destroyLi();var a=this.createLi();this.$menu.find("ul").append(a)},destroyLi:function(){this.$menu.find("li").remove()},createLi:function(){var b=this,d=[],e=0,f=function(a,b,c){return"<li"+("undefined"!=typeof c?' class="'+c+'"':"")+("undefined"!=typeof b|null===b?' data-original-index="'+b+'"':"")+">"+a+"</li>"},g=function(d,e,f,g){var h=c(a.trim(a("<div/>").html(d).text()).replace(/\s\s+/g," "));return'<a tabindex="0"'+("undefined"!=typeof e?' class="'+e+'"':"")+("undefined"!=typeof f?' style="'+f+'"':"")+("undefined"!=typeof g?'data-optgroup="'+g+'"':"")+' data-normalized-text="'+h+'">'+d+'<span class="'+b.options.iconBase+" "+b.options.tickIcon+' icon-ok check-mark"></span></a>'};return this.$element.find("option").each(function(){var c=a(this),h=c.attr("class")||"",i=c.attr("style"),j=c.data("content")?c.data("content"):c.html(),k="undefined"!=typeof c.data("subtext")?'<small class="muted text-muted">'+c.data("subtext")+"</small>":"",l="undefined"!=typeof c.data("icon")?'<span class="'+b.options.iconBase+" "+c.data("icon")+'"></span> ':"",m=c.is(":disabled")||c.parent().is(":disabled"),n=c[0].index;if(""!==l&&m&&(l="<span>"+l+"</span>"),c.data("content")||(j=l+'<span class="text">'+j+k+"</span>"),!b.options.hideDisabled||!m)if(c.parent().is("optgroup")&&c.data("divider")!==!0){if(0===c.index()){e+=1;var o=c.parent().attr("label"),p="undefined"!=typeof c.parent().data("subtext")?'<small class="muted text-muted">'+c.parent().data("subtext")+"</small>":"",q=c.parent().data("icon")?'<span class="'+b.options.iconBase+" "+c.parent().data("icon")+'"></span> ':"";o=q+'<span class="text">'+o+p+"</span>",0!==n&&d.length>0&&d.push(f("",null,"divider")),d.push(f(o,null,"dropdown-header"))}d.push(f(g(j,"opt "+h,i,e),n))}else d.push(c.data("divider")===!0?f("",n,"divider"):c.data("hidden")===!0?f(g(j,h,i),n,"hide is-hidden"):f(g(j,h,i),n))}),this.multiple||0!==this.$element.find("option:selected").length||this.options.title||this.$element.find("option").eq(0).prop("selected",!0).attr("selected","selected"),a(d.join(""))},findLis:function(){return null==this.$lis&&(this.$lis=this.$menu.find("li")),this.$lis},render:function(b){var c=this;b!==!1&&this.$element.find("option").each(function(b){c.setDisabled(b,a(this).is(":disabled")||a(this).parent().is(":disabled")),c.setSelected(b,a(this).is(":selected"))}),this.tabIndex();var d=this.options.hideDisabled?":not([disabled])":"",e=this.$element.find("option:selected"+d).map(function(){var b,d=a(this),e=d.data("icon")&&c.options.showIcon?'<i class="'+c.options.iconBase+" "+d.data("icon")+'"></i> ':"";return b=c.options.showSubtext&&d.attr("data-subtext")&&!c.multiple?' <small class="muted text-muted">'+d.data("subtext")+"</small>":"",d.data("content")&&c.options.showContent?d.data("content"):"undefined"!=typeof d.attr("title")?d.attr("title"):e+d.html()+b}).toArray(),f=this.multiple?e.join(this.options.multipleSeparator):e[0];if(this.multiple&&this.options.selectedTextFormat.indexOf("count")>-1){var g=this.options.selectedTextFormat.split(">");if(g.length>1&&e.length>g[1]||1==g.length&&e.length>=2){d=this.options.hideDisabled?", [disabled]":"";var h=this.$element.find("option").not('[data-divider="true"], [data-hidden="true"]'+d).length,i="function"==typeof this.options.countSelectedText?this.options.countSelectedText(e.length,h):this.options.countSelectedText;f=i.replace("{0}",e.length.toString()).replace("{1}",h.toString())}}this.options.title=this.$element.attr("title"),"static"==this.options.selectedTextFormat&&(f=this.options.title),f||(f="undefined"!=typeof this.options.title?this.options.title:this.options.noneSelectedText),this.$button.attr("title",a.trim(a("<div/>").html(f).text()).replace(/\s\s+/g," ")),this.$newElement.find(".filter-option").html(f)},setStyle:function(a,b){this.$element.attr("class")&&this.$newElement.addClass(this.$element.attr("class").replace(/selectpicker|mobile-device|validate\[.*\]/gi,""));var c=a?a:this.options.style;"add"==b?this.$button.addClass(c):"remove"==b?this.$button.removeClass(c):(this.$button.removeClass(this.options.style),this.$button.addClass(c))},liHeight:function(){if(this.options.size!==!1){var a=this.$menu.parent().clone().find("> .dropdown-toggle").prop("autofocus",!1).end().appendTo("body"),b=a.addClass("open").find("> .dropdown-menu"),c=b.find("li").not(".divider").not(".dropdown-header").filter(":visible").children("a").outerHeight(),d=this.options.header?b.find(".popover-title").outerHeight():0,e=this.options.liveSearch?b.find(".bs-searchbox").outerHeight():0,f=this.options.actionsBox?b.find(".bs-actionsbox").outerHeight():0;a.remove(),this.$newElement.data("liHeight",c).data("headerHeight",d).data("searchHeight",e).data("actionsHeight",f)}},setSize:function(){this.findLis();var b,c,d,e=this,f=this.$menu,g=f.find(".inner"),h=this.$newElement.outerHeight(),i=this.$newElement.data("liHeight"),j=this.$newElement.data("headerHeight"),k=this.$newElement.data("searchHeight"),l=this.$newElement.data("actionsHeight"),m=this.$lis.filter(".divider").outerHeight(!0),n=parseInt(f.css("padding-top"))+parseInt(f.css("padding-bottom"))+parseInt(f.css("border-top-width"))+parseInt(f.css("border-bottom-width")),o=this.options.hideDisabled?", .disabled":"",p=a(window),q=n+parseInt(f.css("margin-top"))+parseInt(f.css("margin-bottom"))+2,r=function(){c=e.$newElement.offset().top-p.scrollTop(),d=p.height()-c-h};if(r(),this.options.header&&f.css("padding-top",0),"auto"==this.options.size){var s=function(){var a,h=e.$lis.not(".hide");r(),b=d-q,e.options.dropupAuto&&e.$newElement.toggleClass("dropup",c>d&&b-q<f.height()),e.$newElement.hasClass("dropup")&&(b=c-q),a=h.length+h.filter(".dropdown-header").length>3?3*i+q-2:0,f.css({"max-height":b+"px",overflow:"hidden","min-height":a+j+k+l+"px"}),g.css({"max-height":b-j-k-l-n+"px","overflow-y":"auto","min-height":Math.max(a-n,0)+"px"})};s(),this.$searchbox.off("input.getSize propertychange.getSize").on("input.getSize propertychange.getSize",s),a(window).off("resize.getSize").on("resize.getSize",s),a(window).off("scroll.getSize").on("scroll.getSize",s)}else if(this.options.size&&"auto"!=this.options.size&&f.find("li"+o).length>this.options.size){var t=this.$lis.not(".divider"+o).find(" > *").slice(0,this.options.size).last().parent().index(),u=this.$lis.slice(0,t+1).filter(".divider").length;b=i*this.options.size+u*m+n,e.options.dropupAuto&&this.$newElement.toggleClass("dropup",c>d&&b<f.height()),f.css({"max-height":b+j+k+l+"px",overflow:"hidden"}),g.css({"max-height":b-n+"px","overflow-y":"auto"})}},setWidth:function(){if("auto"==this.options.width){this.$menu.css("min-width","0");var a=this.$newElement.clone().appendTo("body"),b=a.find("> .dropdown-menu").css("width"),c=a.css("width","auto").find("> button").css("width");a.remove(),this.$newElement.css("width",Math.max(parseInt(b),parseInt(c))+"px")}else"fit"==this.options.width?(this.$menu.css("min-width",""),this.$newElement.css("width","").addClass("fit-width")):this.options.width?(this.$menu.css("min-width",""),this.$newElement.css("width",this.options.width)):(this.$menu.css("min-width",""),this.$newElement.css("width",""));this.$newElement.hasClass("fit-width")&&"fit"!==this.options.width&&this.$newElement.removeClass("fit-width")},selectPosition:function(){var b,c,d=this,e="<div />",f=a(e),g=function(a){f.addClass(a.attr("class").replace(/form-control/gi,"")).toggleClass("dropup",a.hasClass("dropup")),b=a.offset(),c=a.hasClass("dropup")?0:a[0].offsetHeight,f.css({top:b.top+c,left:b.left,width:a[0].offsetWidth,position:"absolute"})};this.$newElement.on("click",function(){d.isDisabled()||(g(a(this)),f.appendTo(d.options.container),f.toggleClass("open",!a(this).hasClass("open")),f.append(d.$menu))}),a(window).resize(function(){g(d.$newElement)}),a(window).on("scroll",function(){g(d.$newElement)}),a("html").on("click",function(b){a(b.target).closest(d.$newElement).length<1&&f.removeClass("open")})},setSelected:function(a,b){this.findLis(),this.$lis.filter('[data-original-index="'+a+'"]').toggleClass("selected",b)},setDisabled:function(a,b){this.findLis(),b?this.$lis.filter('[data-original-index="'+a+'"]').addClass("disabled").find("a").attr("href","#").attr("tabindex",-1):this.$lis.filter('[data-original-index="'+a+'"]').removeClass("disabled").find("a").removeAttr("href").attr("tabindex",0)},isDisabled:function(){return this.$element.is(":disabled")},checkDisabled:function(){var a=this;this.isDisabled()?this.$button.addClass("disabled").attr("tabindex",-1):(this.$button.hasClass("disabled")&&this.$button.removeClass("disabled"),-1==this.$button.attr("tabindex")&&(this.$element.data("tabindex")||this.$button.removeAttr("tabindex"))),this.$button.click(function(){return!a.isDisabled()})},tabIndex:function(){this.$element.is("[tabindex]")&&(this.$element.data("tabindex",this.$element.attr("tabindex")),this.$button.attr("tabindex",this.$element.data("tabindex")))},clickListener:function(){var b=this;this.$newElement.on("touchstart.dropdown",".dropdown-menu",function(a){a.stopPropagation()}),this.$newElement.on("click",function(){b.setSize(),b.options.liveSearch||b.multiple||setTimeout(function(){b.$menu.find(".selected a").focus()},10)}),this.$menu.on("click","li a",function(c){var d=a(this),e=d.parent().data("originalIndex"),f=b.$element.val(),g=b.$element.prop("selectedIndex");if(b.multiple&&c.stopPropagation(),c.preventDefault(),!b.isDisabled()&&!d.parent().hasClass("disabled")){var h=b.$element.find("option"),i=h.eq(e),j=i.prop("selected"),k=i.parent("optgroup"),l=b.options.maxOptions,m=k.data("maxOptions")||!1;if(b.multiple){if(i.prop("selected",!j),b.setSelected(e,!j),d.blur(),l!==!1||m!==!1){var n=l<h.filter(":selected").length,o=m<k.find("option:selected").length;if(l&&n||m&&o)if(l&&1==l)h.prop("selected",!1),i.prop("selected",!0),b.$menu.find(".selected").removeClass("selected"),b.setSelected(e,!0);else if(m&&1==m){k.find("option:selected").prop("selected",!1),i.prop("selected",!0);var p=d.data("optgroup");b.$menu.find(".selected").has('a[data-optgroup="'+p+'"]').removeClass("selected"),b.setSelected(e,!0)}else{var q="function"==typeof b.options.maxOptionsText?b.options.maxOptionsText(l,m):b.options.maxOptionsText,r=q[0].replace("{n}",l),s=q[1].replace("{n}",m),t=a('<div class="notify"></div>');q[2]&&(r=r.replace("{var}",q[2][l>1?0:1]),s=s.replace("{var}",q[2][m>1?0:1])),i.prop("selected",!1),b.$menu.append(t),l&&n&&(t.append(a("<div>"+r+"</div>")),b.$element.trigger("maxReached.bs.select")),m&&o&&(t.append(a("<div>"+s+"</div>")),b.$element.trigger("maxReachedGrp.bs.select")),setTimeout(function(){b.setSelected(e,!1)},10),t.delay(750).fadeOut(300,function(){a(this).remove()})}}}else h.prop("selected",!1),i.prop("selected",!0),b.$menu.find(".selected").removeClass("selected"),b.setSelected(e,!0);b.multiple?b.options.liveSearch&&b.$searchbox.focus():b.$button.focus(),(f!=b.$element.val()&&b.multiple||g!=b.$element.prop("selectedIndex")&&!b.multiple)&&b.$element.change()}}),this.$menu.on("click","li.disabled a, .popover-title, .popover-title :not(.close)",function(a){a.target==this&&(a.preventDefault(),a.stopPropagation(),b.options.liveSearch?b.$searchbox.focus():b.$button.focus())}),this.$menu.on("click","li.divider, li.dropdown-header",function(a){a.preventDefault(),a.stopPropagation(),b.options.liveSearch?b.$searchbox.focus():b.$button.focus()}),this.$menu.on("click",".popover-title .close",function(){b.$button.focus()}),this.$searchbox.on("click",function(a){a.stopPropagation()}),this.$menu.on("click",".actions-btn",function(c){b.options.liveSearch?b.$searchbox.focus():b.$button.focus(),c.preventDefault(),c.stopPropagation(),a(this).is(".bs-select-all")?b.selectAll():b.deselectAll(),b.$element.change()}),this.$element.change(function(){b.render(!1)})},liveSearchListener:function(){var b=this,d=a('<li class="no-results"></li>');this.$newElement.on("click.dropdown.data-api",function(){b.$menu.find(".active").removeClass("active"),b.$searchbox.val()&&(b.$searchbox.val(""),b.$lis.not(".is-hidden").removeClass("hide"),d.parent().length&&d.remove()),b.multiple||b.$menu.find(".selected").addClass("active"),setTimeout(function(){b.$searchbox.focus()},10)}),this.$searchbox.on("input propertychange",function(){b.$searchbox.val()?(b.options.searchAccentInsensitive?b.$lis.not(".is-hidden").removeClass("hide").find("a").not(":aicontains("+c(b.$searchbox.val())+")").parent().addClass("hide"):b.$lis.not(".is-hidden").removeClass("hide").find("a").not(":icontains("+b.$searchbox.val()+")").parent().addClass("hide"),b.$menu.find("li").filter(":visible:not(.no-results)").length?d.parent().length&&d.remove():(d.parent().length&&d.remove(),d.html(b.options.noneResultsText+' "'+b.$searchbox.val()+'"').show(),b.$menu.find("li").last().after(d))):(b.$lis.not(".is-hidden").removeClass("hide"),d.parent().length&&d.remove()),b.$menu.find("li.active").removeClass("active"),b.$menu.find("li").filter(":visible:not(.divider)").eq(0).addClass("active").find("a").focus(),a(this).focus()}),this.$menu.on("mouseenter","a",function(c){b.$menu.find(".active").removeClass("active"),a(c.currentTarget).parent().not(".disabled").addClass("active")}),this.$menu.on("mouseleave","a",function(){b.$menu.find(".active").removeClass("active")})},val:function(a){return"undefined"!=typeof a?(this.$element.val(a),this.render(),this.$element):this.$element.val()},selectAll:function(){this.findLis(),this.$lis.not(".divider").not(".disabled").not(".selected").filter(":visible").find("a").click()},deselectAll:function(){this.findLis(),this.$lis.not(".divider").not(".disabled").filter(".selected").filter(":visible").find("a").click()},keydown:function(b){var d,e,f,g,h,i,j,k,l,m,n,o,p={32:" ",48:"0",49:"1",50:"2",51:"3",52:"4",53:"5",54:"6",55:"7",56:"8",57:"9",59:";",65:"a",66:"b",67:"c",68:"d",69:"e",70:"f",71:"g",72:"h",73:"i",74:"j",75:"k",76:"l",77:"m",78:"n",79:"o",80:"p",81:"q",82:"r",83:"s",84:"t",85:"u",86:"v",87:"w",88:"x",89:"y",90:"z",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9"};if(d=a(this),f=d.parent(),d.is("input")&&(f=d.parent().parent()),m=f.data("this"),m.options.liveSearch&&(f=d.parent().parent()),m.options.container&&(f=m.$menu),e=a("[role=menu] li a",f),o=m.$menu.parent().hasClass("open"),!o&&/([0-9]|[A-z])/.test(String.fromCharCode(b.keyCode))&&(m.options.container?m.$newElement.trigger("click"):(m.setSize(),m.$menu.parent().addClass("open"),o=!0),m.$searchbox.focus()),m.options.liveSearch&&(/(^9$|27)/.test(b.keyCode.toString(10))&&o&&0===m.$menu.find(".active").length&&(b.preventDefault(),m.$menu.parent().removeClass("open"),m.$button.focus()),e=a("[role=menu] li:not(.divider):not(.dropdown-header):visible",f),d.val()||/(38|40)/.test(b.keyCode.toString(10))||0===e.filter(".active").length&&(e=m.$newElement.find("li").filter(m.options.searchAccentInsensitive?":aicontains("+c(p[b.keyCode])+")":":icontains("+p[b.keyCode]+")"))),e.length){if(/(38|40)/.test(b.keyCode.toString(10)))g=e.index(e.filter(":focus")),i=e.parent(":not(.disabled):visible").first().index(),j=e.parent(":not(.disabled):visible").last().index(),h=e.eq(g).parent().nextAll(":not(.disabled):visible").eq(0).index(),k=e.eq(g).parent().prevAll(":not(.disabled):visible").eq(0).index(),l=e.eq(h).parent().prevAll(":not(.disabled):visible").eq(0).index(),m.options.liveSearch&&(e.each(function(b){a(this).is(":not(.disabled)")&&a(this).data("index",b)}),g=e.index(e.filter(".active")),i=e.filter(":not(.disabled):visible").first().data("index"),j=e.filter(":not(.disabled):visible").last().data("index"),h=e.eq(g).nextAll(":not(.disabled):visible").eq(0).data("index"),k=e.eq(g).prevAll(":not(.disabled):visible").eq(0).data("index"),l=e.eq(h).prevAll(":not(.disabled):visible").eq(0).data("index")),n=d.data("prevIndex"),38==b.keyCode&&(m.options.liveSearch&&(g-=1),g!=l&&g>k&&(g=k),i>g&&(g=i),g==n&&(g=j)),40==b.keyCode&&(m.options.liveSearch&&(g+=1),-1==g&&(g=0),g!=l&&h>g&&(g=h),g>j&&(g=j),g==n&&(g=i)),d.data("prevIndex",g),m.options.liveSearch?(b.preventDefault(),d.is(".dropdown-toggle")||(e.removeClass("active"),e.eq(g).addClass("active").find("a").focus(),d.focus())):e.eq(g).focus();else if(!d.is("input")){var q,r,s=[];e.each(function(){a(this).parent().is(":not(.disabled)")&&a.trim(a(this).text().toLowerCase()).substring(0,1)==p[b.keyCode]&&s.push(a(this).parent().index())}),q=a(document).data("keycount"),q++,a(document).data("keycount",q),r=a.trim(a(":focus").text().toLowerCase()).substring(0,1),r!=p[b.keyCode]?(q=1,a(document).data("keycount",q)):q>=s.length&&(a(document).data("keycount",0),q>s.length&&(q=1)),e.eq(s[q-1]).focus()}(/(13|32)/.test(b.keyCode.toString(10))||/(^9$)/.test(b.keyCode.toString(10))&&m.options.selectOnTab)&&o&&(/(32)/.test(b.keyCode.toString(10))||b.preventDefault(),m.options.liveSearch?/(32)/.test(b.keyCode.toString(10))||(m.$menu.find(".active a").click(),d.focus()):a(":focus").click(),a(document).data("keycount",0)),(/(^9$|27)/.test(b.keyCode.toString(10))&&o&&(m.multiple||m.options.liveSearch)||/(27)/.test(b.keyCode.toString(10))&&!o)&&(m.$menu.parent().removeClass("open"),m.$button.focus())}},mobile:function(){this.$element.addClass("mobile-device").appendTo(this.$newElement),this.options.container&&this.$menu.hide()},refresh:function(){this.$lis=null,this.reloadLi(),this.render(),this.setWidth(),this.setStyle(),this.checkDisabled(),this.liHeight()},update:function(){this.reloadLi(),this.setWidth(),this.setStyle(),this.checkDisabled(),this.liHeight()},hide:function(){this.$newElement.hide()},show:function(){this.$newElement.show()},remove:function(){this.$newElement.remove(),this.$element.remove()}};var f=a.fn.selectpicker;a.fn.selectpicker=d,a.fn.selectpicker.Constructor=e,a.fn.selectpicker.noConflict=function(){return a.fn.selectpicker=f,this},a(document).data("keycount",0).on("keydown",".bootstrap-select [data-toggle=dropdown], .bootstrap-select [role=menu], .bs-searchbox input",e.prototype.keydown).on("focusin.modal",".bootstrap-select [data-toggle=dropdown], .bootstrap-select [role=menu], .bs-searchbox input",function(a){a.stopPropagation()}),a(window).on("load.bs.select.data-api",function(){a(".selectpicker").each(function(){var b=a(this);d.call(b,b.data())})})}(jQuery);
//# sourceMappingURL=bootstrap-select.js.map

/* Modernizr 2.6.2 (Custom Build) | MIT & BSD
 * Build: http://modernizr.com/download/#-touch-shiv-cssclasses-teststyles-prefixes-load
 */
;window.Modernizr=function(a,b,c){function w(a){j.cssText=a}function x(a,b){return w(m.join(a+";")+(b||""))}function y(a,b){return typeof a===b}function z(a,b){return!!~(""+a).indexOf(b)}function A(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:y(f,"function")?f.bind(d||b):f}return!1}var d="2.6.2",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n={},o={},p={},q=[],r=q.slice,s,t=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},u={}.hasOwnProperty,v;!y(u,"undefined")&&!y(u.call,"undefined")?v=function(a,b){return u.call(a,b)}:v=function(a,b){return b in a&&y(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=r.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(r.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(r.call(arguments)))};return e}),n.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:t(["@media (",m.join("touch-enabled),("),h,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=a.offsetTop===9}),c};for(var B in n)v(n,B)&&(s=B.toLowerCase(),e[s]=n[B](),q.push((e[s]?"":"no-")+s));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)v(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},w(""),i=k=null,function(a,b){function k(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function l(){var a=r.elements;return typeof a=="string"?a.split(" "):a}function m(a){var b=i[a[g]];return b||(b={},h++,a[g]=h,i[h]=b),b}function n(a,c,f){c||(c=b);if(j)return c.createElement(a);f||(f=m(c));var g;return f.cache[a]?g=f.cache[a].cloneNode():e.test(a)?g=(f.cache[a]=f.createElem(a)).cloneNode():g=f.createElem(a),g.canHaveChildren&&!d.test(a)?f.frag.appendChild(g):g}function o(a,c){a||(a=b);if(j)return a.createDocumentFragment();c=c||m(a);var d=c.frag.cloneNode(),e=0,f=l(),g=f.length;for(;e<g;e++)d.createElement(f[e]);return d}function p(a,b){b.cache||(b.cache={},b.createElem=a.createElement,b.createFrag=a.createDocumentFragment,b.frag=b.createFrag()),a.createElement=function(c){return r.shivMethods?n(c,a,b):b.createElem(c)},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+l().join().replace(/\w+/g,function(a){return b.createElem(a),b.frag.createElement(a),'c("'+a+'")'})+");return n}")(r,b.frag)}function q(a){a||(a=b);var c=m(a);return r.shivCSS&&!f&&!c.hasCSS&&(c.hasCSS=!!k(a,"article,aside,figcaption,figure,footer,header,hgroup,nav,section{display:block}mark{background:#FF0;color:#000}")),j||p(a,c),a}var c=a.html5||{},d=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,e=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,f,g="_html5shiv",h=0,i={},j;(function(){try{var a=b.createElement("a");a.innerHTML="<xyz></xyz>",f="hidden"in a,j=a.childNodes.length==1||function(){b.createElement("a");var a=b.createDocumentFragment();return typeof a.cloneNode=="undefined"||typeof a.createDocumentFragment=="undefined"||typeof a.createElement=="undefined"}()}catch(c){f=!0,j=!0}})();var r={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,supportsUnknownElements:j,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:q,createElement:n,createDocumentFragment:o};a.html5=r,q(b)}(this,b),e._version=d,e._prefixes=m,e.testStyles=t,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+q.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return"[object Function]"==o.call(a)}function e(a){return"string"==typeof a}function f(){}function g(a){return!a||"loaded"==a||"complete"==a||"uninitialized"==a}function h(){var a=p.shift();q=1,a?a.t?m(function(){("c"==a.t?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){"img"!=a&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l=b.createElement(a),o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};1===y[c]&&(r=1,y[c]=[]),"object"==a?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),"img"!=a&&(r||2===y[c]?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i("c"==b?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),1==p.length&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&"[object Opera]"==o.call(a.opera),l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return"[object Array]"==o.call(a)},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,h){var i=b(a),j=i.autoCallback;i.url.split(".").pop().split("?").shift(),i.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]),i.instead?i.instead(a,e,f,g,h):(y[i.url]?i.noexec=!0:y[i.url]=1,f.load(i.url,i.forceCSS||!i.forceJS&&"css"==i.url.split(".").pop().split("?").shift()?"c":c,i.noexec,i.attrs,i.timeout),(d(e)||d(j))&&f.load(function(){k(),e&&e(i.origUrl,h,g),j&&j(i.origUrl,h,g),y[i.url]=2})))}function h(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var i,j,l=this.yepnope.loader;if(e(a))g(a,0,l,0);else if(w(a))for(i=0;i<a.length;i++)j=a[i],e(j)?g(j,0,l,0):w(j)?B(j):Object(j)===j&&h(j,l);else Object(a)===a&&h(a,l)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,null==b.readyState&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};

/**
    Equal Heights Plugin
    Equalize the heights of elements. Great for columns or any elements
    that need to be the same size (floats, etc).
  
    Version 1.01
    Updated 1/30/2014
 
    Copyright (c) 2008 Rob Glazebrook (cssnewbie.com) 
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
    Usage: $(object).equalHeights([minHeight], [maxHeight]);
  
    Example 1: $(".cols").equalHeights(); Sets all columns to the same height.
    Example 2: $(".cols").equalHeights(400); Sets all cols to at least 400px tall.
    Example 3: $(".cols").equalHeights(100,300); Cols are at least 100 but no more
    than 300 pixels tall. Elements with too much content will gain a scrollbar.
**/

   (function($) {
     $.fn.equalHeights = function(minHeight, maxHeight) {
      tallest = (minHeight) ? minHeight : 0;
      this.each(function() {
       if($(this).height() > tallest) {
        tallest = $(this).height();
      }
    });
      if((maxHeight) && tallest > maxHeight) tallest = maxHeight;
      return this.each(function() {
       $(this).height(tallest).css("overflow","auto");
     });
    }
  })(jQuery);
  
  $(function(){
        $(".columns").equalHeights(600);
			

    });


/* jqModal - Minimalist Modaling with jQuery (http://dev.iceburg.net/jquery/jqModal/) Copyright (c) 2007,2008 Brice Burgess <bhb@iceburg.net> $Version: 03/01/2009 +r14 */
(function($) {$.fn.jqm=function(o){
var p={overlay:50,overlayClass:'jqmOverlay',closeClass:'jqmClose',trigger:'.jqModal',ajax:F,ajaxText:'',target:F,modal:F,toTop:F,onShow:F,onHide:F,onLoad:F};
return this.each(function(){if(this._jqm)return H[this._jqm].c=$.extend({},H[this._jqm].c,o);s++;this._jqm=s;H[s]={c:$.extend(p,$.jqm.params,o),a:F,w:$(this).addClass('jqmID'+s),s:s};if(p.trigger)$(this).jqmAddTrigger(p.trigger);});};$.fn.jqmAddClose=function(e){return hs(this,e,'jqmHide');};$.fn.jqmAddTrigger=function(e){return hs(this,e,'jqmShow');};$.fn.jqmShow=function(t){return this.each(function(){t=t||window.event;$.jqm.open(this._jqm,t);});};$.fn.jqmHide=function(t){return this.each(function(){t=t||window.event;$.jqm.close(this._jqm,t)});};$.jqm = {hash:{},open:function(s,t){var h=H[s],c=h.c,cc='.'+c.closeClass,z=(parseInt(h.w.css('z-index'))),z=(z>0)?z:3000,o=$('<div></div>').css({height:'100%',width:'100%',position:'fixed',left:0,top:0,'z-index':z-1,opacity:c.overlay/100});if(h.a)return F;h.t=t;h.a=true;h.w.css('z-index',z);if(c.modal) {if(!A[0])L('bind');A.push(s);}else if(c.overlay > 0)h.w.jqmAddClose(o);else o=F;h.o=(o)?o.addClass(c.overlayClass).prependTo('body'):F;if(ie6){$('html,body').css({height:'100%',width:'100%'});if(o){o=o.css({position:'absolute'})[0];for(var y in {Top:1,Left:1})o.style.setExpression(y.toLowerCase(),"(_=(document.documentElement.scroll"+y+" || document.body.scroll"+y+"))+'px'");}}if(c.ajax) {var r=c.target||h.w,u=c.ajax,r=(typeof r == 'string')?$(r,h.w):$(r),u=(u.substr(0,1) == '@')?$(t).attr(u.substring(1)):u;r.html(c.ajaxText).load(u,function(){if(c.onLoad)c.onLoad.call(this,h);if(cc)h.w.jqmAddClose($(cc,h.w));e(h);});}else if(cc)h.w.jqmAddClose($(cc,h.w));if(c.toTop&&h.o)h.w.before('<span id="jqmP'+h.w[0]._jqm+'"></span>').insertAfter(h.o);(c.onShow)?c.onShow(h):h.w.show();e(h);return F;},close:function(s){var h=H[s];if(!h.a)return F;h.a=F;if(A[0]){A.pop();if(!A[0])L('unbind');}if(h.c.toTop&&h.o)$('#jqmP'+h.w[0]._jqm).after(h.w).remove();if(h.c.onHide)h.c.onHide(h);else{h.w.hide();if(h.o)h.o.remove();} return F;},params:{}};var s=0,H=$.jqm.hash,A=[],ie6=$.browser.msie&&($.browser.version == "6.0"),F=false,i=$('<iframe src="javascript:false;document.write(\'\');" class="jqm"></iframe>').css({opacity:0}),e=function(h){if(ie6)if(h.o)h.o.html('<p style="width:100%;height:100%"/>').prepend(i);else if(!$('iframe.jqm',h.w)[0])h.w.prepend(i); f(h);},f=function(h){try{$(':input:visible',h.w)[0].focus();}catch(_){}},L=function(t){$()[t]("keypress",m)[t]("keydown",m)[t]("mousedown",m);},m=function(e){var h=H[A[A.length-1]],r=(!$(e.target).parents('.jqmID'+h.s)[0]);if(r)f(h);return !r;},hs=function(w,t,c){return w.each(function(){var s=this._jqm;$(t).each(function() {if(!this[c]){this[c]=[];$(this).click(function(){for(var i in {jqmShow:1,jqmHide:1})for(var s in this[i])if(H[this[i][s]])H[this[i][s]].w[i](this);return F;});}this[c].push(s);});});};})(jQuery);
/* Overriding Javascript's Confirm Dialog */
function confirm(msg,callback) {
  $('#confirm')
    .jqmShow()
    .find('p.jqmConfirmMsg')
      .html(msg)
    .end()
    .find(':submit:visible')
      .click(function(){
        if(this.value == 'yes')
          (typeof callback == 'string') ?
            window.location.href = callback :
            callback();
        $('#confirm').jqmHide();
      });
}


	   
$(document).ready(function () {
     $('.tooltip-demo').tooltip({
      selector: "a[rel=tooltip]"
     });
    
     // dialog init
     $('#dialog').jqm({overlay: 50,overlayClass: 'modOverlay',closeClass: 'modWClose',trigger: '.wModal'});
     $('#confirm').jqm({overlay: 88, modal: true, trigger: false});
  
     // trigger a confirm whenever links of class alert are pressed.
     $('a.confirm').click(function() { 
          confirm('Вы действительно хотите удалить данные записи?<br />Восстановить их будет невозможно.<br />Если необходимо просто не публиковать записи на сайте, отредактируйте их, сняв флажок активности.',this.href); 
          return false;
     });
	 
	$('.newwindow').click(function(){
		window.open(this.href);
		return false;
	});
     
     
     $("#content_pos").keypress(function (e) {
     //if the letter is not digit then display error and don&#39;t type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Только цифры").show().fadeOut("slow");
               return false;
    }
   });
     
     
     // minicolors init
       var consoleTimeout;
            
       $('.minicolors').each( function() {
                //
                // Dear reader, it's actually much easier than this to initialize 
                // miniColors. For example:
                //
                //  $(selector).minicolors();
                //
                // The way I've done it below is just to make it easier for me 
                // when developing the plugin. It keeps me sane, but it may not 
                // have the same effect on you!
                //
                $(this).minicolors({
                    control: $(this).attr('data-control') || 'hue',
                    defaultValue: $(this).attr('data-default-value') || '',
                    inline: $(this).hasClass('inline'),
                    letterCase: $(this).hasClass('uppercase') ? 'uppercase' : 'lowercase',
                    opacity: $(this).hasClass('opacity'),
                    position: $(this).attr('data-position') || 'default',
                    styles: $(this).attr('data-style') || '',
                    swatchPosition: $(this).attr('data-swatch-position') || 'left',
                    textfield: !$(this).hasClass('no-textfield'),
                    theme: $(this).attr('data-theme') || 'default',
                    change: function(hex, opacity) {
                        
                        // Generate text to show in console
                        text = hex ? hex : 'transparent';
                        if( opacity ) text += ', ' + opacity;
                        text += ' / ' + $(this).minicolors('rgbaString');
                        
                        // Show text in console; disappear after a few seconds
                        $('#console').text(text).addClass('busy');
                        clearTimeout(consoleTimeout);
                        consoleTimeout = setTimeout( function() {
                            $('#console').removeClass('busy');
                        }, 3000);
                        
                    }
                });
     });
     
    /*
    $('#datepicker').datepicker({
	 format: 'dd.mm.yyyy',
	 weekStart: 1
	 
    }).on('changeDate', function(ev){
	 $('#datepicker').datepicker('hide');
    });
    
    $('.timepicker').timepicker();
	 
	 */

  

    $('.sp_tooltip').tooltip();
    $('.l_tooltip').tooltip({
	  placement: 'left',
	  delay: { show: 100, hide: 500 }
    });
    $('.popover-test').popover();
	
	// select bootstrap https://github.com/silviomoreto/bootstrap-select
	$('.b_select').selectpicker();

    // popover demo
    $("a[rel=popover]")
      .popover()
      .click(function(e) {
        e.preventDefault()
      })
      
      $('#myCollapsible').collapse({
	  toggle: false
      })
	  
	form = $("#formid"), select = $("#selactions");
		select.change(function(){
		form.submit();
	});
	
	
	$('#FormTabs a').click(function (e) {
	       e.preventDefault();
	       $(this).tab('show');
	})
	
	
	$("#clonePhoneCell").click(function () {
	       $('#contact_phone_cell').clone().insertAfter("#contact_phone_cell");
	});
	$("#clonePhoneWork").click(function () {
	       $('#contact_phone_work').clone().insertAfter("#contact_phone_work");
	});
	$("#clonePhoneHome").click(function () {
	       $('#contact_phone_home').clone().insertAfter("#contact_phone_home");
	});
	$("#cloneEmail").click(function () {
	       $('#contact_email').clone().insertAfter("#contact_email");
	});
	/*
	 $("#detachPhoneCell").click(function () {
	     $("#contact_phone_cell").html($("#contact_phone_cell").length);
	       $('#contact_phone_cell').detach(":empty");
	});
	*/    
      /*
	$("#form_contact").sisyphus({ 
	     timeout: 30,
	     locationBased: false,
	     onSave: function() {
		 $('#i_form_saved').fadeIn().delay(2000).fadeOut('slow'); 
		  
	     }
	     
	});
	*/
       
       
	$("#new_item").click(function () {
			$('#mitems').append('');
	});
       
        
	if($("#content_hide_phone").is(':checked')) {
            $("#content_hide_desktop").attr('disabled','disabled');
        }
	if($("#content_hide_desktop").is(':checked')) {
            $("#content_hide_phone").attr('disabled','disabled');
        }
	
	$("#content_hide_phone").change(function(){ 
	     if($(this).is(":checked")){
                $("#content_hide_desktop").attr('disabled','disabled');
            }
	    else {
                $("#content_hide_desktop").attr('disabled',false);
	    }
        });
       	$("#content_hide_desktop").change(function(){ 
	     if($(this).is(":checked")){
                $("#content_hide_phone").attr('disabled','disabled');
            }
	    else {
                $("#content_hide_phone").attr('disabled',false);
	    }
        });
       
       
       
       
       /* jQuery syncTranslit plugin Copyright (c) 2009 Snitko Roman @link http://snowcore.net/ @version 0.0.7 */
       ;(function($){$.fn.syncTranslit=function(options){var opts=$.extend({},$.fn.syncTranslit.defaults,options);return this.each(function(){$this=$(this);var o=$.meta?$.extend({},opts,$this.data()):opts;var $destination=$('#'+opts.destination);o.destinationObject=$destination;if(!Array.indexOf){Array.prototype.indexOf=function(obj){for(var i=0;i<this.length;i++){if(this[i]==obj){return i}}return-1}}$this.keyup(function(){var str=$(this).val();var result='';for(var i=0;i<str.length;i++){result+=$.fn.syncTranslit.transliterate(str.charAt(i),o)}var regExp=new RegExp('['+o.urlSeparator+']{2,}','g');result=result.replace(regExp,o.urlSeparator);$destination.val(result)})})};$.fn.syncTranslit.transliterate=function(char,opts){var charIsLowerCase=true,trChar;if(char.toLowerCase()!=char){charIsLowerCase=false}char=char.toLowerCase();var index=opts.dictOriginal.indexOf(char);if(index==-1){trChar=char}else{trChar=opts.dictTranslate[index]}if(opts.type=='url'){var code=trChar.charCodeAt(0);if(code>=33&&code<=47&&code!=45||code>=58&&code<=64||code>=91&&code<=96||code>=123&&code<=126||code>=1072){return''}if(trChar==' '||trChar=='-'){return opts.urlSeparator}}if(opts.caseStyle=='upper'){return trChar.toUpperCase()}else if(opts.caseStyle=='normal'){if(charIsLowerCase){return trChar.toLowerCase()}else{return trChar.toUpperCase()}}return trChar};$.fn.syncTranslit.defaults={dictOriginal:['а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я','і','є','ї','ґ','«','»'],dictTranslate:['a','b','v','g','d','e','e','zh','z','i','j','k','l','m','n','o','p','r','s','t','u','f','h','ts','ch','sh','sch','','y','','e','ju','ja','i','je','ji','g','',''],caseStyle:'lower',urlSeparator:'-',type:'url'}})(jQuery);


       if($("#stop_auto_url").is(':checked')) {
            $("#item_url").attr('disabled','disabled');
        }
        else {
                $('#item_title').syncTranslit({destination: 'item_url',caseStyle: 'lower',urlSeparator: '_'});
        }
        
        $("#stop_auto_url").change(function(){ 
            if($(this).is(":checked")){
                $("#item_url").attr('disabled','disabled');
                $('#item_title').unbind();
            }
            /* syncTranslit init */
            else {
                $("#item_url").attr('disabled',false);
                $('#item_title').syncTranslit({destination: 'item_url',caseStyle: 'lower',urlSeparator: '_'});
            }
        });
	
	
	
	  // только цифры в поле
	  $('#banner_clicks, #banner_sort').keypress(function(e) {
	      var a = [];
	      var k = e.which;

	      for (i = 48; i < 58; i++)
		  a.push(i);

	      if (!(a.indexOf(k)>=0))
		  e.preventDefault();
	  });

	
	/*
	       $(function() {
		    $(':checkbox').attr('checked', $.cookie('pjax'))

		    if ( !$(':checkbox').attr('checked') )
		      $.fn.pjax = $.noop

		    $(':checkbox').change(function() {
		      if ( $.pjax == $.noop ) {
			$(this).removeAttr('checked')
			return alert( "Sorry, your browser doesn't support pjax :(" )
		      }

		      if ( $(this).attr('checked') )
			$.cookie('pjax', true)
		      else
			$.cookie('pjax', null)

		      window.location = location.href
		    })
	       });
	*/
	
	
	  $('#issue_year').change(function () {
	   /*
		* В переменную country_id положим значение селекта
		* (выбранная страна)
	   */
	        var issue_year = $(this).val();
	        /*
		* Если значение селекта равно 0,
		* т.е. не выбрана страна, то мы
		* не будем ничего делать
		*/
		if (issue_year == '0') {
		    $('#issue_month').append('<option>- выберите регион -</option>');
		    $('#issue_month').prop('disabled', true);
		    $('#issue_day').append('<option>- выберите город -</option>');
		    $('#issue_day').prop('disabled', true);
		    return(false);
		    /*
			 * Очищаем второй селект с регионами
			 * и блокируем его через атрибут disabled
			 * туда мы будем класть результат запроса
		    */
		}
		$('#issue_month').prop('disabled', true);
		$('#issue_month').append('<option>загрузка...</option>');
		

	        /*
		    * url запроса регионов
	        */
	        var url0 = 'http://localhost/site/panel/articles/issue_month/';
		/*
		     * GET'овый AJAX запрос
		     * подробнее о синтаксисе читайте
		     * на сайте http://docs.jquery.com/Ajax/jQuery.get
		     * Данные будем кодировать с помощью JSON
	        */
	        $.get(
		    url0,
		    function(  ) {

  alert( "Load was performed." );
}
	    );
	  });
	  
	  /*
	   * Те же действия проделываем с выбором города 
	  */
	  $('#issue_month').change(function () {
	       var issue_month = $('#issue_month :selected').val();
	       if (issue_month == '0') {
		    $('#issue_day').html('<option>- выберите город -</option>');
		    $('#issue_day').attr('disabled', true);
		    return(false);
	       }
	       $('#issue_day').attr('disabled', true);
	       $('#issue_day').html('<option>загрузка...</option>'); 
	       var url = 'get_city.php';       
	       $.get(
		 url,
		 "issue_month=" + issue_month,

		 function (result) {
		     if (result.type == 'error') {
			 alert('error');
			 return(false);
		     }
		     else {
			 var options = ''; 
			 $(result.days).each(function() {
			     options += '<option value="' + $(this).attr('issue_day') + '">' + $(this).attr('issue_day') + '</option>';
			 });

			 $('#issue_day').html('<option>- выберите город -</option>'+options);
			 $('#issue_day').attr('disabled', false);
		     }
		 },
		 "json"
	     );
	});
});



$(function () { 
	
	var GNmenu = {
		isMenuOpened: false,
		init : function () {

			var menuBtn = $('#btn-menu'); 
			
			// make it work on touch screen device and mouse click
			menuBtn.on('touchstart click', function (e) {
				e.stopPropagation();
				e.preventDefault();
				
				/* if the menu is half show, show the whole menu instead of hide it */
				if ($('#sideNav').hasClass('showHalfMenu') && !$('#sideNav').hasClass('showFullMenu')) {
					GNmenu.showFullMenu();
				} else {
					GNmenu.toggleMenu();
				}
				
			});

			// only do all this if it's desktop
			if (!GNmenu.isMobile()) {

				menuBtn.bind('mouseover', function () {
						GNmenu.showFullMenu();
				});
				
				menuBtn.bind('mouseleave', function () {
						GNmenu.hideMenu();
						GNmenu.showHalfMenu();
				});	
			
				$('#sideNav').bind('mouseover', function () {
						GNmenu.showFullMenu();
				});
				$('#sideNav').bind('mouseleave', function () {
						GNmenu.hideMenu();			
						GNmenu.showHalfMenu();
				});											

				// this allow user to hide the menu by clicking on web page body
				GNmenu.bodyClick();
			}
			
									
		
		},
		
		bodyClick: function () {
		
			$('html').bind('click',function () {
				if (GNmenu.isMenuOpened) {
					GNmenu.showHalfMenu();														
				}
			});					
		
		},
		
		toggleMenu: function () {
			if (!GNmenu.isMenuOpened) {
				GNmenu.showFullMenu();
			} else {
				GNmenu.hideMenu();					
			}
		},
		
		showHalfMenu: function () {
			$('#sideNav').addClass('showHalfMenu');
			GNmenu.isMenuOpened = true;					
		},
		
		showFullMenu: function () {
			$('#btn-menu').addClass('icon-menu-active');
			$('#sideNav').addClass('showFullMenu');
			$('html').addClass('cursor');				
			GNmenu.isMenuOpened = true;							
		},
		
		hideMenu: function () {

				$('#btn-menu').removeClass('icon-menu-active');
				$('#sideNav').removeClass('showFullMenu showHalfMenu');		
				$('html').removeClass('cursor');						
				GNmenu.isMenuOpened = false;	

		},
		
		// Mobile Detection: http://stackoverflow.com/a/11381730				
		isMobile: function() {
			var check = false;
			(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
			
			return check; 					
		}
		
	}
	
	// Run the Google Nexus Inspired Menu
	GNmenu.init();
	
});