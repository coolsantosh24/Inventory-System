<?php

require_once('includes/load.php');

$user_id = $_SESSION['user_id'];

$sql = "SELECT `id`, `name` FROM `users` WHERE id='$user_id'"; 
$result = $db->query($sql);

  while($row = $result->fetch_assoc()) {
    echo '<br /> user_id: '. $row['id']. ' - firstname: '. $row['name'];
  }
?>