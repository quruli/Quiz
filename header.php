<?php
  session_start();
  require "inc/dbh.inc.php";

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <header>
      <nav class="nav-header-main">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href=<?php
            if (isset($_SESSION['logged-in'])) {
              $id = $_SESSION['uid'];
              echo '"quiz.php?id='. $id . '"';
            }
             ?>>Quizzes</a></li>
          <li><a href=<?php
            if (isset($_SESSION['logged-in'])) {
              $id = $_SESSION['uid'];
              echo '"courses.php?id='. $id . '"';
            }
             ?>>Courses</a></li>
          <li> </li>
        </ul>
      </nav>
      <div class="header-login">
        <?php
          if (isset($_SESSION['logged-in'])) {
            $user = $_SESSION['uname'];
            echo '
                  <a href="account.php?user=' . $user . '">Welcome, ' . $user . '</a>
                  <form action="inc/logout.inc.php" method="post">
                  <button type="submit" name="logout-submit">Logout</button>
                  </form>';
          } else {
            echo '<form action="inc/login.inc.php" method="post">
                    <input type="text" name="username" placeholder="Username" />
                    <input type="password" name="pwd" placeholder="Password" />
                    <button type="submit" name="login-submit">Login</button>
                  </form>';
          }
         ?>

      </div>
    </header>
  </body>
</html>
