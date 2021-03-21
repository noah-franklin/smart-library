$(document).ready(function () {
  // jQuery methods go here...
  $(".mainimg").hover(
    function () {
      $(".maintext").css("visibility", "visible");
      $(".maintext").css("color", "#80b4de");
      $(".maintext").text("MAIN");
    },
    function () {
      $(".maintext").css("visibility", "hidden");
    }
  );

  $(".mainimg").click(function () {
    $(".main").load("../html/main.html");
    return false;
  });

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
