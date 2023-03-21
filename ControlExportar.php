<?php

if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');

			$sql = "SELECT Tarjeta, Agente, OSADIA, Status, Notas, DateCreate, LastUpdate FROM especialdemora ORDER BY OSADIA ASC";

			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');

			
			?>

			<table border="1">
				<tr>
					<th>Tarjeta</th>
					<th>Agente</th>
					<th>Osadia</th>
					<th>Status</th>
					<th>Notas</th>
					<th>Fecha Creacion</th>
					<th>Ultima Actualizacion</th>
				</tr>

			<?php


			while($RegEmisionUpdate = mysqli_fetch_Array($result)){

				echo "
						<tr>
							<td>$RegEmisionUpdate[Tarjeta]</td>
							<td>$RegEmisionUpdate[Agente]</td>
							<td>$RegEmisionUpdate[OSADIA]</td>
							<td>$RegEmisionUpdate[Status]</td>
							<td>$RegEmisionUpdate[Notas]</td>
							<td>$RegEmisionUpdate[DateCreate]</td>
							<td>$RegEmisionUpdate[LastUpdate]</td>
							
						</tr>";	
			}
			?>

			</table>

			<?php
		
								
mysqli_close($conexion);
}


header('Content-Type: application/vnd.ms-excel');
header("Content-Disposition: attachment;filename='DemoraEspecial.xls'");
header('Cache-Control: max-age=0');



?>
