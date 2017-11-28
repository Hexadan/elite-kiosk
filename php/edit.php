<?php

  $taskid = $_POST['submit'];
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

                $updateTaskQuery = "UPDATE task_list SET task_Name = '$tname', task_ShortDesc = '$sdesc', task_LongDesc = '$ldesc', task_List = '$ttype', task_Priority = '$tpriority', task_Status = '$tstatus' WHERE task_ID = '$taskid'";
                $db_conn->query($updateTaskQuery);

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
