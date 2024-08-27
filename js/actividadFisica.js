$(document).ready(function() {
    $('#guardarBoton').click(function(e) {
        e.preventDefault(); 
        //Ruta a php
        const url = '../.vscode/procesar_actividadFisica.php';
        var data = {
            fecha: $('#fecha').val(),
            steps: $('#steps').val(),
            calorias: $('#calorias').val(),
            tiempo: $('#tiempo').val()
        };

        $.post(url, data, function(response) {
            console.log(response);
            alert(response); 
            // Ocultar el modal después de recibir la respuesta
            $('#activityModal').hide(); 
            $('#fecha').val('');
            $('#steps').val('');
            $('#calorias').val('');
            $('#tiempo').val('');
            // Recargar las actividades después de guardar
            cargarActividades(); 
        }).fail(function(xhr, status, error) {
            console.log("Error: " + error);
            alert("Ha ocurrido un error: " + error);
        });
    });

    // Función para cargar y mostrar las actividades
    function cargarActividades() {
        // Archivo PHP que devolverá el HTML de la tabla
        const url = '../.vscode/procesar_leerActividades.php'; 
        $.get(url, function(response) {
        // Reemplaza el contenido de la tabla con la respuesta del servidor
        $('#actividad-table').html(response); }).fail(function(xhr, status, error) {
        console.log("Error al cargar las actividades: " + error);
        });
    }

    // Cargar las actividades al cargar la página
    cargarActividades();

    // Agregar el manejador de clic para recargar las actividades
    $('#boton_read').click(function() {
        // Llamar a la función para cargar las actividades
        cargarActividades(); 
        
    });
});
