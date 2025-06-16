<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$nombre = $_SESSION['nombre'];
$rol = $_SESSION['rol'];
$rolMostrar = ($rol === 'admin') ? 'Administrador' : 'Usuario';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
              url('https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            padding-top: 70px;
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .card {
            border-radius: 15px;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 20px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand text-primary fw-bold" href="#">Mi Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav ms-auto">
                <?php if ($rol === 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gestionar usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ver reportes</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<div class="card text-center mt-4">
    <h2 class="text-primary mb-3">¡Hola, <?php echo htmlspecialchars($nombre); ?>!</h2>
    <p class="mb-1">Tu rol es: <strong><?php echo htmlspecialchars($rolMostrar); ?></strong></p>

    <?php if ($rol === 'admin'): ?>
        <div class="alert alert-info mt-3">Tienes acceso como <strong>administrador</strong>.</div>
    <?php else: ?>
        <div class="alert alert-secondary mt-3">Tienes acceso como <strong>usuario</strong>.</div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
