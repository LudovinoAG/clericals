<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Encuenta Paper less</title>
</head>
<body>

<center>
<h2>Encuenta Paper less</h2>
</center>

<form name='framQuiz' method='post' action='SaveQuiz.php'>
<label>Numero de Orden:</label>
<input type="text" name="txtOrdenOS" size='7' maxlength='7'>

<h3>Preguntas vendedor</h3>
<p> 1 - Le solicitaste al cliente el email? </p>

	<select name='lstRespuesta1'>
		<option>Si, Que dijo el cliente?</option>
		<option>No, Porque no lo solicitas?</option>
	</select>

	<input type="text" name="txtRespuesta1" size='100'>

	<h3>Preguntas cliente</h3>
	<p> 1 -  Le ofrecieron la facturación electrónica?</p>

	<select name='lstRespuesta2'>
		<option>Si</option>
		<option>No</option>
	</select>

	<label>Comentarios:</label>
	<input type="text" name="txtRespuesta2" size='100'>

	<p> 2 - Le informaron de las ventajas de la factura electrónica? <br> (Reciclar / Proteger el ambiente) </p>

	<select name='lstRespuesta3'>
		<option>Si</option>
		<option>No</option>
	</select>

	<label>Comentarios:</label>
	<input type="text" name="txtRespuesta3" size='100'>
	<br>
	<br>
	<input type="submit" name="bthGuardar" value='Guardar'>

</form>

</body>
</html>