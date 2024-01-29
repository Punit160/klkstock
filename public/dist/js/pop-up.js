var toggler = document.getElementsByClassName("jadu");
var toggler1 = document.getElementById("import");
var close = document.getElementById("listened");
function toggleForm() {
  if (toggler[0].style.display === "none") {
    toggler[0].style.display = "block";
    disableScroll();
  } else {
    toggler[0].style.display = "none";
  }
}

function closeJadu() {
  toggler[0].style.display = "none";
  toggler1.style.display = "none";  
  enableScroll();
}

function closeImport() {
  toggler1.style.display = "none";
}

function importExpenses() {
  if (toggler1.style.display === "none") {
    toggler1.style.display = "block";
    disableScroll();
  } else {
    toggler1.style.display = "none";
  }
}
// Disable scrolling
function disableScroll() {
  var scrollY = window.scrollY;

  function handleScroll(e) {
    window.scrollTo(0, scrollY);
  }
  window.addEventListener("scroll", handleScroll);
  disableScroll.handleScroll = handleScroll;
}


function enableScroll() {
  if (disableScroll.handleScroll) {
    window.removeEventListener("scroll", disableScroll.handleScroll);
    delete disableScroll.handleScroll;
  }
}

let visible = document.getElementsByClassName('voisible');
let invisible = document.getElementsByClassName('invisiboiii');
var outer = document.getElementsByClassName("jadu");
window.onclick = function(event) {
  console.log(event.target.className);
    if(event.target != visible[0] && (event.target == invisible[0] || event.target == invisible[2] || event.target == invisible[3] || event.target == invisible[5]))
    {
        closeJadu();
        console.log(outer[0].style.display);
    }
}
