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
			<td class="FormatSEG"><a href="mymovil.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
				Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM movil WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";
			$TotalStatus = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			while($RegStatus=mysqli_fetch_array($result))
				{
					$TotalStatus = $TotalStatus + 1;
								
				}
			echo $TotalStatus;
			mysqli_close($conexion);					
}


     ?>		</span>
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
	  	    <li role="presentation" class="FormatBTN active"><a href="movil.php">Movil</a></li>
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
	<title>DATA Clericals - Registro Movil</title>
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
	<span>Registro Asistencia SIF</span>
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

	<form class="form-inline" name='frmMovil' action="SaveMovil.php" method="post">

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblDealer' for="txtDealer">&nbsp; &nbsp; &nbsp;Dealer:</label>
    			<input type="text" class="form-control" name="txtDealer" id="txtDealer" placeholder="Nombre del Dealer" maxlength="30" size="30">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCodVendedor' for="txtCodeVender">Num. Dealer:</label>
    			<input type="text" class="form-control" name="txtCodeVender" id="txtCodeVender" placeholder="Ej: D0000000" maxlength="8" size="8">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleTracker' for="txtTracker"># Tracker:</label>
    			<input type="text" class="form-control" name="txtTracker" id="txtTracker" placeholder="TRACKER" maxlength="13" size="13" onkeypress="return valida(event,3);">
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblNombreVendedor' for="txtVendedor">Vendedor:</label>
    			<input type="text" class="form-control" name="txtVendedor" id="txtVendedor" placeholder="Nombre Vendedor" maxlength="30" size="30" onkeypress="return valida(event,1);" >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblTarjetaVendedor' for="txtTarjeta">Tarjeta Vendedor:</label>
    			<input type="text" class="form-control" name="txtTarjeta" id="txtTarjeta" placeholder="Ej: 012345" maxlength="6" size="6" onkeypress="return valida(event,3);">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblTipo' for="LstTipo">Tipo de Llamada:</label>
    			<select id='LstTipo' class="form-control input-sm label-primary" name='LstTipo' onchange="Categorias();">
					<option>[Elegir una...]</option>
					<option>Pre-Pago</option>
					<option>Mesa de ayuda Sif</option>
					<option>Prueba</option>
					<option>Llamada Muda</option>
    			</select>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='lblContraseña' for="txtClave">Contraseña:</label>
    			<input type="text" class="form-control" name="txtClave" id="txtClave" placeholder="Contraseña" maxlength="10" size="10">
			</div>
		</div>

		<div class='Form-group'>
			<div id='DROPDOWN_CATEGORIA' class=''>
				<div class='col-md-12'>
					<label class='control-label' id='LblRazon' for="LstRazon">Categoria Llamada:</label>
	    			<select id='LstRazon' class="form-control input-sm label-primary" name='LstRazon' onchange="SubCategorias();">
						<option>[Elegir categoria...]</option>
	    			</select>
				</div>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblSubRazon' for="LstSubRazon">Sub-Categoria Llamada:</label>
    			<select id='LstSubRazon' class="form-control input-sm label-primary" name='LstSubRazon'">
					<option>[Elegir Sub-Categoria...]</option>
    			</select>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblSolucion' for="txtSolucion">&nbsp;&nbsp;Solución:</label>
    			<textarea class="form-control" name="txtSolucion" id="txtSolucion" rows="4" cols="100"></textarea>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblResultado' for="LstResultado">Resultado:</label>
    			<select id='LstResultado' class="form-control input-sm label-primary" name='LstResultado'">
					<option>[Elegir Resultado...]</option>
    			</select>
			</div>
		</div>

	</form>
		<br>
		<div class='col-md-6 text-center' id='BthBotones'>
			<button type='button' class='btn btn-primary' id='bthAgregar' name='bthAgregar' onclick="SendMovil();">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registar
    		</button>
 
    		<button type='button' class='btn btn-danger' id='bthClear' name='bthClear' onclick="LimpiarMovil();">
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

