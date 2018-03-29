function initChart(cfg) {
    var ctx = document.getElementById("myChart").getContext('2d');
    Chart.defaults.global.defaultFontColor = cfg.fontColor ? cfg.fontColor : 'black';
    Chart.defaults.global.defaultFontFamily = 'Ruda';
    window.chartColors = [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(101, 75, 12)'
    ];
    var color = window.chartColors[getRandom(0,6)]
    var config = {
        type: 'line',
        data: {
            labels: cfg.labels,
            datasets: [{
                label: cfg.title,
                backgroundColor: color,
                borderColor: color,
                data: cfg.data,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: cfg.ratio,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            },
            scales: {
            xAxes: [{
                display: true,
                scaleLabel: {
                display: true,
                labelString: cfg.xAxesLabel
                }
            }],
            yAxes: [{
                display: true,
                scaleLabel: {
                display: true,
                labelString: cfg.yAxesLabel
                }
            }]
            }
        }
    };
    window.myChart = new Chart(ctx, config);
}