function abrirSelector(id) {
    document.getElementById(id).click();
}

function manejarSeleccion(input, zoneName, isMultiple) {
    const files = input.files;
    procesarArchivos(files, zoneName, isMultiple);
    input.value = ''; // Para permitir volver a seleccionar el mismo archivo
}

function manejarDragOver(event, id) {
    event.preventDefault();
    document.getElementById(id).classList.add('dragover');
}

function manejarDragLeave(event, id) {
    document.getElementById(id).classList.remove('dragover');
}

function manejarDrop(event, id, zoneName, isMultiple) {
    event.preventDefault();
    let zoneElement = document.getElementById(id);
    zoneElement.classList.remove('dragover');

    const files = event.dataTransfer.files;
    procesarArchivos(files, zoneName, isMultiple);
}

function procesarArchivos(files, zoneName, isMultiple) {
    for (let file of files) {
        if (!file.type.startsWith('image/')) continue;

        let index = null;

        if(isMultiple){
            selectedFiles[zoneName].push(file);

            index = selectedFiles[zoneName].length - 1;

        }else{
            selectedFiles[zoneName] = file;
        }
        const reader = new FileReader();
        reader.onload = (e) => {
            const div = document.createElement('div');
            div.classList.add('preview-item');
            div.innerHTML = `
                <img src="${e.target.result}" alt="preview">
                <button type="button" class="remove-btn" onclick="eliminarImagen(this, '${zoneName}', ${index})">&times;</button>
            `;
            let previewContainer = document.getElementById('preview-container-'+zoneName);
            if(!isMultiple){
                previewContainer.innerHTML = '';
            }
            previewContainer.appendChild(div);

        };
        reader.readAsDataURL(file);
    }
}

function eliminarImagen(btnElement, zoneName, index=null) {
    if(index === null){
        selectedFiles[zoneName] = null;
    }else{
        selectedFiles[zoneName][index] = null;
    }

    let input = document.getElementById('image-input-'+zoneName);
    const event = new Event('change', { bubbles: true });
    input.dispatchEvent(event);
    
    btnElement.parentElement.remove();
}