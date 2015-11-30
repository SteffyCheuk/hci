<?php
  require_once "DB.php";
    
  if (isset($_POST["id"])){
    $id = $_POST["id"]
    $done = $_POST["checked"]; 
    $sql = "UPDATE tasks SET done = {$done} WHERE id = {$id};";
    $result = pg_query($db, $sql);
    if (!$result){
      alert("Could not update task!");
    }
  }
  else {
    alert("error");
  }
?>