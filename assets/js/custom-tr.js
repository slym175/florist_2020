jQuery(function () {
  jQuery('input.input-qty').each(function () {
    var self = jQuery(this)
    var qty = self.parent().find('.is-form')
    var min = Number(self.attr('min'))
    var max = Number(self.attr('max'))
    if (min == 0) {
      var d = 0
    } else d = min
    jQuery(qty).on('click', function () {
      if (self.hasClass('minus')) {
        if (d > min) d += -1
      } else if (self.hasClass('plus')) {
        var x = Number(self.val()) + 1
        if (x <= max) d += 1
      }
      self.attr('value', d).val(d)
    })
  });

  jQuery(".video-for .video-item .title").click(function () {
    jQuery(this).css("display", "none");
  });

  jQuery('.video-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.video-item-nav',
    prevArrow: "<button class='prev slick-prev'><img class='left-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/left.png' alt=''></button>",
    nextArrow: "<button class='next slick-next'><img class='right-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/right.png' alt=''></button>",

  });
  jQuery('.video-item-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.video-for',
    margin: '30px',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  jQuery('.cate-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.cate-nav',
    prevArrow: "<button class='prev slick-prev'><img class='left-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/left.png' alt=''></button>",
    nextArrow: "<button class='next slick-next'><img class='right-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/right.png' alt=''></button>",

  });
  jQuery('.cate-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.cate-for',
    margin: '30px',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  /* slider chi tiet san pham */
  jQuery('.images-popup').slick({
    dots: false,
    slidesToShow: 1,
    /*autoplay: true,*/
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  jQuery('.images-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.images-nav',
    prevArrow: "<button class='prev slick-prev'><img class='left-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/left.png' alt=''></button>",
    nextArrow: "<button class='next slick-next'><img class='right-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/right.png' alt=''></button>",

  });
  jQuery('.images-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.images-for',
    margin: '30px',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  jQuery(".humberger-menu").click(function () {
    jQuery(".sub-menu").fadeToggle("slow");
  });
  jQuery(".close-mb").click(function () {
    jQuery(".sub-menu").fadeToggle("slow");
  });
  jQuery(".sub-menu li").click(function () {
    jQuery(this).find(".list-sub").fadeToggle("slow");
    jQuery(this).addClass("active");
  });
  /* back to top */
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 500) {
      jQuery('.backtotop').fadeIn();
    } else {
      jQuery('.backtotop').fadeOut();
    }
  });
  jQuery('.backtotop').click(function () {
    jQuery('html, body').animate({
      scrollTop: 0
    }, 800);
    return false;
  });
  /* back to top */

  jQuery('.block__title').click(function (event) {
    if (jQuery('.block').hasClass('one')) {
      jQuery('.block__title').not(jQuery(this)).removeClass('active');
      jQuery('.block__text').not(jQuery(this).next()).slideUp(300);
    }
    jQuery(this).toggleClass('active').next().slideToggle(300);
  });
  jQuery(".close").click(function () {
    jQuery(".slider-popup").css("display", "none");
  });
  jQuery(".images-for .item").click(function () {
    jQuery(".slider-popup").css("display", "block");
  });

  jQuery('.block-title').click(function (event) {
    if (jQuery('.block-mb').hasClass('one')) {
      jQuery('.block-title').not(jQuery(this)).removeClass('active');
      jQuery('.block-text').not(jQuery(this).next()).slideUp(300);
    }
    jQuery(this).toggleClass('active').next().slideToggle(300);
  });

  jQuery('.slider-post').slick({
    dots: true,
    slidesToShow: 3,
    /*autoplay: true,*/
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    jQuery('.slider-post').slick('setPosition');
  });
  
  /* slider homepage */
  jQuery('.slider-pc').slick({
    dots: true,
    slidesToShow: 1,
    /*  autoplay: true,*/
    prevArrow: "<button class='prev slick-prev'><img class='left-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/left.png' alt=''></button>",
    nextArrow: "<button class='next slick-next'><img class='right-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/right.png' alt=''></button>",
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  
  /* slide product homepage */
  jQuery('.slider-product').slick({
    dots: true,
    slidesToShow: 4,
    /*autoplay: true,*/
    responsive: [{
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    }, ]
  });
  jQuery('.product-grid-slider-mb').slick({
    dots: true,
    slidesToShow: 1,
    /*autoplay: true,*/
  });
  jQuery('.product-grid-mb-2').slick({
    dots: true,
    slidesToShow: 1,
    /*autoplay: true,*/
  });
  jQuery(document).ready(function (jQuery) {
    var jQueryfilter = jQuery('.header-mb');
    var jQueryfilterSpacer = jQuery('<div />', {
      "class": "vnkings-spacer",
      "height": jQueryfilter.outerHeight()
    });
    if (jQueryfilter.size()) {
      jQuery(window).scroll(function () {
        if (!jQueryfilter.hasClass('hd-mb') && jQuery(window).scrollTop() > jQueryfilter.offset().top) {
          jQueryfilter.before(jQueryfilterSpacer);
          jQueryfilter.addClass("hd-mb");
        } else if (jQueryfilter.hasClass('hd-mb') && jQuery(window).scrollTop() < jQueryfilterSpacer.offset().top) {
          jQueryfilter.removeClass("hd-mb");
          jQueryfilterSpacer.remove();
        }
      });
    }
  });
  jQuery('.box-preview').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    fade: true,
    asNavFor: '.box-flex',
    prevArrow: "<button class='prev slick-prev'><img class='left-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/left.png' alt=''></button>",
    nextArrow: "<button class='next slick-next'><img class='right-arrow ' src='/wordpress/wp-content/themes/florist/assets/img/right.png' alt=''></button>",
  });
  jQuery('.box-flex').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.box-preview',
    dots: false,
    centerMode: true,
    focusOnSelect: true
  });
  jQuery(".box-preview").on('click', '.box-img-preview', function () {
    var dataSilde = jQuery(this).attr('data-slide');
    if (dataSilde == undefined) {
      return false;
    }
    var elm = '.main-overlay-slick[data-name=' + dataSilde + ']';
    jQuery(elm).addClass('active')
    jQuery(".box-overlay").removeClass('hide');
    jQuery(".box-overlay .icon-close-overlay").attr('data-slide', dataSilde);
    setTimeout(function () {
      setSlick(elm);
      jQuery(".box-overlay").animate({
        'opacity': '1'
      });
    }, 50)
  });
  jQuery(".box-overlay .icon-close-overlay").click(function () {
    var dataSilde = jQuery(this).attr('data-slide');
    if (dataSilde == undefined) {
      return false;
    }
    var elm = '.main-overlay-slick[data-name=' + dataSilde + ']';
    jQuery(elm).removeClass('active')
    unSlick(elm);
    jQuery(".box-overlay").addClass('hide').css({
      'opacity': ''
    });
  });
});




/* slider post */

/*jQuery(document).ready(function(jQuery) {
  var jQueryfilter = jQuery('.header-pc');
  var jQueryfilterSpacer = jQuery('<div />', {
    "class": "vnkings-spacer",
    "height": jQueryfilter.outerHeight()
  });
  if (jQueryfilter.size())
  {
    jQuery(window).scroll(function ()
    {
      if (!jQueryfilter.hasClass('hd-mb') && jQuery(window).scrollTop() > jQueryfilter.offset().top)
      {
        jQueryfilter.before(jQueryfilterSpacer);
        jQueryfilter.addClass("hd-mb");
      }
      else if (jQueryfilter.hasClass('hd-mb')  && jQuery(window).scrollTop() < jQueryfilterSpacer.offset().top)
      {
        jQueryfilter.removeClass("hd-mb");
        jQueryfilterSpacer.remove();
      }
    });
  }
});*/







/**/
/*jQuery(".box-img-nano").on('click', '.box-img', function(){
  var idElm = jQuery(this).attr('data-id');
  if(idElm == undefined){
    return false;
  }
  var indexElm = jQuery(this).index();
  indexElm = parseInt(indexElm) + 1;
  console.log(indexElm)
  jQuery(".box-preview").find(".slick-dots").find('li:nth-child(' + indexElm + ')').click();
  jQuery(".box-img-nano").find('.box-img').removeClass('active');
  jQuery(this).addClass('active');
  // jQuery(".box-preview").find(".box-img-preview").removeClass('show');
  // jQuery(".box-preview").find("#" + idElm).addClass('show');
});*/

jQuery(document).ready(function () {
  setSlick('.box-preview')
  setTimeout(function () {
    jQuery(".box-img-nano").find(".box-img.default-view").click();
  }, 50)
})

function setSlick(elm) {
  jQuery(elm).slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
}

function unSlick(elm) {
  //'.main-overlay-slick'
  jQuery(elm).slick('unslick')
}