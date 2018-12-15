<?php
  require("/config.php");

  // Connect to server
  $db = new mysqli($dbhost, $dbuser, $dbpass);

  if ($db->connect_error) die('Connect Error (' . $db->connect_errno . ') '. $db->connect_error);

  // Connect to database
  $select_db = mysqli_select_db($db, $dbname);
  if (!$select_db) die('Query Error: ' . mysqli_errno($db) . ' - ' . mysqli_error($db));
?>