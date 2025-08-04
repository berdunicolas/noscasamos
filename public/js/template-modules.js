$(document).ready(function () {

    getModules();

    // DESPLAZAMIENTO
    $('#invitation-modules').sortable({
        items: ".item-module:not(.fixed-module)", // solo estos se pueden arrastrar
        handle: ".fa-grip-dots-vertical", // opcional: solo se puede arrastrar desde este ícono
        cancel: ".fixed-module", // elementos que no se deben mover
        update: function (event, ui) {
            let order = $('#invitation-modules').children().map(function () {
                return $(this).data('module-id'); // si tenés algún id asociado
            }).get();

            fetch(window.INVITATION_MODULES_URL + '/change-order', {
                method: 'PATCH',
                credentials: 'include',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                },
                body: JSON.stringify({order: order})
            })
            .then(async response => {
                const statusCode = response.status;
                const text = await response.text();
                const data = text ? JSON.parse(text) : {};
                return ({ statusCode, data });
            })
            .then(async ({statusCode, data}) => {
                if(statusCode === 201){
                    Livewire.dispatch('updatedInvitationLogs');
                } else {
                    console.error(data);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});


document.querySelector('#invitation-modules').addEventListener('click', function (e) {
    const btn = e.target.closest('button');
    if (!btn) return;

    const item = btn.closest('.item-module');
    if (!item || item.classList.contains('fixed-module')) return;

    const parent = item.parentElement;
    const isLeft = btn.querySelector('.fa-chevron-left');
    const isRight = btn.querySelector('.fa-chevron-right');

    if (isLeft) {
        const prev = item.previousElementSibling;
        if (prev && !prev.classList.contains('fixed-module')) {
            parent.insertBefore(item, prev);
            updateOrder();
        }
    }

    if (isRight) {
        const next = item.nextElementSibling;
        if (next) {
            parent.insertBefore(next, item);
            updateOrder();
        }
    }
});

// Función para enviar el nuevo orden al backend
function updateOrder() {
    const order = Array.from(document.querySelectorAll('#invitation-modules .item-module'))
        .map(el => el.dataset.moduleId);

    fetch(window.INVITATION_MODULES_URL + '/change-order', {
        method: 'PATCH',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ order: order })
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return { statusCode, data };
    })
    .then(({ statusCode, data }) => {
        if (statusCode === 201) {
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}


function getModules(){
    fetch(window.INVITATION_MODULES_URL, {
        method: 'GET',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
        }
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        if(statusCode === 200){
            let moduleForms = document.getElementById('module-form');
            data = data.join('');
            moduleForms.innerHTML = data;

        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function statusModuleSwitch(checkbox, module){
    
    fetch(window.INVITATION_MODULES_URL + '/' + module + '/change-status', {
        method: 'PATCH',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
        },
        body: JSON.stringify({active: checkbox.checked ? true : false})
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        if(statusCode === 201){
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function showForm(element, name){
    hideModuleForms();

    // Obtener el id del tab clickeado y mostrar su formulario correspondiente
    let formId = name + '-module-form';
    let selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.classList.remove('visually-hidden');
    }

}

function hideModuleForms() {
    const container = document.getElementById('module-form');
    container.querySelectorAll('.module-form').forEach(form => {
        form.classList.add('visually-hidden');
    });
}

function newModule(e, form){
    e.preventDefault();
    let formData = new FormData(form);
    let closeModal = document.getElementById('close-new-module-modal');

    fetch(form.action, {
        method: form.method,
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        closeModal.click();
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        if(statusCode === 201){
            Livewire.dispatch('newModuleAdded');
            getModules();

            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
        } else {
            if(statusCode === 422){
                mapErrorsToast(data.errors, data.message);
            } else {
                showToast( '<i class="fa-duotone fa-light fa-triangle-exclamation ms-3 me-2"></i>' + data.message);
            }
        }
    })
    .catch(error => console.error('Error:', error));

}

function deleteModule(button) {
    const url = button.getAttribute('data-url');

    fetch(url, {
        method: 'DELETE',
        headers: {
            //'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
        },
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        const li = button.closest('li');
        if (statusCode === 200) {
            if (li) li.remove();
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
            Livewire.dispatch('updatedInvitationLogs');
        }else{
            showToast( '<i class="fa-duotone fa-light fa-triangle-exclamation ms-3 me-2"></i>' + data.message);
        }
    })
    .catch(error => {
        console.error(error);
    });
}


function sendModuleForm(e, form, type = '', name = ''){
    e.preventDefault();
    let formData = new FormData(form);

    const saveIcon = form.querySelector('#save-icon-form');
    const spinnerIcon = form.querySelector('#spinner-icon-form');

    if (saveIcon) saveIcon.classList.add('visually-hidden');
    if (spinnerIcon) spinnerIcon.classList.remove('visually-hidden');

    fetch(form.action, {
        method: 'POST',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: formData
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        if (saveIcon) saveIcon.classList.remove('visually-hidden');
        if (spinnerIcon) spinnerIcon.classList.add('visually-hidden');

        if(statusCode === 201){
            showToast( '<i class="fa-duotone fa-light fa-circle-check ms-3 me-2"></i>' + data.message);
            Livewire.dispatch('updatedInvitationLogs');
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

function changeCoverFormat(select) {
    let imagesInpusDiv = document.getElementById('images_format_inputs');
    let designInpustDiv = document.getElementById('design_format_inputs');
    let videoInpustDiv = document.getElementById('video_format_inputs');
    let desktopImagesInput = document.getElementById('desktop_images');
    let mobileImagesInput = document.getElementById('mobile_images');
    let desktopDesignInput = document.getElementById('desktop_design');
    let mobileDesignInput = document.getElementById('mobile_design');
    let desktopVideoInput = document.getElementById('desktop_video');
    let mobileVideoInput = document.getElementById('mobile_video');


    if (select.value === 'Imagenes' || select.value === 'Imagenes con marco') {
        imagesInpusDiv.classList.remove('d-none');
        designInpustDiv.classList.add('d-none');
        videoInpustDiv.classList.add('d-none');

        desktopImagesInput.attributes.remove('disabled');
        mobileImagesInput.attributes.remove('disabled');
        
        desktopVideoInput.attributes.add('disabled', 'disabled');
        mobileVideoInput.attributes.add('disabled', 'disabled');

        desktopDesignInput.attributes.add('disabled', 'disabled');
        mobileDesignInput.attributes.add('disabled', 'disabled');

    } else if(select.value === 'Video' || select.value === 'Video centrado') {
        imagesInpusDiv.classList.add('d-none');
        designInpustDiv.classList.add('d-none');
        videoInpustDiv.classList.remove('d-none');
        
        desktopVideoInput.attributes.remove('disabled');
        mobileVideoInput.attributes.remove('disabled');

        desktopDesignInput.attributes.add('disabled', 'disabled');
        mobileDesignInput.attributes.add('disabled', 'disabled');

        desktopImagesInput.attributes.add('disabled', 'disabled');
        mobileImagesInput.attributes.add('disabled', 'disabled');
    } else {
        designInpustDiv.classList.remove('d-none');
        imagesInpusDiv.classList.add('d-none');
        videoInpustDiv.classList.add('d-none');

        desktopDesignInput.attributes.remove('disabled');
        mobileDesignInput.attributes.remove('disabled');
        
        desktopVideoInput.attributes.add('disabled', 'disabled');
        mobileVideoInput.attributes.add('disabled', 'disabled');

        desktopImagesInput.attributes.add('disabled', 'disabled');
        mobileImagesInput.attributes.add('disabled', 'disabled');
    }
}

function updatetext_color_coverColor() {
    let color = document.getElementById("text_color_cover-picker").value;
    document.getElementById('text_color_cover-input').value = color;
}

function updatetext_color_coverInput() {
    let color = document.getElementById("text_color_cover-input").value;
    document.getElementById('text_color_cover-picker').value = color;
}

// save the date
function checkboxSwitch(checkbox, inputId) {
    let input = document.getElementById(inputId);
    input.value = checkbox.checked ? 1 : 0;
}


// confirmation 

function changeConfirmationForm(select) {
    let linkForm = document.getElementById('confirmation-link-form');
    let formForm = document.getElementById('confirmation-form-form');


    if (select.value === 'form') {
        formForm.classList.remove('d-none');
        linkForm.classList.add('d-none');
    } else {
        linkForm.classList.remove('d-none');
        formForm.classList.add('d-none');
    }
}

function showCollapseSwitch(switchInput, idCollapse, idInput) {
    const collapse = document.getElementById(idCollapse);

    collapse.classList.toggle('show');

    checkboxSwitch(switchInput, idInput);
}

