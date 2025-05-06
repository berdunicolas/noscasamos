<x-admin.layout navBarSelected="dashboard">
    <button class="btn btn-dark" onclick="renderModule()">Renderizar</button>

    <div id="module-root"></div>

    <script>
        function renderModule () {
            fetch('api/modules', {
                method: 'GET',/*
                credentials: 'include',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                },*/
            })
            .then(async response => {
                const statusCode = response.status;
                const text = await response.text();
                const data = text ? JSON.parse(text) : {};
                return ({ statusCode, data });
            })
            .then(async ({statusCode, data}) => {
                if(statusCode === 200){
                    let newModule = document.createElement('div');

                    newModule.innerHTML = data;

                    document.getElementById('module-root').appendChild(newModule);
                } else {
                    console.error(data);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-admin.layout>