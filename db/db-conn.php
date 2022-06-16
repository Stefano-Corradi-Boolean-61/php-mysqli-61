<?php
// salco le credenziali del DB in delle costanti
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "db_university");

// inizializzo la connessione
$conn = new mysqli(DB_SERVERNAME,DB_USERNAME, DB_PASSWORD, DB_NAME);

//var_dump($conn);

if($conn && $conn->connect_error){
  echo "Connessione fallita. Errore: ". $conn->connect_error;
  exit();
}