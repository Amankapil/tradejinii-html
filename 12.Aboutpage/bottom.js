// const bulletContainer = document.querySelector(".bullet-container");
// const bulletEffect = document.querySelector(".bullet-effect");
// const bulletItems = bulletEffect.querySelectorAll("li");
// const bulletContainerWidth = bulletContainer.offsetWidth;

// let totalWidth = 0;
// bulletItems.forEach((item) => {
//   totalWidth += item.offsetWidth + parseInt(getComputedStyle(item).marginRight);
// });

// if (totalWidth > bulletContainerWidth) {
//   const cloneItems = bulletEffect.innerHTML;
//   bulletEffect.innerHTML += cloneItems;
// }

gsap.to(".bullet-effect", {
  y: `-=${40}%`,
  duration: 20,
  ease: "linear",
  repeat: 1,
});
