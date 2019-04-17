<?php
	$qid = $_GET['quiz_id'];
	if (isset($_POST['quiz-update'])) {
		require 'dbh.inc.php';
		$qtitle = $_POST['quiz-title'];

	}

 ?>
