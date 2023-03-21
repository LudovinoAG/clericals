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
		<td class="FormatSEG"><a href="mydata.php" data-toggle="tooltip" data-placement="top" title="Ver mis casos trabajados">
			Mis Casos<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$ID = $_GET['ID'];

			$sql = "SELECT * FROM registromac WHERE RegTarjeta=$Usuario AND Status='Abierto'";
			$SqlUpdate = "SELECT * FROM registromac WHERE id='$ID'";

			$Total = 0;
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			$ResultUpdate = mysqli_query($conexion, $SqlUpdate) or die ('No ejecutado');

			$RegAgentUpdate = mysqli_fetch_row($ResultUpdate);
		
			while($RegAgent=mysqli_fetch_array($result))
				{
					$Total = $Total + 1;
								
				}

			echo $Total;
			mysqli_close($conexion);					
}


     ?>				
 						</span>
			</a>
		</td>

		<td class="Fila_Drop"><div class="btn-group NAVEGACION">
			  <label class="label label-default dropdown-toggle LABEL_FORMAT" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			    Resumen de casos <span class="caret"></span>
			  </label>
			  <ul class="dropdown-menu">
			    <li class="LISTA_CASOS">Actualizados<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Abiertos<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Cerrados<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Overall<span class="badge Format_Badge_List">0</span></li>
			    <li class="LISTA_CASOS">Avg.<span class="badge Format_Badge_List">0</span></li>
			  </ul>
			</div>
</td>




		<td class="FILA_COUNT">
		Actualizados<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT Actualizado FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					$TotalActualizados = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
				
					while($RegAgent=mysqli_fetch_row($result)){
						$TotalActualizados = $TotalActualizados + $RegAgent[0];
					}

					/*if($RegAgent!=""){
						$TotalActualizados = $RegAgent[0];
					}else{
						$TotalActualizados = 0;
					}*/
					
					
					//$TotalActualizados = $RegAgent[19];
										
					echo $TotalActualizados;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>


		<td class="FILA_COUNT">
		Abiertos<span class="badge Format_Badge"><?php
				
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
							
					mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
					$Usuario = $_SESSION['Tarjeta'];
					$UserName = $_SESSION['Nombre'];
					$FECHA = date('n/j/Y');
					$sql = "SELECT * FROM registromac WHERE RegAgente='$UserName' AND Status='Abierto' AND Fecha='$FECHA'";
					//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
					//ECHO $UserName;
					$TotalAbiertos = 0;
					$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
					
					while($RegAgent=mysqli_fetch_array($result))
						{
							$TotalAbiertos = $TotalAbiertos + 1;
										
						}
					echo $TotalAbiertos;
					mysqli_close($conexion);					
		}

		?>
		</span>
		</td>

<td class="FILA_COUNT">
Cerrados<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT * FROM registromac WHERE LastUser='$UserName' AND LastUpdate='$FECHA' AND Status='Cerrado'";
			$sql2 = "SELECT * FROM conteomac WHERE Usuario='$UserName' AND Fecha='$FECHA' AND Status='Ya esta Cerrado'";
			//$sql2 = "SELECT count(*) FROM registromac WHERE RegAgente='$UserName' AND Status='Cerrado' AND Fecha='$FECHA'";
			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			$TotalGeneral = 0;
			$TotalCerrados = 0;
			$TotalCerrados2 = 0;
			//
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			$result2 = mysqli_query($conexion, $sql2) or die ('No ejecutado');
		
			while($RegAgent=mysqli_fetch_array($result))
				{
					$TotalCerrados = $TotalCerrados + 1;
								
				}

			while($RegAgent2=mysqli_fetch_array($result2))
				{
					$TotalCerrados2 = $TotalCerrados2 + 1;
								
				}


			$TotalGeneral = $TotalCerrados + $TotalCerrados2;
			echo $TotalGeneral;
			mysqli_close($conexion);					
}

?>
</span>
</td>

<td class="FILA_COUNT">
Overall<span class="badge Format_Badge"><?php
		
if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$FECHA = date('n/j/Y');
			$sql = "SELECT count(id) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA'";

			//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
			
			$TotalTopados = 0;
			$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			$RegAgent = mysqli_fetch_row($result);
			/*while($RegAgent=mysqli_fetch_array($result))
				{
					$TotalTopados = $TotalTopados + 1;
								
			*/	//}

			//$TotalTopados = 0;
			echo $RegAgent[0];
			mysqli_close($conexion);					
		}
?>
</span>
</td>

<td class="FILA_COUNT">
Avg.<span class="badge Format_Badge"><?php
		
		if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
			mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
			$Usuario = $_SESSION['Tarjeta'];
			$UserName = $_SESSION['Nombre'];
			$FECHA = date('n/j/Y');
			$Average = date('G');

			$sqlCantidad = "SELECT COUNT(*) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA'";
			$sqlaverage7 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='7'";
			$sqlaverage8 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='8'";
			$sqlaverage9 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='9'";
			$sqlaverage10 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='10'";
			$sqlaverage11 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='11'";
			$sqlaverage12 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='12'";
			$sqlaverage13 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='13'";
			$sqlaverage14 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='14'";
			$sqlaverage15 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='15'";
			$sqlaverage16 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='16'";
			$sqlaverage17 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='17'";
			$sqlaverage18 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='18'";
			$sqlaverage19 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='19'";
			$sqlaverage20 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='20'";
			$sqlaverage21 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='21'";
			$sqlaverage22 = "SELECT SUM(totalcasos) FROM averagemac WHERE tarjeta='$Usuario' AND fecha='$FECHA' AND hora='22'";

			$TotalCasos7 = 0;
			$TotalCasos8 = 0;
			$TotalCasos9 = 0;
			$TotalCasos10 = 0;
			$TotalCasos11 = 0;
			$TotalCasos12 = 0;
			$TotalCasos13 = 0;
			$TotalCasos14 = 0;
			$TotalCasos15 = 0;
			$TotalCasos16 = 0;
			$TotalCasos17 = 0;
			$TotalCasos18 = 0;
			$TotalCasos19 = 0;
			$TotalCasos20 = 0;
			$TotalCasos21 = 0;
			$TotalCasos22 = 0;

			$TotalAverage = 0;
			$Total = 0;


			$resultCantidad = mysqli_query($conexion, $sqlCantidad) or die ('No ejecutado');
			$result7 = mysqli_query($conexion, $sqlaverage7) or die ('No ejecutado');
			$result8 = mysqli_query($conexion, $sqlaverage8) or die ('No ejecutado');
			$result9 = mysqli_query($conexion, $sqlaverage9) or die ('No ejecutado');
			$result10 = mysqli_query($conexion, $sqlaverage10) or die ('No ejecutado');
			$result11 = mysqli_query($conexion, $sqlaverage11) or die ('No ejecutado');
			$result12 = mysqli_query($conexion, $sqlaverage12) or die ('No ejecutado');
			$result13 = mysqli_query($conexion, $sqlaverage13) or die ('No ejecutado');
			$result14 = mysqli_query($conexion, $sqlaverage14) or die ('No ejecutado');
			$result15 = mysqli_query($conexion, $sqlaverage15) or die ('No ejecutado');
			$result16 = mysqli_query($conexion, $sqlaverage16) or die ('No ejecutado');
			$result17 = mysqli_query($conexion, $sqlaverage17) or die ('No ejecutado');
			$result18 = mysqli_query($conexion, $sqlaverage18) or die ('No ejecutado');
			$result19 = mysqli_query($conexion, $sqlaverage19) or die ('No ejecutado');
			$result20 = mysqli_query($conexion, $sqlaverage20) or die ('No ejecutado');
			$result21 = mysqli_query($conexion, $sqlaverage21) or die ('No ejecutado');
			$result22 = mysqli_query($conexion, $sqlaverage22) or die ('No ejecutado');

			$RegAgentCantidad=mysqli_fetch_array($resultCantidad);
			$RegAgent7=mysqli_fetch_array($result7);
			$RegAgent8=mysqli_fetch_array($result8);
			$RegAgent9=mysqli_fetch_array($result9);
			$RegAgent10=mysqli_fetch_array($result10);
			$RegAgent11=mysqli_fetch_array($result11);
			$RegAgent12=mysqli_fetch_array($result12);
			$RegAgent13=mysqli_fetch_array($result13);
			$RegAgent14=mysqli_fetch_array($result14);
			$RegAgent15=mysqli_fetch_array($result15);
			$RegAgent16=mysqli_fetch_array($result16);
			$RegAgent17=mysqli_fetch_array($result17);
			$RegAgent18=mysqli_fetch_array($result18);
			$RegAgent19=mysqli_fetch_array($result19);
			$RegAgent20=mysqli_fetch_array($result20);
			$RegAgent21=mysqli_fetch_array($result21);
			$RegAgent22=mysqli_fetch_array($result22);

			$TotalCantidad = $RegAgentCantidad[0];
			$TotalCasos7 = $RegAgent7[0];
			$TotalCasos8 = $RegAgent8[0];
			$TotalCasos9 = $RegAgent9[0];
			$TotalCasos10 = $RegAgent10[0];
			$TotalCasos11 = $RegAgent11[0];
			$TotalCasos12 = $RegAgent12[0];
			$TotalCasos13 = $RegAgent13[0];
			$TotalCasos14 = $RegAgent14[0];
			$TotalCasos15 = $RegAgent15[0];
			$TotalCasos16 = $RegAgent16[0];
			$TotalCasos17 = $RegAgent17[0];
			$TotalCasos18 = $RegAgent18[0];
			$TotalCasos19 = $RegAgent19[0];
			$TotalCasos20 = $RegAgent20[0];
			$TotalCasos21 = $RegAgent21[0];
			$TotalCasos22 = $RegAgent22[0];
			$count = 0;
			
			$Total = $TotalCasos7 + $TotalCasos8 + $TotalCasos9 + $TotalCasos10 + $TotalCasos11 + $TotalCasos12 + $TotalCasos13 + $TotalCasos14 + $TotalCasos15 + $TotalCasos16 + $TotalCasos17 + $TotalCasos18 + $TotalCasos19 + $TotalCasos20 + $TotalCasos21 + $TotalCasos22;   		
			
			if($TotalCasos7>0){$count++;}
			if($TotalCasos8>0){$count++;}
			if($TotalCasos9>0){$count++;}
			if($TotalCasos10>0){$count++;}
			if($TotalCasos11>0){$count++;}
			if($TotalCasos12>0){$count++;}
			if($TotalCasos13>0){$count++;}
			if($TotalCasos14>0){$count++;}
			if($TotalCasos15>0){$count++;}
			if($TotalCasos16>0){$count++;}
			if($TotalCasos17>0){$count++;}
			if($TotalCasos18>0){$count++;}
			if($TotalCasos19>0){$count++;}
			if($TotalCasos20>0){$count++;}
			if($TotalCasos21>0){$count++;}
			if($TotalCasos22>0){$count++;}

			if($Total>0){
			
				$TotalAverage = number_format($Total / $count ,2);
			}

			//$num = number_format($TotalAverage,2,'.');
			/*echo $TotalCasos14;
			echo $TotalCasos15;
			echo $Total;
			echo $TotalAverage;
			echo $TotalCantidad;*/
			echo $TotalAverage;


			//echo $TotalTopados + $TotalGeneral + $TotalActualizados + $TotalAbiertos;
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
  		<li role="presentation" class="FormatBTN active"><a href="regmac.php">MAC</a></li>
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
	<title>DATA Clericals - Seguimiento MAC</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
</head>
<body>

<div id="Cabecera">
	<span>Actualizar seguimiento MAC </span>
	<br>
	<br>
</div>

<div class='Container'>
	<form class="form-inline" name='frmMac' action="saveupdatemac.php" method="post">
		<input type="text" name="txtCrono" id="Cronometro" hidden="true">
		<div id='Div_OrdenOS' class='Form-group has-success'>
			<div class='col-md-12'>
				<label class='control-label' id='LblOrden' for="txtOrdenOS">No. Orden:</label>
    			<input  type="text" value='<?php echo $RegAgentUpdate[3]; ?>' class="form-control" name="txtOrdenOS" id="txtOrdenOS" placeholder="Osadia" maxlength="6" size="6" onkeypress="return valida(event,3);" >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblCanal' for="txtCanal">Canal:</label>
    			<input type="text" value='<?php echo $RegAgentUpdate[19]; ?>' class="form-control" name="txtCanal" id="txtCanal" placeholder="Canal" maxlength="10" size="10">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblCliente' for="txtCliente">CLIENTE:</label>
    			<input type="text" value='<?php echo $RegAgentUpdate[6]; ?>' class="form-control" name='txtCliente' id="txtCliente" placeholder="Nombre completo" size="36" maxlength="35" onkeypress="return valida(event,1);">
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblMACActual' for="txtMacActual">MAC Actual:</label>
    			<input type="text" value='<?php echo $RegAgentUpdate[4]; ?>' class="form-control" name="txtMacActual" id="txtMacActual" placeholder="MAC" maxlength="2" size="2" onkeypress="return valida(event,3);">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblMACFinal' for="txtMacFinal">MAC Final:</label>
    			<input type="text" value= '<?php echo $RegAgentUpdate[5]; ?>' class="form-control" name="txtMacFinal" id="txtMacFinal" placeholder="MAC" maxlength="2" size="2" onkeypress="return valida(event,3);">
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblTrata' for="LstTrata">Tratamiento:</label>
    			<select id='LstTrata' class="form-control input-sm" name='LstTrata'>
    				<option>1er</option>
    				<option>2do</option>
    				<option>3er</option>
    				<option>4to</option>
    				<option>5to</option>
    				<option disabled="yes">___</option>
    				<option selected="selected"><?php echo $RegAgentUpdate[12]; ?></option>
    			</select>
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblTrata' for="LstIntento">Intentos:</label>
    			<select id='LstTrata' class="form-control input-sm" name='LstIntento'>
    				<option>1er</option>
    				<option>2do</option>
    				<option>3er</option>
        			<option disabled="yes">___</option>
    				<option selected="selected"><?php echo $RegAgentUpdate[17]; ?></option>
    			</select>
			</div>
		</div>
		<br>
		<br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblContactos' for="txtContacto">Num. Contactos:</label>
    			<input type="text" value='<?php echo $RegAgentUpdate[10]; ?>' class="form-control" id="txtContactos1" placeholder="Contacto 1" size="12" maxlength="10" name='txtContactos1' onkeypress="return valida(event,3);">
    			<input type="text" value='<?php echo $RegAgentUpdate[11]; ?>' class="form-control" id="txtContactos2" placeholder="Contacto 2" size="12" maxlength="10" name='txtContactos2' onkeypress="return valida(event,3);"> 
			</div>
		</div>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
				<br/>
				<label class="control-label" id='LblComentario' for="txtComentario">Notas:</label>
    			<textarea class='form-control' id='txtNotas' Name='TxtNotas' cols="98" rows="3"></textarea>
			</div>
		</div>

		<input name='TxtID' type="hidden" value=<?php echo $ID = $_GET['ID']; ?>>
		<br><br>
		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='LblStatus' for="LstStatus">Estado:</label>
    			<select id='LstStatus'class="form-control input-sm label-primary" name='LstStatus' onchange='ShowRazon();'>
    				<option>Abierto</option>
    				<option>Cerrado</option>
    				<option disabled="yes">______</option>
    				<option selected="selected"><?php echo $RegAgentUpdate[15]; ?></option>
    			</select>
			</div>
		</div>

		<div class='Form-group'>
			<div id='ContRazon' class='col-md-12'>
				<label class="control-label" id='LblRazon' for="LstStatus">Razón:</label>
    			<select id='LstRazon' class="form-control input-sm label-primary" name='LstRazon'>
    				<option>En Seguimiento</option>
    				<option>Se Cancela</option>
    				<option>Se Reactiva</option>
    				<option>Mal demorada</option>
    				<option>En Despacho</option>
    				<option>Cancelado/Suspendido</option>
    				<option>Cancelado/Num. Equivocado/Busy</option>
    			</select>
			</div>
		</div>
		<div class="Form-group">
			<div class="col-md-12">
				<label class="control-label" id='lblRetencion' for="LstRetencion">Se le hizo Retención?:</label><br>
				<select id='LstRetencion' class="form-control input-sm label-default" name='LstRetencion'>
    				<option>[Elegir una..]</option>
					<option>Si</option>
					<option>No</option>
					<option>No Aplica</option>
					<option>Si, Cliente no acepta</option>
					<option>Re-venta</option>			
    			</select>
			</div>
		</div>
		<br>
			<?php
				if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
				mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
				$Usuario = $_SESSION['Tarjeta'];
				$UserName = $_SESSION['Nombre'];
				$FECHA = date('d/m/Y');
				$OS = $RegAgentUpdate[3];
				$sql = "SELECT OS, Actualizado FROM conteomac WHERE OS='$OS' AND Usuario='$UserName' AND Status='Abierto' AND Fecha='$FECHA'";
				//echo $sql;SELECT * FROM `registromac` WHERE LastUser='' AND LastUpdate=''
				$TotalUpdate ="";
				
				$result = mysqli_query($conexion, $sql) or die ('No ejecutado');
			
				$GetActualizados=mysqli_fetch_row($result);


				$TotalUpdate = $GetActualizados[1];
				if($TotalUpdate==""){
					$TotalUpdate = 0;
				}
				//$TotalUpdate = $GetActualizados[3];
				
				//$TotalUpdate = 0;
				
									
				//echo $TotalUpdate;
				mysqli_close($conexion);	

				}	

			?>

			<input name='TxtActualizado' type='hidden' value=<?php echo $TotalUpdate; ?> />
	</form>

	<div class='Form-group'>
		<div class='col-md-9'>
			<br/>
			<label id='Note' class="control-label" id='LblComentario' for="txtComentario"><?php echo 'Notas: ' . $RegAgentUpdate[16]; ?></label>
		</div>
	</div>
		
		<div class='col-md-12' id='BthBotones'>
			<br/>
			<button type='button' class='btn btn-primary' id='bthGuardar' name='bthGuardar' onclick="SendEdit();">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Guardar
    		</button>

		</div>

</div>


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
<script type="text/javascript" src="js/Crono.js"></script>
</html>

