
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
<div class="container mt-5">
<div class="d-flex justify-content-center align-items-center">
      <div class="card p-4">
        <img src="https://media.licdn.com/dms/image/v2/D560BAQEy1CGTGds_9A/company-logo_200_200/company-logo_200_200/0/1681229472418?e=1732147200&v=beta&t=MU75PKtb8SDV--WZawqINSkuVqWGH50-WawKxVtKjBk" class="card-img-top img-card-login" alt="imagen de fondo inkapaking">
        <div class="card-body">
        <h2>Registro de usuario</h2>
        <p>¡Bienvenida al sistema de gestión de nuestro comedor!</p>
        <form action="register.php" method="post">
        <div class="mb-3">
            <label for="fullname" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
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
</body>
</html>
