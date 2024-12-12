// Function to validate CAPTCHA on client-side (optional, but useful for UX)
document.getElementById("registration-form").addEventListener("submit", function(event) {
  var enteredCaptcha = document.getElementById("captcha").value;
  var generatedCaptcha = document.getElementById("captcha-text").innerText;

  if (enteredCaptcha !== generatedCaptcha) {
    alert("Incorrect CAPTCHA. Please try again.");
    event.preventDefault(); // Prevent form submission
  }
});

