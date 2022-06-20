<?php

//var_dump($_SERVER);

require_once __DIR__ . '/db/db-conn.php';
require_once __DIR__ . '/partial/head.php';
require_once __DIR__ . '/partial/header.php';

require_once __DIR__ . '/class/Teacher.php';

// ATTENZIONE MACANO TUTTI I CONTROLLI (GET, se esiste il risultato ecc)


$id_teacher = $_GET['id'];




// preparo la query
// posso fare una query molto più strutturata ad as con JOIN per avere tutto il libretto
$sql = "SELECT *
        FROM `teachers`
        WHERE `id` = $id_teacher 
";
//var_dump($sql);


//var_dump($sql_exams);

// la eseguo
$result = $conn->query($sql);


//var_dump($result_exams->fetch_all());
//die;

// verifico l'esistenza dello studente
if($result && $result->num_rows > 0){
  // trasformo il dato in ingresso in oggetto
  $teacher_db = $result->fetch_object();

}else{
  echo "Insegnante inesistente";
  die;
}

// exams è un array di array associativi




$teacher = new Teacher($teacher_db->name,
                        $teacher_db->surname,
                        $teacher_db->office_address,
                        $teacher_db->office_number );


//var_dump($teacher);


//var_dump($student);

?>
<main>



<h1 class="container"><?php echo $teacher->getFullName() ?></h1>

<div class="container">
  <ul>
    <li>Nome: <?php echo $teacher->getName() ?></li>
    <li>Cognome: <?php echo $teacher->getSurname() ?></li>
    <li>Indirizzo studio: <?php echo $teacher->getOfficeAddress() ?></li>
    <li>Numero ufficio: <?php echo $teacher->getOfficeNumber() ?></li>
  </ul>
</div>

<div class="container">

  <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/teachers.php?" class="btn btn-info"><< torna all'elenco </a>
</div>


</main>

<?php
  require_once __DIR__ . '/partial/footer.php';
  require_once __DIR__ . '/db/db-close.php';
?>