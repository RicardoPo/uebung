<?
	class abstract CarProducer {

		private $company = "Ford";
		private $adress = "USA";
		public $Pcar;		
		
		public function __constructor($comp, $adrs) {
			$this->company = $comp;
			$this->adress = $adrs;
		}
		
		public function getCompany() {
			return $this->company;
		}
		
		public function getAdress() {
			return $this->adress;
		}	
	}

	class FiatCarProducer extends CarProducer {

		public function __constructor() {
			parent::__constructor("Ford", "USA");
		}
		
		public function createBrava($color) {
			return new Car("Brava", $color, 5, "yes", "yes", "yes", "yes", "brakes");
		}
	}
	
	class Car {
		
		private $type = "Fiesta";
		private $color = "orange-purpel";
		private $seats = 1;

		/**
		* Is there a Radio and is it on?
		*/		
		private $radio = "no";
		private $radio_on = "off";
		
		private $aircon = "no";
		private $aircon_on = "off";
		
		private $abs = "no";
		private $abs_on = "off";
		
		private $centrallock = "no";
		private $centrallock_on = "off"; 
		
		/**
		* 	What is the car doing and how fast is it? stands/drives/brakes 
		*/
		private $condition = "drives";
		private $kmh = 290;

		/**
		*  	brakdis (Braking distance) means the way, which is needed until the car stopps.
		*/
		private $brakdis = 23;

		function __contructor($typ,$col, $ses, $as, $rad, $loc, $air, $con) {
   			$this->type = $typ;
			$this->color = $col;
			$this->seats = $ses;
			$this->abs = $as;
			$this->radio = $rad;
			$this->centrallock = $loc;
			$this->aircon = $air;
			$this->condition = $con;
		}
		
		public function getType () {
			return $this->type;
		}

		public function getColor() {
			return $this->color;
		}
	
		public function getSeats() {
			return $this->seats;
		}
		
		public function getRadio() {
			return $this->radio;
		}

		public function getRadio_on() {
			return $this->radio_on;
		}
		
		public function getAircon() {
			return $this->aircon;
		}
		
		public function getAircon_on() {
			return $this->aircon_on;
		}
		
		public function getCentrallock() {
			return $this->centrallock;
		}
		
		public function getCentrallock_on() {
			return $this->centrallock_on;
		}
		
		public function getAbs() {
			return $this->abs;
		}
		
		/**
		*	If centrallock_on is on, all other electronic devices have to be off 
		*/		
		public function setCentrallock_on($loc_activate) {	
			if ($this->centrallock=="yes") {
				if ($loc_activate=="on") {	
					$this->centrallock_on="on";
				} else {
						$this->centrallock_on="off";
				}
			} else {
				$this->centrallock_on="not installed";
			}
		}
		
		public function setRadio_on($rad_activate) {
			if ($this->radio=="yes") {
				if ($rad_activate=="on") {
					if ($this->centrallock_on=="off"){		
						$this->radio_on="on";
					} elseif($this->centrallock_on=="not installed") {
						$this->radio_on="on";
					} else {
						$this->radio_on="off";
					}
				}else {
					$this->radio_on="off";
				}
			} else {
				$this->radio_on="not installed";
			}	
		}
		
		public function setAircon_on($air_activate) {
			if ($this->aircon=="yes") {
				if($air_activate=="on") {
					if ($this->centrallock_on=="off") {
						$this->Aircon_on="on";
					} elseif ($this->centrallock_on=="not installed") {
						$this->aircon_on = "on";
					} else {
						$this->aircon_on = "off";
					}
				} else {
					$this->aircon_on = "off";
				}
			} else {
				$this->aircon_on = "not installed";
			}
		}
	
		public function setKmh($kh) {
			if ($this->condition=="stands") {
				$this->kmh = 0; 
				$this->Brakdis = 0;
			} elseif ($this->condition=="drives") {
				$this->kmh = $kh;
				if($this->abs=="yes") {
					$this->brakdis = $kh * 0.7;
				} else {
					$this->brakdis = $kh;
				}
				
			} else{
				$this->kmh = $kh*0.9;
				
				if ($this->abs=="yes") {
					$this->brakdis = $this->kmh*0.9;
				}else {
					$this->Brakdis = $this->kmh;
				}	
			}
		}
		
		public function getCondition() {
			return $this->condition;
		}
		
		public function getkmh() {
			return $this->kmh;
		}
		
		public function getBrakdis() {
			return $this->brakdis;
		}
	}	
	
	echo "<h2>Producer</h2>";
	$pd = new FiatCarProducer();
	echo "Company: ".$pd->getCompany()."<br>";
	echo "Adress: ".$pd->getAdress()."<br>";
	
	echo "<h4>produced Car</h4>";
	/* We are going to produce a car of type brava. Since producer knows which properties a brava has we do not 
	   have to pass all properties in constructor of Car.
	   And of course it is more logical. We have in real world car producers and they know hor to build the cars and with 
	   which kind of properties. When there will be a personal person which is willing to build car he can construct it by him
	   self when calling constructor but has to describe/build all properties by its own.
	*/
	$brava = $pd->createBrava("green");
	
	echo "Carname: ".$brava->gettype()."<br>";
	echo "Color: ".$brava->getcolor()."<br>";
	echo "Seats: ".$brava->getSeats()."<br>";
	
	echo "Radio: ".$brava->getRadio()."<br>";
	echo "ABS: ".$brava->getABS()."<br>";
	echo "Centrallock: ".$brava->getCentrallock()."<br>";
	echo "Aircondition: ".$brava->getAircon()."<br><br>";
	
	$brava->setCentrallock_on("on");
	$brava->setRadio_on("on");
	$brava->setAircon_on("off");
	
	echo "<b>Settings</b><br><br>";
	echo "Centrallock: ".$brava->getCentrallock_on()."<br>";
	echo "Radio: ".$brava->getRadio_on()."<br>";
	echo "Aircondition: ".$brava->getAircon_on()."<br><br>";
	$pd->Pcar->setKmh(40);
	
	echo "<b>Condition</b><br><br>";
	
	echo "doing?: ".$brava->getCondition()."<br>";
	echo "kmh: ".$brava->getKmh()."<br><br>";
	echo "Braking Distance: ".$brava->getBrakdis()."m<br>";
