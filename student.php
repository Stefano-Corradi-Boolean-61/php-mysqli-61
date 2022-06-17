<?php

//var_dump($_SERVER);

require_once __DIR__ . '/db/db-conn.php';
require_once __DIR__ . '/partial/head.php';
require_once __DIR__ . '/partial/header.php';

require_once __DIR__ . '/class/Student.php';

// ATTENZIONE MACANO TUTTI I CONTROLLI (GET, se esiste il risultatao ecc)


$id_student = $_GET['id'];
$offset = $_GET['offset'];

// preparo la query
// posso fare una query molto più strutturata ad as con JOIN per avere tutto il libretto
$sql = "SELECT 
            `students`.*, 
            `degrees`.`name` AS `degree`
        FROM `students`       
        JOIN `degrees` ON `students`.`degree_id` = `degrees`.`id`
        WHERE `students`.`id` = $id_student 
";

$sql_exams = "SELECT 
            `exam_student`.`vote`,
            `courses`.`name` AS `course_name`,
            `exams`.`date`
        FROM `students`       
        JOIN `exam_student` ON `exam_student`.`student_id` = `students`.`id`
        JOIN `exams` ON `exam_student`.`exam_id` = `exams`.`id`
        JOIN `courses` ON `exams`.`course_id` = `courses`.`id`
        WHERE `students`.`id` = $id_student 
        AND `exam_student`.`vote` >= 18
        ORDER BY `exams`.`date`
";

//var_dump($sql_exams);

// la eseguo
$result = $conn->query($sql);

$result_exams = $conn->query($sql_exams);

//var_dump($result_exams->fetch_all());
//die;

// verifico l'esistenza dello studente
if($result && $result->num_rows > 0){
  // trasformo il dato in ingresso in oggetto
  $student_db = $result->fetch_object();

}else{
  echo "Studente inesistente";
  die;
}

$student = new Student(
                $student_db->name,
                $student_db->surname,
                $student_db->registration_number,
                $student_db->degree,
                $result_exams->fetch_all()
);
//var_dump($student);

?>
<main>



<h1 class="container"><?php echo $student->getFullName() ?></h1>

<div class="container">
  <ul>
    <li>Nome: <?php echo $student->getName() ?></li>
    <li>Cognome: <?php echo $student->getSurName() ?></li>
    <li>Matricola: <?php echo $student->registration_number ?></li>
    <li>Corso di laurea: <?php echo $student->degree ?></li>
    <li>Esami sostenuti
      <ul>
        <?php foreach($student->exams as $exam): ?>
          <li>
            <?php echo $exam[1] ?>
            voto: <?php echo $exam[0] ?>
            data: <?php echo $exam[2] ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </li>
  </ul>
</div>

<div class="container">

  <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/index.php?offset=<?php echo $offset ?>" class="btn btn-info"><< torna all'elenco </a>
</div>


</main>

<?php
  require_once __DIR__ . '/partial/footer.php';
  require_once __DIR__ . '/db/db-close.php';
?>