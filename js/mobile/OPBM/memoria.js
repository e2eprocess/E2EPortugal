$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'memoriaMovil',
            marginRight: 20,
            zoomType: 'xy'
          },
          title: {
            text: 'Memoria %',
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
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} %'
            },
            title: {
              text: 'Memoria %'
            },
            max:100,
            lineWidth: 1
          }],
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
                }
              }
          },
          /*series: []*/
          series: [{
            name: 'lppwa003_opbm_s01_10 (F)',
            color: 'rgba(4,38,253,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppwa004_opbm_s01_20 (F)',
            color: 'rgba(4,129,255,1)',
            type: 'column',
            data:[]
          },{
            name: 'lppwa003_opbm_s01_10 (T)',
            color: 'rgba(4,38,253,1)',
            type: 'line',
            data:[]
          },{
            name: 'lppwa004_opbm_s01_20 (T)',
            color: 'rgba(4,129,255,1)',
            type: 'line',
            data:[]
          }]
      }

      $.getJSON("/E2EPortugal/php/mobile/OPBM/memoria.php", function(json) {
        options.xAxis.categories = json[0]['data'];
        options.series[0].data = json[1]['data'];
        options.series[1].data = json[2]['data'];
        options.series[2].data = json[3]['data'];
        options.series[3].data = json[4]['data'];
        options.subtitle.text = json[5]['text'];
        chart = new Highcharts.Chart(options);
      });
  });
