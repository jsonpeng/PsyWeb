
var mySwiper = new Swiper ('.swiper-container', {
// Optional parameters
loop: true,
})

var mySwiper2 = new Swiper ('.swiper-container2', {
// Optional parameters
    loop: true,
    slidesPerView: 2,
  	spaceBetween: 24,
})

function pre() {
	mySwiper2.slidePrev();
}

function next() {
	mySwiper2.slideNext();
}

$('.index-left-arrow').on('click', function(){
	mySwiper2.slidePrev();
})

$('.index-right-arrow').on('click', function(){
	mySwiper2.slideNext();
})