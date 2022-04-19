<!-- Admin PROFILE -->
<?php
	session_start();

	$flag = 0;

	include('varatia_photo.php');

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
        <link rel="stylesheet" href="css/admin_profile_style.css">

        <title>Admin Profile</title>
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
                        <a href="admin_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="admin_profile.php" class="nav__link active">
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

       

        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-8 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25"> <img src="<?php echo $imagePath ?>" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600"><?php showName() ?></h6>
                                        <p>Admin</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?php showEmail() ?></h6>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400">01984567679</h6>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">NID</p>
                                                <h6 class="text-muted f-w-400"><?php showNID() ?></h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                <h6 class="text-muted f-w-400"><?php showGender() ?></h6>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">NID</p>
                                                <h6 class="text-muted f-w-400"><?php showNID() ?></h6>
                                            </div> -->
                                        </div>
                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Update Profile</h6>
                                        <div class="row">
                                            <form action="admin_profile.php" class="m-2 p-3 border border-warning" method="POST" enctype="multipart/form-data">

                                                <div class="mb-3">

                                                    <label class="form-label label-style" for="customFile">Upload Your Profile Picture</label> <br>
                                                    <input type="file" accept="image/*" name="profile_pic" class="form-control" id="customFile" required> <br>
                                                    
                                                </div>

                                                <button class="btn btn-info" name="update_profile" value="up_profile">Submit</button>

                                            </form> 
                                        </div>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        



        <?php

            function showName(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select name from admin where email= '$email'";


                $result = mysqli_query($con, $reg);

                echo "<br>";

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['name']}";
                }
            }

            function showEmail(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select email from admin where email= '$email'";

                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['email']}";
                }
            }

            function showNID(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select nid from admin where email= '$email'";

                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['nid']}";
                }
            }


            function showGender(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select gender from admin where email= '$email'";

                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['gender']}";
                }
            }


        ?>

        
        <!--=====  JS =====-->
        <script src="js/admin_js.js"></script>
    </body>
</html>