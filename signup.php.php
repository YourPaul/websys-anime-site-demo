<?php
if(isset($_POST['submit'])){
  include "connection.php";
  $username = mysqli_real_escape_string($conn, $_POST['user']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['pass']);
  $cpassword = mysqli_real_escape_string($conn, $_POST['cpass']);

  $sql = "select * from user where username='$username'";
  $result = mysqli_query($conn,$sql);
  $count_user = mysqli_num_rows($result);

  $sql = "select * from user where email='$email'";
  $result = mysqli_query($conn,$sql);
  $count_user = mysqli_num_rows($result);

  if($count_user==0 || $count_email =0){
   if($password==$cpassword){
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $sql = "insert into user(username, email, password) values('$username','$email','$hash')";
   $result = mysqli_query($conn, $sql);
   }

  else{
    echo '<scipt>
    alert("Password do not match!!!");
    window.location.href = "signup.php";
    </script>';
  }

  }
  else{
    echo '<script>
    alert("User already exists!!!");
    window.location.href = "index.php";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

  </head>
  <body>
  <?php
  include "navbar.php"
  ?>

      <div class="wrapper">
      <div class="form-box register">
        <h2>Sign up</h2>
     <form name="form" action="signup.php" method="POST">

     <div class="input-box">
     <span class="icon"><ion-icon name="person"></ion-icon></span>
        <input type="text" id="user" name="user" required>
        <label>Enter Username</label>
    </div>

    <div class="input-box">
    <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <input type="email" id="email" name="email" required>
        <label>Enter Email</label>
    </div>

    <div class="input-box">
    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" id="pass" name="pass" required>
        <label>Enter Password</label>
    </div>

    <div class="input-box">
    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
        <input type="password" id="cpass" name="cpass" required>
        <label>Retry Password</label>
    </div>

         <div class="remember-forgot">
                <label><input type="checkbox">
                    I agree to the terms & conditions</label>
            </div>

        <button type="submit" id="btn" class="butts" value="Signup" name="submit">Signup</button>
    </form>

    <div class="login-register">
        <p>Already have an account?<a href="login.php" class="register-link">Log In</a></p>
    </div>

</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script> 

  </body>
</html>