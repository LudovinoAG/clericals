<?php
  
$Osadia = $_POST['txtOsadia'];
$FECHA = date('n/j/Y');

if($conexion = mysqli_connect('127.0.0.1','root','123456')){

	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//Validar si el registro existe
	$SQLExiste = "SELECT * FROM emisiones Where OSADIA='$Osadia' AND Fecha='$FECHA'";
	//$SQLExisteCierre = "SELECT id, Status, RegOS FROM registromac Where RegOS='$Osadia' AND Status='Cerrado'";
	$Existe = mysqli_query($conexion, $SQLExiste) or die ('No ejecutado');
	//$ExisteCierre = mysqli_query($conexion, $SQLExisteCierre) or die ('No ejecutado');
	
	$Resultados=mysqli_num_rows($Existe);
	//$ResultadosCierre=mysqli_num_rows($ExisteCierre);
	
	mysqli_close($conexion);

	echo $Resultados;

}

?>