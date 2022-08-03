<?php
set_time_limit(60);
include('../../conn.php');
if(!$conexion)
{
  echo 'Error al conectarse';
}
else
{
     //echo 'Conectado';
}
require 'Classes/PHPExcel/IOFactory.php';

$s ="UPDATE usuarios set cuota1='', cuota2=''";
$result2=mysqli_query($conexion,$s);    

//Cargar todos los datos de los beneficiarios //
$consulta_usuario = "SELECT * from usuarios ORDER by id ASC";
$ejecuta_cu       = mysqli_query($conexion,$consulta_usuario);

$nombreArchivo='ejemplo.xlsx';
$objPHPExcel = PHPEXCEL_IOFactory::load($nombreArchivo);

$objPHPExcel->setActiveSheetIndex(0);
echo "Total de datos leidos:<br>";
echo $numRows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Actualizaci¨®n de Cuota - OPA</title>
        <link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
        <style>
                td, th, tr, table 
                {
                        text-align:center;
                }
        </style>
</head>
<body>
<h3>Registro de OPA</h3>
<div class="form-register">
<?php

set_time_limit(100);

echo'<table style="border:1 px solid black;font-family:"Metropolis"">';
echo '<tr><th style="border:1 px solid black;">Total </th><th style="border:1 px solid black;">ID a registrar </th><th style="border:1 px solid black;"> Cuota 1</th><th style="border:1 px solid black;"> Cuota 2</th></tr>';


//echo $id1 = $objPHPExcel->getActiveSheet(0)->getCellByColumnAndRow(2,5)->getCalculatedValue();
$CON=1;
while($row=mysqli_fetch_array($ejecuta_cu))
{
     $id = $row['id'];
     $DI = $row['ide'];
     $Agencia = $row['agencia'];
     $Modalidad = $row['modalidad'];
     $Categoria = $row['categoria'];
     
        //Consultar ID del documento de Excel

        for($i=1; $i<$numRows; $i++) //Valor a revisar - se dejar¨¢ en 1600
        {
                $id1 = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                $ValorTotal = $objPHPExcel->getActiveSheet()->getCell('I'.$i)->getCalculatedValue();
                $EstadoPoliza = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                $ValorPagado = $objPHPExcel->getActiveSheet()->getCell('L'.$i)->getCalculatedValue();
                $Estado = $objPHPExcel->getActiveSheet()->getCell('P'.$i)->getCalculatedValue();
                
                if($EstadoPoliza=="ACTIVA")
                {
                    if($id==$id1)
                    {
                        if($ValorTotal>=120000 && $ValorPagado>=60000 && $Estado=="VIGENTE")
                        {
                            $sql2 ="UPDATE usuarios set cuota1='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                            $sql2 ="UPDATE usuarios set se='ACTIVO' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);  
    
                            /*Revisar si est¨¢ repetido*/
                            $valor="SELECT COUNT(*)AS NUM FROM usuarios WHERE id='$id1";
                            $ejecutar=mysqli_query($conexion, $valor);    
                            
                                    echo '<tr>';
                                    echo '<td>'.$id.'</td>';
                                    echo '<td>'.$DI.'</td>';
                                    echo '<td>Pagado</td>';
                                    echo '<td></td>';
                                    
                                    echo '</tr>';
                            
                        }
                        elseif($ValorTotal==$ValorPagado && $ValorTotal <=65000 && $Estado=="PAGADO")
                        {
                            $sql2 ="UPDATE usuarios set cuota1='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                            $sql2 ="UPDATE usuarios set cuota2='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                         //   $sql2 ="UPDATE usuarios set se='ACTIVO' WHERE id='$id1'";
                         //   $result2=mysqli_query($conexion,$sql2);  
    
                            /*Revisar si est¨¢ repetido*/
                            $valor="SELECT COUNT(*)AS NUM FROM usuarios WHERE ide='$DI";
                            $ejecutar=mysqli_query($conexion, $valor);    
                            
                                    echo '<tr>';
                                    echo '<td>'.$id.'</td>';
                                    echo '<td>'.$DI.'</td>';
                                    echo '<td>Pagado</td>';
                                    echo '<td>Pagado</td>';
                                    
                                    echo '</tr>';
                        }
                        elseif($ValorTotal<=65000 && $ValorPagado==0  && $Estado=="VIGENTE")
                        {
                            $sql2 ="UPDATE usuarios set cuota1='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                         //   $sql2 ="UPDATE usuarios set se='ACTIVO' WHERE id='$id1'";
                          //  $result2=mysqli_query($conexion,$sql2);  
    
                            /*Revisar si est¨¢ repetido*/
                            $valor="SELECT COUNT(*)AS NUM FROM usuarios WHERE ide='$DI";
                            $ejecutar=mysqli_query($conexion, $valor);    
                            
                                    echo '<tr>';
                                    echo '<td>'.$id.'</td>';
                                    echo '<td>'.$DI.'</td>';
                                    echo '<td>Pagado</td>';
                                    echo '<td></td>';
                                    
                                    echo '</tr>';
                        }                        
                        elseif($ValorPagado==$ValorTotal && $Estado=="PAGADO")
                        {
                            $sql2 ="UPDATE usuarios set cuota1='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                            $sql2 ="UPDATE usuarios set cuota2='pagado' WHERE id='$id1'";
                            $result2=mysqli_query($conexion,$sql2);
                            
                           // $sql2 ="UPDATE usuarios set se='ACTIVO' WHERE id='$id1'";
                           // $result2=mysqli_query($conexion,$sql2);  
    
                            /*Revisar si est¨¢ repetido*/
                            $valor="SELECT COUNT(*)AS NUM FROM usuarios WHERE ide='$DI";
                            $ejecutar=mysqli_query($conexion, $valor);    
                            
                                    echo '<tr>';
                                    echo '<td>'.$id.'</td>';
                                    echo '<td>'.$DI.'</td>';
                                    echo '<td>Pagado</td>';
                                    echo '<td>Pagado</td>';
                                    
                                    echo '</tr>';  
                        }
                        
                    
                    }
                }
                
               
               
        }
       
}
echo '</table>';
?>
</body>
</html>