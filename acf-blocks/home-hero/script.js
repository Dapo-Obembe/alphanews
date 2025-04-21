/*=============== SWIPER JS ===============*/
let swiperPosts = new Swiper(".home-hero__swiper", {
  loop: false,
  spaceBetween: 16,
  grabCursor: true,

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  autoplay: {
    delay: 5000,
  },

  breakpoints: {
    700: {
      slidesPerView: 1,
    },
    800: {
      slidesPerView: 2,
    },
    1040: {
      slidesPerView: 3,
    },
  },
});
