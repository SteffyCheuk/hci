<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
  </head>

  <body>
    <div id="container">
    
      <?php require_once "partials/DB.php"; ?>
      <?php include "partials/header.php"; ?>

      <!-- TASK HEADER -->
      <div id="Tasks">
        TASKS
        <img src="./images/task.png" alt="pic">
      </div>

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

      <?php include "partials/navigation.php"; ?>

    </div>
  </body> 
</html> 

