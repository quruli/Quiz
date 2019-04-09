<?php
  include 'header.php';
  $user = $_GET['user'];
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
    <h1 class="title">Account Settings</h1><hr /><br />
    <div class="account-form">
      <?php
        if (isset($_SESSION['empty-field'])) {
          echo 'Empty fields.';
        }
      ?>
      <form action="inc/changepw.inc.php" method="POST" >
        ID
        <input type="text" name="userid" value="<?php echo $id; ?>" readonly/><br />
        Username
        <input type="text" name="username" value="<?php echo $user; ?>" readonly/><br />
        Current Password
        <input type="password" name="current-pw" autocomplete="nope"/><br /> <!-- autocomplete is being ignored by firefox -->
        New Password
        <input type="password" name="new-pw" /><br />
        Repeat New Password
        <input type="password" name="repeat-pw" /><br />
        <button type="submit" name="pw-submit">Change Password</button><br />
        First Name
        <input type="text" name="fname" value="<?php echo $fname; ?>" readonly/><br />
        Last Name
        <input type="text" name="lname" value="<?php echo $lname; ?>" readonly/><br />
      </form>
    </div>


  </div>

</body>
</html>
