<?php

	if (isset($_POST['create-submit'])) {
		require 'dbh.inc.php';

		//get data
		$qtitle = $_POST['quiz-title'];
		$cid = $_POST['course'];
		$uid = $_SESSION['uid'];
		$date = date('Y-m-d', time());

		if (empty($qtitle)) {
			header("Location: ../create.php?error=emptytitle");
			session_start();
			exit();
		} else {
			$sql = "INSERT INTO quiz(quiz_title, user_id, course_id, date_created) VALUES('$qtitle', $cid, ?, '$date')";
			$stmt = mysqli_stmt_init($conn);

			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../create.php?error=sqlerror");
				exit();
			} else {
				mysqli_stmt_bind_param($stmt, "s", $uid);
				mysqli_stmt_execute($stmt);
				header("Location: ../create.php?create=success");
				session_start();
				$_SESSION['quiz-new'] = TRUE;
				exit();
			}
		}

	}
