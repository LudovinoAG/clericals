<?php

 session_start();
 
$txtAgentTarjeta = $_SESSION["Tarjeta"];
$txtAgentName = $_SESSION['Nombre'];
$txtOsadia = $_POST['txtOsadia'];
$txtBAN = $_POST['txtBan'];
$txtEmail = $_POST['txtEmail'];
$txtfisica = $_POST['txtDireccionFisica'];
$txtpostal = $_POST['txtDireccionPostal'];
$txtreferencia= $_POST['txtReferencia'];
$txtPersonaAutorizada = $_POST['txtPersonaAutorizada'];
$txtContactoAutorizado = $_POST['txtContactoAutorizado'];
$txtCodeVenderCanal = $_POST['txtCodeVenderCanal'];
$txtCliente = $_POST['txtCliente'];
$txtTracker = $_POST['txtTracker'];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$txtContacto1 = $_POST['txtContacto1'];
$txtContacto2 = $_POST['txtContacto2'];



if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM status WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){
		//$sql = "INSERT into clarohogar SET Tarjeta='$txtAgentTarjeta', NombreAgente='$txtAgentName', Canal='$txtCodeVenderCanal', Tracker='$txtTracker', OS='$txtOsadia', Fecha='$FECHA', Hora='$HORA', Cliente='$txtCliente', Contacto1='$txtContacto1', Contacto2='$txtContacto2'";

		$sql = "INSERT into clarohogar SET Tarjeta='$txtAgentTarjeta', NombreAgente='$txtAgentName', Canal='$txtCodeVenderCanal', Tracker='$txtTracker', OS='$txtOsadia', Fecha='$FECHA', Hora='$HORA', Cliente='$txtCliente', Contacto1='$txtContacto1', Contacto2='$txtContacto2', BAN='$txtBAN', Email='$txtEmail', referencia='$txtreferencia', DireccionFisica='$txtfisica', DireccionPostal='$txtpostal', Autorizado='$txtPersonaAutorizada', ContactoAutorizado='$txtContactoAutorizado'";

		echo $sql;
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
	location.href = "http://172.17.10.13:81/clericals/ClaroHogar.php";
</script>