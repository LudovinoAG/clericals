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
		<td class="FormatSEG"><a href="mydemora.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
			Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";
			$TotalDemora = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			while($RegDemora=mysqli_fetch_array($result))
				{
					$TotalDemora = $TotalDemora + 1;
								
				}
			echo $TotalDemora;
			mysqli_close($conexion);					
}


     		?></span>
</a>
		</td>


		<td class="Fila_Drop"><div class="btn-group NAVEGACION">
			  <label class="label label-default dropdown-toggle LABEL_FORMAT" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Resumen de casos <span class="caret"></span>
			  </label>
			  <ul class="dropdown-menu">
			    <li class="LISTA_CASOS">Demoradas<span class="badge Format_Badge_List"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Demorada'";
					$TotalDemorada = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegDemorada=mysqli_fetch_array($result))
						{
							$TotalDemorada = $TotalDemorada + 1;
										
						}
					echo $TotalDemorada;
					mysqli_close($conexion);					
		}

		?></span></li>
			    <li class="LISTA_CASOS">No Demoradas<span class="badge Format_Badge_List"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='No se Demora'";
					$TotalNoDemorada = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegNoDemorada=mysqli_fetch_array($result))
						{
							$TotalNoDemorada = $TotalNoDemorada + 1;
										
						}
					echo $TotalNoDemorada;
					mysqli_close($conexion);					
		}

		?></span></li>
			    <li class="LISTA_CASOS">Cancelada<span class="badge Format_Badge_List"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Cancelada'";
					$TotalCanceladas = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegCanceladas=mysqli_fetch_array($result))
						{
							$TotalCanceladas = $TotalCanceladas + 1;
										
						}
					echo $TotalCanceladas;
					mysqli_close($conexion);					
		}

		?></span></li>
			    <li class="LISTA_CASOS">Seguimientos<span class="badge Format_Badge_List"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Seguimiento'";
					$TotalSeguimiento = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegSeguimiento=mysqli_fetch_array($result))
						{
							$TotalSeguimiento = $TotalSeguimiento + 1;
										
						}
					echo $TotalSeguimiento;
					mysqli_close($conexion);					
		}

		?></span></li>
			  </ul>
			</div>
		</td>

		<td class="FILA_COUNT">
		Demoradas<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Demorada'";
					$TotalDemorada = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegDemorada=mysqli_fetch_array($result))
						{
							$TotalDemorada = $TotalDemorada + 1;
										
						}
					echo $TotalDemorada;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

		<td class="FILA_COUNT">
		No Demoradas<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='No se Demora'";
					$TotalNoDemorada = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegNoDemorada=mysqli_fetch_array($result))
						{
							$TotalNoDemorada = $TotalNoDemorada + 1;
										
						}
					echo $TotalNoDemorada;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

		<td class="FILA_COUNT">
		Cancelada<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Cancelada'";
					$TotalCanceladas = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegCanceladas=mysqli_fetch_array($result))
						{
							$TotalCanceladas = $TotalCanceladas + 1;
										
						}
					echo $TotalCanceladas;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

		<td class="FILA_COUNT">
		Seguimientos<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('localhost','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM demoras WHERE Tarjeta='$Usuario' AND Fecha='$FECHA' AND Estado='Seguimiento'";
					$TotalSeguimiento = 0;

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegSeguimiento=mysqli_fetch_array($result))
						{
							$TotalSeguimiento = $TotalSeguimiento + 1;
										
						}
					echo $TotalSeguimiento;
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

	<div id='Botones'>

	<ul class="nav nav-tabs">
  		<li role="presentation" class="FormatBTN"><a href="index.php">Inicio</a></li>
  		<li role="presentation" class="FormatBTN"><a href="regmac.php">MAC</a></li>
  		<li role="presentation" class="FormatBTN active"><a href="demora.php">Demora</a></li>
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
	<title>DATA Clericals - Registro Demoras</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>


<div class="Cabecera">
	<span class="Titulo_DEMORA">Registro <span class="Titulo_CUADRO">DEMORA</span></span>
</div>

<div class='Container FORM_DEMORA'>
	<div class='Form-group'>
		<SPAN id='MensajeEmision' class='alert-success text-center'>
			<?php
				if(isset($_GET['r'])){
					if($_GET['r']==1){
						echo "Se ha registrado la orden correctamente";
					}
					
				}
			?>
		</SPAN>
	</div>

	<form class="form-inline" name='frmDemoras' action="SaveDemora.php" method="post">

		<div class="row">
			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='lblTitleOsadia' for="txtTracker">OSADIA:</label>
			</div>

			<div class='col-md-1 col-xs-10 FILA_CAMPO'>
				<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" placeholder="OSADIA" maxlength="6" size="13" onkeypress="return valida(event,3);">
			</div>

			<div class='col-md-2 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblCliente' for="txtCliente">Nombre Cliente:</label>
			</div>

			<div class='col-md-2 col-xs-10 FILA_CAMPO'>
			    <input type="text" class="form-control" name="txtCliente" id="txtCliente" placeholder="Cliente" maxlength="25" size="25"" >
			</div>

			<div class='col-md-2 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender">Num. Contactos:</label>
			</div>

			<div class='col-md-4 col-xs-8 FILA_CAMPO'>
			    <input type="text" class="form-control" name="txtContacto1" id="txtContacto1" placeholder="Contactos 1" maxlength="10" size="10" >
			    <input type="text" class="form-control" name="txtContacto2" id="txtContacto2" placeholder="Contactos 2" maxlength="10" size="10" >
			</div>
		</div>
						
		<div class="row">

			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender"># Tecnico:</label>
			</div>

			<div class='col-md-1 col-xs-10 FILA_CAMPO'>
			    <input type="text" class="form-control" name="txtCodeVender" id="txtCodeVender" placeholder="Ej: 00000" maxlength="6" size="13"" >
			</div>

			<div class='col-md-2 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblVendedor' for="txtVendedor">Nombre tecnico:</label>
			</div>

			<div class='col-md-2 col-xs-10 FILA_CAMPO'>
			    <input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Tecnico" maxlength="30" size="25" onkeypress="return valida(event,1);" >
			</div>

			<div class='col-md-2 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblCanal' for="txtCodeVenderCanal">Compañia:</label>
			</div>

			<div class='col-md-1 col-xs-8 FILA_CAMPO'>
			    <input type="text" class="form-control" name="txtCodeVenderCanal" id="txtCodeVenderCanal" placeholder="Ej: PR" maxlength="20" size="28">
			</div>

		</div>

		<div class="row">

			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker">Tracker:</label>
			</div>

			<div class='col-md-1 col-xs-10 FILA_CAMPO'>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="TRACKER" maxlength="13" size="13" onkeypress="return valida(event,3);">
			</div>

			<div id='ContEstado' class='col-md-2 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='lblTitleMAC' for="txtMACActual">MAC:</label>
			</div>

			<div id='ContEstado' class='col-md-3 col-xs-10 FILA_CAMPO'>
    			<input type="text" class="form-control" name="txtMACActual" id="txtMAC" placeholder="ACTUAL" maxlength="2" size="9" onkeypress="return valida(event,3);">
				<input type="text" class="form-control" name="txtMACFinal" id="txtMAC2" placeholder="FINAL" maxlength="2" size="8" onkeypress="return valida(event,3);">
			</div>



			<div class="col-md-1 col-xs-2 FILA_LABEL">
				<label class='control-label' id='lblTitleCops' for="txtTracker">No. Orden:</label>
			</div>

			<div class='col-md-4 col-xs-10 FILA_CAMPO'>
				<input type="text" class="form-control" name="txtCops" id="txtCops" placeholder="# COPS" maxlength="6" size="10" onkeypress="return valida(event,3);">
				<input type="text" class="form-control" name="txtM6" id="txtM6" placeholder="# M6" maxlength="8" size="10" onkeypress="return valida(event,3);">
			</div>



		</div>

		<div class="row">

			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class="control-label" id='lblEstado' for="LstEstado">Status:</label>
			</div>

			<div class='col-md-2 col-xs-10 FILA_CAMPO'>
    			<select id='LstEstado' class="form-control input-sm label-default" name='LstEstado' onchange="ShowAccion();">
    				<option>[Ninguno]</option>
					<option>No se Demora</option>
					<option>Demorada</option>
					<option>Cancelada</option>
					<option>Seguimiento</option>
					<option>Se Brinda Informacion</option>
					<option>Transfer Call</option>
					<option>Llamada Muda</option>
    			</select>
			</div>

			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class="control-label" id='TitleEmision' for="txtTipoEmision">Resultado:</label>
			</div>

			<div class='col-md-3 col-xs-10 FILA_CAMPO'>
    			<select id='LstTipoEmision' class="form-control input-sm label-default" name='LstTipoEmision'>

    			</select>
			</div>

			<div id='MARCOTRANFER' class="TranferCLOSE">
				<div class='col-md-1 col-xs-2 FILA_LABEL'>
					<label class="control-label" id='TitleEmision' for="txtTipoTransfer">Transfer:</label>
				</div>

				<div class='col-md-2 col-xs-10 FILA_CAMPO'>
	    			<select id='LstTipoEmision2' class="form-control input-sm label-default" name='LstTipoTransfer'>
	    				<option>N/A</option>
						<option>Cliente transferido</option>
						<option>Cliente no contactado</option>
						<option>No desea transferencia</option>
	    			</select>
	    		</div>
			</div>

		</div>


		<div class='row'>
			<div class='col-md-1 col-xs-2 FILA_LABEL'>
				<label class='control-label' id='LblNotas' for="txtNotas">Notas:</label>
			</div>

			<div class='col-md-10 col-xs-10 FILA_CAMPO'>
    			<textarea class="form-control" name="txtNotas" id="txtNotas" rows="4" cols="124" maxlength="124"></textarea>
			</div>
		</div>

	</form>


		<br>
		<div class='col-md-6' id='BthBotones'>
			<button type='button' class='btn btn-default' id='bthAgregar' name='bthAgregar' onclick="SendDemora();">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registrar
    		</button>
 
    		<button type='reset' class='btn btn-default' id='bthClear' name='bthClear' onclick="LimpiarDemora();">
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

