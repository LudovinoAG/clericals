<?php

$txtBAN = $_POST['txtBAN'];
$txtSuscriber = $_POST['txtSuscriber'];
$txtNombre = $_POST['txtNombre'];
$LstRazon = $_POST['LstRazon'];
$txtNotas = $_POST['txtNotas'];
$FECHA = date('n/j/Y');

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"ventas") or die ('no se encuentra la bd');

$sql = "INSERT into activadas SET Ban='$txtBAN', Suscritor='$txtSuscriber', Nombre='$txtNombre', Razon='$LstRazon', Comentarios='$txtNotas', Fecha='$FECHA'";

		
		mysqli_query($conexion, $sql) or die ('No ejecutado');
		mysqli_close($conexion);
		echo "Probando...";
		/*if($Afectado>0){
			
		}else{
			
		}*/
	

	
}

?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/activadas.php";
</script>