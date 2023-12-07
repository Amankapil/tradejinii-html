// Get necessary elements
var button1 = document.getElementById("button1");
var button2 = document.getElementById("button2");
var button3 = document.getElementById("button3");
var button4 = document.getElementById("button4");
var button5 = document.getElementById("button5");
var button6 = document.getElementById("button6");
var button7 = document.getElementById("button7");
var button8 = document.getElementById("button8");
var list1 = document.getElementById("list1");
var list2 = document.getElementById("list2");
var list3 = document.getElementById("list3");
var demat = document.getElementById("demat");
var commodities = document.getElementById("commodities");
var equit = document.getElementById("equit");
var equitmode = document.getElementById("equitmode");
var dematmode = document.getElementById("dematmode");

// Add click event listeners to buttons

showList(list1);
showListmodif(list4);
activateButtonshadow(button1);
activateButtonshadowModifi(button4);

activateButton(equit);
activateButtonModifi(equitmode);

button1.addEventListener("click", function () {
  // showList(list1);
  // activateButtonshadow(button1);
  // activateButton(equit);

  console.log("list1 clicked");
});

button2.addEventListener("click", function () {
  showList(list2);
  activateButtonshadow(button2);
  activateButton(commodities);
  console.log("list2 clicked");
});

button3.addEventListener("click", function () {
  showList(list3);
  activateButtonshadow(button3);
  activateButton(demat);
  console.log("list3 clicked");
});
button4.addEventListener("click", function () {
  showListmodif(list4);
  activateButtonshadowModifi(button4);
  activateButtonModifi(equitmode);
  console.log("list4 clicked");
});
button5.addEventListener("click", function () {
  showListmodif(list5);
  activateButtonshadowModifi(button5);
  activateButtonModifi(dematmode);
  console.log("list5 clicked");
});

// Function to show list and hide other lists
function showList(listToShow) {
  // Hide all lists
  list1.style.display = "none";
  list2.style.display = "none";
  list3.style.display = "none";
  // Show the selected list
  listToShow.style.display = "block";
}
function showListmodif(listToShow) {
  // Hide all lists
  list4.style.display = "none";
  list5.style.display = "none";
  // Show the selected list
  listToShow.style.display = "block";
}

function activateButton(buttonToActivate) {
  // Remove 'active' class from all buttons
  demat.classList.remove("active");
  commodities.classList.remove("active");
  equit.classList.remove("active");
  //   button3.classList.remove("active");
  //   button2.classList.remove("active");
  //   button1.classList.remove("active");
  // Add 'active' class to the clicked button
  buttonToActivate.classList.add("active");
}
function activateButtonshadow(buttonToActivateShadow) {
  // Remove 'active' class from all buttons
  //   demat.classList.remove("active");
  //   commodities.classList.remove("active");
  //   equit.classList.remove("active");
  button3.classList.remove("active");
  button2.classList.remove("active");
  button1.classList.remove("active");
  // Add 'active' class to the clicked button
  buttonToActivateShadow.classList.add("active");
}
function activateButtonModifi(buttonToActivate) {
  // Remove 'active' class from all buttons
  dematmode.classList.remove("active");
  equitmode.classList.remove("active");
  buttonToActivate.classList.add("active");
}
function activateButtonshadowModifi(buttonToActivateShadowmodify) {
  button4.classList.remove("active");
  button5.classList.remove("active");

  buttonToActivateShadowmodify.classList.add("active");
}
