$('input.input-qty').each(function() {
  var $this = $(this),
  qty = $this.parent().find('.is-form'),
  min = Number($this.attr('min')),
  max = Number($this.attr('max'))
  if (min == 0) {
    var d = 0
  } else d = min
  $(qty).on('click', function() {
    if ($(this).hasClass('minus')) {
      if (d > min) d += -1
    } else if ($(this).hasClass('plus')) {
      var x = Number($this.val()) + 1
      if (x <= max) d += 1
    }
  $this.attr('value', d).val(d)
})
});
$(document).ready(function(){
  $(".video-for .video-item .title").click(function(){
    $(this).css("display", "none");
  });

  $('.video-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.video-item-nav',
    prevArrow:"<button class='prev slick-prev'><img class='left-arrow ' src='assets/img/left.png' alt=''></button>",
    nextArrow:"<button class='next slick-next'><img class='right-arrow ' src='assets/img/right.png' alt=''></button>",

  });
  $('.video-item-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.video-for',
    margin: '30px',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
  });
  $('.cate-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.cate-nav',
    prevArrow:"<button class='prev slick-prev'><img class='left-arrow ' src='assets/img/left.png' alt=''></button>",
    nextArrow:"<button class='next slick-next'><img class='right-arrow ' src='assets/img/right.png' alt=''></button>",

  });
  $('.cate-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.cate-for',
    margin: '30px',
    dots: true,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
  });
  /* slider chi tiet san pham */
  $('.images-popup').slick({
    dots: false,
    slidesToShow: 1,
    /*autoplay: true,*/
    responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        slidesToShow: 1
      }
    },
    ]
  });
  $('.images-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    fade: true,
    asNavFor: '.images-nav',
    prevArrow:"<button class='prev slick-prev'><img class='left-arrow ' src='assets/img/left.png' alt=''></button>",
    nextArrow:"<button class='next slick-next'><img class='right-arrow ' src='assets/img/right.png' alt=''></button>",

  });
  $('.images-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.images-for',
    margin: '30px',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
  });
  $(".humberger-menu").click(function () {
    $(".sub-menu").fadeToggle("slow");
  });
  $(".close-mb").click(function () {
    $(".sub-menu").fadeToggle("slow");
  });
  $(".sub-menu li").click(function () {
    $(this).find(".list-sub").fadeToggle("slow");
    $(this).addClass("active");
  });
  /* back to top */
  $(window).scroll(function(){
    if ($(this).scrollTop() > 500) {
      $('.backtotop').fadeIn();
    } else {
      $('.backtotop').fadeOut();
    }
  });
  $('.backtotop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  /* back to top */

  $('.block__title').click(function(event) {
    if($('.block').hasClass('one')){
      $('.block__title').not($(this)).removeClass('active');
      $('.block__text').not($(this).next()).slideUp(300);
    }
    $(this).toggleClass('active').next().slideToggle(300);
  });
  $(".close").click(function(){
    $(".slider-popup").css("display","none");
  });
  $(".images-for .item").click(function(){
    $(".slider-popup").css("display","block");
  });

  $('.block-title').click(function(event) {
    if($('.block-mb').hasClass('one')){
      $('.block-title').not($(this)).removeClass('active');
      $('.block-text').not($(this).next()).slideUp(300);
    }
    $(this).toggleClass('active').next().slideToggle(300);
  });
  
});





/* slider post */
$('.slider-post').slick({
  dots: true,
  slidesToShow: 3,
  /*autoplay: true,*/
  responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
});
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  $('.slider-post').slick('setPosition');
});

/* slider homepage */
$('.slider-pc').slick({
  dots: true,
  slidesToShow: 1,
/*  autoplay: true,*/
  prevArrow:"<button class='prev slick-prev'><img class='left-arrow ' src='assets/img/left.png' alt=''></button>",
  nextArrow:"<button class='next slick-next'><img class='right-arrow ' src='assets/img/right.png' alt=''></button>",
  responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
});

/* slide product homepage */
$('.slider-product').slick({
  dots: true,
  slidesToShow: 4,
  /*autoplay: true,*/
  responsive: [
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          centerMode: true,
          slidesToShow: 1
        }
      },
    ]
});
$('.product-grid-slider-mb').slick({
  dots: true,
  slidesToShow: 1,
  /*autoplay: true,*/
});
$('.product-grid-mb-2').slick({
  dots: true,
  slidesToShow: 1,
  /*autoplay: true,*/
});
jQuery(document).ready(function($) {
  var $filter = $('.header-mb');
  var $filterSpacer = $('<div />', {
    "class": "vnkings-spacer",
    "height": $filter.outerHeight()
  });
  if ($filter.size())
  {
    $(window).scroll(function ()
    {
      if (!$filter.hasClass('hd-mb') && $(window).scrollTop() > $filter.offset().top)
      {
        $filter.before($filterSpacer);
        $filter.addClass("hd-mb");
      }
      else if ($filter.hasClass('hd-mb')  && $(window).scrollTop() < $filterSpacer.offset().top)
      {
        $filter.removeClass("hd-mb");
        $filterSpacer.remove();
      }
    });
  }
});
/*jQuery(document).ready(function($) {
  var $filter = $('.header-pc');
  var $filterSpacer = $('<div />', {
    "class": "vnkings-spacer",
    "height": $filter.outerHeight()
  });
  if ($filter.size())
  {
    $(window).scroll(function ()
    {
      if (!$filter.hasClass('hd-mb') && $(window).scrollTop() > $filter.offset().top)
      {
        $filter.before($filterSpacer);
        $filter.addClass("hd-mb");
      }
      else if ($filter.hasClass('hd-mb')  && $(window).scrollTop() < $filterSpacer.offset().top)
      {
        $filter.removeClass("hd-mb");
        $filterSpacer.remove();
      }
    });
  }
});*/







/**/
/*$(".box-img-nano").on('click', '.box-img', function(){
  var idElm = $(this).attr('data-id');
  if(idElm == undefined){
    return false;
  }
  var indexElm = $(this).index();
  indexElm = parseInt(indexElm) + 1;
  console.log(indexElm)
  $(".box-preview").find(".slick-dots").find('li:nth-child(' + indexElm + ')').click();
  $(".box-img-nano").find('.box-img').removeClass('active');
  $(this).addClass('active');
  // $(".box-preview").find(".box-img-preview").removeClass('show');
  // $(".box-preview").find("#" + idElm).addClass('show');
});*/
$(".box-preview").on('click', '.box-img-preview', function(){
  var dataSilde = $(this).attr('data-slide');
  if(dataSilde == undefined){
    return false;
  }
  var elm = '.main-overlay-slick[data-name=' + dataSilde + ']';
  $(elm).addClass('active')
  $(".box-overlay").removeClass('hide');
  $(".box-overlay .icon-close-overlay").attr('data-slide', dataSilde);
  setTimeout(function(){
    setSlick(elm);
    $(".box-overlay").animate({
      'opacity' : '1'
    });
  },50)
})
$(".box-overlay .icon-close-overlay").click(function(){
  var dataSilde = $(this).attr('data-slide');
  if(dataSilde == undefined){
    return false;
  }
  var elm = '.main-overlay-slick[data-name=' + dataSilde + ']';
  $(elm).removeClass('active')
  unSlick(elm);
  $(".box-overlay").addClass('hide').css({'opacity' : ''});
})
$(document).ready(function(){
  setSlick('.box-preview')
  setTimeout(function(){
    $(".box-img-nano").find(".box-img.default-view").click();
  },50)
})

function setSlick(elm){
  $(elm).slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  });
}

function unSlick(elm){
  //'.main-overlay-slick'
  $(elm).slick('unslick')
}

 $('.box-preview').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  fade: true,
  asNavFor: '.box-flex',prevArrow:"<button class='prev slick-prev'><img class='left-arrow ' src='assets/img/left.png' alt=''></button>",
  nextArrow:"<button class='next slick-next'><img class='right-arrow ' src='assets/img/right.png' alt=''></button>",
});
$('.box-flex').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  asNavFor: '.box-preview',
  dots: false,
  centerMode: true,
  focusOnSelect: true
});