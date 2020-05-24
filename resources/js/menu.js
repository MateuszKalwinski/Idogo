(function(t, e) {
    ! function(t) {
        t(window).on("scroll", (function() {
            var e = t(".navbar");
            if (e.length && (e.offset().top > 500)){
                t(".scrolling-navbar").addClass("top-nav-collapse");
                $('.nav-btn-search').css({
                    'opacity':1,
                    'top':'0px',
                })


            }else{
                t(".scrolling-navbar").removeClass("top-nav-collapse");
                $('.nav-btn-search').css({
                    'opacity':0,
                    'top':'-100px',
                });
            }
        }))
    }(jQuery)
})(jQuery);


