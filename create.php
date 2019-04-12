<?php
  include 'header.php';
?>
    <div class="main-wrapper">
      <h1 class="title">
        Create Quiz
      </h1>
      <div>
        <form action="inc/create.inc.php" method="POST" name="create-quiz" onsubmit="return isEmpty()">
          <input type="text" name="quiz-title" placeholder="Quiz Title" /><br />
          <select name="course">
            <?php
              $id = $_SESSION['uid'];
              $sql = "SELECT * FROM quiz.enrolled_students WHERE user_id='$id' ;";
              $result = mysqli_query($conn, $sql);
              $resultCheck = mysqli_num_rows($result);

              if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  $cid = $row['course_id'];
                  $ccode = $row['course_code'];
                  echo '<option value="' . $cid . '" >' . $ccode . '</option>';
                }
              }
            ?>
          </select><br />
          <button type="submit" name="create-submit">Create Quiz</button>
        </form>
      </div>



    </div>

<script>
  function isEmpty () {
    var title = document.forms["create-quiz"]["quiz-title"].value;
    if (title == "") {
      alert("Empty field");
      return false;
    }
  }

</script>
