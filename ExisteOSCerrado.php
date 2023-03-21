<?php

session_start();

$Osadia = $_POST['txtOrdenOS'];
$FECHA = date('n/j/Y');
$UserName = $_SESSION['Nombre'];

if($conexion = mysqli_connect('127.0.0.1','root','123456')){

	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//Validar si el registro existe
	$SQLExisteCerrado = "SELECT RegOS FROM registromac Where RegOS='$Osadia' AND Status='Cerrado' AND LastUpdate='$FECHA'";
	$SQLExisteCerrado2 = "SELECT OS FROM conteomac Where OS='$Osadia' AND Status='Ya esta Cerrado' AND Fecha='$FECHA'";
	//$SQLExisteCierre = "SELECT id, Status, RegOS FROM registromac Where RegOS='$Osadia' AND Status='Cerrado'";
	$ExisteCerrado = mysqli_query($conexion, $SQLExisteCerrado) or die ('No ejecutado');
	$ExisteCerrado2 = mysqli_query($conexion, $SQLExisteCerrado2) or die ('No ejecutado');
	$ResultadoCerrado=mysqli_num_rows($ExisteCerrado);
	$ResultadoCerrado2=mysqli_num_rows($ExisteCerrado2);
	//$ResultadosCierre=mysqli_num_rows($ExisteCierre);

	if($ResultadoCerrado==0){
		echo $ResultadoCerrado;
	}else{
		$SQL = "INSERT into existecerrado SET OS='$Osadia', Usuario='$UserName', Fecha='$FECHA'";
		$SaveCerrado = mysqli_query($conexion, $SQL) or die ('No ejecutado');
		echo $ResultadoCerrado;
		exit;
	}
	
	if($ResultadoCerrado2==0){
		echo $ResultadoCerrado2;
	}else{
		$SQL = "INSERT into existecerrado SET OS='$Osadia', Usuario='$UserName', Fecha='$FECHA'";
		$SaveCerrado = mysqli_query($conexion, $SQL) or die ('No ejecutado');
		echo $ResultadoCerrado2;
		exit;
	}

	mysqli_close($conexion);

}

?>