<?php

require_once __DIR__ . "/User.php";

class Teacher extends User{

  private $phone;
  private $office_address;
  private $office_number;


  public function __construct(
                        $_name, 
                        $_surname, 
                        $_office_address,
                        $_office_number
                      ){
    
    // eredito il costruttore della classe madre e gli passo i parametri obbligatori
    parent::__construct($_name, $_surname);

    $this->office_address = $_office_address;
    $this->office_number = $_office_number;
    
  }

  public function setOfficeAddress($_office_address){
    $this->office_address = $_office_address;
  }

  public function setOfficeNumber($_office_number){
    $this->office_number = $_office_number;
  }

  public function setOfficePhone($_phone){
    $this->phone = $_phone;
  }

  public function getOfficeAddress(){
    return $this->office_address;
  }

  public function getOfficeNumber(){
    return $this->office_number;
  }

  public function getPhone(){
    return $this->phone;
  }

}