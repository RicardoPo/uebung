<?
	class Car {
		private $Colour = "Grau";
		private $Seats = 3;
		private $Radio = "an";
		private $Aircon = "nein";
		private $Centrallock = false; //Zentralverriegellung
		private $Antiskidsystem = true; //ABS
	
		public function getColour() {
			return $this->Colour;
		}
		
		public function setColour($Colour) {
			$this->Colour = $Colour;
		}
		
		public function getSeats() {
			return $this->Seats;
		}
		
		public function setSeats($Seats) {
			$this->Seats = $Seats;
		}
		
		public function getRadio() {
			return $this->Radio;
		}
		
		public function setRadio($Radio) {
			$this->Radio = $Radio;
		}
		
		public function getAircon() {
			return $this->Aircon;
		}
		
		public function setAircon($Aircon) {
			$this->Aircon = $Aircon;
		}
		
		public function getCentrallock() {
			return $this->Centrallock;
		}
		
		public function setCentrallock($Centrallock) {
			$this->Centrallock = $Centrallock;
		}
		
		public function getAntiskidsystem() {
			return $this->Antiskidsystem;
		}
		
		public function setAntiskidsystem($Antiskidsystem) {
			$this->Antiskidsystem = $Antiskidsystem;
		}
		
	}
	
	$AudiTT = new Car();
	$AudiTT->setColour("Blau");
	$AudiTT->setSeats(5);
	$AudiTT->setRadio("aus");
	$AudiTT->setAircon("ja");
	$AudiTT->setCentrallock("ja");
	$AudiTT->setAntiskidsystem("nein");
	echo $AudiTT->getColour();
	echo $AudiTT->getSeats();
	echo $AudiTT->getRadio();
	echo $AudiTT->getAircon();
	echo $AudiTT->getCentrallock();
	echo $AudiTT->getAntiskidsystem();
?>