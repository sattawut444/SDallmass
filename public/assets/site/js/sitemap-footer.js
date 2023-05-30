var master = {
    showFooterQuickLink : function() {
        $('#web-footer-fixed').animate({ bottom:-50 } , 400 , function() { $('#web-footer-sitemap').animate({ bottom:0 } , 300) });
    } ,
    hideFooterQuickLink : function() {
        $('#web-footer-sitemap').animate({ bottom:-650 } , 400 , function() { $('#web-footer-fixed').animate({ bottom:0 } , 300) });
    } ,

    showFooterProduct : function() {
        $('#web-footer-fixed').animate({ bottom:-50 } , 400 , function() { $('.web-footer-project').animate({ bottom:0 } , 300) });
    } ,
    hideFooterProduct : function() {
        $('#web-footer-project').animate({ bottom:-500 } , 400 , function() { $('#web-footer-fixed').animate({ bottom:0 } , 300) });
    }
    
}