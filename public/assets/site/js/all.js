$(document).ready(function($){
  /*
  $('ul.menu-left li').mouseover(function (e) {
      e.stopPropagation();
      $('>.actions', this).css('visibility', 'visible');
  });
  $('ul.menu-left li').mouseout(function (e) {
      e.stopPropagation();
      $('.actions').css('visibility', 'hidden');
  });
  */
});
function loadtiresizeleft(t){
  var tb = $(t);
  var FullPath = $('#fraAjax input[name=fullpathweb]').val();
  var json = (function () {
		var json = null;
    var page = 1;
		$.ajax({
      'beforeSend': function(){
					tb.LoadingOverlay("show");
			},
			'async': false,
			'global': false,
			'type':'POST',
      'data':{page:page},
			'url': FullPath+'ajax/ajax-loadtiresize-json.php',
			'dataType': "json",
			'success': function (data) {
				json = data;
			},
		  complete: function(){
		    tb.LoadingOverlay("hide");
		  }
		});
		return json;
	})();
  var len = json['result'].length;
  var html = '<div class="actions">Test '+len+'</div>';
  tb.append(html);
}
function topsearch(t){
  var tb = $(t);
  var valsearch = tb.find('input[type=text]');
  if($.trim(valsearch.val())==''){
    valsearch.focusTextToEnd();
    return false;
  }else{
    return true;
  }
}
function check_numalertthis(e,t){
   var keyPressed;
   if(window.event){
      keyPressed = window.event.keyCode; // IE
	  if((keyPressed==97 && e.ctrlKey === true) || (e.ctrlKey == true && (keyPressed == '118' || keyPressed == '86')) || (e.ctrlKey == true && (keyPressed == '99' || keyPressed == '67')) || (e.ctrlKey == true && (keyPressed == '120' || keyPressed == '88'))){
		 //alert('TT');
	  }else{
		if (((keyPressed < 48) || (keyPressed > 57)) && (keyPressed!=45) && (keyPressed!=46) && (keyPressed!=8) && (keyPressed!=0) && (keyPressed!=13)) {
		   jAlert('input number only.', 'Alert Dialog',function(){
				$(t).focus();
			});
			//alert('input number only.');
			window.event.returnValue = false;
		}
	  }
   }else{
      keyPressed = e.which; // Firefox
	  if((keyPressed==97 && e.ctrlKey === true) || (e.ctrlKey == true && (keyPressed == '118' || keyPressed == '86')) || (e.ctrlKey == true && (keyPressed == '99' || keyPressed == '67')) || (e.ctrlKey == true && (keyPressed == '120' || keyPressed == '88'))){
		 //alert('TT');
	  }else{
		if (((keyPressed < 48) || (keyPressed > 57)) && (keyPressed!=45) && (keyPressed!=46) && (keyPressed!=8) && (keyPressed!=0) && (keyPressed!=13)) {
			jAlert('input number only.', 'Alert Dialog',function(){
				$(t).focus();
			});
			//alert('input number only.');
			keyPressed = e.preventDefault();
		}
	  }
    }
}
function chkPassKey(data){
	var upperCase= new RegExp('[A-Z]');
	var lowerCase= new RegExp('[a-z]');
	var numbers = new RegExp('[0-9]');
	var xsp = new RegExp('[!@#$%^&*()_+-,/?<>.:;]');
	//if(/^[a-zA-Z0-9]*$/.test(data) == true) {
	if(data.match(upperCase) && data.match(lowerCase) && data.match(numbers)) {
		//if(check(data) == false){
		/*
		if(!data.match(xsp)){
			return false;
		}else{
			return true;
		}
		*/
		return true;
	}else{
		return false;
	}
}
function isEmail(str) {
  var supported = 0;
  if (window.RegExp) {
    var tempStr = "a";
    var tempReg = new RegExp(tempStr);
    if (tempReg.test(tempStr)) supported = 1;
  }
  if (!supported)
  return (str.indexOf(".") > 2) && (str.indexOf("@") > 0);
  var r1 = new RegExp("(@.*@)|(\\.\\.)|(@\\.)|(^\\.)");
  var r2 = new RegExp("^.+\\@(\\[?)[a-zA-Z0-9\\-\\.]+\\.([a-zA-Z]{2,3}|[0-9]{1,3})(\\]?)$");
  return (!r1.test(str) && r2.test(str));
}
function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}
(function($){
    $.fn.focusTextToEnd = function(){
        this.focus();
        var $thisVal = this.val();
        this.val('').val($thisVal);
        return this;
    }
}(jQuery));
function loadcarbrand(to){
  var to = $(to);
  var json = (function () {
		var json = null;
    var page = 1;
		$.ajax({
			'async': false,
			'global': false,
			'type':'POST',
      'data':{page:page},
			'url': '../ajax/ajax-loadcarbrand-json.php',
			'dataType': "json",
			'success': function (data) {
				json = data;
			}
		});
		return json;
	})();
  var len = json['result'].length;
  var html = '';
  if(len>0){
    for (var i = 0; i< len; i++) {
      html += '<option value="'+json['result'][i].valueCode+'">'+json['result'][i].valueName+'</option>';
    }
  }
  to.html(html);
}
function loadcarmodel(to,carcode){
  var to = $(to);
  var json = (function () {
		var json = null;
    var page = 1;
		$.ajax({
			'async': false,
			'global': false,
			'type':'POST',
      'data':{page:page,carcode:carcode},
			'url': '../ajax/ajax-loadcarmodel-json.php',
			'dataType': "json",
			'success': function (data) {
				json = data;
			}
		});
		return json;
	})();
  var len = json['result'].length;
  var html = '';
  if(len>0){
    for (var i = 0; i< len; i++) {
      html += '<option value="'+json['result'][i].valueModelCode+'">'+json['result'][i].valueModelName+'</option>';
    }
  }
  to.html(html);
}
