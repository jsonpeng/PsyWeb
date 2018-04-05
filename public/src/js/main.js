// 页面主体轮播
var swiper = new Swiper('.right-bar>.swiper-container', {
  direction: 'vertical',
  pagination : 'body>.swiper-container>.swiper-pagination',
  nextButton:'body>.swiper-container>.swiper-button-next',
  observer:true,
  paginationClickable:true,
  mousewheelControl : true,
  effect : 'fade',
  fade: {
    crossFade: false,
  },
  paginationBulletRender: function (swiper, index, className) {
      // return '<span class="' + className + '">'+"0" + (index + 1) + '</span>';
  },
  onInit:function(swiper){
     swiperAnimateCache(swiper);
     swiperAnimate(swiper);
  },
  onSlideChangeEnd: function(swiper){
      //alert(swiper.activeIndex) //切换结束时，告诉我现在是第几个slide
        swiperAnimate(swiper);
      // 导航跟随变色
        $(".nav-list li a,.s-nav-list li a").removeClass();
        $(".nav-list li,.s-nav-list li").eq(swiper.realIndex).children('a').addClass('active');
    },
});
// 导航跟随变色
  $(".nav-list li a,.s-nav-list li a").click(function(event) {
      $(".nav-list li a,.s-nav-list li a").removeClass('active');
      $(this).addClass('active');
  });
// 导航跳转到指定slider
$(".nav-list li,.s-nav-list li").on('click', function(event) {
  event.preventDefault();
  var index=$(this).index();
  swiper.slideTo(index, 1000, false);
  swiperAnimate(swiper);
});
// 舞蹈课程鼠标移入效果
$('.page2 .card').on('mouseover',function(){
    $(this).parent('.swiper-slide').siblings().children('.card').removeClass('active');
    $(this).parent('.swiper-slide').siblings().children('.card').children().children('.detail').hide();
    $(this).addClass('active');
    $(this).children('.pic').children('.detail').show();
});
$(".page2 .card").on('mouseover', function(event) {
  event.preventDefault();
  /* Act on the event */
  var len=$(this).children('.pic').children('.img').children('img').attr('src').length;
  var str=$(this).children('.pic').children('.img').children('img').attr('src').slice(len-5, len-3);
  str=str.slice(0, 1);
  $(this).children('.pic').children('.img').children('img').attr("src","img/c"+str+".png");
});
$(".page2 .card").on('mouseleave', function(event) {
  event.preventDefault();
  /* Act on the event */
  var len=$(this).children('.pic').children('.img').children('img').attr('src').length;
  var str=$(this).children('.pic').children('.img').children('img').attr("src").slice(len-5, len-4);
  str+=str;
  $(this).children('.pic').children('.img').children('img').attr("src","img/c"+str+".png");
});
 
// 关于我们
$('.page5 .row>div').on('mouseover',function(){
    var lenght=$(this).children('.pic').children('img').attr('src').length;
    var str=$(this).children('.pic').children('img').attr("src").slice(length-5, length-4);
    str+=str;
    $(this).children('.pic').children('img').attr("src","img/b"+str+".png");
});
$(".page5 .row>div").on('mouseleave', function(event) {
  event.preventDefault();
  /* Act on the event */
  var str=$(this).children('.pic').children('img').attr("src").slice(length-6, length-4);
  str=str.slice(0, 1);
  $(this).children('.pic').children('img').attr("src","img/b"+str+".png");
});


// 舞蹈课程轮播
var myswiper = new Swiper ('.page2 .swiper-container', {
    prevButton:'.page2 .swiper-button-prev',
    nextButton:'.page2 .swiper-button-next',
    slidesPerView:3,
    paginationClickable:true,
    spaceBetween:30,
    // autoplay:1500,
    // speed:1000,
    autoplayDisableOnInteraction : false,
    breakpoints: {
                1600:{
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                640: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
            }
});

// 名师团队
var myswiper = new Swiper ('.page3 .swiper-container', {
    prevButton:'.page3 .swiper-button-prev',
    nextButton:'.page3 .swiper-button-next',
    slidesPerView:4,
    paginationClickable:true,
    loop:true,
    loopedSlides:8,
    spaceBetween:30,
    // autoplay:1500,
    // speed:1000,
    autoplayDisableOnInteraction : false,
    breakpoints: {
                990:{
                    slidesPerView: 3,
                    spaceBetween: 15
                },
                768:{
                    slidesPerView: 2,
                    spaceBetween: 15
                },
                500: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
            }
});

// 舞蹈演出
var myswiper = new Swiper ('.page4 .swiper-container', {
    prevButton:'.page4 .swiper-button-prev',
    nextButton:'.page4 .swiper-button-next',
    slidesPerView:2,
    slidesPerColumn : 2,
    paginationClickable:true,
    // loop:true,
    loopedSlides:6,
    spaceBetween:30,
    // autoplay:1500,
    // speed:1000,
    autoplayDisableOnInteraction : false,
    breakpoints: {
                640: {
                    slidesPerColumn : 1,
                    slidesPerView: 1,
                    spaceBetween: 5
                },
            }
});

// 联系我们鼠标移入
$(".contact-way .row>div").on('mouseover', function(event) {
  event.preventDefault();
  /* Act on the event */
  var lenght=$(this).children('.pic').children('img').attr('src').length;
  var str=$(this).children('.pic').children('img').attr("src").slice(length-5, length-4);
  str+=str;
  $(this).children('.pic').children('img').attr("src","img/b"+str+".png");
});
$(".contact-way .row>div").on('mouseleave', function(event) {
  event.preventDefault();
  /* Act on the event */
  var str=$(this).children('.pic').children('img').attr("src").slice(length-6, length-4);
  str=str.slice(0, 1);
  $(this).children('.pic').children('img').attr("src","img/b"+str+".png");
});


if($(document).innerWidth()<768){
      $('.navbar .navbar-nav li a').click(function(){
          $('.navbar-collapse').removeClass('in');
      })
};
$('.s-nav-list .list-btn').on('click',  function(event) {
  event.preventDefault();
  /* Act on the event */
  $(this).siblings('ul').slideToggle(500);
});