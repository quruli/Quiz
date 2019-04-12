<?php
	session_start();
	if (isset($_POST['create-submit'])) {
		require 'dbh.inc.php';

		//get data
		$qtitle = $_POST['quiz-title'];
		$cid = $_POST['course'];
		$id = $_SESSION['uid'];
		$date = date('Y-m-d');

			$sql = "INSERT INTO quiz(quiz_title, course_id, user_id, date_created) VALUES('$qtitle', $cid, $id, '$date')";

		if(!mysqli_query($conn, $sql)) {
			echo("Error description: " . mysqli_error($conn));
			echo '<br />' . $date . '<br />';
			echo $id;
		} else {
			header("Location: ../create.php?create=success");
			exit();
		}

	}

?>
