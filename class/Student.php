<?php

class Student {
  private $name;
  private $surname;
  public $registration_number;
  public $degree;
  private $full_name;
  public $exams;

  public function __construct(
                        $_name, 
                        $_surname, 
                        $_registration_number,
                        $_degree,
                        $_exams){
    $this->registration_number = $_registration_number;
    $this->degree = $_degree;                       
    $this->exams = $_exams;                       
    $this->setNameSurname($_name, $_surname);
    $this->setFullName();
  }

  /* SETTER */


  public function setNameSurname($_name, $_surname){
    $this->name = $_name;
    $this->surname = $_surname;
    $this->setFullName();
  }

  public function setName($_name){
    $this->name = $_name;
    $this->setFullName();
  }
  public function setSurName($_surname){
    $this->surname = $_surname;
    $this->setFullName();
  }

  private function setFullName(){
    $this->full_name = $this->name . ' ' . $this->surname;
  }

  /* GETTER */

  public function getFullName(){
    return $this->full_name;
  }

  public function getName(){
    return $this->name;
  }
  public function getSurName(){
    return $this->surname;
  }

}