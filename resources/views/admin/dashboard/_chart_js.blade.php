<script>
  $(document).ready(() => {
    function timeChart(countStaring, countLeaving) {
      var month = new Array;
      for (let i = 1; i <= 12; i++) month.push('{{ t("dashboard.month") }}' + ' ' + i);
      var timeChartData = {
        labels: month,
        datasets: [{
            label: '{{ t("dashboard.in") }}',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: countStaring
          },
          {
            label: '{{ t("dashboard.out") }}',
            backgroundColor: 'rgba(210, 214, 222, 1)',
            borderColor: 'rgba(210, 214, 222, 1)',
            pointRadius: false,
            pointColor: 'rgba(210, 214, 222, 1)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: countLeaving
          },
        ]
      }

      var timeChartCanvas = $('#js-time-chart').get(0).getContext('2d')
      var timeChartData = jQuery.extend(true, {}, timeChartData)
      var temp0 = timeChartData.datasets[0]
      var temp1 = timeChartData.datasets[1]
      timeChartData.datasets[0] = temp1
      timeChartData.datasets[1] = temp0

      var timeChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false
      }

      var timeChart = new Chart(timeChartCanvas, {
        type: 'bar',
        data: timeChartData,
        options: timeChartOptions
      })
    }
    
    // onChange year
    $('.year-control').on('change', e => {
      let url = $(e.target).data('url');
      let year = parseInt($(e.target).val());

      $.ajax({
        type: "GET",
        url: url,
        data: {
          year
        },
        dataType: "json",
        success: response => {
          let countStaring = JSON.parse(response.countStaring);
          let countLeaving = JSON.parse(response.countLeaving);
          dashboardReload(countStaring, countLeaving);
        }
      });
    })

    function dashboardReload(countStaring, countLeaving) {
      let url = $('#dashboard-reload').data('url');
      $.ajax({
        type: "GET",
        url: url,
        dataType: "html",
        success: response => {
          $('#dashboard-reload').html(response);
          timeChart(countStaring, countLeaving);
        }
      });
    }

    // load chart
    let url = $('#dashboard-reload').data('url');
    let countStaring = {{ $countStaring }};
    let countLeaving = {{ $countLeaving }};
    if (url.indexOf('dashboard/reload') > -1) {
      dashboardReload(countStaring, countLeaving);
    }

  });
</script>
