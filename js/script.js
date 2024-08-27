document.addEventListener("DOMContentLoaded", function() {
    // Selecciona el botón y el campo de contraseña
    const showPasswordButton = document.querySelector(".show-password");
    const passwordField = document.querySelector("#password");

    // Añade un evento de clic al botón
    showPasswordButton.addEventListener("click", function() {
        // Cambia el tipo del campo de contraseña
        if (passwordField.type === "password") {
            passwordField.type = "text"; // Muestra la contraseña
            showPasswordButton.textContent = "🙈"; // Cambia el ícono del ojo a cerrado
        } else {
            passwordField.type = "password"; // Oculta la contraseña
            showPasswordButton.textContent = "👁️"; // Cambia el ícono del ojo a abierto
        }
    });
});
