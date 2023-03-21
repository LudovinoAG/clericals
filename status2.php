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
			<td class="FormatSEG"><a href="mystatus.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
				Mis Casos<span class="badge Format_Badge"><?php
			
			if($conexion = mysqli_connect('127.0.0.1','root','123456')){
						
				mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
				$Usuario = $_SESSION['Tarjeta'];
				$FECHA = date('n/j/Y');
				$sql = "SELECT * FROM status WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";
				$TotalStatus = 0;

				$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
				while($RegStatus=mysqli_fetch_array($result))
					{
						$TotalStatus = $TotalStatus + 1;
									
					}
				echo $TotalStatus;
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
			    <li class="LISTA_CASOS">Re-activadas<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Cancelada<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Retenida<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Re-emitida<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
		</td>

				<td class="FILA_COUNT">
		Re-activadas<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT Actualizado FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					$TotalActualizados = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_row($result)){
						$TotalActualizados = $TotalActualizados + $RegAgent[0];
					}

					/*if($RegAgent!=""){
						$TotalActualizados = $RegAgent[0];
					}else{
						$TotalActualizados = 0;
					}*/
					
					
					//$TotalActualizados = $RegAgent[19];
										
					echo $TotalActualizados;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

				<td class="FILA_COUNT">
		Cancelada<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT Actualizado FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					$TotalActualizados = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_row($result)){
						$TotalActualizados = $TotalActualizados + $RegAgent[0];
					}

					/*if($RegAgent!=""){
						$TotalActualizados = $RegAgent[0];
					}else{
						$TotalActualizados = 0;
					}*/
					
					
					//$TotalActualizados = $RegAgent[19];
										
					echo $TotalActualizados;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

				<td class="FILA_COUNT">
		Retenida<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT Actualizado FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					$TotalActualizados = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_row($result)){
						$TotalActualizados = $TotalActualizados + $RegAgent[0];
					}

					/*if($RegAgent!=""){
						$TotalActualizados = $RegAgent[0];
					}else{
						$TotalActualizados = 0;
					}*/
					
					
					//$TotalActualizados = $RegAgent[19];
										
					echo $TotalActualizados;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

				<td class="FILA_COUNT">
		Re-emitida<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT Actualizado FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					$TotalActualizados = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_row($result)){
						$TotalActualizados = $TotalActualizados + $RegAgent[0];
					}

					/*if($RegAgent!=""){
						$TotalActualizados = $RegAgent[0];
					}else{
						$TotalActualizados = 0;
					}*/
					
					
					//$TotalActualizados = $RegAgent[19];
										
					echo $TotalActualizados;
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
  		<li role="presentation" class="FormatBTN"><a href="demora.php">Demora</a></li>
  		<li role="presentation" class="FormatBTN active"><a href="status.php">Status</a></li>
  		<li role="presentation" class="FormatBTN"><a href="emisiones.php">Emisiones</a></li>
  		<li role="presentation" class="FormatBTN"><a href="movil.php">Movil</a></li>
  		<li role="presentation" class="FormatBTN"><a href="fwa.php">FWA</a></li>
<?php
        if($_SESSION["Perfil"]=='11'){
          echo "<li role='presentation' class='FormatBTN'><a href='Auditoria.php'>Auditar</a></li>";
        }
        else if($_SESSION["Perfil"]=='10'){
          echo "<li role='presentation' class='FormatBTN'><a href='EspecialDemora.php'>Especiales</a></li>";
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
	<title>DATA Clericals - Registro Status</title>
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
	<span>Registro de Status</span>
	<br>
	<br>
</div>

<div class='Container'>
	<div class='Form-group'>
		<SPAN id='MensajeEmision' class='alert-success text-center'>
			<?php
				if(isset($_GET['rtv'])){
					echo "Se ha registrado la orden correctamente";
				}
			?>
		</SPAN>
	</div>

	<form class="form-inline" name='frmStatus' action="SaveStatus.php" method="post">

	<div class='col-md-12'>

			<div class='col-md-3 has-success'>
				<label class='control-label' id='lblTitleOsadia' for="txtTracker">OSADIA:</label>
    			<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" placeholder="OSADIA" maxlength="6" size="30" onkeypress="return valida(event,3);">
			</div>
	

			<div class='col-md-3'>
				<label class='control-label' id='LblVendedor' for="txtVendedor">Tecnico/Vendedor:</label>
	    		<input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Vendedor" maxlength="30" size="30" onkeypress="return valida(event,1);" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender">Cod.Tec/Vend:</label>
	    		<input type="text" class="form-control" name="txtCodeVender" id="txtCodeVender" placeholder="Ej: 00000" maxlength="6" size="30"" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblVendedor' for="txtAgentetmk">Agente TMK:</label>
    			<input type="text" class="form-control" name="txtAgentetmk" id="txtAgentetmk" placeholder="AgenteTMK" maxlength="30" size="30">
			</div>
	
	</div>

	<div class='col-md-12'>

			<div class='col-md-3'>
				<label class='control-label' id='LblNombreCliente' for="txtCliente">Cliente:</label>
    			<input type="text" class="form-control" name="txtCliente" id="txtCliente" placeholder="CLIENTE" maxlength="30" size="30" onkeypress="return valida(event,1);" >
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblNombreCliente' for="txtCliente">Contacto 1:</label>
    			<input type="text" class="form-control" name="txtContacto1" id="txtContacto1" placeholder="Contacto 1" maxlength="10" size="30">
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblNombreCliente' for="txtCliente">Contacto 2:</label>
    			<input type="text" class="form-control" name="txtContacto2" id="txtContacto2" placeholder="Contacto 2" maxlength="10" size="30">
			</div>

			<div class='col-md-3'>
				<label class='control-label' id='LblCanal' for="txtCodeVenderCanal">Canal:</label>
    			<input type="text" class="form-control" name="txtCodeVenderCanal" id="txtCodeVenderCanal" placeholder="Ej: PR" maxlength="15" size="30">
			</div>

	</div>

	<div class='col-md-12'>

			<div class='col-md-3'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker">No. CCM Tracker:</label>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="TRACKER" maxlength="13" size="30" onkeypress="return valida(event,3);">
			</div>
	
			<div class='col-md-3'>
				<label class='control-label' id='lblTitleCops' for="txtTracker">COPS:</label>
    			<input type="text" class="form-control" name="txtCops" id="txtCops" placeholder="COPS" maxlength="6" size="30" onkeypress="return valida(event,3);">
			</div>
	
			<div class='col-md-3'>
				<label class='control-label' id='lblTitleM6' for="txtTracker">M6:</label>
    			<input type="text" class="form-control" name="txtM6" id="txtM6" value='00000000' placeholder="M6" maxlength="8" size="30" onkeypress="return valida(event,3);">
			</div>

			<div id='ContEstado' class='col-md-3'>
				<label class='control-label' id='lblTitleMAC' for="txtTracker">MAC:</label>
    			<input type="text" class="form-control" name="txtMAC" id="txtMAC" placeholder="MAC" maxlength="2" size="30" onkeypress="return valida(event,3);">
			</div>

	</div>

	<div class='col-md-12'>
			<br>
			<div class='col-md-4'>
				<label class="control-label" id='lblEstado' for="LstEstado">Motivo:</label>
    			<select id='LstEstado' class="form-control input-sm label-primary" name='LstEstado'>
					<option>[Elegir una..]</option>
					<option>Estatus de Orden</option>
					<option>Solicitud de Informacion</option>
					<option>Transferencia</option>
					<option>Llamada Muda</option>
    			</select>
			</div>

			<div class='col-md-4'>
				<label class="control-label" id='TitleSituacion' for="txtSituacion">Situacion a resolver:</label>
    			<select id='LstSituacion' class="form-control input-sm label-primary" name='LstSituacion' onchange="ShowAccion();">
    				<option>...</option>
					<option>Orientacion</option>
					<option>Status de Orden</option>
					<option>Solucitud de informacion</option>
					<option>Portabilidad</option>
					<option>Direccion Punta de referencia</option>
					<option>Informacion Facilidades</option>
					<option>Seguimiento</option>
					<option>Llamada Muda</option>
					<option>Fix Wireless</option>
    			</select>
			</div>

			<div class='col-md-4'>
				<label class="control-label" id='TitleEmision' for="txtTipoStatus">Accion a tomar:</label>
    			<select id='LstStatus' class="form-control input-sm label-primary" name='LstStatus'>
    				<option>...</option>
					<option>Servico al cliente </option>
					<option>Se Brinda informacion</option>
					<option>Tranfer Call</option>
					<option>Tranferencia a TMK</option>
					<option>OS Cancelada/No aplica</option>
					<option>Llamada Muda</option>
    			</select>
			</div>

	</div>
		


		<div class='Form-group'>
			<br>
			<div class='col-md-12'>
				<label class='control-label' id='LblNotas' for="txtNotas">Notas:</label>
    			<textarea class="form-control" name="txtNotas" id="txtNotas" rows="4" cols="165"></textarea>
			</div>
		</div>

	</form>
		<br>
		<br>
		<div class='col-md-6 text-center' id='BthBotones'>
			<button type='button' class='btn btn-primary' id='bthAgregar' name='bthAgregar' onclick="SendStatus();">
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

