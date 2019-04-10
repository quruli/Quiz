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
      echo '<h1 class="title">Invalid password!</h1><hr />';
    } else if (isset($_SESSION['logged-in'])) {
      echo '<h1 class="title">Welcome, ' . $_SESSION['uname'] . '</h1><hr />';
    } else if (!isset($_SESSION['logged-in'])) {
      echo '<h1 class="title"><a href="singup.php">Sign up here.</a></h1><hr />';
    }
    ?>




  </div>

</body>
</html>
