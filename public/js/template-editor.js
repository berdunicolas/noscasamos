let actualForm = "general-form";
let toForm = null;

function selectEditorForm(element) {
    if(element.id + '-form' === actualForm) return;

    if(element.id === 'general') {
        if(unsavedChanges()) {
            showSaveChangesModal(element);
            return;
        }
        actualForm = element.id + '-form';
    } else {
        if(unsavedChanges()) {
            showSaveChangesModal(element);
            return;
        }
        actualForm = null;
    }

    deleteSelectedClasses();
    hideForms();

    // Obtener el id del tab clickeado y mostrar su formulario correspondiente
    let formId = element.id + '-form';
    let selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.classList.remove('visually-hidden');
    }

    // Agregar la clase 'selected' al tab clickeado
    element.parentElement.classList.add('selected');
}

function showSaveChangesModal(element){
    const myModal = new bootstrap.Modal(document.getElementById('save-changes-modal'), {});
    toForm = element;
    myModal.show();
}

function changeFormTab(){
    const myModal = new bootstrap.Modal(document.getElementById('save-changes-modal'), {});
    myModal.hide();
    if(actualForm === 'general-form') {
        document.getElementById('save-general-btn').setAttribute('disabled', 'disabled');
    }
    selectEditorForm(toForm);
}

function unsavedChanges() {
    if(actualForm === 'general-form') {
      return !document.getElementById('save-general-btn').hasAttribute('disabled');
    } 
}

function deleteSelectedClasses() {
    let formTabs = document.getElementById('editor-nav-tab');
    // Eliminar la clase 'selected' de todos los tabs
    formTabs.querySelectorAll('.nav-item').forEach(item => {
        item.classList.remove('selected');
    });
}

// Ocultar todos los formularios
function hideForms() {
    document.querySelectorAll('.tab-form').forEach(form => {
        form.classList.add('visually-hidden');
    });
}

document.addEventListener("DOMContentLoaded", function() {
    let saveChangesBtn = document.getElementById('save-general-btn');
    document.querySelectorAll("#general-form-input, #color-picker, #color-input, #background_color-picker, #background_color-input").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});

function saveTemplateChanges(e, form) {
    e.preventDefault();
    let formData = new FormData(form);
    let data = Object.fromEntries(formData.entries());

    fetch(form.action, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 201){
            if(actualForm === 'general-form') {
                document.getElementById('save-general-btn').setAttribute('disabled', 'disabled');
            } 
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
        } else {
            if(statusCode === 422){
                mapErrorsToast(data.errors, data.message);
            } else {
                showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
            }
        }
    })
    .catch(error => console.error('Error:', error));
}