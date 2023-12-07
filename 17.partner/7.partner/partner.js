// // Get all tab elements
// const tabs = document.querySelectorAll('.tab-partner');
// const tabContents = document.querySelectorAll('.tab-content-partner');

// // Add click event listeners to each tab
// tabs.forEach(tab => {
//   tab.addEventListener('click', () => {
//     const selectedTab = tab.dataset.tab;

//     // Remove the active class from all tabs and tab contents
//     tabs.forEach(tab => {
//       tab.classList.remove('active');
//     });
//     tabContents.forEach(content => {
//       content.classList.remove('active');
//     });
//     // Add the active class to the selected tab and tab content
//     tab.classList.add('active');
//     const selectedContent = document.getElementById(selectedTab);
//     selectedContent.classList.add('active');
//   });
// });
// Get all tab elements
const tabs = document.querySelectorAll('.tab-partner-desktop');
const tabContents = document.querySelectorAll('.tab-content-partner-desktop');

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



fetch("./New Animation.json")
  .then((response) => response.json())
  .then((animationData) => {
    const container = document.getElementById("lottie-container-3");
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




