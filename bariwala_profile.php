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
                        <a href="bariwala_home.php" class="nav__link">
                        <i class='bx bxs-home nav__icon' ></i>
                            <span class="nav__name">Home</span>
                        </a>

                        <a href="bariwala_profile.php" class="nav__link active">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>

                        <a href="bariwala_add_flat.php" class="nav__link">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Add Flat</span>
                        </a>
                        
                        <a href="bariwala_flat_info.php" class="nav__link">
                            <i class='bx bxs-home-heart nav__icon' ></i>
                            <span class="nav__name">My Flat</span>
                        </a>

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
					   <img src="img/pinku.jpg" style="height: 250px; width: 220px;margin:0 auto; border-radius: 50%; padding-bottom: 20px" alt="">
					
                       <h5 class="card-title text-center" style="color:dodgerblue; font-size: 28px; font-weight: 800; margin-bottom: -5px;">Bariwala Profile <br> <br></h5>
					   
                       <div class="profile_text" style="padding-left: 20%;">
                            <h4 class="text-start"> <b>Name: </b>Prianka Maheru</h4>
                            <h4 class="text-start"> <b>Gender: </b>Female</h4>
                            <h4 class="text-start"> <b>Mobile: </b>01984567679</h4>
                            <h4 class="text-start"> <b>NID: </b>102043556298</h4>
                       </div>
                       

                	</div>
            	</div>
        	</div>
    	</div> 
	</div>
        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>
    </body>
</html>