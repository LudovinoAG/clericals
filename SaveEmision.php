<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtOsadia = $_POST['txtOsadia'];
$txtVender = $_POST['txtVendedor'];
$txtCodeVender = $_POST['txtCodeVender'];
$txtCodeVenderCanal = $_POST['txtCodeVenderCanal'];
$txtTipoEmision = $_POST['LstEmisionProducto'];
$txtTracker = $_POST['txtTracker'];
$txtCops = $_POST['txtCops'];
$txtM6 = $_POST['txtM6'];
$txtMAC = $_POST['txtMAC'];
$Team = $_POST['txtTeam'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$Factura = $_POST['LstFactura'];
$EstadoEmision = $_POST['LstRazonEmision'];
$SubRazon = $_POST['LstSubRazonEmision'];
$Direccion = $_POST['LstDireccion'];
$Mensaje = $_POST['LstMensaje'];
$DirCliente = $_POST['txtDirCliente'];
$Pueblo = $_POST['LstPueblos'];
$txtRazonEmision = $_POST['txtRazonEmision'];

//$OrdenCancelada = $_POST['txtOrdenCancelada'];
//$RazonCancelada = $_POST['txtRazonCancelada'];
//$FechaCancelacion = $_POST['txtFechaAutorizacion'];
//$Contacto1 = $_POST['txtContacto1'];
//$Contacto2 = $_POST['txtContacto2'];
//$Comentario = $_POST['txtNotas'];
//$FechaCan = $_POST['txtFechaCancelacion'];
//$MontoDeuda = $_POST['txtMontoDeuda'];
//$PagoRealizado = $_POST['txtPagoRealizado'];
//$BalancePendiente = $_POST['txtBalancePendiente'];
//$FechaPago = $_POST['txtFechaPago'];
//Variables Claro Hogar
//$txtBan = $_POST['txtBan'];
//$txtCliente = $_POST['txtCliente'];
//$txtHogar1 = $_POST['txtContactoHogar1'];
//$txtHogar2 = $_POST['txtContactoHogar2'];
//$txtEmail =  $_POST['txtEmail'];
//$txtDireccionPostal = $_POST['txtDireccionPostal'];
//$txtReferencia = $_POST['txtReferencia'];
//$txtPersonaAutorizada = $_POST['txtPersonaAutorizada'];
//$txtContactoAutorizado = $_POST['txtContactoAutorizado'];
//$txtIdentificacion = $_POST['txtIdentificacion'];
//$txtFechaVenta = $_POST['txtFechaVenta'];




if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	$SqlExiteEmision = "SELECT OSADIA FROM emisiones WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";

	$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	
	//$FEC_CAN = $FechaCan;
	//$FEC_PAGO = $FechaPago;
	//$FEC = $FechaCancelacion;
	//$FECHA_VENTA = $txtFechaVenta;

	//$date=date_create($FEC);
	//$FECHAAUT=date_format($date,'n/j/Y');

	//$date2=date_create($FEC_CAN);
	//$FECHACAN=date_format($date2,'n/j/Y');

	//$date3=date_create($FEC_PAGO);
	//$FECHAPAY=date_format($date3,'n/j/Y');

	//$date4=date_create($FECHA_VENTA);
	//$FECHAVENTA=date_format($date4,'n/j/Y');

	if($ResultadosExiste==0){
		$sql = "INSERT into emisiones SET Estado='$EstadoEmision', Ebill='$Factura', 
		Tarjeta='$txtAgentTarjeta', Representante='$txtAgentName', Tipo='$txtTipoEmision', 
		Vendedor='$txtVender', NoEmpleado='$txtCodeVender', Canal='$txtCodeVenderCanal', 
		NoTracker='$txtTracker', Mac='$txtMAC', COPS='$txtCops', OSADIA='$txtOsadia', 
		M6='$txtM6', Fecha='$FECHA', Hora='$HORA', Direccion='$Direccion', Mensaje='$Mensaje', 
		DirCliente='$DirCliente', TeamLeader='$Team', SubRazon='$SubRazon', Pueblo='$Pueblo', RazonEmision='$txtRazonEmision'";

		echo "Procesando..." . $sql;
		//echo $sql;
		mysqli_query($conexion, $sql) or die ('No ejecutado');
		$Afectado=mysqli_affected_rows($conexion);
		mysqli_close($conexion);

		/*if($Afectado>0){
			
		}else{
			
		}*/
	}

	
}

echo $ResultadosExiste;
?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/emisiones.php";
</script>