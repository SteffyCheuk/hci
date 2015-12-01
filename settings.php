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
      <?php 
        session_start();
        $_SESSION['user'] = 1;
        if (isset($_SESSION['user'])) {
          // DISPLAY SETTINGS
        }

      ?>

      <!-- MAIN CONTENT GOES HERE -->
      <div id="profile" class="btn-settings">
      
      </div>
      <div id="font-size" class="btn-settings">
      
      </div>
      <div id="language" class="btn-settings">
      
      </div>
      <div id="feedback" class="btn-settings">
      
      </div>

      <?php include "partials/navigation.php"; ?>

    </div>
  </body> 
</html> 

