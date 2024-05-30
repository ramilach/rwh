$(document).ready(function(){
    $('.carousel').carousel();
  });

 
  // Function to redirect to login page after sign-up
  function redirectToLogin() {
    window.location.href = "login.php"; // Redirect to login.html
  }

  // Get the sign-up form element
  var signUpForm = document.querySelector('form');

  // Add an event listener to the form for form submission
  signUpForm.addEventListener('submit', function(event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Your form processing logic goes here

    // After successful form submission, redirect to login page
    redirectToLogin();
  }); 





  