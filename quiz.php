<?php
  include 'header.php';
  $user = $_SESSION['uname'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="main-wrapper">
      <h1 class="title">
        Quizzes
      </h1><hr />
      <div class="links">
        <ul>
          <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM quiz.enrolled_students WHERE user_id='$id' ;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<li><a href="quizdetails.php?course=' . $row['course_code'] . '">' . $row['course_code'] . '</a></li>';
              }
            }
          ?>
        </ul>
      </div>
    </div>

  </body>
</html>
