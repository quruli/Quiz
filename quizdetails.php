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
      <h2 class="title">
        <a href="quiz.php">Quiz</a> >
        <?php echo $code; ?>
      </h2>

      <table>
        <tr>
          <th>Title</th>
          <th>Date Created</th>
          <th>Status</th>
          <th>Date Open</th>
          <th>Date Closed</th>
          <th>Actions</th>
        </tr>

      <?php
        $type = $_SESSION['type'];
        $sql = "SELECT * FROM quiz.list_of_quizzes WHERE course_code='$code' AND user_name='$user'; ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        $today = date('d-M-Y h:i A');
        $status = "";

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $closeDate = date('d-M-Y h:i A', strtotime($row['date_closed']));
            if ($today < $closeDate) {
              $status = "Open";
            } else {
              $status = "Closed";
            }


            echo '
              <tr>
                <td>' . $row['quiz_title'] .'</td>
                <td>' . date('d-M-Y', strtotime($row['date_created'])) . '</td>
                <td>' . $status . '</td>
                <td>' . date('d-M-Y h:i A', strtotime($row['date_open'])) . '</td>
                <td>' . date('d-M-Y h:i A', strtotime($row['date_closed'])) . '</td>';

                //date('d-M-Y') == DD-MMM-YYYY
                //date('d-M-Y h:i A') == DD-MMM-YYYY HH:MM AA

            echo '<td><button class="generic"><a href="';
            if ($type == 2) { //teacher user type returns quiz_edit.php
              echo 'quiz_edit.php?quiz_id=' . $row['quiz_id']. '">Modify</a></button></td>';
            } else if ($type == 3) { //student returns perform.php
              echo 'perform.php?quiz_id=' . $row['quiz_id'] . '">View</a></button></td>';
            }

            echo '</tr>';
          }
        } else if (empty($resultCheck)){
          echo 'No results found.<br />';
        }
       ?>
       </table>
    </div>

  </body>
</html>
