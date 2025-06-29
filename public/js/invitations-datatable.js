$(document).ready(function(){
    renderDatatable();
});

let datatable;

function renderDatatable(){
    datatable = $('#datatable').DataTable({
        ajax: {
            url: '/api/invitations',
            type: 'GET',
            dataSrc: '',
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Accept', 'application/json');
            },
            xhrFields: {
                withCredentials: true
            }
        },
        columns: [
            { data: 'id' },
            { 
                data: 'event_id',
                name: 'nombre',
            },
            { data: 'event' },
            { 
                data: 'name',
                responsivePriority: 1,
            },
            { 
                data: 'path_name',
                responsivePriority: 2,
                render: function (data, type, row) {
                    const url = '<i class="fa-light fa-slash-forward"></i>' + data;
                    return `<a class="link-dark" href="${row.invitation_url}" target="_blank" >${url}</a>`;
                }
            },
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
                data: 'seller_name',
                responsivePriority: 4,
            },
            { data: 'date', className: 'text-center' }, 
            { 
                data: 'validity',
                className: 'text-center',
                render: function(data) {
                    if(data === null) {
                        return '<span class="badge text-bg-warning">Sin fecha <i class="fa-light fa-calendar-xmark fa-lg"></i></span>';
                    }else if(data){
                        return '<span class="badge text-bg-secondary">No vigente <i class="fa-light fa-calendar-check fa-lg"></i></span>';
                    }else{
                        return '<span class="badge text-bg-info">Vigente <i class="fa-light fa-calendar-clock fa-lg"></i></span>';
                    }
                }
            },
            { data: 'created_by' },
            { 
                data: 'url_item',
                orderable: false,
                render: function(data, type, row) {
                    let acctions = '';

                    if(row.is_legacy){
                        acctions = `
                           <span class="visually-hidden">inactivo legacy</span>
                           <div class="form-check form-switch">
                               <button class="btn btn-sm btn-outline-danger" 
                                   data-bs-toggle="modal"
                                   data-bs-target="#confirmDeleteModal"
                                   data-url="${data}"
                               ><i class="fa-light fa-trash"></i></button>
                           </div>
                        `;
                    } else {
                        acctions = `
                           <span class="visually-hidden">${row.active ? 'activo' : 'inactivo'}</span>
                           <div class="form-check form-switch">
                               <input class="form-check-input" type="checkbox" role="switch" id="invitation-trigger" onChange="changeInvitationStatus(this, '${data}')" ${row.active ? 'checked' : ''}>
                               <a href="${data.replace('/api', '') + '/edit'}" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-edit"></i></a>
                               <button class="btn btn-sm btn-outline-success" 
                                   id="invitation-cloner-${row.id}" 
                                   data-url="${data}" 
                                   data-id="invitation-cloner-${row.id}" 
                                   data-bs-toggle="modal" 
                                   data-bs-target="#confirmcloneModal"
                               ><i class="fa-light fa-clone"></i></button>
                               <button class="btn btn-sm btn-outline-danger" 
                                   data-bs-toggle="modal"
                                   data-bs-target="#confirmDeleteModal"
                                   data-url="${data}"
                               ><i class="fa-light fa-trash"></i></button>
                           </div>
                       `;
                    }
                    return acctions;
                }
            },
        ],
        order: {
            name: 'nombre',
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
        dom: "<'row mb-2'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row mt-2'<'col-sm-12 d-flex justify-content-between'<'mr-3'i><'ml-auto'p>>",
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

// Clone Invitation
let cloneUrl = null;
let cloneBtn = null;

const cloneModal = document.getElementById('confirmcloneModal');

cloneModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    cloneUrl = button.getAttribute('data-url');
    cloneBtn = button;

});

function cloneInvitation() {
    const tr = cloneBtn.closest('tr');
    const url = cloneUrl;
    const row = $('#datatable').DataTable().row(tr);
    const pathName = document.getElementById('path_name_input').value;

    fetch(url + '/clone', {
        method: 'POST',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
        },
        body: JSON.stringify({path_name: pathName})
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });        
    })
    .then(({statusCode, data}) => {
        if(statusCode === 201){
            const parentRow = cloneBtn.closest('tr');
            const newRow = datatable.row.add(data.data).draw().node();
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
    .catch(err => {
        console.error(err);
    });
}

function checkPathName(e){
    let pathName = e.value;
    let cloneBtnModal = document.getElementById('confirmCloneBtn');

    if(pathName === ''){
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
                cloneBtnModal.removeAttribute('disabled');
            }else{
                e.classList.remove("is-valid");
                e.classList.add("is-invalid");
                cloneBtnModal.setAttribute('disabled', 'disabled');
            }
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function newInvitation(e) {
    e.preventDefault();

    const closeModal = document.getElementById('close-modal-btn');
    const form = document.getElementById('new-invitation-form');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    fetch('api/invitations', {
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
            window.location = 'invitations/' + id + '/edit';
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function newInvitationByEvent(e, form) {
    e.preventDefault();

    const closeModal = document.getElementById('close-new-invitation-by-event-modal-btn');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    fetch(form.action, {
        method: form.method,
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
            window.location = 'invitations/' + id + '/edit';
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}


// Delete invitation
let deleteUrl = null;

const deleteModal = document.getElementById('confirmDeleteModal');

deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    deleteUrl = button.getAttribute('data-url');

});

function deleteInvitation() {

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


function changeInvitationStatus(checkbox, url){
    const active = checkbox.checked ? true : false;

    fetch(url + '/change-status', {
        method: 'PATCH',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
                'Content-Type': 'application/json'
        },
        body: JSON.stringify({active: active})
    })
    .then(async response => {
        const statusCode = response.status;
        const text = await response.text();
        const data = text ? JSON.parse(text) : {};
        return ({ statusCode, data });
    })
    .then(async ({statusCode, data}) => {
        if(statusCode !== 201){
            checkbox.checked = !checkbox.checked;
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}