<?
	class cProducer {
		
		private $Company = "Nichts";
		private $Adress = "Nirgends";
		public $pCar;
		
		
		public function newProd($pBez,$pAdress) {
			$this->pCar = new cCar();
			
			$this->Company = $pBez;
			$this->Adress = $pAdress;

		}
		
		public function getCompany() {
			
			return $this->Company;
		}
		
		public function getAdress() {
			
			return $this->Adress;
		}
		
	}
	
		class cCar {
		
		private $type = "not defined";
		private $Colour = "not defined";
		private $Seats = 0;
		
		private $Radio = "not defined";
		private $Radioon = "not defined";
		
		private $Aircon = "not defined";
		private $Airconon = "not defined";
		
		private $ABS = "nothing";
		private $ABSon = "nothing";
		
		private $Centrallock = "not defined";
		private $Centrallockon = "not defined"; 
		
		private $Condition = "nothing";
		private $Kmh = 1999999;
		
		private $Breakdis = 1999999;
		
		
	  	public $Producer;

		public function newCar($ptype,$pColour,$pSeats,$pABS,$pradio,$plock,$pair) {
         	$this->Producer= new cProducer();
			$this->type = $ptype;
			$this->Colour = $pColour;
			$this->Seats = $pSeats;		
			$this->ABS = $pABS;
			$this->Radio = $pradio;
			$this->Centrallock = $plock;
			
			$this->Aircon = $pair;
		} 

		public function gettype () {
			return $this->type;
		}

		public function getColour() {
			return $this->Colour;
		}
	
		public function getSeats() {
			return $this->Seats;
		}
		
		
		public function getRadio() {
			return $this->Radio;
		}

		public function getRadioon() {
			
			return $this->Radioon;
		}
		
		public function getAircon() {
			return $this->Aircon;
		}
		
		public function getAirconon() {
			return $this->Airconon;
		}
		
		public function getCentrallock() {
			return $this->Centrallock;
		}
		
		public function getCentrallockon() {
			return $this->Centrallockon;
		}
		
		public function getABS() {
			return $this->ABS;
		}
	

			
		public function Lock_on($pAktivieren) {
			
			if ($this->Centrallock=="yes") {
				if ($pAktivieren=="on") {	
					$this->Centrallockon="on";
				} else {
						$this->Centrallockon="off";
				}
			} else {
				$this->Centrallockon="not installed";
			}
		}
		
		public function Radioon_on($sRadioon) {
	
			if ($this->Radio=="yes") {
				if ($sRadioon=="on") {
					if ($this->Centrallockon=="off"){		
					$this->Radioon="on";
					}elseif($this->Centrallockon=="not installed") {
						$this->Radioon="on";
					}else {
						$this->Radioon="off";
					}
				}else {
					$this->Radioon="off";
				}
			} else {
				$this->Radioon="not installed";
			}	
		}
		
		public function Aircon_on($pAirconon){
			if ($this->Aircon == "yes") {
				if($pAirconon=="on") {
					if ($this->Centrallockon=="off") {
					$this->Airconon="on";
					}elseif($this->Centrallockon=="not installed") {
						$this->Airconon = "on";
					}else {
						$this->Airconon = "off";
					}
				} else {
					$this->Airconon = "off";
				}
				
			} else {
				$this->Airconon = "not installed";
			}
		}
		
		public function changeCondition($con) {
			$this->Condition = $con;
		}
		
		public function changeKmh($cKmh) {
				if ($this->Condition=="stands") {
					$this->Kmh = 0; 
					
					$this->Breakdis = $this->Kmh;
				}elseif ($this->Condition=="drives") {
					$this->Kmh = $cKmh;
					
					if($this->ABS=="yes") {
						$this->Breakdis = $cKmh * 0.7;
					} else {
						$this->Breakdis = $cKmh;
					}
					
				}else{
					$this->Kmh = $cKmh*0.9;
					
					if ($this->ABS=="yes") {
						$this->Breakdis = $this->Kmh*0.9;
					}else {
						$this->Breakdis = $this->Kmh;
					}	
				}
		}
		
		public function getCondition() {
			return $this->Condition;
		}
		
		public function getkmh() {
			return $this->Kmh;
		}
		
		public function getBreakdis(){
			return $this->Breakdis;
		}
	}	
	
	echo "<h2>Producer</h2>";
	$pd = new cProducer();
	$pd->newProd("Fiat","Paris");
	
	echo "Company: ".$pd->getCompany()."<br>";
	echo "Adress: ".$pd->getAdress()."<br>";
	
	echo "<h4>produced Car</h4>";
	
	$pd->pCar->newCar("Brava","Green",5,"yes","no","yes","yes");
	
	echo "Carname: ".$pd->pCar->gettype()."<br>";
	echo "Colour: ".$pd->pCar->getcolour()."<br>";
	echo "Seats: ".$pd->pCar->getSeats()."<br>";
	
	echo "Radio: ".$pd->pCar->getRadio()."<br>";
	echo "ABS: ".$pd->pCar->getABS()."<br>";
	echo "Centrallock: ".$pd->pCar->getCentrallock()."<br>";
	echo "Aircondition: ".$pd->pCar->getAircon()."<br><br>";
	
	$pd->pCar->Lock_on("off");
	$pd->pCar->Radioon_on("off");
	$pd->pCar->Aircon_on("on");
	
	echo "<b>Settings</b><br><br>";
	echo "Centrallock: ".$pd->pCar->getCentrallockon()."<br>";
	echo "Radio: ".$pd->pCar->getRadioon()."<br>";
	echo "Aircondition: ".$pd->pCar->getAirconon()."<br><br>";
	
	$pd->pCar->changeCondition("breaks");
	$pd->pCar->changeKmh(40);
	
	echo "<b>Condition</b><br><br>";
	
	echo "doing?: ".$pd->pCar->getCondition()."<br>";
	echo "kmh: ".$pd->pCar->getKmh()."<br><br>";
	echo "Braking Distance: ".$pd->pCar->getBreakdis()."m<br>";
?>
