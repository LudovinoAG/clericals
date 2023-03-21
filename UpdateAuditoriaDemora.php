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
			Mis Casos<span class="badge Format_Badge"><?php
		
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

		<td class="FILA_COUNT">
		Seguimientos<span class="badge Format_Badge"><?php
				
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
        }

        
      ?>
	</ul>

</div>
</div>

<!DOCTYPE html>
<html>
<head>
	<title>DATA Clericals - Auditar</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>
<br>
<br>
<br>
<div id="Cabecera">
	<span>Actualizar Casos Demora</span>
	<br>
	<br>
</div>

<?php

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$ID = $_GET['ID'];
			$sql = "SELECT * FROM auditdemora WHERE id='$ID'";
			$TotalEspecial = 0;

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');

			$RegEspecialUpdate = mysqli_fetch_row($result);
		
			mysqli_close($conexion);					
}

?>


<div class='Container'>
	<form class="form-inline" name='frmAuditDemora' action="SaveAuditoriaDemora.php" method="post">

		<input type="hidden" name="TxtID" value='<?php echo $RegEspecialUpdate[0]; ?>'>
		
		<div class='Form-group has-success'>
			<div class='col-md-6'>
				<label class='control-label' id='lblTitleTarjeta' for="txtOsadia">OSADIA:</label>
    			<input type="text" class="form-control" name="txtOsadia" id="txtOsadia" maxlength="6" size="6" value='<?php echo $RegEspecialUpdate[1]; ?>'>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-6'>
				<label class='control-label' id='lblTitleAgente' for="txtStatus">Cliente:</label>
    			<input type="text" class="form-control" name="txtStatus" id="txtStatus" maxlength="60" size="35" value='<?php echo $RegEspecialUpdate[2]; ?>'>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-6'>
				<label class='control-label' id='lblTitleAgente' for="txtStatus">Demorada Por:</label>
    			<input type="text" class="form-control" name="txtStatus" id="txtStatus" maxlength="60" size="35" value='<?php echo $RegEspecialUpdate[3]; ?>'>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-6'>
				<label class='control-label' id='lblTitleOsadia' for="txtHallazgo">Hallazgo:
    			<textarea name='txtHallazgo' id='txtHallazgo' cols="73" rows="4"><?php echo $RegEspecialUpdate[7]; ?></textarea></label>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-6'>
				<label class='control-label' id='lblTitleOsadia' for="txtComentario">Comentarios:
    			<textarea name='txtComentario' id='txtComentario' cols="73" rows="4"><?php echo $RegEspecialUpdate[8]; ?></textarea></label>
			</div>
		</div>
				<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='lblResultado' for="LstResultado">Resultado:</label>
    			<select id='LstResultado' class="form-control input-sm label-primary" name='LstResultado'>
					<option>Bien demorada/Mal trabajado</option>
					<option>Bien trabajado</option>
					<option>Mal trabajado</option>
					<option>Bien demorada</option>
					<option>Mal demorada</option>
					
    			</select>
			</div>
		</div>
		

		<div class='col-md-12' id='BthBotones'>
			<button type='submit' class='btn btn-success' id='bthGuardar' name='bthGuardar'>
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Actualizar
    		</button>
		</div>

	</form>
		


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
<footer class="FOOTER">
  <div class="Marco_Copyright">
      <span class="Texto_Copyright">
          DATA Clericals - Soporte a Ventas @ 2017 - 2018<br>
          <span class="Texto_Empresa">AMOV International Teleservices.</span>
      </span>
  </div>
</footer>




</body>

<script type="text/javascript" src="js/jquery-3.2.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
</html>

