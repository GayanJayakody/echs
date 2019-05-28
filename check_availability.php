<?php
require_once('Database Connection ObjectPool.php');
$conn = $dbConnectionPool->get();

if(!empty($_POST["name"])) {
  $sql = "SELECT * FROM projects WHERE name='" . $_POST["name"] . "'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0){
      echo "<span class='status-not-available'> This project name cannot be used.Please give another name</span>";
  }else{
      echo "<span class='status-available'> This project name can be used.</span>";
  }
}
?>