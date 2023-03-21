<?php
  
$Osadia = $_POST['txtOrdenOS'];

if($conexion = mysqli_connect('127.0.0.1','root','123456')){

	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//Validar si el registro existe
	$SQLExiste = "SELECT RegOS FROM registromac Where RegOS='$Osadia' AND Status='Abierto'";
	//$SQLExisteCierre = "SELECT id, Status, RegOS FROM registromac Where RegOS='$Osadia' AND Status='Cerrado'";
	$Existe = mysqli_query($conexion, $SQLExiste) or die ('No ejecutado');
	//$ExisteCierre = mysqli_query($conexion, $SQLExisteCierre) or die ('No ejecutado');
	
	$Resultados=mysqli_num_rows($Existe);
	//$ResultadosCierre=mysqli_num_rows($ExisteCierre);
	
	mysqli_close($conexion);

	echo $Resultados;

}

?>