<?php


class User{
  private $name;
  private $surname;
  private $email;
  private $full_name;


  public function __construct($_name, $_surname){
    $this->name = $_name;
    $this->surname = $_surname;
    $this->setNameSurname($_name, $_surname);
  }

  public function setNameSurname($_name, $_surname){
    $this->name = $_name;
    $this->surname = $_surname;
    $this->setFullName();

  }

  private function setFullName(){
    $this->full_name = $this->name . ' ' . $this->surname;
  }


  public function setName($_name){
    $this->name = $_name;
    $this->setFullName();
  }

  public function setSurname($_surname){
    $this->surname = $_surname;
    $this->setFullName();
  }

  public function setEmail($_email){
    $this->email = $_email;
  }

  public function getName(){
    return $this->name;
  }

  public function getSurname(){
    return $this->surname;
  }

  public function getEmail(){
    return $this->email;
  }

  public function getFullName(){
    return $this->full_name;
  }




}