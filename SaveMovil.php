<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtDealer = $_POST['txtDealer'];
$txtVenderCode = $_POST['txtCodeVender'];
$txtVendedor = $_POST['txtVendedor'];
$txtTarjeta = $_POST['txtTarjeta'];
$txtTracker = $_POST['txtTracker'];
$LstTipo = $_POST['LstTipo'];
$txtSolucion = $_POST['txtSolucion'];
$LstRazon = $_POST['LstRazon'];
$LstSubRazon = $_POST['LstSubRazon'];
$LstResultado = $_POST['LstResultado'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$ClaveID = $_POST['txtClave'];

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM status WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){
	$sql = "INSERT into movil SET Tarjeta='$txtAgentTarjeta', Representante='$txtAgentName', Dealer='$txtDealer', Numero_Dealer='$txtVenderCode', Nombre_Vendedor='$txtVendedor', Tarjeta_Vendedor='$txtTarjeta', Numero_Referencia='$txtTracker', Tipo_Llamada='$LstTipo', Solucion='$txtSolucion', Fecha='$FECHA', Hora='$HORA', Categoria_Llamada='$LstRazon', SubCategoria_Llamada='$LstSubRazon', Resultado_Llamada='$LstResultado', Contrasena='$ClaveID'";

		mysqli_query($conexion, $sql) or die ('No ejecutado');
		//$Afectado=mysqli_affected_rows($conexion);
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
	location.href = "http://172.17.10.13:81/clericals/movil.php";
</script>