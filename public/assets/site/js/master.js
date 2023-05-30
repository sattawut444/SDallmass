$(window).load( function() {
    $('#nav-btn-hbg').click(function() { $('body').toggleClass('show-menu'); $(this).toggleClass('open'); });

    /*var myElement2 = document.getElementById('web-nav-mobi');
    var headroom2  = new Headroom(myElement2  ,{ "offset": 80  });
    headroom2.init();*/
});




$(function() {
    var menuTop = 0;//$('.web-header .menu-area').offset().top;
    var loadWidth = $(window).width();
    $(window).bind(' resize ' , function() {
        var currWidth = $(window).width();
        if ((loadWidth<=600 && currWidth>600) || (loadWidth>600 && currWidth<=600)) {
            window.location.reload();
        } 
    })

    $('#mobi-menu-area .more').each(function(pos,el) {
        $(el).find(" > a").click(function(e) {
            e.preventDefault();
            if ( $(el).is('.open') ) {
                $(el).find('.sub-area').slideUp();
                $(el).removeClass('open');
            } else {
                $('#mobi-menu-area .more .sub-area').slideUp();            
                $('#mobi-menu-area .open').removeClass('open');

                $(el).find('.sub-area').slideDown();
                $(el).addClass('open');
            }
        });
    })
})


//var tc;
$(document).ready(function(e) {
	$("#payments").msDropdown({visibleRows:4});
	$("#tech").msDropdown().data("dd");//{animStyle:'none'} /{animStyle:'slideDown'} {animStyle:'show'}		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
												if(val!="")
													window.location = val;
											}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
});
