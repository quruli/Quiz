<?php
	include 'header.php';
	$qid = $_GET['quiz_id'];
	$sql = "SELECT * FROM quiz.list_of_quizzes WHERE quiz_id = $qid; ";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$title = $row['quiz_title'];
			$ctitle = $row['course_title'];
			$ccode = $row['course_code'];
			$date = $row['date_created'];
		}
	} else if (empty($resultCheck)){
		echo 'No results found.<br />';
	}
 ?>
 <div class="main-wrapper">
	 <h1 class="title">
		 Edit Quiz
	 </h1>

	 <div>
		 <form action="" method="post" class="account-form">
			 <ul>
				<li>
					<label for="quiz-title">Quiz Title</label>
					<input type="text" name="quiz-title" value="<?php echo $title ?>"/>
				</li>
				<li>
					<label for="course">Course</label>
					<input type="text" name="course" value="<?php echo $ctitle ?>" />
				</li>
				<li>
					<label for="code">Course Code</label>
					<input type="text" name="code" value="<?php echo $ccode ?>" />
				</li>
				<li>
					<label for="date-created">Date Created</label>
					<input type="text" name="date-created" value="<?php echo $date ?>" />
				</li>
				<li class="flex-end">
					<button type="submit" name="quiz-update">Update</button>
					<button type="submit" name="quiz-delete" class="button-red">Delete</button>
				</li>
			 </ul>
		 </form>

		 <form action="">
			 <button type="submit" class="generic">Multiple Choice</button>
			 <button type="submit" class="generic">True or False</button>
			 <button type="submit" class="generic">Multiple Answers</button>
		 </form>

	 </div>

 </div>

 <script>
	function clear() {
		document.getElementById("multOpt-form").reset();
	}

 </script>
