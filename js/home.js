$(document).ready(function () {
  // jQuery methods go here...

  $(".concourseimg").hover(
    function () {
      $(".maintext").css("visibility", "visible");
      $(".maintext").css("color", "#cad08f");
      $(".maintext").text("CONCOURSE");
    },
    function () {
      $(".maintext").css("visibility", "hidden");
    }
  );

  $(".groundimg").hover(
    function () {
      $(".maintext").css("visibility", "visible");
      $(".maintext").css("color", "#fecc83");
      $(".maintext").text("GROUND");
    },
    function () {
      $(".maintext").css("visibility", "hidden");
    }
  );
  console.log("home loaded");
});
