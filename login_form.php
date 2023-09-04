<?php

$con=mysqli_connect('localhost','root','','samp1');

session_start();

if(isset($_POST['submit'])){

   $un =  $_POST['un'];
//        $email = mysqli_real_escape_string($con, $_POST['email']);
   $pwd = $_POST['pwd'];
//    $cpass = md5($_POST['cpassword']);
//    $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user WHERE username = '$un' && Password = '$pwd' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_assoc($result);
      
         header('location:admin.php');

      }else
      if($row['role'] == 'User'){

         $_SESSION['user_name'] = $row['Name'];
         header('location:user.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="un" required placeholder="enter your Username:">
      <input type="password" name="pwd" required placeholder="enter your password">
      <input type="submit" name="submit" value="login now" class="form-btn">
       <!-- <a href="forgetpass.php">Forgot password</a> -->
   </form>

</div>

</body>
</html>