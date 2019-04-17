<?php
  include 'header.php';
  $user = $_SESSION['uname'];
  $code = $_GET['course'];
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
      <h2><?php echo $code; ?></h2>

      <table>
        <tr>
          <th>Title</th>
          <th>Course</th>
          <th>Course Code</th>
          <th>Date Created</th>
          <th>Actions</th>
        </tr>

      <?php
        $sql = "SELECT * FROM quiz.list_of_quizzes WHERE course_code='$code' AND user_name='$user'; ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo '
              <tr>
                <td>' . $row['quiz_title'] .'</td>
                <td>' . $row['course_title'] . '</td>
                <td>' . $row['course_code'] . '</td>
                <td>' . date('d-M-Y', strtotime($row['date_created'])) .
                '<td><a href="quiz_edit.php?quiz_id=' . $row['quiz_id'] . '">Modify</a></td>
              </tr>';
          }
        } else if (empty($resultCheck)){
          echo 'No results found.<br />';
        }
       ?>
       </table>
    </div>

  </body>
</html>
