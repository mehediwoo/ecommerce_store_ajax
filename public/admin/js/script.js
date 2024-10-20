$(document).ready(function () {
  // Toggle Sidebar
  $(".sidebar-toggler").click(function () {
    $(".sidebar").toggleClass("close");
  });
});

// Toggle Full Screen

function toggleFullScreen() {
  var doc = window.document;
  var docEl = doc.documentElement;

  var requestFullScreen =
    docEl.requestFullscreen ||
    docEl.mozRequestFullScreen ||
    docEl.webkitRequestFullScreen ||
    docEl.msRequestFullscreen;
  var cancelFullScreen =
    doc.exitFullscreen ||
    doc.mozCancelFullScreen ||
    doc.webkitExitFullscreen ||
    doc.msExitFullscreen;

  if (
    !doc.fullscreenElement &&
    !doc.mozFullScreenElement &&
    !doc.webkitFullscreenElement &&
    !doc.msFullscreenElement
  ) {
    requestFullScreen.call(docEl);
  } else {
    cancelFullScreen.call(doc);
  }
}

// Password Show Hide
const password = document.getElementById("password");
const cPassword = document.getElementById("c-password");

const passIcon = document.querySelector(".pass-icon");
const cPassIcon = document.querySelector(".c-pass-icon");

function showHidePass(selector, icon) {
  console.log(password.value);

  if (selector.type === "password") {
    selector.setAttribute("type", "text");
    icon.classList.remove("fa-eye");
    icon.classList.add("fa-eye-slash");
  } else {
    selector.setAttribute("type", "password");
    icon.classList.remove("fa-eye-slash");
    icon.classList.add("fa-eye");
  }
}
