<?php
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

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    echo "No has iniciado sesión.";
    exit;
}

// Consulta para obtener los datos del perfil del usuario
$sql = "
    SELECT 
        u.nombre_usuario, 
        u.correo, 
        u.contrasena, 
        d.genero, 
        d.fechaNacimiento, 
        d.peso, 
        d.altura 
    FROM usuario_login u 
    JOIN datosusuario d ON u.ID = d.Id
    WHERE u.ID = ?
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();

// Comenzamos a generar el HTML del formulario
$html = '<form class="profile-form">';

// Si se encuentran datos
if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();

    // HTML para mostrar los datos obtenidos
    $html .= '<div class="form-group">
                <img src="https://fwmedia.fandomwire.com/wp-content/uploads/2024/07/27091033/luffy-one-piece-2-1024x575.jpg" alt="Foto de perfil" class="profile-photo" id="display-photo">
                <label>Cambiar Foto:</label>
                <input type="file" id="profile-photo" onchange="previewImage(event)">
              </div>';

    $html .= '<div class="form-group">
                <label>Nombre de usuario:</label>
                <input type="text" id="profile-username" name="username" value="' . htmlspecialchars($userData['nombre_usuario']) . '" disabled>
                <button type="button" class="edit-button" onclick="editField(\'profile-username\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Correo electrónico:</label>
                <input type="email" id="profile-email" name="email" value="' . htmlspecialchars($userData['correo']) . '" disabled>
                <button type="button" class="edit-button" onclick="editField(\'profile-email\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Género:</label>
                <select id="profile-gender" name="gender" disabled>
                    <option value="male"' . ($userData['genero'] == 'male' ? ' selected' : '') . '>Masculino</option>
                    <option value="female"' . ($userData['genero'] == 'female' ? ' selected' : '') . '>Femenino</option>
                </select>
                <button type="button" class="edit-button" onclick="editField(\'profile-gender\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Fecha de nacimiento:</label>
                <input type="date" id="profile-birthdate" name="birthdate" value="' . htmlspecialchars($userData['fechaNacimiento']) . '" disabled>
                <button type="button" class="edit-button" onclick="editField(\'profile-birthdate\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Peso (kg):</label>
                <input type="number" id="profile-weight" name="weight" value="' . htmlspecialchars($userData['peso']) . '" disabled>
                <button type="button" class="edit-button" onclick="editField(\'profile-weight\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Altura (cm):</label>
                <input type="number" id="profile-height" name="height" value="' . htmlspecialchars($userData['altura']) . '" disabled>
                <button type="button" class="edit-button" onclick="editField(\'profile-height\')">✏️</button>
              </div>';

    $html .= '<div class="form-group">
                <label>Contraseña:</label>
                <div class="password-container">
                    <input type="password" id="profile-password" value="' . htmlspecialchars($userData['contrasena']) . '" disabled>
                    <button type="button" class="show-password" onclick="togglePassword(\'profile-password\')">👁️</button>
                    <button type="button" class="edit-button" onclick="editField(\'profile-password\')">✏️</button>
                </div>
              </div>';
} else {
    $html .= "<p>No se encontraron datos del usuario.</p>";
}

// Cierra la conexión a la base de datos
$conn->close();

// Finaliza el formulario
$html .= '</form>';

// Imprime el HTML para que sea capturado por AJAX
echo $html;
?>
