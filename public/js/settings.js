let actualForm = "invitations-form";
let toForm = null;

function selectEditorForm(element) {
    if(element.id + '-form' === actualForm) return;

    if(element.id === 'invitations' || element.id === 'fonts' || element.id === 'icons' || element.id === 'colors') {
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
    if(actualForm === 'invitations-form') {
        document.getElementById('save-invitations-btn').setAttribute('disabled', 'disabled');
    } 
    if(actualForm === 'fonts-form') {
        document.getElementById('save-fonts-btn').setAttribute('disabled', 'disabled');
    }
    if(actualForm === 'icons-form') {
        document.getElementById('save-icons-btn').setAttribute('disabled', 'disabled');
    }
    if(actualForm === 'colors-form') {
        document.getElementById('save-colors-btn').setAttribute('disabled', 'disabled');
    }
    selectEditorForm(toForm);
}

function unsavedChanges() {
    if(actualForm === 'invitations-form') {
      return !document.getElementById('save-invitations-btn').hasAttribute('disabled');
    } 
    if(actualForm === 'fonts-form') {
        return !document.getElementById('save-fonts-btn').hasAttribute('disabled');
    }
    if(actualForm === 'icons-form') {
        return !document.getElementById('save-icons-btn').hasAttribute('disabled');
    }
    if(actualForm === 'colors-form') {
        return !document.getElementById('save-colors-btn').hasAttribute('disabled');
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
    let saveChangesBtn = document.getElementById('save-invitations-btn');
    document.querySelectorAll("#invitations-form-input").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let saveChangesBtn = document.getElementById('save-fonts-btn');
    document.querySelectorAll("#fonts-form-input").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let saveChangesBtn = document.getElementById('save-icons-btn');
    document.querySelectorAll("#icons-form-input").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let saveChangesBtn = document.getElementById('save-colors-btn');
    document.querySelectorAll("#colors-form-input").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});


function saveInvitationChanges(e, form) {
    e.preventDefault();
    let formData = new FormData(form);
    let data = Object.fromEntries(formData.entries());

    fetch(form.action, {
        method: 'POST',
        credentials: 'include',
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
            console.log(actualForm);
            if(actualForm === 'invitations-form') {
                document.getElementById('save-invitations-btn').setAttribute('disabled', 'disabled');
            } 
            if(actualForm === 'fonts-form') {
                document.getElementById('save-fonts-btn').setAttribute('disabled', 'disabled');
            }
            if(actualForm === 'icons-form') {
                Livewire.dispatch('updateIconsTable');
                document.getElementById('save-icons-btn').setAttribute('disabled', 'disabled');
            }
            if(actualForm === 'colors-form') {
                Livewire.dispatch('updateColorsTable');
                document.getElementById('save-colors-btn').setAttribute('disabled', 'disabled');
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

function deleteColor(e, btn) {
    e.preventDefault();
    let url = btn.dataset.deleteUrl;

    fetch(url, {
        method: 'DELETE',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 204){
            Livewire.dispatch('updateColorsTable');
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i> Color deleted successfully');
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
function deleteIcon(e, btn) {
    e.preventDefault();
    let url = btn.dataset.deleteUrl;

    fetch(url, {
        method: 'DELETE',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        }
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 204){
            Livewire.dispatch('updateIconsTable');
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i> Color deleted successfully');
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