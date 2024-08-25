$(document).ready(function () {
  $("#order-date").change(function () {
    var orderDateId = $(this).val();
    if (orderDateId === "-1") {
      $("#users-table tbody").html(
        '<tr><td colspan="5">Selecciona una fecha para ver los usuarios.</td></tr>'
      );
      return;
    }

    // Mostrar loading
    $("#loading").show();

    // Actualizar el campo oculto con el ID de la fecha seleccionada
    $("#hidden-order-date-id").val(orderDateId);

    $.ajax({
      url: "../../home/controllers/get_users_by_date.php",
      method: "POST",
      data: { order_date_id: orderDateId },
      success: function (response) {
        $("#users-table tbody").html(response);
        $("#current-date").text($("#order-date option:selected").text());
      },
      error: function () {
        alert("Error al cargar los datos.");
      },
      complete: function () {
        // Ocultar loading
        $("#loading").hide();
      },
    });
  });
});
