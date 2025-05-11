<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .upload-zone {
    border: 2px dashed #ccc;
    padding: 20px;
    position: relative;
    cursor: pointer;
    text-align: center;
}

.preview-container {
    display: flex;
    flex-wrap: wrap;
    margin-top: 10px;
}

.preview-item {
    position: relative;
    margin: 5px;
}

.preview-item img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.remove-btn {
    position: absolute;
    top: 2px;
    right: 2px;
    background: red;
    color: white;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    font-size: 14px;
    width: 20px;
    height: 20px;
}
    </style>
</head>
<body>
    <div>
        <form id="upload-form" action="" enctype="multipart/form-data" method="POST">
            @csrf
            <x-form.upload-zone />
            <button type="submit">Enviar</button>
        </form>
    </div>
    
    
    <script>
const uploadZone = document.getElementById('upload-zone');
const input = document.getElementById('image-input');
const previewContainer = document.getElementById('preview-container');
const addMoreBtn = document.getElementById('add-more-btn');

let selectedFiles = [];

uploadZone.addEventListener('click', () => input.click());

addMoreBtn.addEventListener('click', () => input.click());

uploadZone.addEventListener('dragover', e => {
    e.preventDefault();
    uploadZone.classList.add('dragover');
});

uploadZone.addEventListener('dragleave', () => {
    uploadZone.classList.remove('dragover');
});

uploadZone.addEventListener('drop', e => {
    e.preventDefault();
    uploadZone.classList.remove('dragover');
    handleFiles(e.dataTransfer.files);
});

input.addEventListener('change', () => {
    handleFiles(input.files);
    input.value = ''; // para permitir volver a cargar la misma imagen si se elimina
});

function handleFiles(files) {
    for (let file of files) {
        if (!file.type.startsWith('image/')) continue;

        selectedFiles.push(file);
        const index = selectedFiles.length - 1;

        const reader = new FileReader();
        reader.onload = (e) => {
            const div = document.createElement('div');
            div.classList.add('preview-item');
            div.innerHTML = `
                <img src="${e.target.result}" alt="preview">
                <button type="button" class="remove-btn" data-index="${index}">&times;</button>
            `;
            previewContainer.appendChild(div);

            div.querySelector('.remove-btn').addEventListener('click', function () {
                selectedFiles[index] = null; // marcar como eliminado
                div.remove();
            });
        };
        reader.readAsDataURL(file);
    }
}

document.getElementById('upload-form').addEventListener('submit', e => {
    e.preventDefault();

    const formData = new FormData();

    selectedFiles.forEach(file => {
        if (file) {
            formData.append('images[]', file);
        }
    });

    fetch('/dev', {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.json())
    .then(data => console.log(data))
    .catch(err => console.error(err));
});
    </script>
</body>
</html>




