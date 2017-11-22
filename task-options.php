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

include('/var/www/html/new/php/database-connection.php');

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

    <?php //echo $taskid ."-". $taskname ."-". $tasksdesc ."-". $taskldesc ."-". $taskcategory ."-". $taskrank ."-". $taskstatus; ?>

    <div class="main-container">
      <div class="main-content">
        <div class="task-options-container">
          <div class="task-options-header">
            <div class="task-name" style="background-color: blue">
              <input type="text" style="width:100%; height:26px; margin-top:2px; box-sizing:border-box;"<?php echo "value='". $taskname ."'"; if($selection == 0){ echo "disabled";} ?> placeholder="Task Name">
            </div>
            <div class="task-sdesc" style="background-color: red">
              <input type="text" style="width:100%; height:26px; margin-top:2px; box-sizing:border-box;" <?php echo "value='". $tasksdesc ."'"; if($selection == 0){ echo "disabled";} ?> placeholder="Short Description">
            </div>
          </div>
          <div class="task-options-control">
            <div class="task-ldesc" style="background-color: green">
              <textarea style="width:100%; box-sizing: border-box; resize:none; height:100%;"><?php echo $taskldesc; ?></textarea>
            </div>
            <div class="task-ctrl">
              <div class="task-category" style="background-color: yellow">
                <select style="height:25px;">
                  <option>General</option>
                  <option>Priority</option>
                </select>
              </div>
              <div class="task-rank-num" style="background-color: gray">
                <input type="text" style="width:35px;">
              </div>
              <div class="task-status" style="background-color: pink">
                <select style="height:25px;">
                  <option>Incomplete</option>
                  <option>Complete</option>
                  <option>All</option>
                </select>
              </div>
            </div>
          </div>
          <div class="task-options-submit">
            <div class="task-submit" style="background-color: orange">
              <button type="submit">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
