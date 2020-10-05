function loadNews(t) {
    var page = jQuery(t).data('pageindex');
    var url = jQuery(t).data('url');
    jQuery.ajax({
        type: "post",
        dataType: "html",
        url: url,
        data: {
            action: 'load_news',
            page: page
        },
        beforeSend: function () {
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function (response) {
            console.log(response)
            jQuery(t).remove();
            jQuery('.list-news').append(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
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
            action: 'load_products',
            page: page,
            cat_id: cat_id,
            orderby: orderby,
        },
        beforeSend: function () {
            // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
        },
        success: function (response) {
            console.log(response)
            jQuery(t).remove();
            jQuery('.list-product').append(response);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

function loadProductsInCategory(el, load, template = "") {
    var url = jQuery(el).data('url');
    var slugg = jQuery(el).data('slugg');
    var page = jQuery(el).data('page');
    var limit = jQuery(el).data('limit');
    var template = template == "" ? 'layouts/products-in-category-layout' : template;

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
            jQuery(el).parents('.devices .container').children('.devices-container').children('.cat-loading').removeClass('d-none');
            if(load) {
                jQuery(el).parents('.bg-nav').children('.nav-item').children('.nav-link.active').removeClass('active');
                jQuery(el).addClass('active');
                jQuery(el).parents('.devices .container').children('.devices-container').children('.cat-loading').children('img').css({"bottom": "unset", "top": "0"});
            }  
            else {
                jQuery(el).parents('.devices .container').children('.devices-container').children('.cat-loading').children('img').css({"bottom": "50px", "top": "unset"});
            }
        },
        success: function(response) {  
            // console.log(response);
            if(load) {
                jQuery(el).parents('.devices .container').children('.devices-container').empty().append(response);
            } else {
                jQuery(el).parents('.devices .container').children('.devices-container').children('.cat-loading').addClass('d-none');
                jQuery(el).parents('.devices .container').children('.devices-container').append(response);
                jQuery(el).remove();
            }      
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('The following error occured: ' + textStatus, errorThrown);
        }
    });
}

jQuery(function () {
    jQuery(".product-attribute").change(function () {
        var url = jQuery(this).data('url');
        window.location.href = url;
    });

    jQuery(".orderby-product").change(function () {
        var url = jQuery(this).data('url');
        window.location.href = url;
    });

    var iframe_active = jQuery('.iframe-location-active').data('iframe');
    jQuery('.maps-newsun').append(iframe_active);
    var location_name = '';
    jQuery('.location-name').hover(function () {
        var iframe = jQuery(this).data('iframe');
        var name = jQuery(this).data('name');
        if (location_name != name) {
            location_name = name;
            jQuery('.maps-newsun').empty();
            jQuery('.maps-newsun').append(iframe);
        }
    });

    var newLine, el, title;
    var ToC = '';

    jQuery(".detail-post-content h2, .detail-post-content h3, .detail-post-content h4, .detail-post-content h5").each(function (index) {
        el = jQuery(this);
        el.attr('id', 'step-' + (index + 1));
        el.addClass('py-4 font-18');
        title = el.text();
        newLine = '<div>\n' +
            '                                    <a href="#step-' + (index + 1) + '">' + (index + 1) + '. ' + title + '</a>\n' +
            '                                </div>';

        ToC += newLine;

    });
    if (ToC) {
        jQuery(".muc_luc").prepend(ToC);
    } else {
        jQuery('.muc_luc_header').css('display', 'none');
    }

    jQuery('.post_video').click(function (e) {
        e.preventDefault();
        var url = jQuery(this).data('url');
        var post_id = jQuery(this).data("post_id");
        jQuery('#video-popup').css('width', "100%");
        jQuery.ajax({
            type: "post",
            dataType: "html",
            url: url,
            data: {
                action: "get_post_detail",
                post_id: post_id,
            },
            beforeSend: function () {
                // Có thể thực hiện công việc load hình ảnh quay quay trước khi đổ dữ liệu ra
            },
            success: function (response) {
                document.getElementById("video-popup").innerHTML = response;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log('The following error occured: ' + textStatus, errorThrown);
            }
        });


    })
})

