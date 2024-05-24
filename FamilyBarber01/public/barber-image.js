var swiperMobile = new Swiper('.swiper-container.swiper-full-mobile', {
    slidesPerView: 4,
    spaceBetween: 0,
    slideToClickedSlide:true,
    centeredSlides:true,
   pagination: {
      el: '.swiper-pagination',
      clickable: true,

    },
effect: "coverflow",
    grabCursor: true,

    coverflowEffect: {
      rotate: -10,
      stretch: 10,
      depth: 100,
      modifier: 1,
      slideShadows: true,
    },

    loop:true,
    //   autoplay: {
    //     delay: 100000,
    //   },


      keyboard: {
      enabled: true,
      onlyInViewport: true,
    },


    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },


     breakpoints: {

          640: {
            freemode:true,
            slidesPerView: 3,
            spaceBetween: 20,
          },
          320: {
            freemode:true,
            slidesPerView: 3,
            spaceBetween: 20,
          }
    }

  });
