<?php

 session_start();
 
$ID = $_POST['TxtID'];
$txtAgentName = $_SESSION['Nombre'];
$Resultado = $_POST['LstResultado'];
$Hallazgo = $_POST['txtHallazgo'];
$Comentarios = $_POST['txtComentario'];
$FECHA = date('n/j/Y');


if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteNotas = "SELECT Notas FROM especialdemora WHERE id='$ID'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	//if($ResultadosExiste==0){
		$sql = "UPDATE auditdemora SET AuditadaPor='$txtAgentName', Resultado='$Resultado', FechaAuditoria='$FECHA', Hallazgo='$Hallazgo', Comentarios='$Comentarios' WHERE id='$ID'";

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