<?php
  //check if submit button is clicked
  if (isset($_POST['signup-submit'])) {
    // following file must be included to connect to the database
    //
    require 'dbhandler.inc.php';

    // fetch the following data using dbhandler.inc.php
    $username = $_POST['username'];
    $password = $_POST['pw'];
    $pwRepeat = $_POST['pw-repeat'];

    // check if field is empty
    if (empty($username) || empty($password) || empty($pwRepeat)) {
      // load signup.php, copy username if loaded again
      header("Location: ../signup.php?error=emptyfields&username=".$username);
      exit();
    }
    //check username, must only contain the following characters
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
      exit();
    }
    //check password repeat
    elseif ($password !== $pwRepeat) {
      header("Location: ../signup.php?error=pwcheck&username=".$username);
      exit();
    }
    //chck if username is taken
    else {
      //fetch list of usernames
      $sql = "SELECT user_name FROM user WHERE user_name = ?";
      $stmt = mysqli_stmt_init($conn);
      //check connection status, returns to signup.php if not connected
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=sqlerror");
        exit();
      } else {
          // pass String as data type
          mysqli_stmt_bind_param($stmt, "s", $username);
          mysqli_stmt_execute($stmt);

          // validate existing username
          mysqli_stmt_store_result($stmt);

          //check number of result
          $resultCheck = mysqli_stmt_num_rows($stmt);

          //check if result > 1
          if ($resultCheck > 0) {
            header("Location: ../signup.php?error=usertaken");
          } else { //end check result
            $sql = "INSERT INTO user(user_name, user_pw, privilege_id) VALUES(?, ?, '2')";
            $stmt = mysqli_stmt_init($conn);
            //check connection
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../signup.php?error=sqlerror");
              exit();
            } else {
              // encrpyt password using bcrypt
              $hashedPw = password_hash($password, PASSWORD_DEFAULT);

              // pass String as data type
              mysqli_stmt_bind_param($stmt, "ss", $username, $hashedPw);
              mysqli_stmt_execute($stmt);
              header("Location: ../signup.php?signup=success");
              exit();

            }
          }
      }
    } // end chck username
    //close connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

  } else {
    header("Location: ../signup.php");
    exit();
  }

 ?>
