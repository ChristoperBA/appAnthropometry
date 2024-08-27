<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles_login.css">
    <script src="../.vscode/js/script.js"></script>
</head>
<body>
    <div class="login-container">
        <div class="logo-container">
            <h1>Aura Vida App</h1>
            <p>Herramienta para mantenerte sano</p>
        </div>
        <form class="login-form" method="POST" action="procesar_login.php">
            <label for="username">Nombre de usuario:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">Contraseña:</label>
            <div class="password-container">
                <input type="password" id="password" name="password" required>
                <button type="button" class="show-password">👁️</button>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <button type="submit">INGRESAR</button>
            
            <div class="links">
                <a href="#">Olvidé mi contraseña</a>
                <a href="crear_cuenta.html">Regístrate aquí</a>
            </div>
        </form>
    </div>
    
</body>
</html>
