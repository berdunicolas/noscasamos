let countryInvitationsChart = null;

document.addEventListener('DOMContentLoaded', function () {
    renderCountryInvitationsGraph();
});

window.addEventListener('afterprint', () => {
  countryInvitationsChart.resize();
});

function renderCountryInvitationsGraph() {
    const ctx = document.getElementById('country-invitations-graph').getContext('2d');
    let countrySelect = document.getElementById('country-select').value;
    let fromDate = document.getElementById('from-date-invitations-country').value;
    let toDate = document.getElementById('to-date-invitations-country').value;
    let params = '?country=' + countrySelect;

    if(fromDate != ''){
        params += '&fromDate=' + fromDate;
    }

    if(toDate != ''){
        params += '&toDate=' + toDate;
    }

    if (countryInvitationsChart !== null) {
        countryInvitationsChart.destroy();
    }

    fetch(window.countryInvitationsGraph + params)
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.label);
        const values = data.map(item => item.total);

        countryInvitationsChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Total de invitaciones',
                    data: values,
                    backgroundColor: 'rgba(0, 0, 170,0.80)',
                    //borderColor: 'rgb(0, 0, 90)',
                    //borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    })
    .catch(error => {
        console.error('Error al cargar los datos del gráfico:', error);
    });
}