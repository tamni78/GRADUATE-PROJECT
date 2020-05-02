int solenoidPin = 5;

void setup() {
  pinMode(solenoidPin, OUTPUT);
}

void loop() {
  digitalWrite(solenoidPin, HIGH);   //솔레노이드 모터를 작동시킨다.
  delay(1000);              //1초 딜레이 
  digitalWrite(solenoidPin, LOW);    //솔레노이드 모터를 멈춘다.
  delay(1000);              //1초 딜레이 
}
