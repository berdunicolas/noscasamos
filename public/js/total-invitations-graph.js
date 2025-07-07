let totalInvitationsChart = null;

document.addEventListener('DOMContentLoaded', function () {
    renderTotalInvitationsGraph();
});

window.addEventListener('afterprint', () => {
  totalInvitationsChart.resize();
});

function renderTotalInvitationsGraph() {
    const bySelect = document.getElementById('by-select').value;
    const fromDate = document.getElementById('from-date-invitations-total').value;
    const toDate = document.getElementById('to-date-invitations-total').value;
    let params = '?by=' + bySelect;

    if(fromDate != ''){
        params += '&fromDate=' + fromDate;
    }

    if(toDate != ''){
        params += '&toDate=' + toDate;
    }

    const ctx = document.getElementById('total-invitations-graph').getContext('2d');

    if (totalInvitationsChart !== null) {
        totalInvitationsChart.destroy();
    }

    fetch(window.totalInvitationsGraph + params)
    .then(response => response.json())
    .then(data => {
        const labels = data.map(item => item.label);
        const values = data.map(item => item.total);

        totalInvitationsChart = new Chart(ctx, {
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