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

	 <div class="modal">
		<h2>New Question - Multiple Choice</h2>
		<form class="account-form" method="post" action="inc/question_add.inc.php">
			<ul>
				<li>
					<label for="question-text">Question</label>
					<textarea rows="4" cols="30" placeholder="Enter question here."></textarea>
				</li>
				<li class="flex-end">
					Is Correct?
				</li>
				<li>
					<label for="ans1">A.</label>
					<input type="text" name="ans1" />
					<input type="radio" name="check-ans" value="1"/>
				</li>
				<li>
					<label for="ans2">B.</label>
					<input type="text" name="ans2" />
					<input type="radio" name="check-ans" value="1" />
				</li>
				<li>
					<label for="ans3">C.</label>
					<input type="text" name="ans3" />
					<input type="radio" name="check-ans" value="1" />
				</li>
				<li>
					<label for="ans4">D.</label>
					<input type="text" name="ans4" />
					<input type="radio" name="check-ans" value="1" />
				</li>
				<li class="flex-end">
					<button type="reset">Clear</button>
					<button type="submit" name="add-qtn">Add</button>
				</li>
			</ul>
		</form>
	 </div>


 </div>

 <script>

 </script>
