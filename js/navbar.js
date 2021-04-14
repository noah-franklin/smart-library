function tester() {
  // $(".main").load("./html/bookShelf.html");
  $(".main").load("./html/bookShelf.html");
}

function tester1() {
  $(".main").load("./html/bookCase.html");
  //$(".main").load("./html/bookcases/c01/a.html");
}

function getBookCase(caseNum, side) {
  $(".main").load(
    "./html/bookcases/" + caseNum + "/" + side + ".html",
    function () {
      if (side == "a") {
        $(".aSide").css("background-color", "orange").css("color", "white");
        $(".bSide").css("background-color", "white").css("color", "black");
        console.log("a");
      }
      if (side == "b") {
        $(".bSide").css("background-color", "orange").css("color", "white");
        $(".aSide").css("background-color", "white").css("color", "black");
        console.log("b");
      }
    }
  );

}

function getBookShelf(dir, row) {
  $(".main").load("./html" + "/" + dir + "/" + row + ".html");
}
