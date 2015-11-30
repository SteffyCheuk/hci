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
              $password = md5($password . "cat");
              $sql = "INSERT INTO users (first_name, last_name, type, email, password, phone)
                      VALUES ('{$first_name}', '{$last_name}', '{$type}', '{$email}', '{$password}', '{$phone}');";
              $result = pg_query($db, $sql);
              if ($result){
                echo "<h4>Welcome {$first_name} {$last_name}!</h4>";
                echo "<h4>Let's get started.</h4>";
                echo "<a href='tasks.php'>Go to Tasks</a>";
              }
              $result = pg_query($db, "SELECT id FROM users WHERE email = '{$email}';");
              $row = pg_fetch_assoc($result);
              $_SESSION['user'] = $row["id"]; 
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