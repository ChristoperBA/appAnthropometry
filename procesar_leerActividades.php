<?php
session_start(); // Inicia la sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al login si la sesión no está iniciada
    header("Location: login.php"); 
    exit;
}

$servername = "localhost";
$username = "ChristopherBA";
$password = "hola123";
$database = "aura_vida";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID del usuario desde la sesión
$user_id = $_SESSION['user_id'];

// Consulta para obtener datos
$sql = "SELECT fecha, pasos, calorias, tiempo FROM actividadfisica WHERE idUser = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Mostrar datos
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Fecha</th>";
    echo "<th>Pasos</th>";
    echo "<th>Calorías</th>";
    echo "<th>Tiempo (minutos)</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["pasos"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["calorias"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["tiempo"]) . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "<p>No hay datos que mostrar.</p>";
}

// Cerrar conexión
$conn->close();
?>
