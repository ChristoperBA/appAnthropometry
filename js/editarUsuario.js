$(document).ready(function() {
    // Función para obtener datos del perfil del usuario
    function loadProfileForm() {
        $.ajax({
            url: '../.vscode/procesar_actualizarPerfil.php',
            type: 'GET',
            success: function(response) {
                // Inserta el HTML del formulario en el contenedor #profile
                $('#profile').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al obtener el formulario del perfil:', error);
            }
        });
    }

    // Llama a la función para cargar el formulario cuando la página esté lista
    loadProfileForm();

    // Evento para guardar la información del perfil
    $("#guardarInfo").click(function (){
        const url = "../.vscode/procesar_editarPerfil.php"; 
        var data = {
            nombre: $("#profile-username").val(),
            email: $("#profile-email").val(),
            genero: $("#profile-gender").val(),
            fechaNacimiento: $("#profile-birthdate").val(),
            peso: $("#profile-weight").val(),
            altura: $("#profile-height").val(),
            password: $("#profile-password").val(),
        };

        $.post(url, data, function(response){
            console.log(response);
            alert(response); // Mostrar respuesta del servidor
        }).fail(function(xhr, status, error) {
            console.error('Error al guardar la información:', error);
        });
    });
});
