
// debug functions to display bookcase or bookshelf pages manually

function tester() {
  
  $(".main").load("./html/bookShelf.html");
}

function tester1() {
  $(".main").load("./html/bookCase.html");
  
}

// onclick attached to the black rectangular bookshelves to load the correct bookcase page
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

// onclick attached to each bookshelf on a bookcase page to display to correct bookshelf page
function getBookShelf(dir, row) {
  $(".main").load("./html" + "/" + dir + "/" + row + ".html");
}

// onclick attached to clickable columns on every book image on the bookshelf page, will bring them to the 
// sojourners truth library catalog to show more info, currently the book call numbers are hard coded
function getBookInfo() {
  callNumbers = ["F294.S2 J64 1996", "F294.S2 S58 2014", "F311 .D66"];
  callNumber = callNumbers[Math.floor(Math.random() * callNumbers.length)];
  callNumberFormated = callNumber.replaceAll(" ", "%20");
  console.log(callNumberFormated);
  query =
    "https://suny-new.primo.exlibrisgroup.com/discovery/fulldisplay?docid=alma990002702100204844&context=L&vid=01SUNY_NEW:01SUNY_NEW&lang=en&search_scope=MyInstitution&adaptor=Local%20Search%20Engine&tab=LibraryCatalog&query=any,contains," +
    callNumberFormated +
    "&offset=0";
  console.log(query);
  window.open(query, "_blank");
}
