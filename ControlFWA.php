<?php

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');

			$FECHA = $_GET['Fecha'];
			$FECHA2 = $_GET['Fecha2'];

			$sql = "SELECT * FROM ventasfwa WHERE FechaVenta BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Servicio ASC";

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');

			
			?>
			

						<table class='table table-condensed' id='TablaReportes'>
							<tr>
								<th style="background-color: orange;">#</th>
								<th style="background-color: orange;">Fecha Contrato</th>
								<th style="background-color: orange;">Servicio</th>
								<th style="background-color: orange;">BAN</th>
								<th style="background-color: orange;">Canal</th>
								<th style="background-color: orange;">Cliente</th>
								<th style="background-color: orange;">Contactos 1 Telf</th>
								<th style="background-color: orange;">Contactos 2 Telf</th>
								<th style="background-color: orange;">Direccion Fisica</th>
								<th style="background-color: orange;">Direccion Fisica 2</th>
								<th style="background-color: orange;">Punto Referencia</th>
								<th style="background-color: orange;">Email</th>
								<th style="background-color: orange;">Pueblo</th>
								<th style="background-color: orange;">ZipCode</th>
								<th style="background-color: orange;">PR</th>
								<th style="background-color: orange;">Autorizado</th>
								<th style="background-color: orange;">Contacto Autorizado</th>
								<th style="background-color: orange;">Item code</th>
								<th style="background-color: orange;">Model de Equipo</th>
								<th style="background-color: orange;">Imei</th>
								<th style="background-color: orange;">Sim Card</th>
								<th style="background-color: orange;">Tracking num</th>
								<th style="background-color: orange;">Terminal</th>
								<th style="background-color: orange;">Fecha Envio</th>
								<th style="background-color: orange;">Tanda</th>
								<th style="background-color: orange;">Price Code</th>
								<th style="background-color: orange;">Model de Equipo</th>
								<th style="background-color: orange;">Costo de Plan</th>
								<th style="background-color: orange;">Tipo de Plan</th>
								<th style="background-color: orange;">Contrato</th>
								<th style="background-color: orange;">Razon de No Despacho</th>
								<th style="background-color: orange;">Osadia</th>
								<th style="background-color: orange;">Direccion Postal</th>
								<th style="background-color: orange;">Mac Actual</th>
								<th style="background-color: orange;">Información completa en SIF</th>
								<th style="background-color: orange;">Fecha de Venta</th>
								<th style="background-color: orange;">Verificado en SIF</th>
								<th style="background-color: orange;">Verificado por</th>
								<th style="background-color: orange;">Duplicado</th>
								<th style="background-color: orange;">Cod. Vendedor</th>
							</tr>
						

						<?php
						$Count = 0;
						$MacActual = '-';
						$InfoSIF = '-';
						$VerSIF = '-';
						$VerPOR = '-';
						$Dupli = '-';
						$Dir2 = '';
						
			   		   	while($filaFWACasos=mysqli_fetch_array($result)) {
							
			   		   		$Cliente = strtoupper($filaFWACasos[15]);
			   		   		$Count++;
			   		   	?>
								<tr class='active'>
									<td><?php echo $Count; ?></td>
									<td><?php echo $filaFWACasos['FechaContrato']; ?></td>
									<td><?php echo $filaFWACasos['Servicio']; ?></td>
									<td><?php echo $filaFWACasos['BAN']; ?></td>
									<td><?php echo $filaFWACasos['Canal']; ?></td>
									<td><?php echo $Cliente; ?></td>
									<td><?php echo $filaFWACasos['Contacto1']; ?></td>
									<td><?php echo $filaFWACasos['Contacto2']; ?></td>
									<td><?php echo $filaFWACasos['DireccionFisica']; ?></td>
									<td><?php echo $Dir2; ?></td>
									<td><?php echo $filaFWACasos['PuntoReferencia']; ?></td>
									<td><?php echo $filaFWACasos['Email']; ?></td>
									<td><?php echo $filaFWACasos['Pueblo']; ?></td>
									<td><?php echo $filaFWACasos['ZipCode']; ?></td>
									<td><?php echo $filaFWACasos['PR']; ?></td>
									<td><?php echo $filaFWACasos['Autorizado']; ?></td>
									<td><?php echo $filaFWACasos['ContactoAutorizado']; ?></td>
									<td><?php echo $filaFWACasos['ItemCode']; ?></td>
									<td><?php echo $filaFWACasos['Equipo']; ?></td>
									<td><?php echo $filaFWACasos['IMEI']; ?></td>
									<td><?php echo $filaFWACasos['SimCard']; ?></td>
									<td><?php echo $filaFWACasos['TrackingNum']; ?></td>
									<td><?php echo $filaFWACasos['Terminal']; ?></td>
									<td><?php echo $filaFWACasos['FechaEnvio']; ?></td>
									<td><?php echo $filaFWACasos['Tanda']; ?></td>
									<td><?php echo $filaFWACasos['PriceCode']; ?></td>
									<td><?php echo $filaFWACasos['Equipo']; ?></td>
									<td><?php echo $filaFWACasos['CostoPlan']; ?></td>
									<td><?php echo $filaFWACasos['TipoPlan']; ?></td>
									<td><?php echo $filaFWACasos['Contrato']; ?></td>
									<td><?php echo $filaFWACasos['RazonNoDespacho']; ?></td>
									<td><?php echo $filaFWACasos['Osadia']; ?></td>
									<td><?php echo $filaFWACasos['DireccionPostal']; ?></td>
									<td><?php echo $MacActual; ?></td>
									<td><?php echo $InfoSIF; ?></td>
									<td><?php echo $filaFWACasos['FechaVenta']; ?></td>
									<td><?php echo $VerSIF; ?></td>
									<td><?php echo $VerPOR; ?></td>
									<td><?php echo $Dupli; ?></td>
									<td><?php echo $filaFWACasos['idVendedor']; ?></td>
								</tr>
							
						<?php } ?>
							</table>
						<?php 

						mysqli_close($conexion); 


}


		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;filename='ReporteFWA.xls'");
		header('Cache-Control: max-age=0');


?>

