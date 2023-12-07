// Get all tab elements
const tabs = document.querySelectorAll(".tab");
const tabContents = document.querySelectorAll(".tab-content");

// Add click event listeners to each tab
tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const selectedTab = tab.dataset.tab;

    // Remove the active class from all tabs and tab contents
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });

    tabContents.forEach((content) => {
      content.classList.remove("active");
    });

    // Add the active class to the selected tab and tab content
    tab.classList.add("active");
    const selectedContent = document.getElementById(selectedTab);
    selectedContent.classList.add("active");
  });
});



function toggleList() {
  var text1 = document.getElementById("text1");
  var text2 = document.getElementById("text2");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide1");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList2() {
  var text1 = document.getElementById("text3");
  var text2 = document.getElementById("text4");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide2");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList3() {
  var text1 = document.getElementById("text5");
  var text2 = document.getElementById("text6");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hidew");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList4() {
  var text1 = document.getElementById("text7");
  var text2 = document.getElementById("text8");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide4");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList6() {
  var text1 = document.getElementById("text9");
  var text2 = document.getElementById("text10");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide6");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList5() {
  var text1 = document.getElementById("text13");
  var text2 = document.getElementById("text14");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide5");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
function toggleList7() {
  var text1 = document.getElementById("text11");
  var text2 = document.getElementById("text12");

  if (text1.style.display === "block") {
    text1.style.display = "none";
    text2.style.display = "block";
  } else {
    text1.style.display = "block";
    text2.style.display = "none";
  }
  var listItems = document.getElementsByClassName("hide7");

  for (var i = 0; i < listItems.length; i++) {
    if (listItems[i].style.display === "block") {
      listItems[i].style.display = "none";
    } else {
      listItems[i].style.display = "block";
    }
  }
}
