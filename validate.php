<?php

if(isset($_POST['txtUser'])){
	   
	   $usuario = $_POST["txtUser"];
   	   $password = $_POST["txtClave"];

	if($usuario=="" && $password=="" ){
		header('location: login.php?err=2');
	}else{
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
		mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
		
		$sql = "SELECT * FROM usuarios where Tarjeta='$usuario' and Clave='$password'";

		$LastUpdate = date('d/m/Y h:i:sa');

		$Update = "UPDATE usuarios SET UltimoAcceso='$LastUpdate' WHERE Tarjeta='$usuario'";

		$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		$resultUpdate = mysqli_query($conexion, $Update) or die ('No ejecutado');
		
		$fila=mysqli_fetch_row($result);

		if($fila[0]>0){
			session_start();
			$_SESSION["Tarjeta"] = $fila[1];
			$_SESSION["Nombre"] = $fila[2];
			$_SESSION["Descripción"] = $fila[5];
			$_SESSION["Perfil"] = $fila[4];

	      	header("location: index.php");
		}else{

	     	header('location: login.php?err=1');
		}
		
		mysqli_close($conexion);
}
	}
}else{
	header('location: login.php');
}


?>
