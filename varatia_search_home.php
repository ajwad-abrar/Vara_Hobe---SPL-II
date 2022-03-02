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
        <link rel="stylesheet" href="css/varatia_style.css">
        <link rel="stylesheet" href="css/varatia_search_flat.css">

        <script src="https://kit.fontawesome.com/22fda2a086.js" crossorigin="anonymous"></script>

        <title>Varatia Search Home</title>
    </head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header__toggle">
                <i class='bx bx-menu' id="header-toggle"></i>
            </div>

            <div class="header__img">
                <img src="img/demo.jpg" alt="">
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
                        
                        <a href="varatia_search_home.php" class="nav__link active">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Search Home</span>
                        </a>

                        <a href="varatia_my_home.php" class="nav__link">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Home</span>
                        </a>
<!-- 
                        <a href="varatia_review.php" class="nav__link">
                            <i class='bx bxs-star-half nav__icon' ></i>
                            <span class="nav__name">Review</span>
                        </a> -->


                        <a href="varatia_chat.php" class="nav__link">
                            <i class='bx bxs-message-rounded-dots nav__icon' ></i>
                            <span class="nav__name">Chat</span>
                        </a>


                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Analytics</span>
                        </a>  -->

                    </div>
                </div>

                <a href="varatia_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>



        <div id="search_flat">
            <h1 class="text-center">Find your desired flat </h1>
        </div>


        <form action="" method="post">

            <div class="container text-center">

                <div class="row">

                    <div class="col">
                        <h4 class="text-center">City</h4>  

                        <select class="form-select form-select-md mb-3" name="city" id="city">
                            <option value="" selected="selected">Select city</option>
                        </select>
                    </div>

                    <div class="col">

                        <h4 class="text-center">Location</h4>
                        <select class="form-select form-select-md mb-3"  name="location" id="location">
                            <option value="" selected="selected">Please select city first</option>
                        </select>

                    </div>

                    <div class="col">

                        <h4 class="text-center">Sector/ Block</h4>
                        <select class="form-select form-select-md mb-3"  name="sector" id="sector">
                            <option value="" selected="selected">Please select location first</option>
                        </select>
                    </div>


                    <div class="w-100" id="part-2"></div> 
                    <div class="col">
                        <h4 class="text-center">Beds</h4>
                        <select class="form-select form-select-md mb-3"  id="bed" name="bed">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col">
                        <h4 class="text-center">Baths</h4>
                        <select class="form-select form-select-md mb-3"  id="bath" name="bath">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="col">
                        <h4 class="text-center">Price Range</h4>
                        <select class="form-select form-select-md mb-3"  id="bath" name="bath">
                            <option value="1">0 - 5000</option>
                            <option value="2">5001 - 10000</option>
                            <option value="3">10001 - 15000</option>
                            <option value="4">15001 - 20000</option>
                            <option value="5">20001 - 25000</option>
                        </select>
                    </div>

                </div>

            </div>


            <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>
            

        </form>





        <!--=====  JS =====-->
        <script src="js/varatia_js.js"></script>
        <script src="js/city-list.js"></script>


    </body>
</html>