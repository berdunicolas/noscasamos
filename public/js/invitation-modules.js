$(document).ready(function () {

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
            console.log(data);
            moduleForms.innerHTML = data;
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));


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
                    console.log(data);
                } else {
                    console.error(data);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});

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
            console.log(data);
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}


function showForm(element, name){
    //if(name + '-module-form' === actualForm) return;
/*
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
    }*/

    //deleteSelectedModule();
    hideModuleForms();

    // Obtener el id del tab clickeado y mostrar su formulario correspondiente
    let formId = name + '-module-form';
    let selectedForm = document.getElementById(formId);
    if (selectedForm) {
        selectedForm.classList.remove('visually-hidden');
    }

    //element.classList.add('selected');
}
/*
function deleteSelectedModule() {
    let editButtons = document.getElementById('invitation-modules');
    // Eliminar la clase 'selected' de todos los tabs
    editButtons.querySelectorAll('.module-edit-button').forEach(item => {
        item.classList.remove('selected');
    });

    $('module-edit-button')
}*/

function hideModuleForms() {
    const container = document.getElementById('module-form');
    container.querySelectorAll('.module-form').forEach(form => {
        form.classList.add('visually-hidden');
    });
}

function sendModuleForm(e, form){
    e.preventDefault();
    let formData = new FormData(form);

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
        if(statusCode === 201){
            console.log(data);
            //location.reload();
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}


// float button

function changeFloatButton(select) {
    let iconButton = document.getElementById('icon_input');
    let urlButton = document.getElementById('url_input');

    if (select.value === 'Link Personalizado') {
        iconButton.classList.remove('d-none');
        urlButton.classList.remove('d-none');
        iconButton.attributes.remove('disabled');
        iconButton.attributes.remove('disabled');
    } else {
        iconButton.classList.add('d-none');
        urlButton.classList.add('d-none');
        iconButton.attributes.add('disabled', 'disabled');
        iconButton.attributes.add('disabled', 'disabled');
    }
}

// cover

function changeCoverFormat(select) {
    let imagesInpusDiv = document.getElementById('images_format_inputs');
    let videoInpustDiv = document.getElementById('video_format_inputs');
    let desktopImagesInput = document.getElementById('desktop_images');
    let mobileImagesInput = document.getElementById('mobile_images');
    let desktopVideoInput = document.getElementById('desktop_video');
    let mobileVideoInput = document.getElementById('mobile_video');



    if (select.value === 'Imagenes') {
        imagesInpusDiv.classList.remove('d-none');
        videoInpustDiv.classList.add('d-none');

        desktopImagesInput.attributes.remove('disabled');
        mobileImagesInput.attributes.remove('disabled');
        
        desktopVideoInput.attributes.add('disabled', 'disabled');
        mobileVideoInput.attributes.add('disabled', 'disabled');

    } else if(select.value === 'Video') {
        imagesInpusDiv.classList.add('d-none');
        videoInpustDiv.classList.remove('d-none');
        
        desktopVideoInput.attributes.remove('disabled');
        mobileVideoInput.attributes.remove('disabled');

        desktopImagesInput.attributes.add('disabled', 'disabled');
        mobileImagesInput.attributes.add('disabled', 'disabled');
    }
}

function expandtext_color_coverPicker() {
    document.getElementById("text_color_cover-picker").click();
}

function updatetext_color_coverColor() {
    let color = document.getElementById("text_color_cover-picker").value;
    document.getElementById('text_color_cover-input').value = color;
}


// save the date

function checkboxSwitch(checkbox, inputId) {
    let input = document.getElementById(inputId);
    console.log(checkbox.checked);
    input.value = checkbox.checked ? 1 : 0;
}