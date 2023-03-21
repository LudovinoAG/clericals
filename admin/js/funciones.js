var Msg = "";
function SoloNumeros(e){
	var key = e.CharCode || e.which

	var numeros = "0123456789";

	var teclado = String.fromCharCode(key);

	if(numeros.indexOf(teclado)==-1)
	{
		return false;

	}
	else{
		//if(txtOrdenOS.value.length==6){txtMacActual.focus();}
		//if(txtMacActual.value.length==1){txtCliente.focus();}
		return true;
	}
}

function SoloTexto(e){

	var key = e.CharCode || e.which

	var texto = "abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";

	var teclado = String.fromCharCode(key);

	var teclado_especial = "32";

	if(teclado_especial==key){
		return true;
	}



	if(texto.indexOf(teclado)==-1)
	{
		return false;

	}
	else{
		return true;
	}
}



function valida(e,id)
{
	
	switch(id){
		case 3:
		return SoloNumeros(e);
		break;

		case 1:
		return SoloTexto(e);
		break;
	}

}

function ValidarForm(){
	//Validacion de formulario antes del envio
	//
	var Aviso = document.getElementById('MSG');

	if(document.frmMac.txtOrdenOS.value == "" ||
		document.frmMac.txtOrdenOS.value.length<6){
			alert("El campo [No. Orden] no puede estar vacio y debe tener 6 caracteres.");
			document.frmMac.txtOrdenOS.focus();
			return false;
	}else{
		if(document.frmMac.txtMacActual.value == "" ||
			document.frmMac.txtMacActual.value.length<2){
			alert("El campo [Mac Actual] no puede estar vacio y debe tener 2 caracteres numericos.");
			document.frmMac.txtMacActual.focus();
			return false;
		}else{
			if(document.frmMac.txtCliente.value == "") {
				alert("El campo [Cliente] no puede estar vacio");
				document.frmMac.txtCliente.focus();
				return false;
			}else{
				if(document.frmMac.txtContactos1.value == "" ||
					document.frmMac.txtContactos1.value.length<10){
					alert("El campo [Contactos 1] no puede estar vacio y debe tener 10 digitos");
					document.frmMac.txtContactos1.focus();
					return false;
				}else{
					if(document.frmMac.txtContactos2.value == "" ||
						document.frmMac.txtContactos2.value.length<10){
						alert("El campo [Contactos 2] no puede estar vacio y debe tener 10 digitos");
						document.frmMac.txtContactos2.focus();
						return false;
					}else{
						if(document.frmMac.LstStatus.value == "..."){
							alert("Debe seleccionar un estado en el campo [Estado]");
							document.frmMac.LstStatus.focus();
							return false;
						}else{
								if(document.frmMac.TxtNotas.value == ""){
									alert("El campo [Notas] no puede estar vacio");
									document.frmMac.TxtNotas.focus();
									return false;
								}else{
									if(document.frmMac.LstRazon.value == "."){
										alert("Debe seleccionar una Razon en el campo [Razon]");
										document.frmMac.LstRazon.focus();
										return false;
								}
							}							
						}
					}
				}
			}
		}
	}
return true;
}

function ValidarFormDemora(){
	if(document.frmDemoras.txtOsadia.value==""){
		alert("El campo [Osadia] no puede estar vacio.");
		document.frmDemoras.txtOsadia.focus();
		return false;
	}else{
		if(document.frmDemoras.txtTracker.value==""){
		alert("El campo [No. Tracker] no puede estar vacio.");
		document.frmDemoras.txtTracker.focus();
		return false;
		}else{
			if(document.frmDemoras.LstEstado.value=="..."){
			alert("Debe seleccionar una opcion [Status].");
			document.frmDemoras.LstEstado.focus();
			return false;
		}

	}
}
return true;
}

function ValidarFormStatus(){
	if(document.frmStatus.txtOsadia.value==""){
		alert("El campo [Osadia] no puede estar vacio.");
		document.frmStatus.txtOsadia.focus();
		return false;
	}else{
		if(document.frmStatus.txtTracker.value==""){
		alert("El campo [No. Tracker] no puede estar vacio.");
		document.frmStatus.txtTracker.focus();
		return false;
		}
	}
return true;
}

function ValidarFormMovil(){
	if(document.frmMovil.txtDealer.value==""){
		alert("El campo [Dealer] no puede estar vacio.");
		document.frmMovil.txtDealer.focus();
		return false;
	}else{
		if(document.frmMovil.txtTracker.value==""){
		alert("El campo [No. Tracker] no puede estar vacio.");
		document.frmMovil.txtTracker.focus();
		return false;
		}
	}
return true;
}



function ValidarFormEmisiones(){
	if(document.frmEmisiones.txtVendedor.value==""){
		alert("El campo [Vendedor] no puede estar vacio.");
		document.frmEmisiones.txtVendedor.focus();
		return false;
	}else{
		if(document.frmEmisiones.txtCodeVender.value=="" || 
			document.frmEmisiones.txtCodeVender.length<6){
			alert("El campo [Cod. Vendedor] no puede estar vacio y debe tener 6 digitos.");
			document.frmEmisiones.txtCodeVender.focus();
			return false;
		}else{
			if(document.frmEmisiones.txtCodeVenderCanal.value==""){
				alert("El campo [Canal] no puede estar vacio.");
				document.frmEmisiones.txtCodeVenderCanal.focus();
				return false;
			}else{
				if(document.frmEmisiones.txtTracker.value=="" ||
					document.frmEmisiones.txtTracker.length<13){
					alert("El campo [No. Tracker] no puede estar vacio y debe tener 13 digitos.");
					document.frmEmisiones.txtTracker.focus();
					return false;
				}else{
					if(document.frmEmisiones.txtCops.value=="" ||
						document.frmEmisiones.txtCops.length<6){
						alert("El campo [COPS] no puede estar vacio y debe tener 6 digitos.");
						document.frmEmisiones.txtCops.focus();
						return false;
					}else{
						if(document.frmEmisiones.txtOsadia.value=="" ||
							document.frmEmisiones.txtOsadia.length<6){
							alert("El campo [OSADIA] no puede estar vacio y debe tener 6 digitos.");
							document.frmEmisiones.txtOsadia.focus();
							return false;
						}else{
							if(document.frmEmisiones.txtM6.value=="" ||
								document.frmEmisiones.txtM6.length<8){
								alert("El campo [M6] no puede estar vacio y debe tener 8 digitos.");
								document.frmEmisiones.txtM6.focus();
								return false;
							}else{
								if(document.frmEmisiones.txtMAC.value=="" ||
									document.frmEmisiones.txtMAC.length<2){
									alert("El campo [MAC] no puede estar vacio y debe tener 2 digitos.");
									document.frmEmisiones.txtMAC.focus();
									return false;
								}else{
									if(document.frmEmisiones.LstTipoEmision.value=="..."){
										alert("Debe elegir un [Tipo de Emision] para continuar.");
										document.frmEmisiones.LstTipoEmision.focus();
										return false;
									}else{
										if(document.frmEmisiones.LstFactura.value=="..."){
											alert("Debe elegir [Aceptó Factura Electronica] para continuar.");
											document.frmEmisiones.LstFactura.focus();
											return false;

										}else{
											if(document.frmEmisiones.LstDireccion.value=="..."){
												alert("Debe elegir [Direccion] para continuar.");
												document.frmEmisiones.LstDireccion.focus();
												return false;
												
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
return true;
}




function Send(){
		
		var resultadoForm = ValidarForm();

		if(resultadoForm){	
			document.frmMac.submit();
		}
}

function SendEmisiones(){
		
		var resultadoForm = ValidarFormEmisiones();

		if(resultadoForm){	
			document.frmEmisiones.submit();
		}
}

function SendDemora(){
		
		var resultadoForm = ValidarFormDemora();

		if(resultadoForm){	
			document.frmDemoras.submit();
		}
}

function SendStatus(){
		
		var resultadoForm = ValidarFormStatus();

		if(resultadoForm){	
			document.frmStatus.submit();
		}
}

function SendMovil(){
		
		var resultadoForm = ValidarFormMovil();

		if(resultadoForm){	
			document.frmMovil.submit();
		}
}

function SendEdit(){
		
		var resultadoForm = ValidarForm();

		if(resultadoForm){	
			document.frmMac.submit();
			
		}
}

function SendEditAudit(){
		
	document.frmAuditoria.submit();
				
}

function ShowRazon(){
	var Estado = document.getElementById('LstStatus');
	var Razon = document.getElementById('ContRazon');
	var LstRazon = document.getElementById('LstRazon');

	if(Estado.value=='Cerrado'){
		Razon.setAttribute("class", "RAZONOPEN");
	}else{
		Razon.setAttribute("class", "RAZONCLOSE");
	}
}

function ShowAccion(){
	var Estado = document.getElementById('LstEstado');
	var LstAccion = document.getElementById('LstTipoEmision');
	var LstSituacion = document.getElementById('LstSituacion');

	var LstTranfer = document.getElementById('MARCOTRANFER');
	var option = document.createElement("option");
	var option2 = document.createElement("option");

	var osadia = document.getElementById('txtOsadia');
	var nombre = document.getElementById('txtVendedor');
	var code = document.getElementById('txtCodeVender');
	var cliente = document.getElementById('txtCliente');
	var contacto1 = document.getElementById('txtContacto1');
	var contacto2 = document.getElementById('txtContacto2');
	var compañia = document.getElementById('txtCodeVenderCanal');
	var cops = document.getElementById('txtCops');
	var m6 = document.getElementById('txtM6');
	var macactual = document.getElementById('txtMAC');
	var macfinal = document.getElementById('txtMAC2');
	var notas = document.getElementById('txtNotas');
	var miHora = new Date(); 
	var SEGUNDOS = miHora.getSeconds();

	if(Estado.value=='No se Demora'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}
		option.text = "Cliente Desea Servicio";
		LstAccion.add(option);

		option2.text = "Se brinda información";
		LstAccion.add(option2);

		LstTranfer.setAttribute("class", "TranferCLOSE");

	}
	else if(Estado.value=='Demorada'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

	    option.text = "Demora OS";
		LstAccion.add(option);
		LstTranfer.setAttribute("class", "TranferOPEN");
	}

	else if(Estado.value=='Cancelada'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

	    option.text = "OS cancelada/No aplica";
		LstAccion.add(option);
		LstTranfer.setAttribute("class", "TranferCLOSE");
	}

	else if(Estado.value=='Transfer Call'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

	    option.text = "Transfer Call";
		LstAccion.add(option);

        option2.text = "Transfer Call Inbound";
		LstAccion.add(option2);

		LstTranfer.setAttribute("class", "TranferCLOSE");
	}

	else if(Estado.value=='Seguimiento'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

	    option.text = "PENDIENTE";
		LstAccion.add(option);

		LstTranfer.setAttribute("class", "TranferCLOSE");
	}
	else if(Estado.value=='Se Brinda Informacion'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

        option.text = "Se brinda Informacion";
		LstAccion.add(option);

		LstTranfer.setAttribute("class", "TranferCLOSE");
	}

	else if(LstSituacion.value=='Llamada Muda'){

        osadia.value= '0000' + SEGUNDOS;
        nombre.value='NA';
		code.value='NA';
		cliente.value='NA';
		compañia.value='NA';
		cops.value='NA';
		m6.value='NA';
		macactual.value='NA';
    }
	else if(Estado.value=='Llamada Muda'){
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

        option.text = "Llamada Muda";
        osadia.value= '0000' + SEGUNDOS;
		nombre.value='NA';
		code.value='NA';
		cliente.value='NA';
		contacto1.value='NA';
		contacto2.value='NA';
		compañia.value='NA';
		cops.value='NA';
		m6.value='NA';
		macactual.value='NA';
		macfinal.value='NA';
		notas.value='NA';
		LstAccion.add(option);
		LstTranfer.setAttribute("class", "TranferCLOSE");



	}else{
		for (var i = 0; i < Estado.length; i++) {
			LstAccion.remove(0);
		}

		LstTranfer.setAttribute("class", "TranferCLOSE");
	}



}


function ShowMAC(){
	var MAC = document.getElementById('ContEstado');
	var MACTEXT = document.getElementById('txtMAC');
	var Estado = document.getElementById('LstEstado');
	var Direccion = document.getElementById('txtDirCliente');
	var vendedor = document.getElementById('txtVendedor');
	var code = document.getElementById('txtCodeVender');
	var canal = document.getElementById('txtCodeVenderCanal');
	var leader = document.getElementById('txtTeam');

	var dropdownDeuda = document.getElementById('DROPDOWN_DEUDA');
	var marcodeuda = document.getElementById('MarcoDeuda');
	var Situacion = document.getElementById('LstDeuda');
	var marcoauto = document.getElementById('MarcoAutorizada');

	var miHora = new Date(); 
	var SEGUNDOS = miHora.getSeconds();

	if(Situacion.value=='Cliente con deuda'){
		marcodeuda.setAttribute("class", "MARCO_DEUDA_SHOW");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}

	else if(Situacion.value=='Cliente con orden cancelada'){
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_SHOW");
	}else{
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}

	if(Estado.value=='Correcta'){
		MAC.setAttribute("class", "MACOPEN");
		MACTEXT.value = '';
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}
	else if(Estado.value=='Verificacion de Disponibilidad' || Estado.value=='Verificacion de Deuda'){
		MACTEXT.value = '';
		MAC.setAttribute("class", "MACCLOSE");
		MACTEXT.value = 'NA';
		Direccion.value ='NA';
		document.getElementById('txtOsadia').value= '0000' + SEGUNDOS;
		document.getElementById('txtCops').value= '0000' + SEGUNDOS;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
		
	}
	else if(Estado.value=='Autorizado Gerente INV'){
		MACTEXT.value = '';
		MAC.setAttribute("class", "MACOPEN");
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_SHOW");
	}
	else if(Estado.value=='Llamada Muda'){
		MACTEXT.value = '';
		MAC.setAttribute("class", "MACCLOSE");
		MACTEXT.value = 'NA';
		Direccion.value ='NA';
		vendedor.value = 'NA';
		canal.value = 'NA';
		code.value = 'NA';
		leader.value = 'NA';
		document.getElementById('txtOsadia').value= '0000' + SEGUNDOS;
		document.getElementById('txtCops').value= '0000' + SEGUNDOS;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}

	else if(Estado.value=='Caso Referido'){
		MACTEXT.value = '';
		Direccion.value ='';
		vendedor.value = '';
		canal.value = '';
		code.value = '';
		leader.value = '';
		MAC.setAttribute("class", "MACOPEN");
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}

	else if(Estado.value=='Status Referido'){
		MACTEXT.value = '';
		MAC.setAttribute("class", "MACCLOSE");
		MACTEXT.value = 'NA';
		Direccion.value ='NA';
		vendedor.value = 'NA';
		canal.value = 'NA';
		code.value = 'NA';
		leader.value = 'NA';
		document.getElementById('txtOsadia').value= '0000' + SEGUNDOS;
		document.getElementById('txtCops').value= '0000' + SEGUNDOS;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}



	else{
		MAC.setAttribute("class", "MACCLOSE");
		MACTEXT.value = 'ER';
		Direccion.value ='NA';
		document.getElementById('txtOsadia').value= '0000' + SEGUNDOS;
		document.getElementById('txtCops').value= '0000' + SEGUNDOS;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
		
	}

}


function BuscarOS(){
	var OS = document.getElementById('txtOrdenOS').value;
	var Mensaje = document.getElementById('Mensaje');
	
	var url = "ExisteOS.php";
	var url2 = "ExisteOSCerrado.php";
	
	$.ajax({
		type: "POST",
		url: url,
		data: ('txtOrdenOS='+OS),
		success:function(Respuesta){
			if(Respuesta>0){
				alert("Este numero de orden ya esta en seguimiento [OS] , se te llevara al mismo para que lo puedas actualizar");
				location.href = 'http://172.17.10.155:81/clericals/dataseg.php?OS='+OS;
			}else{

				Mensaje.innerHTML = 'Orden libre';
			}
			
		}
	});

	$.ajax({
		type: "POST",
		url: url2,
		data: ('txtOrdenOS='+OS),
		success:function(Respuesta){
			if(Respuesta>0){
				alert("Este numero de orden [" +OS+ "] ya esta cerrado del dia de hoy.");
				Mensaje.innerHTML = 'Orden Cerrada';
				var OS2 = document.getElementById('txtOrdenOS').value = "";
			}else{

				Mensaje.innerHTML = 'Orden libre';
			}
			
		}
	});

}

function BuscarEmision(){
	var OS = document.getElementById('txtOsadia').value;
	var Mensaje = document.getElementById('MensajeEmision');

	var url = "ExisteEmisionesOS.php";
	
	$.ajax({
		type: "POST",
		url: url,
		data: ('txtOsadia='+OS),
		success:function(Respuesta){
			if(Respuesta>0){
				DETENER();
				SHOW();
				Mensaje.innerHTML = "Este numero de orden [" +OS+ "] ya esta emitido del dia de hoy.";
				$("#MensajeEmision").removeClass("alert-success text-center");
				$("#MensajeEmision").removeClass("alert-info text-center");
				$("#MensajeEmision").addClass("alert-danger text-center");
				var OS2 = document.getElementById('txtOsadia').value = "";
				HIDE();
			}else{
				DETENER();
				SHOW();
				Mensaje.innerHTML = 'Orden libre';
				$("#MensajeEmision").removeClass("alert-success text-center");
				$("#MensajeEmision").removeClass("alert-danger text-center");
				$("#MensajeEmision").addClass("alert-info text-center");
				HIDE();
			}

		}
	});
}

/*function EmisionCorrecta(){
	var OS = document.getElementById('txtOsadia').value;
	var Mensaje = document.getElementById('MensajeEmision');

	var url = "SaveEmision.php";
	
	$.ajax({
		type: "POST",
		url: url,
		data: ('txtOsadia='+OS),
		success:function(Respuesta){
			if(Respuesta==0){
				Mensaje.innerHTML = "Se ha registrado la orden [" +OS+ "] correctamente.";
				$("#MensajeEmision").addClass("alert-success text-center");		
			}
		}
	});
}*/


function Limpiar(){
	var OS = document.getElementById('txtOsadia').value = "";
	var	Codigo = document.getElementById('txtCodeVender').value= "";
	var	Canal = document.getElementById('txtCodeVenderCanal').value= "";
	var	TipoEmision = document.getElementById('LstTipoEmision').value= "...";
	var	Tracker = document.getElementById('txtTracker').value= "";
	var	cops = document.getElementById('txtCops').value= "";
	var	m6 = document.getElementById('txtM6').value= "00000000";
	var	MAC = document.getElementById('txtMAC').value= "";
	var	Vendedor = document.getElementById('txtVendedor').value= "";
	var	Factura = document.getElementById('LstFactura').value= "...";
}

function LimpiarMovil(){
	var OS = document.getElementById('txtDealer').value = "";
	var	Codigo = document.getElementById('txtCodeVender').value= "";
	var	Canal = document.getElementById('txtVendedor').value= "";
	var	TipoEmision = document.getElementById('txtTarjeta').value= "";
	var	Tracker = document.getElementById('txtTracker').value= "";
	var	Vendedor = document.getElementById('txtRazon').value= "";
	var	Factura = document.getElementById('txtSolucion').value= "";
}


function HIDE(){
	
	$("#MensajeEmision").fadeOut(10000);
}

function SHOW(){
	$("#MensajeEmision").show();
}

function DETENER(){
	$("#MensajeEmision").finish();
}


HIDE();







