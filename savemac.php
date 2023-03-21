<meta charset='utf-8' />
<?php
   session_start();
   if(isset($_SESSION['Nombre'])){
   		echo '<span id="TitleUsuario"> ('.$_SESSION["Tarjeta"].') '.$_SESSION["Nombre"].' </span> <a class="btn btn-link" href="cerrar.php">Cerrar Sesión</a>';
   }else{
   		header('location: login.php');
   }

$UserID = $_SESSION['Tarjeta'];
$UserName = $_SESSION['Nombre'];
$Osadia = $_POST['txtOrdenOS'];
$MacActual = $_POST['txtMacActual'];
$MacFinal = $_POST['txtMacFinal'];
$Cliente = $_POST['txtCliente'];
$Tratamiento = $_POST['LstTrata'];
$Contactos1 = $_POST['txtContactos1'];
$Contactos2 = $_POST['txtContactos2'];
$Status = $_POST['LstStatus'];
$Notas = $_POST['TxtNotas'];
$Intento = $_POST['LstIntento'];
$LstRazon = $_POST['LstRazon'];
$LastUpdate = date('n/j/Y');
$LastUpdateHour = date('h:i:sa');
$LastUser = $UserName;
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');
$Average = date('G');
$Cronometro = $_POST['txtCrono'];
$Canal = $_POST['txtCanal'];
$retencion = $_POST['LstRetencion'];
 

if($conexion = mysqli_connect('127.0.0.1','root','123456')){

	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//Validar si el registro existe
	$SQLExiste = "SELECT id, Status, RegOS FROM registromac Where RegOS='$Osadia' AND Status='Abierto'";
	$SQLExisteCierre = "SELECT RegOS FROM registromac Where RegOS='$Osadia' AND LastUpdate='$FECHA' AND Status='Cerrado' AND Status='Ya esta Cerrado'";
	$Existe = mysqli_query($conexion, $SQLExiste) or die ('No ejecutado Existe');
	$ExisteCierre = mysqli_query($conexion, $SQLExisteCierre) or die ('No ejecutado Existe Cierre');
	
	$Resultados=mysqli_num_rows($Existe);
	$ResultadosCierre=mysqli_num_rows($ExisteCierre);
	
	if($Resultados>0){
		echo "<script> alert('Este numero de orden ya esta en seguimiento [$Osadia] , se te llevara al mismo para que lo puedas actualizar');  </script>";
		echo "<script> location.href = 'http://172.17.10.13:81/clericals/dataseg.php?OS='+$Osadia;  </script>";
		//echo "<script> history.back(1);  </script>";
		exit;	
	}

	if($ResultadosCierre>0){
		echo "<script> alert('Este numero de orden [$Osadia], ya esta cerrado el dia de hoy');  </script>";
		echo "<script> location.href = 'http://172.17.10.13:81/clericals/regmac.php?OS='+$Osadia;  </script>";	
		exit;
	}

	/////////////////////////////////////////////////////////////////////////////
	$Actualizado = 0;
	$sql = "INSERT into registromac SET Razon='$LstRazon', LastUpdate='$LastUpdate', LastUser='$LastUser', LastUpdateHour='$LastUpdateHour', RegTarjeta='$UserID', RegAgente='$UserName', RegOS='$Osadia', RegMacActual='$MacActual', RegMacMover='$MacFinal', Cliente='$Cliente', Tratamientos='$Tratamiento', Contacto1='$Contactos1', Contacto2='$Contactos2', Comentarios='Agregado por $UserName : --- [$FECHA] $Tratamiento. Tratamiento y $Intento. Intento [$HORA]: $Notas', Status='$Status', Fecha='$FECHA', Hora='$HORA', Intentos='$Intento', Canal='$Canal', Retencion='$retencion'";

	$SqlAgregarUpdate = "INSERT into conteomac  SET OS='$Osadia', Cliente='$Cliente', Usuario='$UserName', Actualizado='$Actualizado', Status='$Status', Fecha='$LastUpdate', Hora='$LastUpdateHour', MacActual='$MacActual', MacFinal='$MacFinal', Tratamientos='$Tratamiento', Intentos='$Intento', Comentarios='Agregado por $UserName : --- [$FECHA] $Tratamiento. Tratamiento y $Intento. Intento [$HORA]: $Notas', Razon='$LstRazon', Average='$Average', Canal='$Canal', Retencion='$retencion'";
	$SqlAverage = "INSERT into averagemac SET tarjeta='$UserID', nombre='$UserName', fecha='$FECHA', totalcasos='1', hora='$Average', HoraCaso='$HORA', TiempoTipifica='$Cronometro', OS='$Osadia', canal='$Canal', cliente='$Cliente', macActual='$MacActual', macFinal='$MacFinal', estado='$Status', nota='$Notas', razon='$LstRazon'"; 
	//$LastUserInsert = "INSERT into lastuserinsert SET Usuario='$UserID', OS='$Osadia'";
	//echo $Actualizado = 0;
	//echo $sql;
	mysqli_query($conexion, $SqlAverage) or die ('No ejecutado Average');
	mysqli_query($conexion, $sql) or die ('No ejecutado Normal 2');
	mysqli_query($conexion, $SqlAgregarUpdate) or die ('No ejecutado Agregar Update');

	//mysqli_query($conexion, $LastUserInsert) or die ('No ejecutado');
	
	mysqli_close($conexion);
	echo "Procesando...";
}


?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/regmac.php?rtv=1";
</script>