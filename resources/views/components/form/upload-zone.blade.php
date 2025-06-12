
<label>{{$label}}</label>
<div id="upload-zone-{{$zoneName}}" class="upload-zone"
    ondragover="manejarDragOver(event, 'upload-zone-{{$zoneName}}')"
    ondragleave="manejarDragLeave(event, 'upload-zone-{{$zoneName}}')"
    ondrop="manejarDrop(event, 'upload-zone-{{$zoneName}}', '{{$zoneName}}', {{$isMultiple}})"
    onclick="abrirSelector('upload-zone-{{$zoneName}}')">

    <p>Arrastra imágenes aquí o haz clic para seleccionar</p>
    <input type="file" id="image-input-{{$zoneName}}" {{($isMultiple) ? 'multiple' : ''}} accept="image/*" hidden onchange="manejarSeleccion(this, '{{$zoneName}}', {{$isMultiple}})">
    <button type="button" class="btn btn-dark" id="add-more-btn" onclick="abrirSelector('image-input-{{$zoneName}}')"><i class="fa-light fa-plus fa-xl"></i></button>
</div>
<div id="preview-container-{{$zoneName}}" class="preview-container">
    {{$slot}}
</div>