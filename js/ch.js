

console.log(js_array);

var ctx = document.getElementById('myChart03').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-20', '30-39', '40-49', '50-59', '60-'],
        datasets: [{
            label: '# of Votes',
            data: js_age,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

var ctx = document.getElementById('myChart01').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['male', 'female', 'others'],
        datasets: [{
            label: '# of Votes',
            data: js_gender,
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

console.log(js_array)
console.log(js_array[4].length)

let plot_data = [];
for (let i = 0; i < js_array[4].length; i++) {
    let json = { x: js_array[4][i], y: js_array[5][i] };
    plot_data.push(json)
}

var ctx = document.getElementById("myChart02");
var myScatterChart = new Chart(ctx, {
    type: 'scatter',
    data: {
        datasets: [
            {
                label: '',
                data: plot_data,
                backgroundColor: 'red',
            }]
        // {
        //     label: '2組',
        //     data: [{ x: 97, y: 92 }, { x: 63, y: 70 }, { x: 48, y: 52 }, { x: 83, y: 79 }, { x: 66, y: 74 }],
        //     backgroundColor: 'RGBA(115,255,25, 1)',
        // }]
    },
    options: {
        title: {
            display: true,
            text: '試験成績'
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: '英語'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 100,
                    stepSize: 10,
                    callback: function (value, index, values) {
                        return value + '点'
                    }
                }
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: '数学'
                },
                ticks: {
                    suggestedMax: 100,
                    suggestedMin: 0,
                    stepSize: 10,
                    callback: function (value, index, values) {
                        return value + '点'
                    }
                }
            }]
        }
    }
});
