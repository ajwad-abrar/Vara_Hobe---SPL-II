<?php
	session_start();

	$flag = 0;

	include('varatia_photo.php');

	function getImagePath(){

		$con = mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


		$email = $_SESSION['email'];

		$reg = "select img_path from varatia where email= '$email'";

		$result = mysqli_query($con, $reg);

		while($row = mysqli_fetch_assoc($result)){

			if($row['img_path'] == ""){
				return "varatia_profile_picture/varatia_default.jpg";
			}
			
			return "{$row['img_path']}";
		}

	}

	$imagePath = getImagePath();



    $con =mysqli_connect('localhost', 'root','190042106');

mysqli_select_db($con, 'vara_hobe');

    
     $email=$_SESSION['email'];

     $sql3= "select nid from varatia where email='$email'";
     $varatia_nid_query= mysqli_query($con,$sql3);
     
       while($row2=mysqli_fetch_assoc($varatia_nid_query)){
         $varatia_nid = $row2['nid'];
 
       }
 
        
       $varatia_request= "select * from varatia_request_flat where varatia_nid='$varatia_nid'";
       $varatia_request_query= mysqli_query($con,$varatia_request);

       while($row3=mysqli_fetch_assoc($varatia_request_query)){
           $varatia_request_approved= $row3['approved'];
       }

       if($varatia_request_approved= "No"){

           echo "Your request is pending";
           echo "hiii";
       }

       else {

              echo "byee";
            $flat_id = $row3['flat_id'];
            echo $flat_id;
       }

     





	

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
        <link rel="stylesheet" href="css/varatia_style.css">
        <link rel="stylesheet" href="css/varatia_my_home_style.css">

        <title>Varatia Home</title>
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
                        <a href="varatia_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="varatia_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>
                        
                        <a href="varatia_search_home.php" class="nav__link">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Search Home</span>
                        </a>

                        
                        <a href="varatia_my_home.php" class="nav__link active">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Home</span>
                        </a>

                        <a href="varatia_chat.php" class="nav__link">
                            <i class='bx bxs-message-rounded-dots nav__icon' ></i>
                            <span class="nav__name">Chat</span>
                        </a>


                    </div>
                </div>

                <a href="varatia_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       



        <!-- <h1 class="text-center">Flat Details</h1>  

        <img class="center" src="img/home.jpg" alt="" width="500px" height="350px"> -->

        <!-- <div class="container mt-3">
            <h2 class="text-center">Here are the details of the flat</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Price</th>
                    <th>24000/- BDT</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>City</td>
                    <td>Dhaka</td>
                </tr>
                <tr>
                    <td>Location</td>
                    <td>Uttara</td>
                </tr>
                <tr>
                    <td>Sector</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>Beds</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>Baths</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>Direction Facing</td>
                    <td>South</td>
                </tr>
                <tr>
                    <td>Floor</td>
                    <td>10th</td>
                </tr>
                <tr>
                    <td>Parking</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Gas Connection</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>Generator</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>Lift</td>
                    <td>Yes</td>
                </tr>
                <tr>
                    <td>CCTV</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td>Fire Protection</td>
                    <td>No</td>
                </tr>
                </tbody>
            </table>
        </div> -->


    
        
        
        <!--=====  JS =====-->
        <script src="js/varatia_js.js"></script>
    </body>
</html>