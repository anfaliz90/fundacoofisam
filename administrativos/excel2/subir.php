<?php
        include('../../conn.php');
        if(!$conexion)
        {
        //  echo 'Error al conectarse';
        }
        else
        {
           //  echo 'Conectado';
        }

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cargar Excel</title>
<link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">
</head>

<body >
<div class="form-register">
<h3>Seguro Estudiantil</h3>
<br>
<form enctype="multipart/form-data" action="subir2.php" method="POST">
<div class="contenedor">
    <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
   <p> Seleccionar Archivo <input name="subir_archivo" type="file" /></p>
<!--   <p> <input type="submit" value="Enviar Archivo" /></p>-->
</div>
<div class="contenedor">
            <div class='boton_imagen'>    
                <input type="image" src="../../img/registrar.png" height="70" width="120" style="border:0px" class='boton_imagen' onChange="continuar();"/>
            </div>
            </div>
        
</form>
</div>
</body>
</html>