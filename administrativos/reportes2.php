<a class='btn btn-danger text-white mt-3 ml-3'href="panel.php">Menu principal</a>
<a class='btn btn-danger text-white mt-3 ml-3'href=reportes.php>Menú Reportes</a>

<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>REPORTES</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="../ico.png">
        <link rel="stylesheet" href="../estilos/estilos.css">
        <link rel="stylesheet" type="text/css" href=../estilos/lista.css>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        
        <link rel="stylesheet" type="text/css" href="../datatables/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../datatables/css/dataTables.bootstrap4.min.css">
    </head>
	<body>
<script src="reportes/code/highcharts.js"></script>
<script src="reportes/code/modules/exporting.js"></script>
<script src="reportes/code/modules/export-data.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<?php

   session_start();
   // error_reporting(0);
include('../conn.php')    ;
 
if($_SESSION['login'] != 'logueado')
{ 
  //Si no hay sesión activa, lo direccionamos al index.php (inicio de sesión) 
  header("Location: index.php"); 
  exit(); 
} 
$usuario = $_SESSION['usuario_actual'];

if($_SESSION['rango']!='admin')
{
    header("Location:logout.php");
}
               
        
if($_SESSION['login'] != 'logueado')
{ 
  //Si no hay sesión activa, lo direccionamos al dindex.php (inicio de sesión) 
  header("Location: login.php"); 
  exit(); 
}         

//echo $agencia = $_POST['agencia'];//'GARZON';
//$modalidad = $_POST['modalidad'];
//$categoria= $_POST['cat_fut'];
$seleccion = $_GET['seleccion'];
//$anio = $_GET['anio'];


//$consulta ="UPDATE consulta SET anio='$anio' "   ;
//$ej_consulta =mysqli_query($conexion, $consulta);

error_reporting(0);
//sleep(5);
include('datos_graf.php');        
//include('datos_graf2.php');   

         
if($seleccion == 'rep_age')
{
 ?> 
<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 31,
                beta: 0
            }
        },
        title: {
            text    : 'Matrícula' // por agencias del año <?php  $anio ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth:31,
                dataLabels: {
                enabled: true,
                format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'GRAFICA POR AGENCIA', sliced:true,
            data: 
                [
                ['GARZON', <?php echo $GARZON ?> ],
                ['EL PITAL', <?php echo $PITAL ?>],
                ['TARQUI', <?php echo $TARQUI ?>],
                ['GUADALUPE', <?php echo $GUADALUPE ?>],
                ['SUAZA', <?php echo $SUAZA ?>],
                ['LA ARGENTINA', <?php echo $ARGENTINA ?>],
                ['EL AGRADO', <?php echo $AGRADO ?>],                
                ['RIVERA', <?php echo $RIVERA ?>],
                ['LA PLATA', <?php echo $PLATA ?>],
                ['PITALITO', <?php echo $PITALITO ?>],
            ]
        }]
    });
</script>
        
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr >
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><h1>Matricula por agencia</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">AGENCIA</th>
                <th style="text-align:center;">NÚMERO</th>
            </tr>
        </thead>
        <tr>
            <th style="text-align:center;"> GARZÓN    </th>
            <th style="text-align:center;"><?php echo $GARZON  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> EL PITAL    </th>
            <th style="text-align:center;"><?php echo $PITAL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GUADALUPE    </th>
            <th style="text-align:center;"><?php echo $GUADALUPE  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> SUAZA    </th>
            <th style="text-align:center;"><?php echo $SUAZA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> LA PLATA    </th>
            <th style="text-align:center;"><?php echo $PLATA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> TARQUI    </th>
            <th style="text-align:center;"><?php echo $TARQUI  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> EL AGRADO    </th>
            <th style="text-align:center;"><?php echo $AGRADO  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> PITALITO    </th>
            <th style="text-align:center;"><?php echo $PITALITO ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> RIVERA    </th>
            <th style="text-align:center;"><?php echo $RIVERA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> LA ARGENTINA    </th>
            <th style="text-align:center;"><?php echo $ARGENTINA  ?>   </th>
        </tr>            
        <tr>
            <th style="text-align:center;" class='bg-danger text-white'> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL  ?>   </th>
        </tr>
    </table>    
 <?php        
}
elseif($seleccion == 'rep_mod')
{
 ?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'Matrícula' //por Modalidad del año <?php  $anio ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:31,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'GRAFICA POR MODALIDAD', sliced:true,
        data: 
            [
            ['FUTBOL', <?php echo $FUTBOL ?> ],
            ['MUSICA', <?php echo $MUSICA ?>],
            ['DANZA', <?php echo $DANZA ?>],
            ['BALONCESTO', <?php echo $BALONCESTO ?>],
        ]
    }]
});
		</script>    
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr >
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><h1>Matricula por agencia</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">MODALIDAD</th>
                <th style="text-align:center;">NÚMERO</th>
            </tr>
        </thead>
        <tr>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> MUSICA    </th>
            <th style="text-align:center;"><?php echo $MUSICA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> DANZA    </th>
            <th style="text-align:center;"><?php echo $DANZA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> BALONCESTO    </th>
            <th style="text-align:center;"><?php echo $BALONCESTO  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;" class="bg-danger text-white"> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL  ?>   </th>
        </tr>
    </table>    

 <?php        
    
}
elseif($seleccion == 'rep_fut')
{
 ?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'Modalidad Futbol - Categorías' // del año <?php  $anio ?>' 
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
                 
    series: [{
        type: 'pie',
        name: 'GRAFICA FUTBOL', sliced:true,
        data: 
            [
            ['PREJUVENIL', <?php echo $PREJUVENIL ?> ],
            ['INFANTIL', <?php echo $INFANTIL ?>],
            ['PREINFANTIL', <?php echo $PREINFANTIL ?>],
            ['GORRION', <?php echo $GORRION ?>],
            ['SAMI', <?php echo $SAMI ?>],
            ['PRESAMI', <?php echo $PRESAMI ?>],
        ]
    }]
});
		</script>    
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr >
                <th colspan="10" style="text-align:center;" class="form-title"><h1>Categorías de Fútbol</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">CATEGORÍA</th>
                <th style="text-align:center;">NÙMERO</th>
            </tr>
        </thead>
        <tr>
            <th style="text-align:center;"> PRESAMI    </th>
            <th style="text-align:center;"><?php echo $PRESAMI  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> SAMI    </th>
            <th style="text-align:center;"><?php echo $SAMI ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GORRION     </th>
            <th style="text-align:center;"><?php echo $GORRION  ?>   </th>
        </tr>            
        <tr>
            <th style="text-align:center;"> PREINFANTIL    </th>
            <th style="text-align:center;"><?php echo $PREINFANTIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> INFANTIL    </th>
            <th style="text-align:center;"><?php echo $INFANTIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> PREJUVENIL    </th>
            <th style="text-align:center;"><?php echo $PREJUVENIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;" class="bg-danger text-white"> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL_FUTBOL  ?>   </th>
        </tr>
    </table>    

        
 <?php          
}
elseif($seleccion == 'rep_fua')
{
 ?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'Modalidad Fútbol por Agencia'- // <?php  $AGENCIA ?>' 
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL_A ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
                 
    series: [{
        type: 'pie',
        name: 'GRAFICA FUTBOL', sliced:true,
        data: 
            [
            ['PREJUVENIL', <?php echo $PREJUVENIL_A ?> ],
            ['INFANTIL', <?php echo $INFANTIL_A ?>],
            ['PREINFANTIL', <?php echo $PREINFANTIL_A ?>],
            ['GORRION', <?php echo $GORRION_A ?>],
            ['SAMI', <?php echo $SAMI_A ?>],
            ['PRESAMI', <?php echo $PRESAMI_A ?>],
        ]
    }]
});
		</script>    
       <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr >
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><span align="center">CATEGORÍA DE FÚTBOL-TOTAL</span></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">CATEGORÍA</th>
                <th style="text-align:center;">NÙMERO</th>
            </tr>
        </thead>
        <tr>
            <th style="text-align:center;"> PRESAMI    </th>
            <th style="text-align:center;"><?php echo $PRESAMI  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> SAMI    </th>
            <th style="text-align:center;"><?php echo $SAMI ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GORRION     </th>
            <th style="text-align:center;"><?php echo $GORRION  ?>   </th>
        </tr>            
        <tr>
            <th style="text-align:center;"> PREINFANTIL    </th>
            <th style="text-align:center;"><?php echo $PREINFANTIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> INFANTIL    </th>
            <th style="text-align:center;"><?php echo $INFANTIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> PREJUVENIL    </th>
            <th style="text-align:center;"><?php echo $PREJUVENIL  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;" class="bg-danger text-white"> TOTAL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL  ?>   </th>
        </tr>
    </table>    
 <?php          
}
elseif($seleccion == 'rep_muc')
{
?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'MODALIDAD MUSICA' //AÑO <?php  $ANIO ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL_MUSICA ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'GRAFICA MUSICA', sliced:true,
        data: 
            [
            ['ESTIMULACION', <?php echo $ESTIMULACION ?> ],
            ['GUITARRA', <?php echo $GUITARRA ?>],
            ['TECLADO', <?php echo $TECLADO ?>],
            ['ESTUDIANTINA', <?php echo $ESTUDIANTINA ?>],
        ]
    }]
});
		</script>    
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr >
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><h1>Música por Categoría</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">CATEGORIA</th>
                <th style="text-align:center;">NÚMERO</th>
            </tr>
        </thead>
        <tr>
            <th style="text-align:center;"> ESTIMULACIÓN    </th>
            <th style="text-align:center;"><?php echo $ESTIMULACION  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GUITARRA    </th>
            <th style="text-align:center;"><?php echo $GUITARRA  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> TECLADO    </th>
            <th style="text-align:center;"><?php echo $TECLADO  ?>   </th>
        </tr>
        <tr>
            <th style="text-align:center;"> ESTUDIANTINA    </th>
            <th style="text-align:center;"><?php echo $ESTUDIANTINA  ?>   </th>
        </tr>        
        <tr>
            <th style="text-align:center;" class="bg-danger text-white"> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL_MUSICA  ?>   </th>
        </tr>
    </table>            
 <?php     
}
elseif($seleccion == 'rep_dmp')
{
?>
		<script type="text/javascript">

Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Registro de Pago de Cuota 1'
    },

    xAxis: {
        categories: [            
            'GARZON',
            'EL PITAL',
            'AGRADO',
            'RIVERA',
            'ARGENTINA',
            'PITALITO',
            'LA PLATA',
            'GUADALUPE',
            'SUAZA',
            'TARQUI']
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'PAGOS Y NO PAGOS'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [
    {
                name: 'FUTBOL NO PAGO',
        data: [<?php echo $FUTBOL_GAN?>, 
               '',
               <?php echo $FUTBOL_AGN?>,
               <?php echo $FUTBOL_RIN?>,
               <?php echo $FUTBOL_ARN?>,
               <?php echo $FUTBOL_PITN?>,
               <?php echo $FUTBOL_PLN?>,
               <?php echo $FUTBOL_GUN?>,
               <?php echo $FUTBOL_SUN?>,
               <?php echo $FUTBOL_TAN?>],
        stack: 'FUTBOL'
    },
                 {
        name: 'FUTBOL PAGO',
        data: [<?php echo $FUTBOL_GAP?>, 
               <?php echo $FUTBOL_PIP?>,
               <?php echo $FUTBOL_AGP?>,
               <?php echo $FUTBOL_RIP?>,
               <?php echo $FUTBOL_ARP?>,
               <?php echo $FUTBOL_PITP?>,
               <?php echo $FUTBOL_PLP?>,
               <?php echo $FUTBOL_GUP?>,
               <?php echo $FUTBOL_SUP?>,
               <?php echo $FUTBOL_TAP?>],
        stack: 'FUTBOL'
    },
        
        
        {
        name: 'MUSICA-PAGO',
        data: [<?php echo $MUSICA_GAP?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    }, 
        {
        name: 'MUSICA-NO PAGO',
        data: [<?php echo $MUSICA_GAN?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    },
        {
        name: 'DANZA - PAGO',
        data: [<?php echo $DANZA_GAP?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
         {
        name: 'DANZA - NO PAGO',
        data: [<?php echo $DANZA_GAN?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
            {
        name: 'BALONCESTO - PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIP?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },
     {
        name: 'BALONCESTO N- NO PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIN?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },]
});
		</script>
        
        
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr>
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><h1>Categoría - Pagos</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">AGENCIA</th>
                <th style="text-align:center;">CATEGORIA</th>
                <th style="text-align:center;">CUOTA 1 : PAGO</th>
                <th style="text-align:center;">CUOTA 1 : NO PAGO</th>
            </tr>
        </thead>

        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> MUSICA   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAP  ?>   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> DANZA    </th>
            <th style="text-align:center;"><?php echo $DANZA_GAP  ?>   </th>
            <th style="text-align:center;"><?php echo $DANZA_GAN  ?>    </th>
        </tr>
         
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIN  ?>    </th>
        </tr>               
        <tr>
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> BALONCESTO    </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIP  ?>   </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> AGRADO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGN  ?>    </th>
        </tr>     
        <tr>
            <th style="text-align:center;"> RIVERA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> ARGENTINA  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARN  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> PITALITO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> LA PLATA </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLN ?>    </th>
        </tr>   
        <tr>
            <th style="text-align:center;"> GUADALUPE  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUN  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> SUAZA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUN  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> TARQUI </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAP  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAN  ?>    </th>
        </tr>         
        
        <tr>
            
            <th style="text-align:center;" colspan='2' class="bg-danger text-white"> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGO  ?>   </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGON  ?>    </th>
        </tr>
    </table>            
        
        
        <?php
}
elseif($seleccion == 'cuota1')
{
?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'Cuota 1'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Cuota 1', sliced:true,
        data: 
            [
            ['PAGADO', <?php echo $cuota1 ?> ],
            ['NO PAGADO', <?php echo $cuota1_NP ?>],
        ]
    }]
});
		</script>    
 <?php       
}
elseif($seleccion == 'cuota2')
{
?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'Pago Cuota 2'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'Cuota 2', sliced:true,
        data: 
            [
            ['PAGADO', <?php echo $cuota2 ?> ],
            ['NO PAGADO', <?php echo $cuota2_NP ?>],
        ]
    }]
});
		</script>    
 <?php           
}
elseif($seleccion == 'ciclo3')
{
?> 
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'pie',
        options3d: {
            enabled: true,
            alpha: 31,
            beta: 0
        }
    },
    title: {
        text    : 'PAGO CICLO 3'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            depth:<?php echo $TOTAL ?>,
            dataLabels: {
                enabled: true,
                format: '{point.name}'
            }
        }
    },
    series: [{
        type: 'pie',
        name: 'GRAFICA CICLO 3', sliced:true,
        data: 
            [
            ['PAGADO', <?php echo $CICLO3 ?> ],
            ['NO PAGADO', <?php echo $CICLO3_NP ?>],
        ]
    }]
});
		</script>    
 <?php           
}
elseif($seleccion == 'rep_dmp2')
{
?>
<script type="text/javascript">

Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'Registro de Pago de Cuota 2'
    },

    xAxis: {
        categories: [            
            'GARZON',
            'EL PITAL',
            'AGRADO',
            'RIVERA',
            'ARGENTINA',
            'PITALITO',
            'LA PLATA',
            'GUADALUPE',
            'SUAZA',
            'TARQUI']
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'PAGOS Y NO PAGOS'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [
    {
                name: 'FUTBOL NO PAGO',
        data: [<?php echo $FUTBOL_GAN2?>, 
               '',
               <?php echo $FUTBOL_AGN2?>,
               <?php echo $FUTBOL_RIN2?>,
               <?php echo $FUTBOL_ARN2?>,
               <?php echo $FUTBOL_PITN2?>,
               <?php echo $FUTBOL_PLN2?>,
               <?php echo $FUTBOL_GUN2?>,
               <?php echo $FUTBOL_SUN2?>,
               <?php echo $FUTBOL_TAN2?>],
        stack: 'FUTBOL'
    },
                 {
        name: 'FUTBOL PAGO',
        data: [<?php echo $FUTBOL_GAP2?>, 
               <?php echo $FUTBOL_PIP2?>,
               <?php echo $FUTBOL_AGP2?>,
               <?php echo $FUTBOL_RIP2?>,
               <?php echo $FUTBOL_ARP2?>,
               <?php echo $FUTBOL_PITP2?>,
               <?php echo $FUTBOL_PLP2?>,
               <?php echo $FUTBOL_GUP2?>,
               <?php echo $FUTBOL_SUP2?>,
               <?php echo $FUTBOL_TAP2?>],
        stack: 'FUTBOL'
    },
        
        
        {
        name: 'MUSICA-PAGO',
        data: [<?php echo $MUSICA_GAP2?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    }, 
        {
        name: 'MUSICA-NO PAGO',
        data: [<?php echo $MUSICA_GAN2?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    },
        {
        name: 'DANZA - PAGO',
        data: [<?php echo $DANZA_GAP2?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
         {
        name: 'DANZA - NO PAGO',
        data: [<?php echo $DANZA_GAN2?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
            {
        name: 'BALONCESTO - PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIP2?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },
     {
        name: 'BALONCESTO N- NO PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIN2?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },]
});
		</script>
        
        
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75">
        <thead style="text-align:center;">
            <tr>
                <th colspan="10" style="text-align:center;" class="table table-bordered table-hover table-striped bg-white w-75"><h1>Categoría - Pagos</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">AGENCIA</th>
                <th style="text-align:center;">CATEGORIA</th>
                <th style="text-align:center;">CUOTA 2 : PAGO</th>
                <th style="text-align:center;">CUOTA 2 : NO PAGO</th>
            </tr>
        </thead>

        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> MUSICA   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAP2  ?>   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> DANZA    </th>
            <th style="text-align:center;"><?php echo $DANZA_GAP2  ?>   </th>
            <th style="text-align:center;"><?php echo $DANZA_GAN2  ?>    </th>
        </tr>
         
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIN2  ?>    </th>
        </tr>               
        <tr>
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> BALONCESTO    </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIP2  ?>   </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> AGRADO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGN2  ?>    </th>
        </tr>     
        <tr>
            <th style="text-align:center;"> RIVERA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> ARGENTINA  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARN2  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> PITALITO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> LA PLATA </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLN2 ?>    </th>
        </tr>   
        <tr>
            <th style="text-align:center;"> GUADALUPE  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUN2  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> SUAZA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUN2  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> TARQUI </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAP2  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAN2  ?>    </th>
        </tr>         
        
        <tr>
            
            <th style="text-align:center;" colspan='2' class='bg-danger text-white'> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGO2  ?>   </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGON2  ?>    </th>
        </tr>
    </table>            
        
        
        <?php
}
elseif($seleccion == 'rep_dmp3')
{
?>
<script type="text/javascript">

Highcharts.chart('container', {

    chart: {
        type: 'column'
    },

    title: {
        text: 'REGISTRO DE PAGO DE CICLO III'
    },

    xAxis: {
        categories: [            
            'GARZON',
            'EL PITAL',
            'AGRADO',
            'RIVERA',
            'ARGENTINA',
            'PITALITO',
            'LA PLATA',
            'GUADALUPE',
            'SUAZA',
            'TARQUI']
    },

    yAxis: {
        allowDecimals: false,
        min: 0,
        title: {
            text: 'PAGOS Y NO PAGOS'
        }
    },

    tooltip: {
        formatter: function () {
            return '<b>' + this.x + '</b><br/>' +
                this.series.name + ': ' + this.y + '<br/>' +
                'Total: ' + this.point.stackTotal;
        }
    },

    plotOptions: {
        column: {
            stacking: 'normal'
        }
    },

    series: [
    {
                name: 'FUTBOL NO PAGO',
        data: [<?php echo $FUTBOL_GAN3?>, 
               '',
               <?php echo $FUTBOL_AGN3?>,
               <?php echo $FUTBOL_RIN3?>,
               <?php echo $FUTBOL_ARN3?>,
               <?php echo $FUTBOL_PITN3?>,
               <?php echo $FUTBOL_PLN3?>,
               <?php echo $FUTBOL_GUN3?>,
               <?php echo $FUTBOL_SUN3?>,
               <?php echo $FUTBOL_TAN3?>],
        stack: 'FUTBOL'
    },
                 {
        name: 'FUTBOL PAGO',
        data: [<?php echo $FUTBOL_GAP3?>, 
               <?php echo $FUTBOL_PIP3?>,
               <?php echo $FUTBOL_AGP3?>,
               <?php echo $FUTBOL_RIP3?>,
               <?php echo $FUTBOL_ARP3?>,
               <?php echo $FUTBOL_PITP3?>,
               <?php echo $FUTBOL_PLP3?>,
               <?php echo $FUTBOL_GUP3?>,
               <?php echo $FUTBOL_SUP3?>,
               <?php echo $FUTBOL_TAP3?>],
        stack: 'FUTBOL'
    },
        
        
        {
        name: 'MUSICA-PAGO',
        data: [<?php echo $MUSICA_GAP3?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    }, 
        {
        name: 'MUSICA-NO PAGO',
        data: [<?php echo $MUSICA_GAN3?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'MUSICA'
    },
        {
        name: 'DANZA - PAGO',
        data: [<?php echo $DANZA_GAP3?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
         {
        name: 'DANZA - NO PAGO',
        data: [<?php echo $DANZA_GAN3?>, 
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''
               ],
        stack: 'DANZA'
    },
            {
        name: 'BALONCESTO - PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIP3?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },
     {
        name: 'BALONCESTO N- NO PAGO',
        data: [
               '', 
               <?php echo $BALONCESTO_PIN3?>,
               '',
               '',
               '',
               '',
               '',
               '',
               '',
               ''],
        stack: 'BALONCESTO'
    },]
});
		</script>
        
        
        <table style="text-align:center;" class="table table-bordered table-hover table-striped bg-white">
        <thead style="text-align:center;">
            <tr>
                <th colspan="10" style="text-align:center;" class="form-title"><h1>Categoría - Pagos</h1></th>
            </tr>
            <tr style="text-align:center;" class="bg-danger text-white">
                <th style="text-align:center;">AGENCIA</th>
                <th style="text-align:center;">CATEGORIA</th>
                <th style="text-align:center;">CICLO 3 : PAGO</th>
                <th style="text-align:center;">CICLO 3 : NO PAGO</th>
            </tr>
        </thead>

        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GAN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> MUSICA   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAP3  ?>   </th>
            <th style="text-align:center;"><?php echo $MUSICA_GAN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> GARZON   </th>
            <th style="text-align:center;"> DANZA    </th>
            <th style="text-align:center;"><?php echo $DANZA_GAP3 ?>   </th>
            <th style="text-align:center;"><?php echo $DANZA_GAN3  ?>    </th>
        </tr>
         
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> FUTBOL   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PIN3  ?>    </th>
        </tr>               
        <tr>
            <th style="text-align:center;"> PITAL   </th>
            <th style="text-align:center;"> BALONCESTO    </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIP3  ?>   </th>
            <th style="text-align:center;"><?php echo $BALONCESTO_PIN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> AGRADO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_AGN3  ?>    </th>
        </tr>     
        <tr>
            <th style="text-align:center;"> RIVERA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_RIN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> ARGENTINA  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_ARN3  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> PITALITO   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PITN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> LA PLATA </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_PLN3 ?>    </th>
        </tr>   
        <tr>
            <th style="text-align:center;"> GUADALUPE  </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_GUN3  ?>    </th>
        </tr> 
        <tr>
            <th style="text-align:center;"> SUAZA   </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_SUN3  ?>    </th>
        </tr>
        <tr>
            <th style="text-align:center;"> TARQUI </th>
            <th style="text-align:center;"> FUTBOL    </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAP3  ?>   </th>
            <th style="text-align:center;"><?php echo $FUTBOL_TAN3  ?>    </th>
        </tr>         
        
        <tr>
            
            <th style="text-align:center;" colspan='2'> TOTAL    </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGO3  ?>   </th>
            <th style="text-align:center;"><?php echo $TOTAL_PAGON3  ?>    </th>
        </tr>
    </table>            
        
        
        <?php
}        
?>
<div class="text-center mb-5">
    <a href="../reporte.php?opcion=<?php echo $seleccion?>&anio=<?php echo $anio?>"><input type="button" value="Exportar" class="btn-danger"></a>
</div>