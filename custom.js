// partner js

document.addEventListener("DOMContentLoaded", function() {
    document.querySelector(".preloader-plus").addEventListener("click", function() {
       // Hide the preloader
       document.querySelector(".preloader-plus").style.backgroundColor = "initial";
       document.querySelector(".preloader-plus").style.background = "none";
       document.querySelector(".preloader-plus").style.height = "0px";
       document.querySelector(".preloader-plus").style.width = "0px";
     
       document.querySelector(".preloader-plus").style.zIndex = "0";
       document.querySelector(".preloader-plus").style.opacity = "0";
       document.querySelector(".preloader-plus").style.visibility = "hidden";
       // Display the homepage content
       // document.querySelector(".content").style.display = "block";
     });
   });
   //  document.querySelector(".preloader-plus").addEventListener("click", function() {
   //     // Hide the preloader
   //     document.querySelector(".preloader-plus").style.backgroundColor = "initial";
   //     document.querySelector(".preloader-plus").style.background = "none";
   //     document.querySelector(".preloader-plus").style.height = "0px";
   //     document.querySelector(".preloader-plus").style.width = "0px";
   //     document.querySelector(".preloader-plus").style.transition = "none";
   //     document.querySelector(".preloader-plus").style.zIndex = "0";
   //     document.querySelector(".preloader-plus").style.opacity = "0";
   //     document.querySelector(".preloader-plus").style.visibility = "hidden";
   //     // Display the homepage content
   //     // document.querySelector(".content").style.display = "block";
   //   });
   // Get all tab elements
   const tabs = document.querySelectorAll('.tab-partner');
   const tabContents = document.querySelectorAll('.tab-content-partner');
   
   // Add click event listeners to each tab
   tabs.forEach(tab => {
     tab.addEventListener('click', () => {
       const selectedTab = tab.dataset.tab;
   
       // Remove the active class from all tabs and tab contents
       tabs.forEach(tab => {
         tab.classList.remove('active');
       });
       tabContents.forEach(content => {
         content.classList.remove('active');
       });
       // Add the active class to the selected tab and tab content
       tab.classList.add('active');
       const selectedContent = document.getElementById(selectedTab);
       selectedContent.classList.add('active');
     });
   });
   
   
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
         }, 2000); // Wait 2 seconds before erasing the text
       }
     }, 100); // Typing speed: 100 milliseconds per character
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
         }, 1000); // Wait 1 second before starting typing the next word
       }
     }, 50); // Erasing speed: 50 milliseconds per character
   }
   
   // Start the typing animation
   startTyping();
   
   const word1 = document.getElementById("word1");
   const word2 = document.getElementById("word2");
   
   const tl = gsap.timeline({ repeat: -1, repeatDelay: 1 }); // Set repeat to -1 for infinite loop and repeatDelay to 1 second for the delay between loops
   
   tl.to(word1, { opacity: 1, duration: 1 })
     .to(word1, { opacity: 0, duration: 1 })
     .to(word2, { opacity: 1, duration: 1 });
     
   function showImage(imageId) {
       var images = document.querySelectorAll(".box1container img");
       for (var i = 0; i < images.length; i++) {
         images[i].classList.remove("active");
       }
       document.getElementById("image" + imageId).classList.add("active");
   }
     
   function showImage2(imageId2) {
       var image = document.querySelectorAll(".box12container img");
       for (var i = 0; i < image.length; i++) {
         image[i].classList.remove("active");
       }
       document.getElementById("image" + imageId2).classList.add("active");
   }  
   
   $(document).ready(function () {
     var navbar2 = $(".bottom-home-logo");
     var navbar1 = $(".top-home-logo");
     var search2 = $(".home-top-icon");
     var search1 = $(".home-bottom-icon");
   
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
         search2.hide();
         search1.show();
         $('.home #site-header').attr('style', 'background-color: rgba(248, 251, 248, 0.9) !important');
         $('.home #site-navigation-wrap .dropdown-menu>li>a').attr('style', 'color: #000 !important');
       $('.home #ocean-search-form-1').attr('style', 'background: #ffffff; color: #000000 !important');
           $('.home #ocean-search-form-1::placeholder').attr('style', 'background: #ffffff; color: #000000 !important');
         $('.home .menu-signup').attr('style', 'background: linear-gradient(180deg, #0b224e -140%, #01787b 93.61%) !important');
         $(".home .menu-signup").css({color: "#fff"});
       } else {
         navbar2.hide();
         navbar1.show();
         search2.show();
         search1.hide();
         $('.home #site-header').attr('style', 'background-color: rgba(15, 15, 15, 0.9) !important');
         $('.home #site-navigation-wrap .dropdown-menu>li>a').attr('style', 'color: #fff !important');
       //   $('.home #ocean-search-form-1').attr('style', 'background: #292929');
            $('.home #ocean-search-form-1').attr('style', 'background: #292929; color: #fff !important');
         $('.home .menu-signup').attr('style', 'background: #fff');
   
       }
     }
   
     // Call toggleNavbar on page load and scroll event
     toggleNavbar();
     $(window).scroll(function () {
       toggleNavbar();
     });
   });
   
   function generateLink() {
     // Get the value entered in the input field
   var x = document.getElementById("copy-content");
     if (x.style.display === "none") {
       x.style.display = "block";
     } else {
       x.style.display = "none";
     }
     var inputId = document.getElementById("inputField").value;
   
     // Construct the URL with the input value
     var url = "https://kyc.tradejini.com/#/login?source=W&id=" + inputId;
   
     // Display the generated link in the textarea
     var generatedLinkBox = document.getElementById("generatedLinkBox");
     generatedLinkBox.value = url;
   }
   
   function copyLink() {
     // Get the textarea element
     var generatedLinkBox = document.getElementById("generatedLinkBox");
   
     var copyButton = document.getElementById("copyButton");
     copyButton.textContent = "Copied!";
   
     // Select the text inside the textarea
     generatedLinkBox.select();
   
     // Copy the selected text to the clipboard
     document.execCommand("copy");
   
     // Deselect the text
     window.getSelection().removeAllRanges();
   
     // Show a confirmation message (optional)
     // alert("Link copied to clipboard!");
   }
   
   var swiper = new Swiper(".home-swiper-container", {
     direction: "vertical",
     loop: true,
     slidesPerView: "auto",
     centeredSlides: true,
     autoplay: {
       delay: 3000,
     },
   });
   
   const bulletContainer = document.querySelector(".bullet-container-new");
   const bulletEffect = document.querySelector(".bullet-effect-new");
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
   
   gsap.to(".bullet-effect-new", {
     y: `-=${40}%`,
     duration: 35,
     ease: "linear",
     repeat: 1,
   });
   