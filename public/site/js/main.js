/* Boostrap select */
!function(b){var a=function(d,c,f){if(f){f.stopPropagation();f.preventDefault()}this.$element=b(d);this.$newElement=null;this.button=null;this.options=b.extend({},b.fn.selectpicker.defaults,this.$element.data(),typeof c=="object"&&c);if(this.options.title==null){this.options.title=this.$element.attr("title")}this.val=a.prototype.val;this.render=a.prototype.render;this.refresh=a.prototype.refresh;this.selectAll=a.prototype.selectAll;this.deselectAll=a.prototype.deselectAll;this.init()};a.prototype={constructor:a,init:function(d){if(!this.options.container){this.$element.hide()}else{this.$element.css("visibility","hidden")}this.multiple=this.$element.prop("multiple");var f=this.$element.attr("class")!==undefined?this.$element.attr("class").split(/\s+/):"";var h=this.$element.attr("id");this.$element.after(this.createView());this.$newElement=this.$element.next(".bootstrap-select");if(this.options.container){this.selectPosition()}this.button=this.$newElement.find("> button");if(h!==undefined){var g=this;this.button.attr("data-id",h);b('label[for="'+h+'"]').click(function(){g.$newElement.find("button[data-id="+h+"]").focus()})}for(var c=0;c<f.length;c++){if(f[c]!="selectpicker"){this.$newElement.addClass(f[c])}}if(this.multiple){this.$newElement.addClass("show-tick")}this.button.addClass(this.options.style);this.checkDisabled();this.checkTabIndex();this.clickListener();this.render();this.setSize()},createDropdown:function(){var c="<div class='btn-group bootstrap-select'><button type='button' class='btn dropdown-toggle' data-toggle='dropdown'><span class='filter-option pull-left'></span>&nbsp;<span class='caret'></span></button><ul class='dropdown-menu' role='menu'></ul></div>";return b(c)},createView:function(){var c=this.createDropdown();var d=this.createLi();c.find("ul").append(d);return c},reloadLi:function(){this.destroyLi();$li=this.createLi();this.$newElement.find("ul").append($li)},destroyLi:function(){this.$newElement.find("li").remove()},createLi:function(){var h=this;var e=[];var g=[];var c="";this.$element.find("option").each(function(){e.push(b(this).text())});this.$element.find("option").each(function(k){var l=b(this);var j=l.attr("class")!==undefined?l.attr("class"):"";var p=l.text();var n=l.data("subtext")!==undefined?'<small class="muted">'+l.data("subtext")+"</small>":"";var m=l.data("icon")!==undefined?'<i class="'+l.data("icon")+'"></i> ':"";if(l.is(":disabled")||l.parent().is(":disabled")){m="<span>"+m+"</span>"}p=m+'<span class="text">'+p+n+"</span>";if(h.options.hideDisabled&&(l.is(":disabled")||l.parent().is(":disabled"))){g.push('<a style="min-height: 0; padding: 0"></a>')}else{if(l.parent().is("optgroup")&&l.data("divider")!=true){if(l.index()==0){var o=l.parent().attr("label");var q=l.parent().data("subtext")!==undefined?'<small class="muted">'+l.parent().data("subtext")+"</small>":"";var i=l.parent().data("icon")?'<i class="'+l.parent().data("icon")+'"></i> ':"";o=i+'<span class="text">'+o+q+"</span>";if(l[0].index!=0){g.push('<div class="div-contain"><div class="divider"></div></div><dt>'+o+"</dt>"+h.createA(p,"opt "+j))}else{g.push("<dt>"+o+"</dt>"+h.createA(p,"opt "+j))}}else{g.push(h.createA(p,"opt "+j))}}else{if(l.data("divider")==true){g.push('<div class="div-contain"><div class="divider"></div></div>')}else{if(b(this).data("hidden")==true){g.push("")}else{g.push(h.createA(p,j))}}}}});if(e.length>0){for(var d=0;d<e.length;d++){var f=this.$element.find("option").eq(d);c+="<li rel="+d+">"+g[d]+"</li>"}}if(!this.multiple&&this.$element.find("option:selected").length==0&&!h.options.title){this.$element.find("option").eq(0).prop("selected",true).attr("selected","selected")}return b(c)},createA:function(d,c){return'<a tabindex="0" class="'+c+'">'+d+'<i class="icon-ok check-mark"></i></a>'},render:function(){var f=this;this.$element.find("option").each(function(g){f.setDisabled(g,b(this).is(":disabled")||b(this).parent().is(":disabled"));f.setSelected(g,b(this).is(":selected"))});var e=this.$element.find("option:selected").map(function(g,h){if(b(this).attr("title")!=undefined){return b(this).attr("title")}else{return b(this).text()}}).toArray();var d=!this.multiple?e[0]:e.join(", ");if(f.multiple&&f.options.selectedTextFormat.indexOf("count")>-1){var c=f.options.selectedTextFormat.split(">");if((c.length>1&&e.length>c[1])||(c.length==1&&e.length>=2)){d=e.length+" of "+this.$element.find("option").length+" selected"}}if(!d){d=f.options.title!=undefined?f.options.title:f.options.noneSelectedText}f.$newElement.find(".filter-option").html(d)},setSize:function(){var i=this;var e=this.$newElement.find(".dropdown-menu");var k=e.find("li > a");var n=this.$newElement.addClass("open").find(".dropdown-menu li > a").outerHeight();this.$newElement.removeClass("open");var g=e.find("li .divider").outerHeight(true);var f=this.$newElement.offset().top;var j=this.$newElement.outerHeight();var c=parseInt(e.css("padding-top"))+parseInt(e.css("padding-bottom"))+parseInt(e.css("border-top-width"))+parseInt(e.css("border-bottom-width"));var d=this.options.hideDisabled?":not(.disabled)":"";if(this.options.size=="auto"){function o(){var p=f-b(window).scrollTop();var s=window.innerHeight;var q=c+parseInt(e.css("margin-top"))+parseInt(e.css("margin-bottom"))+2;var r=s-p-j-q;menuHeight=r;if(i.$newElement.hasClass("dropup")){menuHeight=p-q}if((e.find("li").length+e.find("dt").length)>3){minHeight=n*3+q-2}else{minHeight=0}e.css({"max-height":menuHeight+"px","overflow-y":"auto","min-height":minHeight+"px"})}o();b(window).resize(o);b(window).scroll(o)}else{if(this.options.size&&this.options.size!="auto"&&e.find("li"+d).length>this.options.size){var m=e.find("li"+d+" > *").filter(":not(.div-contain)").slice(0,this.options.size).last().parent().index();var l=e.find("li").slice(0,m+1).find(".div-contain").length;menuHeight=n*this.options.size+l*g+c;e.css({"max-height":menuHeight+"px","overflow-y":"auto"})}}if(this.options.width=="auto"){this.$newElement.find(".dropdown-menu").css("min-width","0");var h=this.$newElement.find(".dropdown-menu").css("width");this.$newElement.css("width",h);if(this.options.container){this.$element.css("width",h)}}else{if(this.options.width&&this.options.width!="auto"){this.$newElement.css("width",this.options.width);if(this.options.container){this.$element.css("width",this.options.width)}}}},selectPosition:function(){var d=this.$element.offset().top;var c=this.$element.offset().left;this.$newElement.appendTo(this.options.container);this.$newElement.css({position:"absolute",top:d+"px",left:c+"px"})},refresh:function(){this.reloadLi();this.render();this.setSize();this.checkDisabled();if(this.options.container){this.selectPosition()}},setSelected:function(c,d){if(d){this.$newElement.find("li").eq(c).addClass("selected")}else{this.$newElement.find("li").eq(c).removeClass("selected")}},setDisabled:function(c,d){if(d){this.$newElement.find("li").eq(c).addClass("disabled").find("a").attr("href","#").attr("tabindex",-1)}else{this.$newElement.find("li").eq(c).removeClass("disabled").find("a").removeAttr("href").attr("tabindex",0)}},isDisabled:function(){return this.$element.is(":disabled")||this.$element.attr("readonly")},checkDisabled:function(){if(this.isDisabled()){this.button.addClass("disabled");this.button.click(function(c){c.preventDefault()});this.button.attr("tabindex","-1")}else{if(!this.isDisabled()&&this.button.hasClass("disabled")){this.button.removeClass("disabled");this.button.click(function(){return true});this.button.removeAttr("tabindex")}}},checkTabIndex:function(){if(this.$element.is("[tabindex]")){var c=this.$element.attr("tabindex");this.button.attr("tabindex",c)}},clickListener:function(){var c=this;b("body").on("touchstart.dropdown",".dropdown-menu",function(d){d.stopPropagation()});this.$newElement.on("click","li a",function(j){var g=b(this).parent().index(),i=b(this).parent(),d=i.parents(".bootstrap-select"),h=c.$element.val();if(c.multiple){j.stopPropagation()}j.preventDefault();if(c.$element.not(":disabled")&&!b(this).parent().hasClass("disabled")){if(!c.multiple){c.$element.find("option").removeAttr("selected");c.$element.find("option").eq(g).prop("selected",true).attr("selected","selected")}else{var f=c.$element.find("option").eq(g).prop("selected");if(f){c.$element.find("option").eq(g).removeAttr("selected")}else{c.$element.find("option").eq(g).prop("selected",true).attr("selected","selected")}}d.find(".filter-option").html(i.text());d.find("button").focus();if(h!=c.$element.val()){c.$element.trigger("change")}c.render()}});this.$newElement.on("click","li.disabled a, li dt, li .div-contain",function(d){d.preventDefault();d.stopPropagation();$select=b(this).parent().parents(".bootstrap-select");$select.find("button").focus()});this.$element.on("change",function(d){c.render()})},val:function(c){if(c!=undefined){this.$element.val(c);this.$element.trigger("change");return this.$element}else{return this.$element.val()}},selectAll:function(){this.$element.find("option").prop("selected",true).attr("selected","selected");this.render()},deselectAll:function(){this.$element.find("option").prop("selected",false).removeAttr("selected");this.render()},keydown:function(n){var o,m,h,l,j,i,p,d,g;o=b(this);h=o.parent();m=b("[role=menu] li:not(.divider):visible a",h);if(!m.length){return}if(/(38|40)/.test(n.keyCode)){l=m.index(m.filter(":focus"));i=m.parent(":not(.disabled)").first().index();p=m.parent(":not(.disabled)").last().index();j=m.eq(l).parent().nextAll(":not(.disabled)").eq(0).index();d=m.eq(l).parent().prevAll(":not(.disabled)").eq(0).index();g=m.eq(j).parent().prevAll(":not(.disabled)").eq(0).index();if(n.keyCode==38){if(l!=g&&l>d){l=d}if(l<i){l=i}}if(n.keyCode==40){if(l!=g&&l<j){l=j}if(l>p){l=p}}m.eq(l).focus()}else{var f={48:"0",49:"1",50:"2",51:"3",52:"4",53:"5",54:"6",55:"7",56:"8",57:"9",59:";",65:"a",66:"b",67:"c",68:"d",69:"e",70:"f",71:"g",72:"h",73:"i",74:"j",75:"k",76:"l",77:"m",78:"n",79:"o",80:"p",81:"q",82:"r",83:"s",84:"t",85:"u",86:"v",87:"w",88:"x",89:"y",90:"z",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9"};var c=[];m.each(function(){if(b(this).parent().is(":not(.disabled)")){if(b.trim(b(this).text().toLowerCase()).substring(0,1)==f[n.keyCode]){c.push(b(this).parent().index())}}});var k=b(document).data("keycount");k++;b(document).data("keycount",k);var q=b.trim(b(":focus").text().toLowerCase()).substring(0,1);if(q!=f[n.keyCode]){k=1;b(document).data("keycount",k)}else{if(k>=c.length){b(document).data("keycount",0)}}m.eq(c[k-1]).focus()}if(/(13)/.test(n.keyCode)){b(":focus").click();h.addClass("open");b(document).data("keycount",0)}}};b.fn.selectpicker=function(e,f){var c=arguments;var g;var d=this.each(function(){if(b(this).is("select")){var l=b(this),k=l.data("selectpicker"),h=typeof e=="object"&&e;if(!k){l.data("selectpicker",(k=new a(this,h,f)))}else{if(h){for(var j in h){k.options[j]=h[j]}}}if(typeof e=="string"){property=e;if(k[property] instanceof Function){[].shift.apply(c);g=k[property].apply(k,c)}else{g=k.options[property]}}}});if(g!=undefined){return g}else{return d}};b.fn.selectpicker.defaults={style:null,size:"auto",title:null,selectedTextFormat:"values",noneSelectedText:"Nothing selected",width:null,container:false,hideDisabled:false};b(document).data("keycount",0).on("keydown","[data-toggle=dropdown], [role=menu]",a.prototype.keydown)}(window.jQuery);


/* jqModal - Minimalist Modaling with jQuery (http://dev.iceburg.net/jquery/jqModal/) Copyright (c) 2007,2008 Brice Burgess <bhb@iceburg.net> $Version: 03/01/2009 +r14 */
/*
(function($) {$.fn.jqm=function(o){
var p={overlay:50,overlayClass:'jqmOverlay',closeClass:'jqmClose',trigger:'.jqModal',ajax:F,ajaxText:'',target:F,modal:F,toTop:F,onShow:F,onHide:F,onLoad:F};
return this.each(function(){if(this._jqm)return H[this._jqm].c=$.extend({},H[this._jqm].c,o);s++;this._jqm=s;H[s]={c:$.extend(p,$.jqm.params,o),a:F,w:$(this).addClass('jqmID'+s),s:s};if(p.trigger)$(this).jqmAddTrigger(p.trigger);});};$.fn.jqmAddClose=function(e){return hs(this,e,'jqmHide');};$.fn.jqmAddTrigger=function(e){return hs(this,e,'jqmShow');};$.fn.jqmShow=function(t){return this.each(function(){t=t||window.event;$.jqm.open(this._jqm,t);});};$.fn.jqmHide=function(t){return this.each(function(){t=t||window.event;$.jqm.close(this._jqm,t)});};$.jqm = {hash:{},open:function(s,t){var h=H[s],c=h.c,cc='.'+c.closeClass,z=(parseInt(h.w.css('z-index'))),z=(z>0)?z:3000,o=$('<div></div>').css({height:'100%',width:'100%',position:'fixed',left:0,top:0,'z-index':z-1,opacity:c.overlay/100});if(h.a)return F;h.t=t;h.a=true;h.w.css('z-index',z);if(c.modal) {if(!A[0])L('bind');A.push(s);}else if(c.overlay > 0)h.w.jqmAddClose(o);else o=F;h.o=(o)?o.addClass(c.overlayClass).prependTo('body'):F;if(ie6){$('html,body').css({height:'100%',width:'100%'});if(o){o=o.css({position:'absolute'})[0];for(var y in {Top:1,Left:1})o.style.setExpression(y.toLowerCase(),"(_=(document.documentElement.scroll"+y+" || document.body.scroll"+y+"))+'px'");}}if(c.ajax) {var r=c.target||h.w,u=c.ajax,r=(typeof r == 'string')?$(r,h.w):$(r),u=(u.substr(0,1) == '@')?$(t).attr(u.substring(1)):u;r.html(c.ajaxText).load(u,function(){if(c.onLoad)c.onLoad.call(this,h);if(cc)h.w.jqmAddClose($(cc,h.w));e(h);});}else if(cc)h.w.jqmAddClose($(cc,h.w));if(c.toTop&&h.o)h.w.before('<span id="jqmP'+h.w[0]._jqm+'"></span>').insertAfter(h.o);(c.onShow)?c.onShow(h):h.w.show();e(h);return F;},close:function(s){var h=H[s];if(!h.a)return F;h.a=F;if(A[0]){A.pop();if(!A[0])L('unbind');}if(h.c.toTop&&h.o)$('#jqmP'+h.w[0]._jqm).after(h.w).remove();if(h.c.onHide)h.c.onHide(h);else{h.w.hide();if(h.o)h.o.remove();} return F;},params:{}};var s=0,H=$.jqm.hash,A=[],ie6=$.browser.msie&&($.browser.version == "6.0"),F=false,i=$('<iframe src="javascript:false;document.write(\'\');" class="jqm"></iframe>').css({opacity:0}),e=function(h){if(ie6)if(h.o)h.o.html('<p style="width:100%;height:100%"/>').prepend(i);else if(!$('iframe.jqm',h.w)[0])h.w.prepend(i); f(h);},f=function(h){try{$(':input:visible',h.w)[0].focus();}catch(_){}},L=function(t){$()[t]("keypress",m)[t]("keydown",m)[t]("mousedown",m);},m=function(e){var h=H[A[A.length-1]],r=(!$(e.target).parents('.jqmID'+h.s)[0]);if(r)f(h);return !r;},hs=function(w,t,c){return w.each(function(){var s=this._jqm;$(t).each(function() {if(!this[c]){this[c]=[];$(this).click(function(){for(var i in {jqmShow:1,jqmHide:1})for(var s in this[i])if(H[this[i][s]])H[this[i][s]].w[i](this);return F;});}this[c].push(s);});});};})(jQuery);

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
*/

	   
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
            $("#content_url").attr('disabled','disabled');
        }
        else {
                $('#content_title').syncTranslit({destination: 'content_url',caseStyle: 'lower',urlSeparator: '_'});
        }
        
        $("#stop_auto_url").change(function(){ 
            if($(this).is(":checked")){
                $("#content_url").attr('disabled','disabled');
                $('#content_title').unbind();
            }
            /* syncTranslit init */
            else {
                $("#content_url").attr('disabled',false);
                $('#content_title').syncTranslit({destination: 'content_url',caseStyle: 'lower',urlSeparator: '_'});
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