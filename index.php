<?php
  include 'header.php';
?>

<html>
<head>
  <meta charset="utf-8">
  <meta name=viewport content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="main-wrapper">
    <?php
    if (isset($_SESSION['invalid-pw'])) {
      echo "<h1>Invalid password!</h1>";
    } else if (isset($_SESSION['logged-in'])) {
      echo "<h1>Welcome, " . $_SESSION['uname'] . "</h1>";
    } else if (!isset($_SESSION['logged-in'])) {
      echo '<a href="singup.php">Sign up here.</a>';


    }

    ?>
  </div>

</body>
</html>
