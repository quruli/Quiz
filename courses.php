<?php
  include 'header.php';
  $user = $_SESSION['uname'];
?>
  <body>
    <div class="main-wrapper">
      <h1 class="title">
        Enrolled Courses
      </h1>

			<table>
        <tr>
					<th>Course Code</th>
          <th>Title</th>
          <th>Date Enrolled</th>
          <th>Student List</th>
        </tr>
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
		               '<td><button  class="generic trigger">View</button></td>
                  </tr>';
              }
            }
          ?>
			</table>

      <div class="list">
        <h2><?php echo "IT223"?></h2><hr /><button>Show More</button>
      </div>

    </div>

</body>
