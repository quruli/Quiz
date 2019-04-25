<?php
	$offset = $_GET['offset'];
	$qid = $_GET['quiz_id'];
	$sql = "SELECT description, question_id FROM quiz.quiz_question where quiz_id=$qid limit 1 offset $offset;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result); //get num of rows
	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo $row['description'];
			$_SESSION['qnId'] = $row['question_id'];
			$_SESSION['qnNum'] = $resultCheck;
		}
	} else {
		echo "No results found.";
	}

 ?>
