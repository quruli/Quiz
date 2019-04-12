<?php
  include 'header.php';
?>
  <div class="main-wrapper">
    <?php
    if (isset($_SESSION['invalid-pw'])) {
      echo '<h1 class="title">Invalid password!</h1><hr />';
    } else if (isset($_SESSION['logged-in'])) {
      echo '<h1 class="title">Home</h1>';
      $type = $_SESSION['type'];
      if ($type == 1) {
        include 'admin.php';
      } else if ($type == 2) {
        include 'teacher.php';
        echo '
        <a href="create.php">Create Quiz</a><br />
        <a href="quiz_edit.php">Edit Quiz</a>';
      } else if ($type == 3) {
        include 'student.php';
      }
    } else if (!isset($_SESSION['logged-in'])) {
      include 'signup.php';
    }
    ?>
  </div>
