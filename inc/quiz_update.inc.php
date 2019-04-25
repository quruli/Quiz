<?php

	if (isset($_POST['quiz-update'])) {
		require 'dbh.inc.php';
		$qtitle = $_POST['quiz-title'];
		$qid = $_GET['quiz_id'];
		$course = $_POST['course'];
		$code = $_POST['code'];

		$sql = "INSERT INTO quiz (quiz_title) VALUES ('$qtitle');"


	}

 ?>
