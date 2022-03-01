<?php
session_start();



if(isset($_POST['submit'])){

    $hall_name=mysqli_real_escape_string($con,$_POST['hall_name']);
    $floor_number=mysqli_real_escape_string($con, $_POST['floor_number']);
    $room_number=mysqli_real_escape_string($con, $_POST['room_number']);
    
  
  
          $sql="INSERT INTO `room_request` (`request_ID`, `request_time`, `email`, `hall_name`, `level`, `room_no`, `provost_approval`, `provost_approval_time`)
          VALUES (NULL, current_timestamp(), '$email', '$hall_name', '$floor_number', '$room_number', '', NULL);";
  
  
            if(mysqli_query($con, $sql)){
              
              header('Location: student_room_request.php');
            }
            else{
              echo'query error'.mysqli_error($con);
            }
          
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
        <link rel="stylesheet" href="css/bariwala_style.css">
        <link rel="stylesheet" href="css/bariwala_add_flat.css">

        <title>Bariwala Add Flat</title>
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

                        <a href="bariwala_profile.php" class="nav__link">
                            <i class='bx bxs-user nav__icon' ></i>
                            <span class="nav__name">Profile</span>
                        </a>

                        <a href="bariwala_add_flat.php" class="nav__link active">
                            <i class='bx bxs-folder-plus nav__icon' ></i>
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

       

        <div id="search_flat">
            <h1 class="text-center"> Add your flat details</h1>
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
                </div>


                <div class="row" id="part-2">
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
                        <h4 class="text-center">Price</h4>
                        <input class="form-control" type="number" id="price" name="price" min="1" max="25000">
                    </div>
                </div>

                <div class="row" id="part-3">
                    <div class="col">
                        <h4 class="text-center">Size(sqft)</h4>
                        <input class="form-control" type="number" id="size" name="size" min="100" max="4000">
                    </div>
                    <div class="col">
                        <h4 class="text-center">Direction facing</h4>
                        <select class="form-select form-select-md mb-3"  id="bath" name="bath">
                            <option value="east">East</option>
                            <option value="west">West</option>
                            <option value="north">North</option>
                            <option value="south">South</option>
                        </select>   
                    </div>
                    <div class="col">
                        <h4 class="text-center">Floor</h4>
                        <select class="form-select form-select-md mb-3"  id="floor" name="floor">
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
                            <option value="4">4th</option>
                            <option value="4">5th</option>
                            <option value="4">6th</option>
                            <option value="4">7th</option>
                            <option value="4">8th</option>
                            <option value="4">9th</option>
                            <option value="4">10th</option>
                        </select>
                    </div>
                </div>


                <h1 class="text-center" id="additional_info"> Additional Info: </h1>

                <div class="row additional-info-font" id="part-4">
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Parking</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Gas connection</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Generator</label>  
                    </div>
                </div>


                <div class="row additional-info-font" id="part-5">
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Lift</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">CCTV</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="option2" value="something">
                        <label class="form-check-label" for="check2">Fire Protection</label>  
                    </div>
                </div>


            </div>





            <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>
            

        </form>
  

    
        
        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>
        <script src="js/city-list.js"></script>
    </body>
</html>