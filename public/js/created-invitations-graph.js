let createdInvitationsGraph = null;

document.addEventListener('DOMContentLoaded', function () {
    renderCreatedInvitationsGraph();
});

window.addEventListener('afterprint', () => {
  createdInvitationsGraph.resize();
});

function renderCreatedInvitationsGraph() {
  const yearSelect = document.getElementById('year-select').value;
  const yearDiffSelect = document.getElementById('year-diff-select').value;

  let params = '?year=' + yearSelect;
  if (yearDiffSelect !== '') {
      params += '&yearDiff=' + yearDiffSelect;
  }

  if (createdInvitationsGraph !== null) {
      createdInvitationsGraph.destroy();
  }

  const ctx = document.getElementById('created-invitations-graph').getContext('2d');

  const LEFTCOLORS = {
      gold:    ['rgba(0, 0, 90, 0.8)', 'rgba(0, 0, 90, 0.4)'],
      platino: ['rgba(0, 0, 170, 0.8)', 'rgba(0, 0, 170, 0.4)'],
      clasico: ['rgba(0, 0, 235, 0.8)', 'rgba(0, 0, 235, 0.4)'],
  };

  const COLORS = {
      gold:    ['rgba(90, 47, 0, 0.8)', 'rgba(90, 47, 0, 0.8)'],
      platino: ['rgba(170, 71, 0, 0.8)', 'rgba(170, 71, 0, 0.8)'],
      clasico: ['rgba(235, 114, 0, 0.8)', 'rgba(235, 114, 0, 0.8)'],
  };

  const catLabel = {
      gold: 'Gold',
      platino: 'Platino',
      clasico: 'Clásico',
  };

  const monthMap = {
      '01': 'Ene', '02': 'Feb', '03': 'Mar', '04': 'Abr',
      '05': 'May', '06': 'Jun', '07': 'Jul', '08': 'Ago',
      '09': 'Sep', '10': 'Oct', '11': 'Nov', '12': 'Dic'
  };

  fetch(window.createdInvitationsGraph + params, {
      credentials: 'include',
      headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json',
          'Content-Type': 'application/json'
      },
  })
  .then(res => res.json())
  .then(data => {
      const monthLabels = ['01','02','03','04','05','06','07','08','09','10','11','12'];
      const allMonths = monthLabels.map(m => `${yearSelect}-${m}`);
      const monthNames = monthLabels.map(m => monthMap[m]);

      const allYears = Array.from(new Set(data.map(d => d.year))).sort((a, b) => a - b);
      const categories = ['gold', 'platino', 'clasico'];

      const datasets = [];

      for (let i = 0; i < allYears.length; i++) {
          const year = allYears[i];
          for (let cat of categories) {
              datasets.push({
                  label: `${catLabel[cat]} (${year})`,
                  data: monthLabels.map(m => {
                      const monthStr = `${year}-${m}`;
                      const match = data.find(d => d.month === monthStr && d.plan === catLabel[cat] && d.year === year);
                      return match ? match.total : 0;
                  }),
                  backgroundColor: (i === 0 ? LEFTCOLORS[cat][0] : COLORS[cat][0]),
                  stack: year.toString(),
              });
          }
      }

      createdInvitationsGraph = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: monthNames,
              datasets: datasets
          },
          options: {
              maintainAspectRatio: false,
              scales: {
                  x: { stacked: true },
                  y: {
                      stacked: true,
                      beginAtZero: true,
                      ticks: {
                          precision: 0,
                          callback: value => Number.isInteger(value) ? value : null
                      }
                  }
              },
              plugins: {
                  legend: {
                      position: 'bottom'
                  }
              }
          }
      });
  });
}