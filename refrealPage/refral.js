var button = document.getElementById("button");
var content = document.getElementById("content");

button.addEventListener("click", function () {
  if (content.style.display === "none") {
    content.style.display = "block";
  } else {
    content.style.display = "none";
  }
});

function generateLink() {
  // Get the value entered in the input field
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
