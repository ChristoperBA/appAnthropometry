<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Actividad Física</title>
    <link rel="stylesheet" href="css/styles_actividadFisica.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/actividadFisica.js"></script>
    <script src="./js/script_actividadFisica.js"></script>
</head>
<body>
    <!-- Menu -->
    <div class="header_section">
        <div class="contenedor">
            <nav class="navbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="salud.php">Salud</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="actividadFisica.php">Actividad Fisica</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="Editar.php">Perfil</a>
                    </li>
                </ul>
                <div class="search-container">
                    <input type="text" placeholder="Buscar...">
                    <button type="submit" class="search-button">
                        <img src="./images/lupa.png" alt="Search" height="20px" width="20px">
                    </button>
                </div>
            </nav>
        </div>
    </div>
    <a href="index.php" class="back-to-menu">
        <img src="images/iconHome.png" alt="Menú Principal">
    </a>




    <!-- Actividad Fisica -->
    <div class="container">
        <header>
            <h1>Registro de Actividad Física</h1>
            <button id="addActivityBtn">Agregar Nueva Actividad Diaria</button>
        </header>
        
        <button type="button" id="boton_read" >Refrescar Actividades</button>
        <div id="actividad-table">


        </div>
    </div>
    <!-- Modal Agregar actividades-->
    <div id="activityModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Agregar Actividad Diaria</h2>
            <form id="activityForm">
                
                
                <img src="./images/calendar.png" alt="" height="30px" width="30px">
                <label for="date">Fecha:</label>
                <input type="date" id="fecha" required><br>

                <img src="./images/shoes.png" alt="" height="30px" width="30px">
                <label for="steps">Pasos:</label>
                <input type="number" id="steps"  required><br>

                <img src="./images/calories.png" alt="" height="30px" width="30px">
                <label for="calories">Calorías:</label>
                <input type="number" id="calorias"  required><br>

                <img src="./images/time.png" alt="" height="30px" width="30px">
                <label for="duration">Tiempo (minutos):</label>
                <input type="number" id="tiempo"  required><br><br>
                
                <button type="button" id="guardarBoton">Guardar Actividad</button>
            </form>
        </div>
    </div>
    
    
</body>
</html>
