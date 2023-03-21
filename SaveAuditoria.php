<?php

 session_start();
 
$txtAgentTarjeta = $_POST["txtTarjeta"];
$txtAgentName = $_POST['txtAgente'];
$txtOsadia = $_POST['txtOsadia'];
$txtVender = $_POST['txtVendedor'];
$txtCodeVender = $_POST['txtCodeVender'];
$txtCodeVenderCanal = $_POST['txtCodeVenderCanal'];
$txtTracker = $_POST['txtTracker'];
$txtCops = $_POST['txtCops'];
$txtMAC = $_POST['txtMAC'];

$Direccion = $_POST['LstDireccion'];
$Auditado = "Si";
$Nota = $_POST['txtObservacion'];
$ID= $_POST['TxtID'];


if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');

	
		$sql = "UPDATE emisiones SET Tarjeta='$txtAgentTarjeta', Representante='$txtAgentName', Vendedor='$txtVender', NoEmpleado='$txtCodeVender', Canal='$txtCodeVenderCanal', NoTracker='$txtTracker', Mac='$txtMAC', COPS='$txtCops', OSADIA='$txtOsadia', Direccion='$Direccion', Auditada='$Auditado', Observacion='$Nota' WHERE id='$ID'";
		echo "Procesando...";
		mysqli_query($conexion, $sql) or die ('No ejecutado');
		$Afectado=mysqli_affected_rows($conexion);
		mysqli_close($conexion);

		/*if($Afectado>0){
			
		}else{
			
		}*/

	
}


?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/Auditoria.php";
</script>