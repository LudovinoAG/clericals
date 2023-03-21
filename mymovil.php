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
<div id="Cabecera">
	<span>Mis Llamadas Movil</span>
	<br>
	<br>
</div>

<div class="table-responsive">
  <table class="table text-center table-hover">
  	
		<tr class='success'>
		  <td class='Encabezado'>No.</td>
		  <td class='Encabezado'>Dealer</td>
		  <td class='Encabezado'>Numero Dealer</td>
		  <td class='Encabezado'>Nombre/Tarjeta Vendedor</td>
		  <td class='Encabezado'>Tracker</td>
		  <td class='Encabezado'>Tipo de Llamada</td>
		  <td class='Encabezado'>Categoria</td>
		  <td class='Encabezado'>Sub-Categoria</td>
		  <td class='Encabezado'>Solución</td>
		  <td class='Encabezado'>Resultado</td>
		  <td class='Encabezado'>Fecha/Hora</td>
		</tr>
	
		<?php
			if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM movil WHERE Tarjeta='$Usuario' AND Fecha='$FECHA'";

					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
					$count = 0;
					while($RegAgent=mysqli_fetch_array($result))
						{
							$count++;
							
							echo "<tr id='filasData'>
									<td>$count</td>
									<td>$RegAgent[3]</td>
									<td>$RegAgent[4]</td>
									<td>$RegAgent[5] [$RegAgent[6]]</td>
									<td>$RegAgent[7]</td>
									<td>$RegAgent[8]</td>
									<td>$RegAgent[12]</td>
									<td>$RegAgent[13]</td>
									<td>$RegAgent[9]</td>
									<td>$RegAgent[14]</td>
									<td>$RegAgent[10] [$RegAgent[11]]</td>
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

<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
</html>

