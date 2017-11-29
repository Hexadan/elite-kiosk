<?php

if(isset($_POST['task-info']))
{
  $selection = 0;
  $task = $_POST['task-info'];
}
elseif(isset($_POST['task-add']))
{
  $selection = 1;
  $task = $_POST['task-add'];
}
elseif(isset($_POST['task-edit']))
{
  $selection = 2;
  $task = $_POST['task-edit'];
}
elseif(isset($_POST['task-delete']))
{
  $selection = 3;
  $task = $_POST['task-delete'];
}
else
{
  $selection = 4;
}

$query = "SELECT * FROM task_list WHERE task_ID = '$task'";

include('/var/www/html/php/database-connection.php');

$result = $db_conn->query($query);

if($result->num_rows)
{
  while($info = $result->fetch_assoc())
  {
    $taskid = $info['task_ID'];
    $taskname = $info['task_Name'];
    $tasksdesc = $info['task_ShortDesc'];
    $taskldesc = $info['task_LongDesc'];
    $taskcategory = $info['task_List'];
    $taskrank = $info['task_Priority'];
    $taskstatus = $info['task_Status'];
  }
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elite Kiosk - Options</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/task-options.css">
    <script src="js/script.js" charset="utf-8"></script>
  </head>
  <body>

    <div class="navbar-container">
      <div class="navbar-content">
        <div class="navbar-logo">
          <a href="index.php">Elite Networks Kiosk</a>
        </div>
        <div class="navbar-links">
          <div class="link-1">
            <a href="task-list.php">Task List</a>
          </div>
          <div class="link-2">
            <a href="#">Link 2</a>
          </div>
          <div class="link-3">
            <a href="#">Link 3</a>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="main-content">
        <?php
          if($selection == 1)
          {
            echo  "<form class='task-options-container' action='php/add.php' onsubmit='return validateAddTask()' method='POST'>";
          }
          elseif($selection == 2)
          {
            echo "<form class='task-options-container' action='php/edit.php' onsubmit='return validateEditTask()' method='POST'>";
          }
          elseif($selection == 3)
          {
            echo "<form class='task-options-container' action='php/delete.php' method='POST'>";
          }
        ?>
          <div class="task-options-header">
            <div class="task-name">
              <input name="taskName" type="text" class="task-name-input" <?php echo "value='". $taskname ."'"; if($selection == 0){ echo "disabled";} ?> placeholder="Task Name">
            </div>
            <div class="task-sdesc">
              <input name="taskShortDesc" type="text" class="task-sdesc-input" <?php echo "value='". $tasksdesc ."'"; if($selection == 0){ echo "disabled";} ?> placeholder="Short Description">
            </div>
          </div>
          <div class="task-options-control">
            <div class="task-ldesc">
              <textarea name="taskLongDesc" class="task-ldesc-input"<?php if($selection == 0){ echo "disabled";} ?>><?php echo $taskldesc; ?></textarea>
            </div>
            <div class="task-ctrl">
              <div class="task-category">
                <select name="taskType" class="task-category-input" <?php if($selection == 0){ echo "disabled";} ?>>
                  <?php
                    if($taskcategory == "G")
                    {
                      echo "<option value='G' selected>General</option>";
                      echo "<option value='P'>Priority</option>";
                    }
                    elseif($taskcategory == "P")
                    {
                      echo "<option value='G'>G</option>";
                      echo "<option value='P' selected>P</option>";
                    }
                    else
                    {
                      echo "<option value='G'>General</option>";
                      echo "<option value='P'>Priority</option>";
                    }
                  ?>
                </select>
              </div>
              <div class="task-rank">
                <input name="taskPriority" type="text" class="task-rank-input"<?php echo "value='". $taskrank ."'"; if($selection == 0){ echo "disabled";} ?>>
              </div>
              <div class="task-status">
                <select name="taskStatus" class="task-status-input" <?php if($selection == 0){ echo "disabled";} ?>>
                  <?php
                    if($taskstatus == 0)
                    {
                      echo "<option value='0' selected>Incomplete</option>";
                      echo "<option value='1'>Complete</option>";
                    }
                    elseif($taskstatus == 1)
                    {
                      echo "<option value='0'>Incomplete</option>";
                      echo "<option value='1' selected>Complete</option>";
                    }
                    else
                    {
                      echo "<option value='0'>Incomplete</option>";
                      echo "<option value='1'>Complete</option>";
                    }
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="task-options-submit">
            <div class="task-submit">
              <?php if($selection != 0){echo "<button name='submit' type='submit' value='". $taskid ."' style='height:100%;'>Submit</button>";} ?>
            </div>
          </div>
        </form>
      </div>
    </div>

  </body>
</html>
