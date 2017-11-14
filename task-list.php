<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Elite Kiosk - Task List</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/task-list.css">
    <script src="js/script.js" charset="utf-8"></script>

  </head>
  <body>

    <div class="navbar-container">
      <div class="navbar-content">
        <div class="navbar-logo">
          <a href="index.html">Elite Networks Kiosk</a>
        </div>
        <div class="navbar-links">
          <div class="link-1">
            <a href="#">Task List</a>
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
        <div class="task-container">
          <div class="task-header">
            <div class="task-header-type">
              <?php
                if(isset($_POST['general']))
                {
                  if($_POST['general'] == 0)
                  {
                    echo "<p>General</p>";
                  }
                }
                elseif(isset($_POST['priority']))
                {
                  if($_POST['priority'] == 1)
                  {
                    echo "<p>Priority</p>";
                  }
                }
                else
                {
                  echo "<p>General</p>";
                }
              ?>
            </div>
            <div class="task-header-controls">
              <a href="#"><p>ADD</p></a>
            </div>
            <div class="task-header-sort">
              <form action="task-list.php" method="POST" class="task-sort-container">
                <select class="task-sort-items">
                  <?php
                  /*
                    if((isset($_POST['gen-tasks'])) || ((isset($_POST['submit'])) && ($_POST['priority-selection'] == 0)))
                    {
                      echo "<option value='0' selected>General</option>";
                      echo "<option value='1'>Priority</option>";
                    }
                    elseif((isset($_POST['pri-tasks'])) || ((isset($_POST['submit'])) && ($_POST['priority-selection'] == 1)))
                    {
                      echo "<option value='0'>General</option>";
                      echo "<option value='1' selected>Priority</option>";
                      $selected = 1;
                    }
                    else
                    {
                      echo "<option value='0'>General</option>";
                      echo "<option value='1'>Priority</option>";
                    }
                    */
                  ?>
                </select>
                <select class="task-sort-items">
                  <?php
                    /*
                    if(isset($_POST['submit']))
                    {
                      if($_POST['status-selection'] == 0)
                      {
                        echo "<option value='0' selected>Incomplete</option>";
                        echo "<option value='1'>Complete</option>";
                        echo "<option value='2'>All</option>";
                      }
                      elseif($_POST['status-selection'] == 1)
                      {
                        echo "<option value='0'>Incomplete</option>";
                        echo "<option value='1' selected>Complete</option>";
                        echo "<option value='2'>All</option>";
                      }
                      elseif($_POST['status-selection'] == 2)
                      {
                        echo "<option value='0'>Incomplete</option>";
                        echo "<option value='1'>Complete</option>";
                        echo "<option value='2' selected>All</option>";
                      }
                      else
                      {
                        echo "<option value='0'>Incomplete</option>";
                        echo "<option value='1'>Complete</option>";
                        echo "<option value='2'>All</option>";
                      }
                    }
                    else
                    {
                      echo "<option value='0'>Incomplete</option>";
                      echo "<option value='1'>Complete</option>";
                      echo "<option value='2'>All</option>";
                    }
                    */
                  ?>
                </select>
                <button type="submit" name="submit" value="submit" class="task-sort-items">Sort</button>
              </form>
            </div>
          </div>
          <div class="column-header">

            <?php
            /*
              if($selected == 1)
              {
                echo "<div class='column-priority'>";
                echo "<div class='col-task-name'>Task Name</div>";
                echo "<div class='col-task-sdesc'>Short Description</div>";
                echo "<div class='col-task-rank'>Rank</div>";
                echo "<div class='col-task-options'>Options</div>";
                echo "</div>";
              }
              else
              {
                echo "<div class='column-general'>";
                echo "<div class='col-task-name'>Task Name</div>";
                echo "<div class='col-task-sdesc'>Short Description</div>";
                echo "<div class='col-task-options'>Options</div>";
                echo "</div>";
              }
              */
            ?>

          </div>
          <div class="row-content">

            <?php
            /*
            if(isset($_POST['submit']))
            {
              if(((isset($_POST['gen-tasks'])) || ($_POST['priority-selection']==0)) && ($_POST['status-selection'] == 0))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G' AND task_Status = '0'";
                $display = 0;
              }
              elseif(((isset($_POST['gen-tasks'])) || ($_POST['priority-selection']==0)) && ($_POST['status-selection'] == 1))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G' and task_Status = '1'";
                $display = 0;
              }
              elseif(((isset($_POST['gen-tasks'])) || ($_POST['priority-selection']==0)) && ($_POST['status-selection'] == 2))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G'";
                $display = 0;
              }
              elseif(((isset($_POST['pri-tasks'])) || ($_POST['priority-selection']==1)) && ($_POST['status-selection'] == 0))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'P' AND task_Status = '0' ORDER BY task_Priority DESC";
                $display = 1;
              }
              elseif(((isset($_POST['pri-tasks'])) || ($_POST['priority-selection']==1)) && ($_POST['status-selection'] == 1))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'P' AND task_Status = '1' ORDER BY task_Priority DESC";
                $display = 1;
              }
              elseif(((isset($_POST['pri-tasks'])) || ($_POST['priority-selection']==1)) && ($_POST['status-selection'] == 2))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'P' ORDER BY task_Priority DESC";
                $display = 1;
              }
              else
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G' AND task_Status = '0'";
                $display = 0;
              }
            }
            else
            {
              if(isset($_POST['gen-tasks']))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G' AND task_Status = '0'";
                $display = 0;
              }
              elseif(isset($_POST['pri-tasks']))
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'P' AND task_Status = '0' ORDER BY task_Priority DESC";
                $display = 1;
              }
              else
              {
                $query = "SELECT * FROM task_list WHERE task_List = 'G' AND task_Status = '0'";
                $display = 0;
              }
            }

            include('/var/www/html/php/database-connection.php');

            $result = $db_conn->query($query);

            if($display == 0)
            {
              if($result->num_rows)
              {
                while($info = $result->fetch_assoc())
                {
                  echo "<div class='row'>";
                  echo "<div class='general-row'>";
                  echo "<div class='row-task-name'>". $info['task_Name'] ."</div>";
                  echo "<div class='row-task-sdesc'>". $info['task_ShortDesc'] ."</div>";
                  echo "<div class='row-task-options'>";
                  echo "<form name='taskOptions' action='task-options.php' method='POST'>";
                  echo "<button name='task-info' type='submit' id='". $info['task_ID'] ."' class='btn btn-info'></button>";
                  echo "<button name='task-edit' type='submit' id='". $info['task_ID'] ."' class='btn btn-edit'></button>";
                  echo "<button name='task-delete' type='submit' id='". $info['task_ID'] ."' class='btn btn-delete'></button>";
                  echo "</form>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              }
              else
              {
                  echo "<div><h2>No general tasks exist, please create a general task.</h2></div>";
              }

            }
            elseif($display == 1)
            {
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
                  echo "<form name='taskOptions' action='task-options.php' method='POST'>";
                  echo "<button name='task-info' type='submit' id='". $info['task_ID'] ."' class='btn btn-info'></button>";
                  echo "<button name='task-edit' type='submit' id='". $info['task_ID'] ."' class='btn btn-edit'></button>";
                  echo "<button name='task-delete' type='submit' id='". $info['task_ID'] ."' class='btn btn-delete'></button>";
                  echo "</form>";
                  echo "</div>";
                  echo "</div>";
                  echo "</div>";
                }
              }
              else
              {
                  echo "<div><h2>No priority tasks exist, please create a priority task.</h2></div>";
              }
            }
            else
            {
                echo " Error ";
            }
            */
          ?>

          </div>
          <div class="task-footer">
          </div>
        </div>
      </div>
    </div>

  </body>
</html>