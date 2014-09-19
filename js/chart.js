$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Stacked bar chart'
        },
        xAxis: {
            categories: ['Lucas Anjos', 'Sylvio Migliorucci', 'Marcelo Paris']
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Quantidade de horas de monitoria por semana.'
            }
        },
        legend: {
            reversed: true
        },
        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'Meta',
            data: [8, 8, 8]
        }, {
            name: 'Faltantes',
            data: [5, 3, 4]
        }, {
            name: 'Feita',
            data: [3, 5, 4]
        }]
    });
});