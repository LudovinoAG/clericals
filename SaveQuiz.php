<?php
 
$txtOsadia = $_POST['txtOrdenOS'];
$Respuesta1 = $_POST['lstRespuesta1'];
$TextRespuesta1 = $_POST['txtRespuesta1'];
$Respuesta2 = $_POST['lstRespuesta2'];
$TextRespuesta2 = $_POST['txtRespuesta2'];
$Respuesta3 = $_POST['lstRespuesta3'];
$TextRespuesta3 = $_POST['txtRespuesta3'];
$FECHA = date('n/j/Y');


if($conexion = mysqli_connect('localhost','root','123456')){
					
	mysqli_select_db($conexion,"ventas") or die ('no se encuentra la bd');


	$sql = "INSERT into quiz SET OSADIA='$txtOsadia', RespuestaEmail='$Respuesta1', ComentarioEmail='$TextRespuesta1', ClienteFactura='$Respuesta2', ComentarioClienteFactura='$TextRespuesta2', VentajaFactura='$Respuesta3', ComentarioVentaja='$TextRespuesta3', Fecha='$FECHA'";

		echo $sql;
		mysqli_query($conexion, $sql) or die ('No ejecutado');

		mysqli_close($conexion);

		/*if($Afectado>0){
			
		}else{
			
		}*/
	}


?>

<script type="text/javascript">
	location.href = "http://172.17.10.155:81/clericals/emisiones.php";
</script>