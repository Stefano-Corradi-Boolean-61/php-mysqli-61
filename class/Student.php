<?php

require_once __DIR__ . "/User.php";

class Student extends User{

  public $registration_number; // string
  public $degree; // string
  private $full_name; // string
  public $exams; // array degli esami

  public function __construct(
                        $_name, 
                        $_surname, 
                        $_registration_number,
                        $_degree,
                        $_exams){
    
    // eredito il costruttore della classe madre e gli passo i parametri obbligatori
    parent::__construct($_name, $_surname);

    $this->registration_number = $_registration_number;
    $this->degree = $_degree;                       
    $this->exams = $_exams;                       
    
  }

  /* SETTER */


  // aggiungo un esame all'array di esami
  public function addExam($_exam){
    $this->exams[] = $_exam;
  }

  /* GETTER */


}