#include <SoftwareSerial.h>
SoftwareSerial gps(11, 12);    //tx, rx를 각각의 핀에 연결
 
void setup() {
  Serial.begin(9600);
  gps.begin(9600);
}
 
void loop() {
  if(gps.available()){
    Serial.write(gps.read());
  }
}
