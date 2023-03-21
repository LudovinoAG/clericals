<meta charset="utf-8">
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
<!DOCTYPE html>
<html>
<head>
	<title>DATA Clericals - TRACKER</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/estilos2.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
<br>
<br>
<br>
<br>
<div id="Cabecera">
	<span>Tracker de Ventas<br><font size="3pts" color='blue'> Data Clericals</font></span>
	<br>
</div>
<br>

<div class='Container'>
	<div id='contenedortracker'>
	

		<?php 

		
	
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$FECHA = date('n/j/Y');
			$Total2PLAY = "SELECT count(id) FROM emisiones WHERE Fecha='11/21/2018' AND Tipo='2Play' AND Estado='Correcta'";

			$result2 = mysqli_query($conexion, $Total2PLAY);

			

		?>
			<div id='tituloPrincipal'>
			   		   		<span>TRACKER DEL DIA</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Ventas: 0</span>
			   		   		</div>
			   		   	</div>

			   		   	<br>
			   		   
						<table class='table table-condensed' id='TablaReportes'>
							
							<tr class='info Formato'>
								<th>Intervalos</th>
								<th>2Play</th>
								<th>Linea Sencilla</th>
								<th>IPTV Standallone</th>
								<th>Internet Standallone</th>
								<th>DISH Standallone</th>
								<th>3Play/IPTV</th>
								<th>3Play/DISH</th>
								<th>Portabilidad</th>
								<th>Claro Hogar</th>
								<th>FWA</th>
							</tr>

							<?php
							  while($fila2Play=mysqli_fetch_array($result2)) {


							?>
								
								<tr class='active text-center' style="font-size: 12pt;">
									<td>7am</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center'  style="font-size: 12pt;">
									<td>8am</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>9am</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>10am</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>11am</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>12pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>1pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>2pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>3pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>4pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>5pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>6pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>7pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>8pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>9pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>
								<tr class='active text-center' style="font-size: 12pt;">
									<td>10pm</td>
																		<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
								</tr>


							
							<?php } ?>
							</table>

						<?php mysqli_close($conexion); ?>



		
		<?php } ?>

	
						
						
	</div>
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

