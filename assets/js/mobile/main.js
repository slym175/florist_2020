jQuery(document).ready(function() {

    var topup = jQuery('.top-up');

    topup.on('click', function(e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    var sync1 = jQuery('#carousel-1');
    var sync2 = jQuery('#carousel-2');
    var slidesPerPage = 3;
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 3000,
        nav: false,
        autoplay: true,
        lazyLoad: true,
        autoplayTimeout: 2000,
        dots: true,
        dotsContainer: '#carousel-custom-dots',
        loop: true,
        responsiveRefreshRate: 200,
        onChanged: syncPosition,
    });

    sync2.owlCarousel({
        items: 3,
        dots: false,
        nav: false,
        smartSpeed: 200,
        slideSpeed: 500,
        responsive: {
            768: {
                items: 5,
            },
        },
        slideBy: slidesPerPage,
        responsiveRefreshRate: 100,
        onInitialized: function() {
            sync2.find(".owl-item").eq(0).addClass("synced");
        },
        onChanged: syncPosition2
    });

    function syncPosition(el) {
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        sync2.find(".owl-item").removeClass("synced").eq(current).addClass("synced");
        sync2.trigger('to.owl.carousel', [current, 100, true]);
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

    var dp_owl = jQuery('.dp-owl-carousel');

    dp_owl.owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        items: 2.5,
        lazyLoad: true,
        responsive: {
            600: {
                items: 4,
            },
            1024: {
                items: 6,
            }
        },
        dotsContainer: '#carousel-dots',
    });

    //Chi tiet san pham
    var owl_pi = jQuery('.owl-product-images');
    owl_pi.owlCarousel({
        loop: false,
        margin: 0,
        dots: false,
        lazyLoad: true,
        autoHeight: true,
        items: 1,
        nav: true,
        navText: [jQuery('.opi-next'), jQuery('.opi-prev')]
    });
    var owl_pg = jQuery('.owl-product-gallery');
    owl_pg.owlCarousel({
        loop: false,
        margin: 0,
        dots: false,
        lazyLoad: true,
        autoHeight: true,
        items: 1,
        nav: true,
        navText: [jQuery('.opg-next'), jQuery('.opg-prev')]
    });

    jQuery('.video-item').click(function(e) {
        e.preventDefault();
        jQuery('#video-preview').addClass('video-preview-opened');
    });

    jQuery('#video-preview .close').click(function(e) {
        jQuery('#video-preview').removeClass('video-preview-opened');
    })

    var dp_owl_2 = jQuery('.dp-owl-carousel-2');
    var dp_owl_3 = jQuery('.dp-owl-carousel-3');

    dp_owl_2.owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        items: 2.5,
        lazyLoad: true,
        responsive: {
            600: {
                items: 4,
            },
            1024: {
                items: 6,
            }
        },
        dotsContainer: '#carousel-dots-2',
    });

    dp_owl_3.owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        items: 2.5,
        lazyLoad: true,
        responsive: {
            600: {
                items: 4,
            },
            1024: {
                items: 6,
            }
        },
        dotsContainer: '#carousel-dots-3',
    });


    jQuery('#tech-show').on('click', function(event) {
        event.preventDefault();
        var tr = jQuery('.ts-table ul li:nth-child(n+6)');
        if (tr.css('display') == 'none') {
            tr.css('display', 'flex');
            jQuery(this).html('Thu gọn <i class="fas fa-chevron-up font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
        } else {
            tr.css('display', 'none');
            jQuery(this).html('Xem thêm <i class="fas fa-chevron-down font-12" style="margin-left: 16px;" aria-hidden="true"></i>')
        }
    });

    if (jQuery('.outstanding-features').height() <= 250) {
        jQuery('.show-hide-text .show-more').removeClass('d-flex').css('display', 'none');
        jQuery('.outstanding-features').addClass('show');
    }

    jQuery('.show-hide-text .show-more').on('click', 'a', function(event) {
        event.preventDefault();
        console.log('hi');
        jQuery('.outstanding-features').toggleClass('show');
    });

    jQuery('.step-show').on('click', function(event) {
        event.preventDefault();
        jQuery('.steps div').css('height', '100%');
        jQuery(this).css('display', 'none');
    });

    // Gio hang
    jQuery('.decrement').on('click', function() {
        var qty = jQuery(this).parent().find('input').val();
        if (qty > 1) {
            var cart_item = jQuery(this).data('cart-item');
            jQuery(this).parent().find('input').val(parseInt(qty) - 1);
            var url = jQuery(this).data('url');
            change_cart_mobile(cart_item, parseInt(qty) - 1, url);
        }
    });

    jQuery('.increment').on('click', function() {
        var qty = jQuery(this).parent().find('input').val();
        var cart_item = jQuery(this).data('cart-item');
        jQuery(this).parent().find('input').val(parseInt(qty) + 1);
        var url = jQuery(this).data('url');
        change_cart_mobile(cart_item, parseInt(qty) + 1, url);
    });

    function change_cart_mobile(cart_item, qty, url) {
        Object.toparams = function ObjecttoParams(obj) {
            var p = [];
            for (var key in obj) {
                p.push(key + '=' + encodeURIComponent(obj[key]));
            }
            return p.join('&');
        };
        myobject = { 'action': 'ajax_qty_cart', 'hash': cart_item, quantity: qty };
        fetch(url, {
                method: 'POST',
                credentials: 'same-origin',
                headers: new Headers({ 'Content-Type': 'application/x-www-form-urlencoded' }),
                body: Object.toparams(myobject),
            })
            .then(function(response) {
                window.location.reload();
            })
            .then(function(data) {
                window.location.reload();
            })
            .catch(function(error) {
                console.log(JSON.stringify(error));
            });
    }

    jQuery('input,textarea').focus(function() {
        jQuery(this).data('placeholder', jQuery(this).attr('placeholder'))
            .attr('placeholder', '');
    }).blur(function() {
        jQuery(this).attr('placeholder', jQuery(this).data('placeholder'));
    });
    // Trang tin tuc 
    var owl_video = jQuery('.video-carousel');
    owl_video.owlCarousel({
        loop: true,
        margin: 0,
        dots: true,
        nav: true,
        lazyLoad: true,
        navText: [jQuery('.v-next'), jQuery('.v-prev')],
        items: 1,
        responsive: {
            768: {
                items: 2,
                margin: 30,
            },
            1024: {
                items: 3,
                margin: 30,
            }
        },
        dotsContainer: '#v-dots-container',
    });
    jQuery('.filter-icon i').click(function(e) {
        e.preventDefault();
        jQuery(this).toggleClass('selected');
        jQuery('.filter-area').toggleClass('d-flex');
    });

    // jQuery('.video-carousel .item').on('click', function(event) {
    //     event.preventDefault();
    //     jQuery("#app-v-preview").css('width', '100%');
    // });

    // Trang danh muc
    jQuery('.show-ads').on('click', function(event) {
        event.preventDefault();
        jQuery('.p-ads-compact').css('display', 'none');
        jQuery('.p-ads-full').css('height', '100%');
    });

    var data_iframe = jQuery('.iframe-location-active').data('iframe');
    jQuery('.htstdm1 .maps-newsun').html(data_iframe);

    jQuery('.mm-chevron').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        // jQuery('.nav-item.mega-menu-open').removeClass('mega-menu-open');
        jQuery(this).parents('.nav-item').toggleClass('mega-menu-open');
    });

    // jQuery(".tabs-cat-news").scrollCenter("a.active", 100);
    jQuery('.navbar-collapse').on('show.bs.collapse', function () {
        jQuery(this).addClass("show");
    }).on('hide.bs.collapse', function () {
        jQuery(this).removeClass("show");
    })

    jQuery('.cat-more').click(function (e){
        e.preventDefault();
        jQuery('.menu-tab').toggleClass('hide');
        jQuery(this).toggleClass('opened');
        if(jQuery(this).hasClass('opened')){
            jQuery(this).html('<i class="fa fa-chevron-up mr-2" aria-hidden="true" style="font-size: 11px;"></i>Thu lại');
        }else{
            jQuery(this).html('<i class="fa fa-chevron-down mr-2" aria-hidden="true" style="font-size: 11px;"></i>Mở rộng');
        }
    })

    jQuery('.mega-submenu-item .mega-menu_lv2 .fa-chevron-down').click(function (e){
        e.preventDefault();
        e.stopPropagation();
        $(this).parent('.mega-menu_lv2').parent('.mega-submenu-item').toggleClass('submenu-closed');
    })

    jQuery('.c-form-check .form-check-input').click(function(e) {
        e.preventDefault();

        if(jQuery(this).prop('checked', true)){
            var url = jQuery(this).data('url');
            var post_type = jQuery(this).data('type');

            jQuery.ajax({
                type: "post",
                dataType: "html",
                url: url,
                data: {
                    action: 'load_payment_methods',
                    post_type: post_type,
                },
                beforeSend: function() {
                    jQuery('.box-info-payment').empty().css('display', 'none');
                },
                success: function(response) {
                    if(response != ''){
                        jQuery(this).parent('.c-form-check').children('.box-info-payment').empty().append(response).css('display', 'block');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            });
        }else{
            jQuery(this).parent('.c-form-check').children('.box-info-payment').empty();
        }
    });

    jQuery('.c-form-check label.form-check-label').click(function(e) {
        e.preventDefault();

        var input = jQuery(this).parent('.c-form-check').children('.form-check-input');
        if(jQuery(input).prop('checked', true)){
            var url = jQuery(input).data('url');
            var post_type = jQuery(input).data('type');

            jQuery.ajax({
                type: "post",
                dataType: "html",
                url: url,
                data: {
                    action: 'load_payment_methods',
                    post_type: post_type,
                },
                beforeSend: function() {
                    jQuery('.box-info-payment').empty().css('display', 'none');
                },
                success: function(response) {
                    if(response != ''){
                        jQuery(input).parent('.c-form-check').children('.box-info-payment').empty().append(response).css('display', 'block');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('The following error occured: ' + textStatus, errorThrown);
                }
            });
        }else{
            jQuery(input).parent('.c-form-check').children('.box-info-payment').empty();
        }
    });
});

function openNav() {
    jQuery("#app-v-preview").css('width', '100%');
}

function closePopup() {
    jQuery("#app-v-preview").css('width', '0%').removeClass('show');
    jQuery(".top-up").removeClass('d-none');
    jQuery('#post_video_title').empty();
    jQuery('#video_play').empty();
    jQuery('#post_video_content').empty();
}

function loadNews(t) {
    var page = jQuery(t).data('pageindex');
    var url = jQuery(t).data('url');
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: url,
        data: {
            action: 'load_mobile_news',
            page: page
        },
        beforeSend: function() {
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function(response) {
            jQuery(t).parents('.d-flex.justify-content-center').removeClass('d-flex').css('display', 'none');
            jQuery('.l-feature-news').append(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

function loadProducts(t) {
    var page = jQuery(t).data('pageindex');
    var url = jQuery(t).data('url');
    var cat_id = jQuery(t).data('cat-id');
    var orderby = jQuery(t).data('orderby');
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: url,
        data: {
            action: 'load_mobile_products',
            page: page,
            cat_id: cat_id,
            orderby: orderby,
        },
        beforeSend: function() {
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function(response) {
            console.log(response);
            jQuery('.list-product').append(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

function loadProductsInCategory(el, load) {
    var url = jQuery(el).data('url');
    var slugg = jQuery(el).data('slugg');
    var page = jQuery(el).data('page');
    var limit = jQuery(el).data('limit');
    var template = 'mobile/layouts/products-in-category-layout';
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: url,
        data: {
            action: 'ajax_load_products_in_category',
            slug: slugg,
            page: page,
            limit: limit,
            template: template
        },
        beforeSend: function() {
            jQuery(el).parents('.catalog-section').children('.cat-product-container').children('.cat-loading').removeClass('d-none');
            if(!load) {
                jQuery(el).parents('.catalog-section').children('.cat-product-container').children('.cat-loading').children('img').css({"bottom": "50px", "top": "unset"});
            }else{
                jQuery(el).parents('.catalog-section').children('.cat-product-container').children('.cat-loading').children('img').css({"bottom": "unset", "top": "0"});
            }
        },
        success: function(response) {  
            if(load) {
                jQuery(el).parents('.catalog-nav').children('.nav-item').children('.nav-link.active').removeClass('active');
                jQuery(el).addClass('active');
                jQuery(el).parents('.catalog-section').children('.cat-product-container').empty().append(response.substr(0, response.length - 1 ));
            }else {
                jQuery(el).parents('.catalog-section').children('.cat-product-container').children('.cat-loading').addClass('d-none');
                jQuery(el).parents('.catalog-section').children('.cat-product-container').append(response.substr(0, response.length - 1 ));
                jQuery(el).remove();
            }        
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

function loadPostsInCategory(el, load) {
    var url = jQuery(el).data('url');
    var slugg = jQuery(el).data('slugg');
    var page = jQuery(el).data('page');
    var limit = jQuery(el).data('limit');
    var template = 'mobile/layouts/posts-in-category-layout';
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: url,
        data: {
            action: 'ajax_load_posts_in_category',
            slug: slugg,
            page: page,
            limit: limit,
            template: template
        },
        beforeSend: function() {
            jQuery(el).empty().append('<i class="fas fa-spinner"></i>')
        },
        success: function(response) {  
            jQuery(el).parents('.more-posts').removeClass('d-flex').addClass('d-none');
            jQuery(el).parents('.more-posts').parents('.news-video').append(response);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}