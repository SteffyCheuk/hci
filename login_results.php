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
            $email = trim($_POST["email"]);
            $password = $_POST["password"];
            
            $sql = "SELECT * FROM users WHERE email = '{$email}';";
            $result = pg_query($db, $sql);

            if ($result){
              if ($password != $result['password']) {
                echo "Passwords do not match!  Please try again.";
              }
              else {
                echo "<h4>Welcome {$first_name} {$last_name}!</h4>";
                echo "<h4>Let's get started.</h4>";
                echo "<a href='tasks.php'>Go to Tasks</a>";
                $_SESSION['user'] = $result['id']; 
              }
            }
          }
          else {
            echo "Error!";
          }
        ?>

      </div>

    </div>
  </body>
</html> 
