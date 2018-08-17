<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=lgolovina', 'lgolovina', 'neto1757');

  if(isset($_GET['change']) && isset($_POST['change'])) {
    $id = (int)$_GET['change'];
    $desc = strip_tags($_POST['change']);
    $update = "UPDATE `tasks` SET `description`= :description WHERE id = :id";
    $upd = $db->prepare($update);
    $upd->execute(['description'=>$desc, 'id'=>$id]);

    header("Location: index.php");
  }
}

catch(PDOException $e)
{
  die("Error: ".$e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Change my ToDo list</title>
</head>
<body>
  <h3>Изменить задачу</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="text" name="change" placeholder="Описание задачи">
    <input type="submit" value="Изменить">
  </form><br>

</body>
</html>