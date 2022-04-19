<?php
	session_start();

	$flag = 0;

	include('admin_photo.php');

	function getImagePath(){

		$con = mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


		$email = $_SESSION['email'];

		$reg = "select img_path from admin where email= '$email'";

		$result = mysqli_query($con, $reg);

		while($row = mysqli_fetch_assoc($result)){

			if($row['img_path'] == ""){
				return "profile_picture/admin_default.png";
			}
			
			return "{$row['img_path']}";
		}

	}

	$imagePath = getImagePath();
	

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="css/admin_style.css">
        <link rel="stylesheet" href="css/admin_home_style.css">

        <title>Admin Home</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="<?php echo $imagePath ?>" alt="">
            </div>
        </header>

        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav__logo">
                        <i class='bx bx-layer nav__logo-icon'></i>
                        <span class="nav__logo-name">Vara Hobe</span>
                    </a>

                    <div class="nav__list">
                        <a href="admin_home.php" class="nav__link active">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="admin_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>

                        <a href="admin_activity_log.php" class="nav__link">
                            <i class='bx bxs-search nav__icon' ></i>
                            <span class="nav__name">Activity Log</span>
                        </a>

                        <a href="admin_overall_info.php" class="nav__link">
                            <i class='bx bxs-receipt nav__icon' ></i>
                            <span class="nav__name">Overall Info</span>
                        </a>

                    </div>
                </div>

                <a href="admin_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

    
        

    <?php

        function showName(){

            $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


            $email = $_SESSION['email'];

            $reg= "select name from admin where email= '$email'";


            $result = mysqli_query($con, $reg);

            // echo "<br>";

            while($row = mysqli_fetch_assoc($result)){
                echo "{$row['name']}";
            }
        }
    ?>    



    <div id="welcome">  
        <h1 class="welcome_font"> 
        <?php

            echo "Welcome Back, ";

            showName();

            echo "<br><br><br>Happy " . date("l");

            ?>  
	    </h1>
    </div>


    
        
        
        <!--=====  JS =====-->
        <script src="js/admin_js.js"></script>
    </body>
</html>