<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtOsadia = $_POST['txtOsadia'];
$txtVender = $_POST['txtVendedor'];
$txtCodeVender = $_POST['txtCodeVender'];
$txtCodeVenderCanal = $_POST['txtCodeVenderCanal'];
$txtCliente = $_POST['txtCliente'];
$txtTipoSituacion = $_POST['LstSituacion'];
$txtTracker = $_POST['txtTracker'];
$txtCops = $_POST['txtCops'];
$txtM6 = $_POST['txtM6'];
$txtMAC = $_POST['txtMAC'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$EstadoStatus = $_POST['LstEstado'];
$EstadoAccion = $_POST['LstStatus'];
$Notas = $_POST['txtNotas'];
$txtAgentetmk = $_POST['txtAgentetmk'];
$txtContacto1 = $_POST['txtContacto1'];
$txtContacto2 = $_POST['txtContacto2'];
$retencion = $_POST['LstRetencionStatus'];



if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM status WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){
		$sql = "INSERT into status SET Tarjeta='$txtAgentTarjeta', Representante='$txtAgentName', AccionTomada='$EstadoAccion', Tecnico='$txtVender', NoTecnico='$txtCodeVender', Canal='$txtCodeVenderCanal', NoTracker='$txtTracker', Mac='$txtMAC', COPS='$txtCops', OSADIA='$txtOsadia', M6='$txtM6', Fecha='$FECHA', Hora='$HORA', Estado='$EstadoStatus', Notas='$Notas', Situacion='$txtTipoSituacion', Cliente='$txtCliente', Agentetmk='$txtAgentetmk', Contacto1='$txtContacto1', Contacto2='$txtContacto2', Retencion='$retencion'";
		mysqli_query($conexion, $sql) or die ('No ejecutado');
		$Afectado=mysqli_affected_rows($conexion);
		mysqli_close($conexion);
		echo "Procesando...";
		/*if($Afectado>0){
			
		}else{
			
		}*/
	//}

	
}

//echo $ResultadosExiste;
?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/status.php";
</script>