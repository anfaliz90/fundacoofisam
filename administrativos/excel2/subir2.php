<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Procesando el archivo enviado</title>
<link rel="stylesheet" type="text/css" href="../../estilos/estilos.css">

</head>

<body>
<div class="form-register">
<h3>Subir archivo con PHP:</h3>
<?php
$directorio = '';
$subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
echo "<div class='contenedor'>";
if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo)) {
      echo "El archivo es válido y se cargó correctamente.<br><br><br>";
	   echo"<a href='".$subir_archivo."' target='_blank'>Archivo Actual</a>";
    } else {
       echo "La subida ha fallado";
    }
    echo "</div>";
?>
<br>
<div class="contenedor">
<a href="leer.php"><img src="../../img/registrar.png" height="70" width="120" style="border:0px" class='boton_imagen'> </a></div>

 
</div>
	</body>
</html>