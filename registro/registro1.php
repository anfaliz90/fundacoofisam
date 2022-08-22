<?php
include('../conn.php');
if (!$conexion) {
    //  echo 'Error al conectarse';
} else {
    //  echo 'Conectado';
}
$consulta = "SELECT * FROM colegios_garzon";
$colegio = mysqli_query($conexion, $consulta);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>
        Fundacoofisam - Registro
    </title>
    <link rel='stylesheet' type='text/css' href='../estilos/estilos.css'>
    <link rel='stylesheet' type='text/css' href='../estilos/estilo_form.css'>
    <link rel="shortcut icon" href="../ico.png">
    <script type="text/javascript" src="../../js/funciones.js"></script>
    <style>
        * {
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T3EDMKDXXV"></script>
    <script>
        function reiniciar_musica() {
            alert("De acuerdo a los protocolos de bioseguridad establecidos, brindamos acompañamiento musical a niños(as) y jóvenes entre 7 y 17 años");
            //alert("Selecciona Edad para Continuar");

            document.getElementById("modalidad").selectedIndex = 0;

        }
    </script>
    <script>
        function otra2() {
            if (document.getElementById("preg_1_d").value == "OTRA") {
                document.getElementById("otra").style.display = "block";
                document.getElementById("label_otra").style.display = "block";
            } else {
                document.getElementById("otra").style.display = "none";
                document.getElementById("label_otra").style.display = "none";
            }
        }
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-T3EDMKDXXV');
    </script>
    <script>
        $('input[type="file"]').on('change', function() {
            var ext = $(this).val().split('.').pop();
            if ($(this).val() != '') {
                if (ext == "pdf") {
                    alert("La extensión es: " + ext);
                    if ($(this)[0].files[0].size > 3048576) {
                        console.log("El documento excede el tamaño máximo");
                        $('#modal-title').text('¡Precaución!');
                        $('#modal-msg').html("Se solicita un archivo no mayor a 3MB. Por favor verifica.");
                        $("#modal-gral").modal();
                        $(this).val('');
                    } else {
                        $("#modal-gral").hide();
                    }
                } else {
                    $(this).val('');
                    alert("Extensión no permitida: " + ext);
                }
            }
        });
    </script>
    <!--       <script>
        window.onload = function() 
        {
            var $recaptcha = document.querySelector('#g-recaptcha-response');
            if($recaptcha) 
            {
            $recaptcha.setAttribute("required", "required");
            }
        };
          </script>
        <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>-->

    <link rel="stylesheet" href="../../estilos/estilos.css">
    <script type='text/javascript'>
        var cerrar = 0;

        function showFileSize() {
            var input, file;
            falso();
            if (!window.FileReader) {
                alert("The file API isn't supported on this browser yet.");
                return;
            }

            input = document.getElementById('btn_enviar');
            if (!input) {
                // bodyAppend("p", "Um, couldn't find the fileinput element.");
            } else if (!input.files) {
                //bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
            } else if (!input.files[0]) {
                f
                //bodyAppend("p", "Please select a file before clicking 'Load'");
            } else {
                file = input.files[0];
                console.log(file);
                //bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
                if (file.size > 3000000) {
                    alert("Los archivos en PDF no pueden superar los 3Mb");
                    document.getElementById('btn_enviar').value = "";
                }
            }
        }

        function showFileSize1() {
            var input, file;
            falso();
            if (!window.FileReader) {
                alert("The file API isn't supported on this browser yet.");
                return;
            }

            input = document.getElementById('btn_enviar1');
            if (!input) {
                // bodyAppend("p", "Um, couldn't find the fileinput element.");
            } else if (!input.files) {
                // bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
            } else if (!input.files[0]) {
                // bodyAppend("p", "Please select a file before clicking 'Load'");
            } else {
                file = input.files[0];
                console.log(file);
                //  bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
                if (file.size > 3000000) {
                    alert("Los archivos en PDF no pueden superar los 3Mb");
                    document.getElementById('btn_enviar1').value = "";
                }
            }
        }

        function showFileSize2() {
            var input, file;
            falso();
            if (!window.FileReader) {
                alert("The file API isn't supported on this browser yet.");
                return;
            }

            input = document.getElementById('btn_enviar2');
            if (!input) {
                // bodyAppend("p", "Um, couldn't find the fileinput element.");
            } else if (!input.files) {
                // bodyAppend("p", "This browser doesn't seem to support the `files` property of file inputs.");
            } else if (!input.files[0]) {
                // bodyAppend("p", "Please select a file before clicking 'Load'");
            } else {
                file = input.files[0];
                console.log(file);
                //  bodyAppend("p", "File " + file.name + " is " + file.size + " bytes in size");
                if (file.size > 3000000) {
                    alert("Los archivos en PDF no pueden superar los 3Mb");
                    document.getElementById('btn_enviar2').value = "";
                }
            }
        }
    </script>
    <script>
        function falso() {
            document.getElementById("declaro").checked = false;
        }

        function continuar() {

            var ident = document.getElementById("btn_enviar").value;
            var segur = document.getElementById("btn_enviar1").value;
            //alert(ident.slice(-3));
            //alert(segur.slice(-3));
            /*if( document.getElementById("agencia").value!='' )
            {
                alert("hola");*/
            if (ident.slice(-3) == "pdf" && segur.slice(-3) == "pdf") {
                //alert("exito");
                //document.globe.submit();
            } else if (ident.slice(-3) == "doc" && segur.slice(-3) == "ocx") {
                alert("El documento subido es Word. Debe ser PDf");
                document.getElementById("btn_enviar").value = '';
                document.getElementById("btn_enviar1").value = '';
                falso();

                return 0;
            } else if (ident.slice(-3) == "jpg" && segur.slice(-3) == "png") {
                alert("El formato de los archivos son imagenes. Debe ser PDF");
                document.getElementById("btn_enviar").value = '';
                document.getElementById("btn_enviar1").value = '';
                falso();
                return 0;
            } else {
                alert("Recuerda que los documentos deben subirse en formato PDF");
                ident = document.getElementById("btn_enviar").value = '';
                segur = document.getElementById("btn_enviar1").value = '';
                falso();
                return 0;
            }
            /*if( document.getElementById("modalidad").value=="FUTBOL");
            {
                if(document.getElementById("categoria_f").value=="")
                {
                    alert("No existe ")
                }
            }*/

            /* Ponemos los atributos de posicion a la capa transparente del fondo 
		$('#layerPreview').attr("style", "top:0px; height:"+$(document).height()+"px; width:"+$(window).width()+"px; display:inline;");
		
		/* Buscamos la posicion superior de la capa que aparece centrada.
		   La anchura y la posicion centrada se establece en el estilo 
		var posTop=(($(window).height()/2)-(200/2))+$(document).scrollTop();
		if(posTop<0)
			posTop=0;
		$('#layerPreviewContent').attr("style", "top:"+posTop+"px;");
		/* Indicamos que se muestre la capa 
		$('#layerPreviewContent').show(600);
	//}       */
            //}
        }
    </script>

    <script>
        function danza_hor() {
            if (document.getElementById("modalidad").value == "DANZA") {
                // alert("Danza escogida");

                if (document.getElementById("anio").value == "2016" || document.getElementById("anio").value == "2015") {
                    //alert("estimulacion");
                    document.getElementById("ESTIMULACION_D").style.display = "block";
                    document.getElementById("INFANTIL").style.display = "none";
                    document.getElementById("JUVENIL").style.display = "none";
                    document.getElementById("JUNIOR").style.display = "none";
                } else if (document.getElementById("anio").value == "2014") {
                    document.getElementById("JUNIOR").style.display = "block";
                    document.getElementById("INFANTIL").style.display = "none";
                    document.getElementById("JUVENIL").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else if (document.getElementById("anio").value == "2012" || document.getElementById("anio").value == "2013") {
                    //alert("INFANTILES");
                    document.getElementById("INFANTIL").style.display = "block";
                    document.getElementById("JUNIOR").style.display = "block";
                    document.getElementById("JUVENIL").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else if (document.getElementById("anio").value == "2010" || document.getElementById("anio").value == "2011") {
                    document.getElementById("JUVENIL").style.display = "block";
                    document.getElementById("PREINFANTIL").style.display = "block";
                    document.getElementById("JUNIOR").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else if (document.getElementById("anio").value == "2008" || document.getElementById("anio").value == "2009") {
                    document.getElementById("JUVENIL").style.display = "block";
                    document.getElementById("INFANTIL").style.display = "block";
                    document.getElementById("JUNIOR").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else if (document.getElementById("anio").value == "2006" || document.getElementById("anio").value == "2007") {
                    document.getElementById("PREJUVENIL").style.display = "block";
                    document.getElementById("INFANTIL").style.display = "none";
                    document.getElementById("JUNIOR").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else if (document.getElementById("anio").value == "2005") {
                    document.getElementById("JUVENIL").style.display = "block";
                    document.getElementById("INFANTIL").style.display = "none";
                    document.getElementById("JUNIOR").style.display = "none";
                    document.getElementById("ESTIMULACION_D").style.display = "none";
                } else {
                    document.getElementById("modalidad").selectedIndex = 0;

                    alert("Selecciona Edad para Continuar");
                    document.getElementById("edad").style.display = "none";
                }

            }

        }
    </script>
    <script type="application/javascript">
        function categoriafut() {
            if (document.getElementById("modalidad").value == "FUTBOL" && document.getElementById("agencia").value == "GARZON") {
                document.getElementById("cupos").style.display = "block";
                document.getElementById("cupos1").style.display = "none";
            } else if (document.getElementById("modalidad").value == "MUSICA" && document.getElementById("agencia").value == "GARZON") {
                document.getElementById("cupos1").style.display = "block";
                document.getElementById("cupos").style.display = "none";
            } else {
                document.getElementById("cupos").style.display = "none";
                document.getElementById("cupos1").style.display = "none";
            }
        }
    </script>

    <script>
        function modalidads() {
            var edads = edad();
            document.getElementById("musica1").style.display = "none";
            var modalidad1 = document.getElementById("modalidad").value;
            document.getElementById("antiguo").require = false;
            var agencia = document.getElementById("agencia").value;


            if (modalidad1 == "FUTBOL") {
                if (agencia == "GARZON") {
                    document.getElementById("jornada").style.display = "none"; //cambiar por block cuando se vuelva a jornadas
                } else {
                    document.getElementById("jornada").style.display = "none";
                }


                document.getElementById("futbol").style.display = "block;"; // muestra label de futbol

                if (edads == "6" /*|| edads=="7"*/ ) {
                    document.getElementById("categoria_f").value = "PRESAMI B";
                } else if (edads == "7" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "PRESAMI A";
                } else if (edads == "8" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "SAMI B";
                } else if (edads == "9" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "SAMI A";
                } else if (edads == "10" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "GORRION B";
                } else if (edads == "11" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "GORRION A";
                } else if (edads == "12" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "PREINFANTIL B";
                } else if (edads == "13" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "PREINFANTIL A";
                } else if (edads == "14" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "INFANTIL B";
                } else if (edads == "15" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "INFANTIL A";
                } else if (edads == "16" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "PREJUVENIL B";
                } else if (edads == "17" /* || edads=="9"*/ ) {
                    document.getElementById("categoria_f").value = "PREJUVENIL A";
                } else if (edads == "5") {
                    alert("No hay categoría disponible");
                    document.getElementById("edad").style.display = "none";
                    document.getElementById("modalidad").selectedIndex = 0;
                    document.getElementById("categoria_f").value = "NO HAY CATEGORIA PARA ESTA EDAD";
                } else {
                    alert("Selecciona Edad para Continuar");
                    document.getElementById("edad").style.display = "none";
                    document.getElementById("modalidad").selectedIndex = 0;
                    document.getElementById("categoria_f").value = "NO HAY CATEGORIA PARA ESTA EDAD";
                }
            } else if (modalidad1 == "MUSICA") {
                antiguo1();
                document.getElementById("antiguo").require = true;
                if (edads == "5") {
                    // alert("5 años");
                    //alert("De acuerdo a los protocolos de bioseguridad establecidos, brindamos acompañamiento musical a niños(as) y jóvenes entre 7 y 17 años")    ;
                    //reiniciar_musica();
                } else if (edads == "4") {
                    //alert("5 años");

                    //reiniciar_musica();
                }
                if (edads == "5") {
                    document.getElementById("categoria_m").value = "ESTIMULACION";
                    // CERRAR OPCIONES SOLO PARA ESTIMULACIÓN I 
                    document.getElementById("instrumentos").style.display = "none";
                    document.getElementById("instrumento").selectedIndex = "1";
                    document.getElementById("GUITARRA").style.display = "none";
                    document.getElementById("TECLADO").style.display = "none";
                    document.getElementById("ESTUDIANTINA").style.display = "none";
                    document.getElementById("ESTIMULACION").style.display = "block";
                    document.getElementById("instrumento").style.display = "mone";
                    document.getElementById("aprender").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="none";
                    //document.getElementById("vm").style.display="none";
                    //document.getElementById("pm").checked=true
                    document.getElementById("mensaje_general_musica").style.display = "none";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "block";


                } else if (edads == "6") {
                    document.getElementById("categoria_m").value = "ESTIMULACION";
                    // CERRAR OPCIONES SOLO PARA ESTIMULACIÓN I 
                    document.getElementById("instrumentos").style.display = "none";
                    document.getElementById("instrumento").selectedIndex = "1";
                    document.getElementById("GUITARRA").style.display = "none";
                    document.getElementById("TECLADO").style.display = "none";
                    document.getElementById("ESTUDIANTINA").style.display = "none";
                    document.getElementById("ESTIMULACION").style.display = "block";
                    document.getElementById("instrumento").style.display = "mone";
                    document.getElementById("aprender").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="none";
                    //document.getElementById("vm").style.display="none";
                    //document.getElementById("pm").checked=true
                    document.getElementById("mensaje_general_musica").style.display = "none";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "block";
                } else if (edads == "7") {
                    document.getElementById("categoria_m").value = "ESTIMULACION";
                    // CERRAR OPCIONES SOLO PARA ESTIMULACIÓN I 
                    document.getElementById("instrumentos").style.display = "none";
                    document.getElementById("instrumento").selectedIndex = "1";
                    document.getElementById("GUITARRA").style.display = "none";
                    document.getElementById("TECLADO").style.display = "none";
                    document.getElementById("ESTUDIANTINA").style.display = "none";
                    document.getElementById("ESTIMULACION").style.display = "block";
                    document.getElementById("instrumento").style.display = "mone";
                    document.getElementById("aprender").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="none";
                    //document.getElementById("vm").style.display="none";
                    //document.getElementById("pm").checked=true
                    document.getElementById("mensaje_general_musica").style.display = "none";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "block";
                } else if (edads == "8") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("categoria_m").value = "JUNIOR I";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="block";
                    document.getElementById("musica1").style.display = "block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("aprender").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";

                } else if (edads == "9" || edads == "10") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("categoria_m").value = "JUNIOR II";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    document.getElementById("instrumento").style.display = "block";
                    document.getElementById("musica1").style.display = "block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("aprender").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";
                } else if (edads == "11" || edads == "12") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("categoria_m").value = "PREINFANTIL";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("musica1").style.display = "block";
                    document.getElementById("aprender").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";
                } else if (edads == "13" || edads == "14") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("categoria_m").value = "INFANTIL";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("musica1").style.display = "block";
                    document.getElementById("aprender").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";

                } else if (edads == "15" || edads == "16") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("categoria_m").value = "PREJUVENIL";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("aprender").style.display = "block";

                    document.getElementById("musica1").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";
                } else if (edads == "17") {
                    document.getElementById("instrumento").selectedIndex = "0";
                    document.getElementById("categoria_m").value = "JUVENIL";
                    document.getElementById("instrumentos").style.display = "block";
                    document.getElementById("GUITARRA").style.display = "block";
                    document.getElementById("TECLADO").style.display = "block";
                    document.getElementById("ESTUDIANTINA").style.display = "block";
                    document.getElementById("ESTIMULACION").style.display = "none";
                    //document.getElementById("Virtual_m").style.display="block";
                    //document.getElementById("vm").style.display="block";
                    document.getElementById("musica1").style.display = "block";
                    document.getElementById("aprender").style.display = "block";
                    document.getElementById("mensaje_general_musica").style.display = "block";
                    document.getElementById("mensaje_estimulacion_musica").style.display = "none";
                } else {
                    setTimeout('reiniciar_musica()', 3000);
                }

            } else if (modalidad1 == "DANZA") {
                document.getElementById("danza").style.display = "block;"; // muestra label de DANZA

                if (edads == "6" || edads == "7") {
                    document.getElementById("categoria_d").value = "ESTIMULACION";
                } else if (edads == "8") {
                    document.getElementById("categoria_d").value = "JUNIOR I";
                } else if (edads == "9" || edads == "10") {
                    document.getElementById("categoria_d").value = "JUNIOR II";
                } else if (edads == "12" || edads == "11") {
                    document.getElementById("categoria_d").value = "PREINFANTIL";
                } else if (edads == "14" || edads == "13") {
                    document.getElementById("categoria_d").value = "INFANTIL";
                } else if (edads == "16" || edads == "15") {
                    document.getElementById("categoria_d").value = "PREJUVENIL";
                } else if (edads == "17") {
                    document.getElementById("categoria_d").value = "JUVENIL";
                } else {
                    alert("Selecciona Edad para Continuar");
                    document.getElementById("edad").style.display = "none";
                    document.getElementById("modalidad").selectedIndex = 0;
                }
                //Horarios de Danza
                danza_hor();
            } else if (modalidad1 == "BALONCESTO") {
                document.getElementById("categoria_b").style.display = "block;"; // muestra label de futbol

                if (edads == "5" || edads == "6") {
                    document.getElementById("categoria_b").value = "PRESAMI";
                } else if (edads == "7" || edads == "8") {
                    document.getElementById("categoria_b").value = "SAMI";
                } else if (edads == "9" || edads == "10") {
                    document.getElementById("categoria_b").value = "GORRION";
                } else if (edads == "11" || edads == "12") {
                    document.getElementById("categoria_b").value = "PREINFANTIL";
                } else if (edads == "13" || edads == "14") {
                    document.getElementById("categoria_b").value = "INFANTIL";
                } else if (edads == "15" || edads == "16") {
                    document.getElementById("categoria_b").value = "PREJUVENIL";
                } else if (edads == "4") {
                    alert("No hay categoría disponible");
                    document.getElementById("edad").style.display = "none";
                    document.getElementById("modalidad").selectedIndex = 0;
                    document.getElementById("categoria_b").value = "NO HAY CATEGORIA PARA ESTA EDAD";
                } else {
                    alert("Selecciona Edad para Continuar");
                    document.getElementById("edad").style.display = "none";
                    document.getElementById("modalidad").selectedIndex = 0;
                    document.getElementById("categoria_b").value = "NO HAY CATEGORIA PARA ESTA EDAD";
                }
            }
        }

        function edad() {



            var anio1 = document.getElementById("anio").value;
            var mes1 = document.getElementById("mes").value;
            var dia1 = document.getElementById("dia").value;

            var anio = "2022";
            var mes = "01";
            var dia = "21";

            var anio2 = anio - anio1;
            var mes2 = mes - mes1;
            var dia2 = dia - dia1;

            if (anio1 != "") {
                document.getElementById("edad").style.display = "inline-block";

                document.getElementById("edad1").value = "Edad: " + anio2 + " años";
                return (anio2);
            } else(anio1 == "2020" || anio1 == "") 
            {
                document.getElementById("edad").style.display = "none";
                return (anio2);
            }
        }   
        
    </script>

    <script type="text/javascript" language="javascript">
        function checkRadio(name) {
            if (name == "si") {
                document.getElementById("si").checked = true;
                document.getElementById("no").checked = false;
                document.getElementById("mensaje_antiguo").style.display = "block";
                document.getElementById("mensaje_nuevo").style.display = "none";


            } else if (name == "no") {
                document.getElementById("no").checked = true;
                document.getElementById("si").checked = false;
                document.getElementById("mensaje_nuevo").style.display = "block";
                document.getElementById("mensaje_antiguo").style.display = "none";

            }
        }

        function agregarOpciones1(form) {
            modalidads();
            var modalidads2 = document.getElementById("modalidad").value;
            var agencias2 = document.getElementById("agencia").value;

            if (modalidads2 == "FUTBOL") {

                if (agencias2 == "GARZON") {
                    cupos_in();
                    cupos_out1();
                }
                document.getElementById("futbol").style.display = "block";
                document.getElementById("baloncesto").style.display = "none";
                document.getElementById("danza").style.display = "none";
                document.getElementById("musica").style.display = "none";
            } else if (modalidads2 == "BALONCESTO") {
                cupos_out1();
                cupos_out();
                document.getElementById("futbol").style.display = "none";
                document.getElementById("baloncesto").style.display = "block";
                document.getElementById("danza").style.display = "none";
                document.getElementById("musica").style.display = "none";
            } else if (modalidads2 == "MUSICA") {

                cupos_in1();
                cupos_out();
                document.getElementById("futbol").style.display = "none";
                document.getElementById("baloncesto").style.display = "none";
                document.getElementById("danza").style.display = "none";
                document.getElementById("musica").style.display = "block";
            } else if (modalidads2 == "DANZA") {

                cupos_out1();
                cupos_out();
                document.getElementById("futbol").style.display = "none";
                document.getElementById("baloncesto").style.display = "none";
                document.getElementById("danza").style.display = "block";
                document.getElementById("musica").style.display = "none";

                //Horarios de Danza

            }





        }
    </script>



    <script>
        function reiniciar() {
            document.getElementById("edad").display = "none;"
            document.getElementById("futbol").style.display = "none";
            document.getElementById("baloncesto").style.display = "none";
            document.getElementById("danza").style.display = "none";
            document.getElementById("musica").style.display = "none";
            document.getElementById("modalidad").selectedIndex = 0;
            grado_off();
        }

        function cupos_in() {
            document.getElementById("cupos").style.display = "block";
        }

        function cupos_out() {
            document.getElementById("cupos").style.display = "none";
        }

        function cupos_in1() {
            document.getElementById("cupos1").style.display = "block";
        }

        function cupos_out1() {
            document.getElementById("cupos1").style.display = "none";
        }

        function grado_on() {
            document.getElementById("grado").style.display = "inline-block";
            document.getElementById("IE2").style.display = "inline-block";
            document.getElementById("IE1").style.display = "none";
        }

        function grado_off() {
            document.getElementById("grado").style.display = "none";
            document.getElementById("IE1").style.display = "inline-block";
            document.getElementById("IE2").style.display = "none";
        }
    </script>


    <script>
        function agregarOpciones(form) // funcion para seleccionar opciones segun la agencia escogida =>modalidad
        {
            var selec = form.agencia.options;
            var combo = form.modalidad.options;
            combo.length = null;

            if (selec[0].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                document.getElementById("futbol").style.display = "none";
                document.getElementById("baloncesto").style.display = "none";
                document.getElementById("danza").style.display = "none";
                document.getElementById("musica").style.display = "none";
                var seleccionar = new Option("AGENCIA", "", "", "");
                combo[0] = seleccionar;
            }
            if (selec[1].selected == true) {
                cupos_out();
                cupos_out1();
                reiniciar();
                grado_on();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                var popular3 = new Option("MUSICA", "MUSICA", "", "");
                var popular4 = new Option("DANZA", "DANZA", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
                combo[2] = popular3;
                combo[3] = popular4;
            }
            if (selec[2].selected == true) {
                cupos_out();
                cupos_out1();
                reiniciar();
                document.getElementById("grado").style.display = "none";
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[3].selected == true) {
                cupos_out();
                cupos_out1();
                reiniciar();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[4].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                var popular3 = new Option("BALONCESTO", "BALONCESTO", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
                combo[2] = popular3;
            }
            if (selec[5].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[6].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[7].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[8].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[9].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
            if (selec[10].selected == true) {
                reiniciar();
                cupos_out();
                cupos_out1();
                var popular1 = new Option("MODALIDAD", "", "", "");
                var popular2 = new Option("FUTBOL", "FUTBOL", "", "");
                combo[0] = popular1;
                combo[1] = popular2;
            }
        }
    </script>
    <script type="application/javascript">
        function INT() {
            var edadh = edad();

            if (document.getElementById("instrumento").value == "GUITARRA") {

                document.getElementById("guitarra_nuevos").style.display = "none";
                document.getElementById("teclado_nuevos").style.display = "block";
                document.getElementById("codigo").style.display = "none";

            } else if (document.getElementById("instrumento").value == "TECLADO") {

                document.getElementById("guitarra_nuevos").style.display = "block";
                document.getElementById("teclado_nuevos").style.display = "none";
                document.getElementById("codigo").style.display = "none";
                document.getElementById("no").style.display = "block";
            } else if (document.getElementById("instrumento").value == "ESTUDIANTINA") {

                document.getElementById("guitarra_nuevos").style.display = "block";
                document.getElementById("teclado_nuevos").style.display = "none";
                document.getElementById("codigo").style.display = "block";
                document.getElementById("si").checked = true;
                document.getElementById("no").checked = false;


                document.getElementById("mensaje_nuevo").style.display = "none";
            } else {
                alert("Selecciona un Instrumento para Continuar");
                document.getElementById("si").checked = false;
                document.getElementById("no").checked = false;
                document.getElementById("teclado_nuevos").style.display = "none";
                document.getElementById("guitarra_nuevos").style.display = "none";
                document.getElementById("no").style.display = "block";
            }


        }
    </script>
    <script>
        function antiguo1() {
            document.getElementById("si").checked = false;
            document.getElementById("no").checked = false;
            document.getElementById("mensaje_nuevo").style.display = "none";
            document.getElementById("mensaje_antiguo").style.display = "none";

            if (document.getElementById("instrumento").value == "ESTUDIANTINA") {
                document.getElementById("guitarra_nuevos").style.display = "none";
                document.getElementById("teclado_nuevos").style.display = "none";
                document.getElementById("codigo").style.display = "block";
                document.getElementById("si").checked = true;
            } else {
                document.getElementById("codigo").style.display = "none";
            }
        }
    </script>
    <style>
        input[type="checkbox"] {
            margin: 0px;
        }
    </style>
    <script language="javascript" src="jquery-1.5.2.min.js"></script>

    <style type="text/css">
        /* Determina el fondo transparente cuando se muestra la previsualizacion */
        #layerPreview {
            position: absolute;
            z-index: 1;
            display: none;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            background-color: #fff;
            opacity: 0.8;
            -moz-opacity: 0.8;
            filter: alpha(opacity=80);
            -khtml-opacity: 0.8;
        }

        /* Determina la capa que aparecera centrada */
        #layerPreviewContent {
            position: absolute;
            z-index: 1;
            display: none;
            background-color: #fff;
            left: 20%;
            width: 60%;
            margin-left: 0px;
            height: 1000px;
            padding: 2px;
            padding-left: 10px;
            border: 7px solid rgb(0, 190, 200);
            border-radius: 25px;
        }
    </style>
    <script type='text/javascript'>
        /**
         * Funcion que muestra las capas
         */
        function layer_show() {
            window.scroll(0, 0);
            // alert("Hola");


            /* Ponemos los atributos de posicion a la capa transparente del fondo */
            $('#layerPreview').attr("style", "top:0px; height:" + $(document).height() + "px; width:" + $(window).width() + "px; display:inline;margin:auto;");

            /* Buscamos la posicion superior de la capa que aparece centrada.
               La anchura y la posicion centrada se establece en el estilo
            var posTop=(($(window).height())-(200))+$(document).scrollTop();
            if(posTop<0)
            	posTop=0;
            $('#layerPreviewContent').attr("style", "top:"+posTop+"px;");
            /* Indicamos que se muestre la capa */
            $('#layerPreviewContent').show(600);
            document.getElementById("image_submit_fake").style.display = "none";
            document.getElementById("image_submit").style.display = "inline";

        }

        /**
         * Funcion que esconde las capas
         */
        function layer_close() {
            if (document.getElementById("terminos").checked == true && document.getElementById("protocolo").checked == true && document.getElementById("consentimiento").checked == true) {
                $('#layerPreviewContent').hide(300);
                $('#layerPreview').hide();
            } else {
                alert("Debes aceptar los Términos y Condiciones, Protocolo de Bioseguridad y Consentimiento Informado")
            }
        }
    </script>
</head>

<body style="color:rgba(0,0,0,0.5)">


    <!-- En el momento que se pulse sobre la capa transparente se cerrara -->
    <div id="layerPreview"></div>
    <div id='layerPreviewContent'>
        <!-- Mostramos el texto de cerrar para poder cerrar la ventana -->
        <div style='width:100%;text-align:right;border-bottom:1px solid;margin:auto'>
            <!--<span onclick="layer_close();" style='cursor:pointer;padding-right:5px;'>cerrar</span>-->
        </div>
        <embed src="TERMINOS.pdf" type="application/pdf" width="90%" height="200px" style="padding:1%;margin:auto;border:3px solid rgb(215,0,20);border-radius:25px;" />
        <embed src="PROTOCOLO.pdf" type="application/pdf" width="90%" height="200px" style="padding:1%;margin:auto;border:3px solid rgb(215,0,20);border-radius:25px;" />
        <embed src="CONSENTIMIENTO_INFORMADO.pdf" type="application/pdf" width="90%" height="200px" style="padding:1%;margin:auto;border:3px solid rgb(215,0,20);border-radius:25px;" />

        <div class="datos">
            <p><input type='checkbox' id="terminos" required> Acepto los Términos y Condicones.</p>
            <p><input type="checkbox" id="protocolo" required> Acepto el Protocolo de Bioseguridad.</p>
            <p><input type="checkbox" required id="consentimiento"> Acepto el Consentimiento Informado Escuela de Vida.</p>

        </div>
        <div style="text-align:center">
            <input type="image" src="../img/CONTINUAR.png" align="center" onclick="layer_close()" width="140" heigth="60">
        </div>
    </div>


    <img src="../img/formu.png" align="center" class='img_consulta'>

    <!-- <h1 class='form-title'> Formulario de Registro </h1>-->
    <div class='contenedor-form'>


        <form name="globe" action="pruebaregistro.php" method="post" class="form-register" enctype="multipart/form-data" onLoad="CambiarFormulario();">
            <!-- Agencia -->
            <h3>Agencia</h3>

            <select name="agencia" id="agencia" onChange="agregarOpciones(this.form)" class="mitad" required>
                <option value="">Selecciona tu agencia</option>
                <option value="GARZON">GARZON</option>
                <option value="GUADALUPE">GUADALUPE</option>
                <option value="AGRADO">EL AGRADO</option>
                <option value="PITAL">EL PITAL</option>
                <option value="PITALITO">PITALITO</option>
                <option value="TARQUI">TARQUI</option>
                <option value="SUAZA">SUAZA</option>
                <option value="ARGENTINA">LA ARGENTINA</option>
                <option value="RIVERA">RIVERA</option>
                <option value="PLATA">LA PLATA</option>
            </select>

            <h3> Tus Datos </h3>
            <!--Nombre-->
            <label for="" class="mitad"> <span>Nombre</span> <input type="text" class="input" name='nombre' required maxlength="30" minlength="5" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> </label>
            <!--Apellido-->
            <label for="" class="mitad"> <span>Apellido</span> <input type="text" name='apellido' class="input" required maxlength="30" minlength="5" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> </label>
            <!-- Tipo de Documento -->

            <select name="tipo_id" class="mitad" maxlength="30" required id=tipo_di>
                <option class="documento" value="">TIPO DE DOCUMENTO</option>
                <option value="REGISTRO CIVIL">REGISTRO CIVIL </option>
                <option value="TARJETA DE IDENTIDAD">TARJETA DE IDENTIDAD</option>
                <!-- <option value="CEDULA DE CIUDADANIA">CEDULA DE CIUDADANIA</option>-->
            </select>

            <!-- N° de Documento -->
            <label for="" class="mitad"> <span>N° de documento</span> <input type="number" name='ide' required maxlength="20"> </label>
            <!-- Archivo de DI -->
            <label for="adjunto_ide" class="total"> &nbsp; &nbsp; &nbsp; &nbsp; Adjuntar Documento
                <input type="file" id="btn_enviar" name="adjunto_ide" accept=".pdf" required class="adjuntar" onchange='showFileSize();'>
            </label>
            <!-- Sexo -->

            <select class="m_33" name="sexo" id="sexo" required>
                <option selected disable value="">SEXO </option>
                <option value="FEMENINO">FEMENINO</option>
                <option value="MASCULINO">MASCULINO</option>
            </select>

            <!-- IE-->
            <label for="" class="m_70" id="IE1"><span>Institución Educativa</span>
                <input type="text" name="IE1" class="total" id='IE1' maxlength="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>

            <select name="IE2" class="m_33" id="IE2" style="display:none;">
                <!-- Colegios Garzon -->
                <?php



                while ($row = mysqli_fetch_array($colegio)) {
                    echo "<option>" . $row['colegio'] . "</option>";
                }
                ?>
            </select>

            <select name="grado" class="m_33" class="m_33" id="grado" style="display:none;">
                <option value=""> GRADO </option>
                <option value="1"> 1 </option>
                <option value="2"> 2 </option>
                <option value="3"> 3 </option>
                <option value="4"> 4 </option>
                <option value="5"> 5 </option>
                <option value="6"> 6 </option>
                <option value="7"> 7 </option>
                <option value="8"> 8 </option>
                <option value="9"> 9 </option>
                <option value="10"> 10 </option>
                <option value="11"> 11 </option>
                <option value="00"> NA </option>
            </select>


            <!-- E.P.S -->
            <label for="" class="total"><span>E.P.S.</span> <input type="text" name="EPS" id="EPS" required maxlength="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>


            <!-- Archivo EPS -->
            <label for="adjunto_eps" class="total"> &nbsp; &nbsp; &nbsp; &nbsp; Adjuntar Certificación de E.P.S.
                <input type="file" id="btn_enviar1" name="adjunto_eps" accept=".pdf" required class="adjuntar" onchange='showFileSize1();'>
            </label>

            <!--Fecha de Nacimiento -->
            <label class="mitad" style="display:inline-block;"> &nbsp; &nbsp; &nbsp; &nbsp;FECHA DE NACIMIENTO
                <!--  <input type="date" name="fecha_nac" required> -->
                <br> &nbsp; &nbsp;
                <select name="mes" required id="mes">
                    <option value=""> MES </option>
                    <option value="1"> 01 </option>
                    <option value="2"> 02 </option>
                    <option value="3"> 03 </option>
                    <option value="4"> 04 </option>
                    <option value="5"> 05 </option>
                    <option value="6"> 06 </option>
                    <option value="7"> 07 </option>
                    <option value="8"> 08 </option>
                    <option value="9"> 09 </option>
                    <option value="10"> 10 </option>
                    <option value="11"> 11 </option>
                    <option value="12"> 12 </option>
                </select>
                <select name="dia" required id="dia">
                    <option value=""> DIA </option>
                    <option value="1"> 1 </option>
                    <option value="3"> 2 </option>
                    <option value="4"> 3 </option>
                    <option value="4"> 4 </option>
                    <option value="5"> 5 </option>
                    <option value="6"> 6 </option>
                    <option value="7"> 7 </option>
                    <option value="8"> 8 </option>
                    <option value="9"> 9 </option>
                    <option value="10"> 10 </option>
                    <option value="11"> 11 </option>
                    <option value="12"> 12 </option>
                    <option value="13"> 13 </option>
                    <option value="14"> 14 </option>
                    <option value="15"> 15 </option>
                    <option value="16"> 16 </option>
                    <option value="17"> 17 </option>
                    <option value="18"> 18 </option>
                    <option value="19"> 19 </option>
                    <option value="20"> 20 </option>
                    <option value="21"> 21 </option>
                    <option value="22"> 22 </option>
                    <option value="23"> 23 </option>
                    <option value="24"> 24 </option>
                    <option value="25"> 25 </option>
                    <option value="26"> 26 </option>
                    <option value="27"> 27 </option>
                    <option value="28"> 28 </option>
                    <option value="29"> 29 </option>
                    <option value="30"> 30 </option>
                    <option value="31"> 31 </option>
                </select>
                <select name="anio" id="anio" required onChange="modalidads(this.value);">
                    <option id="" value="" name=""> AÑO </option>
                    <!-- <option id="2001" name="2001" value="2001">	2001	</option>-->
                    <!--<option id="2002" name="2002" value="2002">	2002	</option>
                    <option id="2003" name="2003" value="2003">	2003	</option>
                    <option id="2004" name="2004" value="2004">	2004	</option>-->
                    <option id="2005" name="2005" value="2005"> 2005 </option>
                    <option id="2006" name="2006" value="2006"> 2006 </option>
                    <option id="2007" name="2007" value="2007"> 2007 </option>
                    <option id="2008" name="2008" value="2008"> 2008 </option>
                    <option id="2009" name="2009" value="2009"> 2009 </option>
                    <option id="2010" name="2010" value="2010"> 2010 </option>
                    <option id="2011" name="2011" value="2011"> 2011 </option>
                    <option id="2012" name="2012" value="2012"> 2012 </option>
                    <option id="2013" name="2013" value="2013"> 2013 </option>
                    <option id="2014" name="2014" value="2014"> 2014 </option>
                    <option id="2015" name="2015" value="2015"> 2015 </option>
                    <option id="2016" name="2016" value="2016"> 2016 </option>
                </select>
            </label>
            <!-- Edad -->
            <label id="edad" style="display:none;width:48%;" class="mitad">.
                <input type="text" readonly id="edad1" style="text-align:center;">
            </label>
            <!-- Datos Generales -->
            <h3> Modalidad </h3>

            <!-- Modalidad -->
            <label for="modalidad" class="mitad" id="modalidads" style="display:block;">
                <select name="modalidad" id="modalidad" onChange="agregarOpciones1(this.form)" style="display:block;" required>
                    <option value=""> MODALIDAD </option>
                </select>
            </label>
            <!-- Categoría -->
            <!-- Musica: Solo se muestra si la modalidad es musica o danza: Se da en funcion de la edad y los grupos creados por coord. musica -->
            <label for="" style="display:none;" id="musica">
                <div style="display:block;">

                    <span style="width:100%;margin:auto;text-align:center;color:black;">Tu categoría es:</span>

                    <br> <br>
                    <input type="text" name="categoria_m" id="categoria_m" readonly style="padding:0;width:100%;margin:0px;font-family:'Metropolis';text-align:center;color:rgb(215,0,20);">
                    <br> <br>
                    <!--<span style="width:100%;margin:auto;text-align:center;color:black;">Quiero que mis clases sean de forma:</span>
                   <br> <br>
                   <div style="margin:auto;text-align:center;">
                         <fieldset id="tipo_modalidad_m" style="border:none;"  >
                        <table>
                            <tr>
                                <td><h4 id="Presencial_m">Presencial</h4>
                                    <input type="radio" name="tipo_modalidad_m"  id="pm"  value="PRESENCIAL"></td>
                                <td><h4 id="Virtual_m">Virtual</h4>
                                    <input type="radio" name="tipo_modalidad_m"  id="vm"   value="VIRTUAL"></td>
                            </tr>
                        </table>
                        </fieldset> 
                   </div>-->
                </div>
                <span id="aprender" style="width:100%;margin:auto;text-align:center;color:black;">Quiero aprender:</span>
                <br> <br>
                <div id="instrumentos" style="display:none;margin:auto;text-align:center;">

                    <select name="instrumento" id="instrumento" onChange="antiguo1()">
                        <option value="">Selecciona Instrumento</option>
                        <option value="ESTIMULACION" id="ESTIMULACION"> ESTIMULACION </option>
                        <option value="TECLADO" id="TECLADO"> TECLADO </option>
                        <option value="GUITARRA" id="GUITARRA"> GUITARRA </option>
                        <option style="display:none" value="ESTUDIANTINA" id="ESTUDIANTINA"> ESTUDIANTINA </option>
                    </select>
                </div>
                <!--
<p id="mensaje_estimulacion_musica" style="font-size:20px; text-align:center">Horarios Disponibles: Martes 4:00 p.m. y Sábados 11 a.m. <br> Mayor información: 3123167225</p>
<br>-->
                <div id="musica1" class="musica1" style="display:none;margin:auto;text-align:center;">
                    <fieldset id="antiguo" class="musica1">
                        <table>
                            <tr>
                                <!--<td><h4 id="antiguo_rb">Antiguo</h4>-->
                                <input type="radio" name="si" id="si" style="display:none" onclick='checkRadio(name)' onChange="INT()" selected></td>
                                <!-- <td><h4 id="nuevo_rb">Nuevo</h4> -->
                                <input type="radio" name="no" id="no" style="display:none" onclick='checkRadio(name)' onChange="INT()"></td>
                            </tr>
                        </table>




                    </fieldset>
                </div>
                <br>

                <div id="mensaje_antiguo" style="text-align:center;display:none;">
                    <p id="mensaje_general_musica">Comunícate con nosotros y conoce tu horario - 3123167225</p>
                    <p id="mensaje_estimulacion_musica">Horarios Disponibles: Martes 4:00 p.m. y Sábados 11 a.m. <br> Mayor información: 3123167225</p>
                </div>


                <div id="mensaje_nuevo" style="display:none;">

                    <?php
                    $horario = mysqli_query($conexion, "SELECT * from horario_musica");
                    $num = 0;

                    while ($row = mysqli_fetch_array($horario)) {
                        $Instrumento = $row['instrumento'];
                        $Categoria   = $row['categoria'];
                        $Desde       = $row['desde'];
                        $Hasta       = $row['hasta'];
                        $Cupos_Disp  = $row['cupos_disponibles'];
                        $Cupos_Tota  = $row['cupos_totales'];
                    }
                    $num++;

                    ?>
                    <!--   <div for="" style="display:none;margin:auto;text-align:center;" id="guitarra_nuevos" class="musi"> 
                <h3> Horario Disponible </h3>
                <select name="T1" id="horario_t" style="margin:auto;text-align:center;">
                <?php /*Horarios("TECLADO","",$conexion) */ ?>
                </select>
                </div>

                <div for="" style="display:none;margin:auto;text-align:center;" id="teclado_nuevos" class="musi"> 
                <h3> Horario Disponible </h3>
                <select name="G1" id="horario_g" style="margin:auto;text-align:center;">
                <?php /*Horarios("GUITARRA","",$conexion)  */ ?>
                </select>
                </div>
-->


                </div>

                <input type="text" name="codigo" id="codigo" placeholder="Ingresa tu código" style="display:none;border:1px solid rgb(120,0,20);margin:auto;text-align:center;">
                <br>


            </label> <!-- Cierra label de musica -->

            <!-- Danza: Solo se muestra si la modalidad es musica o danza: Se da en funcion de la edad y los grupos creados por coord. musica -->
            <label for="" style="display:none;" id="danza">
                <div style="display:block;">
                    <span style="width:100%;margin:auto;text-align:center;color:black;">Tu categoría es:</span>
                    <br> <br>
                    <input type="text" name="categoria_d" id="categoria_d" readonly style="padding:0;width:100%;margin:0px;font-family:'Metropolis';text-align:center;color:rgb(215,0,20);">

                    <!--<span style="width:100%;margin:auto;text-align:center;color:black;">Quiero que mis clases sean de forma:</span>
                   <br> <br>
                   <div style="margin:auto;text-align:center;">
                         <fieldset id="tipo_modalidad_d" style="border:none;"  >
                        <table>
                            <tr>
                                <td><h4 id="Presencial_d">Presencial</h4>
                                    <input type="radio" name="tipo_modalidad_d"  id="pd"  value="PRESENCIAL"></td>
                                <td><h4 id="Virtual_d">Virtual</h4>
                                    <input type="radio" name="tipo_modalidad_d"  id="vd"   value="VIRTUAL"></td>
                            </tr>
                        </table>
                        </fieldset> 
                   </div>-->

                    <div id="d_horario" style="display:block;">


                        <?php
                        function Horarios_d($categoria, $conexion)
                        {
                            $horario = mysqli_query($conexion, "SELECT * FROM horario_danza WHERE  categoria LIKE '%$categoria%'");
                            // echo "<option value=''></option>";
                            while ($row = mysqli_fetch_array($horario)) {
                                $dia1 = substr($row['desde'], 0, 1);
                                if ($dia1 == "l") {
                                    $DIA1 = "Lunes";
                                } elseif ($dia1 == "m") {
                                    $DIA1 = "Martes";
                                } elseif ($dia1 == "c") {
                                    $DIA1 = "Miercoles";
                                } elseif ($dia1 == "j") {
                                    $DIA1 = "Jueves";
                                } elseif ($dia1 == "v") {
                                    $DIA1 = "Viernes";
                                } elseif ($dia1 == "s") {
                                    $DIA1 = "Sabado";
                                }
                                $DIA1;

                                $desde1 = substr($row['desde'], 1, 2);
                                if ($desde1 > 12) {
                                    $desde1 = $desde1 - 12;
                                }
                                $hasta1 = substr($row['desde'], 3, 2);
                                if ($hasta1 > 12) {
                                    $hasta1 = $hasta1 - 12;
                                }
                                echo  $media1 = substr($row['desde'], 5, 1);
                                if ($media1 == 5) {
                                    $desde1 = $desde1 . ":30";
                                    $hasta1 = $hasta1 . ":30";
                                }

                                //************************************* */        
                                $dia2 = substr($row['hasta'], 0, 1);
                                if ($dia2 == "l") {
                                    $DIA2 = "Lunes";
                                } elseif ($dia2 == "m") {
                                    $DIA2 = "Martes";
                                } elseif ($dia2 == "c") {
                                    $DIA2 = "Miercoles";
                                } elseif ($dia2 == "j") {
                                    $DIA2 = "Jueves";
                                } elseif ($dia2 == "v") {
                                    $DIA2 = "Viernes";
                                } elseif ($dia2 == "s") {
                                    $DIA2 = "Sabado";
                                }
                                $DIA2;


                                $desde2 = substr($row['hasta'], 1, 2);
                                if ($desde2 > 12) {
                                    $desde2 = $desde2 - 12;
                                }
                                $hasta2 = substr($row['hasta'], 3, 2);
                                if ($hasta2 > 12) {
                                    $hasta2 = $hasta2 - 12;
                                }
                                echo  $media2 = substr($row['hasta'], 5, 1);
                                if ($media2 == 5) {
                                    $hasta2 = $hasta2 . ":30";
                                    $desde2 = $desde2 . ":30";
                                }
                                if ($row['categoria'] == 'ESTIMULACION_D') {
                                    $valor = "ESTIMULACIÓN";
                                    echo "<option style='display:none;' id=" . $row['categoria'] . " value=" . substr($row['categoria'], 0, 1) . "_" . $row['desde'] . "_" . $row['hasta'] . ">" . $valor . " " . $DIA1 . " de " . $desde1 . " a " . $hasta1 . " y " . $DIA2 . " de " . $desde2 . " a " . $hasta2 . "</option>";
                                } elseif ($row['categoria'] == 'GRUPO MANANA') {
                                    $valor = "GRUPO MAÑANA";
                                    echo "<option style='display:none;' id=" . $row['categoria'] . " value=" . substr($row['categoria'], 0, 1) . "_" . $row['desde'] . "_" . $row['hasta'] . ">" . $valor . " " . $DIA1 . " de " . $desde1 . " a " . $hasta1 . " y " . $DIA2 . " de " . $desde2 . " a " . $hasta2 . "</option>";
                                } else {
                                    echo "<option style='display:none;' id=" . $row['categoria'] . " value=" . substr($row['categoria'], 0, 1) . "_" . $row['desde'] . "_" . $row['hasta'] . ">" . $row['categoria'] . " " . $DIA1 . " de " . $desde1 . " a " . $hasta1 . " y " . $DIA2 . " de " . $desde2 . " a " . $hasta2 . "</option>";
                                }
                            }
                        }
                        $num++;     ?>
                    </div>
                    <div for="" style="display:block;width:100%;" id="danza" class="dan">
                        <!--<h3> Horario Disponible </h3> -->
                        <select name="horario_d" id="horario_d" style="display:none">
                            <option value=""></option> -->
                            <?php Horarios_d("ESTIMULACION_D", $conexion)  ?>
                            <?php Horarios_d("JUNIOR", $conexion)  ?>
                            <?php Horarios_d("INFANTIL", $conexion)  ?>
                            <?php Horarios_d("JUVENIL", $conexion)  ?>
                            <?php Horarios_d("GRUPO", $conexion)  ?>
                        </select>
                    </div>

                </div>
            </label>
            <!-- Futbol: Solo se muestra si la modalidad es futbol o baloncesto: Se determinar por edad -->
            <label for="" style="display:none;" id="futbol">
                <div style="display:block;">
                    <span style="width:100%;margin:auto;text-align:center;color:black;">Tu categoría es:</span>
                    <br>
                    <input type="text" name="categoria_f" id="categoria_f" readonly style="font-family:'Metropolis';text-align:center;color:rgb(215,0,20);">
                    <select name="jornada" id="jornada" style="display:none">
                        <option value="">Selecciona Jornada</option>
                        <option value="Manana">Mañana</option>
                        <option value="Tarde" selected>Tarde</option>
                    </select>
                </div>
            </label>

            <!-- Baloncesto: Solo se muestra si la modalidad es futbol o baloncesto: Se determinar por edad -->
            <label for="" style="display:none;" id="baloncesto">

                <div style="display:block;">

                    <span style="width:100%;margin:auto;text-align:center;color:black;">Tu categoría es:</span>
                    <br>
                    <input type="text" name="categoria_b" id="categoria_b" readonly style="font-family:'Metropolis';text-align:center;color:rgb(215,0,20);">
                </div>
            </label>

            <!-- Datos de Cupos-->
            <div class="cupos">
                <?php
                include('../conn.php');
                if (!$conexion) {
                    // echo 'Error al conectarse';
                } else {
                    // echo 'Conectado';
                }


                /* EXTRAS CATEGORIAS EXTRAS  OJO*/

                // MUSICA



                function cupos_musica($categoria, $activo, $fecha, $instrumento, $conexion)
                {

                    if ($categoria == "ESTIMULACION") {
                        $valor = "SELECT COUNT(*)AS NUM FROM usuarios WHERE categoria LIKE '%ESTIMULACION%' AND modalidad='MUSICA' AND retirado='activo'";
                        $ejecutar = mysqli_query($conexion, $valor);

                        $row = mysqli_fetch_array($ejecutar);
                        //"cuantos hay: ";
                        $N1 = $row['NUM'];


                        $CT_PRES = "SELECT * FROM cat_musica WHERE categoria LIKE '$categoria'";
                        $ejecutar = mysqli_query($conexion, $CT_PRES);

                        $row6 = mysqli_fetch_array($ejecutar);
                        $N2 = $row6[4];

                        $cupos_DIS = $N2 - $N1;

                        $cupos = "UPDATE cat_musica SET cupos_disponibles='$cupos_DIS'   WHERE categoria LIKE '%$categoria%' ";
                        mysqli_query($conexion, $cupos);
                    } else if ($categoria == "ESTIMULACION") {
                        $valor = "SELECT COUNT(*)AS NUM FROM usuarios WHERE categoria LIKE '%ESTIMULACION%' AND modalidad='MUSICA' AND retirado='$activo'  ";
                        $ejecutar = mysqli_query($conexion, $valor);

                        $row = mysqli_fetch_array($ejecutar);
                        // "cuantos hay: ";
                        $N1 = $row['NUM'];


                        $CT_PRES = "SELECT * FROM cat_musica WHERE categoria LIKE '$categoria'";
                        $ejecutar = mysqli_query($conexion, $CT_PRES);

                        $row6 = mysqli_fetch_array($ejecutar);
                        $N2 = $row6[4];

                        $cupos_DIS = $N2 - $N1;

                        $cupos = "UPDATE cat_musica SET cupos_disponibles='$cupos_DIS'   WHERE categoria LIKE '%$categoria%' ";
                        mysqli_query($conexion, $cupos);
                    } else
                    //cupos_musica("ANTIGUO","ACTIVO","2021","GUITARRA",$conexion);
                    {

                        $valor = "SELECT COUNT(*)AS NUM FROM usuarios WHERE categoria LIKE '%$instrumento%' AND retirado='$activo'";

                        $ejecutar = mysqli_query($conexion, $valor);

                        $row = mysqli_fetch_array($ejecutar);
                        // echo  "cuantos hay: ";
                        $N1 = $row['NUM'];


                        $CT_PRES = "SELECT * FROM cat_musica WHERE instrumento LIKE '%$instrumento%'";
                        $ejecutar = mysqli_query($conexion, $CT_PRES);

                        $row6 = mysqli_fetch_array($ejecutar);
                        $N2 = $row6[4];

                        $cupos_DIS = $N2 - $N1;

                        $cupos = "UPDATE cat_musica SET cupos_disponibles='$cupos_DIS'   WHERE  instrumento LIKE '%$instrumento%'";
                        mysqli_query($conexion, $cupos);
                    }
                }

                //Futbol
                function cupos_futbol($categoria, $activo, $fecha, $jornada, $conexion)
                {

                    $valorf = "SELECT COUNT(*)AS NUM FROM usuarios WHERE categoria='$categoria' AND retirado='$activo' and modalidad='FUTBOL' and agencia='GARZON' AND jornada='$jornada'";/* AND fecha LIKE '%$fecha%'"; /* Pendiente agregar los cupos segun la jornada */
                    $ejecutar = mysqli_query($conexion, $valorf);

                    $rowf = mysqli_fetch_array($ejecutar);
                    //"cuantos hay: ";
                    $N1f = $rowf['NUM'];



                    $CT_PRESf = "SELECT * FROM categoria WHERE variante='$categoria' AND jornada='$jornada' ";
                    $ejecutar1 = mysqli_query($conexion, $CT_PRESf);

                    $row6f = mysqli_fetch_array($ejecutar1);
                    $N2f = $row6f[4];

                    $cupos_DISf = $N2f - $N1f;

                    $cupos = "UPDATE categoria SET cupos_disponibles='$cupos_DISf'   WHERE variante='$categoria'AND jornada='$jornada' ";
                    mysqli_query($conexion, $cupos);
                }


                cupos_futbol("PRESAMI", "ACTIVO", "2020", "Manana", $conexion);
                cupos_futbol("SAMI", "ACTIVO", "2020", "Manana", $conexion);
                cupos_futbol("INFANTIL", "ACTIVO", "2020", "Manana", $conexion);
                cupos_futbol("PREINFANTIL", "ACTIVO", "2020", "Manana", $conexion);
                cupos_futbol("PREJUVENIL", "ACTIVO", "2020", "Manana", $conexion);
                cupos_futbol("GORRION", "ACTIVO", "2020", "Manana", $conexion);


                cupos_futbol("PRESAMI A", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("SAMI A", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("INFANTIL A", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("PREINFANTIL A", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("PREJUVENIL A", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("GORRION A", "ACTIVO", "2020", "Tarde", $conexion);

                cupos_futbol("PRESAMI B", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("SAMI B", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("INFANTIL B", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("PREINFANTIL B", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("PREJUVENIL B", "ACTIVO", "2020", "Tarde", $conexion);
                cupos_futbol("GORRION B", "ACTIVO", "2020", "Tarde", $conexion);



                $TABLA_G = "SELECT * FROM categoria WHERE jornada='Tarde'"; //se realiza filtro a jornada de la tarde para registrar durante pandemia
                $ejecuta = mysqli_query($conexion, $TABLA_G);
                ?>

                <table class="tabla_cupos" id="cupos" name="cupos" style="display:none;" class="tabla_bienvenido" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <thead>
                        <tr>
                            <th colspan="5" style="text-align:center;">
                                <h3>Cupos Disponibles Fútbol</h3>
                            </th>
                        </tr>
                    </thead>
                    <thead>

                        <tr>
                            <th class="tabla_azul" style="border-top-left-radius: 20px;">MODALIDAD</th>
                            <th class="tabla_azul">CATEGORÍA</th>
                            <!-- <th class="tabla_azul">JORNADA</th> se omite mientras se trabaja en pandemia-->
                            <th class="tabla_azul">CUPOS TOTALES</th>
                            <th class="tabla_azul" style="border-top-right-radius: 20px;">CUPOS DISPONIBLES</th>
                        </tr>
                    </thead>
                    <tr>
                        <?php
                        while ($row = mysqli_fetch_array($ejecuta)) {
                            echo "<tr>";

                            echo "<td align='center' class='tabla_texto'>" . $row['modalidad'] . "</td>";
                            echo "<td align='left'   class='tabla_texto'>" . $row['variante'] . "</td>";
                            if ($row['jornada'] == "Manana") {
                                //    echo "<td align='left'   class='tabla_texto'>Mañana</td>";    
                            } else {
                                //  echo "<td align='left'   class='tabla_texto'>".$row['jornada']."</td>";    
                            }

                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_totales'] . "</td>";
                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_disponibles'] . "</td>";
                            echo "</tr>";
                        }
                        ?>

                    </tr>
                </table>

                <?php
                function categoria_musica($categoria, $instrumento, $antiguo, $conexion)
                {

                    if ($categoria == "ESTIMULACION" || $categoria == "ESTIMULACION") {
                        $TABLA_G = "SELECT * FROM cat_musica  WHERE categoria='$categoria' ";
                        $ejecuta = mysqli_query($conexion, $TABLA_G);

                        while ($row = mysqli_fetch_array($ejecuta)) {
                            echo "<tr>";

                            echo "<td align='center' class='tabla_texto'>" . $row['modalidad'] . "</td>";
                            echo "<td align='left'   class='tabla_texto'>" . $row['categoria'] . "</td>";
                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_totales'] . "</td>";
                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_disponibles'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        $TABLA_G = "SELECT * FROM cat_musica  WHERE instrumento='$instrumento'  ";
                        $ejecuta = mysqli_query($conexion, $TABLA_G);

                        while ($row = mysqli_fetch_array($ejecuta)) {
                            echo "<tr>";

                            echo "<td align='center' class='tabla_texto'>" . $row['modalidad'] . "</td>";
                            echo "<td  class='tabla_texto'  align='left'>" . $row['categoria'] . "</td>";
                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_totales'] . "</td>";
                            echo "<td align='center' class='tabla_texto'>" . $row['cupos_disponibles'] . "</td>";
                            echo "</tr>";
                        }
                    }
                }

                ?>
                <table class="tabla_cupos1" id="cupos1" name="cupos1" style="display:none;" class="tabla_bienvenido" style="border-top-left-radius: 20px;border-top-right-radius: 20px;">
                    <thead>
                        <tr>
                            <th colspan="5" style="text-align:center;">
                                <h3>Cupos Disponibles Música</h3>
                            </th>
                        </tr>
                    </thead>
                    <tr>
                        <th class="tabla_azul" style="border-top-left-radius: 20px;">MODALIDAD</th>
                        <th class="tabla_azul">CATEGORÍA</th>
                        <th class="tabla_azul">CUPOS TOTALES</th>
                        <th class="tabla_azul" style="border-top-right-radius: 20px;">CUPOS DISPONIBLES</th>
                    </tr>
                    </thead>
                    <?php

                    categoria_musica("ESTIMULACION", "", "", $conexion);
                    //categoria_musica("ESTIMULACION II", "" ,"",$conexion );
                    categoria_musica("T", "TECLADO", "", $conexion);
                    categoria_musica("G", "GUITARRA", "", $conexion);

                    ?>
                    <tr>

                    </tr>

                </table>






                <?php
                $TABLA_G = "SELECT * FROM cat_musica ";
                $ejecuta = mysqli_query($conexion, $TABLA_G);
                ?>

                <table class="tabla_cupos" id="cupos1" name="cupos1" style="display:none;">
                    <thead>
                        <th colspan="5" style="text-align:center;">
                            <h3>Cupos Disponibles Música</h3>
                        </th>
                    </thead>


                    <tr>
                        <?php
                        while ($row = mysqli_fetch_array($ejecuta)) {

                            "<tr> ";
                            "<td>" . $row['id'] . "</td>";
                            "<td>" . $row['categoria'] . "</td>";
                            "<td>" . $row['instrumento'] . "</td>";
                            "<td>" . $row['cupos_totales'] . "</td>";
                            "<td>" . $row['cupos_disponibles'] . "</td>";


                            "</tr>";
                        }




                        ?>
                </table>
            </div>

            <!-- Datos del Representante Legal -->
            <h3> Datos del Representante Legal</h3>

            <label for="" class="mitad"><span> Nombre </span><input type="text" name="nombre_rep" id="nombre_rep" class="mitad" required maxlength="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>
            <label for="" class="mitad"><span> Apellido</span><input type="text" name="apellido_rep" id="apellido_rep" class="mitad" required maxlength="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>

            <select class="mitad" name="parentesco" id="parentesco" required>
                <option value="" selected disable> PARENTESCO </option>
                <option value="PADRE">PADRE</option>
                <option value="MADRE">MADRE</option>
                <option value="TIO(A)">TÍO(A)</option>
                <option value="HERMANO(A)">HERMANO(A)</option>
                <option value="ABUELO(A)">ABUELO(A)</option>

            </select>

            <label for="" class="mitad"><span>Nº Identificación </span><input type="number" name="id_rep" id="id_rep" class="mitad" required maxlength="10"></label>
            <label for="" class="mitad"><span>Teléfono </span><input type="number" name="tel" id="tel" class="mitad" required maxlength="15"></label>
            <label for="" class="mitad"><span>Dirección </span><input type="text" name="direccion" id="direccion" class="mitad" maxlength="30" required style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>
            <label for="" class="mitad"><span>Municipio </span><input type="text" name="municipio" id="municipio" class="mitad" required maxlength="30" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>
            <label for="" class="mitad"><span>Email </span><input type="text" name="email" id="email" class="m_70" required maxlength="40" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"></label>
            </label>

            <h3> Condiciones de salud</h3>
            <label for="adjunto_carnet" class="total"> &nbsp; &nbsp; &nbsp; &nbsp; Adjuntar Carné de vacunación.
                <input type="file" id="btn_enviar2" name="adjunto_carnet" accept=".pdf" class="adjuntar" onchange='showFileSize1();'>
            </label>


            <ol>
                <li style="margin-bottom:10px">¿Presentas alguna de las siguientes patologías preexistentes?.</li>
                <select name="preg_1_d" id="preg_1_d" class="mitad" maxlength="30" required onchange="otra2()">
                    <option value=""></option>
                    <option value="HIPERTENSION ARTERIAL">Hipertensión arterial</option>
                    <option value="ENFERMEDAD RESPIRATORIA">Enfermedad respiratoria (Asma, bronquitis, enfisema)</option>
                    <option value="OBESIDAD">Obesidad</option>
                    <option value="DIABETES">Diabetes o hipoglicemia no controlada</option>
                    <option value="ANEMIA">Anemia</option>
                    <option value="CANCER">Cáncer</option>
                    <option value="ENF_NEU">Enfermedades neurológicas (Convulsiones, epilepsia)</option>
                    <option value="ENF_CER">Enfermedad cerebrovascular</option>
                    <option value="EFN_INM">Enfermedad inmunodepresora</option>
                    <option value="OTRA">Otra</option>
                    <option value="NO">No presentas ninguna patología preexistente</option>
                </select>
                </br>
                <label for="" class="mitad" id="label_otra" style="display:none">
                    <input type="textbox" id="otra" name="otra" style="display:none;" placeholder="Especifica tu patología" text-align="left">
                </label>
                <li style="margin-bottom:10px">¿En los últimos 14 días has presentado alguno de los siguientes síntomas? </li>
                <select name="preg_2_d" id="preg_2_d" class="mitad" maxlength="30" required>
                    <option value=""></option>
                    <option value="TOS SECA">Tos seca</option>
                    <option value="FIEBRE">Fiebre</option>
                    <option value="SECRECION NASAL">Secreción Nasal</option>
                    <option value="DOLOR MUSCULAR">Dolor Muscular</option>
                    <option value="PERDIDA DE OLFATO">Pérdida de olfato</option>
                    <option value="PERDIDA DE GUSTO">Pérdida de gusto</option>
                    <option value="NINGUNO">Ninguno</option>
                </select>
                <li style="margin-bottom:10px">¿En los últimos 14 días has establecido contacto con una persona sospechosa o positiva a Covid 19? </li>
                <select name="preg_3_d" id="preg_3_d" class="mitad" maxlength="30" required>
                    <option value=""></option>
                    <option value="SI">Sí</option>
                    <option value="NO">No</option>
                </select>
            </ol>

            <h3> Encuesta</h3>

            <div class="datos" style="border:2px solid red; border-radius:25px; padding:10px;">
                <p style="text-align:justify; font-size:15px; margin:0px; color:rgb(91,93,94);">
                    Estarías interesado en un programa de vacaciones recreativas en el mes de diciembre por un valor aproximado entre 100.000 y 120.000?
                    <br>

                    &nbsp; &nbsp; &nbsp;<input type="radio" name="encuesta" value="SI" checked="checked" required> SI<br>
                    &nbsp; &nbsp; &nbsp;<input type="radio" name="encuesta" value="NO"> NO <br>

                </p>
            </div>
            <div class="datos" style="color:rgba(0,0,0,0.5)">
                <!--  <p class="total"> Lee Términos y Condiciones <strong><a  href="TERMINOS.pdf" target="_blank">aquí</a></strong>.</p>
            <p class="total"> Lee Protocolo de Bioseguridad <strong><a  href="PROTOCOLO.pdf" target="_blank">aquí</a></strong>.</p>
            <p class="total"> Lee Consentimiento Informado Escuela de Vida <strong><a  href="CONSENTIMIENTO.pdf" target="_blank">aquí</a></strong>.</p>-->
                <p><input type="checkbox" required onclick='layer_show();'> Conoce Términos y Condiciones, Protocolos de Bioseguridad, y Consentimiento
                    Informado.</p>
                <p><input type="checkbox" required onclick='continuar();' id="declaro"> Declaro que la información referenciada en el presente formulario de inscripción
                    corresponde a la realidad.</p>

                <p><input type="checkbox" required> Acepto tratamiento de Datos Personales.</p>
                <p><input type="checkbox" required> Acepto utilizacion de Derechos de Imagen.</p>
                &nbsp; &nbsp; &nbsp;<input type="radio" name="dos_ciclos" value="off" checked="checked"> Pagar Cuota 1<br>
                &nbsp; &nbsp; &nbsp;<input type="radio" name="dos_ciclos" value="on"> Pagar Cuota 1 y 2<br>
            </div>
            <!--<div class="contenedor">
                <div class="g-recaptcha" data-sitekey="6LcIGaAUAAAAAB6cQzVdlUpxYRtwo3H4bC-77I8d"></div><br>
            </div>-->

            <div class="contenedor">
                <div class='boton_imagen'>
                    <div style="border:none;z-index:1;width:120px; heigth:70px;display:none;" id="image_submit">
                        <input type="image" name="sub1" src="../img/registrar.png" height="70" width="120" class='boton_imagen' onClick="continuar();" />
                    </div>
                </div>
                <br>
        </form>
        <div style="border:none;width:120px; heigth:70px;">
            <!--id="image_submit_fake">-->
            <input type="image" name="sub2" src="../img/registrar.png" height="70" width="120" class='boton_imagen' onClick="continuar();" /> <!-- onclick='layer_show();' />-->
        </div>

        <!-- En el momento que se pulse sobre la capa transparente se cerrara -->
        <div id="layerPreview"></div>
        <div id='layerPreviewContent'>
            <!-- Mostramos el texto de cerrar para poder cerrar la ventana -->
            <div style='width:100%;text-align:right;border-bottom:1px solid;'><span onclick="layer_close();" style='cursor:pointer;padding-right:5px;'>cerrar</span></div>
            Texto para la capa
        </div>

        <script>
            const inputs = document.querySelectorAll('input'); /* Recorrer todos los inputs :)*/
            inputs.forEach(input => {
                input.onfocus = () => {
                    input.previousElementSibling.classList.add('top');
                    input.previousElementSibling.classList.add('focus');
                    input.parentNode.classList.add('focus');
                }
                input.onblur = () => {
                    input.value = input.value.trim();
                    if (input.value.trim().length == 0) {
                        input.previousElementSibling.classList.remove('top');
                    }
                    input.previousElementSibling.classList.remove('focus');
                    input.parentNode.classList.remove('focus');
                }
            });
        </script>


</body>

</html>