<?php
include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login Page</title>
  
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-12">
          <form action="" method="post">
            <h1>Login</h1>
            
            <fieldset>

              <label for="email">Email:</label>
              <input type="email" id="mail" name="user_email">

              <label for="password">Password:</label>
              <input type="password" id="password"       name="user_password">

            </fieldset>
            
           
            <button type="submit" name="submit">Login</button>
            
           </form>
            </div>
          </div>
          <?php

          if(isset($_POST['submit']))
          {
          $email= mysqli_real_escape_string($con,$_POST['email'] );    
          $password= mysqli_real_escape_string($con,$_POST['password']); 
          
          $sql=" select * from registration where email='$email' AND password='$password'";
          
          $rs=  mysqli_query($con,$sql);
          if($d=mysqli_fetch_array($rs))

          {
      
            if($d)
            {
              echo "<script> confirm('Login Successful') </script>";
            }
            else{
              echo "<script> confirm('Login fail') </script>";
            }
          }

  

          }
          ?>
           
</body>
</html>