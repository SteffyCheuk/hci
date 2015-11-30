<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
  </head>

  <?php require_once "partials/DB.php"; ?>
  <?php 
    session_start();
    if (!isset($_SESSION['user'])) {
      // display register and login buttons
      include "partial/login.php";
    }
    else {
      header("Location: tasks.php");
    }
  ?>
</html> 

