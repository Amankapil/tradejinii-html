const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  slidesPerView: 3, // Number of slides visible in the container
  slidesPerGroup: 1,
  autoplay: {
    delay: 2500, // Delay between slides in milliseconds
  },
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
  },
  responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
      },
      breakpoint: 500,
      settings: {
        slidesToShow: 1,
      },
      breakpoint: 300,
      settings: {
        slidesToShow: 1,
      },
    },
  ],

  // Navigation arrows

  // And if we need scrollbar
  scrollbar: {
    el: ".swiper-scrollbar",
  },
});
