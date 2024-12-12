<?php
session_start();

// Function to generate a random CAPTCHA string
function generateCaptcha() {
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  $captchaText = '';
  for ($i = 0; $i < 6; $i++) {
    $captchaText .= $characters[rand(0, strlen($characters) - 1)];
  }
  return $captchaText;
}

// If the CAPTCHA text is not already generated, generate it
if (!isset($_SESSION['captcha_text'])) {
  $_SESSION['captcha_text'] = generateCaptcha();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $captcha = $_POST['captcha'];

  // Get the CAPTCHA from the session
  $generatedCaptcha = $_SESSION['captcha_text'];

  // Validate the CAPTCHA
  if ($captcha !== $generatedCaptcha) {
    echo "CAPTCHA verification failed. Please try again.";
  } else {
    // Proceed with form processing (e.g., storing user info in a database)
    echo "Registration successful!";
    // Optionally, clear the CAPTCHA from session after successful submission
    unset($_SESSION['captcha_text']);
  }
} else {
  echo "Invalid request method.";
}
?>

