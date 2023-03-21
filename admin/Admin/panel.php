<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control - Emisiones</title>
	<meta charset='UTF8' />
	<link rel="stylesheet" type="text/css" href="../admin/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../admin/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/css/bootstrap-theme.min.css">
</head>
<body id='contenidoGeneral'>
<div id='Controles'>
<form action="panel.php" method="post" class='form-inline'>
<br>
	<div class='Form-group'>
		<div class='col-xs-6 col-md-4'>
			<LABEL>Tipo de Reporte:</LABEL>
			<select class='form-control' name='LstReporte' id='LstReporte'>
				<option>Emisiones</option>
				<option>Demora</option>
				<option>Movil</option>
			</select>
		</div>
	</div>

	<div class='Form-group'>
		<div class='col-xs-6 col-md-4'>
			<LABEL>Fecha Inicio:</LABEL>
			<input class='form-control' name='LstDias' type='text' value="<?php echo date('d/m/Y'); ?>" placeholder="dd/mm/yyyy" size='10'>
		</div>
	</div>

	<div class='Form-group'>
		<div class='col-xs-6 col-md-4'>
			<LABEL>Fecha Final:</LABEL>
			<input class='form-control' name='LstDias2' type='text' value="<?php echo date('d/m/Y'); ?>" placeholder="dd/mm/yyyy" size='10'>
		</div>
	</div>

	<br>
	<br>
	<br>

	<input class='btn btn-info btn-lg' type="submit" name="bthDia" Value='Buscar' id='BthBuscar'>

</div>
<div id='contenedor'>
	<?php 


	
		if($conexion = mysqli_connect('localhost','root','123456')){
					
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
			
			$TotalDemora = "SELECT count(id) FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaDemora = "SELECT * FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Representante";

			$TotalRegistros = "SELECT count(id) FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$Consulta = "SELECT * FROM emisiones WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Representante";

			$TotalRegistrosMovil = "SELECT count(id) FROM movil WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$ConsultaMovil = "SELECT * FROM movil WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Representante";
			//echo $Dias;

			$result2 = mysqli_query($conexion, $TotalRegistros);
			$result3 = mysqli_query($conexion, $Consulta);

			$resultDemoraTotal = mysqli_query($conexion, $TotalDemora);
			$resultDemoraCasos = mysqli_query($conexion, $ConsultaDemora);

			$resultMovilTotal = mysqli_query($conexion, $TotalRegistrosMovil);
			$resultMovilCasos = mysqli_query($conexion, $ConsultaMovil);

			$fila2=mysqli_fetch_row($result2);
			$filaDemoraTotal=mysqli_fetch_row($resultDemoraTotal);
			$filaMovilTotal=mysqli_fetch_row($resultMovilTotal);

			if($fila2[0]<0){$Total = $fila2[0] - 1;}else{$Total =  $fila2[0];} 

			if($filaDemoraTotal[0]<0){$TotalDemora = $filaDemoraTotal[0] - 1;}else{$TotalDemora = $filaDemoraTotal[0];}

			if($filaMovilTotal[0]<0){$TotalMovil = $filaMovilTotal[0] - 1;}else{$TotalMovil = $filaMovilTotal[0];} 
			
			//$fila3=mysqli_fetch_row($result3);
			//$filaDemoraCasos=mysqli_fetch_row($resultDemoraCasos);
			//$filaMovilCasos=mysqli_fetch_row($resultMovilCasos);
			?>
				<?php
				if($TipoReporte=='Emisiones'){
				?>
					<br>
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
								<th>Tipo</th>
								<th>Vendedor</th>
								<th>ID Vendedor</th>
								<th>Canal</th>
								<th>Leader/Supervisor</th>
								<th>Mac</th>
								<th>COPS</th>
								<th>OSADIA</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Ebill</th>
								<th>Direccion</th>
								<th>Emision</th>
								<th>Mensaje</th>
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
									<td><?php echo $fila3[14]; ?></td>
									<td><?php echo $fila3[15]; ?></td>
									<td><?php echo $fila3[16]; ?></td>
									<td><?php echo $fila3[19]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

					

					<!-- En caso de seleccionar Demoras -->
		    	<?php
				}elseif($TipoReporte=='Demora'){
				?>
					<br>
						<div id='tituloPrincipal'>
			   		   		<span>REPORTE CASOS DEMORAS</span>
			   		   		<div id='tituloEmitidas'>
			   		   			<span>Total Demora: <?php echo $TotalDemora; ?></span>
			   		   		</div>
			   		   	</div>
			   		   	<br>

						<table class='table table-condensed' id='TablaReportes'>
							<tr class='info'>
								<th>ID/Representante</th>
								<th>ID/Tenico</th>
								<th>Compañia</th>
								<th>Cliente</th>
								<th>Contactos</th>
								<th>Mac Actual</th>
								<th>Mac Final</th>
								<th>Tracker</th>
								<th>OSADIA</th>
								<th>Fecha/Hora</th>
								<th>Estado</th>
								<th>Acción</th>
								<th>Resultado</th>
								<th>Notas</th>
							</tr>

	
						<?php
			   		   	while($filaDemoraCasos=mysqli_fetch_array($resultDemoraCasos)) {
							
			   		   		$Representante = strtoupper($filaDemoraCasos[2]);
			   		   		$Cliente = strtoupper($filaDemoraCasos[17]);
			   		   		$Tecnico = strtoupper($filaDemoraCasos[3]);
			   		   		$Compañia = strtoupper($filaDemoraCasos[5]);
			   		   	?>
								<tr class='active'>
									<td><?php echo "[". $filaDemoraCasos[1] ."]" ." ". $Representante; ?></td>
									<td><?php echo "[" . $filaDemoraCasos[4] ."]" ." ". $Tecnico; ?></td>
									<td><?php echo $Compañia; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaDemoraCasos[18]; ?></td>
									<td><?php echo $filaDemoraCasos[6]; ?></td>
									<td><?php echo $filaDemoraCasos[7]; ?></td>
									<td><?php echo $filaDemoraCasos[8]; ?></td>
									<td><?php echo $filaDemoraCasos[10]; ?></td>
									<td><?php echo $filaDemoraCasos[12] ." ". $filaDemoraCasos[13]; ?></td>
									<td><?php echo $filaDemoraCasos[14]; ?></td>
									<td><?php echo $filaDemoraCasos[15]; ?></td>
									<td><?php echo $filaDemoraCasos[19]; ?></td>
									<td><?php echo $filaDemoraCasos[16]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php mysqli_close($conexion); ?>

					

					<!--En caso de Seleccionar MOVIL -->
				<?php
				}elseif($TipoReporte=='Movil'){
				?>
					<br>
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
								<th>ID/Representante</th>
								<th>Dealer</th>
								<th>Numero Dealer</th>
								<th>ID/Vendedor</th>
								<th>Numero de Referencia</th>
								<th>Razón de la Llamada</th>
								<th>Solución</th>
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
									<td><?php echo "[". $filaMovilCasos[1] ."]" ." ". $Representante; ?></td>
									<td><?php echo $Dealer; ?></td>
									<td><?php echo $filaMovilCasos[4]; ?></td>
									<td><?php echo "[". $filaMovilCasos[6] ."]" ." ". $Vendedor; ?></td>
									<td><?php echo $filaMovilCasos[7]; ?></td>
									<td><?php echo $filaMovilCasos[8]; ?></td>
									<td><?php echo $filaMovilCasos[9]; ?></td>
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

</body>

<script language="javascript" type="text/javascript" src='js/jquery-3.2.0.min.js'></script>
<script language="javascript" type="text/javascript" src='js/bootstrap.min.js'></script>
<script language="javascript" type="text/javascript" src='js/funciones.js'></script>
</html>

