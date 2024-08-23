<?php
require_once('../controllers/AreaController.php');
// Crear una instancia del controlador
$areaController = new AreaController();
// Obtener la lista de áreas
$areas = $areaController->getAreas();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../../../public/css/auth.css">
</head>
<body>
<div class="container mt-5 mb-5 pb-2">
<div class="d-flex justify-content-center align-items-center">
      <div class="card p-4">
        <img src="https://media.licdn.com/dms/image/v2/D560BAQEy1CGTGds_9A/company-logo_200_200/company-logo_200_200/0/1681229472418?e=1732147200&v=beta&t=MU75PKtb8SDV--WZawqINSkuVqWGH50-WawKxVtKjBk" class="card-img-top img-card-login" alt="imagen de fondo inkapaking">
        <div class="card-body">
        <h2>Registro de usuario</h2>
        <p>¡Bienvenida al sistema de gestión de nuestro comedor!</p>
        <form action="register.php" method="post">
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
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputName" placeholder="tu nombre" name="fullname" required>
            <label for="floatingInputName">Nombre completo</label>
        </div>
        <div class="form-floating mb-3">
          <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Seleccionar</option>
            <?php foreach ($areas as $area): ?>
              <option value="<?php echo $area['id']; ?>"><?php echo $area['name_area']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="floatingSelect">Área de trabajo</label>
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="col-5 btn btn-dark">Registrarse</button>
            <a href="/app/auth/views/login.php" class="btn btn-light col-5">Iniciar sesión</a>
          </div>
    </form>
      </div>
      </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="/public/js/scriptShowPassword.js">
  // Función para mostrar u ocultar la contraseña
</script>
</body>
</html>
