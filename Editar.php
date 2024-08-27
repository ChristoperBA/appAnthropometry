<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="css/styles_editar.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="./js/editarUsuario.js"></script>
</head>
<body>
    <!-- Menu -->
    <div class="header_section">
        <div class="container">
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="salud.html">Salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actividadFisica.php">Actividad Fisica</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="Editar.php">Perfil</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- icono volver -->
    <a href="index.php" class="back-to-menu">
        <img src="images/iconHome.png" alt="Menú Principal">
    </a>
    <div class="profile-container">
        <div class="logo-container">
            <h1>Aura Vida App</h1>
            <p>Actualizar Perfil de Usuario</p>
        </div>
        <div id="profile">
            
            
        </div>
        <button type="button" id="guardarInfo">Guardar cambios</button>
    </div>
    <!-- funcionalidad para editar -->
    <script>
        // Función para habilitar el campo de entrada para editar
        function editField(fieldId) {
            const field = document.getElementById(fieldId);

            // Habilitar el campo si está deshabilitado
            if (field.disabled) {
                field.disabled = false;
                field.focus(); // Hacer foco en el campo de texto
            } else {
                field.disabled = true;
            }   
        }

        // Función para mostrar u ocultar la contraseña
        function togglePassword(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Función para mostrar una vista previa de la imagen de perfil seleccionada
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                const output = document.getElementById('display-photo');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    </body>
    </html>