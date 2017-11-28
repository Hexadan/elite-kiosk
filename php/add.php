<?php

$tname = $_POST['taskName'];
$sdesc = $_POST['taskShortDesc'];
$ldesc = $_POST['taskLongDesc'];
$ttype = $_POST['taskType'];
$tpriority = $_POST['taskPriority'];
$tstatus = $_POST['taskStatus'];

if((strlen($tname) < 31) && ($tname != ""))
{
  if((strlen($sdesc) < 51) && ($tname != ""))
  {
    if((strlen($ldesc) < 501) && ($tname != ""))
    {
      if(($ttype == "G") || ($ttype == "P"))
      {
        if(!is_nan($tpriority))
        {
          if(($tpriority >= 0) && ($tpriority < 201) && ($tpriority != ""))
          {
            if(($tstatus == 1) || $tstatus == 0)
            {
              include('/var/www/html/php/database-connection.php');

              $dbHost = "localhost";
              $dbUsername = "phpmyadmin";
              $dbPassword = "testing8";
              $dbDatabase = "elite_kiosk";

              $db_conn = new MySQLi($dbHost, $dbUsername, $dbPassword, $dbDatabase);

              if(mysqli_connect_errno())
              {
                echo "Database connection error; please try again later.";
                exit();
              }

              $taskid = "NULL";

              $createTaskQuery = "INSERT INTO task_list VALUES (?, ?, ?, ?, ?, ?, ?)";

              $stmt = $db_conn->prepare($createTaskQuery);
              $stmt->bind_param("sssssii", $taskid, $tname, $sdesc, $ldesc, $ttype, $tpriority, $tstatus);
              $stmt->execute();

              header('Location: ../index.php');
              exit();
              }
            else
            {
              header('Location: ../task-options.php');
              exit();
            }
          }
          else
          {
            header('Location: ../task-options.php');
            exit();
          }
        }
        else
        {
          header('Location: ../task-options.php');
          exit();
        }
      }
      else
      {
        header('Location: ../task-options.php');
        exit();
      }
    }
    else
    {
      header('Location: ../task-options.php');
      exit();
    }
  }
  else
  {
    header('Location: ../task-options.php');
    exit();
  }
}
else
{
  header('Location: ../task-options.php');
  exit();
}

?>
