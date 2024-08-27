<?php
// Inicia la sesión
session_start(); 

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
     // Redirigir al login si la sesión no está iniciada
    header("Location: login.php");
    exit;
}

// Conexión a la base de datos
$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recolectar los datos de la solicitud POST
$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
$pasos = isset($_POST['steps']) ? $_POST['steps'] : '';
$calorias = isset($_POST['calorias']) ? $_POST['calorias'] : '';
$tiempo = isset($_POST['tiempo']) ? $_POST['tiempo'] : '';

// Obtener el ID del usuario autenticado
$idUser = $_SESSION['user_id'];

// Validar los datos
if (!empty($fecha) && !empty($pasos) && !empty($calorias) && !empty($tiempo)) {
    // Preparar la consulta SQL para insertar los datos
    $stmt = $conn->prepare("INSERT INTO actividadfisica (idUser, fecha, pasos, calorias, tiempo) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiii", $idUser, $fecha, $pasos, $calorias, $tiempo);

    if ($stmt->execute()) {
        echo "Datos agregados exitosamente";
    } else {
        echo "Error al agregar los datos: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Por favor, complete todos los campos.";
}

$conn->close();
?>
