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
	<title>DATA Clericals - Editar emisiones</title>
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
	<span>Actualizar Emisiones </span>
	<br>
	<br>
</div>

<?php

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$ID = $_GET['ID'];
			$sql = "SELECT * FROM emisiones WHERE id='$ID' AND Fecha='$FECHA'";
			$TotalEmisiones = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');

			$RegEmisionUpdate = mysqli_fetch_row($result);
		
			mysqli_close($conexion);					
}

?>


<div class='Container'>
	<form class="form-inline" name='frmAuditoria' action="SaveAuditoria.php" method="post">

		<input type="hidden" name="TxtID" value='<?php echo $RegEmisionUpdate[0]; ?>'>
		
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleTarjeta' for="txtTracker">Tarjeta:</label>
    			<input type="text" class="form-control" name="txtTarjeta" id="txtTarjeta" placeholder="Tarjeta" maxlength="6" size="6" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[1]; ?>'>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleAgente' for="txtTracker">Agente:</label>
    			<input type="text" class="form-control" name="txtAgente" id="txtAgente" placeholder="Agente" maxlength="50" size="50" value='<?php echo $RegEmisionUpdate[2]; ?>'>
			</div>
		</div>

		<div class='Form-group has-success'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleOsadia' for="txtTracker">OSADIA:</label>
    			<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" placeholder="OSADIA" maxlength="7" size="7" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[10]; ?>'>
			</div>
		</div>

		<br>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblVendedor' for="txtVendedor">Vendedor:</label>
    			<input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Vendedor" maxlength="30" size="30" onkeypress="return valida(event,1);" value='<?php echo $RegEmisionUpdate[4]; ?>' >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender">Cod. Vendedor:</label>
    			<input type="text" class="form-control" name="txtCodeVender" id="txtCodeVender" placeholder="Ej: 00000" maxlength="6" size="6" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[5]; ?>' >
			</div>
		</div>
		
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCanal' for="txtCodeVenderCanal">Canal:</label>
    			<input type="text" class="form-control" name="txtCodeVenderCanal" id="txtCodeVenderCanal" placeholder="Ej: INVMT3" maxlength="15" size="18" value='<?php echo $RegEmisionUpdate[6]; ?>'>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker">No. CCM Tracker:</label>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="TRACKER" maxlength="13" size="13" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[8]; ?>'>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleCops' for="txtTracker">COPS:</label>
    			<input type="text" class="form-control" name="txtCops" id="txtCops" placeholder="COPS" maxlength="6" size="6" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[9]; ?>'>
			</div>
		</div>

		<div class='Form-group'>
			<div id='ContEstado' class='col-md-12 MACOPEN'>
				<label class='control-label' id='lblTitleMAC' for="txtTracker">MAC:</label>
    			<input type="text" class="form-control" name="txtMAC" id="txtMAC" placeholder="MAC" maxlength="2" size="2" onkeypress="return valida(event,3);" value='<?php echo $RegEmisionUpdate[7]; ?>'>
			</div>
		</div>
	
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='lblDir' for="LstDireccion">Direccion:</label>
    			<select id="LstDireccion" class="form-control input-sm label-primary" name='LstDireccion'>
					<option><?php echo $RegEmisionUpdate[16]; ?></option>
					<option>_____________</option>
					<option>Es la Exacta</option>
					<option>Falta Numero de Casa</option>
					<option>Falta Kilometro</option>
					<option>Falta Hectometro</option>					
    			</select>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<br/>
				<label class='control-label' id='LblObserva' for="txtObservacion">Observación:</label>
    			<textarea id='txtObservacion' name='txtObservacion' cols="100" rows="4"></textarea>
			</div>
		</div>

	</form>
		
		<div class='col-md-12' id='BthBotones'>
			<br/>
			<button type='button' class='btn btn-primary' id='bthGuardar' name='bthGuardar' onclick='SendEditAudit()'>
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Guardar
    		</button>
		</div>

</div>




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

<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
</html>

