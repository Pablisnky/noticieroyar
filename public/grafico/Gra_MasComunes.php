<!-- Se inserta la libreria highcharts utilizada para realizar el grafico -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- Contenedor donde entra el grafico -->
<div style="width: 100%; height:340px; " id="container"></div>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(){
    Highcharts.chart('container',{
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Servicios más denunciados en el Municipio San Felipe edo. Yaracuy',
            style:{
                   color: 'rgba(6, 6, 29, 0.9)',
                   fontSize: '16px'
               } 
        },
        subtitle: {
          text: '( ultimos 30 días )',
          style:{
                color: 'rgba(6, 6, 29, 0.9)',
                fontSize: '13px'
            } 
        },
        xAxis: {
            categories: ['Agua potable', 'Hospital Central','Escuela Republica Nicaragua','Aguas servidas','Teatro Andres Bello']
        },
        yAxis: {
            title: {
                text: 'Denuncias'
            }
        },
        series: [ {showInLegend: false,
            name: '',
            data: [5, 7, 12, 26, 8]
        }],
    });
});
</script>