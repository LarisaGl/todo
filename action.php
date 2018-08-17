<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=lgolovina', 'lgolovina', 'neto1757');

  if(isset($_POST['description'])) {
    $desc = strip_tags($_POST['description']);
    $insert = "INSERT INTO `tasks` VALUES (null, :description,'0', now())";
    $ins = $db->prepare($insert);
    $ins->execute(['description'=>$desc]);

    header("Location: index.php");
  }

  if(isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $delete = $db->query("DELETE FROM `tasks` WHERE id = ".$id." LIMIT 1");

    header("Location: index.php");
  }

  if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $update = $db->query("UPDATE `tasks` SET `is_done`='1' WHERE id =".$id);

    header("Location: index.php");
  }
}

catch(PDOException $e)
{
  die("Error: ".$e->getMessage());
}
?>