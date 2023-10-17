#include <Arduino.h>
#include <EEPROM.h>

#include <WiFiS3.h>
#include <ArduinoMqttClient.h>
// #include "DFRobot_ESP_PH.h"
#include "DFRobot_PH.h"
#include <EEPROM.h>
#include <OneWire.h>
#include <DallasTemperature.h>
// #include "DFRobot_ESP_PH.h"
#include "DTH_Turbidity.h"
#include "CQRobotTDS.h"
#include <DS18B20.h>

#define ESPADC 1024.0   // the esp Analog Digital Conturbivertion value
#define ESPVOLTAGE 5000 // the esp voltage supply value

// Data wire is plugged into digital pin 2 on the Arduino
#define ONE_WIRE_BUS A4
#define TURBIDITY_SENSOR_PIN A0
#define DS_TEMPERATURE A1
#define PH_PIN A2 // the esp gpio data pin number
#define TDS_PIN A3

DS18B20 ds(DS_TEMPERATURE);
DTH_Turbidity turbSensor(TURBIDITY_SENSOR_PIN);
DFRobot_PH ph;
OneWire oneWire(ONE_WIRE_BUS);
DallasTemperature sensorstemp(&oneWire);
CQRobotTDS tds(TDS_PIN, 5.0);

float voltage, phValue, temperature = 25;

float ntu_val = 0;
float volt = 0;
// float ntu_val = 0;

// #define PH_PIN A0
#define Offset 0.00 // deviation compensate
#define LED 13
#define samplingInterval 20
#define printInterval 800
#define ArrayLenth 40    // times of collection
int pHArray[ArrayLenth]; // Store the average value of the sensor feedback
int pHArrayIndex = 0;

// MQTT Broker
const char *mqtt_username = "";
const char *mqtt_password = "";
const int mqtt_port = 1883;

unsigned long timeout = 0;

// #include "arduino_secrets.h"
///////please enter your sensitive data in the Secret tab/arduino_secrets.h
char ssid[] = "POCOF5";      // your network SSID (name)
char pass[] = "12345678";    // your network password (use for WPA, or use as key for WEP)
int status = WL_IDLE_STATUS; // the WiFi radio's status

WiFiClient wifiClient;
MqttClient mqttClient(wifiClient);

const char broker[] = "broker.hivemq.com";
int port = 1883;
const char topic[] = "CWG/sensor/data";
const char hostTopic[] = "CWG/sensor/data2";

const long interval = 1000;
unsigned long previousMillis = 0;

void printMacAddress(byte mac[]);
void onMqttMessage(int messageSize);
void onCustom();
void onCustom2();
void printWifiData();
void printCurrentNet();

void setup()
{
  // sensorstemp.begin();
  ph.begin();
  // Initialize serial and wait for port to open:
  Serial.begin(9600);

  while (!Serial)
  {
    ; // wait for serial port to connect. Needed for native USB port only
  }

  // check for the WiFi module:
  if (WiFi.status() == WL_NO_MODULE)
  {
    Serial.println("Communication with WiFi module failed!");
    // don't continue
    while (true)
      ;
  }

  String fv = WiFi.firmwareVersion();
  if (fv < WIFI_FIRMWARE_LATEST_VERSION)
  {
    Serial.println("Please upgrade the firmware");
  }

  // attempt to connect to WiFi network:
  while (status != WL_CONNECTED)
  {
    Serial.print("Attempting to connect to WPA SSID: ");
    Serial.println(ssid);
    // Connect to WPA/WPA2 network:
    status = WiFi.begin(ssid, pass);

    // wait 10 seconds for connection:
    delay(10000);
  }

  // you're connected now, so print out the data:
  Serial.print("You're connected to the network");
  printCurrentNet();
  printWifiData();

  // You can provide a unique client ID, if not set the library uses Arduino-millis()
  // Each client must have a unique client ID
  // mqttClient.setId("clientId");

  // You can provide a username and password for authentication
  // mqttClient.setUsernamePassword("username", "password");

  Serial.print("Attempting to connect to the MQTT broker: ");
  Serial.println(broker);

  if (!mqttClient.connect(broker, port))
  {
    Serial.print("MQTT connection failed! Error code = ");
    Serial.println(mqttClient.connectError());

    while (1)
      ;
  }

  Serial.println("You're connected to the MQTT broker!");
  Serial.println();

  // set the message receive callback
  mqttClient.onMessage(onMqttMessage);

  Serial.print("Subscribing to topic: ");
  Serial.println(topic);
  Serial.println();

  // subscribe to a topic
  mqttClient.subscribe(topic);

  // topics can be unsubscribed using:
  // mqttClient.unsubscribe(topic);

  Serial.print("Waiting for messages on topic: ");
  Serial.println(topic);
  Serial.println();

  analogReadResolution(10);
}

int count = 0;

void loop()
{
  if (ds.selectNext())
  {
    temperature = ds.getTempC();
    /* code */
  }

  // Serial.println(ds.getTempC());
  ntu_val = turbSensor.readTurbidity();
  float tdsValue = tds.update(temperature);

  static unsigned long timepoint = millis();
  mqttClient.poll();
  mqttClient.beginMessage(hostTopic);

  if (millis() - timepoint > 1000U) // time interval: 1s
  {
    timepoint = millis();
    // voltage = rawPinValue / esp32ADC * esp32Vin
    int analogValue = analogRead(PH_PIN);
    voltage = analogValue / ESPADC * ESPVOLTAGE; // read the voltage
    phValue = ph.readPH(voltage, temperature);

    // Serial.print("voltage:");
    // Serial.println(voltage, 4);

    // // temperature = readTemperature();  // read your temperature sensor to execute temperature compensation
    // Serial.print("temperature:");
    // Serial.print(temperature, 1);
    // Serial.println("^C");

    phValue = ph.readPH(voltage, temperature); // convert voltage to pH with temperature compensation
    // Serial.print("pH:");
    // Serial.println(phValue, 4);

    Serial.print(" analog :");
    Serial.print(analogValue);
    Serial.print(" volatage :");
    Serial.print(voltage);
    Serial.print(" ph: ");
    Serial.print(phValue + 2.3);
    Serial.print(" tds: ");
    Serial.print(tdsValue / 3.6);
    Serial.print(" ntu: ");
    Serial.print(ntu_val / 10);
    Serial.print(" temperature: ");
    Serial.println(temperature);
    // mqttClient.print(ntu_val);
    mqttClient.print(String(phValue + 2.3) + "," + String(tdsValue / 3.6) + "," + String(ntu_val / 10) + "," + String(temperature));
    // mqttClient.print(",");
    // mqttClient.print(analogRead(A3) / 11); // temp
    // mqttClient.print(",");
    // mqttClient.print(analogRead(A2) / 4.9); // tds
    // mqttClient.print(",");
    // mqttClient.print(analogRead(A1) / 3.9); // turb
    // mqttClient.print(",");
    // mqttClient.print(analogRead(A4));//n
    // mqttClient.print(",");
    // mqttClient.print(analogRead(A5));//n
    digitalWrite(LED, digitalRead(LED) ^ 1);
    // printTime = millis();

    // Serial.println("Data published: " + data);
  }
  ph.calibration(voltage, temperature); // calibration process by Serail CMD

  mqttClient.endMessage();
  // Add a delay to avoid constant pinging
  delay(1000);
}

float readTemperature()
{
  // add your code here to get the temperature from your temperature sensor

  return 25.0;
}

void printWifiData()
{
  // print your board's IP address:
  IPAddress ip = WiFi.localIP();
  Serial.print("IP Address: ");

  Serial.println(ip);

  // print your MAC address:
  byte mac[6];
  WiFi.macAddress(mac);
  Serial.print("MAC address: ");
  printMacAddress(mac);
}

void printCurrentNet()
{
  // print the SSID of the network you're attached to:
  Serial.print("SSID: ");
  Serial.println(WiFi.SSID());

  // print the MAC address of the router you're attached to:
  byte bssid[6];
  WiFi.BSSID(bssid);
  Serial.print("BSSID: ");
  printMacAddress(bssid);

  // print the received signal strength:
  long rssi = WiFi.RSSI();
  Serial.print("signal strength (RSSI):");
  Serial.println(rssi);

  // print the encryption type:
  byte encryption = WiFi.encryptionType();
  Serial.print("Encryption Type:");
  Serial.println(encryption, HEX);
  Serial.println();
}

void printMacAddress(byte mac[])
{
  for (int i = 5; i >= 0; i--)
  {
    if (mac[i] < 16)
    {
      Serial.print("0");
    }
    Serial.print(mac[i], HEX);
    if (i > 0)
    {
      Serial.print(":");
    }
  }
  Serial.println();
}

void onMqttMessage(int messageSize)
{
  // we received a message, print out the topic and contents
  Serial.print("Received a message with topic '");
  Serial.print(mqttClient.messageTopic());
  Serial.println("'");
  Serial.print("Message length: ");
  Serial.print(messageSize);
  Serial.println(" bytes:");

  // Read the message contents into a String
  String message = mqttClient.readString();

  // Convert the received message and comparison strings to lowercase
  message.toLowerCase();

  // Check if the contents of the message match for solve or reset
  if (message == "whatYouWantToSee")
  {
    onCustom();
    Serial.println("Custom Message For Debugging");
  }
  else if (message == "whatYouWantToSee2")
  {
    onCustom2();
    Serial.println("Custom Message For Debugging2");
  }
  else
  {
    // If it doesn't match either of the key words, print the message contents for debugging
    Serial.print("Message to My ESP32");
    Serial.println(message);
  }
  Serial.println();
}
double avergearray(int *arr, int number)
{
  int i;
  int max, min;
  double avg;
  long amount = 0;
  if (number <= 0)
  {
    Serial.println("Error number for the array to avraging!/n");
    return 0;
  }
  if (number < 5)
  { // less than 5, calculated directly statistics
    for (i = 0; i < number; i++)
    {
      amount += arr[i];
    }
    avg = amount / number;
    return avg;
  }
  else
  {
    if (arr[0] < arr[1])
    {
      min = arr[0];
      max = arr[1];
    }
    else
    {
      min = arr[1];
      max = arr[0];
    }
    for (i = 2; i < number; i++)
    {
      if (arr[i] < min)
      {
        amount += min; // arr<min
        min = arr[i];
      }
      else
      {
        if (arr[i] > max)
        {
          amount += max; // arr>max
          max = arr[i];
        }
        else
        {
          amount += arr[i]; // min<=arr<=max
        }
      } // if
    }   // for
    avg = (double)amount / (number - 2);
  } // if
  return avg;
}
void onCustom()
{
  // Code you want to run when message 1 gets here
}

void onCustom2()
{
  // Code you want to run when message 1 gets here
}