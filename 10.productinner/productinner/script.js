// function showImage(imageId) {
//   var images = document.querySelectorAll(".box1container img");
//   for (var i = 0; i < images.length; i++) {
//     images[i].classList.remove("active");
//   }
//   document.getElementById("image" + imageId).classList.add("active");
// }

// function showImage2(imageId2) {
//   var image = document.querySelectorAll(".box12container img");
//   for (var i = 0; i < image.length; i++) {
//     image[i].classList.remove("active");
//   }
//   document.getElementById("image" + imageId2).classList.add("active");
// }

// // Set the first image as the default one

// script.js
const boxes = document.querySelectorAll(".box-prod");

boxes.forEach((box, index) => {
  const hiddenImage = box.querySelector("img");

  box.addEventListener("click", () => {
    if (hiddenImage.style.display === "none") {
      hiddenImage.style.display = "block";
    } else {
      hiddenImage.style.display = "none";
    }
  });
});
