// Chart.js Student Data (dummy example - NOTE: Recommend replacing with PHP data)
document.addEventListener('DOMContentLoaded', function() {
  const ctx = document.getElementById('studentChart');
  if (ctx) {
    // Placeholder data (ideally fetched via AJAX or embedded PHP variables)
    const chartLabels = ['IT', 'Business', 'Design', 'Engineering'];
    const chartData = [45, 30, 25, 15];

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: chartLabels,
        datasets: [{
          label: 'Students per Course',
          data: chartData,
          backgroundColor: [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false, // Allows flexible sizing
        scales: {
            y: { beginAtZero: true }
        },
        plugins: {
          legend: { 
            display: true,
            position: 'top',
          },
          title: {
            display: false
          }
        }
      }
    });
  }

  // jQuery: table filter
  // It's acceptable to keep jQuery for this for simplicity if it's already linked.
  $('#searchInput').on('keyup', function() {
    const value = $(this).val().toLowerCase();
    $('table tbody tr').filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });
});

// Delete confirmation modal (Vanilla JS approach)
function confirmDelete(url) {
  if (window.confirm('Are you sure you want to permanently delete this record? This action cannot be undone.')) {
    window.location.href = url;
  }
}