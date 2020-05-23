const check_password = document.querySelector(".password-stuff.button input");
const old_pass = document.querySelector("#oldPass");
const new_pass = document.querySelector("#newPass");
const re_pass = document.querySelector("#rePass");

function check_pass(oldPW, newPW, rePW, event) {
  if (oldPW === "") {
    event.preventDefault();
    alert("Old password Field Empty!!");
  } else if (newPW === "") {
    event.preventDefault();
    alert("New password Field Empty!!");
  } else if (rePW === "") {
    event.preventDefault();
    alert("Re-Type Password Field Empty!!");
  }
}

function validate_pass(event) {
  const old_pwValue = old_pass.value;
  const new_pwValue = new_pass.value;
  const re_pwValue = re_pass.value;

  // check_pass(old_pwValue, new_pwValue, re_pwValue);
  check_pass(old_pwValue, new_pwValue, re_pwValue, event);
}

function init() {
  check_password.addEventListener("click", validate_pass);
}

init();
