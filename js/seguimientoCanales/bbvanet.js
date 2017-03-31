$(document).ready(function() {
  var options = {
          chart: {
            renderTo: 'bbvanet',
            marginRight: 100,
            zoomType: 'xy'
          },
          title: {
            text: 'BBVANET',
            x: -20 //center
          },
          credits: {
            enabled: false
          },
          xAxis: {
            type: 'datetime'
          },
          yAxis: [{ //tiempo de respuesta
            labels: {
              format: '{value} ms.'
            },
            title: {
              text: 'Tiempo de respuesta (ms.)'
            },
            min: 0
          },{ //Peticiones
            title: {
              text: 'Peticiones'
            },
            opposite: true
          }],
          tooltip: {
              shared: true,
              crosshair: true
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
              },
              spline: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 1,
                  states : {
                    hover: {enabled: true}
                  }
                }
              },
              series: {
                marker: {
                  enabled: false,
                  symbol: 'circle',
                  radius: 2
                },
                fillOpacity: 0.5
              },
              flags: {
                tooltip: {
                  xDateFormat: '%B %e, %Y'
                }
              },
              pie: {
                 showInLegend: true,
                 allowPointSelect: false,  // disable selected
              }
          },
          /*series: []*/
          series: [{
            name: 'Tiempo Respuesta ',
            id: 'Tiempo',
            color: 'rgba(41,198,248,1.0)',
            type: 'line',
            index: 1,
            legendIndex: 0,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            name: 'Peticiones ',
            color: 'rgba(65,105,225,1.0)',
            type: 'column',
            id: 'Peticiones',
            yAxis: 1,
            index: 0,
            legendIndex: 1,
            data:[],
            tooltip: {
                     xDateFormat: '%e %B %Y %H:%MM'
            },
            turboThreshold: 0
          },{
            color: 'rgba(255,0,0,1.0)',
            type: 'line',
            yAxis: 1,
            legendIndex: 2,
            data:[]
          }]
      }

      /*if (Highcharts.seriesTypes.flags) {
          options.series.push({
              type: 'flags',
              //name: 'Events',
              color: '#333333',
              fillColor: 'rgba(255,255,255,0.8)',
              data: [
                  { x: 1486026000000, text: '<b>Pico historico tráfico real</b> <br/>Se ha alcanzado el máximo de peticiones (561.829 por hora)', title: 'Pico historico tráfico real' },
                  { x: 1487422800000, text: '<b>Pruebas semestrales</b> <br/>Pruebas de rendimiento semestrales sobre el CASH', title: 'Pruebas semestrales' },
                  { x: 1488841200000, text: '<b>Pruebas LDAP</b> <br/>Pruebas incidencia operativas LDAP', title: 'Pruebas LDAP' },
                  { x: 1488708000000, text: '<b>Pruebas Post implantación</b> <br/>Pruebas Cash post implantación', title: 'Pruebas Post implantación' }
                ],
              onSeries: 'Peticiones',
              tooltip: {
                       xDateFormat: '%e %B %Y %H:%MM'
              },
              showInLegend: false
          },
          {
              type: 'flags',
              //name: 'Events',
              color: '#333333',
              fillColor: 'rgba(255,255,255,0.8)',
              data: [
                  { x: 1487592000000, text: '<b>Incidencia operativas LDAP</b> <br/>Incremento tiempo de respuesta operativas LDAP', title: 'Incidencia operativas LDAP' },
                  { x: 1488787200000, text: '<b>Incidencia operativas LDAP</b> <br/>Incremento tiempo de respuesta operativas LDAP', title: 'Incidencia operativas LDAP' }
                ],
              onSeries: 'Tiempo',
              tooltip: {
                       xDateFormat: '%e %B %Y %H:%MM'
              },
              showInLegend: false
          });
      }*/

      $.getJSON("/E2EPortugal/php/seguimientoCanales/bbvanet.php", function(json) {
                  options.series[1].data = json[0];
                  options.series[0].data = json[1];
                  options.series[2].data = json[2];
                  options.series[2].name = json[3];
              //$('#particulares').highcharts(options);
              chart = new Highcharts.Chart(options);
      });
  });
