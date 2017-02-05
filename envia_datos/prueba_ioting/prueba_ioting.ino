#include <ESP8266WiFi.h>

const char* ssid = "Arial";
const char* pass = "yes09081984";

int a=1, b=50, c=100;
bool flag_a, flag_b, flag_c;

WiFiClient client;

void setup() {

	Serial.begin(115200);
	delay(10);

	// Nos conectamos a nuestro wifi

	Serial.println();
	Serial.println();
	Serial.print("Tratando de conectar en ");
	Serial.println(ssid);
	Serial.print("Con clave: ");
	Serial.println(pass);

	WiFi.begin(ssid, pass);

	int su =0;
	while (WiFi.status() != WL_CONNECTED) {
		delay(500);
		Serial.print(".");
		su++;
		if (su==5){
			Serial.println("No se puede conectar \n");
			su=0;
		}
	}

	Serial.println("");
	Serial.println("Conectado a WiFi ");  
	Serial.print("IP: ");
	Serial.println(WiFi.localIP());
}

void loop() {

	delay(2000);

	if (client.connect("http://192.168.0.6", 81) > 0){
		Serial.println("# Conectado.");
	}else{
		Serial.println("Aún no conecta.....");
	}
}
