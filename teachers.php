<?php
require_once __DIR__ . '/db/db-conn.php';
require_once __DIR__ . '/partial/head.php';
require_once __DIR__ . '/partial/header.php';

$sql = "SELECT *
        FROM `teachers`
        ORDER BY `surname`, `name`";

$result = $conn->query($sql);

?>




<h1 class="container">Lista insegnanti</h1>

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
      <td><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/php-mysqli/teacher.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">vedi</a> </td>
    </tr>
<?php
  };
  endif;
?>

  </tbody>
</table>



<?php
  require_once __DIR__ . '/partial/footer.php';
  require_once __DIR__ . '/db/db-close.php';
?>