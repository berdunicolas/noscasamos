
@empty(!$label)
<label>{{$label}}</label>
@endempty
<div id="upload-zone-{{$zoneOwner}}{{$zoneName}}" class="upload-zone"
    ondragover="manejarDragOver(event, 'upload-zone-{{$zoneOwner}}{{$zoneName}}')"
    ondragleave="manejarDragLeave(event, 'upload-zone-{{$zoneOwner}}{{$zoneName}}')"
    ondrop="manejarDrop(event, 'upload-zone-{{$zoneOwner}}{{$zoneName}}', '{{$zoneOwner}}', '{{$zoneName}}', {{$isMultiple}})"
    onclick="abrirSelector('upload-zone-{{$zoneOwner}}{{$zoneName}}')">

    <p>Arrastra imágenes aquí o haz clic para seleccionar</p>
    <input type="file" id="image-input-{{$zoneOwner}}{{$zoneName}}" name="" {{($isMultiple) ? 'multiple' : ''}} accept="image/*" hidden onchange="manejarSeleccion(this, '{{$zoneOwner}}', '{{$zoneName}}', {{$isMultiple}})">
    <button type="button" class="btn btn-dark" id="add-more-btn" onclick="abrirSelector('image-input-{{$zoneOwner}}{{$zoneName}}')"><i class="fa-light fa-plus fa-xl"></i></button>
</div>
<div id="preview-container-{{$zoneOwner}}{{$zoneName}}" class="preview-container">
    {{$slot}}
</div>