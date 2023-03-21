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
      <li role="presentation" class="FormatBTN"><a href="fwa.php">FWA</a></li>
      <?php
        if($_SESSION["Perfil"]=='11'){
          echo "<li role='presentation' class='FormatBTN'><a href='Auditoria.php'>Auditar</a></li>";
        }
        else if($_SESSION["Perfil"]=='10'){
          echo "<li role='presentation' class='FormatBTN'><a href='EspecialDemora.php'>Especiales</a></li>";
        }

        else if($_SESSION["Perfil"]=='1'){
          echo "<li role='presentation' class='FormatBTN active'><a href='admin.php'>Administrativo</a></li>";
          echo "<li role='presentation' class='FormatBTN'><a href='Reportes.php'>Reportes</a></li>";
        }

        
      ?>
	</ul>
</div>

<!DOCTYPE html>
<html>
<head>
	<title>DATA Clericals - Administracion de DATA</title>
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
	<span>Panel de Control<br><font size="3pts" color='blue'> Data Clericals</font></span>
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

	<form class="form-inline" name='frmAdmin' action="control.php" method="post" enctype="multipart/form-data">
		<table >
		<th class='TituloArchivos'>Data Demora Especial</th>

		<tr>
			<td>
				<label class='TituloSecundario'>Elije el archivo:
	    		<input type="file" name="MyFile" accept=".csv" />
	    		</label>
	    	</td>
		</tr>

		<tr>
			<td>
				<label class='TituloSecundario'>Instrucciones:<br>
	    		<textarea name='txtInstrucciones' cols="25" rows="5"></textarea>
	    		</label>
			</td>
		</tr>



		<tr>
			<td>
				<button type='submit' class='btn btn-success' id='bthAgregar' name='bthAgregar'>
	    		<span class="glyphicon glyphicon-circle-arrow-up" aria-hidden="true"></span> Subir Data
	    		</button>
	    	</td>
		</tr>

 		</table>
	</form>

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


<script language="javascript" type="text/javascript" src='js/jquery-3.2.0.min.js'></script>
<script language="javascript" type="text/javascript" src='js/bootstrap.min.js'></script>
<script language="javascript" type="text/javascript" src='js/funciones.js'></script>
</html>

