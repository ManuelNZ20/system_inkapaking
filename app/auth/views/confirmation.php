<?php
include('component/loading_screen.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="../../../public/css/auth.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="alert alert-success text-center" role="alert">
        <h4 class="alert-heading">¡Registro exitoso!</h4>
        <p>Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión.</p>
        <hr>
        <a href="../../../" class="btn btn-dark">Iniciar sesión</a>
    </div>
</div>

  <!-- Pantalla de carga -->
  <?=loadingScreen()?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="/public/js/navigatorView.js"></script>
</body>
</html>
