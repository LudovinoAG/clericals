var time;
var horas = 00;
var minutos = 00;
var segundos = 00;


function genesysTime(){

		var Crono = document.getElementById("Cronometro");

		//(UTC-04:00) Georgetown, La Paz, Manaus, San Juan

		segundos++;

		if(segundos==60){
			minutos++;
			segundos = 00;
			if(minutos==60){
				horas++;
				minutos = 00;

			}

		}

		/*if (segundos < 10){segundos = "0"+segundos;}
		if (minutos < 10){minutos = "0"+minutos;}
		if (horas < 10){horas = "0"+horas;}
		*/
		Crono.value = horas + ":" + minutos + ":" + segundos;

		 
		

		

		
}

window.onload = function(){
time = setInterval(genesysTime,1000);
}
