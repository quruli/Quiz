<?php
  include 'header.php';
  $user = $_SESSION['uname'];
  $sql = "SELECT * FROM quiz.user WHERE user_name='$user' ;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['user_id'];
      $pw = $row['user_pw'];
      $fname = $row['f_name'];
      $lname = $row['l_name'];
    }
  }
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
    <h1 class="title">Account Settings</h1><br />
    <div>
      <?php
        if (isset($_SESSION['empty-field'])) {
          echo 'Empty fields.';
        }
      ?>
      <form action="inc/changepw.inc.php" method="POST" class="account-form">
        <ul>
          <li>
            <label for="username">Username</label>
            <input type="text" name="username" value="<?php echo $user; ?>" readonly/>
          </li>
          <li>
            <label for="current-pw">Current Password</label>
            <input type="password" name="current-pw" autocomplete="nope"/>
          </li>
          <li>
            <label for="new-pw">New Password</label>
            <input type="password" name="new-pw" /><br />
          </li>
          <li>
            <label for="repeat-pw">Repeat Password</label>
            <input type="password" name="repeat-pw" />
          </li>
          <li>
            <button type="submit" name="pw-submit">Change Password</button>
          </li>
          <li>
            <label for="f-name">First Name</label>
            <input type="text" name="fname" value="<?php echo $fname; ?>" readonly/>
          </li>
          <li>
            <label for="f-name">Last Name</label>
            <input type="text" name="lname" value="<?php echo $lname; ?>" readonly/>
          </li>

        </ul>
      </form>
    </div>


  </div>

</body>
</html>
