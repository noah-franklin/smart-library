$(document).ready(function () {
  // jQuery methods go here...
  $(".mainimg").hover(
    function () {
      $(".maintext").css("display", "block");
    },
    function () {
      $(".maintext").css("display", "none");
    }
  );

  $(".concourseimg").hover(
    function () {
      $(".concoursetext").css("display", "block");
    },
    function () {
      $(".concoursetext").css("display", "none");
    }
  );

  $(".groundimg").hover(
    function () {
      $(".groundtext").css("display", "block");
    },
    function () {
      $(".groundtext").css("display", "none");
    }
  );
});
