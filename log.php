<?php

@include 'conn.php';

session_start();

if(isset($_POST['submit'])){

   $email = $_POST['email'];
   $pass =md5($_POST['password']);

   $select = " SELECT * FROM users WHERE email = '$email' AND password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      $_SESSION['user_name'] = $row['first_name'];
      $_SESSION['user_email'] = $row['email'];
      header('location: main.php');
      exit();
     
   }
   else {
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="log.css">
    <title>Document</title>
</head>
<body>
  <div class="login-container">
    <form actuin="" method="post">
      <h1>Login</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <input type="submit" value="Login" name="submit">
      <br>
      <a href="signup.php">Don't have an account? Sign up.</a>
    </form>      
  </div>
  

</body>
</html>