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
			<td class="FormatSEG"><a href="myClaroHogar.php" data-toggle="tooltip" data-placement="top" title="Ver mis emisiones trabajadas">
				Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM clarohogar WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";
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
			    <li class="LISTA_CASOS">MAC 00<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 35<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 36<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 39<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">MAC 40<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Failed<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
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
  		<li role="presentation" class="FormatBTN active"><a href="ClaroHogar.php">Claro Hogar</a></li>
  		<li role="presentation" class="FormatBTN"><a href="fwa.php">FWA</a></li>

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
	<title>DATA Clericals - Registro Claro Hogar</title>
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
	<span>Registro de Claro Hogar</span>
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

	<form class="form-inline" name='frmClaroHogar' action="SaveClaroHogar.php" method="post">

		<div class='Form-group has-success'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleOsadia' for="txtTracker">OSADIA:</label>
    			<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" placeholder="OSADIA" maxlength="7" size="7" onkeypress="return valida(event,3);">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCodVendedor' for="txtCliente">Cliente:</label>
    			<input type="text" class="form-control" name="txtCliente" id="txtCliente" placeholder="Nombre Completo" maxlength="60" size="35" onkeypress="return valida(event,1);" >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblContactos' for="txtCliente">Contactos:</label>
    			<input type="text" class="form-control" name="txtContacto1" id="txtContacto1" placeholder="Contacto 1" maxlength="10" size="10">
    			<input type="text" class="form-control" name="txtContacto2" id="txtContacto2" placeholder="Contacto 2" maxlength="10" size="10">
			</div>
		</div>

		<br>
		<br>

		<div class='Form-group has-success'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleOsadia' for="txtBan">BAN:</label>
    			<input type="text" class="form-control" name="txtBan" id="txtBan" placeholder="#BAN" maxlength="10" size="10">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCodVendedor' for="txtEmail">Email:</label>
    			<input type="text" class="form-control" name="txtEmail" id="txtEmail" placeholder="Ej: cliente@claropr.com" maxlength="35" size="35">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCanal' for="txtCodeVenderCanal">Canal:</label>
    			<input type="text" class="form-control" name="txtCodeVenderCanal" id="txtCodeVenderCanal" placeholder="Ej: INVMT3" maxlength="15" size="18">
			</div>
		</div>
				<br>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
			<label class='control-label' id='LblCodVendedor' for="txtCliente">Direccion fisica:</label>
    		<textarea class="form-control" name="txtDireccionFisica" id="txtDireccionFisica" rows="2" cols="88"></textarea>
			</div>
		</div>

				<br>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
			<label class='control-label' id='LblCodVendedor' for="txtDireccionPostal">Direccion postal:</label>
    		<textarea class="form-control" name="txtDireccionPostal" id="txtDireccionPostal" rows="2" cols="87"></textarea>
			</div>
		</div>
				<br>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
			<label class='control-label' id='LblCodVendedor' for="txtReferencia">Punto de Referencia:</label>
	    	<input type="text" class="form-control" name="txtReferencia" id="txtReferencia" maxlength="75" size="81">
			</div>
		</div>


		<div class='Form-group'>
			<div class='col-md-12'>
			<label class='control-label' id='LblCodVendedor' for="txtPersonaAutorizada">Persona Autorizada:</label>
	    	<input type="text" class="form-control" name="txtPersonaAutorizada" id="txtPersonaAutorizada" maxlength="35" size="35">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblContactos' for="txtContactoAutorizado">Contacto del autorizado:</label>
    			<input type="text" class="form-control" name="txtContactoAutorizado" id="txtContactoAutorizado" placeholder="Ej: 7870000000" maxlength="10" size="10">
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker">No. CCM Tracker:</label>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="TRACKER" maxlength="20" size="13" onkeypress="return valida(event,3);">
			</div>
		</div>

	</form>


		<br>

		<div class='col-md-6 text-center' id='BthBotones'>
			<button type='button' class='btn btn-primary' id='bthAgregar' name='bthAgregar' onclick="SendClaroHogar();">
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

