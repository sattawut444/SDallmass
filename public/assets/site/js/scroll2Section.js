(function(t){var e=function(e,i){function o(t){return u.indexOf(t)!=-1}function r(t){var e=d.filter("[href$='#!"+t+"']");d.not(e).closest(i.activeParent).removeClass(i.activeClass),e.closest(i.activeParent).addClass(i.activeClass),f.trigger("update",e),h=!0}function n(e){var o=t("#"+e);if(o.length>0){var n=o.attr("data-padding")||0,a=o.offset().top-parseInt(n)-c;h=!1,t("body").addClass("scrolling"),t("html, body").stop().animate({scrollTop:a},i.duration,function(){var i="#!"+e;t("body").removeClass("scrolling"),window.history&&window.history.pushState&&(history.pushState("",document.title,i),r(e),h=!0)})}}var a=(window.matchMedia("(max-width: 767px)").matches,/Android|webOS|iPhone|iPad|BlackBerry|Windows Phone|Opera Mini|IEMobile|Mobile/i.test(navigator.userAgent),t(e)),s=(a.data(),t(window)),l=t(e),c=i.offsetTop||0,h=!0,f=t(i.menu),d=f.find("a[data-section]"),u=[],p=null,v=(t(document).scrollTop(),s.scrollTop(),i.useAffix||!1);if(d.each(function(){var e=t(this).attr("href").toString().str2Hash().clearHash();u.push(e)}),l.each(function(){var e=t(this);s.scroll(function(){var i=e.offset();i.top;if(v&&(c=f.outerHeight()),s.scrollTop()+c>=e.offset().top&&e.offset().top+e.height()-c>s.scrollTop()&&h){var n=e.attr("id"),a=o(n);if(!n.length||p==="#!"+n||!a)return!0;p="#!"+n,t("body").trigger("visibleSection",n),r(n),window.history&&window.history.pushState&&history.pushState("",document.title,p)}})}),d.click(function(e){h=!1;var o=t(this),a=o.attr("href").str2Hash().clearHash();return!a||(o.closest(i.activeParent).addClass(i.activeClass),r(a),n(a),e.preventDefault(),!1)}),window.location.hash){p=window.location.hash.clearHash();var g=d.filter("[href$='#!"+p+"']");1==g.length&&g.trigger("click"),h=!1}return f};String.prototype.clearHash=function(t){return this.replace("#!","")},String.prototype.str2Hash=function(t){var e=this.indexOf("#!");if(e==-1)return this;var i=this.length;return this.slice(e,i)},t.fn.scroll2Section=function(i){return i=t.extend({},t.fn.scroll2Section.options,i),t(this).hasClass("loaded")?this:new e(this,i)},t.fn.scroll2Section.options={menu:"#menu",offSetTop:0,activeClass:"active",activeParent:"li",duration:1e3}})(jQuery);