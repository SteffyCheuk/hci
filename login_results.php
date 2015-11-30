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
            $email = trim($_POST["email"]);
            $password = md5($_POST["password"] . "cat");
        
            $sql = "SELECT * FROM users WHERE email = '{$email}';";
            $result = pg_query($db, $sql);

            if ($result){
              $row = pg_fetch_assoc($result);
              if ($password != $row['password']) {
                echo "Passwords do not match!  Please try again.";
              }
              else {
                $first_name = $row["first_name"];
                $last_name = $row["last_name"];
                echo "<h4>Welcome {$first_name} {$last_name}!</h4>";
                echo "<h4>Let's get started.</h4>";
                echo "<a href='tasks.php'>Go to Tasks</a>";
                $_SESSION['user'] = $row['id']; 
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
