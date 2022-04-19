<?php
session_start();


// Profile pic part starts

    $flag = 0;

    include('bariwala_photo.php');

    function getImagePath(){

        $con = mysqli_connect('localhost', 'root','190042106', 'vara_hobe');


        $email = $_SESSION['email'];

        $reg = "select img_path from bariwala where email= '$email'";

        $result = mysqli_query($con, $reg);

        while($row = mysqli_fetch_assoc($result)){

            if($row['img_path'] == ""){
                return "bariwala_profile_picture/bariwala_default.jpg";
            }
            
            return "{$row['img_path']}";
        }

    }

    $imagePath = getImagePath();


// Profile pic part ends

    $con =mysqli_connect('localhost', 'root', '190042106');

    mysqli_select_db($con, 'vara_hobe');
    $email = $_SESSION['email'];
    $reg = " select nid from bariwala where email= '$email'";
    $result = mysqli_query($con, $reg);


    while($row = mysqli_fetch_assoc($result)){
        $bariwala_nid = $row['nid'];
    }

//echo $result;

if(isset($_POST['submit'])){

    $city=mysqli_real_escape_string($con,$_POST['city']);
    $location=mysqli_real_escape_string($con, $_POST['location']);
    $block=mysqli_real_escape_string($con, $_POST['block']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $building_no =mysqli_real_escape_string($con, $_POST['building']);
    $floor =mysqli_real_escape_string($con, $_POST['floor']);
    $apartment_no=mysqli_real_escape_string($con, $_POST['apartment']);
    $bed=mysqli_real_escape_string($con,$_POST['bed']);
    $bath =mysqli_real_escape_string($con, $_POST['bath']);
    $price =mysqli_real_escape_string($con, $_POST['price']);
    $size=mysqli_real_escape_string($con, $_POST['size']);
    $advance_payment=mysqli_real_escape_string($con,$_POST['advance']);
    // $parking =mysqli_real_escape_string($con, $_POST['parking']);
    // $gas =mysqli_real_escape_string($con, $_POST['gas']);
    // $generator =mysqli_real_escape_string($con, $_POST['generator']);
    // $lift =mysqli_real_escape_string($con, $_POST['lift']);
    // $cctv =mysqli_real_escape_string($con, $_POST['cctv']);
    // $fire_protection =mysqli_real_escape_string($con, $_POST['fire']);

    $file_tmp = $_FILES["flat_pic"]["tmp_name"];
    $file_name = $_FILES["flat_pic"]["name"];

    //image directory where actual image will be store
    $file_path = "flat_picture/".$file_name;	
	

    $additional_facilities=$_POST['add'];
    $chk ="";

     foreach( $additional_facilities as $chk1){
         $chk .= $chk1." ";
     }

  
        //   $sql="INSERT INTO `flats` (`id`, `city`, `location`, `block`, `address`, `building_no`, `floor`, `apartment_no`,`bedroom`,`bathroom`,`price`,`size`,`advance_payment`,`parking`,`gas`,`generator`,`lift`,`cctv`,`fire_protection`)
        //   VALUES (NULL, '$city','$location', '$block', '$address', '$building_no', '$floor', '$apartment_no','$bed','$bath','$price','$size','$advance_payment','yes','yes','yes','yes','yes','yes');";
  
    $sql="INSERT INTO `flats` (`id`, `bariwala_nid`, `img_path`, `city`, `location`, `block`, `address`, `building_no`, `floor`, `apartment_no`,`bedroom`,`bathroom`,`price`,`size`,`advance_payment`,`additional_facilities`)
    VALUES (NULL, '$bariwala_nid', '$file_path', '$city',  '$location', '$block', '$address', '$building_no', '$floor', '$apartment_no','$bed','$bath','$price','$size','$advance_payment','$chk');";

  
    if(mysqli_query($con, $sql)){
        
        header('Location: bariwala_add_flat.php');
    }
    else{
        echo'query error'.mysqli_error($con);
    }

    move_uploaded_file($file_tmp, $file_path);
          
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

                        <a href="bariwala_flat_request.php" class="nav__link">
                            <i class='bx bxs-send nav__icon' ></i>
                            <span class="nav__name">Request</span>
                        </a>


                    </div>
                </div>

                <a href="bariwala_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       

        <div id="search_flat">
            <h1 class="text-center"> Add your flat details</h1>
        </div>


        <form action="bariwala_add_flat.php" method="post" enctype="multipart/form-data">

            <div class="container text-center">

                <div class="row">

                    <div class="col">
                        <h4 class="text-center">City</h4>  

                        <select class="form-select form-select-md mb-3" name="city" id="city" required>
                            <option value="" selected="selected">Select city</option>
                        </select>
                    </div>

                    <div class="col">

                        <h4 class="text-center">Location</h4>
                        <select class="form-select form-select-md mb-3"  name="location" id="location" required>
                            <option value="" selected="selected">Please select city first</option>
                        </select>

                    </div>

                    <div class="col">
                        <h4 class="text-center">Sector/ Block</h4>
                        <select class="form-select form-select-md mb-3"  name="block" id="sector" required>
                            <option value="" selected="selected">Please select location first</option>
                        </select>
                    </div>


                </div>


                <div class="row" id="part-2">

                    <div class="col">
                        <h4 class="text-center">Address</h4>
                        <input class="form-control" type="text" id="address" name="address" required>
                    </div>

                    <div class="col">

                        <h4 class="text-center">Building No</h4>
                        <input class="form-control" type="text" id="building" name="building" required>

                    </div>

                    <div class="col">
                        <h4 class="text-center">Floor</h4>
                        <select class="form-select form-select-md mb-3"  id="floor" name="floor" required>
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

                



                <div class="row" id="part-2">

                    <div class="col">
                            <h4 class="text-center">Apartment No</h4>
                            <input class="form-control" type="text" id="apartment" name="apartment" required>
                    </div>

                    <div class="col">
                        <h4 class="text-center">Beds</h4>
                        <select class="form-select form-select-md mb-3"  id="bed" name="bed" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="col">
                        <h4 class="text-center">Baths</h4>
                        <select class="form-select form-select-md mb-3"  id="bath" name="bath" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>

                </div>

                <div class="row" id="part-3">

                    <div class="col">
                        <h4 class="text-center">Price</h4>
                        <input class="form-control" type="number" id="price" name="price" min="1" max="25000" required>
                    </div>

                    <div class="col">
                        <h4 class="text-center">Size(sqft)</h4>
                        <input class="form-control" type="number" id="size" name="size" min="100" max="4000" required>
                    </div>
                    <div class="col">
                        <h4 class="text-center">Advance Payment(Month)</h4>
                        <select class="form-select form-select-md mb-3"  id="advance" name="advance" required>
                            <option value="no-advance">No Advance</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="2">3</option>
                        </select>   
                    </div>

                </div>


                <div class="row" id="part-3">

                    <label class="form-label label-style" for="customFile"> <h4> <b> Upload Your Flat Picture </b> </h4> </label> <br>
                    <input type="file" accept="image/*" name="flat_pic" class="form-control" id="customFile" required> <br>

                </div>





                <h1 class="text-center" id="additional_info" > Additional Facilities: </h1>

                <div class="row additional-info-font" id="part-4">
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="Parking">
                        <label class="form-check-label" for="check2">Parking</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="Gas connection">
                        <label class="form-check-label" for="check2">Gas connection</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="Generator" >
                        <label class="form-check-label" for="check2">Generator</label>  
                    </div>
                </div>


                <div class="row additional-info-font" id="part-5">
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="Lift">
                        <label class="form-check-label" for="check2">Lift</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="CCTV">
                        <label class="form-check-label" for="check2">CCTV</label>  
                    </div>
                    <div class="col">
                        <input type="checkbox" class="form-check-input" id="check2" name="add[]" value="Fire Protection">
                        <label class="form-check-label" for="check2">Fire Protection</label>  
                    </div>
                </div>


            </div>





            <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" value="submit_flat_info" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>
            

        </form>  
        
        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>
        <script src="js/city-list.js"></script>

        <script>
       function requestSubmission(){
       alert('Request Submitted');

      }
      </script>
  

    </body>
</html>