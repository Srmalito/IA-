<?php
$error = '';
$exito = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['correo']);

    // Aquí deberías verificar si el correo existe en la BD
    // y luego enviarle un enlace para restablecer contraseña con un token.
    // Por ahora, simulamos una respuesta exitosa.

    if (!empty($correo)) {
        $exito = "Si tu correo está registrado, recibirás instrucciones para restablecer tu contraseña.";
    } else {
        $error = "Por favor, ingresa un correo válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
   .card {
     border-radius: 10px;
     width: 100%;
     max-width: 500px;
     padding: 2rem;
     background-color: rgba(255, 255, 255, 0.9); /* Mejora legibilidad sobre fondo oscuro */
     box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
   }
  </style>
</head>
<body>
  <div class="card bg-white">
    <h4 class="text-center text-primary mb-4">¿Olvidaste tu contraseña?</h4>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($exito): ?>
      <div class="alert alert-success"><?php echo htmlspecialchars($exito); ?></div>
    <?php endif; ?>

    <form method="post">
      <div class="mb-3">
        <label for="correo" class="form-label">Ingresa tu correo registrado</label>
        <input type="email" class="form-control" name="correo" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Enviar instrucciones</button>
      <div class="text-center mt-3">
        <a href="login.php" class="text-muted small">Volver al inicio de sesión</a>
      </div>
    </form>
  </div>
</body>
</html>
