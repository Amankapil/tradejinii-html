function togglePopup() {
  document.getElementById("popup-1").classList.toggle("active");
}
var learnMoreButtons = document.querySelectorAll(".learnmore");
learnMoreButtons.forEach(function(button) {
  button.addEventListener("click", openpopup);
});

  function openpopup() {
    console.log('clicked');
    var popup = document.querySelector(".firstpopup");
    var content = document.querySelector(".firstpopup .content");
  console.log('clicked')
    popup.style.display = "block";
    content.style.display = "block";
  }
  function applypop() {
    console.log('clicked');
    var container = document.querySelector(".container");
    var popup = document.querySelector(".firstpopup");
    var content = document.querySelector(".firstpopup .content");
  
    popup.style.display = "none";
    content.style.display = "none";
    container.style.display = "block";
  }
  
  function closepop() {
    console.log('clicked');
    var container = document.querySelector(".container");
    var content = document.querySelector(".firstpopup .content");
    var popup = document.querySelector(".firstpopup");
    container.style.display = "none";
    popup.style.display = "none";
    content.style.display = "none";
  }



  var swiper = new Swiper(".swiper-container", {
    direction: "vertical",
    loop: true,
    slidesPerView: "auto",
    
    // centeredSlides: true,
    autoplay: {
      delay: 2000,
    },
  });