<?php
// Iniciar la sesión
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recolectar los datos de la solicitud POST
$nombreUser = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$genero = isset($_POST['genero']) ? $_POST['genero'] : '';
$fechaNacimiento = isset($_POST['fechaNacimiento']) ? $_POST['fechaNacimiento'] : '';
$peso = isset($_POST['peso']) ? $_POST['peso'] : '';
$altura = isset($_POST['altura']) ? $_POST['altura'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Verificar si el usuario está autenticado
if (isset($_SESSION['user_id'])) {
    $userID = $_SESSION['user_id'];

    // Consulta para actualizar los datos del perfil del usuario
    $sql = "UPDATE usuario_login u
            JOIN datosusuario d ON u.ID = d.Id
            SET u.nombre_usuario = ?,
                u.correo = ?,
                d.genero = ?,
                d.fechaNacimiento = ?,
                d.peso = ?,
                d.altura = ?,
                u.contrasena = ?
            WHERE u.ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssddsi", $nombreUser, $email, $genero, $fechaNacimiento, $peso, $altura, $password, $userID);

    if ($stmt->execute()) {
        echo "Actualización realizada correctamente";
    } else {
        echo "Error al actualizar: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No has iniciado sesión.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
