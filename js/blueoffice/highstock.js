$(function () {
    $.getJSON('/E2EPortugal/php/blueoffice/highstock.php', function (data) {

        // split the data set into ohlc and volume
        var tiempo_respuesta = [],
            peticiones = [],
            lppwa001 = [],
            lppwa002 = [],
            dataLength = data.length,

            i = 0;

        for (i; i < dataLength; i += 1) {
            tiempo_respuesta.push([
                data[i][0], // the date
                data[i][1]  // tiempo de respuesta
            ]);
            peticiones.push([
                data[i][0], // the date
                data[i][2] // peticiones
            ]);
            lppwa001.push([
                data[i][0], // the date
                data[i][3] // lppwa001
            ]);
            lppwa002.push([
                data[i][0], // the date
                data[i][4] // lppwa002
            ]);

        }


        // create the chart
        Highcharts.stockChart('container', {
            chart: {
                marginRight: 60,
                marginLeft: 70,
                zoomType: 'xy'
            },
            legend: {
                enabled: true
            },
            credits: {
                enabled: false
            },
            rangeSelector: {
                buttons: [{
                    type: 'day',
                    count: 1,
                    text: 'D'
                },{
                    type: 'month',
                    count: 1,
                    text: 'M'
                },{
                    type: 'Ytd',
                    count: 1,
                    text: 'Y'
                },{
                    type: 'all',
                    count: 1,
                    text: 'All'
                }],
                selected: 1,
                inputEnabled: false
            },
            yAxis: [{
                labels: {
                    align: 'left',
                    x: 3
                },
                title: {
                    text: 'Tiempo respuesta (ms.)',
                },
                height: '25%',
                opposite: false
            },{
                labels: {
                    align: 'left',
                    x: 3
                },
                title: {
                    text: 'Peticiones',
                },
                top: '30%',
                height: '25%',
                offset: 0,
                opposite: false,
                plotLines:[{
                    value: 300,
                    width: 1,
                    color: 'red',
                    dashStyle: 'dash'
                }]
            },{
                labels: {
                    align: 'left',
                    x: -3
                },
                title: {
                    text: 'CPU %',
                },
                height: '25%',
                top: '65%',
                opposite: false,
                offset: 0,
                max: 100
            }],

                plotOptions: {
                    series: {
                        showInNavigator: true
                    }
                },

            tooltip: {
                split: true,
                valueDecimals: 2
            },

            series: [{
                type: 'line',
                name: 'tiempo de respuesta',
                data: tiempo_respuesta
            },{
                type: 'column',
                name: 'Peticiones',
                data: peticiones,
                yAxis: 1,
                tooltip: {
                  valueDecimals: 0
                }
            },{
                type: 'area',
                color: 'rgba(4,38,253,1)',
                name: 'lppwa001',
                data: lppwa001,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            },{
                type: 'area',
                color: 'rgba(4,129,255,1)',
                name: 'lppwa002',
                data: lppwa002,
                yAxis: 2,
                dataGrouping: {
                  approximation: 'high'
                }
            }]
        });
    });
});
