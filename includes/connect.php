<?php
  $servername = "SEVERNAME";
  $username = "USERNAME";
  $password = "PASSWORD";
  $dbname = "DBNAME";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $_SESSION["connection"] = $conn;
?>
