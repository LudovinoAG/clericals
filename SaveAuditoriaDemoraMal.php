<?php

 session_start();
 
$txtAgentName = $_SESSION['Nombre'];
$FECHA = date('n/j/Y');
$Resultado = 'Mal Demorada';
$ID = $_GET['ID'];

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteNotas = "SELECT Notas FROM especialdemora WHERE id='$ID'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){
	$sql = "UPDATE auditdemora SET AuditadaPor='$txtAgentName', Resultado='$Resultado', FechaAuditoria='$FECHA' WHERE id='$ID'";

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
	location.href = "http://172.17.10.13:81/clericals/AuditoriaDemora.php";
</script>