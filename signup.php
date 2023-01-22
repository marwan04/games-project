<?php
@include 'conn.php';

if(isset($_POST['submit'])){

   $firstName = $_POST['firstName'];
   $lastName = $_POST['lastName'];
   $email =  $_POST['email'];
   $pass1 = ($_POST['password']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $uppercase = preg_match('@[A-Z]@', $pass1);
   $lowercase = preg_match('@[a-z]@', $pass1);
   $number    = preg_match('@[0-9]@', $pass1);
   $specialChars = preg_match('@[^\w]@', $pass1);

   $select = " SELECT * FROM users WHERE email = '$email'";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }
      elseif(strlen($pass1) < 8 ){
         $error[] = 'password must be 8 character at least';
      }
      elseif(!$uppercase || !$lowercase || !$number || !$specialChars ){
         $error[] = 'password must be include upper case , lower case , numbers and special characters';
      }
      else{
         $insert = "INSERT INTO users(first_name , last_name , email, password) VALUES('$firstName','$lastName','$email','$pass')";
         mysqli_query($conn, $insert);
         header('location:log.php');
      }
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
      <h1>Sign up</h1>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="form-group">
        <label for="firstName">First name:</label>
        <input type="text" id="firstName" name="firstName" required>
        <label for="lastName">Last name:</label>
        <input type="text" id="lastName" name="lastName" required>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="cpassword">Confirm Password:</label>
        <input type="password" id="cpassword" name="cpassword" required>
      </div>
      <p id="password-strength-status"></p>
      <input type="submit" value="Login" name="submit">
    </form>      
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script  src="login.js"></script>

</body>
</html>