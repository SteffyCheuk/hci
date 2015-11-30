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
      <div id="success">
        <?php
          require_once "partials/DB.php";
          session_start();
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $type = $_POST["type"];
            $first_name = trim($_POST["first-name"]);
            $last_name = trim($_POST["last-name"]);
            $phone = trim($_POST["phone"]);
            $email = trim($_POST["email"]);
            $password = $_POST["password"];
            $password_validation = $_POST["password-validation"];
            if ($password != $password_validation) {
              echo "Passwords do not match!  Please try again.";
            }
            else {
              $options = [ 'cost' => 2, 'salt' => 'catscatscats' ];
              $password = password_hash($password, PASSWORD_BCRYPT, $options);
              $sql = "INSERT INTO users VALUES ('{$first_name}', '{$last_name}', '{$type}', '{$email}', '{$password}', '{$phone}');";
              $result = pg_query($db, $sql);
              if ($result){
                echo "<h2>Welcome {$first_name} {$last_name}!</h2>";
                echo "<h2>Let's get started.</h2>";
                echo "<a href='tasks.php'>Go to Tasks</a>";
              }
              $result = pg_query($db, "SELECT id FROM users WHERE email = '{$email}';");
              $_SESSION['user'] = $result[0]; 
            }
          }
        ?>

      </div>

    </div>
  </body>
</html> 

<script>
  $(document).ready(function () {
     $("#registration").steps({
      headerTag: "h4",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      autoFocus: true, 
      onFinished: function (e, i) {
        var form = $(this);
        form.submit();  
      }
    });
  }); 
</script>
