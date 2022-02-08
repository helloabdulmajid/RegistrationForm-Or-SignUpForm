
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
  
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'db.php';

    if(isset($_POST['submit']))
    {
         $username = mysqli_real_escape_string($con,$_POST['name']);
         $email= mysqli_real_escape_string($con,$_POST['email'] );     
        $phone= mysqli_real_escape_string($con,$_POST['phone']);
        $password= mysqli_real_escape_string($con,$_POST['password']); 
       $cpassword= mysqli_real_escape_string($con,$_POST['cpassword']) ; 
      

       $emailquery =" select * from registration where email='$email'";
       $query= mysqli_query($con,$emailquery);
       $emailcount = mysqli_num_rows($query);

       if($emailcount>0){
        echo "Email Already Exists"; 
       }
       else{
         if($password===$cpassword){
            $insertquery = "insert into registration (username,email,mobile,password,cpassword) values('$username','$email','$phone','$password','$cpassword') ";

            $iquery = mysqli_query($con, $insertquery);

            if($iquery){
              ?>
               <script>
                   alert("Insert Successfully");
               </script>
              <?php
          }
          
          else{
              ?>
              <script>
                  alert("Insert Fail");
              </script>
             <?php
          }
         }
         else{
           echo "Password Not Match";
         }

       }
       


    

    }
    ?>

  
    <div class="row">
        <div class="col-md-12">
          <form action="#" method="POST">
            <h1> Sign Up </h1>
            
            <fieldset>
              
              <legend><span class="number">1</span> Your Basic Info</legend>
            
              <label for="name">Name:</label>
              <input type="text" id="name" name="name">
            
              <label for="email">Email:</label>
              <input type="email" id="mail" name="email">

              <label for="phone">Phone:</label>
              <input type="number" id="phone" name="phone">
           
              <label for="password">Password:</label>
              <input type="password" id="password"       name="password">

              <label for="cpassword">Confirm Password:</label>
              <input type="password" id="cpassword"       name="cpassword">
            
             
            </fieldset>
            
           
            <button type="submit" name="submit">Sign Up</button>
            
           </form>
            </div>
          </div>
           
</body>
</html>
