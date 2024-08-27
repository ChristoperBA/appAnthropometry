<?php
session_start();
$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    // Preparar y ejecutar la consulta
    $stmt = $conn->prepare("SELECT id, nombre_usuario FROM usuario_login WHERE nombre_usuario = ? AND contrasena = ?");
    $stmt->bind_param("ss", $nombre_usuario, $contrasena);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Obtener los datos del usuario
        $user = $result->fetch_assoc();

        // Guardar el ID del usuario en la sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nombre_usuario'] = $user['nombre_usuario'];

        // Redirigir a la página principal
        header("Location: index.php");
        exit;
    } else {
        // Redirigir con un mensaje de error
        $error = "Nombre de usuario o contraseña incorrectos.";
        header("Location: login.php?error=" . urlencode($error));
        exit;
    }

    $stmt->close();
}
?>
