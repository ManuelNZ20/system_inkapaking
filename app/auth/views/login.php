<?php
include('component/loading_screen.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inkapaking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../public/css/auth.css">
    <link rel="shortcut icon" href="https://static.vecteezy.com/system/resources/previews/009/266/584/non_2x/icon-sun-design-free-png.png">
</head>
<body>
<div class="container mt-5 ">
  <div class="d-flex justify-content-center align-items-center">
      <div class="card p-4">
        <img src="https://media.licdn.com/dms/image/v2/D560BAQEy1CGTGds_9A/company-logo_200_200/company-logo_200_200/0/1681229472418?e=1732147200&v=beta&t=MU75PKtb8SDV--WZawqINSkuVqWGH50-WawKxVtKjBk" class="card-img-top img-card-login" alt="imagen de fondo inkapaking">
        <div class="card-body">
        <h2>Iniciar sesión</h2>
        <p>¡Bienvenida al sistema de gestión de nuestro comedor!</p>
         <!-- Mostrar mensaje de error si las credenciales son inválidas -->
      <?php include('component/error_credential.php');?>
      <form action="app/auth/controllers/LoginController.php" method="post">
      <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputEmail" placeholder="tu@email.com" name="mail" required>
            <label for="floatingInputEmail">Correo electrónico</label>
        </div>
        <div class="form-floating  position-relative mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" maxlength="8" required>
            <label for="floatingPassword">Contraseña</label>
            <!-- Botón para mostrar/ocultar contraseña -->
            <div class="border-none input-group-append position-absolute" style="bottom:10px; right:10px;">
              <span class="btn input-group-text" id="showPasswordToggleBtn">
                <i class="bi bi-eye" id="showPasswordToggleIcon"></i>
              </span>
            </div>
        </div>
          <div class="d-flex justify-content-between">
            <button type="submit" class="col-5 btn btn-dark">Iniciar sesión</button>
            <a href="/app/auth/views/register.php" class="btn btn-light col-5">Regístrate aquí</a>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
  <!-- Pantalla de carga -->
  <?=loadingScreen()?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="/public/js/scriptShowPassword.js"></script>
  <script src="/public/js/navigatorView.js"></script>
</body>
</html>
