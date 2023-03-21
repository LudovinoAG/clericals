<?php
session_start();
if(isset($_SESSION['Nombre'])){
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SV - Clericals</title>
	<meta charset='UTF-8'>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

<div class="container principal">
	
	<section class="Main">
		<div class="MARCO_ROJO">
			<div id='ContFormulario'>
				<div id='picfondo'>
					<img id='logo' src="pic/logo.png" />
				</div>
				
					<form id='form' method='Post' action='validate.php' class="form-inline">

							
								<div class="form-group">
									<label for='txtUser' class='lbl-format'>Número Empleado</label><br>
									<input class="form-control" type='text' name='txtUser' id='txtUser'  maxlength='6'>
								</div>

								<div class="form-group">
									<label for='txtClave' class='lbl-format'>Contraseña</label><br>
									<input class="form-control" type='password' name='txtClave' id='txtClave' maxlength='15'>
								</div>


							<br>
							<br>
							<div class="Botones">
								<button class='btn botonIniciar' data-toggle="tooltip" data-placement="left" title="Inicio de sesión">Iniciar Sesión</button>
								<button type="button" class='btn botonOlvido' data-toggle='tooltip' data-placement='left' title='He olvidado mi clave'>Olvide Clave</button>
							</div>

						</div>
					</form>

			</div>
		</div>
	</section>

	<section class="MSG">
		

		<div id='mensaje'>
			<?php 
				if(isset($_GET['err'])){
					if($_GET['err']==1){
						echo "<span>Nombre de usuario o contraseña incorrecta</span>";
					}
					elseif($_GET['err']==2){
						echo "<span>Debe indicar un nombre de usuario y contraseña</span>";
					}
				}
			?>
		</div>

	</section>


	<footer>
		<div class="piePagina">
			<span id='texto'>DATA Clericals - Soporte a ventas @ 2017 - 2018</span>
		</div>
	</footer>
</div>

</body>
</html>