$(document).ready(function () {
  require("dotenv").config();
  // jQuery methods go here...
  $(".navybar").load("./html/navbar.html");
  $(".loginModal").load("./html/loginModal.html");
  $(".main").load("./html/home.html");
  $(".footer").load("./html/footer.html");

  console.log("index loaded");
});
