$(document).ready(() => {

  $('.month-control').on('change', e => {
    let url = $(e.target).data('url');
    let month = $(e.target).val();
    let year = $('.year-control').val()
    dashboardAjax(url, month, year)
  })

  $('.year-control').on('change', e => {
    let url = $(e.target).data('url');
    let year = $(e.target).val();
    let month = $('.month-control').val()
    dashboardAjax(url, month, year)
  })

  let url = $('.year-control').data('url');
  let year = new Date().getFullYear();
  dashboardAjax(url, 0, year);

  // request to DashboardController@dashboard ajax
  function dashboardAjax(url, month, year) {
    $.ajax({
      type: "GET",
      url: url,
      data: { month, year },
      dataType: "json",
      success: function (response) {
        $.each(response.countContracts, (key, value) => {
          $('#contract_type_' + key).html(value);
        })
        $.each(response.countDecisions, (key, value) => {
          $('#decision_type_' + key).html(value);
        })

        timeChart(response.countStaring, response.countLeaving);
        departmentChart(response.departments, response.countWorkerStaringByDepartments, response.countWorkerLeavingByDepartments);
      }
    });

    $('#js-time-chart').remove();
    $('#time-chart').append('<canvas id="js-time-chart" style="height:230px; min-height:230px"></canvas>');
    $('#js-department-chart').remove();
    $('#department-chart').append('<canvas id="js-department-chart" style="height:230px; min-height:230px"></canvas>');
  }

  function timeChart(countStaring, countLeaving) {
    var month = new Array;
    for (let i = 1; i <= 12; i++) month.push('Tháng' + ' ' + i);
    var timeChartData = {
      labels: month,
      datasets: [{
        label: 'Tiếp nhận',
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
        label: 'Thôi việc',
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

  function departmentChart(departments, countStaring, countLeaving) {
    var departmentChartData = {
      labels: departments,
      datasets: [{
        label: 'Tiếp nhận',
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
        label: 'Thôi việc',
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

    var departmentChartCanvas = $('#js-department-chart').get(0).getContext('2d')
    var departmentChartData = jQuery.extend(true, {}, departmentChartData)
    var temp0 = departmentChartData.datasets[0]
    var temp1 = departmentChartData.datasets[1]
    departmentChartData.datasets[0] = temp1
    departmentChartData.datasets[1] = temp0

    var departmentChartOptions = {
      responsive: true,
      maintainAspectRatio: false,
      datasetFill: false
    }

    var departmentChart = new Chart(departmentChartCanvas, {
      type: 'bar',
      data: departmentChartData,
      options: departmentChartOptions
    });

  }



})
