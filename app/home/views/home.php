<?php
include('component/card.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Proyecto PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../../public/css/auth.css">
</head>
<body>
<div class="container p-2">
  <div class="border-none input-group-append">
    <a href="<?='../../app/auth/views/logout.php'?>" class="btn btn-outline-danger me-2 nav-item">
      <i class="bi bi-box-arrow-left"></i>
    </a>
  </div>
  <div class="row">
  <?php
    // Lista de usuario ficticia con nombre
    $usuarios = [
      ['nombre' => 'Juan','id'=>'1'],
      ['nombre' => 'Pedro','id'=>'2'],
      ['nombre' => 'Maria','id'=>'3'],
      ['nombre' => 'Ana','id'=>'4'],
      ['nombre' => 'Luis','id'=>'5'],
    ];
     foreach ($usuarios as $usuario):
    ?>

    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3">
      <div class="card">
        <div class="card-header"><?php echo $usuario['nombre']?></div>
      <ul class="list-group list-group-flush">
      <?php
        // horarios
        $horarios = [
          ['id'=>'1','horario'=>'Desayuno'],
          ['id'=>'2','horario'=>'Almuerzo'],
          ['id'=>'3','horario'=>'Cena'],
        ];
        foreach ($horarios as $horario):
          echo card($usuario['id'],$horario['horario']);
        endforeach;
        ?>
      </ul>
  </div>
  </div>

  <?php endforeach;?>
  </div>
</div>

</body>
</html>
