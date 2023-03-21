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
$Intentos = $_POST['LstIntento'];
$Contactos1 = $_POST['txtContactos1'];
$Contactos2 = $_POST['txtContactos2'];
$Status = $_POST['LstStatus'];
$Notas = $_POST['TxtNotas'];
$LastUpdate = date('n/j/Y');
$LastUpdateHour = date('h:i:sa');
$LastUser = $UserName;
$ID = $_POST['TxtID'];
$Actualizado = $_POST['TxtActualizado'];
$Razon = $_POST['LstRazon'];
$Average = date('G');
$HORA = date('h:i:sa');
$Cronometro = $_POST['txtCrono'];
$Canal = $_POST['txtCanal'];
$retencion = $_POST['LstRetencion'];

if($conexion = mysqli_connect('127.0.0.1','root','123456')){

	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');

	$Busqueda = "SELECT Comentarios FROM registromac WHERE id='$ID'";
	$BusquedaResultado = mysqli_query($conexion, $Busqueda) or die ('No ejecutado');
	$Notas2 = mysqli_fetch_row($BusquedaResultado);
	mysqli_close($conexion);

					
}

if($conexion2 = mysqli_connect('127.0.0.1','root','123456')){
	mysqli_select_db($conexion2,"sv") or die ('no se encuentra la bd');

	$ConsultaUsuario = "SELECT * FROM conteomac WHERE OS='$Osadia' AND Usuario='$UserName'";
	$Resultado = mysqli_query($conexion2, $ConsultaUsuario) or die ('No ejecutado');
	$Registros = mysqli_num_rows($Resultado);
	
	if($Status=="Cerrado"){
		$Actualizado = $Actualizado;
	}else{
		$Actualizado = $Actualizado + 1;
	}

	if($Registros>0){
		$sqlUpdate =  "UPDATE conteomac SET Actualizado='$Actualizado', Status='$Status', Fecha='$LastUpdate', Hora='$LastUpdateHour',Cliente='$Cliente', Tratamientos='$Tratamiento', Intentos='$Intentos', MacActual='$MacActual', MacFinal='$MacFinal', Razon='$Razon', Comentarios='$Notas',Average='$Average',Canal='$Canal' WHERE Usuario='$UserName' AND OS='$Osadia'";
		$sql = "UPDATE registromac SET Razon='$Razon', LastUpdate='$LastUpdate', LastUpdateHour='$LastUpdateHour', LastUser='$LastUser', RegOS='$Osadia', RegMacActual='$MacActual', RegMacMover='$MacFinal', Cliente='$Cliente', Tratamientos='$Tratamiento', Contacto1='$Contactos1', Contacto2='$Contactos2', Comentarios='$Notas2[0] ---- Actualizado por $UserName : [$LastUpdate] $Tratamiento. Tratamiento y $Intentos Intento [$LastUpdateHour]:\n $Notas', Status='$Status', Intentos='$Intentos', Canal='$Canal', Retencion='$retencion' WHERE id='$ID'";
		$SqlAverage = "INSERT into averagemac SET tarjeta='$UserID', nombre='$UserName', fecha='$LastUpdate', totalcasos='1', hora='$Average', HoraCaso='$HORA', TiempoTipifica='$Cronometro', OS='$Osadia', canal='$Canal', cliente='$Cliente', macActual='$MacActual', macFinal='$MacFinal', estado='$Status', nota='$Notas', razon='$Razon'";
		mysqli_query($conexion2, $SqlAverage) or die ('No ejecutado Average');
		mysqli_query($conexion2, $sql) or die ('No ejecutado normal');
		mysqli_query($conexion2, $sqlUpdate) or die ('No ejecutado update');
		
	}else{
		$sql = "UPDATE registromac SET Razon='$Razon', LastUpdate='$LastUpdate', LastUpdateHour='$LastUpdateHour', LastUser='$LastUser', RegOS='$Osadia', RegMacActual='$MacActual', RegMacMover='$MacFinal', Cliente='$Cliente', Tratamientos='$Tratamiento', Contacto1='$Contactos1', Contacto2='$Contactos2', Comentarios='$Notas2[0] ---- Actualizado por $UserName : [$LastUpdate] $Tratamiento. Tratamiento y $Intentos Intento [$LastUpdateHour]:\n $Notas', Status='$Status', Intentos='$Intentos', Canal='$Canal', Retencion='$retencion' WHERE id='$ID'";
		$Actualizado = 1;
		$Status = 'Tocado';
		$SqlAgregarUpdate = "INSERT into conteomac  SET OS='$Osadia', Usuario='$UserName', Actualizado='$Actualizado', Status='$Status', Fecha='$LastUpdate', Hora='$LastUpdateHour', MacActual='$MacActual', MacFinal='$MacFinal', Tratamientos='$Tratamiento', Intentos='$Intento', Razon='$Razon', Comentarios='$Notas2[0] ---- Actualizado por $UserName : [$LastUpdate] $Tratamiento. Tratamiento y $Intentos Intento [$LastUpdateHour]:\n $Notas', Cliente='$Cliente', Average='$Average', Canal='$Canal', Retencion='$retencion'";

		$SqlAverage = "INSERT into averagemac SET tarjeta='$UserID', nombre='$UserName', fecha='$LastUpdate', totalcasos='1', hora='$Average', HoraCaso='$HORA', TiempoTipifica='$Cronometro', OS='$Osadia', canal='$Canal', cliente='$Cliente', macActual='$MacActual', macFinal='$MacFinal', estado='$Status', nota='$Notas', razon='$Razon'";

		mysqli_query($conexion2, $SqlAverage) or die ('No ejecutado Average');
		mysqli_query($conexion2, $sql) or die ('No ejecutado Normal');
		mysqli_query($conexion2, $SqlAgregarUpdate) or die ('No ejecutado Update');
		
	}


	
	mysqli_close($conexion2);

	echo "Procesando..";
					
}


?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/mydata.php?rtv=1"
</script>