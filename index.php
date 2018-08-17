<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=lgolovina', 'lgolovina', 'neto1757');
  
  $result = $db->query("SELECT * FROM `tasks`");
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
  <title>My ToDo list</title>
    <style>
      table, tr, td { 
      border: 1px solid black;
      text-align: center;
      }
  </style>
</head>
<body>
  <h1>Список дел на сегодня</h1>

  <form action="action.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="description" placeholder="Описание задачи">
    <input type="submit" value="Добавить">
  </form><br>

  <table>
  <tr>
    <td><b>id</b></td>
    <td><b>Описание задачи</b></td>
    <td><b>Статус</b></td>
    <td><b>Дата добавления</b></td>
  </tr>
  <?php while($row = $result->fetch()) { ?>
  <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['description']?></td>
    <td><?php if($row['is_done'] == 0) {echo "В работе";} else {echo "Выполнено";}?></td>
    <td><?php echo $row['date_added']?></td>
    <td>
      <a href="#">Изменить</a>
      <a href="action.php?id=<?=$row['id']?>">Выполнить</a>
      <a href="action.php?delete=<?=$row['id']?>">Удалить</a>
    </td>
  </tr>
  <?php } ?>
</table>

</body>
</html>