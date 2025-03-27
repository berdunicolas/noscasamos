function selectEditorForm(element) {
    let formTabs = document.getElementById('editor-nav-tab');

    // Eliminar la clase 'selected' de todos los tabs
    formTabs.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('selected');
    });

    // Agregar la clase 'selected' al tab clickeado
    element.parentElement.classList.add('selected');

    // Ocultar todos los formularios
    document.querySelectorAll('.tab-form').forEach(form => {
        form.classList.add('visually-hidden');
    });

    // Obtener el id del tab clickeado y mostrar su formulario correspondiente
    let formId = element.id + '-form';
    let selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.classList.remove('visually-hidden');
    }
}