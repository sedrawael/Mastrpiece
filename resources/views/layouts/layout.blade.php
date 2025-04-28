<!DOCTYPE html>
<html lang="en">

@include('layouts.haed')


<body class="g-sidenav-show bg-gray-100">

  @include('layouts.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    @include('layouts.navpar')

    <div class="container-fluid py-2">
      @yield('content')
    </div>

    @include('layouts.footar')

  </main>

  <!-- Core JS Files -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>

  <!-- Chart Scripts -->
  <script>
    const monthsFull = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    const barChart = new Chart(document.getElementById("chart-bars").getContext("2d"), {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Views",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#43A047",
          data: [50, 45, 22, 28, 50, 60, 76],
          barThickness: 'flex'
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: '#e5e5e5'
            },
            ticks: {
              beginAtZero: true,
              padding: 10,
              color: "#737373",
              font: { size: 14, lineHeight: 2 }
            },
          },
          x: {
            grid: { display: false },
            ticks: {
              display: true,
              color: '#737373',
              padding: 10,
              font: { size: 14, lineHeight: 2 }
            }
          }
        },
      },
    });

    const lineChart = new Chart(document.getElementById("chart-line").getContext("2d"), {
      type: "line",
      data: {
        labels: ["J", "F", "M", "A", "M", "J", "J", "A", "S", "O", "N", "D"],
        datasets: [{
          label: "Sales",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [120, 230, 130, 440, 250, 360, 270, 180, 90, 300, 310, 220],
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false },
          tooltip: {
            callbacks: {
              title: context => monthsFull[context[0].dataIndex]
            }
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              color: '#737373',
              padding: 10,
              font: { size: 12, lineHeight: 2 }
            }
          },
          x: {
            grid: { display: false },
            ticks: {
              color: '#737373',
              padding: 10,
              font: { size: 12, lineHeight: 2 }
            }
          }
        },
      },
    });

    const taskChart = new Chart(document.getElementById("chart-line-tasks").getContext("2d"), {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Tasks",
          tension: 0,
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: "#43A047",
          borderColor: "#43A047",
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: { display: false }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              borderDash: [4, 4],
              color: '#e5e5e5'
            },
            ticks: {
              color: '#737373',
              padding: 10,
              font: { size: 14, lineHeight: 2 }
            }
          },
          x: {
            grid: { display: false },
            ticks: {
              color: '#737373',
              padding: 10,
              font: { size: 14, lineHeight: 2 }
            }
          }
        },
      },
    });

    // Scrollbar init for Windows
    if (navigator.platform.indexOf('Win') > -1 && document.querySelector('#sidenav-scrollbar')) {
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), { damping: '0.5' });
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>

  <!-- Material Dashboard Control Center -->
  <script src="../assets/js/material-dashboard.min.js?v=3.2.0"></script>
</body>

</html>
