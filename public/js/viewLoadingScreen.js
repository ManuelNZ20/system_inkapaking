document.querySelector("form").addEventListener("submit", function (event) {
  event.preventDefault(); // Evitar el envío inmediato del formulario
  setTimeout(function () {
    document.getElementById("loadingScreen").style.display = "flex";
    event.target.submit(); // Envía el formulario después de mostrar la pantalla de carga
  }, 300); // 300 milisegundos de retraso
});
