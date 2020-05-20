const toggle = document.querySelector(".toggle-bar");
const left_bar = document.querySelector(".manage .manage__contents.left"),
  right_bar = document.querySelector(".manage .manage__contents.right");

const TOGGLE_OF = "toggleOff";
const SHOW_BAR = "showing";
//toggle.style.display = "none";
//left_bar.style.display = "none";
// right_bar.style.width = "100%";
// right_bar.style.left = "0px";

function changeStyle() {
  if (!toggle.classList.contains(TOGGLE_OF)) {
    toggle.classList.add(TOGGLE_OF);
    left_bar.style.display = "none";
    right_bar.style.width = "100%";
    right_bar.style.left = "0px";
  } else {
    toggle.classList.remove(TOGGLE_OF);
    left_bar.style.display = "flex";
    right_bar.style.width = "86.2%";
    right_bar.style.left = "209px";
  }
}

function init() {
  toggle.addEventListener("click", changeStyle);
}
init();
