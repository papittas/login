<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION["email"]) && !isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION["email"] ?? $_SESSION["usuario"] ?? "Usuario";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
    <div class="welcome-container">
        <div class="welcome-card">
            <h1 class="welcome-title">¡Bienvenido!</h1>
            <p class="welcome-text">Hola <strong><?php echo htmlspecialchars($usuario); ?></strong></p>
            <p class="welcome-text">Has iniciado sesión correctamente en el sistema.</p>
            
            <div class="links-container">
                <a href="logout.php" class="btn-primary" style="text-decoration: none; display: inline-block; margin: 0.5rem;">Cerrar Sesión</a>
                
                <?php if (isset($_SESSION["email"])): ?>
                    <a href="login.php" class="btn-secondary" style="text-decoration: none; display: inline-block; margin: 0.5rem;">Login con Base de Datos</a>
                <?php endif; ?>
                
                <?php if (isset($_SESSION["usuario"])): ?>
                    <a href="index.php" class="btn-secondary" style="text-decoration: none; display: inline-block; margin: 0.5rem;">Login Principal</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>