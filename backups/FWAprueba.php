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
			<td class="FormatSEG"><a href="myfwa.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
				Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM ventasfwa WHERE IdAgenteSV='$Usuario' AND FechaVenta='$FECHA'";
			$TotalEmisiones = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			while($RegEmisiones=mysqli_fetch_array($result))
				{
					$TotalEmisiones = $TotalEmisiones + 1;
								
				}

			//$Consultar = "UPDATE usuarios SET Total='$TotalEmisiones' WHERE Tarjeta='$Usuario'";
			//mysqli_query($conexion, $Consultar) or die ('No ejecutado');

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
			    <li class="LISTA_CASOS">PostPago<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Update<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">BYOP<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
		</td>

	<td class="FILA_COUNT">PostPago<span class="badge Format_Badge"><?php
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$TotalPostPago = 0;
			$sql = "SELECT count(*) FROM ventasfwa WHERE IdAgenteSV='$Usuario' AND FechaVenta='$FECHA' AND Producto='PostPago'";
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
			$RegPostPago=mysqli_fetch_row($result);
			
			$TotalPostPago = $TotalPostPago + $RegPostPago[0];
			//$PorcientoMac00 =0;

			//if($TotalMAC00> 0){$PorcientoMac00  = Round($TotalMAC00 / $TotalEmisiones * 100);}
			//if($RegEmisiones[11]> 0){$PorcientoMac35  = Round($RegEmisiones[11] / $RegEmisiones[13] * 100);}

			//$Consultar = "UPDATE usuarios SET Mac00='$TotalMAC00' WHERE Tarjeta='$Usuario'";
			//$AgregarPorciento00 = "UPDATE usuarios SET porcientodesp='$PorcientoMac00' WHERE Tarjeta='$Usuario'";
			//mysqli_query($conexion, $Consultar) or die ('No ejecutado');
			//mysqli_query($conexion, $AgregarPorciento00) or die ('No ejecutado');
								
			echo $TotalPostPago;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

		<td class="FILA_COUNT">Update<span class="badge Format_Badge"><?php
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$TotalUpdate = 0;
			$sql = "SELECT count(*) FROM ventasfwa WHERE IdAgenteSV='$Usuario' AND FechaVenta='$FECHA' AND Producto='Update'";
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
			$RegUpdate=mysqli_fetch_row($result);
			
			$TotalUpdate = $TotalUpdate + $RegUpdate[0];
			//$PorcientoMac00 =0;

			//if($TotalMAC00> 0){$PorcientoMac00  = Round($TotalMAC00 / $TotalEmisiones * 100);}
			//if($RegEmisiones[11]> 0){$PorcientoMac35  = Round($RegEmisiones[11] / $RegEmisiones[13] * 100);}

			//$Consultar = "UPDATE usuarios SET Mac00='$TotalMAC00' WHERE Tarjeta='$Usuario'";
			//$AgregarPorciento00 = "UPDATE usuarios SET porcientodesp='$PorcientoMac00' WHERE Tarjeta='$Usuario'";
			//mysqli_query($conexion, $Consultar) or die ('No ejecutado');
			//mysqli_query($conexion, $AgregarPorciento00) or die ('No ejecutado');
								
			echo $TotalUpdate;
			mysqli_close($conexion);					
}

?>
		</span>
	</td>

	<td class="FILA_COUNT">BYOP<span class="badge Format_Badge"><?php
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$TotalBYOP = 0;
			$sql = "SELECT count(*) FROM ventasfwa WHERE IdAgenteSV='$Usuario' AND FechaVenta='$FECHA' AND Producto='Update'";
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
			$RegBYOP=mysqli_fetch_row($result);
			
			$TotalBYOP = $TotalBYOP + $RegBYOP[0];
			//$PorcientoMac00 =0;

			//if($TotalMAC00> 0){$PorcientoMac00  = Round($TotalMAC00 / $TotalEmisiones * 100);}
			//if($RegEmisiones[11]> 0){$PorcientoMac35  = Round($RegEmisiones[11] / $RegEmisiones[13] * 100);}

			//$Consultar = "UPDATE usuarios SET Mac00='$TotalMAC00' WHERE Tarjeta='$Usuario'";
			//$AgregarPorciento00 = "UPDATE usuarios SET porcientodesp='$PorcientoMac00' WHERE Tarjeta='$Usuario'";
			//mysqli_query($conexion, $Consultar) or die ('No ejecutado');
			//mysqli_query($conexion, $AgregarPorciento00) or die ('No ejecutado');
								
			echo $TotalBYOP;
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
  		<li role="presentation" class="FormatBTN active"><a href="fwa.php">FWA</a></li>
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
	<title>DATA Clericals - FWA</title>
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
	<span>Registro de FWA</span>
	<br>
</div>
<br>
<div class='Container'>


	<form class="form-inline" name='frmFWA' action="SaveFWA.php" method="post">
		
		<div class="col-md-12">
			
				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="lstAprobadoCIVS">Aprobado CIVS?:</label><br>
	    			<select id='lstAprobadoCIVS' class="form-control input-sm label-primary" name='lstAprobadoCIVS' onchange='CategoriaFWA();'>
						<option>[Elegir una]</option>
						<option>Si</option>
						<option>No</option>
	    			</select>
				</div>
			

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="lstProducto">Producto:</label>
	    			<select id='lstProducto' class="form-control input-sm label-primary" name='lstProducto' onchange='CategoriaFWA();'>
						<option>[Elegir uno]</option>
						<option>PostPago</option>
						<option>Update</option>
						<option>BYOP</option>
						<option>N/A</option>
	    			</select>
				</div>
		

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="lstCreditClass">Credit Class:</label>
	    			<select id='lstCreditClass' class="form-control input-sm label-primary" name='lstCreditClass' onchange='CategoriaFWA();'>
						<option>[Elegir uno]</option>
						<option>B y C</option>
						<option>D</option>
						<option>F y G</option>
						<option>Quiebra</option>
						<option>N/A</option>
	    			</select>
				</div>
		
				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="lstContrato">Contrato:</label>
	    			<select id='lstContrato' class="form-control input-sm label-primary" name='lstContrato'>
						<option>[Elegir producto]</option>
	    			</select>
				</div>

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtNumAproba"># Aprobacion CIVS:</label>
					<input type="text" class="form-control" name="txtNumAproba" placeholder="#CIVS" id="txtNumAproba" maxlength="60" size="30">
				</div>
		</div>



		<div class="col-md-12">
				<div class='col-md-2'>
					<label class='control-label' id='lblCliente' for="lstEquipo">Equipo:</label>
	    			<select id='lstEquipo' class="form-control input-sm label-primary" name='lstEquipo'>
						<option>[Elegir uno]</option>
						<option>HUAWEI B315s</option>
						<option>AVVIO RT 400</option>
						<option>N/A</option>
    				</select>
				</div>

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtPriceCode">PriceCode:</label>
					<input type="text" class="form-control" name="txtPriceCode" id="txtPriceCode" maxlength="15" size="17">
				</div>

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtCostoPlan">Costo Plan:</label>
					<input type="text" class="form-control" name="txtCostoPlan" id="txtCostoPlan" maxlength="15" size="17">
				</div>

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtTipoPlan">Tipo Plan:</label>
					<input type="text" class="form-control" name="txtTipoPlan" id="txtTipoPlan" maxlength="15" size="17">
				</div>

				<div class='col-md-4'>
					<label class='control-label' id='LblContacto1' for="txtContactoHogar1">Contactos:</label><br>
	    			<input type="text" class="form-control" placeholder='Contacto 1' name="txtContactoHogar1" id="txtContactoHogar1" maxlength="10" size="10"/>
	    			<input type="text" class="form-control" placeholder='Contacto 2' name="txtContactoHogar2" id="txtContactoHogar2" maxlength="10" size="11"/>
				</div>

		</div>

			<br>
			<br>

		<div class="col-md-12">

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtTipoPago">Detalle Pagos:</label>
					<input type="text" class="form-control" name="txtTipoPago" placeholder="Tipo de Pagos" id="txtTipoPago" maxlength="15" size="17">
				</div>

				<div class='col-md-2'>
					<label class='control-label' id='lblTitleTracker' for="txtMonto">Monto pago:</label>
    				<input type="text" class="form-control" name="txtMonto" id="txtMonto" placeholder="Monto$" maxlength="6" size="17" onkeypress="return valida(event,3);">
				</div>

				<div class='col-md-2'>
					<label class="control-label" id='lblEstado' for="txtConfirmacionSpy"># SPPY:</label>
					<input type="text" class="form-control" name="txtConfirmacionSpy" id="txtConfirmacionSpy" placeholder="# Confirmacion de pago" maxlength="30" size="17" >
				</div>


				<div class='col-md-2'>
					<label class='control-label' id='lblTitleOsadia' for="txtBan">BAN:</label>
		    		<input type="text" class="form-control" name="txtBan" id="txtBan" placeholder="#BAN" maxlength="10" size="17">
				</div>

				<div class='col-md-2'>
					<label class='control-label' id='lblCliente' for="txtCliente">Cliente:</label>
	    			<input type="text" class="form-control" name="txtCliente" id="txtCliente" placeholder="Cliente" maxlength="60" size="30">
				</div>


		</div>

		<div class="col-md-12">
				<div class='col-md-2'>
					<label class='control-label' id='lblCliente' for="txtCanal">Canal:&nbsp; </label>
	    			<input type="text" class="form-control" name="txtCanal" id="txtCanal" placeholder="Ej: INVMT3" maxlength="25" size="17">
				</div>

				<div class='col-md-2'>
					<label class='control-label' id='LblCodVendedor' for="txtEmail">Email:</label>
	    			<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Ej: cliente@claropr.com" maxlength="80" size="17">
				</div>

				<div class='col-md-2'>
					<label class='control-label' id='lblTitleTracker' for="txtTracker"># AAV:</label>
	    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="No. AAV" maxlength="13" size="17" onkeypress="return valida(event,3);">
				</div>

				<div class='col-md-2'>
					<label class='control-label' id='LblVendedor' for="txtVendedor">Vendedor:</label>
	    			<input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Vendedor" maxlength="60" size="17" onkeypress="return valida(event,1);" >
				</div>


		</div>

		<div class="col-md-12">
						<br>

				<div class='col-md-12'>
					<label class='control-label' id='LblDirCliente'>Direccion:</label><br>
	    			<textarea class="form-control" name="txtDirCliente" id="txtDirCliente" rows="2" cols="74" placeholder="FISICA"></textarea>
	    			<textarea class="form-control" name="txtDireccionPostal" id="txtDireccionPostal" rows="2" cols="74" placeholder="POSTAL"></textarea>
				</div>

				<div class='col-md-12'>
					<label class='control-label' id='LblCodVendedor' for="txtReferencia">Punto de Referencia:</label><br>
		    		<input type="text" class="form-control" name="txtReferencia" id="txtReferencia" maxlength="75" size="155">
				</div>

		</div>


		
		<div class="col-md-12">

				<div class='col-md-3'>
					<label class='control-label' id='LblCodVendedor' for="txtPersonaAutorizada">Persona Autorizada:</label><br>
		    		<input type="text" class="form-control" name="txtPersonaAutorizada" id="txtPersonaAutorizada" maxlength="60" size="35">
				</div>
			
				<div class='col-md-3'>
					<label class='control-label' id='LblContactos' for="txtContactoAutorizado">Contacto Autorizado:</label><br>
	    			<input type="text" class="form-control" name="txtContactoAutorizado" id="txtContactoAutorizado" placeholder="Ej: 7870000000" maxlength="10" size="15">
				</div>

				<div class='col-md-3'>
					<label class="control-label" id='lblEstado' for="lstPaquete">Paquete Ofertado:</label>
	    			<select id='lstPaquete' class="form-control input-sm label-primary" name='lstPaquete'>
						<option>[Elegir uno]</option>
						<option disabled="yes">Voz + Internet</option>
						<option>10MB + Ilimitado 100GB + VOZ x $40</option>
						<option>10MB + Ilimitado 150GB + VOZ x $50</option>
						<option>10MB + Ilimitado 300GB PUJ + VOZ x $70</option>
						<option disabled="yes">Solo Internet</option>
						<option>10MB + Ilimitado 100GB x $30</option>
						<option>10MB + Ilimitado 150GB x $40</option>
						<option>10MB + Ilimitado 300GB x $60</option>
	    			</select>
				</div>

				<div class='col-md-3'>
					<label class="control-label" id='lblEstado' for="lstVentaCompletada">Venta Completada:</label><br>
	    			<select id='lstVentaCompletada' class="form-control input-sm label-primary" name='lstVentaCompletada' onchange='CategoriaFWACompletada();'>
						<option>[Elegir CIVS]</option>
	    			</select>
				</div>
				


		</div>


		<div class="col-md-12">

				<div class='col-md-2'>
					<label class='control-label' id='lblTitleTracker' for="txtRazon">Razon:</label><br>
	    			<input type="text" class="form-control" name="txtRazon" id="txtRazon" placeholder="Razon de no completa" maxlength="75" size="155">
				</div>


			
		</div>


		</div>
	 </div>
	</form>

		<br>

		<div class='col-md-6 text-center' id='BthBotones'>
			<button type='button' class='btn btn-primary' id='bthAgregar' name='bthAgregar' onclick="SendFWA();">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registar
    		</button>
 
    		<button type='button' class='btn btn-danger' id='bthClear' name='bthClear' onclick="Limpiar();">
    			<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Limpiar
    		</button>

		</div>




</div>

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

