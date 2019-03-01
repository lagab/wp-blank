(function ($) {
    console.log('test');
    /*$('.grid').masonry({
      // options
      itemSelector: '.grid-item',
      gutter: 10,
      percentPosition: true,
    });*/
    jQuery('.gallery').lightGallery({
          //selector: 'a[data-rel^="prettyPhoto"]',
          selector: 'a',
          download: false,
          fullScreen: false,
          pager: false,
          thumbnail:true
        });
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }

})(jQuery);