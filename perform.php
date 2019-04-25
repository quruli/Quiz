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
				include 'inc/get_question.inc.php';
			?>
			<ul>
				<?php include 'inc/get_opt.inc.php';?>
			</ul>
			<?php
				$qId = $_GET['quiz_id'];
				$qn = $_GET['offset'];
				$qnNum = $_SESSION['qnNum'];


				echo
				'<li>
					<button class="generic"><a href="perform.php?quiz_id='.$qId.'&offset='.($qn-1).'">Previous</a></button>
				</li>';

				echo
				'<li>
					<button class="generic"><a href="perform.php?quiz_id='.$qId.'&offset='.($qn+1).'">Next</a></button>
				</li>';

			?>
		</form>
	</div>
</body>
