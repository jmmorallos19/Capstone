// Hide loading screen and show content after a delay of 20 seconds once the page is fully loaded
window.addEventListener("load", function() {
  let loadingScreen = document.getElementById("loading-screen");
  let content = document.getElementById("content");

  // Delay for 20 seconds (20000 milliseconds)
  setTimeout(function() {
      loadingScreen.style.visibility = "hidden"; // Hide loading screen (or use display: "none")
      content.style.display = "block";           // Show page content
  }, 1500); // 20-second delay
});
