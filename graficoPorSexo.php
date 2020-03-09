<?php
$lista = array();
$vl = array();
$i = 0;
$k = 0;
 
//Select para pegar a quantidade de pessoas de cada sexo
$sql = mysqli_query($con, 'SELECT sexo, COUNT(*) as qtd FROM usuarios GROUP BY sexo');
//Select para pegar o total de pessoas cadastradas em usuarios
$resul = mysqli_query($con, 'SELECT *, COUNT(*) as tot from usuarios');

//While guardar o total de pessoas do resultado do select resul
while ( $result_consulta = mysqli_fetch_array($resul)){
    $tot= $result_consulta['tot'];
}
//While guardar a qt de pessoas por sexo do resultado do select sql
while ( $result_consulta = mysqli_fetch_array($sql)){
    $sexo = $result_consulta['sexo'];
    $qtd= $result_consulta['qtd'];
    $per = ($qtd/$tot)*100;
    $number = number_format($per, 2,'.', ' ');
    $lista[$i] = $sexo;
    $vl[$i] = $number;
    $i = $i+1;
}
?>
 <!--Carrgea a API do google-->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
    <!-- amCharts javascript sources -->
    <script src="http://www.amcharts.com/lib/3/amcharts.js" type="text/javascript"></script>
            <script src="http://www.amcharts.com/lib/3/serial.js" type="text/javascript"></script>
            <script src="http://www.amcharts.com/lib/3/themes/light.js" type="text/javascript"></script>
 <!-- amCharts javascript code -->
 <script type="text/javascript">
            AmCharts.makeChart("porcentagemSEXO",
                {
                    "type": "serial",
                    "categoryField": "category",
                    "startDuration": 1,
                    "classNamePrefix": "",
                    "theme": "light",
                    "categoryAxis": {
                        "gridPosition": "start",
                        "parseDates": false
                    },
                    "chartCursor": false,
                    "chartScrollbar": false,
                    "trendLines": false,
                    "graphs": [
                        {
                            "fillAlphas": 1,
                            "id": "",
                            "title": "graph 1",
                            "type": "column",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "Total"
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Porcentagem de clientes de cada sexo"
                        }
                    ],
                    "dataProvider": [
 
//Aqui as colunas devem ser mostradas como a linha de baixo.
//                  {"category": "TO","column-1": 4}
 
                    <?php
                    $k = $i;
                    for($i=0;$i<$k;$i++){?>
                    {"category":"<?php echo $lista[$i]?>","column-1":<?php echo $vl[$i]?>},
                    <?php
                    }?>
                    ]
 
                }
            );
    </script>