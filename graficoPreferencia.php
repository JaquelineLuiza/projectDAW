<?php
$listaPref = array();
$v3 = array();
$i = 0;
$l = 0;
 
//Select para pegar a quantidade de pessoas de cada sexo
$sql = mysqli_query($con, 'SELECT count(tb01.id_pref) as qtd, tb02.nome_pref 
FROM `preferencias_usuario`tb01 
INNER JOIN preferencias tb02 on tb02.id_pref=tb01.id_pref
group by tb01.id_pref, tb02.nome_pref');
//Select para pegar o total de pessoas cadastradas em usuarios
$resul = mysqli_query($con, 'SELECT *, COUNT(*) as tot from preferencias_usuario');

//While guardar o total de pessoas do resultado do select resul
while ( $result_consulta = mysqli_fetch_array($resul)){
    $tot= $result_consulta['tot'];
}
//While guardar a qt de pessoas por sexo do resultado do select sql
while ( $result_consulta = mysqli_fetch_array($sql)){
    $nome = $result_consulta['nome_pref'];
    $qtd= $result_consulta['qtd'];
    $per = ($qtd/$tot)*100;
    $number = number_format($per, 2,'.', ' ');
    $listaPref[$i] = $nome;
    $v3[$i] = $number;
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
            AmCharts.makeChart("porcentagemPreferencias",
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
                            "text": "Porcentagem dos itens preferidos "
                        }
                    ],
                    "dataProvider": [
 
//Aqui as colunas devem ser mostradas como a linha de baixo.
//                  {"category": "TO","column-1": 4}
 
                    <?php
                    $l = $i;
                    for($i=0;$i<$l;$i++){?>
                    {"category":"<?php echo $listaPref[$i]?>","column-1":<?php echo $v3[$i]?>},
                    <?php
                    }?>
                    ]
 
                }
            );
    </script>