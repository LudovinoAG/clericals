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
  </div>
</div>


<div id='Botones'>
  <ul class="nav nav-tabs">
      <li role="presentation" class="FormatBTN active"><a href="index.php">Inicio</a></li>
      <li role="presentation" class="FormatBTN"><a href="regmac.php">MAC</a></li>
      <li role="presentation" class="FormatBTN"><a href="demora.php">Demora</a></li>
      <li role="presentation" class="FormatBTN"><a href="status.php">Status</a></li>
      <li role="presentation" class="FormatBTN"><a href="emisiones.php">Emisiones</a></li>
      <li role="presentation" class="FormatBTN"><a href="movil.php">Movil</a></li>
      <li role="presentation" class="FormatBTN"><a href="fwa.php">FWA y CH</a></li></li>
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
	<title>SV - DATA Clericals</title>
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
<br>
<div class='text-center' id="Cabecera">
	<span>Bienvenidos</span>
	<br>
</div>
<br>
<div class='Container text-center'>
	<img id='logoInicio' src="pic/logo.png" />
	<h2>DATA Clericals</h2>
  <h4>Soporte a Ventas</h4>
  <p>
  "Nuestro compromiso es cumplir con todos los estandares"
  </p>
</div>

<footer class="FOOTER">
  <div class="Marco_Copyright">
      <span class="Texto_Copyright">
          DATA Clericals - Soporte a Ventas @ 2017 - <?php echo date('Y');  ?> <br>
          <span class="Texto_Empresa">AMOV International Teleservices.</span>
      </span>
  </div>
</footer>



</body>
<script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<script type="text/javascript" src='js/funciones.js'></script>
</html>

