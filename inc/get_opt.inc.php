<?php
	$qnId = $_SESSION['qnId'];
	$sql = "SELECT opt_desc FROM quiz.qtn_opt WHERE question_id = $qnId";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0 ) {
		while ($row = mysqli_fetch_assoc($result)) {
			echo '
			<li>'.$row['opt_desc'].'</li>
			';
		}
	} else {
		echo "No results found.";
	}
 ?>
