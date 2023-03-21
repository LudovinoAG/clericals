<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtOsadia = $_POST['txtOsadia'];
$txtVender = $_POST['txtVendedor'];
$txtCodeVender = $_POST['txtCodeVender'];
$txtCodeVenderCanal = $_POST['txtCodeVenderCanal'];
$txtTracker = $_POST['txtTracker'];
$txtCops = $_POST['txtCops'];
$txtM6 = $_POST['txtM6'];
$txtMACActual = $_POST['txtMACActual'];
$txtMACFinal = $_POST['txtMACFinal'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');

$MotivoLlamada = $_POST['LstEstado'];
$RazonDemora = $_POST['LstTipoEmision'];
$AccionDemora = $_POST['LstAccionDemora'];
$GPON = $_POST['CHKGPON'];
$Notas = $_POST['txtNotas'];
$Cliente = $_POST['txtCliente'];
$Contactos = $_POST['txtContacto1'];
$Contactos2 = $_POST['txtContacto2'];
//$TipoTransferencia = $_POST['LstTipoTransfer'];
$NumContactos = $Contactos . "-" . $Contactos2;
$Pueblo = $_POST['LstPueblos'];
$Retencion = $_POST['LstRetencion'];


if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM demoras WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){

	if ($AccionDemora == 'No Transferido TMK/Si CH' || $AccionDemora == 'Transferido TMK/No CH' ||
	 $AccionDemora == 'No contactado para transferir TMK' || $AccionDemora == 'No desea transferencia') {

		$TransferTMK = 'Si';
	}else{
		$TransferTMK = 'No';
	}

	if($GPON==""){
		$GPON = "No";
	}else{
		$GPON = "Si";
	}

	


	$sql = "INSERT into demoras SET Tarjeta='$txtAgentTarjeta', Representante='$txtAgentName', AccionTomada='$RazonDemora', Tecnico='$txtVender', NoTecnico='$txtCodeVender', Compania='$txtCodeVenderCanal', NoTracker='$txtTracker', MacActual='$txtMACActual', MacFinal='$txtMACFinal', COPS='$txtCops', OSADIA='$txtOsadia', M6='$txtM6', Fecha='$FECHA', Hora='$HORA', Estado='$MotivoLlamada', Notas='$Notas', Cliente='$Cliente', Contactos='$NumContactos', GPON='$GPON', AccionDemora='$AccionDemora', TransferTMK='$TransferTMK', Pueblo='$Pueblo', Retencion='$Retencion'";
	echo $sql;
	$sqlAuditDemora = "INSERT into auditdemora SET OS='$txtOsadia', Cliente='$Cliente', DemoradaPor='$txtAgentName', FechaDemora='$FECHA', Auditada='0'";

		mysqli_query($conexion, $sql) or die ('No ejecutado');
		mysqli_query($conexion, $sqlAuditDemora) or die ('No ejecutado');
		$Afectado=mysqli_affected_rows($conexion);
		mysqli_close($conexion);
		echo "Procesando...";
		if($Afectado>0){
			echo "<script> location.href = 'http://172.17.10.13:81/clericals/demora.php?r=1'; </script>";
		}else{
			echo "<script> location.href = 'http://172.17.10.13:81/clericals/demora.php?r=0'; </script>";
		}
	//}

	
}

//echo $ResultadosExiste;
?>
