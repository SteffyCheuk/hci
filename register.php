<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/jquery.steps.css">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/jquery.js"></script>
    <script src="./assets/jquery.steps.min.js"></script>
  </head>

  <body>
    <div id="container">

      <?php require_once "partials/DB.php"; ?>
      <!-- REGISTRATION WIZARD FORM -->
      <form id="registration" name="registration" method="post" action="tasks.php">
        <h3>Register</h3>
        <section>
          <input type="radio" id="caregiver" name="type" value="Caregiver">
          <label for="caregiver">I am a caregiver</label>
          <input type="radio" id="older-adult" name="type" value="OlderAdult">
          <label for="older-adult">I am an older adult</label>
        </section>
        <h3>Details</h3>
        <section>
          <input type="text" name="first-name">
          <input type="text" name="last-name">
          <input type="text" name="email">
          <input type="password" name="password">
          <input type="password" name="password-validation">
        </section>
        <h3>Contacts</h3>
        <section>
          <input type="text" name="phone">
        </section>
      </form>
      <?php 
        
      ?>

    </div>
  </body>
</html> 

<script>
  $(document).ready(function () {
     $("#registration").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      autoFocus: true
    });
  }); 
</script>
