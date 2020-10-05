jQuery(function() {

    // Chung
    var topup = jQuery('.top-up');

    topup.on('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // var cate = jQuery('.cate');
    // cate.parent('div').hover(function () {
    //         jQuery('.cate-field').css('display', 'block');
    //     }, function () {
    //         // jQuery('.cate-field').css('display', 'none');
    //     }
    // );

    // Trang chu
    var dp_owl = jQuery('.dp-owl-carousel');

    dp_owl.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        navText: [
            '<img class="img-fluid" src="/wp-content/themes/newsun/assets/images/next(1).svg" alt="Next Status">',
            '<img class="img-fluid" src="/wp-content/themes/newsun/assets/images/next(2).svg" alt="Previous Status">'
        ],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        },
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true
    });

    var sync1 = jQuery("#carousel-1");
    var sync2 = jQuery("#carousel-2");
    var slidesPerPage = 5; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        nav: false,
        autoplay: false,
        autoplayTimeout: 3000,
        dots: false,
        loop: true,
        autoHeight: true,
        responsiveRefreshRate: 200,
        onChanged: syncPosition,
    });
    jQuery('#carousel-1.owl-carousel.owl-loaded').css('display', 'block');
    sync2.owlCarousel({
        items: 5,
        dots: false,
        nav: false,
        smartSpeed: 200,
        slideSpeed: 500,
        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
        responsiveRefreshRate: 100,
        onInitialized: function() {
            sync2.find(".owl-item").eq(0).addClass("synced");
        },
        onChanged: syncPosition2
    });

    jQuery('input,textarea').focus(function(){
       jQuery(this).data('placeholder', jQuery(this).attr('placeholder'))
              .attr('placeholder','');
    }).blur(function(){
       jQuery(this).attr('placeholder', jQuery(this).data('placeholder'));
    });

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }
        //end block
        
        sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced");
        // var onscreen = sync2.find('.owl-item.active').length - 1;
        // var start = sync2.find('.owl-item.active').first().index();
        // var end = sync2.find('.owl-item.active').last().index();
        sync2.trigger('to.owl.carousel', [current, 100, true]);
        // if (current > end) {
        //     sync2.trigger('to.owl.carousel', [current, 100, true]);
        // }
        // if (current < start) {
        //     sync2.trigger('to.owl.carousel', [current - onscreen, 100, true]);
        // }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.trigger('to.owl.carousel', [number, 100, true]);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = jQuery(this).index();
        sync1.trigger('to.owl.carousel', [number, 100, true]);
    });

    jQuery('.post-content-opened').on('click', function(e) {
        e.preventDefault();
        jQuery('.detail-post-content').toggleClass('post-content-open');
        jQuery(this).css('display', 'none');
    });

    // Trang tin tuc
    var news_owl = jQuery('.news-owl-carousel');
    news_owl.owlCarousel({
        items: 2,
        loop: true,
        margin: 30,
        // autoplay: true,
        // autoplayTimeout: 2000,
        // autoplayHoverPause: true
    });

    jQuery('.messenger').click(function(event) {
        event.preventDefault();
        jQuery('#myForm').css('display', 'block');
    });

    jQuery('.cancel').click(function(event) {
        event.preventDefault();
        jQuery('#myForm').css('display', 'none');
    });

    jQuery('.o-video-popup').on('click', function(event) {
        event.preventDefault();
        jQuery(this).children('.video-popup').css('display', 'block');
    });

    // Gio hang
    jQuery('.decrement').on('click', function(e) {
        e.preventDefault();
        var self = jQuery(this);
        var input = self.closest('div.quantity-wrapper').find('input.quantity');
        var value = parseInt(input.val());
        if (value > 1) {
            value = value - 1;
        } else {
            value = 0;
        }
        input.val(value);
    });

    jQuery('.increment').on('click', function(e) {
        e.preventDefault();
        var self = jQuery(this);
        var input = self.closest('div.quantity-wrapper').find('input.quantity');
        var value = parseInt(input.val());
        input.val(value + 1);
    });

    if (jQuery('.outstanding-features').height() <= 250) {
        jQuery('.show-hide-text .show-more').removeClass('d-flex').css('display', 'none');
        jQuery('.outstanding-features').addClass('show');
    }

    // Trang san pham
    var p = jQuery('.pre-img-carousel');
    p.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        items: 1,
    });

    var p_img = jQuery('#pills-images .pre-img-carousel');
    var p_vd = jQuery('#pills-videos .pre-img-carousel');

    p_img.on('click', '.item', function(e){
        e.preventDefault();
        jQuery('#img-preview').css('display', 'block');
    });

    p_vd.on('click', '.item', function(e){
        e.preventDefault();
        jQuery('#video-preview').css('display', 'block');
    });

    jQuery('#img-preview').on('click', '.close', function(e){
        e.preventDefault();
        jQuery('#img-preview').css('display', 'none');
    });

    jQuery('#video-preview').on('click', '.close', function(e){
        e.preventDefault();
        jQuery('#video-preview').css('display', 'none');
    });

    var pre = jQuery('.pre-carousel');
    pre.owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoHeight:true,
        navText: [
            '<i class="fas fa-arrow-left"></i>',
            '<i class="fas fa-arrow-right"></i>'
        ],
        dots: false,
        items: 1,
    });

    // jQuery('#tech-show').on('click', function(event) {
    //     event.preventDefault();
    //     var ts = jQuery('.tech-section > div');
    //     var c = ts.children('.tr').length;
    //     var tr = jQuery('.tech-section .tr:nth-child(n+6)');

    //     if(tr.css('display') == 'none'){
    //         tr.css('display', 'flex');
    //         jQuery(this).html('Thu gọn <i class="fas fa-chevron-up font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
    //     } else {
    //         tr.css('display', 'none');
    //         jQuery(this).html('Xem thêm <i class="fas fa-chevron-down font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
    //     }
    // });

    jQuery('#tech-show').on('click', function(event) {
        event.preventDefault();
        var tr = jQuery('.ts-table ul li:nth-child(n+6)');
        if(tr.css('display') == 'none'){
            tr.css('display', 'flex');
            jQuery(this).html('Thu gọn <i class="fas fa-chevron-up font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
        } else {
            tr.css('display', 'none');
            jQuery(this).html('Xem thêm <i class="fas fa-chevron-down font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
        }
    });

    jQuery('.show-hide-text .show-more').on('click', 'a', function(event) {
        event.preventDefault();
        jQuery('.show-hide-text p').css('display', 'block');
        jQuery(this).css('display', 'none');
    });

    // Loc san pham
    jQuery('.m-tab-menu .nav-link').on('click', function(e){
        e.preventDefault();
        jQuery(this).toggleClass('active');
        jQuery('.m-tab-menu .nav-link.active ~ .nav-submenu').toggleClass('d-block');
    });

    jQuery('.m-tab-menu .nav-submenu .nav-link').on('click', function(e){
        e.preventDefault();
        jQuery('.m-tab-menu .nav-link').removeClass('active');
        jQuery(this).addClass('active');
        jQuery('.m-tab-menu .nav-submenu').removeClass('d-block');
        jQuery(this).parent().addClass('d-block');
    });
});

function PopDown() {
    jQuery('#video-popup').css('width', "0%");
    jQuery('#video-popup').empty();
    // jQuery("body").css({"position": "static", "overflow": "auto"});
}