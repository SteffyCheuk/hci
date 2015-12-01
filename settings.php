<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/jquery.js"></script>
  </head>

  <body>
    <div id="container">
      <div id="overlay"></div>
      <!-- PROFILE POPUP -->
      <div id='profile-modal' class='modal-settings'>
        <div class='content-padding'>
          <h4 class='centered'> 
            Profile
          </h4>
          <img id='profile-image' src='./images/circle_with_camera.png'>
          <table id='profile-table'>
            <tr>
              <td> Phone: </td>
              <td> xxx-xxx-xxxx </td> 
            </tr>
            <tr>
              <td> E-mail: </td>
              <td> name@domain.com </td> 
            </tr>
            <tr>
              <td> Address: </td>
              <td> ### Street St, City, State ##### </td>
            </tr>
          </table>
        </div>
      </div>
      <!-- FONT SIZE POPUP -->
      <div id="font-size-modal" class='modal-settings'>
        <div class='content-padding'>
          <h4 class='centered'> 
            Font Size
          </h4>
          <div class="btn-font-sizes font-small">
            Small
          </div>
          <div class="btn-font-sizes font-medium">
            Medium
          </div>
          <div class="btn-font-sizes font-large">
            Large
          </div>
        </div>
      </div>
      <!-- FONT SIZE POPUP -->
      <div id="language-modal" class='modal-settings'>
        <div class='content-padding'>
          <h4 class='centered'> 
            Language
          </h4>
          <div class="btn-font-sizes font-medium">
            English
          </div>
          <div class="btn-font-sizes font-medium">
            Mandarin
          </div>
          <div class="btn-font-sizes font-medium">
            Korean
          </div>
        </div>
      </div>
      <!-- FEEDBACK POPUP -->
      <div id='feedback-modal' class='modal-settings'>
        <div class='content-padding'>
          <h4 class='centered'> 
            Feedback
          </h4>
          <form name='feedback-form' method='post' action=''>
            <textarea id='feedback-textarea' name='feedback'></textarea>
            <input class='right' type='submit' value='Submit'>
          </form>
        </div>          
      </div>



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
        Profile
      </div>
      <div id="font-size" class="btn-settings">
        Font Size
      </div>
      <div id="language" class="btn-settings">
        Language
      </div>
      <div id="feedback" class="btn-settings">
        Feedback
      </div>

      <?php include "partials/navigation.php"; ?>
    </div>
  </body> 
</html> 

<script>
  $(document).ready(function () {
    $('#profile').click(function () {
      $("#overlay").show();
      $("#profile-modal").show();
    })
    $('#font-size').click(function () {
      $("#overlay").show();
      $("#font-size-modal").show();
    })
    $('#language').click(function () {
      $("#overlay").show();
      $("#language-modal").show();
    })
    $('#feedback').click(function () {
      $("#overlay").show();
      $("#feedback-modal").show();
    })
    $("#overlay").click(function() {
      $("#overlay").hide();
      $(".modal-settings").hide();
    });
  }); 
</script>
