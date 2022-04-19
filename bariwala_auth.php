
<?php

// sign up
// session_start();

if(isset($_SESSION['uid'])){
 header("Location: bariwala_home.php");

}
	$con =mysqli_connect('localhost', 'root','190042106');

	mysqli_select_db($con, 'vara_hobe');

  if(isset($_POST['register'])){
  
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $nid= mysqli_real_escape_string($con,$_POST['nid']); 
    $password = mysqli_real_escape_string($con,$_POST['pwd']);
    $cpassword= mysqli_real_escape_string($con,$_POST['cpwd']);
    // $verify_token= md5(rand());
        
   
    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
  
    $query1 = " select * from bariwala where email = '$email' ";
    $result1 = mysqli_query($con, $query1);
    $num1 = mysqli_num_rows($result1);


    if($num1 == 1){
  
  echo '<script type ="text/JavaScript">';  
  echo 'alert("Email already used")';  
  echo '</script>';
    
   header("Location: bariwala_auth.php");
    }
  
    else {
  
      if($cpassword == $password){

  
          $reg1 = " insert into bariwala(name, email, nid, password) 
          values('$name', '$email', '$nid', '$hashed_password')" ;
  
          $query_run= mysqli_query($con, $reg1);
          
           if($query_run){
            
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Registration Successful")';  
            echo '</script>'; 
            

           }
           else{

            echo '<script type ="text/JavaScript">';  
            echo 'alert("Registration Failed")';  
            echo '</script>';  
 
           }                
       }
  
  
       else{

      echo '<script type ="text/JavaScript">';  
      echo 'alert("Password does not macth")';  
      echo '</script>';

      header("Location: bariwala_auth.php");
     
        }    
    }  
  }

?>


<?php 

//sign in
session_start();

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'vara_hobe');

if(isset($_POST['login'])){

  
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['pwd']);
 
  $query1 = " select * from bariwala where email='$email' ";
  $result1 = mysqli_query($con, $query1);
  $numberOfRows1 = mysqli_num_rows($result1);
  
  $_SESSION['email'] = $email;
  
  if($numberOfRows1 == 1){
  
  while($row = mysqli_fetch_assoc($result1)) {
  
    if(password_verify($password, $row['password'] )){

     
        $_SESSION['email'] = $email;
        header('location: bariwala_home.php');
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
    <title>Bariwala Authentication</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="bariwala_auth.php" class="sign-in-form" method="post">
            <h2 class="title">Bariwala Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pwd" />
            </div>
            <input type="submit" value="Login" class="btn solid" name="login"/>
            <!-- <p class="social-text">Or Sign in with social platforms</p>
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
            </div> -->
          </form>
          <form action="bariwala_auth.php" class="sign-up-form" method="post">
            <h2 class="title">Bariwala Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Name" name="name" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="number" step="1" minlength="10" maxlength="10" placeholder="NID number" name="nid" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" minlength="8" placeholder="Password" name="pwd" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="cpwd" required/>
            </div>
            <input type="submit" class="btn" value="Sign up" name="register"/>
            <!-- <p class="social-text">Or Sign up with social platforms</p> -->
            <!-- <div class="social-media">
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
            </div> -->
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Register now as <b>Bariwala</b>  to avail all the offers available in this platform & enjoy browsing Vara Hobe
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
         <a href="index.php" target="_blank"> <img src="img/log.svg" class="image" title="Click here to go back to home page" alt="" /> </a> 
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Already registered? Then you can just sign in now & enjoy
              our website.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in 
            </button>
          </div>
          <a href="index.html" target="_blank"> <img src="img/register.svg" class="image" title="Click here to go back to  home page"alt="" /> </a> 
        </div>
      </div>
    </div>

    <script src="js/auth-transition.js"></script>
  </body>
</html>
