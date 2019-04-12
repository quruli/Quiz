<?php
  include 'header.php';
  $user = $_SESSION['uname'];
?>

<div class="main-wrapper">
  <h1 class="title">
    User Management
  </h1>

  <table>
    <tr>
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>User Type</th>
    </tr>
      <?php
        $sql = "SELECT user_name, f_name, l_name, privilege_desc FROM users;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <tr>
                <td><a href="profile.php?username=' . $row['user_name'] . '">' . $row['user_name'] . '</a></td>
                <td>' . $row['f_name'] . '</td>
                <td>' . $row['l_name'] . '</td>
                <td>' . $row['privilege_desc'] . '</td>
              </tr>';
          }
        }
      ?>
  </table>

</div>
