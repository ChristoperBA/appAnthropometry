document.addEventListener('DOMContentLoaded', function () {
    const addActivityBtn = document.getElementById('addActivityBtn');
    const activityModal = document.getElementById('activityModal');
    const closeModalBtn = document.querySelector('.close');
    const activityForm = document.getElementById('activityForm');

    // Muestra el modal cuando se hace clic en el botón "Agregar Nueva Actividad Diaria"
    addActivityBtn.addEventListener('click', function () {
        activityModal.style.display = 'block';
    });

    // Cierra el modal cuando se hace clic en el botón de cerrar (x)
    closeModalBtn.addEventListener('click', function () {
        activityModal.style.display = 'none';
    });

    // Cierra el modal si se hace clic fuera del modal
    window.addEventListener('click', function (event) {
        if (event.target === activityModal) {
            activityModal.style.display = 'none';
        }
    });

    // Maneja el envío del formulario y cierra el modal
    activityForm.addEventListener('submit', function (event) {
        event.preventDefault();
        activityModal.style.display = 'none';
    });
});
