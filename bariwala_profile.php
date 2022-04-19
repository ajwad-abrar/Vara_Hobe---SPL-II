<?php
    session_start();
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
        <link rel="stylesheet" href="css/bariwala_style.css">
        <link rel="stylesheet" href="css/bariwala_profile_style.css">

        <title>Bariwala Profile</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="img/bariwala_profile_pic.png" alt="">
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
                        <a href="bariwala_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="bariwala_profile.php" class="nav__link active">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>

                        <a href="bariwala_add_flat.php" class="nav__link">
                            <i class='bx bxs-folder-plus nav__icon' ></i>
                            <span class="nav__name">Add Flat</span>
                        </a>
                        
                        <a href="bariwala_flat_info.php" class="nav__link">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Flat</span>
                        </a>

                        <a href="bariwala_flat_request.php" class="nav__link">
                            <i class='bx bxs-send nav__icon' ></i>
                            <span class="nav__name">Request</span>
                        </a>

                    </div>
                </div>

                <a href="#" class="nav__link">
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
                                        <div class="m-b-25"> <img src="img/varatia_profile_pic.png" class="img-radius" alt="User-Profile-Image"> </div>
                                        <h6 class="f-w-600"><?php showName() ?></h6>
                                        <p>Bariwala</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
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
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">NID</p>
                                                <h6 class="text-muted f-w-400"><?php showNID() ?></h6>
                                            </div>
                                        </div>
                                        <!-- <div class="row">
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">Gender</p>
                                                <h6 class="text-muted f-w-400">Male</h6>
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-10 f-w-600">NID</p>
                                                <h6 class="text-muted f-w-400">1212121212</h6>
                                            </div>
                                        </div> -->

                                        <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
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

                $reg=" select name from bariwala where email= '$email'";


                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['name']}";
                }
            }

            function showEmail(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select email from bariwala where email= '$email'";

                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['email']}";
                }
            }

            function showNID(){

                $con =mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


                $email = $_SESSION['email'];

                $reg=" select nid from bariwala where email= '$email'";

                $result = mysqli_query($con, $reg);

                while($row = mysqli_fetch_assoc($result)){
                    echo "{$row['nid']}";
                }
            }

        ?>





        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>
    </body>
</html>