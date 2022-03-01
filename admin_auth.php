<?php 

//sign in
session_start();

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'vara_hobe');

if(isset($_POST['login'])){

  
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['pwd']);
 
  $query1 = " select * from admin where email='$email' ";
  $result1 = mysqli_query($con, $query1);
  $numberOfRows1 = mysqli_num_rows($result1);
  
  $_SESSION['email'] = $email;
  
  if($numberOfRows1 == 1){
  
  while($row = mysqli_fetch_assoc($result1)) {
  
    // if(password_verify($password, $row['password'] )){

      if($row['password'] ==  $password){
        
        echo "success";
     
        $_SESSION['email'] = $email;
        header('location: admin_home.php');
        die;
     
    }

    else{

    echo '<script type ="text/JavaScript">';  
      echo 'alert("Wrong Password")';  
      echo '</script>';

    }
  }
    
  } 


}


?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/bariwala_auth_style.css" />
    <title>Admin Authentication</title>
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="admin_auth.php" class="sign-in-form"  method="post">
            <h2 class="title">Admin Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="pwd" placeholder="Password" />
            </div>
            <input type="submit" value="Login" name="login" class="btn solid" />
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Admin?</h3>
            <p>
              Only the authorised admin will be able to login using this web page.
            </p>
          </div>
         <a href="index.html" target="_blank"> <img src="img/log.svg" class="image" title="Click here to go back to home page" alt="" /> </a> 
        </div>
      </div>
    </div>

  </body>
</html>
