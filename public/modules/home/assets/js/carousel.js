$('.owl-carousel').owlCarousel({
  loop:true,
  rtl: true,
  nav: true,
  dots: false,
  margin:10,
  autoplay:true,
  autoplayTimeout:4000,
  autoplayHoverPause:true,
  responsive:{
      0:{
          items:1
      },
      600:{
          items:2
      },
      1000:{
          items:4.5
      }
  }
})