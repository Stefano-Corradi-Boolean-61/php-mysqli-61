<?php

class User{

	private $name;
	public $lastname;
	public $age;
	public $discount = 0;

	public function __construct($_name, $_lastname, $_age = 18){
		// nel costruttore valorizzo tutte le proprietà che reputo essere obbligatorie
		$this->name = $_name;
		$this->lastname = $_lastname;
		$this->age = $_age;

		// e scateno le logiche che mi servono
		$this->setSconto();
	}

	// il metodo privato lo posso invocare solo internamente alla classe
	private function setSconto(){
		if($this->age > 65){

			$this->discount = 40;
		}
	}

	public function setName($_name){
		$this->name = $_name;
	}

	public function getName(){
		return $this->name;
	}

	public function getFullName(){
		return $this->name . ' ' . $this->lastname;
	}

}

$ugo = new User("Ugo","De ughi");
$giuseppe = new User("Giuseppe", "Verdi",80);

//non posso aggedere aname perché è privata
/*$ugo->name = "Ugo";
$ugo->lastname = "De ughi";

$giuseppe->name = "Giuseppe";
$giuseppe->lastname = "Verdi";*/


//$ugo->setSconto(40);
//$giuseppe->setSconto(80);
// setSconto non lo posso raggiungere perché è un metodo privato
//$ugo->setSconto();

$ugo->setName('Ugho');

echo "<br>Ciao " . $ugo->getFullName() . ' il tuo sconto è del ' . $ugo->discount .'%' ;
echo "<br>Ciao " . $giuseppe->getFullName() . ' il tuo sconto è del ' . $giuseppe->discount .'%' ;
echo "<br>Il tuo nome è " . $ugo->getName();

var_dump($ugo);
var_dump($giuseppe);
