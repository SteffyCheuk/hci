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
        <div class='modal-settings'>
          <div class='content-padding'>
            <h4 class='centered'> 
              Profile
            </h4>
            <img class='centered' src='./images/circle_with_camera.png'>
            <table>
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
      </div>
      <div id="font-size" class="btn-settings">
        Font Size
        <div class='modal-settings'>
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
      </div>
      <div id="language" class="btn-settings">
        Language
        <div class='modal-settings'>
          <div class='content-padding'>
            <h4 class='centered'> 
              Language
            </h4>
            <div class="btn-font-sizes">
              English
            </div>
            <div class="btn-font-sizes">
              Korean
            </div>
            <div class="btn-font-sizes">
              Chinese
            </div>
          </div>
        </div>
      </div>
      <div id="feedback" class="btn-settings">
        Feedback
        <div class='modal-settings'>
          <div class='content-padding'>
            <h4 class='centered'> 
              Feedback
            </h4>
            <form name='feedback-form' method='post' action=''>
              <textarea name='feedback'></textarea>
              <input class='right' type='submit' value='Submit'>
            </form>
          </div>          
        </div>
      </div>

      <?php include "partials/navigation.php"; ?>
    </div>
  </body> 
</html> 

<script>
  $(document).ready(function () {
    $('.btn-settings').click(function () {
      $("#overlay").show();
      $(this).find('.modal-settings').show();
    })
    $("#overlay").click(function() {
      $("#overlay").hide();
      $(".modal-settings").hide();
    });
  }); 
</script>
