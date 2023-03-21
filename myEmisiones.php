<meta charset='utf-8' />
<div id='BarUser'>
  <div class="TituloGeneral">

      <div class="logotipo">
        <img class="logo2" src="pic/logo.png">
      </div>
      
      <div class="Texto1">
          <span class="Texto_Aplicacion">DATA Clericals</span>
          <br>
          <span class="Texto_Proyecto">SOPORTE A VENTAS</span>
      </div>

  </div>
  <div class="userlogin">
    <?php
       session_start();
       if(isset($_SESSION['Nombre'])){
       	echo '<span id="TitleUsuario"> ('.$_SESSION["Tarjeta"].') '.$_SESSION["Nombre"].' - ['.$_SESSION["Descripción"].'] </span><a class="btn btn-link btnlink" href="cerrar.php">Cerrar Sesión</a>';
       }else{
       		header('location: login.php');
       }
    ?>

<div class="Contadores">
	<table class="table">
		<tr class="Fila_Contadores">
			<td class="FormatSEG"><a href="myEmisiones.php" data-toggle="tooltip" data-placement="top" title="Ver mis emisiones trabajadas">
				Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM emisiones WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";
			$TotalEmisiones = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			while($RegEmisiones=mysqli_fetch_array($result))
				{
					$TotalEmisiones = $TotalEmisiones + 1;
								
				}

			$Consultar = "UPDATE usuarios SET Total='$TotalEmisiones' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');

			echo $TotalEmisiones;
			mysqli_close($conexion);					
}


     ?>
     	
	</span>
	</td>

	<td class="Fila_Drop"><div class="btn-group NAVEGACION">
			  <label class="label label-default dropdown-toggle LABEL_FORMAT" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Resumen de casos <span class="caret"></span>
			  </label>
			  <ul class="dropdown-menu">
			    <li class="LISTA_CASOS">MAC 00<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 35<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 36<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 39<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 40<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Failed<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
		</td>

	<td class="FILA_COUNT">MAC 00<span class="badge Format_Badge"><?php
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "00";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalMAC00 = 0;
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
			$RegMAC00=mysqli_fetch_row($result);
			
			$TotalMAC00 = $TotalMAC00 + $RegMAC00[0];
			$PorcientoMac00 =0;

			if($TotalMAC00> 0){$PorcientoMac00  = Round($TotalMAC00 / $TotalEmisiones * 100);}
			//if($RegEmisiones[11]> 0){$PorcientoMac35  = Round($RegEmisiones[11] / $RegEmisiones[13] * 100);}

			$Consultar = "UPDATE usuarios SET Mac00='$TotalMAC00' WHERE Tarjeta='$Usuario'";
			$AgregarPorciento00 = "UPDATE usuarios SET porcientodesp='$PorcientoMac00' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
			mysqli_query($conexion, $AgregarPorciento00) or die ('No ejecutado');
								
			echo $TotalMAC00;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">MAC 35<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "35";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			//ECHO $UserName;
			$TotalMAC35 = 0;
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
			$RegMac35=mysqli_fetch_row($result);
			
			$TotalMAC35 = $TotalMAC35 + $RegMac35[0];
			$PorcientoMac35 =0;

			if($TotalMAC35> 0){$PorcientoMac35  = Round($TotalMAC35 / $TotalEmisiones * 100);}

			$Consultar = "UPDATE usuarios SET Mac35='$TotalMAC35' WHERE Tarjeta='$Usuario'";
			$AgregarPorciento35 = "UPDATE usuarios SET porcientodir='$PorcientoMac35' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
			mysqli_query($conexion, $AgregarPorciento35) or die ('No ejecutado');
								
			echo $TotalMAC35;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">MAC 36<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "36";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";
			//$sql2 = "SELECT count(*) FROM registromac WHERE RegAgente='$UserName' AND Status='Cerrado' AND Fecha='$FECHA'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalMAC36 = 0;
			//
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			$RegMac36=mysqli_fetch_row($result);
			
			$TotalMAC36 = $TotalMAC36 + $RegMac36[0];

			$Consultar = "UPDATE usuarios SET Otros='$TotalMAC36' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
								
			echo $TotalMAC36;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">MAC 39<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "39";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";
			//$sql2 = "SELECT count(*) FROM registromac WHERE RegAgente='$UserName' AND Status='Cerrado' AND Fecha='$FECHA'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalMAC39 = 0;
			//
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			$RegMac39=mysqli_fetch_row($result);
			
			$TotalMAC39 = $TotalMAC39 + $RegMac39[0];

			$Consultar = "UPDATE usuarios SET Otros='$TotalMAC39' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
								
			echo $TotalMAC39;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">MAC 40<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "40";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";	
			//$sql2 = "SELECT count(*) FROM registromac WHERE RegAgente='$UserName' AND Status='Cerrado' AND Fecha='$FECHA'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalMAC40 = 0;
			//
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			$RegMac40=mysqli_fetch_array($result);
		
			$TotalMAC40 = $TotalMAC40 + $RegMac40[0];

			$Consultar = "UPDATE usuarios SET Otros='$TotalMAC40' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
								
			echo $TotalMAC40;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">Failed<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Mac = "ER";
			$sql = "SELECT count(*) FROM emisiones WHERE Representante='$UserName' AND Fecha='$FECHA' AND Mac='$Mac'";	
			//$sql2 = "SELECT count(*) FROM registromac WHERE RegAgente='$UserName' AND Status='Cerrado' AND Fecha='$FECHA'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalMACFailed = 0;
			//
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			$RegMac40=mysqli_fetch_array($result);
		
			$TotalMACFailed = $TotalMACFailed + $RegMac40[0];

			$Consultar = "UPDATE usuarios SET Otros='$TotalMACFailed' WHERE Tarjeta='$Usuario'";
			mysqli_query($conexion, $Consultar) or die ('No ejecutado');
								
			echo $TotalMACFailed;
			mysqli_close($conexion);					
}

?>
			</span>
	</td>


	</tr>
</table>
</div>
</div>
</div>

</div>
	<div id='Botones'>

	<ul class="nav nav-tabs">
  		<li role="presentation" class="FormatBTN"><a href="index.php">Inicio</a></li>
  		<li role="presentation" class="FormatBTN"><a href="regmac.php">MAC</a></li>
  		<li role="presentation" class="FormatBTN"><a href="demora.php">Demora</a></li>
  		<li role="presentation" class="FormatBTN"><a href="status.php">Status</a></li>
  		<li role="presentation" class="FormatBTN"><a href="emisiones.php">Emisiones</a></li>
  		<li role="presentation" class="FormatBTN"><a href="movil.php">Movil</a></li>
<?php
        if($_SESSION["Perfil"]=='11'){
          echo "<li role='presentation' class='FormatBTN'><a href='Auditoria.php'>Auditar</a></li>";
        }
        else if($_SESSION["Perfil"]=='10'){
          echo "<li role='presentation' class='FormatBTN'><a href='EspecialDemora.php'>Especiales</a></li>";
        }
        else if($_SESSION["Perfil"]=='15'){
          echo "<li role='presentation' class='FormatBTN'><a href='AuditoriaDemora.php'>Auditar demoras</a></li>";
        }

        else if($_SESSION["Perfil"]=='1'){
          echo "<li role='presentation' class='FormatBTN'><a href='admin.php'>Administrativo</a></li>";
          echo "<li role='presentation' class='FormatBTN'><a href='Reportes.php'>Reportes</a></li>";
        }

        
      ?>
		</ul>

	</div>


<!DOCTYPE html>
<html>
<head>
	<title>SV - Mis registros</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
<br>
<br>
<br>
<div id="Cabecera">
	<span>Mis Emisiones de hoy</span>
	<br>
	<br>
</div>

<div class="table-responsive">
  <table class="table text-center table-hover">
  	
		<tr class='success'>
		  <td class='Encabezado'>Osadia</td>
		  <td class='Encabezado'>Vendedor</td>
		  <td class='Encabezado'>Codigo Vendedor</td>
		  <td class='Encabezado'>Canal</td>
		  <td class='Encabezado'>Tipo Emision</td>
		  <td class='Encabezado'># MCC Tracker</td>
		  <td class='Encabezado'># COPS</td>
		  <td class='Encabezado'># M6</td>
		  <td class='Encabezado'>MAC</td>
		  <td class='Encabezado'>Hora de emision</td>
		  <td class='Encabezado'>Ebill</td>
		  <td class='Encabezado'>Estado</td>
		  <td class='Encabezado'>Direccion</td>
		</tr>
	
		<?php
			if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM emisiones WHERE Tarjeta=$Usuario AND Fecha='$FECHA'";
					
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_array($result))
						{
							
							echo "<tr id='filasData'>
									<td>$RegAgent[10]</td>
									<td>$RegAgent[4]</td>
									<td>$RegAgent[5]</td>
									<td>$RegAgent[6]</td>
									<td>$RegAgent[3]</td>
									<td>$RegAgent[8]</td>
									<td>$RegAgent[9]</td>
									<td>$RegAgent[11]</td>
									<td>$RegAgent[7]</td>
									<td>$RegAgent[13]</td>
									<td>$RegAgent[14]</td>
									<td>$RegAgent[15]</td>
									<td>$RegAgent[16]</td>
								</tr>";			
						}

					mysqli_close($conexion);					
			}
		?>
  </table>
</div>


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer class="FOOTER">
  <div class="Marco_Copyright">
      <span class="Texto_Copyright">
          DATA Clericals - Soporte a Ventas @ 2017 - 2018<br>
          <span class="Texto_Empresa">AMOV International Teleservices.</span>
      </span>
  </div>
</footer>

</body>

<!-- <div id="fade" class="overlay"></div>
  <div id="light" class="modal">
     <p>Lorem ipsum dolor sit.....</p>
  </div>
</div> -->

<script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<script type="text/javascript" src='js/funciones.js'></script>
</html>

