<?php

//var_dump($_SERVER);

require_once __DIR__ . '/db/db-conn.php';
require_once __DIR__ . '/partial/head.php';
require_once __DIR__ . '/partial/header.php';

// ATTENZIONE MACANO TUTTI I CONTROLLI (GET, se esiste il risultatao ecc)


$id_student = $_GET['id'];
$offset = $_GET['offset'];

// preparo la query
// posso fare una query molto più strutturata ad as con JOIN per avere tutto il libretto
$sql = "SELECT *
        FROM `students`       
        WHERE `id` = $id_student 
";

// la eseguo
$result = $conn->query($sql);


if($result && $result->num_rows > 0){
  $student = $result->fetch_assoc();
}

?>
<main>



<h1 class="container"><?php echo $student['name'] ?> <?php echo $student['surname'] ?></h1>

<div class="container">
  <ul>
    <li>Nome: <?php echo $student['name'] ?></li>
    <li>Cognome: <?php echo $student['surname'] ?></li>
    <li>Matricola: <?php echo $student['registration_number'] ?></li>
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