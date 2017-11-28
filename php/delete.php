<?php

  $taskid = $_POST['submit'];

  include('/var/www/html/php/database-connection.php');

  $deleteTaskQuery = "DELETE FROM task_list WHERE task_ID = '$taskid'";
  $db_conn->query($deleteTaskQuery);

  header('Location: ../index.php');
  exit();

?>
