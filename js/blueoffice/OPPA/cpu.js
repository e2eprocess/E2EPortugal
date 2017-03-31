$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'cpu',
            marginRight: 20,
            zoomType: 'xy',
            height: 250,
          },
          title: {
            text: 'Consumo CPU %',
            x: -20 //center
          },
          subtitle: {
            text: [],
            x: -20
          },
          credits: {
            enabled: false
          },
          xAxis: {
            //type: 'datetime',
            tickPixelInterval: 150,
            crosshair: true,
            categories: []
          },
          yAxis: {
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'CPU %'
            },
            max: 100,
            lineWidth: 1
          },
          tooltip: {
              shared: true
          },
          legend: {
              layout: 'horizontal',
              align: 'center',
              verticalAlign: 'bottom',
              borderWidth: 1,
              itemStyle:{
                  fontSize: "10px"
                }

          },
          plotOptions: {
              line: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 1,
                  states : {
                    hover: {enabled: true}
                  }
                },
                stacking: 'normal'
              },
              column: {
                stacking: 'normal'
              }
          },

          /*series: []*/
          series: [{
            name: 'lppwa001 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppwa002 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppwa001 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppwa002 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2EPortugal/php/blueoffice/OPPA/cpu.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.subtitle.text = json[5]['text'];

        chart = new Highcharts.Chart(options);
      });
  });
