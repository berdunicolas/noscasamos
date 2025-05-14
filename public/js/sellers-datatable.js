$(document).ready(function(){
    renderDatatable();
});

let datatable;

function renderDatatable(){
    datatable = $('#datatable').DataTable({
        ajax: {
            url: '/api/sellers',
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
            { data: 'site_link' },
            { 
                data: 'url_item',
                render: function(data) {
                    return `<a href="${data.replace('/api', '') + '/edit'}" class="btn btn-sm btn-outline-primary"><i class="fa-light fa-edit"></i></a>
                            <button class="btn btn-sm btn-outline-danger" onclick="deleteSeller('${data}')"><i class="fa-light fa-trash"></i></button>`;
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
                first: '<i class="fa-light fa-chevrons-left"></i>',
                last: '<i class="fa-light fa-chevrons-right"></i>',
                next: '<i class="fa-light fa-chevron-right"></i>',
                previous: '<i class="fa-light fa-chevron-left"></i>'
            }
        }
    });
}


function newSeller(e) {
    e.preventDefault();

    const closeModal = document.getElementById('close-modal-btn');
    const form = document.getElementById('new-seller-form');
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    console.table(JSON.stringify(data));
    
    fetch('api/sellers', {
        method: 'POST',
        credentials: 'include',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData
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

function deleteSeller(url) {
    
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