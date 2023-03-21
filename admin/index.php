

<!DOCTYPE html>
<html>
<head>
	<title>SV - Administrador</title>
	<meta charset='utf-8' />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
</head>
<body>


      <h2>Trabajos MAC</h2>
      <form action="index.php" method="post" class='form-inline'>
      <div class='Form-group'>
          <div >
            <LABEL>Fecha búsqueda:</LABEL>
            <input  name='LstDias' type='text' value="<?php echo date('n/j/Y'); ?>"  size='8'>
          </div>
      </div>

      <br>

      <input class='btn btn-info btn-sx' type="submit" name="bthDia" Value='Buscar' id='BthBuscar'>

      <br>



<br>

<div class="table-responsive">

<font size='0.4em'>
<?php


    if($conexion = mysqli_connect('localhost','root','123456')){
          
      mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
        if(isset($_POST['LstDias'])){
          $FECHA = date('n/j/Y');

          $FECHA1 = $_POST['LstDias'];
          //$FECHA2 = $_POST['LstDias2'];
          $consulta = "SELECT * FROM registromac WHERE LastUpdate='$FECHA' ORDER BY RegMacActual ASC ";
          //$TotalRegistros = "SELECT count(*) from registromac WHERE LastUpdate='$FECHA'";
          $TotalUpdate = "SELECT Actualizado from conteomac WHERE Fecha='$FECHA'";
          //$SQLMACUPDATE = "SELECT conteomac.Usuario, conteomac.Fecha, conteomac.Hora, conteomac.OS, registromac.Cliente, conteomac.MacActual, conteomac.MacFinal, conteomac.Tratamientos, conteomac.Intentos, conteomac.Actualizado, conteomac.Status, registromac.Comentarios, registromac.Razon FROM registromac INNER JOIN conteomac ON registromac.RegOS=conteomac.OS WHERE conteomac.Fecha='$FECHA' ORDER BY conteomac.OS DESC";
         $SQLMACUPDATE = "SELECT * FROM averagemac WHERE fecha='$FECHA1' ORDER BY hora";
         //$TotalRegistros = "SELECT COUNT(*) FROM conteomac WHERE Fecha BETWEEN '$FECHA1' AND '$FECHA2'";
         $TotalRegistros = "SELECT COUNT(*) FROM averagemac WHERE fecha='$FECHA1'";

          $TotalActualizados = 0;
          $count = 0;
          $result = mysqli_query($conexion, $consulta);
          $result2 = mysqli_query($conexion, $TotalRegistros);
          $result3 = mysqli_query($conexion, $TotalUpdate);
          $Resultado4 = mysqli_query($conexion, $SQLMACUPDATE);


          //while($RegAgent=mysqli_fetch_row($result3)){
            //$TotalActualizados = $TotalActualizados + $RegAgent[0];
          //}

          $fila2=mysqli_fetch_row($result2);
          $fila3=mysqli_fetch_row($result3);
          //$fila4=mysqli_fetch_row($Resultado4);
    
          $TotalMAC =  $fila2[0];

          echo '<font size=4em>Casos trabajados del ' .'['. $FECHA1 . '] Total: ' . $TotalMAC . '</font><br><br>'; 

    ?>
        <table class='table table-condensed'>
        <tr>
          <td ><strong>#</strong></td>
          <td ><strong>Tarjeta</strong></td>
          <td ><strong>Nombre</strong></td>
          <td ><strong>Fecha Registro</strong></td>
          <td ><strong>OS</strong></td>
          <td ><strong>Hora</strong></td>
          <td ><strong>Canal</strong></td>
          <td ><strong>Cliente</strong></td>
          <td ><strong>Mac Actual</strong></td>
          <td ><strong>Mac Final</strong></td>
          <td ><strong>Estado</strong></td>
          <td ><strong>Notas</strong></td>
          <td ><strong>Razon</strong></td>
        </tr>

    <?php
      while($fila4=mysqli_fetch_array($Resultado4)) {
        $count++;
    ?>

          <tr>
            <td ><?php echo $count; ?></td>
            <td ><?php echo $fila4[1] ?></td>
            <td ><?php echo $fila4[2] ?></td>
            <td ><?php echo $fila4[3] ?></td>
            <td ><?php echo $fila4[8] ?></td>
            <td ><?php echo $fila4[6] ?></td>
            <td ><?php echo $fila4[9] ?></td>
            <td ><?php echo $fila4[10] ?></td>
            <td ><?php echo $fila4[11] ?></td>
            <td ><?php echo $fila4[12] ?></td>
            <td ><?php echo $fila4[13] ?></td>
            <td ><?php echo $fila4[14] ?></td>
            <td ><?php echo $fila4[15] ?></td>
          </tr>
         
    <?php } ?>
      </table>
    <?php  mysqli_close($conexion); ?>

<?php } ?>

<?php } ?>

</font>
</div>
</form>
<div class='Container text-center'>


</div>


</body>

<script type="text/javascript" src='js/jquery-3.1.1.min.js'></script>
<script type="text/javascript" src='js/bootstrap.min.js'></script>
<script type="text/javascript" src='js/funciones.js'></script>
</html>