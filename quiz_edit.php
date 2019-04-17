<?php
	include 'header.php';

 ?>
 <div class="main-wrapper">
	 <h1 class="title">
		 Edit Quiz
	 </h1>

	 <div class="quiz-edit">
		 <form action="" method="post">
			 	Quiz Title <input type="text" name="quiz-title" /><br />
				Course <input type="text" name="course" /><br />
				Code <input type="text" name="code" /><br />
				Date Created <input type="text" name="date-created" /><br />
		 </form>

		 <form action="">
			 <button type="submit">Multiple Options</button>
			 <button type="submit">True or False</button>
			 <button type="submit">Multiple Answers</button>
		 </form>

		 <div id="multOpt"> <!-- Multiple Options -->
			 <form id="multOpt-form">
				 	<textarea rows="3" cols="40" name="qtn" placeholder="Enter question here"></textarea><br />
<<<<<<< HEAD
					A. <input type="text" name="ans1" placeholder="Enter option here"/><br />
					Is Correct <br />
					Yes<input type="radio" name="check_ans1" value="1" /><br />
					No<input type="radio" name="check_ans1" value="0" /><br />
					B. <input type="text" name="ans2" placeholder="Enter option here"/><br />
					Is Correct <br />
					Yes<input type="radio" name="check_ans2" value="1" /><br />
					No<input type="radio" name="check_ans2" value="0" /><br />
					C. <input type="text" name="ans3" placeholder="Enter option here"/><br />
					Is Correct <br />
					Yes<input type="radio" name="check_ans" value="1" /><br />
					No<input type="radio" name="check_ans" value="0" /><br />
					D. <input type="text" name="ans4" placeholder="Enter option here"/><br />
					Is Correct <br />
					Yes<input type="radio" name="check_ans" value="1" /><br />
					No<input type="radio" name="check_ans" value="0" /><br />
=======
					A. <input type="text" name="ans1" placeholder="Enter option here"/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
					B. <input type="text" name="ans2" placeholder="Enter option here"/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
					C. <input type="text" name="ans3" placeholder="Enter option here"/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
					D. <input type="text" name="ans4" placeholder="Enter option here"/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
>>>>>>> f038d54177e6fb35c4dd8b92c942e1e62f19dfd3
					<button type="reset" name="clear">Clear</button>
					<button type="submit" name="add-qtn" onclick="clear()">Submit</button>

			 </form>
		 </div>
<br>
		 <div id="torf"> <!-- True of False -->
			 <form id="torf-form">
				 	<textarea rows="3" cols="40" name="qtn" placeholder="Enter question here"></textarea><br />
					<input type="text" name="ans1" value="True" readonly/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
					<input type="text" name="ans2" value="False" readonly/>
					Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
					<button type="submit" name="add-qtn" onclick="clear()">Submit</button>
			 </form>
		 </div>

		 <div id="">
			<form id=""> <!-- Multiple Answer -->
				<textarea rows="3" cols="40" name="qtn" placeholder="Enter question here"></textarea><br />
				A. <input type="text" name="ans1" placeholder="Enter option here"/>
				Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
				B. <input type="text" name="ans2" placeholder="Enter option here"/>
				Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
				C. <input type="text" name="ans3" placeholder="Enter option here"/>
				Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
				D. <input type="text" name="ans4" placeholder="Enter option here"/>
				Is Correct<input type="checkbox" name="check_ans" value="true" /><br />
				<button type="reset" name="clear">Clear</button>
				<button type="submit" name="add-qtn" onclick="clear()">Submit</button>
			</form>
		 </div>
	 </div>

 </div>

 <script>
	function clear() {
		document.getElementById("multOpt-form").reset();
	}

 </script>
