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
		<td class="FormatSEG"><a href="mydemoraaudit.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
			Mis auditoria<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM auditdemora WHERE AuditadaPor='$Usuario' AND FechaAuditoria='$FECHA'";
			$TotalAuditDemora = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
		
			while($RegDemora=mysqli_fetch_array($result))
				{
					$TotalAuditDemora = $TotalAuditDemora + 1;
								
				}
			echo $TotalAuditDemora;
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
			    <li class="LISTA_CASOS">Demoradas<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">No Demoradas<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Cancelada<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Seguimientos<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
		</td>

		<td class="FILA_COUNT">
		Casos Pendientes<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM auditdemora WHERE FechaDemora='$FECHA' AND Auditada='0'";
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

				<td class="FILA_COUNT">
		Casos Auditados<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM auditdemora WHERE FechaDemora='$FECHA' AND Auditada='1'";
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


				<td class="FILA_COUNT">
		Total<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM auditdemora WHERE FechaDemora='$FECHA'";
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
	<title>DATA Clericals - Auditar Demoras</title>
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
	<span>Casos auditados</span>
</div>

<br>
<div class="table-responsive">
  <table class="table text-center table-hover">
  	
		<tr class='success'>
		  <td class='Encabezado' width="100">Action</td>
		  <td class='Encabezado' width="50">No.</td>
		  <td class='Encabezado' width="100">OS</td>
		  <td class='Encabezado' width="100">Cliente</td>
		  <td class='Encabezado' width="100">Demorada Por</td>
		  <td class='Encabezado' width="100">Fecha Demora</td>
		  <td class='Encabezado' width="100">Auditada Por</td>
		  <td class='Encabezado' width="100">Resultado</td>
		  <td class='Encabezado' width="100">Hallazgo</td>
		  <td class='Encabezado' width="100">Comentarios</td>
		  <td class='Encabezado' width="100">Fecha Auditoria</td>
		</tr>
	
		<?php
			if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM auditdemora WHERE FechaDemora='$FECHA' AND Auditada='1'";
					
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
					$count = 0;
					while($RegAgent=mysqli_fetch_array($result))
						{
							$count++;
							echo "<tr id='filasData'>
									<td><a href='UpdateAuditoriaDemora.php?ID=$RegAgent[0]'><button class='btn btn-warning btn-sx'><span class='glyphicon glyphicon-pencil'></span></button></a>
										</td>
									<td>$count</td>
									<td>$RegAgent[1]</td>
									<td>$RegAgent[2]</td>
									<td>$RegAgent[3]</td>
									<td>$RegAgent[4]</td>
									<td>$RegAgent[5]</td>
									<td>$RegAgent[6]</td>
									<td>$RegAgent[7]</td>
									<td>$RegAgent[8]</td>
									<td>$RegAgent[9]</td>
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
