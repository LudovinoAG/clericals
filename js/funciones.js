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
			if(document.frmDemoras.LstEstado.value=="[Elegir una..]"){
			alert("Debe elegir [Motivo Llamada].");
			document.frmDemoras.LstEstado.focus();
			return false;
			}else{
				if(document.frmDemoras.LstTipoEmision.value=="[Elegir Llamada..]" ||
				document.frmDemoras.LstTipoEmision.value=="[Elegir una..]") {
				alert("Debe elegir una [Razon].");
				document.frmDemoras.LstTipoEmision.focus();
				return false;
				}else{
					if(document.frmDemoras.LstAccionDemora.value=="[Elegir Accion..]" ||
					document.frmDemoras.LstAccionDemora.value=="[Elegir una..]") {
					alert("Debe elegir una [Accion].");
					document.frmDemoras.LstAccionDemora.focus();
					return false;
					}else{
						if(document.frmDemoras.LstPueblos.value=="[Elegir pueblo..]") {
						alert("Debe elegir un [Pueblo].");
						document.frmDemoras.LstPueblos.focus();
						return false;
						}else{
							if(document.frmDemoras.LstRetencion.value=="[Elegir una..]") {
							alert("Debe indicar una opción en el campo Retención");
							document.frmDemoras.LstRetencion.focus();
							return false;
							}
						}
					}
				}
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
		}else{
			if(document.frmStatus.LstRetencionStatus.value=="[Elegir una..]") {
				alert("Debe indicar una opción en el campo Retención");
				document.frmStatus.LstRetencionStatus.focus();
				return false;
			}
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

function ValidarFormClaroHogar(){
	if(document.frmClaroHogar.txtOsadia.value==""){
		alert("El campo [OSADIA] no puede estar vacio.");
		document.frmClaroHogar.txtOsadia.focus();
		return false;
	}
return true;
}

function ValidarFormFWA(){
	if(document.frmFWA.txtBan.value==""){
		alert("El campo [BAN] no puede estar vacio.");
		document.frmFWA.txtBan.focus();
		return false;
	}else{
		if(document.frmFWA.txtidVendedor.value==""){
			alert("El campo [Cod. Vendedor] no puede estar vacio.");
			document.frmFWA.txtidVendedor.focus();
			return false;
		}
return true;
	}
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
									if(document.frmEmisiones.LstEmisionProducto.value=="[Elegir Producto..]" ||
										document.frmEmisiones.LstEmisionProducto.value=="[Elegir Sub-Razón..]"){
										alert("Debe elegir un [Producto] para continuar.");
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
												
											}else{
												if(document.frmEmisiones.LstRazonEmision.value=="[Elegir una..]"){
													alert("Debe elegir [Razón] para continuar.");
													document.frmEmisiones.LstRazonEmision.focus();
													return false;

												}else{
													if(document.frmEmisiones.LstSubRazonEmision.value=="[Elegir Razón..]" ||
														document.frmEmisiones.LstSubRazonEmision.value=="[Elegir una..]"){
														alert("Debe elegir [Sub-Razon] para continuar.");
														document.frmEmisiones.LstSubRazonEmision.focus();
														return false;
													}else{
														if(document.frmEmisiones.LstPueblos.value=="[Elegir pueblo..]"){
															alert("Debe elegir un [Pueblo] para continuar.");
															document.frmEmisiones.LstPueblos.focus();
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

function SendFWA(){
		
		var resultadoForm = ValidarFormFWA();

		if(resultadoForm){	
			document.frmFWA.submit();
		}
}

function SendClaroHogar(){
		
		var resultadoForm = ValidarFormClaroHogar();

		if(resultadoForm){	
			document.frmClaroHogar.submit();
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
	var option = document.createElement("option");

	var CategoriaAbierto = ["En Seguimiento"];
	var CategoriaCerrado = ["Se Cancela","Se Reactiva", "Mal demorada", "En Despacho", "Cancelado/Suspendido", "Cancelado/Num. Equivocado/Busy"];
	var CategoriaYaCerrado = ["Trabajado"];
	var CategoriaNula = [""];



	if(Estado.value=='Abierto')
	{
		var reg = LstRazon.length;


		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}

		for(var i=0;i<CategoriaAbierto.length;i++){
    		LstRazon.options[i] = new Option(CategoriaAbierto[i]);
  		}
  	}
  	else if(Estado.value=='Cerrado')
  	{
  		var reg = LstRazon.length;


		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}

		for(var i=0;i<CategoriaCerrado.length;i++){
    		LstRazon.options[i] = new Option(CategoriaCerrado[i]);
  		}
  	}
  	else if(Estado.value=='Ya esta Cerrado')
  	{
  		var reg = LstRazon.length;


		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}

		for(var i=0;i<CategoriaYaCerrado.length;i++){
    		LstRazon.options[i] = new Option(CategoriaYaCerrado[i]);
  		}
  	}
  	else if(Estado.value=='[Elija...]')
  	{
  		var reg = LstRazon.length;


		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}

		for(var i=0;i<CategoriaNula.length;i++){
    		LstRazon.options[i] = new Option(CategoriaNula[i]);
  		}
  	}

	//if(Estado.value=='Cerrado'){
	//	Razon.setAttribute("class", "RAZONOPEN");
	//}else{
	//	Razon.setAttribute("class", "RAZONCLOSE");
	//}
}

function ShowAccion(){
	var Estado = document.getElementById('LstEstado');
	var LstAccion = document.getElementById('LstTipoEmision');
	var LstSituacion = document.getElementById('LstSituacion');
	var LstAccionDemora = document.getElementById('LstAccionDemora');
	var LstPueblos = document.getElementById('LstPueblos');

	var LstTranfer = document.getElementById('MARCOTRANFER');
	var option = document.createElement("option");
	var option2 = document.createElement("option");

	var Osadia = document.getElementById('txtOsadia');
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
	var tracker = document.getElementById('txtTracker');
	var miHora = new Date(); 
	var SEGUNDOS = miHora.getSeconds();

	var RazonDemorar= ["[Elegir una..]", "Cable hurtados", "Cliente no contactado", 
	"Cliente no desea el servicio, no indicó razón", "Cliente no desea el servicio, no indicó razón por demora",
	"Cliente no desea el servicio, por mala orientación", "Cliente no desea el servicio, por mudanza",
	"Cliente no desea el servicio, se queda con celular", "Cliente no desea el servicio, tiene otro proveedor",
	"Cliente no fue contactado para confirmar cancelacion", "Cliente no se encuentra en la residencia/negocio",
	"Cliente no solicitó servicio", "Cliente se muda", "Cliente ya tiene el servicio", "Desganche masivo",
	"HC defectuoso/averiado", "Línea negra", "Mal emitida", "No DSL", "No hay HC", "No llega la velocidad solicitada",
	"No Planta", "No punto de apoyo", "No service wire", "No permite entrada por COVID19", "Pares defectuoso/averiados",
	"Problemas con service wire"];

	var RazonTransferencia = ["[Elegir una..]", "Llamada al area equivocada","Tecnico solicita supervisor"];

	var RazonLlamadaMuda = ["Llamada Muda"];
	var RazonLlamadaMudaVacio = ["N/A"];

	var RazonInformacion = ["[Elegir una..]","Referencia adicional", "Informacion de Facilidades", "Contacto adicional"];

	var Pueblos = ["[Elegir pueblo..]","Adjuntas",
"Aguada",
"Aguadilla",
"Aguas Buenas",
"Aibonito",
"Arecibo",
"Arroyo",
"Añasco",
"Barceloneta",
"Barranquitas",
"Bayamón",
"Cabo Rojo",
"Caguas",
"Camuy",
"Canóvanas",
"Carolina",
"Cataño",
"Cayey",
"Ceiba",
"Ciales",
"Cidra",
"Coamo",
"Comerío",
"Corozal",
"Culebra",
"Dorado",
"Fajardo",
"Florida",
"Guayama",
"Guayanilla",
"Guaynabo",
"Gurabo",
"Guánica",
"Hatillo",
"Hormigueros",
"Humacao",
"Isabela",
"Jayuya",
"Juana Díaz",
"Juncos",
"Lajas",
"Lares",
"Las Marías",
"Las Piedras",
"Loiza",
"Luquillo",
"Manatí",
"Maricao",
"Maunabo",
"Mayagüez",
"Moca",
"Morovis",
"Naguabo",
"Naranjito",
"Orocovis",
"Patillas",
"Peñuelas",
"Ponce",
"Quebradillas",
"Rincón",
"Rio Grande",
"Sabana Grande",
"Salinas",
"San Germán",
"San Juan",
"San Lorenzo",
"San Sebastián",
"Santa Isabel",
"Toa Alta",
"Toa Baja",
"Trujillo Alto",
"Utuado",
"Vega Alta",
"Vega Baja",
"Vieques",
"Villalba",
"Yabucoa",
"Yauco"];




	//var SubCategoriaProductoVacio = ["N/A"];
	//var SubCategoriaRazonLlamadaMuda= ["Llamada Muda"];

	//var SubCategoriaProducto= ["[Elegir una..]", "2Play", "Linea Sencilla", "IPTV Standallone", 
	//"Internet Standallone", "DISH Standallone", "3Play/IPTV", "3Play/DISH", "Portabilidad"];

	if(Estado.value =='Demorar' || Estado.value =='No se Demora'){

			var reg = LstAccion.length;
			var reg1 = LstPueblos.length;

			for (var i = 0; i < reg; i++) {
				LstAccion.remove(0);
			}

			for (var i = 0; i < reg1; i++) {
				LstPueblos.remove(0);
			}


			for(var i=0;i<RazonDemorar.length;i++){
	    		LstAccion.options[i] = new Option(RazonDemorar[i]);
	  		}

	  		for(var i=0;i<Pueblos.length;i++){
	    		LstPueblos.options[i] = new Option(Pueblos[i]);
	  		}

/*	  		Osadia.value = "";
	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";*/
			//LstPueblos.value = "[Elegir pueblo..]";
	}
	else if(Estado.value =='Transferencia')
	{
			var reg = LstAccion.length;
			var reg1 = LstPueblos.length;

			for (var i = 0; i < reg; i++) {
				LstAccion.remove(0);
			}

			for (var i = 0; i < reg1; i++) {
				LstPueblos.remove(0);
			}


			for(var i=0;i<RazonTransferencia.length;i++){
	    		LstAccion.options[i] = new Option(RazonTransferencia[i]);
	  		}

	  		for(var i=0;i<Pueblos.length;i++){
	    		LstPueblos.options[i] = new Option(Pueblos[i]);
	  		}

	  		/*Osadia.value = "";
	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";*/
	
	}
	else if(Estado.value =='Llamada Muda')
	{
			var reg = LstAccion.length;
			var reg2 = LstAccionDemora.length;
			var reg3 = LstPueblos.length;

			//Llamada
			for (var i = 0; i < reg; i++) {
				LstAccion.remove(0);
			}

			//Accion
			for (var i = 0; i < reg2; i++) {
				LstAccionDemora.remove(0);
			}

			//Pueblos
			for (var i = 0; i < reg3; i++) {
				LstPueblos.remove(0);
			}



			for(var i=0;i<RazonLlamadaMuda.length;i++){
	    		LstAccion.options[i] = new Option(RazonLlamadaMuda[i]);
	  		}

	  		for(var i=0;i<RazonLlamadaMudaVacio.length;i++){
	    		LstAccionDemora.options[i] = new Option(RazonLlamadaMudaVacio[i]);
	  		}

	  		for(var i=0;i<RazonLlamadaMudaVacio.length;i++){
	    		LstPueblos.options[i] = new Option(RazonLlamadaMudaVacio[i]);
	  		}


	}
	else if(Estado.value =='Se Brinda Informacion')
	{
			var reg = LstAccion.length;
			var reg1 = LstPueblos.length;

			for (var i = 0; i < reg; i++) {
				LstAccion.remove(0);
			}

			for (var i = 0; i < reg1; i++) {
				LstPueblos.remove(0);
			}

			for(var i=0;i<RazonInformacion.length;i++){
	    		LstAccion.options[i] = new Option(RazonInformacion[i]);
	  		}
	  		
	  		for(var i=0;i<Pueblos.length;i++){
	    		LstPueblos.options[i] = new Option(Pueblos[i]);
	  		}

	}

}

function RazonDemora(){
	var Estado = document.getElementById('LstEstado');
	var LstAccion = document.getElementById('LstTipoEmision');
	var LstAccionDemora = document.getElementById('LstAccionDemora');

	var AccionDemorar=["[Elegir una..]", "Demora OS", "Devuelta a contratista/Cita", 
	"Devuelta a contratista/Cliente Desea Servicio","Emitir orden", "OS cancelada/No aplica", 
	"Seguimiento con el vendedor", "Se pasa llamada con supervisor de planta", "Transferido TMK/No CH", 
	"No Transferido TMK/Si CH", "No contactado para transferir TMK", "No desea transferencia", 
	"Se contacta Cliente/Se coordina instalacion", "Se contacta Supervisor/Se coordina instalacion"];

	var TransferenciaAccion = ["[Elegir una..]", "Cuadro Status", "Cuadro Emisiones", 
	"Servicio al cliente", "Finanzas", "Asignaciones", "Despacho"];

	var TransferenciaAccion2 = ["[Elegir una..]", "Transferida a Supervisor"];

	var RazonLlamadaVacio = ["N/A"];

	//Accion Demora
	if(LstAccion.value != "[Elegir una..]"){

			var reg = LstAccionDemora.length;

			for (var i = 0; i < reg; i++) {
				LstAccionDemora.remove(0);
			}


			for(var i=0;i<AccionDemorar.length;i++){
	    		LstAccionDemora.options[i] = new Option(AccionDemorar[i]);
	  		}
	}

	//Llamada y Razones
	if(Estado.value == "Transferencia" && LstAccion.value == "Llamada al area equivocada") 
	{
			var reg = LstAccionDemora.length;

			for (var i = 0; i < reg; i++) {
				LstAccionDemora.remove(0);
			}


			for(var i=0;i<TransferenciaAccion.length;i++){
	    		LstAccionDemora.options[i] = new Option(TransferenciaAccion[i]);
	  		}
	}

	else if(Estado.value == "Transferencia" && LstAccion.value == "Tecnico solicita supervisor")
	{
			var reg = LstAccionDemora.length;

			for (var i = 0; i < reg; i++) {
				LstAccionDemora.remove(0);
			}


			for(var i=0;i<TransferenciaAccion2.length;i++){
	    		LstAccionDemora.options[i] = new Option(TransferenciaAccion2[i]);
	  		}
	}
	else if(Estado.value == "Se Brinda Informacion" && LstAccion.value == "Referencia adicional" ||
	LstAccion.value == "Informacion de Facilidades" || LstAccion.value == "Contacto adicional" )
	{
			var reg = LstAccionDemora.length;

			for (var i = 0; i < reg; i++) {
				LstAccionDemora.remove(0);
			}


			for(var i=0;i<RazonLlamadaVacio.length;i++){
	    		LstAccionDemora.options[i] = new Option(RazonLlamadaVacio[i]);
	  		}
	}
	
}

function ShowTipoEmision(){
	var marcohogarauto = document.getElementById('MarcoClaroHogar');
	var TipoEmision = document.getElementById('LstTipoEmision');
	var marcoauto = document.getElementById('MarcoAutorizada');
	var marcodeuda = document.getElementById('MarcoDeuda')

	if(TipoEmision.value=='Claro Hogar'){
		marcohogarauto.setAttribute("class", "MARCO_AUTO_SHOW_HOGAR");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
		marcodeuda.setAttribute("class", "MARCO_AUTO_HIDE");
	}else{
		marcohogarauto.setAttribute("class", "MARCO_AUTO_HIDE_HOGAR");
	}
}


function ShowEmisionSub(){
		var SubRazonEmision = document.getElementById('LstSubRazonEmision');
		var LstEmisionProducto = document.getElementById('LstEmisionProducto');

		var SubCategoriaProducto= ["[Elegir Producto..]", "2Play", "Linea Sencilla", "IPTV Standallone", 
	"Internet Standallone", "DISH Standallone", "3Play/IPTV", "3Play/DISH", "Portabilidad"];

		var SubCategoriaProductoVacio = ["N/A"];

	//SubRazonEmision
	if(SubRazonEmision.value=='Orden Emitida'){

			var reg = LstEmisionProducto.length;

			for (var i = 0; i < reg; i++) {
				LstEmisionProducto.remove(0);
			}


			for(var i=0;i<SubCategoriaProducto.length;i++){
	    		LstEmisionProducto.options[i] = new Option(SubCategoriaProducto[i]);
	  		}
	}

	else if(SubRazonEmision.value=='Cuadro Status' || SubRazonEmision.value=='Cuadro Demora' 
		||	SubRazonEmision.value=='Confirmacion de Pago' || SubRazonEmision.value=='Efectuar Pago' 
		||	SubRazonEmision.value=='Llamada se cae en proceso' || SubRazonEmision.value=='Servicio al Cliente'
		||	SubRazonEmision.value=='Finanzas' || SubRazonEmision.value=='Orientacion'){

			var reg = LstEmisionProducto.length;

			for (var i = 0; i < reg; i++) {
				LstEmisionProducto.remove(0);
			}

			for(var i=0;i<SubCategoriaProductoVacio.length;i++){
	    		LstEmisionProducto.options[i] = new Option(SubCategoriaProductoVacio[i]);
	  		}

	}


	else{
			var reg = LstEmisionProducto.length;

			for (var i = 0; i < reg; i++) {
				LstEmisionProducto.remove(0);
			}


			for(var i=0;i<SubCategoriaProducto.length;i++){
	    		LstEmisionProducto.options[i] = new Option(SubCategoriaProducto[i]);
	  		}
	}
}


function ShowEmision(){
	var RazonEmision = document.getElementById('LstRazonEmision');
	var SubRazonEmision = document.getElementById('LstSubRazonEmision');
	var LstEmisionProducto = document.getElementById('LstEmisionProducto');
	var LstEmisionPueblo = document.getElementById('LstPueblos');
	var Osadia = document.getElementById('txtOsadia');

	var txtVendedor = document.getElementById('txtVendedor');
	var txtCodeVender = document.getElementById('txtCodeVender');
	var txtTeam = document.getElementById('txtTeam');
	var txtCodeVenderCanal = document.getElementById('txtCodeVenderCanal');
	var txtTracker = document.getElementById('txtTracker');
	var txtCops = document.getElementById('txtCops');
	var txtM6 = document.getElementById('txtM6');
	var txtMAC =  document.getElementById('txtMAC');
	var txtDirCliente = document.getElementById('txtDirCliente');


	var SubCategoriaRazonEmision= ["[Elegir una..]", "Orden Emitida", "Failed", "Processing"];
	var SubCategoriaRazonNoEmision= ["[Elegir una..]", "Referido crear direccion", "Deuda en SIF",
	"Cliente no desea servicio", "TPV rechazado", "Pendiente info. cliente", "Llamada se cae en proceso"];
	var SubCategoriaRazonTransfer= ["[Elegir una..]", "Cuadro Status", "Cuadro Demora", "Servicio al Cliente", "Finanzas"];

	var SubCategoriaRazonReferido= ["[Elegir una..]", "Supervisor", "Capturista"];

	var SubCategoriaRazonInformacion= ["[Elegir una..]", "Confirmacion de Pago", "Efectuar Pago", "Orientacion"];

	var SubCategoriaProductoVacio = ["N/A"];
	var SubCategoriaRazonLlamadaMuda= ["Llamada Muda"];


	//var SubCategoriaProducto= ["[Elegir una..]", "2Play", "Linea Sencilla", "IPTV Standallone", 
	//"Internet Standallone", "DISH Standallone", "3Play/IPTV", "3Play/DISH", "Portabilidad"];

	if(RazonEmision.value=='Emisión'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonEmision.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonEmision[i]);
	  		}

	  		Osadia.value = "";

	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtTeam.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";
			txtDirCliente.value = "";
			LstEmisionPueblo.value = "[Elegir pueblo..]"
	}

	else if(RazonEmision.value=='Orden No Emitida'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonNoEmision.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonNoEmision[i]);
	  		}

	  		Osadia.value = Math.round(Math.random()*999999);

	  		
	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtTeam.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";
			txtDirCliente.value = "";
			LstEmisionPueblo.value = "[Elegir pueblo..]"

	}

	else if(RazonEmision.value=='Transferencia'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonTransfer.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonTransfer[i]);
	  		}

	  		Osadia.value = Math.round(Math.random()*999999);


	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtTeam.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";
			txtDirCliente.value = "";
			LstEmisionPueblo.value = "[Elegir pueblo..]"

	}

	else if(RazonEmision.value=='Llamada Muda'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonLlamadaMuda.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonLlamadaMuda[i]);
	  		}

	  		var reg2 = LstEmisionProducto.length;

			for (var i = 0; i < reg2; i++) {
				LstEmisionProducto.remove(0);
			}

			for(var i=0;i<SubCategoriaProductoVacio.length;i++){
	    		LstEmisionProducto.options[i] = new Option(SubCategoriaProductoVacio[i]);
	  		}


	  		Osadia.value = Math.round(Math.random()*999999);

			txtVendedor.value = "N/A";
			txtCodeVender.value = "0";
			txtTeam.value = "N/A";
			txtCodeVenderCanal.value = "N/A";
			txtTracker.value = "00000000000";
			txtCops.value = "00000";
			txtM6.value = "00000";
			txtMAC.value = "N/A";
			txtDirCliente.value = "N/A";
			LstEmisionPueblo.value = "N/A"

	}

	else if(RazonEmision.value=='Caso Referido'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonReferido.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonReferido[i]);
	  		}

	  		Osadia.value = "";
	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtTeam.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";
			txtDirCliente.value = "";
			LstEmisionPueblo.value = "[Elegir pueblo..]"
	}

	else if(RazonEmision.value=='Informaciones'){

			var reg = SubRazonEmision.length;

			for (var i = 0; i < reg; i++) {
				SubRazonEmision.remove(0);
			}


			for(var i=0;i<SubCategoriaRazonInformacion.length;i++){
	    		SubRazonEmision.options[i] = new Option(SubCategoriaRazonInformacion[i]);
	  		}

	  		Osadia.value = "";
	  		txtVendedor.value = "";
			txtCodeVender.value = "";
			txtTeam.value = "";
			txtCodeVenderCanal.value = "";
			txtTracker.value = "";
			txtCops.value = "";
			txtM6.value = "";
			txtMAC.value = "";
			txtDirCliente.value = "";
			LstEmisionPueblo.value = "[Elegir pueblo..]"

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
	var Identificador = Math.round(Math.random()*999999);
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
		document.getElementById('txtOsadia').value= Identificador;
		document.getElementById('txtCops').value= Identificador;
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
		document.getElementById('txtOsadia').value= Identificador;
		document.getElementById('txtCops').value= Identificador;
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
		document.getElementById('txtOsadia').value= Identificador;
		document.getElementById('txtCops').value= Identificador;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
	}



	else{
		MAC.setAttribute("class", "MACCLOSE");
		MACTEXT.value = 'ER';
		Direccion.value ='NA';
		document.getElementById('txtOsadia').value= Identificador;
		document.getElementById('txtCops').value= Identificador;
		dropdownDeuda.setAttribute("class", "DROP_DEUDA_HIDE");
		marcodeuda.setAttribute("class", "MARCO_DEUDA_HIDE");
		marcoauto.setAttribute("class", "MARCO_AUTO_HIDE");
		
	}

}

function CategoriaFWACompletada()
{
	var lstVentaCompletada = document.getElementById('lstVentaCompletada');
	var txtRazon = document.getElementById('txtRazon');

		//Condicional Venta Completada
	if(lstVentaCompletada.value=='Si')
	{
		txtRazon.value = "N/A";
	}
	else
	{
		txtRazon.value = "";
	}
}


function CategoriaFWA()
{
	var lstContrato =  document.getElementById('lstContrato');
	var lstProducto =  document.getElementById('lstProducto');
	var lstEquipo = document.getElementById('lstEquipo');

	var lstCreditClass = document.getElementById('lstCreditClass');
	var txtMonto = document.getElementById('txtMonto');
	var txtTipoPago =  document.getElementById('txtTipoPago');

	var txtConfirmacionSpy = document.getElementById('txtConfirmacionSpy');

	var lstAprobadoCIVS = document.getElementById('lstAprobadoCIVS');
	var lstVentaCompletada = document.getElementById('lstVentaCompletada');
	var txtRazon = document.getElementById('txtRazon');
	var txtNumAproba = document.getElementById('txtNumAproba');

	var txtBan = document.getElementById('txtBan');
	var txtReferencia = document.getElementById('txtReferencia');
	var txtPersonaAutorizada = document.getElementById('txtPersonaAutorizada');
	

	var CategoriaContratoUpdate = ["[Elegir uno...]","12 Meses", "24 Meses","N/A"];
	var CategoriaContratoPostPago = ["24 Meses","N/A"];
	var CategoriaContratoBYOP = ["Sin Contrato","N/A"];
	var CategoriaContratoVacio = ["[Elegir producto]","N/A"];

	var CategoriaVentaAprobadaSi = ["[Elegir una]","Si", "No"];
	var CategoriaVentaAprobadaNo = ["No"];
	var CategoriaVentaAprobadaVacio = ["[Elegir CIVS]"];


	if(lstProducto.value=='PostPago')
		{
			var reg = lstContrato.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}


			for(var i=0;i<CategoriaContratoPostPago.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoPostPago[i]);
	  		}

		}
	else if(lstProducto.value=='Update')
		{
			var reg = lstContrato.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}


			for(var i=0;i<CategoriaContratoUpdate.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoUpdate[i]);
	  		}
		}
	else if(lstProducto.value=='BYOP')
		{
			var reg = lstContrato.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}


			for(var i=0;i<CategoriaContratoBYOP.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoBYOP[i]);
	  		}
		}
	else if(lstProducto.value=='[Elegir uno]')
		{
			var reg = lstContrato.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}


			for(var i=0;i<CategoriaContratoVacio.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoVacio[i]);
	  		}
		}

	//Condicionales para el CreditClass de FWA

	if(lstCreditClass.value=='B y C')
		{
			if(lstProducto.value=='PostPago')
			{
				txtMonto.value = '0.00';
				txtTipoPago.value = 'No Aplica';
			}

			else if(lstProducto.value=='Update')
			{
				txtMonto.value = '13.80';
				txtTipoPago.value = 'IVU($13.80)';
			}

			else if(lstProducto.value=='BYOP')
			{
				txtMonto.value = '133.80';
				txtTipoPago.value = 'IVU($13.80) + Equipo($120.00)';
			}

		}
	else if(lstCreditClass.value=='D')
		{
			if(lstProducto.value=='PostPago')
			{
				txtMonto.value = '100.00';
				txtTipoPago.value = 'Depósito (CC)';
			}

			else if(lstProducto.value=='Update')
			{
				txtMonto.value = '113.80';
				txtTipoPago.value = 'Depósito($100.00) + IVU($13.80)';
			}

			else if(lstProducto.value=='BYOP')
			{
				txtMonto.value = '0.00';
				txtTipoPago.value = 'Total del equipo + IVU';
			}

		}
	else if(lstCreditClass.value=='F y G')
		{
			if(lstProducto.value=='PostPago')
			{
				txtMonto.value = '100.00';
				txtTipoPago.value = 'Depósito (CC)';
			}

			else if(lstProducto.value=='Update')
			{
				txtMonto.value = '182.30';
				txtTipoPago.value = 'Depósito CC($100.00) + Depósito Equipo($30.00) + Down Payment Equipo($38.50) + IVU($13.80)';
			}

			else if(lstProducto.value=='BYOP')
			{
				txtMonto.value = '0.00';
				txtTipoPago.value = 'Total del equipo + IVU';
			}

		}
	else if(lstCreditClass.value=='Quiebra')
		{
			if(lstProducto.value=='PostPago')
			{
				txtMonto.value = '300.00';
				txtTipoPago.value = 'Depósito (CC)';
			}

			else if(lstProducto.value=='Update')
			{
				lstProducto.value = "[Elegir uno]";
			}

			else if(lstProducto.value=='BYOP')
			{
				txtMonto.value = '0.00';
				txtTipoPago.value = 'Total del equipo + IVU';
			}

		}
	else
		{
			txtMonto.value = '0.00';
			txtTipoPago.value = '';
		}

	//Condicional para CIVS
	if(lstAprobadoCIVS.value=='Si')
		{
			var reg = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
					lstVentaCompletada.remove(0);
				}


			for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}
		  	txtRazon.value = "";
		  	txtNumAproba.value = "";
		}
	else if(lstAprobadoCIVS.value=='No')
		{
			var reg = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
					lstVentaCompletada.remove(0);
				}


			for(var i=0;i<CategoriaVentaAprobadaNo.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaNo[i]);
		  		}

		 	txtRazon.value = "No paso la validacion de CIVS"
		 	txtNumAproba.value = "N/A";	
		 	lstProducto.value = "N/A";
		 	lstCreditClass.value = "N/A";
		 	lstContrato.value = "N/A";
		 	txtBan.value = "N/A";
		 	txtConfirmacionSpy.value = "N/A";
		 	lstEquipo.value = "N/A";
		 	txtTipoPago.value = "N/A";

		}
	else if(lstAprobadoCIVS.value=='Averia')
		{
			var reg = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
					lstVentaCompletada.remove(0);
				}


			for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}
		}
	else if(lstAprobadoCIVS.value=='Regular')
		{
			var reg = lstContrato.length;
			var reg2 = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}

			for (var i = 0; i < reg; i++) {
				lstVentaCompletada.remove(0);
			}


			for(var i=0;i<CategoriaContratoUpdate.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoUpdate[i]);
	  		}

	  		for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}
		}
	else if(lstAprobadoCIVS.value=='Averia/Portabilidad')
		{
			var reg = lstContrato.length;
			var reg2 = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}

			for (var i = 0; i < reg; i++) {
				lstVentaCompletada.remove(0);
			}


			for(var i=0;i<CategoriaContratoUpdate.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoUpdate[i]);
	  		}

	  		for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}
		}
		else if(lstAprobadoCIVS.value=='Suspendido')
		{
			var reg = lstContrato.length;
			var reg2 = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}

			for (var i = 0; i < reg; i++) {
				lstVentaCompletada.remove(0);
			}


			for(var i=0;i<CategoriaContratoUpdate.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoUpdate[i]);
	  		}

	  		for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}

		  	txtRazon.value = "Cuenta Suspendida"
		 	txtNumAproba.value = "N/A";	
		 	lstProducto.value = "N/A";
		 	lstCreditClass.value = "N/A";
		 	lstContrato.value = "N/A";
		 	txtBan.value = "N/A";
		 	txtConfirmacionSpy.value = "N/A";
		 	lstEquipo.value = "N/A";
		 	txtTipoPago.value = "N/A";
		}
		else if(lstAprobadoCIVS.value=='Deuda')
		{
			var reg = lstContrato.length;
			var reg2 = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
				lstContrato.remove(0);
			}

			for (var i = 0; i < reg; i++) {
				lstVentaCompletada.remove(0);
			}


			for(var i=0;i<CategoriaContratoUpdate.length;i++){
	    		lstContrato.options[i] = new Option(CategoriaContratoUpdate[i]);
	  		}

	  		for(var i=0;i<CategoriaVentaAprobadaSi.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaSi[i]);
		  		}

		  	txtRazon.value = "Cuenta con deuda"
		 	txtNumAproba.value = "N/A";	
		 	lstProducto.value = "N/A";
		 	lstCreditClass.value = "N/A";
		 	lstContrato.value = "N/A";
		 	txtBan.value = "N/A";
		 	txtConfirmacionSpy.value = "N/A";
		 	lstEquipo.value = "N/A";
		 	txtTipoPago.value = "N/A";
		}
	else
		{
			var reg = lstVentaCompletada.length;

			for (var i = 0; i < reg; i++) {
					lstVentaCompletada.remove(0);
				}


			for(var i=0;i<CategoriaVentaAprobadaVacio.length;i++){
		    		lstVentaCompletada.options[i] = new Option(CategoriaVentaAprobadaVacio[i]);
		  		}
			txtRazon.value = "";
		}

}

function Categorias(){
	var LstRazon = document.getElementById('LstRazon');
	var LstSubRazon = document.getElementById('LstSubRazon');
	var LstTipo = document.getElementById('LstTipo');
	var LstResultado = document.getElementById('LstResultado');


	var DROPDOWNCATEGORIA = document.getElementById('DROPDOWN_CATEGORIA');

	var CaterogiasPrePago = ["[Elegir categoria...]", "Cambio de plan","Reactivación de plan","Realizar recarga",
	"Plan erróneo", "Transferir balance", "No se refleja cuenta en GEM", "Número no es prepago", "Desconectado GEM por cambio de tecnología",
	"Validar consumo", "Plan no honra beneficios", "Bloqueo de promocionales por Be-Mobile", "Consulta de ofertas disponible", 
	"Debito de recarga duplicada (INCOM)", "Recarga a través de claropr.com", "Cliente en plan 3000"];

	var CaterogiasPostPago = ["[Elegir Categoria...]", "Activacion", "Proceso de caja", "Planes", "Otros"];
	var ResultadoLlamada = ["[Elegir Resultado...]", "Se resuelve en la llamada", "Se deja pendiente"];

	
	var VACIO = ["N/A"];
	var VACIO2 = ["[Elegir Categoria...]"];
	var VACIO3 = ["[Elegir Sub-Categoria...]"];
	var VACIO4 = ["[Elegir Resultado...]"];

	if(LstTipo.value=='Pre-Pago')
	{
		var reg = LstRazon.length;
		var reg2 = LstSubRazon.length;
		var reg3 = LstResultado.length;

		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}
		for (var i = 0; i < reg2; i++) {
			LstSubRazon.remove(0);
		}
		for (var i = 0; i < reg3; i++) {
			LstResultado.remove(0);
		}


		for(var i=0;i<CaterogiasPrePago.length;i++){
    		LstRazon.options[i] = new Option(CaterogiasPrePago[i]);
  		}
  		for(var i=0;i<ResultadoLlamada.length;i++){
    		LstResultado.options[i] = new Option(ResultadoLlamada[i]);
  		}

  		for(var i=0;i<VACIO3.length;i++){
    		LstSubRazon.options[i] = new Option(VACIO3[i]);
  		}

		//LstTranfer.setAttribute("class", "TranferCLOSE");

	}
	else if(LstTipo.value=='Mesa de ayuda Sif')
	{
		var reg = LstRazon.length;
		var reg2 = LstSubRazon.length;
		var reg3 = LstResultado.length;

		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}
		for (var i = 0; i < reg2; i++) {
			LstSubRazon.remove(0);
		}
		for (var i = 0; i < reg3; i++) {
			LstResultado.remove(0);
		}


		for(var i=0;i<CaterogiasPostPago.length;i++){
    		LstRazon.options[i] = new Option(CaterogiasPostPago[i]);
  		}

  		for(var i=0;i<ResultadoLlamada.length;i++){
    		LstResultado.options[i] = new Option(ResultadoLlamada[i]);
  		}

  		for(var i=0;i<VACIO3.length;i++){
    		LstSubRazon.options[i] = new Option(VACIO3[i]);
  		}
  	}
	else if(LstTipo.value=='Prueba' || LstTipo.value=='Llamada Muda')
	{
		var reg = LstRazon.length;
		var reg2 = LstSubRazon.length;
		var reg3 = LstResultado.length;

		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}
		for (var i = 0; i < reg2; i++) {
			LstSubRazon.remove(0);
		}
		for (var i = 0; i < reg3; i++) {
			LstResultado.remove(0);
		}



		for(var i=0;i<VACIO.length;i++){
    		LstRazon.options[i] = new Option(VACIO[i]);
    		LstSubRazon.options[i] = new Option(VACIO[i]);
    		LstResultado.options[i] = new Option(VACIO[i]);
  		}
  	}
  	else if(LstTipo.value=='[Elegir una...]')
	{

		var reg2 = LstRazon.length;
		var reg3 = LstSubRazon.length;
		var reg4 = LstResultado.length;

		for (var i = 0; i < reg2; i++) {
			LstRazon.remove(0);
		}
		for (var i = 0; i < reg3; i++) {
			LstSubRazon.remove(0);
		}
		for (var i = 0; i < reg4; i++) {
			LstResultado.remove(0);
		}

		////////////////////////////******/////////////
		///////////////////////////*******/////////////
		for(var i=0;i<VACIO2.length;i++){
    		LstRazon.options[i] = new Option(VACIO2[i]);
  		}

  		for(var i=0;i<VACIO3.length;i++){
    		LstSubRazon.options[i] = new Option(VACIO3[i]);
  		}

  		 for(var i=0;i<VACIO4.length;i++){
    		LstResultado.options[i] = new Option(VACIO4[i]);
  		}
  	}



    else if(LstTipo.value=='[Elegir Resultado...]')
	{
		var reg = LstRazon.length;
		var reg2 = LstSubRazon.length;
		var reg3 = LstResultado.length;

		for (var i = 0; i < reg; i++) {
			LstRazon.remove(0);
		}
		for (var i = 0; i < reg2; i++) {
			LstSubRazon.remove(0);
		}
		for (var i = 0; i < reg3; i++) {
			LstResultado.remove(0);
		}

		for(var i=0;i<VACIO2.length;i++){
    		LstRazon.options[i] = new Option(VACIO2[i]);
  		}

  		for(var i=0;i<ResultadoLlamada.length;i++){
    		LstResultado.options[i] = new Option(ResultadoLlamada[i]);
  		}

  		for(var i=0;i<VACIO3.length;i++){
    		LstSubRazon.options[i] = new Option(VACIO3[i]);
  		}


  	}





}

function SubCategorias()
{
	var LstSubRazon = document.getElementById('LstSubRazon');
	var LstRazon = document.getElementById('LstRazon');
	var DROPDOWNCATEGORIA = document.getElementById('DROPDOWN_CATEGORIA');

	var SubCateforiaPrePagoCambioPlan = ["Solicitud de cambio de plan", "Se realizó recarga antes de solicitar cambio de plan",
	"Cliente desconoce el proceso de solicitud de cambio de plan"];
	var SubCateforiaPrePagoReactivaciónPlan = ["Cliente recargo para reiniciar su plan"];
	var SubCateforiaPrePagoPlanErroneo = ["Se activó plan erróneo en GEM"];
	var SubCateforiaPrePagoTransferirBalance = ["Transferencia de recarga errónea a otro numero"];
	var SubCateforiaPrePagoRecarga = ["Recarga realizada a número erróneo","Recarga no se realizada de forma correcta",
	"Recarga no se refleja en la cuenta", "Realizar recarga de 15 dígitos en GEM","Realizar recarga en Gem", 
	"Realizar recarga de 15 dígitos por el sistema automatizado", "Se realizó recarga pero no se activó el servicio en GEM",
	"Se realizó recarga y aun no se ha activado el servicio", "Orientación de los  métodos de recarga", "Recarga realizada en GEM",
	"Orientación proceso de recarga  de 10 dígitos"];
	var SubCateforiaPrePagoMoveCuenta = ["Separación de cuenta por proceso de portabilidad", "Separación de cuenta por proceso de migración de servicio"];
	var SubCateforiaPrePagoNoReflejaGEM = ["Cuanta no se refleja por cancelación errónea en SIF","Transacciones retenida"];
	var SubCateforiaPrePagoNotPrepago = ["Reactivación de cuenta por robo o perdida","Cliente adquirió un nuevo equipo (robo)","Cliente recupero la unidad perdida (perdida)"];
	var SubCateforiaPrePagoDesconexion = ["Cliente realizó cambio de sim card 3G o 4G"];
	var SubCateforiaPrePagoValidarConsumo = ["Consumo de data", "Consumo de minutos", "Consulta de balance", "Consumo de mensajes de textos o multimedia",
	"Debito de recarga duplicada (INCOM)"];
	var SubCateforiaPrePagoPlanHonra = ["Plan no honra data disponibles", "Plan no honra servicio de llamadas a los destinos internacionales",
	"Plan no honra minutos disponible"];
	var SubCateforiaPrePagoBloqueo = ["Bloqueo de suscripciones en la unidad", "Bloqueo de suscripciones en Be-Mobil"];
	var SubCateforiaPrePagoConsulta = ["Tarifas disponibles", "Tarifas en oferta"];
	var SubCateforiaPrePagoDebitoDupleINCOM = ["Debito de recarga suplicada realizada por el agente de INCOM", "Debito de recarga realiza por error INCOM"];
	var SubCateforiaPrePagoRecargaClaroPR = ["Tarjeta no pasa la recarga", "Página da error al procesar los datos de la cuenta del cliente"];
	var SubCateforiaPrePagoPlan3000 = ["Expiro fecha de recarga", "Gem desactivo plan por error"];

	var SubCateforiaPostPagoActivacion = ["[Elegir Sub-Categoria...]", "Linea Nueva", "Renovacion Update", "Migracion Update", "Portabilidad"];
	var SubCateforiaPostPagoPlanes = ["[Elegir Sub-Categoria...]", "Cambio de Plan", "Servicio adicional"];
	var SubCateforiaPostPagoCaja = ["[Elegir Sub-Categoria...]", "Cerrar Caja"];
	var SubCateforiaPostPagoOtros = ["[Elegir Sub-Categoria...]", "Otros"];

	var VACIO = ["N/A"];
	var VACIO2 = ["[Elegir categoria...]"];
	//var CaterogiasPostPago = ["[Elegir categoria...]", "Activacion", "Proceso de caja", "Planes", "Otros"];

	//POSTPAGO SUBCATEGORIA
	if(LstRazon.value=='Activacion')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPostPagoActivacion.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPostPagoActivacion[i]);
  		}

	}
	else if(LstRazon.value=='Proceso de caja')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPostPagoCaja.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPostPagoCaja[i]);
  		}

	}
	else if(LstRazon.value=='Planes')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPostPagoPlanes.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPostPagoPlanes[i]);
  		}

	}
	else if(LstRazon.value=='Otros')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPostPagoOtros.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPostPagoOtros[i]);
  		}

	}

	//PRE-PAGO SUBCATEGORIA
	if(LstRazon.value=='Cambio de plan')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoCambioPlan.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoCambioPlan[i]);
  		}

	}
	else if(LstRazon.value=='Reactivación de plan')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoReactivaciónPlan.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoReactivaciónPlan[i]);
  		}
	}
	else if(LstRazon.value=='Realizar recarga')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoRecarga.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoRecarga[i]);
  		}
	}
	else if(LstRazon.value=='Plan erróneo')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoPlanErroneo.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoPlanErroneo[i]);
  		}
	}
	else if(LstRazon.value=='Transferir balance')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoTransferirBalance.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoTransferirBalance[i]);
  		}
	}
	else if(LstRazon.value=='No se refleja cuenta en GEM')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoNoReflejaGEM.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoNoReflejaGEM[i]);
  		}
	}
	else if(LstRazon.value=='Número no es prepago')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoNotPrepago.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoNotPrepago[i]);
  		}
	}
	else if(LstRazon.value=='Desconectado GEM por cambio de tecnología')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoDesconexion.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoDesconexion[i]);
  		}
	}
	else if(LstRazon.value=='Validar consumo')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoValidarConsumo.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoValidarConsumo[i]);
  		}
	}
	else if(LstRazon.value=='Plan no honra beneficios')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoPlanHonra.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoPlanHonra[i]);
  		}
	}
	else if(LstRazon.value=='Bloqueo de promocionales por Be-Mobile')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoBloqueo.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoBloqueo[i]);
  		}
	}
	else if(LstRazon.value=='Consulta de ofertas disponible')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoConsulta.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoConsulta[i]);
  		}
	}
	else if(LstRazon.value=='Debito de recarga duplicada (INCOM)')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoDebitoDupleINCOM.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoDebitoDupleINCOM[i]);
  		}
	}
	else if(LstRazon.value=='Recarga a través de claropr.com')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoRecargaClaroPR.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoRecargaClaroPR[i]);
  		}
	}
	else if(LstRazon.value=='Cliente en plan 3000')
	{
		var reg = LstSubRazon.length;
		for (var i = 0; i < reg; i++) {
			LstSubRazon.remove(0);
		}

		for(var i=0;i<SubCateforiaPrePagoPlan3000.length;i++){
    		LstSubRazon.options[i] = new Option(SubCateforiaPrePagoPlan3000[i]);
  		}
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
				location.href = 'http://172.17.10.13:81/clericals/dataseg.php?OS='+OS;
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

function LimpiarDemora(){
	var OS = document.getElementById('txtOsadia').value = "";
	var	Codigo = document.getElementById('txtCodeVender').value= "";
	var	Canal = document.getElementById('txtCodeVenderCanal').value= "";
	var	TipoEmision = document.getElementById('LstTipoEmision').value= "N/A";
	var	Tracker = document.getElementById('txtTracker').value= "";
	var	cops = document.getElementById('txtCops').value= "";
	var	m6 = document.getElementById('txtM6').value= "";
	var	MAC = document.getElementById('txtMAC').value= "";
	var	MAC2 = document.getElementById('txtMAC2').value= "";
	var	Vendedor = document.getElementById('txtVendedor').value= "";
	var	Factura = document.getElementById('LstEstado').value= "[Ninguno]";
	var	cliente = document.getElementById('txtCliente').value= "";
	var	contacto1 = document.getElementById('txtContacto1').value= "";
	var	contacto2 = document.getElementById('txtContacto2').value= "";
	var	notas = document.getElementById('txtNotas').value= "";
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







