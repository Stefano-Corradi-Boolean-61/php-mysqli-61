<?php


//var_dump($_SERVER);

require_once __DIR__ . '/db/db-conn.php';
require_once __DIR__ . '/partial/head.php';
require_once __DIR__ . '/partial/header.php';

$offset = empty($_GET['offset']) ? 0 : $_GET['offset'];
$limit = 10;

// preparo la quesry
$sql = "SELECT `name`, `surname`, `id`
        FROM `students`       
        LIMIT $limit OFFSET $offset
";


// la eseguo
$result = $conn->query($sql);




?>
<main>

<h1 class="container">Studenti</h1>


<table class="table container my-5">
  <thead>
    <tr>
      <th scope="col">#ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Cognome</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
<?php
// se ho un risultato valido e con almeno una riga
if($result && $result->num_rows > 0):
  // ogni riga del risultato vinen trasfomata in arr associativo e avanza sempre di una riga 
  // fino a quando non finiscono
  while($row = $result->fetch_assoc()){

?>
    <tr>
      <th scope="row"><?php echo $row['id'] ?></th>
      <td><?php echo $row['name'] ?></td>
      <td><?php echo $row['surname'] ?></td>
      <td><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/student.php?id=<?php echo $row['id'] ?>&offset=<?php echo $offset ?>" class="btn btn-primary">vedi</a> </td>
    </tr>
<?php
  };
  endif;
?>

  </tbody>
</table>

<div class="container">
  <?php if($offset > 0): ?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/students.php?offset=<?php echo $offset - $limit ?>" class="btn btn-info"><< indietro</a>
<?php endif; ?>
  <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/students.php?offset=<?php echo $offset + $limit ?>" class="btn btn-info">avanti >></a>
</div>









</main>

<?php
  require_once __DIR__ . '/partial/footer.php';
  require_once __DIR__ . '/db/db-close.php';
?>