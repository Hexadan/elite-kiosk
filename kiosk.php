<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elite Kiosk - Task List</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/kiosk.css">
    <script src="js/script.js" charset="utf-8"></script>

    <script>

    setTimeout(function(){
      location = ''
    },300000)

    </script>

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
        <div class="general-task-container">
          <div class="task-header" style="background-color: #AED581;">
            <div class="task-header-type">
              <p>General</p>
            </div>
          </div>
          <div class="column-header">
            <div class="column-general">
              <div class="col-task-name">
                Task Name
              </div>
              <div class="col-task-sdesc">
                Short Description
              </div>
              <div class="col-task-options"></div>
            </div>
          </div>
          <div class="row-content">
            <?php

            $query = "SELECT * FROM task_list WHERE task_List = 'G' AND task_Status = '0' ORDER BY task_ID DESC LIMIT 5";

            include('/var/www/html/new/php/database-connection.php');

            $result = $db_conn->query($query);

            if($result->num_rows)
            {
              while($info = $result->fetch_assoc())
              {
                echo "<div class='row'>";
                echo "<div class='general-row'>";
                echo "<div class='row-task-name'>". $info['task_Name'] ."</div>";
                echo "<div class='row-task-sdesc'>". $info['task_ShortDesc'] ."</div>";
                echo "<div class='row-task-options'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            }

            ?>
          </div>
          <div class="task-footer">
          </div>
        </div>

        <div class="priority-task-container">
          <div class="task-header" style="background-color: #E57373;">
            <div class="task-header-type">
              <p>Priority</p>
            </div>
          </div>
          <div class="column-header">
            <div class="column-priority">
              <div class="col-task-name">
                Task Name
              </div>
              <div class="col-task-sdesc">
                Short Description
              </div>
              <div class="col-task-rank">
                Rank
              </div>
              <div class="col-task-options"></div>
            </div>
          </div>
          <div class="row-content">
            <?php

            $query = "SELECT * FROM task_list WHERE task_List = 'P' AND task_Status = '0' ORDER BY task_Priority DESC LIMIT 5";

            include('/var/www/html/new/php/database-connection.php');

            $result = $db_conn->query($query);

            if($result->num_rows)
            {
              while($info = $result->fetch_assoc())
              {
                echo "<div class='row'>";
                echo "<div class='priority-row'>";
                echo "<div class='row-task-name'>". $info['task_Name'] ."</div>";
                echo "<div class='row-task-sdesc'>". $info['task_ShortDesc'] ."</div>";
                echo "<div class='row-task-rank'>". $info['task_Priority'] ."</div>";
                echo "<div class='row-task-options'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
              }
            }

            ?>
          </div>
          <div class="task-footer">
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
