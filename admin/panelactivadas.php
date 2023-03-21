<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control - Activadas</title>
	<meta charset='UTF8' />
	<link rel="stylesheet" type="text/css" href="../admin/css/estilos.css">
</head>
<body style="background-color: teal;">
<form action="panelactivadas.php" method="post">

<font color='yellow'><LABEL>Tipo de Reporte:</LABEL></font>
<select name='LstReporte' id='LstReporte'>
	<option>Activadas</option>
</select>

<LABEL>Fecha Inicio:</LABEL>
<input name='LstDias' type='text' value="<?php echo date('d/m/Y'); ?>" placeholder="dd/mm/yyyy" size='10'>
<LABEL>Fecha Final:</LABEL>
<input name='LstDias2' type='text' value="<?php echo date('d/m/Y'); ?>" placeholder="dd/mm/yyyy" size='10'>
<label><font size='2'>Eje: dd/mm/yyyy</font></label>
<input type="submit" name="bthDia" Value='Buscar'>
<br>
<br>


<div style="background-color: teal;">
	<?php 


	
		if($conexion = mysqli_connect('localhost','root','123456')){
					
			mysqli_select_db($conexion,"ventas") or die ('no se encuentra la bd');
			if(isset($_POST['LstDias'])){


			$FECHA = $_POST['LstDias'];
			$FECHA2 = $_POST['LstDias2'];
			$TipoReporte = $_POST['LstReporte'];


			//if(isset($_POST['LstDias'])){
			//	$Dias = $_POST['LstDias'];
			//}
			//$Formato = date_format($FECHA,"d/m/Y");
			//

			$TotalRegistros = "SELECT count(id) FROM activadas WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2'";
			$Consulta = "SELECT * FROM activadas WHERE Fecha BETWEEN '$FECHA' AND '$FECHA2' ORDER BY Razon ASC";
			//echo $Dias;

			$result2 = mysqli_query($conexion, $TotalRegistros);
			$result3 = mysqli_query($conexion, $Consulta);


			$fila2=mysqli_fetch_row($result2);
			$fila3=mysqli_fetch_row($result3);
			$Total = $fila2[0] - 1; 
			

				if($TipoReporte=='Activadas'){
						echo "<span class='tituloE'>Total Casos: </span>";
			   		   	echo "<span class='tituloE'>" .$Total. "</b></span>";
			   		   	echo "<br>";
			   		   	echo "<br>";

			   		   	echo 
						"<table id='tabla' border=1>
							<tr>
								<td width=100>BAN</td>
								<td width=100>Suscriber</td>
								<td width=300>Nombre</td>
								<td width=200>Razon</td>
								<td width=200>Comentarios</td>
								<td width=73>Fecha</td>
							</tr>
						</table>";



			   		   	while($fila4=mysqli_fetch_array($result3)) {
							

							echo "
							<table id='tabla2' border='1' cellspacind = '0'>
								<tr>
									<td class='row-format' width=100>$fila4[Ban]</td>
									<td class='row-format' width=100>$fila4[Suscritor]</td>
									<td class='row-format' width=300>$fila4[Nombre]</td>
									<td class='row-format' width=200>$fila4[Razon]</td>
									<td class='row-format' width=200>$fila4[Comentarios]</td>
									<td class='row-format' width=50>$fila4[Fecha]</td>
							</table>";
						
						}

			   		   	mysqli_close($conexion);
					}

					
					}
	        }
					
	?>
</div>
</form>

</body>
</html>