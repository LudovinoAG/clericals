<?php
   session_start();
   if(isset($_SESSION['Nombre'])){
   	echo '<span id="TitleUsuario"> ('.$_SESSION["Tarjeta"].') '.$_SESSION["Nombre"].'</span> <a class="btn btn-link" href="cerrar.php">Cerrar Sesión</a>';
   }else{
   		header('location: login.php');
   }
?>

<?php

 
$LstSupervisor = $_SESSION["Nombre"];
$FECHA = date('n/j/Y');
$HORA = date('h:i:sa');



if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM emisiones WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	$ID = $_GET['id'];
	//if($ResultadosExiste==0){
$sql = "UPDATE ventasfwa SET Estado='EN ESPERA DE APROBACION', RecibidaPor='$LstSupervisor', HoraRecibida='$HORA' WHERE id='$ID'";
		echo $sql;
		mysqli_query($conexion, $sql) or die ('No ejecutado');
		//$Afectado=mysqli_affected_rows($conexion);
		mysqli_close($conexion);

		/*if($Afectado>0){
			
		}else{
			
		}*/
	//}

}

//echo $ResultadosExiste;
?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/inbound/index.php";
</script>