<html>
  <head>
    <title>Online Quiz - Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" />
  </head>
    <div class="main-wrapper">
      <h1 class="title">Sign up</h1>
      <div class="signup-form">
        <form action="inc/signup.inc.php" method = "post" class="login">
          <ul>
            <li><input type="text" name="username" placeholder="Username" /></li>
            <li><input type="password" name="pw" placeholder="Password" /></li>
            <li><input type="password" name="pw-repeat" placeholder="Repeat Password" /><li>
            <li><button type="submit" name="signup-submit">Sign Up</button></li>
          </ul>
        </form>
      </div>

    </div>
</html>
