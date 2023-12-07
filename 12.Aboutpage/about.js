// var swiper = new Swiper(".swiper-container", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: 3,
//   coverflowEffect: {
//     rotate: 50,
//     stretch: 0,
//     depth: 100,
//     modifier: 1,
//     slideShadows: true,
//   },
//   pagination: {
//     el: ".swiper-pagination",
//   },
// });



////////////////////////// ?/working code


// $(document).ready(function () {
//   $(".carousel").slick({
//     slidesToShow: 3,
//     slidesToScroll: 1,
//     centerMode: true,
//     centerPadding: "0px",
//     prevArrow: "<button type='button' class='slick-prev'></button>",
//     nextArrow: "<button type='button' class='slick-next'></button>",
//     responsive: [
//       {
//         breakpoint: 768,
//         settings: {
//           slidesToShow: 1,
//           centerMode: true,
//           centerPadding: "40px",
//           swipeToSlide: true,
//         },
//       },
//     ],
//     onBeforeChange: function (slick, currentSlide, nextSlide) {
//       $(".carousel-item")
//         .removeClass("slick-center")
//         .eq(nextSlide)
//         .addClass("slick-center");
//     },
//   });
// });

// $(".carousel-prev").click(function () {
//   $(".carousel").slick("slickPrev");
// });

// // Handle next button click
// $(".carousel-next").click(function () {
//   $(".carousel").slick("slickNext");
// });


// <<<<<<<<<<<<<<<<<<<<<<<<<<<<<</

$(document).ready(function() {
  var $slider = $('.slider');

  $slider.on('init', function() {
    centerCurrentImage();
  });

  $slider.slick({
    centerMode: true,
    centerPadding: '100px', // Adjust as needed
    slidesToShow: 3,
    variableWidth: true,
    responsive: [
      {
        breakpoint: 768, // Adjust as needed
        settings: {
          centerPadding: '50px', // Adjust as needed
        }
      },
      // Add more breakpoints and settings as needed
    ]
  });

  $slider.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
    centerCurrentImage();
  });

  function centerCurrentImage() {
    var currentSlide = $slider.slick('slickCurrentSlide');
    var $slides = $slider.find('.slick-slide');
    $slides.find('img').css('transform', 'scale(1)');
    $slides.eq(currentSlide).find('img').css('transform', 'scale(2)');
  }
});
