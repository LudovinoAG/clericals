<?php

 session_start();
 
if($conexion = mysqli_connect('127.0.0.1','root','123456')){
					
	mysqli_select_db($conexion,"sv") or die ('no se encuentra la bd');
	//$SqlExiteEmision = "SELECT OSADIA FROM emisiones WHERE OSADIA='$txtOsadia' AND Fecha='$FECHA'";
	//$ExisteEmision = mysqli_query($conexion, $SqlExiteEmision) or die ('No ejecutado');
	//$ResultadosExiste=mysqli_num_rows($ExisteEmision);
	
	 //Aquí es donde seleccionamos nuestro csv
       //obtenemos el archivo .csv
$tipo = $_FILES['MyFile']['type'];
$tamanio = $_FILES['MyFile']['size'];
$archivotmp = $_FILES['MyFile']['tmp_name'];
$Intru = $_POST['txtInstrucciones'];
//$Name = $_FILES['MyFile']['name'];
$FECHACREATE = date('d/m/Y');
//cargamos el archivo
$lineas = file($archivotmp);
//inicializamos variable a 0, esto nos ayudará a indicarle que no lea la primera línea
$i=0;
 
//Recorremos el bucle para leer línea por línea
foreach ($lineas as $linea_num => $linea)
{ 
   //abrimos bucle
   /*si es diferente a 0 significa que no se encuentra en la primera línea 
   (con los títulos de las columnas) y por lo tanto puede leerla*/
   if($i != 0) 
   { 
       //abrimos condición, solo entrará en la condición a partir de la segunda pasada del bucle.
       /* La funcion explode nos ayuda a delimitar los campos, por lo tanto irá 
       leyendo hasta que encuentre un ; */
       $datos = explode(",",$linea);
 
       //Almacenamos los datos que vamos leyendo en una variable
       $OSADIA = trim($datos[0]);
       $STATUS = trim($datos[1]);
       $Notas = trim($datos[2]);
 
       //guardamos en base de datos la línea leida
       $Resultados = mysqli_query($conexion,"INSERT INTO especialdemora SET OSADIA='$OSADIA', Status='$STATUS',DateCreate='$FECHACREATE',Notas='$Notas'");

       $Resultados2 = mysqli_query($conexion,"UPDATE instructivo SET NOTA='$Intru' WHERE id='1'");
 
       //cerramos condición
   }
 
   /*Cuando pase la primera pasada se incrementará nuestro valor y a la siguiente pasada ya 
   entraremos en la condición, de esta manera conseguimos que no lea la primera línea.*/
   $i++;
   //cerramos bucle
}
    }


?>

<script type="text/javascript">
	location.href = "http://172.17.10.13:81/clericals/admin.php";
</script>