let actualForm = "configuration-form";
let toForm = null;

function selectEditorForm(element) {
    if(element.id + '-form' === actualForm) return;

    if(element.id === 'configuration' || element.id === 'personalization') {
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
    if(actualForm === 'configuration-form') {
        document.getElementById('save-config-btn').setAttribute('disabled', 'disabled');
    } 
    if(actualForm === 'personalization-form') {
        document.getElementById('save-style-btn').setAttribute('disabled', 'disabled');
    }
    selectEditorForm(toForm);
}

function unsavedChanges() {
    if(actualForm === 'configuration-form') {
      return !document.getElementById('save-config-btn').hasAttribute('disabled');
    } 
    if(actualForm === 'personalization-form') {
        return !document.getElementById('save-style-btn').hasAttribute('disabled');
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
    let saveChangesBtn = document.getElementById('save-config-btn');
    document.querySelectorAll("#config-form-input, #country-select, #country-division-select, #image-input-invitationmeta_img").forEach(function(element) {
        element.addEventListener("change", function() {
            saveChangesBtn.removeAttribute("disabled");
            configFormChanges = true;
        });
    });
});

document.addEventListener("DOMContentLoaded", function() {
    let saveChangesBtn = document.getElementById('save-style-btn');
    document.querySelectorAll("#style-form-input, #color-picker, #color-input, #background_color-picker, #background_color-input, #image-input-invitationframe_image").forEach(function(element) {
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

    if(selectedFiles['invitation']['frame_image']){
        formData.append('frame_image', selectedFiles['invitation']['frame_image']);
    }
    if(selectedFiles['invitation']['meta_img']){
        formData.append('meta_img', selectedFiles['invitation']['meta_img']);
    }
    formData.append('_method', 'PATCH');

    fetch(form.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //'Content-Type': 'multipart/form-data'
        },
        body: formData
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 201){
            Livewire.dispatch('updatedInvitation');
            Livewire.dispatch('updatedInvitationLogs');
            if(actualForm === 'configuration-form') {
                document.getElementById('save-config-btn').setAttribute('disabled', 'disabled');
            } 
            if(actualForm === 'personalization-form') {
                document.getElementById('save-style-btn').setAttribute('disabled', 'disabled');
            }
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
        } else {
            console.error(data);
            if(statusCode === 422){
                mapErrorsToast(data.errors, data.message);
            } else {
                showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
            }
        }
    })
    .catch(error => console.error('Error:', error));
}

function loadCountryDivisions(){
    let country = document.getElementById('country-select').value;
    let countryDivisions = document.getElementById('country-division-select');

    fetch(window.COUNTRY_DIVISIONS + "/" + country, {})
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 200){
            countryDivisions.innerHTML = "";
            countryDivisions.removeAttribute("disabled");
            data.data.forEach(function(division){
                let option = document.createElement('option');
                option.value = division.id;
                option.textContent = division.state_name;
                countryDivisions.appendChild(option);
            });
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function checkPathName(e){
    let pathName = e.value;
    let originalPathName = e.getAttribute('data-original-pathname');

    if(pathName === originalPathName){
        e.classList.remove('is-invalid');
        e.classList.remove('is-valid');
        return;
    }
    fetch(window.VALIDATE_INVITATION + "/" + pathName, {})
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(({statusCode, data}) => {
        if(statusCode === 200){
            if(data.status){
                e.classList.remove("is-invalid");
                e.classList.add("is-valid");
            }else{
                e.classList.remove("is-valid");
                e.classList.add("is-invalid");
            }
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}