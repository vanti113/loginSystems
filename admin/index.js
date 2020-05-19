const toggle = document.querySelector(".toggle-bar");
const left_bar = document.querySelector(".manage .manage__contents.left"),
  right_bar = document.querySelector(".manage .manage__contents.right");

const TOGGLE_OF = "toggleOff";

//toggle.style.display = "none";
//left_bar.style.display = "none";
// right_bar.style.width = "100%";
// right_bar.style.left = "0px";

function changeStyle() {}

function init() {
  toggle.addEventListener("click", changeStyle);
}
init();
