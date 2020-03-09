 <?php
$listaMedia = array();
$v2 = array();
$i = 0;
$j = 0;
//Select para pegar a quantidade de pessoas de cada sexo
$sql = mysqli_query($con, 'SELECT sum(idade) as totidade, count(*) as totpessoas FROM usuarios');

//While guardar a qt de pessoas por sexo do resultado do select sql
while ( $result_consulta = mysqli_fetch_array($sql)){
    $qtdIdade= $result_consulta['totidade'];
    $qtdPessoas= $result_consulta['totpessoas'];
    $media = ($qtdIdade/$qtdPessoas);
    $number = number_format($media, 2,'.', ' ');
    $listaMedia[$i] = $number;
    $v2[$i] = $number;
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
                AmCharts.makeChart("mediaIdade",
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
                                "title": "Media de Idade"
                            }
                        ],
                        "allLabels": [],
                        "balloon": {},
                        "titles": [
                            {
                                "id": "Title-1",
                                "size": 15,
                                "text": "Media Idade"
                            }
                        ],
                        "dataProvider": [
     
    //Aqui as colunas devem ser mostradas como a linha de baixo.
    //                  {"category": "TO","column-1": 4}
     
                        <?php
                        $j = $i;
                        for($i=0;$i<$j;$i++){?>
                        {"category":"<?php echo $listaMedia[$i]?>","column-1":<?php echo $v2[$i]?>},
                        <?php
                        }?>
                        ]
     
                    }
                );
        </script>