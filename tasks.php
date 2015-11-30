<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/jquery.js"></script>
  </head>

  <body>
    <div id="container">
      <div id="modal">
        <h4 class="centered"> Add Tasks </h4>
        <form id="add_task" action="tasks.php" method="post">
          <input type="text" id="add-task-title" name="title" placeholder="add task title...">
          <textarea id="add-task-description" name="description" placeholder="add task description..."></textarea>
          <input id="add-task-location" type="text" name="location" placeholder="add a location...">
          <input id="add-task-date" type="text" name="date" placeholder="mm/dd/yy">
          <input id="add-task-time" type="text" name="time" placeholder="00:00">
          <br/>
          <input class="right" type="submit" value="Add">
        </form>
      </div>
      <div id="overlay">
      </div>


      <div id="container-contents">

        <?php require_once "partials/DB.php"; ?>
        <?php include "partials/header.php"; ?>

        <!-- TASK HEADER -->
        <div id="tasks">
          TASKS
          <img src="./images/task.png" alt="pic">
        </div>

        <!-- DISPLAY TASKS -->
        <?php 
          session_start();
          $_SESSION['user'] = 1;
          if (isset($_SESSION['user'])){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // this means that an account was registered... or that a task was added. 
              if (isset($_POST["title"])) {
                $title = $_POST["title"];
                $description = $_POST["description"];
                $location = $_POST["location"];
                // data checking
                if (!isset($_POST["date"]) || strlen(trim($_POST["date"]) == 0)){
                  $date = null;
                }
                else {
                  $date = "{$_POST['date']}";
                }
                if (!isset($_POST["time"]) || strlen(trim($_POST["time"])) == 0){
                  $time = null;
                }
                else {
                  $time = "{$_POST['time']}";
                }

                $date = null;
                $time = null;

                $sql = "INSERT INTO tasks (older_adult_id, owner_id, 
                                title, description, location, 
                                deadline_date, deadline_time,
                                done, notified) 
                        VALUES ('{$_SESSION['user']}', '{$_SESSION['user']}', 
                                '{$title}', '{$description}', '{$location}', 
                                {$date}, {$time}, false, false);";
                $result = pg_query($db, $sql);
              }
            }
            // display tasks
            $sql = "SELECT * FROM tasks WHERE older_adult_id = {$_SESSION['user']};";
            $result = pg_query($db, $sql);
            if ($result) {
              echo "<table id='task-table' class='white'>";
              while ($row = pg_fetch_assoc($result)) {
                echo 
                  "<tr> 
                    <td class='task-status'><img src='./images/white_check_box.png'></td>
                    <td class='task-details'>{$row['title']}</td>
                    <td class='task-trash'><img src='./images/trash.png'></td>
                  </tr> 
                  "; 
              }
              echo "</table>";
            }
          }
          else {
            echo $_SESSION["user"];
            echo "Error";
          }
        ?>

        <!-- DISPLAY ADD TASK BUTTON -->
        <img id="add_task_button" src="./images/plus_sign.png">
      </div>
      <?php include "partials/navigation.php"; ?>
    </div>
  </body> 
</html> 


<script>
  $(document).ready(function () {
    $("#add_task_button").click(function() {
      $("#overlay").show();
      $("#modal").show();
    });
    $("#overlay").click(function() {
      $("#overlay").hide();
      $("#modal").hide();
    });
  }); 
</script>