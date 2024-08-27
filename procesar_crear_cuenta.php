<?php

$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";  

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['username'];
    $correo = $_POST['email'];
    $contrasena = $_POST['password'];
    $confirm_contrasena = $_POST['confirm-password'];

    // contraseñas coincidan
    if ($contrasena !== $confirm_contrasena) {
        $error = "Las contraseñas no coinciden.";
        header("Location: crear_cuenta.html?error=" . urlencode($error));
        exit;
    }

    // existencia
    $stmt = $conn->prepare("SELECT * FROM usuario_login WHERE nombre_usuario = ? OR correo = ?");
    $stmt->bind_param("ss", $nombre_usuario, $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error = "El nombre de usuario o correo ya están en uso.";
        header("Location: login.php");
        exit;
    }

    // Insertar 
    $stmt = $conn->prepare("INSERT INTO usuario_login (nombre_usuario, correo, contrasena) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre_usuario, $correo, $contrasena);  // Considera usar hashing en la contraseña
    if ($stmt->execute()) {
        header("Location: login.php");
        exit;
    } else {
        $error = "Hubo un error al crear la cuenta. Intenta de nuevo.";
        header("Location: registro.html");
        exit;
    }

    $stmt->close();
}

$conn->close();
?>