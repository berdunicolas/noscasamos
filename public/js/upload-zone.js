function abrirSelector(id) {
    document.getElementById(id).click();
}

function manejarSeleccion(input, zoneOwner, zoneName, isMultiple) {
    const files = input.files;
    procesarArchivos(files, zoneOwner, zoneName, isMultiple);
    input.value = ''; // Para permitir volver a seleccionar el mismo archivo
}

function manejarDragOver(event, id) {
    event.preventDefault();
    document.getElementById(id).classList.add('dragover');
}

function manejarDragLeave(event, id) {
    document.getElementById(id).classList.remove('dragover');
}

function manejarDrop(event, id, zoneOwner, zoneName, isMultiple) {
    event.preventDefault();
    let zoneElement = document.getElementById(id);
    zoneElement.classList.remove('dragover');

    const files = event.dataTransfer.files;
    procesarArchivos(files, zoneOwner, zoneName, isMultiple);
}

function procesarArchivos(files, zoneOwner, zoneName, isMultiple) {
    for (let file of files) {
        if (!file.type.startsWith('image/')) continue;

        let index = null;

        if(isMultiple){
            selectedFiles[zoneOwner][zoneName].push(file);

            index = selectedFiles[zoneOwner][zoneName].length - 1;

        }else{
            selectedFiles[zoneOwner][zoneName] = file;
        }
        const reader = new FileReader();
        reader.onload = (e) => {
            const div = document.createElement('div');
            div.classList.add('preview-item');
            div.innerHTML = `
                <img src="${e.target.result}" alt="preview" class="preview-img" >
                <button type="button" class="remove-btn" data-index="${index}" onclick="eliminarImagen(this, '${zoneOwner}', '${zoneName}')">&times;</button>
            `;
            let previewContainer = document.getElementById('preview-container-'+zoneOwner+zoneName);
            if(!isMultiple){
                previewContainer.innerHTML = '';

                div.innerHTML = `
                    <img src="${e.target.result}" alt="preview" class="preview-img" >
                    <button type="button" class="remove-btn" onclick="eliminarImagen(this, '${zoneOwner}', '${zoneName}')">&times;</button>
                `;
            }
            div.classList.add();
            previewContainer.appendChild(div);

            window.makeSortableGaleria();
            window.makeSortableCoverDesktop();
            window.makeSortableCoverMobile();
        };
        reader.readAsDataURL(file);
    }
}

function eliminarImagen(btnElement, zoneOwner, zoneName) {
    btnE = btnElement;
    if(btnElement.dataset.index === undefined){
        selectedFiles[zoneOwner][zoneName] = null;
    }else{
        selectedFiles[zoneOwner][zoneName][btnElement.dataset.index] = null;
    }

    let input = document.getElementById('image-input-'+ zoneOwner +zoneName);
    const event = new Event('change', { bubbles: true });
    input.dispatchEvent(event);
    
    btnElement.parentElement.remove();
}