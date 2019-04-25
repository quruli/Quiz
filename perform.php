<?php
	require 'header.php';
 ?>

<body>
	<div class="main-wrapper">
		<h1 class="title">
			Perform Quiz
		</h1>
		<form method="post">
			<?php
				$offset = $_GET['offset'];
				$qid = $_GET['quiz_id'];
				$sql = "SELECT * FROM quiz.qtn_opt where quiz_id=$qid limit 1 offset $offset;";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result); //get num of rows


				if ($resultCheck > 0) {
					//while ($offset != $resultCheck) {
						while ($row = mysqli_fetch_assoc($result)) {
							echo $row['qn_desc'];
						}

					//}

				//	echo '<button type="submit" class="generic"><a href="perform.php?quiz_id='.$qid.'&offset='.$offset.'">Next</a></button>';
				}

			?>
		</form>
	</div>
</body>
