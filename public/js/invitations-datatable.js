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
            { data: 'event' },
            { data: 'created_by' },
            { data: 'name' },
            { 
                data: 'seller_id',
                render: function(data) {
                    return '---'
                }
            },
            { data: 'plan' }, 
            { data: 'date' }, 
            { data: 'active'},
            { 
                data: 'url_item',
                render: function(data) {
                    return `<a href="${data.replace('/api', '') + '/edit'}" class="btn btn-sm btn-outline-primary">Editar</a>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteInvitation('${data}')">Eliminar</button>`;
                }
            }
        ],
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
            zeroRecords: "No se encontraron resultados",
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
            infoEmpty: "No hay registros disponibles",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            search: "Buscar:",
            paginate: {
                first: "<<",
                last: ">>",
                next: ">",
                previous: "<"
            }
        }
    });
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
            console.error(id);
            window.location = 'invitations/' + id + '/edit';
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}

function deleteInvitation(url) {
    
    fetch(url, {
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
            datatable.ajax.reload();
        } else {
            const text = await response.text();
            const data = text ? JSON.parse(text) : {};
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}