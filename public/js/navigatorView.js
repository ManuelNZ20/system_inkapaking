window.addEventListener("beforeunload", function () {
  document.getElementById("loadingScreen").style.display = "flex";
});

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    document.getElementById("loadingScreen").style.display = "none";
  }, 300);
});

document.querySelectorAll("a").forEach(function (link) {
  link.addEventListener(
    "click",
    function () {
      document.getElementById("loadingScreen").style.display = "flex";
    },
    false
  );
});
