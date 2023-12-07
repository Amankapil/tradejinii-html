const bulletContainer = document.querySelector(".bullet-container");
const bulletEffect = document.querySelector(".bullet-effect");
const bulletItems = bulletEffect.querySelectorAll("li");
const bulletContainerWidth = bulletContainer.offsetWidth;

let totalWidth = 0;
bulletItems.forEach((item) => {
  totalWidth += item.offsetWidth + parseInt(getComputedStyle(item).marginRight);
});

if (totalWidth > bulletContainerWidth) {
  const cloneItems = bulletEffect.innerHTML;
  bulletEffect.innerHTML += cloneItems;
}

gsap.to(".bullet-effect", {
  x: `-=${totalWidth}px`,
  duration: 35,
  ease: "linear",
  repeat: -1,
});

var swiper = new Swiper(".swiper-container", {
  direction: "vertical",
  loop: true,
  slidesPerView: "auto",
  centeredSlides: true,
  autoplay: {
    delay: 3000,
  },
});

// window.addEventListener("scroll", function () {
//   var navbar = document.querySelector(".bgblack");
//   var item = document.querySelector(".item");
//   var scrollHeight = window.innerHeight * 1.5; // Calculate 150vh

//   if (window.scrollY >= scrollHeight) {
//     navbar.classList.add("white");
//     navbar.classList.remove("hero-content");
//     item.classList.add("itemwhite");
//     item.classList.remove("item");
//   } else {
//     navbar.classList.remove("white");
//     navbar.classList.add("hero-content");
//     item.classList.remove("itemwhite");
//     item.classList.add("item");
//   }
// });

fetch("./phone.json")
  .then((response) => response.json())
  .then((animationData) => {
    const container = document.getElementById("lottie-container");
    const animationOptions = {
      container: container,
      renderer: "svg",
      loop: true,
      autoplay: true,
      animationData: animationData,
    };
    const anim = lottie.loadAnimation(animationOptions);
  })
  .catch((error) => {
    console.error("Error loading JSON file:", error);
  });
fetch("./Home page PC screen (1).json")
  .then((response) => response.json())
  .then((animationData) => {
    const container = document.getElementById("lottie-container2");
    const animationOptions = {
      container: container,
      renderer: "svg",
      loop: true,
      autoplay: true,
      animationData: animationData,
    };
    const anim = lottie.loadAnimation(animationOptions);
  })
  .catch((error) => {
    console.error("Error loading JSON file:", error);
  });

console.log("loaded js");

window.addEventListener("scroll", revealCards);

function revealCards() {
  const cards = document.querySelectorAll(".card");

  cards.forEach((card, index) => {
    const cardTop = card.getBoundingClientRect().top;
    const windowHeight = window.innerHeight;

    if (cardTop < windowHeight - 50) {
      card.style.opacity = "1"; /* Show the card */
      card.style.transform = "translateY(0)"; /* Reset the card's position */
    }
  });
}

const words = ["Equity", "Mutual Funds"];
let currentWordIndex = 0;

function startTyping() {
  const textElement = document.getElementById("text1");
  const currentWord = words[currentWordIndex];

  let currentCharIndex = 0;
  let typingInterval = setInterval(() => {
    if (currentCharIndex < currentWord.length) {
      textElement.textContent += currentWord[currentCharIndex];
      currentCharIndex++;
    } else {
      clearInterval(typingInterval);
      setTimeout(() => {
        eraseText();
      }, 1000); // Wait 2 seconds before erasing the text
    }
  }, 50); // Typing speed: 100 milliseconds per character
}

function eraseText() {
  const textElement = document.getElementById("text1");

  let currentCharIndex = textElement.textContent.length;
  let erasingInterval = setInterval(() => {
    if (currentCharIndex > 0) {
      textElement.textContent = textElement.textContent.slice(0, -1);
      currentCharIndex--;
    } else {
      clearInterval(erasingInterval);
      currentWordIndex = (currentWordIndex + 1) % words.length; // Move to the next word
      setTimeout(() => {
        startTyping();
      }, 100); // Wait 1 second before starting typing the next word
    }
  }, 50); // Erasing speed: 50 milliseconds per character
}

// Start the typing animation
startTyping();

// window.addEventListener("scroll", function () {
//   var stickyCard = document.querySelector(".cardw");
//   var rect = stickyCard.getBoundingClientRect();

//   if (rect.top <= 0) {
//     stickyCard.classList.add("small");
//   } else {
//     stickyCard.classList.remove("small");
//   }
// });

$(document).ready(function () {
  var navbar2 = $(".navbar2");
  var navbar1 = $(".navbar1");

  // Check if the scroll position is below 150vh
  function isNavbar2Visible() {
    var scrollPosition = $(window).scrollTop();
    var windowHeight = $(window).height();

    return scrollPosition > windowHeight * 0.9;
  }

  // Toggle navbar visibility based on the scroll position
  function toggleNavbar() {
    if (isNavbar2Visible()) {
      navbar2.show();
      navbar1.hide();
    } else {
      navbar2.hide();
      navbar1.show();
    }
  }

  // Call toggleNavbar on page load and scroll event
  toggleNavbar();
  $(window).scroll(function () {
    toggleNavbar();
  });
});

document.addEventListener("DOMContentLoaded", function () {
  var cards = document.querySelectorAll(".cardw");

  document.addEventListener("DOMContentLoaded", function () {
    var cards = document.querySelectorAll(".card");
    var updated = false;

    function updateCards() {
      var scrollTop =
        window.pageYOffset ||
        document.documentElement.scrollTop ||
        document.body.scrollTop ||
        0;

      for (var i = 0; i < cards.length; i++) {
        var card = cards[i];
        var cardOffsetTop = card.offsetTop;
        var cardHeight = card.offsetHeight;
        var triggerOffset = 10;

        if (
          scrollTop >= cardOffsetTop - triggerOffset &&
          scrollTop <= cardOffsetTop + cardHeight - triggerOffset
        ) {
          card.style.transform = "scale(0.8)"; // Adjust the style properties as needed
          updated = true;
        } else {
          if (updated) {
            card.style.transform = "none";
          }
        }
      }

      updated = false;
    }

    // Call updateCards on scroll event
    window.addEventListener("scroll", updateCards);
  });

  // Call updateCards on scroll event
  window.addEventListener("scroll", updateCards);
});

const word1 = document.getElementById("word1");
const word2 = document.getElementById("word2");

const tl = gsap.timeline({ repeat: -1, repeatDelay: 1 }); // Set repeat to -1 for infinite loop and repeatDelay to 1 second for the delay between loops

tl.to(word1, { opacity: 1, duration: 1 })
  .to(word1, { opacity: 0, duration: 1 })
  .to(word2, { opacity: 1, duration: 1 });

function preload() {
  let preloaderClicked = false;
  const body = document.body;

  document
    .querySelector(".preloader-plus")
    .addEventListener("click", function () {
      if (!preloaderClicked) {
        preloaderClicked = true;

        // document.querySelector(".preloader-plus").addEventListener("click", function() {
        const preloader = document.querySelector(".preloader-plus");
        // Disable transition when the preloader is clicked
        preloader.classList.add("complete");
        body.classList.add("complete");

        //   });
      }
    });
}

preload();
