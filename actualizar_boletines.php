<?php
include("conn.php");
//error_reporting(0);

for ($i = 1; $i <= 2000; $i++) 
{
    
    
    $C_id = "SELECT id_reg FROM boletines WHERE id_reg='$i'";
    $consultar_id = mysqli_query($conexion, $C_id);
   
       
        while($vector = mysqli_fetch_array($consultar_id))
        {
            echo "<br>";
            echo $i.':  ';    
            $sal = $vector["id_reg"];
            
            if($sal!='')
            {

        // OBTENER AGENCIA , MODALIDAD Y CATEGORIA
        $C_var = "SELECT * FROM usuarios WHERE id='$sal' AND modalidad ='FUTBOL'";
        $consultar_var  = mysqli_query($conexion,$C_var);
        while($vector1 = mysqli_fetch_array($consultar_var))
        {
            
            echo $agencia = $vector1['agencia'];
            echo ', ';
            echo $categoria = $vector1['categoria'];
            echo "<br>";


        $C_fo= "SELECT * FROM instructores WHERE modalidad='FUTBOL'";
        $consultar_fo = mysqli_query($conexion, $C_fo);
            while($vector2 = mysqli_fetch_array($consultar_fo))
            {
                
                 $agencia_f = $vector2['agencia'];
                 $categoria_f = $vector2['categoria'];
                 
                 $formador = $vector2['ide'];
                

                    if($agencia!="GARZON")
                    {
                            
                        
                        if($agencia==$agencia_f)
                        {
                            echo $agencia. ' '. $agencia_f.' '.$formador.' '.$i;

                                  $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);
                        }

                    }
                    elseif($agencia=="GARZON")
                    {
                        
                        if($agencia==$agencia_f)
                        {
                            echo "<br>El formador es:".$formador;
                            echo ' .Es Garzon '.$agencia;
                            if($categoria=="SAMI" && $categoria_f=="PRES_SAMI")
                            {
                                
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);

                            }
                            elseif($categoria=="PRESAMI" || $categoria=="PRESAMI_M" && $categoria_f=="PRES_SAMI")
                            {
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                        $ejecutar = mysqli_query($conexion, $actualizar_boletin);

                            }                  
                            elseif($categoria=="PREINFANTIL" || $categoria=="PREINFANTIL_M" && $categoria_f=="PREI_INFA")
                            {
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);

                            }   
                            elseif($categoria=="INFANTIL" && $categoria_f=="PREI_INFA")
                            {
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);

                            }   
                            elseif($categoria=="GORRION" || $categoria=="GORRION_M" && $categoria_f=="GORR_PREJ")
                            {
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);

                            }                    
                            elseif($categoria=="PREJUVENIL" && $categoria_f=="GORR_PREJ")
                            {
                                $actualizar_boletin = "UPDATE boletines SET formador='$formador' WHERE id_reg='$i'";
                                $ejecutar = mysqli_query($conexion, $actualizar_boletin);
                            }   
                            
                            echo ' El formador de '.$categoria;

                        }
                        
                    }
            }
        }
        }

    
    }
    
    echo '<br>';
    
}



?>