$(document).ready(function(){
    renderDatatable();
});

let datatable;

function renderDatatable(){
    datatable = $('#datatable').DataTable({
        ajax: {
            url: '/api/users',
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
            { data: 'name' },
            { data: 'email' },
            { data: 'role' }, 
            { data: 'active'},
            { 
                data: 'url_item',
                render: function(data) {
                    return `<button class="btn btn-sm btn-outline-primary" onclick="editarUsuario(${data})">Editar</button>
                            <button class="btn btn-sm btn-outline-danger" onclick="eliminarUsuario(${data})">Eliminar</button>`;
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


function newUser(e) {
    e.preventDefault();

    const closeModal = document.getElementById('close-modal-btn');
    const form = document.getElementById('new-product-form');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    console.table(JSON.stringify(data));
    
    fetch('api/users', {
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
    .then(({statusCode, data}) => {
        if(statusCode === 201){
            datatable.ajax.reload();
            closeModal.click();
        } else {
            console.error(data);
        }
    })
    .catch(error => console.error('Error:', error));
}