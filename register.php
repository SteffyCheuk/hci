<!DOCTYPE HTML>
<html>
  <head>
    <title>M.A.P. - Memos and Protection </title>
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/jquery.js"></script>
    <script src="./assets/jquery.steps.min.js"></script>
  </head>

  <body>
    <div id="container">

      <?php require_once "partials/DB.php"; ?>
      <div id="register-form">
        <form id="registration" name="registration" method="post" action="tasks.php">
          <h3>Register</h3>
          <section>
            <input type="radio" name="type" value="Caregiver">
            <input type="radio" name="type" value="Older Adult">
          </section>
          <h3>Details</h3>
          <section>
            <input type="text" name="first-name">
            <input type="text" name="last-name">
            <input type="text" name="email">
            <input type="password" name="password">
            <input type="password" name="password-validation">
          </section>
          <h3>Emergy Contacts</h3>
          <section>
            <input type="text" name="phone">
          </section>
        </form>
      </div>
      <?php 
        
      ?>

    </div>
  </body>
</html> 

<script>
  $("#register-form").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
  });
</script>
