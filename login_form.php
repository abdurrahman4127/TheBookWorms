<?php
  include("includes/connection.php");
  include("includes/head.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css_files/login_form.css">
  <!-- typing effect for input field -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="javascript_code/login_form_typing_effect.js"></script>
  <!-- typing effect for input field -->
</head>
<body class="body_class">
  
  <div class="login-background">
    <div class="topmargin">
      <form action="login.php" method="POST">
        <br><br><br><br><br><br><br><br><br><br>

        <h2 class="sign">Sign </h2>
        <h2 class="in">In </h2>

        <p class="user">User </p>
        <p class="name">
          <!-- name: <input class="userbar" type="text" id="username"  -->
          name: <input class="userbar typing-effect" type="text" id="username" 
          placeholder="enter your username" name="username" required> <br><br>
        </p>

        <p class="pass">Pass </p>
        <p class="word"> 
          <!-- word: <input class="passwdbar" type="password" id="password"  -->
          word: <input class="passwdbar typing-effect" type="password" id="password" 
          placeholder="enter your password" name="password" required> <br><br>
        </p>

        <input class="loginbar" type="submit" name="submit" value="Log In">
      </form>

      <p class="dont">Don't have an account?</p>
      <a class="clickHere" href="create_account.php"> Click Here!</a>
    </div>
  </div>
</body>
</html>