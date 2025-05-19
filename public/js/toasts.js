function showToast(htmlContent) {
    const toastContainer = document.getElementById('toast-containter');
    const toastModel = document.getElementById('toast-model');

    // Clonar el modelo
    const newToast = toastModel.cloneNode(true);
    newToast.id = ''; // Evitar duplicados de ID

    // Insertar el contenido
    newToast.querySelector('.toast-body').innerHTML = htmlContent;

    // Agregar al contenedor
    toastContainer.appendChild(newToast);

    // Usar Bootstrap para inicializar el toast (si está disponible)
    const bsToast = bootstrap.Toast.getOrCreateInstance(newToast);
    bsToast.show();

    // Destruir después de 4 segundos con animación
    setTimeout(() => {
        newToast.classList.remove('show');
        newToast.classList.add('hide');
        setTimeout(() => newToast.remove(), 500); // Esperar animación de fade-out
    }, 4000);
}


function mapErrorsToast(errors, message = null) {
    let content =  '<i class="fa-duotone fa-light fa-triangle-exclamation ms-3 me-2"></i>';
    if(message !== null){
        content += `<b>${message}</b>`
    }
    content +=  '<br><ul>';
    for (const [field, messages] of Object.entries(errors)) {
        messages.forEach(msg => {
            content += `<li>${msg}</li>`;
        });
    }
    content +=  '</ul>';

    showToast(content);
}