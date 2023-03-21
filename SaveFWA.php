<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtVender = $_POST['txtVendedor'];
$txtCodeVenderCanal = $_POST['txtCanal'];
$txtTracker = $_POST['txtTracker'];
$lstAprobadoCIVS = $_POST['lstAprobadoCIVS'];
$txtNumAproba = $_POST['txtNumAproba'];
$lstCreditClass = $_POST['lstCreditClass'];
$txtTipoPago = $_POST['txtTipoPago'];
$lstProducto = $_POST['lstProducto'];
$lstContrato = $_POST['lstContrato'];
$txtMonto = $_POST['txtMonto'];
$txtBan = $_POST['txtBan'];
$lstPaquete = $_POST['lstPaquete'];
$txtEquipo = $_POST['lstEquipo'];
$txtCliente = $_POST['txtCliente'];
$txtConfirmacionSpy = $_POST['txtConfirmacionSpy'];
$txtPriceCode = $_POST['txtPriceCode'];
$txtCostoPlan = $_POST['txtCostoPlan'];
$txtTipoPlan = $_POST['txtTipoPlan'];
$txtOsadia = $_POST['txtOsadia'];
$txtidVendedor = $_POST['txtidVendedor'];
$LstPueblos = $_POST['LstPueblos'];
$txtZipCode = $_POST['txtZipCode'];

//Manejo de Variables para contactos
$Contacto1 = $_POST['txtContactoHogar1'];
$Contacto2 = $_POST['txtContactoHogar2'];
$Contactos = $Contacto1 . "-" . $Contacto2;
//****************************************
$txtEmail =  $_POST['txtEmail'];
$DirCliente = $_POST['txtDirCliente'];
$txtDireccionPostal = $_POST['txtDireccionPostal'];
$txtReferencia = $_POST['txtReferencia'];
$txtPersonaAutorizada = $_POST['txtPersonaAutorizada'];
$txtContactoAutorizado = $_POST['txtContactoAutorizado'];
$lstVentaCompletada = $_POST['lstVentaCompletada'];
$txtRazon = $_POST['txtRazon'];
$LstServicio = $_POST['lstServicio'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$ItemCode = "";

if($txtEquipo=='HUAWEI B315s'){
	$ItemCode = "30346H";
}
elseif($txtEquipo=='AVVIO RT 400'){
	$ItemCode = "30647H";
}


if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM emisiones WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";

	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);

	$sql = "INSERT into ventasfwa SET IdAgenteSV='$txtAgentTarjeta', AgenteSV='$txtAgentName', Vendedor='$txtVender', Canal='$txtCodeVenderCanal',
	Tracker='$txtTracker', AprobadoCIVS='$lstAprobadoCIVS', NumAprobaCIVS='$txtNumAproba', CreditClass='$lstCreditClass', TipoPagos='$txtTipoPago',
	Producto='$lstProducto', Contrato='$lstContrato', Monto='$txtMonto', BAN='$txtBan', PaqueteOfertado='$lstPaquete', Equipo='$txtEquipo',
	Cliente='$txtCliente', Contacto1='$Contacto1', Contacto2='$Contacto2', Email='$txtEmail', DireccionFisica='$DirCliente', DireccionPostal='$txtDireccionPostal',
	PuntoReferencia='$txtReferencia', Autorizado='$txtPersonaAutorizada', ContactoAutorizado='$txtContactoAutorizado', StatusVenta='$lstVentaCompletada',
	RazonNoCompleta='$txtRazon', FechaContrato='$FECHA', FechaVenta='$FECHA', Hora='$HORA', ConfirmacionSPPY='$txtConfirmacionSpy', PriceCode='$txtPriceCode',
	CostoPlan='$txtCostoPlan', TipoPlan='$txtTipoPlan', Servicio='$LstServicio', Osadia='$txtOsadia', idVendedor='$txtidVendedor', Pueblo='$LstPueblos', ZipCode='$txtZipCode', ItemCode='$ItemCode'";

	echo $sql;
	mysqli_query($conexion, $sql) or die ('No ejecutado');
		//$Afectado=mysqli_affected_rows($conexion);
	mysqli_close($conexion);

}

?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/fwa.php";
</script>