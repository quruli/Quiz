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
        Enrolled Courses
      </h1><hr />

			<table>
        <tr>
					<th>Course Code</th>
          <th>Title</th>
          <th>Date Enrolled</th>
        </tr>
        <ul>
          <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM quiz.enrolled_students WHERE user_id='$id' ;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
								echo '
		              <tr>
										<td>' . $row['course_code'] . '</td>
		                <td>' . $row['course_title'] . '</td>
		                <td>' . date('d-M-Y', strtotime($row['enrollment_date'])) .
		              '</tr>';
              }
            }
          ?>
        </ul>
			</table>
    </div>

  </body>
</html>
