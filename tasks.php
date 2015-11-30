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
      <div id="modal-trash">
        <h4> Delete Task? </h4>
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
              // DELETED TASK
              if (isset($_POST["id"])) {
                $id = $_POST["id"];
                $sql = "DELETE FROM tasks WHERE id = {$id};";
                $result = pg_query($db, $sql);
              }
              // ADDED TASK
              if (isset($_POST["title"])) {
                $title = $_POST["title"];
                $description = $_POST["description"];
                $location = $_POST["location"];
                // data checking
                if (!isset($_POST["date"]) || strlen(trim($_POST["date"]) == 0)){
                  $date = 'null';
                }
                else {
                  $date = "'{$_POST['date']}'";
                }
                if (!isset($_POST["time"]) || strlen(trim($_POST["time"])) == 0){
                  $time = 'null';
                }
                else {
                  $time = "'{$_POST['time']}'";
                }

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
            // DISPLAY TASKS
            $sql = "SELECT * FROM tasks WHERE older_adult_id = {$_SESSION['user']};";
            $result = pg_query($db, $sql);
            if ($result) {
              echo "<table id='task-table' class='white'>";
              while ($row = pg_fetch_assoc($result)) {
                if ($row["done"] == 't') {
                  $checkmark_class = 'checkmark';
                }
                else {
                  $checkmark_class = 'checkmark hidden';
                }
                $added_by = pg_query($db, "SELECT first_name, last_name FROM users WHERE id = {$row['owner_id']};");
                $added_by_row = pg_fetch_assoc($added_by);
                $name = "{$added_by_row['first_name']} {$added_by_row['last_name']}";
                if (!isset($row['date']) || !isset($row['time'])) {
                  $datetime = "";
                }
                else {
                  $datetime = "<img src='./images/clock_task.png'> {$row['date']} {$row['time']}<br/>";
                }
                echo 
                  "<tr> 
                    <td class='task-status'>
                      <span class='hidden'>{$row['id']}</span>
                      <img class='checkbox' src='./images/white_check_box.png'>
                      <img class='{$checkmark_class}' src='./images/check.png'>
                    </td>
                    <td class='task-details dropdownWrapper'>
                      <div class='dropdownLabel'>
                        {$row['title']}
                        <img id='arrow' src='./images/down_arrow_task.png' class='right'>
                      </div>
                      <div class='dropdownPanel'>
                        <div class='content-padding'>
                          Description: {$row['description']}<br/>
                          <img src='./images/task_location_icon.png'> {$row['location']}<br/>
                          $datetime
                          Added by: {$name}<br/>
                        </div>
                      </div>
                    </td>
                    <td class='task-trash'><img src='./images/trash.png'>
                      <span class='hidden'>{$row['id']}</span>
                    </td>
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
      $("#modal-trash").html("<h4> Delete Task? </h4>");
      $("#modal-trash").hide();
    });
    $(".task-trash").click(function () {
      var id = $(this).text();
      $("#overlay").show();
      $("#modal-trash").append(" \
        <form name='task-deletion' method='post' action='tasks.php'> \
          <input type='hidden' name='id' value='" + id + "'>  \
          <input type='submit' name='delete-form' value='Yes'> \
          <input type='button' id='delete-cancel' name='cancel' value='No'> \
        </form> \
        ");
      $("#modal-trash").show();
      $("#delete-cancel").click(function () {
        $("#overlay").hide();
        $("#modal").hide();
        $("#modal-trash").html("<h4> Delete Task? </h4>");
        $("#modal-trash").hide();
      });
    });
    $(".task-status").click(function () {
      var id = $(this).text();
      var checkmark = $(this).find(".checkmark");
      var checked = false;
      if (checkmark.hasClass("hidden")) {
        checkmark.removeClass("hidden");
        checked = true;
      }
      else {
        checkmark.addClass("hidden");
        checked = false;
      }
      $.ajax({
        type: "POST",
        url: "partials/task_completed.php",
        data: {id: id, checked: checked}
      });
    });

    // DROP DOWN WINDOWS
    var $dropdown = $('.dropdownWrapper'),
        $drpBtn   = $dropdown.find('div.dropdownLabel');

    $drpBtn.on('click', function(e){
      e.stopPropagation();
      var $element = $(this).parent();
      $element.find('.dropdownPanel').fadeToggle(100);
      if ($("#arrow").attr("src") == "./images/down_arrow_task.png") {
        $("#arrow").attr("src","./images/down_arrow_task.png");
        $("#arrow").attr("src","./images/up_arrow_task.png");
      }
      else {
        $("#arrow").attr("src","./images/down_arrow_task.png");
      }
    });

    $("body").click(function(){
      $('.dropdownPanel').hide(100);
      $("#arrow").attr("src","./images/down_arrow_task.png");
    });
  }); 
</script>