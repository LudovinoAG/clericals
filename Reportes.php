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
<div id='Botones'>
  <ul class="nav nav-tabs">
      <li role="presentation" class="FormatBTN"><a href="index.php">Inicio</a></li>
      <li role="presentation" class="FormatBTN"><a href="regmac.php">MAC</a></li>
      <li role="presentation" class="FormatBTN"><a href="demora.php">Demora</a></li>
      <li role="presentation" class="FormatBTN"><a href="status.php">Status</a></li>
      <li role="presentation" class="FormatBTN"><a href="emisiones.php">Emisiones</a></li>
      <li role="presentation" class="FormatBTN"><a href="movil.php">Movil</a></li>
      <li role="presentation" class="FormatBTN"><a href="fwa.php">FWA y CH</a></li>
      <?php
        if($_SESSION["Perfil"]=='11'){
          echo "<li role='presentation' class='FormatBTN'><a href='Auditoria.php'>Auditar</a></li>";
        }
        else if($_SESSION["Perfil"]=='10'){
          echo "<li role='presentation' class='FormatBTN'><a href='EspecialDemora.php'>Especiales</a></li>";
        }

        else if($_SESSION["Perfil"]=='1'){
          echo "<li role='presentation' class='FormatBTN'><a href='admin.php'>Administrativo</a></li>";
          echo "<li role='presentation' class='FormatBTN active'><a href='Reportes.php'>Reportes</a></li>";
        }

        
      ?>
	</ul>
</div>

<!DOCTYPE html>
<html>
<head>
	<title>DATA Clericals - Reportes</title>
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
	<span>Control de Reportes<br><font size="3pts" color='blue'> Data Clericals</font></span>
	<br>
</div>
<br>

<div class='Container'>
<!-- 
	<form class="form-inline" name='frmAdmin' action="control.php" method="post" enctype="multipart/form-data">
		<table>
		<th class='TituloArchivos'>Reporte Demora Especial</th>
		
		<tr>
			<td>
				<label class='TituloSecundario'>Casos MAC 71</label>
	    	</td>
		</tr>

		<tr>
			<td>
				<a href="ControlExportar.php"><button type='button' class='btn btn-success' id='bthAgregar' name='bthAgregar'>
	    		<span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span>Descargar Archivo
	    		</button></a>
	    	</td>

		</tr>


 		</table>
	</form>
-->
</div>

<div id='Controles'>
<form action="Reportes.php" method="post" class='form-inline'>

	<div class='Form-group'>
		<div class='col-xs-6 col-md-12'>
			<LABEL>Reportes:</LABEL>
			<select class='form-control' name='LstReporte' id='LstReporte'>
				<option>Emisiones</option>
				<option>Status</option>
				<option>Demora</option>
				<option>Movil</option>
				<option disabled="yes">-Reportes Especiales-</option>
				<option>Todas Emisiones</option>
				<option>Auditoria Demora</option>
				<option>Demora MAC 71</option>
				<option>Status TMK</option>
				<option>Emisiones Claro Hogar</option>
				<option>Demora TMK</option>
				<option>Casos FWA</option>
			</select>
		</div>
	</div>

	<div class='Form-group'>
		<div class='col-xs-6 col-md-12'>
			<LABEL>Fecha Inicio:</LABEL>
			<input class='form-control' name='LstDias' type='text' value="<?php echo date('n/j/Y'); ?>"  size='8'>
		</div>
	</div>

	<div class='Form-group'>
		<div class='col-xs-6 col-md-12'>
			<LABEL>Fecha Final:</LABEL>
			<input class='form-control' name='LstDias2' type='text' value="<?php echo date('n/j/Y'); ?>"  size='8'>
		</div>
	</div>

	<br>
	<br>
	<br>



	<input class='btn btn-info btn-lg' type="submit" name="bthDia" Value='Buscar' id='BthBuscar'>

</div>
<br>
<div id='contenedorReportes'>
	<?php 

		header('Content-Type: text/html; charset=UTF-8'); 
	
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			if(isset($_POST['LstDias'])){


			$FECHA = $_POST['LstDias'];
			$FECHA2 = $_POST['LstDias2'];
			$TipoReporte = $_POST['LstReporte'];


			//if(isset($_POST['LstDias'])){
			//	$Dias = $_POST['LstDias'];
			//}
			//$Formato = date_format($FECHA,"d/m/Y");
			//

			$TotalClaroHogar = "SELECT count(id) FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND Tipo='Claro Hogar'";
			$ConsultaClaroHogar = "SELECT * FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND Tipo='Claro Hogar' ORDER BY Tipo";

			$TotalStatus = "SELECT count(id) FROM status WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'  AND AccionTomada='Tranferencia a TMK'";
			$ConsultaStatus = "SELECT * FROM status WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND AccionTomada='Tranferencia a TMK' ORDER BY Representante";

			$TotalStatusGeneral = "SELECT count(id) FROM status WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaStatusGeneral = "SELECT * FROM status WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'  ORDER BY Representante";
			
			$TotalDemora = "SELECT count(id) FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaDemora = "SELECT * FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Estado DESC";

			///Claro Hogar Demora
			$TotalDemoraHogar = "SELECT count(id) FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND 
			TransferTMK='Si'";
			$ConsultaDemoraHogar = "SELECT * FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND 
			TransferTMK='Si'  ORDER BY AccionDemora DESC";
			//**********////////////////////////////////////
			$TotalAuditDemora = "SELECT count(id) FROM auditdemora WHERE FechaDemora BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaAuditDemora = "SELECT * FROM auditdemora WHERE FechaDemora BETWEEN '$FECHA' AND '$FECHA2' ORDER BY DemoradaPor";

			$TotalRegistros = "SELECT count(id) FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND SubRazon='Orden Emitida'";
			$Consulta = "SELECT * FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' AND SubRazon='Orden Emitida' ORDER BY Representante";

			$TotalRegistrosEmisiones = "SELECT count(id) FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaTodosEmisiones = "SELECT * FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Representante";

			$TotalRegistrosMovil = "SELECT count(id) FROM movil WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaMovil = "SELECT * FROM movil WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY ID ASC";

			$TotalRegistrosFWA = "SELECT count(id) FROM ventasfwa WHERE FechaVenta BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaFWA = "SELECT * FROM ventasfwa WHERE FechaVenta BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Servicio ASC";

			//echo $Dias;

			$result2 = mysqli_query($conexion, $TotalRegistros);
			$result3 = mysqli_query($conexion, $Consulta);

			$resultTodosCant = mysqli_query($conexion, $TotalRegistrosEmisiones);
			$resultTodosEmisiones = mysqli_query($conexion, $ConsultaTodosEmisiones);

			$resultDemoraTotal = mysqli_query($conexion, $TotalDemora);
			$resultDemoraCasos = mysqli_query($conexion, $ConsultaDemora);

			//Claro Hogar Demora
			$resultDemoraTotalHogar = mysqli_query($conexion, $TotalDemoraHogar);
			$resultDemoraCasosHogar = mysqli_query($conexion, $ConsultaDemoraHogar);
			//**********************
			$resultStatusGeneralTotal = mysqli_query($conexion, $TotalStatusGeneral);
			$resultStatusGeneralCasos = mysqli_query($conexion, $ConsultaStatusGeneral);

			$resultStatusTotal = mysqli_query($conexion, $TotalStatus);
			$resultStatusCasos = mysqli_query($conexion, $ConsultaStatus);
			////Claro Hogar/*****************************************************
			$resultClagoHogarTotal = mysqli_query($conexion, $TotalClaroHogar);
			$resultClaroHogarCasos = mysqli_query($conexion, $ConsultaClaroHogar);
			//////////////**********////////////////////////////////*////////////
			$resultDemoraAuditTotal = mysqli_query($conexion, $TotalAuditDemora);
			$resultDemoraAuditCasos = mysqli_query($conexion, $ConsultaAuditDemora);

			$resultMovilTotal = mysqli_query($conexion, $TotalRegistrosMovil);
			$resultMovilCasos = mysqli_query($conexion, $ConsultaMovil);
			//////Casos FWA//****************************************************
			$resultFWATotal = mysqli_query($conexion, $TotalRegistrosFWA);
			$resultFWACasos = mysqli_query($conexion, $ConsultaFWA);


			$fila2=mysqli_fetch_row($result2);
			$fila3=mysqli_fetch_row($resultTodosCant);

			$filaDemoraTotal=mysqli_fetch_row($resultDemoraTotal);
			$filaDemoraTotalHogar=mysqli_fetch_row($resultDemoraTotalHogar);
			$filaDemoraAuditTotal=mysqli_fetch_row($resultDemoraAuditTotal);

			$filaClaroHogarTotal=mysqli_fetch_row($resultClagoHogarTotal);

			$filaStatusTotal=mysqli_fetch_row($resultStatusTotal);

			$filaStatusGeneralTotal=mysqli_fetch_row($resultStatusGeneralTotal);

			$filaMovilTotal=mysqli_fetch_row($resultMovilTotal);

			$filaFWATotal=mysqli_fetch_row($resultFWATotal);

			if($fila2[0]<0){$Total = $fila2[0] - 1;}else{$Total =  $fila2[0];} 

			if($fila3[0]<0){$Total2 = $fila3[0] - 1;}else{$Total2 =  $fila3[0];} 

			if($filaDemoraTotal[0]<0){$TotalDemora = $filaDemoraTotal[0] - 1;}else{$TotalDemora = $filaDemoraTotal[0];}

			if($filaDemoraTotalHogar[0]<0){$TotalDemoraHogar = $filaDemoraTotalHogar[0] - 1;}else{$TotalDemoraHogar = $filaDemoraTotalHogar[0];}

			if($filaDemoraAuditTotal[0]<0){$TotalAuditDemora = $filaDemoraAuditTotal[0] - 1;}else{$TotalAuditDemora = $filaDemoraAuditTotal[0];}

			if($filaMovilTotal[0]<0){$TotalMovil = $filaMovilTotal[0] - 1;}else{$TotalMovil = $filaMovilTotal[0];} 

			if($filaStatusTotal[0]<0){$TotalStatus = $filaStatusTotal[0] - 1;}else{$TotalStatus = $filaStatusTotal[0];}

			if($filaStatusGeneralTotal[0]<0){$TotalGeneralStatus = $filaStatusGeneralTotal[0] - 1;}else{$TotalGeneralStatus = $filaStatusGeneralTotal[0];}

			if($filaClaroHogarTotal[0]<0){$TotalClaroHogar = $filaClaroHogarTotal[0] - 1;}else{$TotalClaroHogar = $filaClaroHogarTotal[0];}

			if($filaFWATotal[0]<0){$TotalFWA = $filaFWATotal[0] - 1;}else{$TotalFWA = $filaFWATotal[0];}

			
			//$fila3=mysqli_fetch_row($result3);
			//$filaDemoraCasos=mysqli_fetch_row($resultDemoraCasos);
			//$filaMovilCasos=mysqli_fetch_row($resultMovilCasos);
			?>
				<?php
				if($TipoReporte=='Emisiones'){
				?>
						
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE DE EMISIONES</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Emitidas: <?php echo $Total; ?></span>
			   		   		</div>
			   		   	</div>

			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>Tarjeta</th>
								<th>Representante</th>
								<th>Producto</th>
								<th>Vendedor</th>
								<th>ID Vendedor</th>
								<th>Canal</th>
								<th>Leader/Supervisor</th>
								<th>Mac</th>
								<th>COPS</th>
								<th>OSADIA</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Razon</th>
								<th>Sub-Razon</th>
								<th>Direccion</th>
								<th>Pueblo</th>
								<th>Razon Emision</th>

							</tr>

	
						<?php
			   		   	while($fila3=mysqli_fetch_array($result3)) {
							
			   		   		$Representante = strtoupper($fila3[2]);
			   		   		$Vendedor = strtoupper($fila3[4]);
			   		   		$Canal = strtoupper($fila3[6]);
			   		   	?>
								<tr class='active'>
									<td><?php echo $fila3[1]; ?></td>
									<td><?php echo $Representante; ?></td>
									<td><?php echo $fila3[3]; ?></td>
									<td><?php echo $Vendedor; ?></td>
									<td><?php echo $fila3[5]; ?></td>
									<td><?php echo $Canal;    ?></td>
									<td><?php echo $fila3[21]; ?></td>
									<td><?php echo $fila3[7]; ?></td>
									<td><?php echo $fila3[9]; ?></td>
									<td><?php echo $fila3[10]; ?></td>
									<td><?php echo $fila3[12]; ?></td>
									<td><?php echo $fila3[13]; ?></td>
									<td><?php echo $fila3[15]; ?></td>
									<td><?php echo $fila3[56]; ?></td>
									<td><?php echo $fila3[16]; ?></td>
									<td><?php echo $fila3[43]; ?></td>
									<td><?php echo $fila3[57]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

					

				<?php
				}elseif($TipoReporte=='Todas Emisiones'){
				?>
						
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE DE TIIFICACION EMISIONES</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Registros: <?php echo $Total2; ?></span>
			   		   		</div>
			   		   	</div>

			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>Tarjeta</th>
								<th>Representante</th>
								<th>Producto</th>
								<th>Vendedor</th>
								<th>ID Vendedor</th>
								<th>Canal</th>
								<th>Leader/Supervisor</th>
								<th>Mac</th>
								<th>COPS</th>
								<th>OSADIA</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Razon</th>
								<th>Sub-Razon</th>
								<th>Direccion</th>
								<th>Pueblo</th>
								<th>Razon Emision</th>
							</tr>

	
						<?php
			   		   	while($fila3=mysqli_fetch_array($resultTodosEmisiones)) {
							
			   		   		$Representante = strtoupper($fila3[2]);
			   		   		$Vendedor = strtoupper($fila3[4]);
			   		   		$Canal = strtoupper($fila3[6]);
			   		   	?>
								<tr class='active'>
									<td><?php echo $fila3[1]; ?></td>
									<td><?php echo $Representante; ?></td>
									<td><?php echo $fila3[3]; ?></td>
									<td><?php echo $Vendedor; ?></td>
									<td><?php echo $fila3[5]; ?></td>
									<td><?php echo $Canal;    ?></td>
									<td><?php echo $fila3[21]; ?></td>
									<td><?php echo $fila3[7]; ?></td>
									<td><?php echo $fila3[9]; ?></td>
									<td><?php echo $fila3[10]; ?></td>
									<td><?php echo $fila3[12]; ?></td>
									<td><?php echo $fila3[13]; ?></td>
									<td><?php echo $fila3[15]; ?></td>
									<td><?php echo $fila3[56]; ?></td>
									<td><?php echo $fila3[16]; ?></td>
									<td><?php echo $fila3[43]; ?></td>
									<td><?php echo $fila3[57]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>



					<!-- En caso de seleccionar Demoras -->
		    	<?php
				}elseif($TipoReporte=='Demora'){
				?>
					
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS DEMORAS</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Demora: <?php echo $TotalDemora; ?></span>
			   		   			<br>
			   		   				
					   		   	<a href="ControlDEMORA.php?Fecha=<?php echo $_POST['LstDias'];?>&Fecha2=<?php echo $_POST['LstDias2'];?>"><button type='button' class='btn btn-success' id='bthAgregar' name='bthAgregar'>
							    <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> Descargar log
							    </button></a>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							
							<tr class='info'>
								<th class="FormateoCeldas">#</th>
								<th class="FormateoCeldas">Agente SV</th>
								<th class="FormateoCeldas">ID/Tenico</th>
								<th class="FormateoCeldas">Compañia</th>
								<th class="FormateoCeldas">Cliente</th>
								<th class="FormateoCeldas">Contactos</th>
								<th class="FormateoCeldas">Mac Actual</th>
								<th class="FormateoCeldas">Mac Final</th>
								<th class="FormateoCeldas">Tracker</th>
								<th class="FormateoCeldas">OSADIA</th>
								<th class="FormateoCeldas">Fecha</th>
								<th class="FormateoCeldas">Hora</th>
								<th class="FormateoCeldas">Motivo</th>
								<th class="FormateoCeldas">Razon</th>
								<th class="FormateoCeldas">Resultado</th>
								<th class="FormateoCeldas">Pueblo</th>
								<th class="FormateoCeldas">GPON</th>
							</tr>
							
	
						<?php
						$Count = 0;
			   		   	while($filaDemoraCasos=mysqli_fetch_array($resultDemoraCasos)) {
							
			   		   		$Representante = strtoupper($filaDemoraCasos[2]);
			   		   		$Cliente = strtoupper($filaDemoraCasos[17]);
			   		   		$Tecnico = strtoupper($filaDemoraCasos[3]);
			   		   		$Compañia = strtoupper($filaDemoraCasos[5]);
			   		   		$Count++;
			   		   	?>
								<tr class='active'>
									<td><?php echo $Count; ?></td>
									<td><?php echo $Representante; ?></td>
									<td><?php echo "[" . $filaDemoraCasos[4] ."]" ." ". $Tecnico; ?></td>
									<td><?php echo $Compañia; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaDemoraCasos[18]; ?></td>
									<td><?php echo $filaDemoraCasos[6]; ?></td>
									<td><?php echo $filaDemoraCasos[7]; ?></td>
									<td><?php echo $filaDemoraCasos[8]; ?></td>
									<td><?php echo $filaDemoraCasos[10]; ?></td>
									<td><?php echo $filaDemoraCasos[12]; ?></td> 
									<td><?php echo $filaDemoraCasos[13]; ?></td>
									<td><?php echo $filaDemoraCasos[14]; ?></td>
									<td><?php echo $filaDemoraCasos[15]; ?></td>
									<td><?php echo $filaDemoraCasos[25]; ?></td>
									<td><?php echo $filaDemoraCasos[26]; ?></td>
									<td><?php echo $filaDemoraCasos[24]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

				<!-- En caso de seleccionar Demoras Claro Hogar -->
		    	<?php
				}elseif($TipoReporte=='Demora TMK'){
				?>
					
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE DEMORA CON CLARO HOGAR TMK</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Casos: <?php echo $TotalDemoraHogar; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th class="FormateoCeldas">#</th>
								<th class="FormateoCeldas">Cliente</th>
								<th class="FormateoCeldas">Contactos</th>
								<th class="FormateoCeldas">OSADIA</th>
								<th class="FormateoCeldas">Mac Final</th>
								<th class="FormateoCeldas">Motivo</th>
								<th class="FormateoCeldas">Razon</th>
								<th class="FormateoCeldas">Fecha</th>
								<th class="FormateoCeldas">Hora</th>
								<th class="FormateoCeldas">Agente SV</th>
								<th class="FormateoCeldas">Resultado</th>
							</tr>

	
						<?php
						$Count = 0;
			   		   	while($filaDemoraCasosHogar=mysqli_fetch_array($resultDemoraCasosHogar)) {
							
			   		   		$Representante = strtoupper($filaDemoraCasosHogar[2]);
			   		   		$Cliente = strtoupper($filaDemoraCasosHogar[17]);
			   		   		$Tecnico = strtoupper($filaDemoraCasosHogar[3]);
			   		   		$Compañia = strtoupper($filaDemoraCasosHogar[5]);
			   		   		$Count++;
			   		   	?>
								<tr class='active'>
									<td><?php echo $Count; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaDemoraCasosHogar[18]; ?></td>
									<td><?php echo $filaDemoraCasosHogar[10]; ?></td>
									<td><?php echo $filaDemoraCasosHogar[7]; ?></td>
									<td><?php echo $filaDemoraCasosHogar[14]; ?></td>
									<td><?php echo $filaDemoraCasosHogar[15]; ?></td>
									<td><?php echo $filaDemoraCasosHogar[12]; ?></td> 
									<td><?php echo $filaDemoraCasosHogar[13]; ?></td> 
									<td><?php echo $Representante; ?></td>
									<td><?php echo $filaDemoraCasosHogar[25]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>


					<!--Auditoria Demora -->
				<?php
				}elseif($TipoReporte=='Auditoria Demora'){
				?>
					
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS DEMORAS</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Demora: <?php echo $TotalAuditDemora; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>OS</th>
								<th>Cliente</th>
								<th>Demorada Por</th>
								<th>Fecha Demora</th>
								<th>Auditada Por</th>
								<th>Resultado</th>
								<th>Hallazgo</th>
								<th>Comentarios</th>
								<th>Fecha Auditoria</th>
							</tr>

	
						<?php
			   		   	while($filaDemoraAuditCasos=mysqli_fetch_array($resultDemoraAuditCasos)) {

			   		   	?>
								<tr class='active'>
									<td><?php echo $filaDemoraAuditCasos[1]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[2]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[3]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[4]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[5]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[6]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[7]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[8]; ?></td>
									<td><?php echo $filaDemoraAuditCasos[9]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>


						<!--En caso de Seleccionar STATUS TMK -->
						<?php
						}elseif($TipoReporte=='Status TMK'){
						?>
							
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS STATUS</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Status: <?php echo $TotalStatus; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>Cliente</th>
								<th>Contactos</th>
								<th>OSADIA</th>
								<th>Mac Actual</th>
								<th>Situacion</th>
								<th>Acción Tomada</th>
								<th>Agente TMK</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Agente SV</th>								
							</tr>

	
						<?php
			   		   	while($filaStatusCasos=mysqli_fetch_array($resultStatusCasos)) {
							
			   		   		$Representante = strtoupper($filaStatusCasos[2]);
			   		   		$Cliente = strtoupper($filaStatusCasos[5]);
			   		   	?>
								<tr class='active'>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaStatusCasos[19] . "-" . $filaStatusCasos[20];?></td>
									<td><?php echo $filaStatusCasos[10]; ?></td>
									<td><?php echo $filaStatusCasos[7]; ?></td>
									<td><?php echo $filaStatusCasos[16]; ?></td>
									<td><?php echo $filaStatusCasos[15]; ?></td>
									<td><?php echo $filaStatusCasos[18]; ?></td>
									<td><?php echo $filaStatusCasos[12]; ?></td>
									<td><?php echo $filaStatusCasos[13]; ?></td>

									<td><?php echo $Representante; ?></td>							
									
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

						<!--En caso de Seleccionar STATUS GENERAL -->
						<?php
						}elseif($TipoReporte=='Status'){
						?>
							
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS STATUS</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Status: <?php echo $TotalGeneralStatus; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>OSADIA</th>
								<th>Nombre</th>
								<th>ID/Tecnico</th>
								<th>Cliente</th>
								<th>Canal</th>
								<th>Mac</th>
								<th>AAV</th>
								<th>COPS</th>
								<th>Estado</th>
								<th>Accion Tomada</th>
								<th>Situacion</th>
								<th>Fecha</th>
								<th>Hora</th>							
							</tr>

	
						<?php
			   		   	while($filaStatusGeneralCasos=mysqli_fetch_array($resultStatusGeneralCasos)) {
							
			   		   		$Representante = strtoupper($filaStatusGeneralCasos[2]);
			   		   		$Cliente = strtoupper($filaStatusGeneralCasos[5]);
			   		   		$Tecnico = strtoupper($filaStatusGeneralCasos[3]); 
			   		   	?>
								<tr class='active'>
									<td><?php echo $filaStatusGeneralCasos[10]; ?></td>
									<td><?php echo $Representante; ?></td>
									<td><?php echo "[". $filaStatusGeneralCasos[4] ."]" ." ". $Tecnico; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaStatusGeneralCasos[6]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[7]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[8]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[9]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[14]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[15]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[16]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[12]; ?></td>
									<td><?php echo $filaStatusGeneralCasos[13]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>


						<!--En caso de Seleccionar ClaroHogar -->
						<?php
						}elseif($TipoReporte=='Emisiones Claro Hogar'){
						?>

						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS CLARO HOGAR</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Claro Hogar: <?php echo $TotalClaroHogar; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>Fecha Contrato</th>
								<th>Servicio</th>
								<th>Osadia</th>
								<th>Ban</th>
								<th>Cliente</th>
								<th>Contactos</th>
								<th>Canal</th>
								<th>Email</th>
								<th>Direccion Fisica</th>
								<th>Direccion Postal</th>
								<th>Punto de Referencia</th>
								<th>Autorizado</th>
								<th>Contacto Autorizado</th>
								<th>Mac</th>
								<th>Fecha Venta</th>				
							</tr>

						<?php
			   		   	while($filaClaroHogarCasos=mysqli_fetch_array($resultClaroHogarCasos)) {
							
			   		   		$Cliente = strtoupper($filaClaroHogarCasos[33]);
			   		   	?>
								<tr class='active'>
									<td><?php echo $filaClaroHogarCasos[12]; ?></td>
									<td><?php echo $filaClaroHogarCasos[3]; ?></td>
									<td><?php echo $filaClaroHogarCasos[10]; ?></td>
									<td><?php echo $filaClaroHogarCasos[36]; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaClaroHogarCasos[34] ."-". $filaClaroHogarCasos[35]; ?></td>
									<td><?php echo $filaClaroHogarCasos[6]; ?></td>
									<td><?php echo $filaClaroHogarCasos[37]; ?></td>
									<td><?php echo $filaClaroHogarCasos[20]; ?></td>
									<td><?php echo $filaClaroHogarCasos[38]; ?></td>
									<td><?php echo $filaClaroHogarCasos[39]; ?></td>
									<td><?php echo $filaClaroHogarCasos[40]; ?></td>
									<td><?php echo $filaClaroHogarCasos[41]; ?></td>
									<td><?php echo $filaClaroHogarCasos[7]; ?></td>
									<td><?php echo $filaClaroHogarCasos[55]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>


						<!--En caso de Seleccionar Casos FWA -->
						<?php
						}elseif($TipoReporte=='Casos FWA'){
							$Count = 0;
						?>

						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS FWA</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Casos FWA: <?php echo $TotalFWA; ?></span>
			   		   			<br>
			   		   				

				   		   	<a href="ControlFWA.php?Fecha=<?php echo $_POST['LstDias'];?>&Fecha2=<?php echo $_POST['LstDias2'];?>"><button type='button' class='btn btn-success' id='bthAgregar' name='bthAgregar'>
						    <span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> Descargar log
						    </button></a>
					    		
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>Act.</th>
								<th>#</th>
								<th>Servicio</th>
								<th>Fecha Contrato</th>
								<th>Canal</th>
								<th>Vendedor</th>
								<th>Cod. Vendedor</th>
								<th>Aprobado CIVS</th>
								<th># Aprobacion CIVS</th>
								<th>CreditClass</th>
								<th>Producto</th>
								<th>Monto$</th>
								<th>BAN</th>
								<th>Paquete Ofertado</th>
								<th>Equipo</th>
								<th>Cliente</th>
								<th>Contacto1</th>
								<th>Contacto2</th>
								<th>Venta Completada</th>
								<th>Agente SV</th>
								<th>Tracker</th>				
							</tr>

						<?php
			   		   	while($filaFWACasos=mysqli_fetch_array($resultFWACasos)) {
							
			   		   		$Cliente = strtoupper($filaFWACasos[15]);
			   		   		$Count++;
			   		   	?>
								<tr class='active'>
									<td>
										<?php
										echo "<a href='FWAEditar.php?id=$filaFWACasos[0]'><button class='btn btn-warning btn-sm data-toggle='tooltip' data-placement='bottom' title='Editar'><span class='glyphicon glyphicon-pencil'></span></button></a>&nbsp";  
										?>
									</td>
									<td><?php echo $Count; ?></td>
									<td><?php echo $filaFWACasos[4]; ?></td>
									<td><?php echo $filaFWACasos[2]; ?></td>
									<td><?php echo $filaFWACasos[3]; ?></td>

									<td><?php echo $filaFWACasos[1]; ?></td>
									<td><?php echo $filaFWACasos[38]; ?></td>
									<td><?php echo $filaFWACasos[5]; ?></td>
									<td><?php echo $filaFWACasos[6]; ?></td>
									<td><?php echo $filaFWACasos[7]; ?></td>
									<td><?php echo $filaFWACasos[9]; ?></td>
									
									<td><?php echo $filaFWACasos[11]; ?></td>
									<td><?php echo $filaFWACasos[12]; ?></td>
									<td><?php echo $filaFWACasos[13]; ?></td>
									<td><?php echo $filaFWACasos[14]; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaFWACasos[50]; ?></td>
									<td><?php echo $filaFWACasos[51]; ?></td>
									<td><?php echo $filaFWACasos[26]; ?></td>
									<td><?php echo $filaFWACasos[28]; ?></td>
									<td><?php echo $filaFWACasos[31]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>




					<!--En caso de Seleccionar MOVIL -->
				<?php
				}elseif($TipoReporte=='Movil'){
				?>
					
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS MOVIL</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Llamadas trabajadas: <?php echo $TotalMovil; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>No.</th>
								<th>Representante</th>
								<th>Dealer</th>
								<th>Numero Dealer</th>
								<th>Contraseña</th>
								<th>ID</th>
								<th>Vendedor</th>
								<th>Tipo de Llamada</th>
								<th>Categoria</th>
								<th>Sub-Categoria</th>
								<th>Solución</th>
								<th>Resultado</th>
								<th>Numero de Referencia</th>
								<th>Fecha/Hora</th>
							</tr>

	
						<?php
						$count=0;
			   		   	while($filaMovilCasos=mysqli_fetch_array($resultMovilCasos)) {
							
			   		   		$Representante = strtoupper($filaMovilCasos[2]);
			   		   		$Dealer = strtoupper($filaMovilCasos[3]);
			   		   		$Vendedor = strtoupper($filaMovilCasos[5]);
			   		   		$count++;
			   		   	?>
								<tr class='active'>
									<td><?php echo $count; ?></td>
									<td><?php echo $Representante; ?></td>
									<td><?php echo $Dealer; ?></td>
									<td><?php echo $filaMovilCasos[4]; ?></td>
									<td><?php echo $filaMovilCasos[15]; ?></td>
									<td><?php echo $filaMovilCasos[6]; ?></td>
									<td><?php echo $Vendedor; ?></td>
									<td><?php echo $filaMovilCasos[8]; ?></td>
									<td><?php echo $filaMovilCasos[12]; ?></td>
									<td><?php echo $filaMovilCasos[13]; ?></td>
									<td><?php echo $filaMovilCasos[9]; ?></td>
									<td><?php echo $filaMovilCasos[14]; ?></td>
									<td><?php echo$filaMovilCasos[7]; ?></td>
									<td><?php echo $filaMovilCasos[10] ." ". $filaMovilCasos[11]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

					<?php } ?>

			<?php } ?>
	<?php } ?>

</div>
</form>


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

