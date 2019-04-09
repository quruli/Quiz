<?php
  $servername = "localhost";
  $dbUsername = "root";
  $dbPw = "";
  $dbName = "quiz";

  $conn = mysqli_connect($servername, $dbUsername, $dbPw, $dbName);

  if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

 ?>
