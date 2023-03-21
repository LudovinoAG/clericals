<?php
header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename='ReporteDEMORA.xls'");
header('Cache-Control: max-age=0');
if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');

			$FECHA = $_GET['Fecha'];
			$FECHA2 = $_GET['Fecha2'];

			$sql = "SELECT * FROM demoras WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Estado ASC";

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');

			
			?>
			
						<table class='table table-condensed' id='TablaReportes'>
							<tr>
								<th style="background-color: orange;">#</th>
								<th style="background-color: orange;">Fecha</th>
								<th style="background-color: orange;">Hora</th>
								<th style="background-color: orange;">Agente SV</th>
								<th style="background-color: orange;">ID Tecnico</th>
								<th style="background-color: orange;">Tecnico</th>
								<th style="background-color: orange;">Compañia</th>
								<th style="background-color: orange;">Cliente</th>
								<th style="background-color: orange;">Contactos</th>
								<th style="background-color: orange;">Mac Actual</th>
								<th style="background-color: orange;">Mac Final</th>
								<th style="background-color: orange;">Tracker</th>
								<th style="background-color: orange;">Osadia</th>
								<th style="background-color: orange;">Motivo</th>
								<th style="background-color: orange;">Razon</th>
								<th style="background-color: orange;">Resultado</th>
								<th style="background-color: orange; width: 600px;">Notas</th>
								<th style="background-color: orange;">Es GPON?</th>
								<th style="background-color: orange;">Pueblo</th>
							</tr>
						

						<?php
						$Count = 0;
						$MacActual = '-';
						$InfoSIF = '-';
						$VerSIF = '-';
						$VerPOR = '-';
						$Dupli = '-';
						
			   		   	while($filaDemoraCasos=mysqli_fetch_array($result)) {
							
			   		   		$Cliente = strtoupper($filaDemoraCasos[17]);
			   		   		$Count++;
			   		   	?>
								<tr class='active'>
									<td><?php echo $Count; ?></td>
									<td><?php echo $filaDemoraCasos[12]; ?></td>
									<td><?php echo $filaDemoraCasos[13]; ?></td>
									<td><?php echo $filaDemoraCasos[2]; ?></td>
									<td><?php echo $filaDemoraCasos[4]; ?></td>
									<td><?php echo $filaDemoraCasos[3]; ?></td>
									<td><?php echo $filaDemoraCasos[5]; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaDemoraCasos[18]; ?></td>
									<td><?php echo $filaDemoraCasos[6]; ?></td>
									<td><?php echo $filaDemoraCasos[7]; ?></td>
									<td><?php echo $filaDemoraCasos[8]; ?></td>
									<td><?php echo $filaDemoraCasos[10]; ?></td>
									<td><?php echo $filaDemoraCasos[14]; ?></td>
									<td><?php echo $filaDemoraCasos[15]; ?></td>
									<td><?php echo $filaDemoraCasos[25]; ?></td>
									<td><?php echo $filaDemoraCasos[16]; ?></td>
									<td><?php echo $filaDemoraCasos[24]; ?></td>
									<td><?php echo $filaDemoraCasos[26]; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php 

						mysqli_close($conexion); 


}
?>

