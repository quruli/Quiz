<?php
  include 'header.php';
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
        Create Quiz
      </h1><hr />
      <form action="inc/create.inc.php" method="POST">
        Quiz Title
        <input type="text" name="quiz-title" /><br />
        Course
        <select name="course">
          <?php
            $id = $_SESSION['uid'];
            $sql = "SELECT * FROM quiz.enrolled_students WHERE user_id='$id' ;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                $cid = $row['course_id'];
                $ccode = $row['course_code'];
                echo '<option value="' . $cid . '" >' . $ccode . '</option>';
              }
            }

          ?>
        </select><br />
        <button type="submit" name="create-submit">Create Quiz</button>
      </form>

    </div>

  </body>
</html>
