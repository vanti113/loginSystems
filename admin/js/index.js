const toggle = document.querySelector(".toggle-bar");
const left_bar = document.querySelector(".manage .manage__contents.left"),
  right_bar = document.querySelector(".manage .manage__contents.right");
const input_bar = document.querySelectorAll(
  ".password .password-stuff .pass_input"
);
const TOGGLE_OF = "toggleOff";

function change_width(num) {
  input_bar.forEach(function (width) {
    width.style.width = num;
  });
}

function changeStyle() {
  if (!toggle.classList.contains(TOGGLE_OF)) {
    toggle.classList.add(TOGGLE_OF);
    left_bar.style.display = "none";
    right_bar.style.width = "100%";
    right_bar.style.left = "0px";
    change_width("1200px");
  } else {
    toggle.classList.remove(TOGGLE_OF);
    left_bar.style.display = "flex";
    right_bar.style.width = "86.2%";
    right_bar.style.left = "209px";
    change_width("1000px");
  }
}

function init() {
  toggle.addEventListener("click", changeStyle);
}

init();
