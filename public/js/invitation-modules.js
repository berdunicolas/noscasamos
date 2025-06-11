async function fetchImageAsBlob(url) {
    const response = await fetch(url);
    if (!response.ok) {
        throw new Error(`Error al descargar la imagen: ${url}`);
    }
    return await response.blob();
}

async function uptateSelectedFiles(name, data) {
    console.log(name);
    if (!data) return;

    
    const urls = Array.isArray(data) ? data : [data];
    
    try {
        const blobs = await Promise.all(urls.map(fetchImageAsBlob));
        selectedFiles[name] = blobs.length === 1 ? blobs[0] : blobs;
    } catch (error) {
        console.error('Error al convertir imágenes a blob:', error);
    }
}

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
            moduleForms.innerHTML = data;

            let selectedFilesUpdaters = document.getElementsByClassName('selectedFilesUpdater');
            
            Array.from(selectedFilesUpdaters).map(function (files) {
                files = JSON.parse(files.innerHTML);
                uptateSelectedFiles(files[0], files[1]);
            });
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
        }else{
            showToast( '<i class="fa-duotone fa-light fa-triangle-exclamation ms-3 me-2"></i>' + data.message);
        }
    })
    .catch(error => {
        console.error(error);
    });
}


function sendModuleForm(e, form, name = ''){
    e.preventDefault();
    let formData = new FormData(form);

    switch(name){
        case 'INTRO':
            if(selectedFiles['stamp_image']){
                formData.append('stamp_image', selectedFiles['stamp_image'])
            }
            break;
        case 'COVER':
            selectedFiles['images_desktop_cover'].forEach(file => {
                if (file) {
                    formData.append('desktop_images[]', file);
                }
            });
            selectedFiles['images_mobile_cover'].forEach(file => {
                if (file) {
                    formData.append('mobile_images[]', file);
                }
            });
            if(selectedFiles['design_desktop_cover']){
                formData.append('desktop_design', selectedFiles['design_desktop_cover']);
            }
            if(selectedFiles['design_mobile_cover']){
                formData.append('mobile_design', selectedFiles['design_mobile_cover']);
            }
            if(selectedFiles['logo_cover']){
                formData.append('logo_cover', selectedFiles['logo_cover']);
            }
            if(selectedFiles['central_image_cover']){
                formData.append('central_image_cover', selectedFiles['central_image_cover']);
            }
            break;
        case 'WELCOME':
            if(selectedFiles['welcome_image']){
                formData.append('image', selectedFiles['welcome_image']);
            }
            break;
        case 'EVENTS':
            if(selectedFiles['civil_image']){
                formData.append('civil_image', selectedFiles['civil_image']);
            }
            if(selectedFiles['ceremony_image']){
                formData.append('ceremony_image', selectedFiles['ceremony_image']);
            }
            if(selectedFiles['party_image']){
                formData.append('party_image', selectedFiles['party_image']);
            }
            if(selectedFiles['dresscode_image']){
                formData.append('dresscode_image', selectedFiles['dresscode_image']);
            }
            break;
        case 'HISTORY':
            if(selectedFiles['history_image']){
                formData.append('image', selectedFiles['history_image']);
            }
            break;
        case 'INFO':
            if(selectedFiles['info_image']){
                formData.append('image', selectedFiles['info_image']);
            }
            break;
        case 'HIGHLIGHTS':
            if(selectedFiles['highlights_image']){
                formData.append('image', selectedFiles['highlights_image']);
            }
            break;
        
        case 'GALERY':
            selectedFiles['galery_images'].forEach(file => {
                if (file) {
                    formData.append('galery_images[]', file);
                }
            });
            break;

        case 'GIFTS':
            if(selectedFiles['gift_background_image']){
                formData.append('background_image', selectedFiles['gift_background_image']);
            }
            if(selectedFiles['gift_module_image']){
                formData.append('module_image', selectedFiles['gift_module_image']);
            }
            if(selectedFiles['list_product_image_1']){
                formData.append('list_product_image_1', selectedFiles['list_product_image_1']);
            }
            if(selectedFiles['list_product_image_2']){
                formData.append('list_product_image_2', selectedFiles['list_product_image_2']);
            }
            if(selectedFiles['list_product_image_3']){
                formData.append('list_product_image_3', selectedFiles['list_product_image_3']);
            }
            if(selectedFiles['list_product_image_4']){
                formData.append('list_product_image_4', selectedFiles['list_product_image_4']);
            }
            if(selectedFiles['list_product_image_5']){
                formData.append('list_product_image_5', selectedFiles['list_product_image_5']);
            }
            if(selectedFiles['list_product_image_6']){
                formData.append('list_product_image_6', selectedFiles['list_product_image_6']);
            }
            break;
    }

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


// float button
/*
function changeFloatButton(select) {
    let iconButton = document.getElementById('icon_input');
    let urlButton = document.getElementById('url_input');

    if (select.value === 'Confirmar Asistencia') {
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
}*/

// cover

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
    input.value = checkbox.checked ? 1 : 0;
}
