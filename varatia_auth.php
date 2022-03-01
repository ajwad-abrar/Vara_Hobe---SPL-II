<?php

// sign up
session_start();

if(isset($_SESSION['uid'])){
 header("Location: varatia_home.php");

}

// use PHPMailer\PHPMailer\PHPMailer;
//     use PHPMailer\PHPMailer\SMTP;
//     use PHPMailer\PHPMailer\Exception;
 
//     //Load Composer's autoloader
//     require 'vendor/autoload.php';

// function sendemail_verify($name,$email,$verify_token){
//   $mail = new PHPMailer(true);
       
//   $mail->SMTPDebug = 3;//SMTP::DEBUG_SERVER;

//   //Send using SMTP
//   $mail->isSMTP();

//   //Set the SMTP server to send through
//   $mail->Host = 'smtp.gmail.com';

//   //Enable SMTP authentication
//   $mail->SMTPAuth = true;

//   //SMTP username
//   $mail->Username = 'maheruprianka28@gmail.com';

//   //SMTP password
//   $mail->Password = 'pr1@nk@1613';

//   //Enable TLS encryption;
//   // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//   $mail->SMTPSecure = "tls";

//   //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//   $mail->Port = 587;

//   //Recipients
//   $mail->setFrom('maheruprianka28@gmail.com', 'varahobe');

//   //Add a recipient
//   $mail->addAddress($email);

//   //Set email format to HTML
//   $mail->isHTML(true);


//   $mail->Subject = 'Email verification';
  

//   $mail->body = "<h2>registered</h2>
//   <a href='http://localhost/Vara_Hobe---SPL-II/verify.php?token=$verify_token'>click here</a>
//  ";
// ;
//   $mail->send();
//   // echo 'Message has been sent';    

//   if(!$mail->send()){
//     echo "error";
//   }
// }


	$con =mysqli_connect('localhost', 'root','190042106');

	mysqli_select_db($con, 'vara_hobe');

  if(isset($_POST['register'])){
  
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $nid= mysqli_real_escape_string($con,$_POST['nid']); 
    $password = mysqli_real_escape_string($con,$_POST['pwd']);
    $cpassword= mysqli_real_escape_string($con,$_POST['cpwd']);
    $verify_token= md5(rand());
        
   
    $hashed_password= password_hash($password, PASSWORD_DEFAULT);
  
    $query1 = " select * from varatia where email = '$email' ";
    $result1 = mysqli_query($con, $query1);
    $num1 = mysqli_num_rows($result1);


    if($num1 == 1){
  
  echo '<script type ="text/JavaScript">';  
  echo 'alert("Email already used")';  
  echo '</script>';
    
   header("Location: varatia_auth.php");
    }
  
    else {
  
      if($cpassword == $password){

  
          $reg1 = " insert into varatia(name, email, nid, password,verify_token) 
          values('$name', '$email', '$nid', '$hashed_password','$verify_token')" ;
  
          $query_run= mysqli_query($con, $reg1);
          
           if($query_run){
            
            // sendemail_verify("$name","$email","$verify_token");
          
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Registration Successful")';  
            echo '</script>'; 
            
            // $to= $email;
            // $subject= "Email Verification";
            // $message="<a href='http://localhost/Vara_Hobe---SPL-II/verify.php?verify_token=$verify_token'>Click here</a>";
            // $headers ="From: maheruprianka28@gmail.com \r\n";
            // $headers .= "MIME-Version: 1.0" . "\r\n";
            // $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


            // mail($to,$subject,$message,$headers);
          
           

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

      header("Location: varatia_auth.php");
     
        }    
    }  
  }

?>


<?php 

//sign in

$con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'vara_hobe');

if(isset($_POST['login'])){

  
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $password = mysqli_real_escape_string($con,$_POST['pwd']);
 
  $query1 = " select * from varatia where email='$email' ";
  $result1 = mysqli_query($con, $query1);
  $numberOfRows1 = mysqli_num_rows($result1);
  
  $_SESSION['email'] = $email;
  
  if($numberOfRows1 == 1){
  
  while($row = mysqli_fetch_assoc($result1)) {
  
    if(password_verify($password, $row['password'] )){

     
        $_SESSION['uid'] = $row['id'];
        header('location:varatia_home.php');
      
     
    }

    else{
    // echo  '<div class="alert alert-danger alert-dismissible text-center">
    //      Wrong Password
    //     <button type="button" class="close" data-dismiss="alert">&times;</button>
    //   </div>';

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
    <link rel="stylesheet" href="css/varatia_auth_style.css" />
    <title>Varatia Authentication</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
            <!-- <div class="alert">
              
            </div> -->
        <div class="signin-signup">
          <form action="varatia_auth.php" class="sign-in-form" method="post">
            <h2 class="title">Varatia Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="email"/>

            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pwd" />
            </div>
            <input type="submit" value="Sign In" class="btn solid" name="login" />
            
            <a href="password_reset.php" class="float-end text-blue" >Forgot your password?</a>
            
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


          <form action="varatia_auth.php" class="sign-up-form" method="post">
            <h2 class="title">Varatia Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="name"/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email"/>
            </div>
            <div class="input-field">
              <i class="fas fa-id-card"></i>
              <input type="number" step="1" placeholder="NID number" name="nid" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="pwd"/>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="cpwd" />
            </div>



            <input type="submit" class="btn" value="Sign Up" name="register" />



            <p class="social-text">Or Sign up with social platforms</p>
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
            <h3>New here ?</h3>
            <p>
              Register now as <b>Varatia</b>  to avail all the offers available in this platform & enjoy browsing Vara Hobe
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
         <a href="index.html" target="_blank"> <img src="img/log.svg" class="image" title="Click here to go back to home page" alt="" /> </a> 
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
