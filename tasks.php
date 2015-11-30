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
        <form id="add_task" action="add_task" method="post">
          <input class="centered" type="text" id="add-task-title" name="title" placeholder="add task title...">
          <textarea class="centered" id="add-task-description" name="description" placeholder="add task description..."></textarea>
          <input class="centered" id="add-task-location" type="text" name="location" placeholder="add a location...">
          <input class="centered" id="add-task-date" type="text" name="date" placeholder="mm/dd/yy">
          <input class="centered" id="add-task-time" type="text" name="time" placeholder="00:00">
          <br/>
          <input class="left" type="submit" value="Add">
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
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // this means that an account was registered...

          }
          else if (isset($_SESSION["user"])){
            // display tasks
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
      console.log('clicked!');
    });
  }); 
</script>