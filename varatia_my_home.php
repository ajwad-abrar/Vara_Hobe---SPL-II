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
                        
                        <a href="varatia_search_home.php" class="nav__link">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Search Home</span>
                        </a>

                        
                        <a href="varatia_my_home.php" class="nav__link active">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Home</span>
                        </a>

                        <a href="varatia_review.php" class="nav__link">
                            <i class='bx bxs-star-half nav__icon' ></i>
                            <span class="nav__name">Review</span>
                        </a>


                        <!-- <a href="#" class="nav__link">
                            <i class='bx bx-bar-chart-alt-2 nav__icon' ></i>
                            <span class="nav__name">Analytics</span>
                        </a>  -->


                    </div>
                </div>

                <a href="#" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       



        <div class="container h-100">
    	    <div class="row align-items-center h-100">
                <div class="col-10 mx-auto">
                    <div class="card h-100 justify-content-center">
                        <div style=" padding: 5%;" class="text-center">
                        <img src="img/main_bg_img.jpg" style="height: 250px; width: 220px;margin:0 auto; border-radius: 50%; padding-bottom: 20px" alt="">
                        
                        <h5 class="card-title text-center" style="color:dodgerblue; font-size: 28px; font-weight: 800; margin-bottom: -5px;">Home Profile <br> <br></h5>
                        
                        <div class="profile_text" style="padding-left: 20%;">
                                <h4 class="text-start"> <b>ID: </b>190042106</h4>
                                <h4 class="text-start"> <b>City: </b>Dhaka</h4>
                                <h4 class="text-start"> <b>Area: </b>Gulshan</h4>
                                <h4 class="text-start"> <b>Size: </b>1200 sqft</h4>
                                <h4 class="text-start"> <b>Floor Level: </b>10</h4>
                                <h4 class="text-start"> <b>Bed: </b>4</h4>
                                <h4 class="text-start"> <b>Bath: </b>2</h4>
                                <h4 class="text-start"> <b>Rent: </b>12000/- BDT</h4>
                        </div>
                        

                        </div>
                    </div>
        	    </div>
    	    </div> 
	    </div>


    
        
        
        <!--=====  JS =====-->
        <script src="js/varatia_js.js"></script>
    </body>
</html>