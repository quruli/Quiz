<?php
if (isset($_POST['login-submit'])) {
  require 'dbh.inc.php';

  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    header("Location: ../index.php?error=emptyfields&username=".$username);
    exit();
  }
  else {
    $sql = "SELECT * FROM user WHERE user_name=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      header("Location: ../index.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $pwdCheck = password_verify($password, $row['user_pw']);
        if ($pwdCheck == false) {
          header("Location: ../index.php?error=wrongpwd");
          session_start();
          $_SESSION['invalid-pw'] = TRUE;
          exit();
        }
        else if ($pwdCheck == true) {
          session_start();
          $_SESSION['logged-in'] = TRUE;
          $_SESSION['uid'] = $row['user_id'];
          $_SESSION['uname'] = $row['user_name'];
          $_SESSION['pw'] = $row['user_pw'];
          $_SESSION['fname'] = $row['f_name'];
          $_SESSION['lname'] = $row['l_name'];
          $id = $_SESSION['uid'];
          header("Location: ../index.php?login=success&id=".$id);
          exit();
        }
      }
      else {
        header("Location: ../index.php?login=wronguidpwd");
        exit();
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: index.php");
  exit();
}
 ?>
