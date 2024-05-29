<?php
if(isset($_POST['submit'])){
  include "connection.php";
  $username = mysqli_real_escape_string($conn, $_POST['user']);
  $password = mysqli_real_escape_string($conn, $_POST['pass']);

  $sql = "select * from user where username = '$username' or email ='$username'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if($row){
    if(password_verify($password, $row["password"])){
      header("Location: welcome.html");
    }
  }
 else{
  echo '<script>
          alert("Invalid username/email or password!!");
          window.location.href ="login.php"
        </script>';
 }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ANIME WEEB</title>
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
  <?php
include "navbar.php"
?>


     <div class="wrappers">
     <div class="form-box login">
      <h2>Log in</h2>
         <form name="form" action="login.php" method="POST">
    <div class="input-boxs">
    <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="user" id="user" name="user" required>
        <label>Enter Username/Email</label>
    </div>

    <div class="input-boxs">
    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" id="pass" name="pass" required>
        <label>Enter Password</label>
    </div>

    <div class="remember-forgots">
                <label><input type="checkbox">
                    Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>

    <div class="login-registers">
        <p>Don't have an account?<a href="signup.php" class="register-link">Sign up</a></p>
    </div>

        <button class="butts" type="submit" id="btn" value="Login" name="submit">Log in</button>
    </form>
  </div>

  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 
  </body>
</html>