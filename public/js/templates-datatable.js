$(document).ready(function(){
    renderDatatable();
});

let datatable;

function renderDatatable(){
    datatable = $('#datatable').DataTable({
        ajax: {
            url: '/api/templates',
            type: 'GET',
            dataSrc: '',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Accept', 'application/json');
            },
            xhrFields: {
                withCredentials: true
            }
        },
        responsive: {
            details: {
                type: 'column',
                target: 'tr' // despliega al hacer clic en toda la fila
            }
        },
        columns: [
            { data: 'id' },
            { 
                data: 'name',
                responsivePriority: 1,
            },
            { data: 'event' },
            { 
                data: 'plan',
                responsivePriority: 3,
                className: 'text-center',
                render: function(data) {
                    if(data == 'Platino'){
                        return `<span class="badge text-bg-secondary">${data}</span>`;
                    }
                    if(data == 'Gold'){
                        return `<span class="badge text-bg-warning">${data}</span>`;
                    }
                    if(data == 'Clásico'){
                        return `<span class="badge text-bg-info">${data}</span>`;
                    }
                }
            },
            { 
                data: 'url_item',
                orderable: false,
                render: function(data, type, row) {
                    let acctions = `
                        <span class="visually-hidden">${row.active ? 'activo' : 'inactivo'}</span>
                        <div class="form-check form-switch">
                            <a href="${data.replace('/api', '') + '/edit'}" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-edit"></i></a>
                            <button class="btn btn-sm btn-outline-danger" 
                                data-bs-toggle="modal"
                                data-bs-target="#confirmDeleteModal"
                                data-url="${data}"
                            ><i class="fa-light fa-trash"></i></button>
                        </div>
                    `;

                    return acctions;
                }
            },
        ],
        columnDefs: [
            {
                className: 'dtr-control',
                targets: 0 // o cualquier otra columna como "nombre"
            }
        ],
        order: {
            name: 'Id',
            dir: 'desc'
        },
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            search: "Buscar:",
            paginate: {
                first: '<i class="fa-light fa-chevrons-left"></i>',
                last: '<i class="fa-light fa-chevrons-right"></i>',
                next: '<i class="fa-light fa-chevron-right"></i>',
                previous: '<i class="fa-light fa-chevron-left"></i>'
            }
        },
        buttons: [
            {
                header: false,
                extend: 'csv',
                text: '<span class="mx-2"><i class="fa-light fa-file-arrow-down fa-lg me-2"></i> csv</span>',
                className: 'btn btn-light btn-outline-dark',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            }
        ]
    });
}


function newTemplate(form, e) {
    e.preventDefault();

    const closeModal = document.getElementById('close-modal-btn');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
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
    .then(async ({statusCode, data}) => {
        if(statusCode === 201){
            let id = await data.data.id;
            window.location = 'templates/' + id + '/edit';
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}


let deleteUrl = null;

const deleteModal = document.getElementById('confirmDeleteModal');

deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    deleteUrl = button.getAttribute('data-url');

});

function deleteTemplate() {

    if(deleteUrl) {
        fetch(deleteUrl, {
            method: 'DELETE',
            credentials: 'include',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
            },
        })
        .then(async response => {
            if(response.status === 200){
                deleteUrl = null;
                datatable.ajax.reload();
            } else {
                const text = await response.text();
                const data = text ? JSON.parse(text) : {};
                console.error(data);
            }
        })
        .catch(error => console.error('Error:', error));
    }
}