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
  		<li role="presentation" class="FormatBTN active"><a href="emisiones.php">Emisiones</a></li>
  		<li role="presentation" class="FormatBTN"><a href="movil.php">Movil</a></li>
  		<li role="presentation" class="FormatBTN"><a href="fwa.php">FWA y CH</a></li>
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
	<title>DATA Clericals - Registro Emisiones</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>

<br>
<br>

<div id="Cabecera">
	<span class="Titulo_DEMORA">Registro de <span class="Titulo_CUADRO">EMISIONES</span></span>
	<br>
</div>

<div class='Container'>
	<div class='col-md-12'>
		<SPAN id='MensajeEmision' class='alert-success text-center'>
			<?php
				if(isset($_GET['rtv'])){
					echo "Se ha registrado la orden correctamente";
				}
			?>
		</SPAN>
	</div>
	<br>
	<br>

	<form class="form-inline" name='frmEmisiones' action="SaveEmision.php" method="post">

	<div class="col-md-12">
			<div class='col-md-3 has-success'>
				<label class='control-label' id='lblTitleOsadia' for="txtTracker">OSADIA:</label>
    			<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" placeholder="OSADIA" maxlength="6" size="30" onkeypress="return valida(event,3);" onblur="BuscarEmision();">
			</div>

			<div class='col-md-3'>
				<label class="control-label" id='lblEstado' for="LstRazonEmision">Razón:</label>
    			<select id='LstRazonEmision' class="form-control input-sm label-primary" name='LstRazonEmision' onchange="ShowEmision();">
    				<option>[Elegir una..]</option>
					<option>Emisión</option>
					<option>Orden No Emitida</option>
					<option>Transferencia</option>
					<option>Llamada Muda</option>
					<option>Caso Referido</option>
					<option>Informaciones</option>
    			</select>
			</div>

			<div class='col-md-3'>
				<label class="control-label" id='TitleEmision' for="LstSubRazonEmision">Sub-Razón:</label>
    			<select id='LstSubRazonEmision' class="form-control input-sm label-primary" name='LstSubRazonEmision' onchange="ShowEmisionSub();">
    				<option>[Elegir Razón..]</option>
    			</select>
			</div>

			<div class='col-md-2'>
				<label class='control-label' id='LblVendedor' for="LstEmisionProducto">Producto:</label>
    			<select id='LstEmisionProducto' class="form-control input-sm label-primary" name='LstEmisionProducto'>
    				<option>[Elegir Sub-Razón..]</option>
    			</select>
			</div>
	</div>	

	<div class="col-md-12">		

			<div class='col-md-3'>
				<label class='control-label' id='LblVendedor' for="txtVendedor">Vendedor:</label>
    			<input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Vendedor" maxlength="30" size="30" onkeypress="return valida(event,1);" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender">Cod. Vendedor:</label>
		    	<input type="text" class="form-control" name="txtCodeVender" id="txtCodeVender" placeholder="Ej: 00000" maxlength="6" size="30" onkeypress="return valida(event,3);" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblTeam' for="txtTeam">Team Leader/Supervisor:</label>
		    	<input type="text" class="form-control" name="txtTeam" id="txtTeam" placeholder="Leader/Supervisor" maxlength="30" size="30" onkeypress="return valida(event,1);" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblCanal' for="txtCodeVenderCanal">Canal:</label>
    			<input type="text" class="form-control" name="txtCodeVenderCanal" id="txtCodeVenderCanal" placeholder="Ej: INVMT3" maxlength="15" size="30">
			</div>

	</div>
		
	<div class="col-md-12">

			<div class='col-md-3'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker"># AAV:</label>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="No. AAV" maxlength="13" size="30" onkeypress="return valida(event,3);">
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='lblTitleCops' for="txtTracker">COPS:</label>
    			<input type="text" class="form-control" name="txtCops" id="txtCops" placeholder="COPS" maxlength="6" size="30" onkeypress="return valida(event,3);">
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='lblTitleM6' for="txtTracker">M6:</label>
    			<input type="text" class="form-control" name="txtM6" id="txtM6" value='00000000' placeholder="M6" maxlength="8" size="30" onkeypress="return valida(event,3);">
			</div>

			<div id='ContEstado' class='col-md-3 MACOPEN'>
				<label class='control-label' id='lblTitleMAC' for="txtTracker">MAC:</label>
    			<input type="text" class="form-control" name="txtMAC" id="txtMAC" placeholder="MAC" maxlength="2" size="30" onkeypress="return valida(event,3);">
			</div>


	</div>
		
	<div class="col-md-12">
		
		<div class='col-md-3'>
				<label class="control-label" id='lblFactura' for="LstFactura">Aceptó Factura Electronica?:</label>
    			<select id='LstFactura' class="form-control input-sm label-primary" name='LstFactura'>
					<option>N/A</option>
					<option>Si</option>
					<option>No Tiene Correo</option>
					<option>No le interesa</option>
					<option>No, Ya la recibe</option>
    			</select>
		</div>

		<div class='col-md-3'>
				<label class="control-label" id='lblDir' for="LstDireccion">Direccion:</label>
    			<select id="LstDireccion" class="form-control input-sm label-primary" name='LstDireccion'>
					<option>N/A</option>
					<option>Es la Exacta</option>
					<option>Falta Numero de Casa</option>
					<option>Falta Kilometro</option>
					<option>Falta Hectometro</option>
					<option>Fisica</option>
					<option>Postal</option>
    			</select>
		</div>

		<div class='col-md-3'>
				<label class="control-label" id='lblMensaje' for="LstMensaje">Mensaje:</label>
    			<select id="LstMensaje" class="form-control input-sm label-primary" name='LstMensaje'>
					<option>N/A</option>
					<option>194[1MB]</option>
					<option>194[2MB]</option>
					<option>194[3MB]</option>
					<option>194[4MB]</option>
					<option>194[5MB]</option>
					<option>194[8MB]</option>
					<option>194[10MB]</option>
					<option>194[16MB]</option>
					<option>194[20MB]</option>
					<option>194[30MB]</option>
					<option>194[50MB]</option>
					<option>194[75MB]</option>
					<option>194[80MB]</option>
					<option>194[150MB]</option>
					<option>194[Linea Sencilla]</option>
    			</select>
			</div>

			<div class='col-md-3'>
				<label class="control-label" id='lblEstado' for="LstPueblos">Pueblo:</label>
    			<select id='LstPueblos' class="form-control input-sm label-primary" name='LstPueblos'>
    				<option>[Elegir pueblo..]</option>
					<option>Adjuntas</option>
					<option>Aguada</option>
					<option>Aguadilla</option>
					<option>Aguas Buenas</option>
					<option>Aibonito</option>
					<option>Arecibo</option>
					<option>Arroyo</option>
					<option>Añasco</option>
					<option>Barceloneta</option>
					<option>Barranquitas</option>
					<option>Bayamón</option>
					<option>Cabo Rojo</option>
					<option>Caguas</option>
					<option>Camuy</option>
					<option>Canóvanas</option>
					<option>Carolina</option>
					<option>Cataño</option>
					<option>Cayey</option>
					<option>Ceiba</option>
					<option>Ciales</option>
					<option>Cidra</option>
					<option>Coamo</option>
					<option>Comerío</option>
					<option>Corozal</option>
					<option>Culebra</option>
					<option>Dorado</option>
					<option>Fajardo</option>
					<option>Florida</option>
					<option>Guayama</option>
					<option>Guayanilla</option>
					<option>Guaynabo</option>
					<option>Gurabo</option>
					<option>Guánica</option>
					<option>Hatillo</option>
					<option>Hormigueros</option>
					<option>Humacao</option>
					<option>Isabela</option>
					<option>Jayuya</option>
					<option>Juana Díaz</option>
					<option>Juncos</option>
					<option>Lajas</option>
					<option>Lares</option>
					<option>Las Marías</option>
					<option>Las Piedras</option>
					<option>Loiza</option>
					<option>Luquillo</option>
					<option>Manatí</option>
					<option>Maricao</option>
					<option>Maunabo</option>
					<option>Mayagüez</option>
					<option>Moca</option>
					<option>Morovis</option>
					<option>Naguabo</option>
					<option>Naranjito</option>
					<option>Orocovis</option>
					<option>Patillas</option>
					<option>Peñuelas</option>
					<option>Ponce</option>
					<option>Quebradillas</option>
					<option>Rincón</option>
					<option>Rio Grande</option>
					<option>Sabana Grande</option>
					<option>Salinas</option>
					<option>San Germán</option>
					<option>San Juan</option>
					<option>San Lorenzo</option>
					<option>San Sebastián</option>
					<option>Santa Isabel</option>
					<option>Toa Alta</option>
					<option>Toa Baja</option>
					<option>Trujillo Alto</option>
					<option>Utuado</option>
					<option>Vega Alta</option>
					<option>Vega Baja</option>
					<option>Vieques</option>
					<option>Villalba</option>
					<option>Yabucoa</option>
					<option>Yauco</option>
					<option>N/A</option>
    			</select>
			</div>

	</div>

	<div class='col-md-12'>
		<div class='col-md-2'>
			<label class='control-label' id='LblDirCliente' for="txtRazonEmision">Razon Emision:</label>
    		<input type="text" class="form-control" name="txtRazonEmision" id="txtRazonEmision" placeholder="Escriba la Razon por la cual el dealer nos llama para hacer emision" maxlength="300" size="169">
		</div>
	</div>


	<div class='col-md-12'>
			<div class='col-md-2'>
				<label class='control-label' id='LblDirCliente' for="txtDirCliente">Direccion fisica:</label>
    			<input type="text" class="form-control" name="txtDirCliente" id="txtDirCliente" placeholder="Direccion Cliente" maxlength="300" size="169">
			</div>
	</div>

	</form>




		<div class='col-md-6 text-center' id='BthBotones'>
				<br>
				<br>

			<button type='button' class='btn btn-primary' id='bthAgregar' name='bthAgregar' onclick="SendEmisiones();">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registar
    		</button>
 
    		<button type='button' class='btn btn-danger' id='bthClear' name='bthClear' onclick="Limpiar();">
    			<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Limpiar
    		</button>


		</div>


</div>
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


<script language="javascript" type="text/javascript" src='js/jquery-3.2.0.min.js'></script>
<script language="javascript" type="text/javascript" src='js/bootstrap.min.js'></script>
<script language="javascript" type="text/javascript" src='js/funciones.js'></script>
</html>

