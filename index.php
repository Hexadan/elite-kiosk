<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elite Kiosk - Home</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/landing.css">
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
        <div class="module-container">
          <div class="task-module card">
            <div class="module-task-title">
              <div class="task-title-header">
                Task List
              </div>
              <div class="task-title-subheader">
                Recent Tasks
              </div>
            </div>
            <div class="module-task-recent">
              <?php
                include('/var/www/html/new/php/database-connection.php');

                $query = "SELECT * FROM task_list ORDER BY task_ID DESC LIMIT 5";

                $result = $db_conn->query($query);

                if($result->num_rows)
                {
                  while($info = $result->fetch_assoc())
                  {
                    echo "<div class='row'><form name='taskOptions' action='task-options.php' method='POST'><button name='task-info' type='submit' class='btn-info' id='". $info['task_ID'] ."'>". $info['task_Name'] ."</button></form></div>";
                  }
                }
              ?>
            </div>
            <div class="module-task-buttons">
              <div class="task-buttons-container">
                <form class="task-list-buttons" action="task-list.php" method="POST">
                  <div class="gen-btn">
                    <button type="submit" name="general" value="0" class="btn btn-task-list">General</button>
                  </div>
                  <div class="pri-btn">
                    <button type="submit" name="priority" value="1" class="btn btn-task-list">Priority</button>
                  </div>
                </form>
                <!-- update form -->
                <form class="task-option-buttons">
                  <div class="add-btn">
                    <button class="btn btn-add"></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
</html>
