<meta charset='utf-8' />
<div id='BarUser'>

<!DOCTYPE html>
<html>
<head>
	<title>DATA Clericals - Registro Activadas</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

<br>
<br>
<br>
<br>
<div id="Cabecera">
	<span>Seguimiento Activadas</span>
	<br>
	<br>
</div>

<div class='Container'>

	<form class="form-inline" name='frmActivadas' action="SaveActivadas.php" method="post">

		<div class='Form-group has-success'>
			<div class='col-md-12'>
				<label class='control-label' id='lblTitleOsadia' for="txtBAN">BAN:</label>
    			<input type="text" class="form-control" name="txtBAN" id="txtBAN" placeholder="BAN" maxlength="9" size="9" onkeypress="return valida(event,3);" >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblSuscriber' for="txtSuscriber">Suscriber:</label>
    			<input type="text" class="form-control" name="txtSuscriber" id="txtSuscriber" placeholder="Suscriber" maxlength="10" size="10" onkeypress="return valida(event,3);" >
			</div>
		</div>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class='control-label' id='LblNombre' for="txtNombre">Nombre:</label>
    			<input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre" maxlength="50" size="50" onkeypress="return valida(event,1);" >
			</div>
		</div>
		<br>
		<br>

		<div class='Form-group'>
			<div class='col-md-12'>
				<label class="control-label" id='lblEstado' for="LstRazon">Razón:</label>
    			<select id='LstRazon' class="form-control input-sm label-primary" name='LstRazon'">
					<option>Se Transfiere</option>
					<option>Ya Activo</option>
					<option>No contactado</option>
					<option>Suspendido por pago devuelto</option>
					<option>Cliente con deuda</option>
					<option>Activara Luego</option>
					<option>No Desea Numero Nuevo</option>
					<option>Devolvio, Falta de Cobertura</option>
					<option>Devolvio, Inconformida con los equipos</option>
					<option>Devolvio, Desea el mismo numero</option>
					<option>Seguimiento, Llamar mas tarde</option>
					<option>Cuenta Cancelada/Devolvio Equipo</option>
					<option>Cliente fuera de las isla</option>
    			</select>
			</div>
		</div>
		<br>
		<br>

		<div class='Form-group'>
		 <div class='col-md-12'>
			 <label class='control-label' id='LblNotas' for="txtNotas">Comentarios:</label>
    		 <textarea class="form-control" name="txtNotas" id="txtNotas" cols="100" rows="4">
    		 
    		 </textarea>
		 </div>
		</div>
		
		<br>
		<br>
		<div class='col-md-6 text-center' id='BthBotones'>
			<button type='submit' class='btn btn-primary' id='bthAgregar' name='bthAgregar'">
    			<span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Registar
    		</button>
 
    		<button type='reset' class='btn btn-danger' id='bthClear' name='bthClear'">
    			<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Limpiar
    		</button>
    		<br>
    		<br>

		</div>
		</form>


</div>


<br>




</body>


<script language="javascript" type="text/javascript" src='js/jquery-3.2.0.min.js'></script>
<script language="javascript" type="text/javascript" src='js/bootstrap.min.js'></script>
<script language="javascript" type="text/javascript" src='js/funciones.js'></script>
</html>

