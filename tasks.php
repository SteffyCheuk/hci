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
          if (isset($_SESSION["user"])){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              // this means that an account was registered... or that a task was added. 
              if (isset($_POST["title"])) {
                $title = $_POST["title"];
                $description = $_POST["description"];
                $location = $_POST["location"];
                $date = $_POST["date"];
                $time = $_POST["time"];
                $sql = "INSERT INTO tasks VALUES ($_SESSION['user'], $_SESSION['user'], $title, $description, $location, $date, $time, false, false);";
                $result = pg_query($db, $sql);
              }
            }
            // display tasks
            $sql = "SELECT * FROM tasks WHERE older_adult_id = $_SESSION['user'];"
            $result = pg_query($db, $sql);
            if (!$result) {
              echo "Error!";
            }
            else {
              $arr = pg_fetch_all($result, 0, PGSQL_NUM);
              echo "<table>";
              for ($i = 0; $i < count($arr), $i++) {
                echo 
                  "<tr> 
                    <td><img src='./images/white_check_box.png'></td>
                    <td>$arr[$i]['title']</td>
                    <td><img src='./images/trash.png'></td>
                  </tr> 
                  "; 
              }
              echo "</table>";
            }

          else {
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