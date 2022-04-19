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


global $sql, $check_flat,$requests, $varatia_nid;


if(isset($_POST['submit'])){

    $city=mysqli_real_escape_string($con,$_POST['city']);
    $location=mysqli_real_escape_string($con,$_POST['location']);
    $sector=mysqli_real_escape_string($con,$_POST['sector']);
    // $bed= mysqli_real_escape_string($con,$_POST['bed']);
    // $bath= mysqli_real_escape_string($con,$_POST['bath']);
    // $price= mysqli_real_escape_string($con,$_POST['price']);
    
   
    $sql=  "select * from flats where city='$city' and location='$location' and flat_status <>'Filled' order by price asc";


    $check_flat=mysqli_query($con,$sql );
     $requests= mysqli_fetch_all($check_flat,MYSQLI_ASSOC);
    
     mysqli_free_result($check_flat);
      

        // global $requests;   

}




if(isset($_POST['request_flat'])){

     $requested_flat_id= $_POST['request_flat'];
    
    $sql2=  "UPDATE flats  SET flat_status = 'Requested' WHERE id='$requested_flat_id'";
    $flat_request_query= mysqli_query($con,$sql2);

   if($flat_request_query){
    //    echo "success";
   }

   else{
       echo "error";
   }


    
    $sql3= "select nid from varatia where email='$email'";
    $varatia_nid_query= mysqli_query($con,$sql3);
    
      while($row2=mysqli_fetch_assoc($varatia_nid_query)){
        $varatia_nid = $row2['nid'];

      }




    $sql4= "insert into varatia_request_flat (varatia_nid, flat_id) values($varatia_nid,  $requested_flat_id)" ;
    $insert_request= mysqli_query($con, $sql4);


        if($insert_request){
            // echo $varatia_nid;
            // echo "request inserted";
        }

        else{
    
            echo "not inserted";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" >
        
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
                        
                        <a href="varatia_search_home.php" class="nav__link active">
                            <i class='bx bxs-search-alt-2 nav__icon' ></i>
                            <span class="nav__name">Search Home</span>
                        </a>

                        <a href="varatia_my_home.php" class="nav__link">
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



        <div id="search_flat">
            <h1 class="text-center">Find your desired flat </h1>
        </div>


        <form action="varatia_search_home.php" method="post">

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
                        <select class="form-select form-select-md mb-3"  name="sector" id="sector">
                            <option value="" selected="selected">Please select location first</option>
                        </select>
                    </div>


                    <!-- <div class="w-100" id="part-2"></div> 
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
                        <select class="form-select form-select-md mb-3"  id="price" name="price">
                            <option value="1">0 - 5000</option>
                            <option value="2">5001 - 10000</option>
                            <option value="3">10001 - 15000</option>
                            <option value="4">15001 - 20000</option>
                            <option value="5">20001 - 25000</option>
                        </select>
                    </div> -->

                </div>

            </div>


            <div class="text-center mt-5">
				<button onclick="requestSubmission()"  type="submit" name="submit" class="btn btn-success btn-lg" id="submit_button">Submit</button>
			</div>
            

        </form>

     <br><br><br><br>

    <?php foreach ((array) $requests as $request):  ?>

        <div class="card">
            <img class="card-img-top" src="<?php  echo htmlspecialchars($request['img_path']);?>" alt="Card image cap" >
            <div class="card-body">
                <h5 class="card-title" id="card-heading"><?php  echo htmlspecialchars($request['block']);?>, <?php  echo htmlspecialchars($request['location']);?>, <?php  echo htmlspecialchars($request['city']);?>  </h5>
                <p class="card-text"> <b> BDT <?php  echo htmlspecialchars($request['price']);?>/ MONTH </b></p>
            </div>
                
                <p class="p-2">
                    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" data-bs-target="#collapseExample">
                               Click to know more about the flat 
                    </a>
                    &nbsp;
                    <form action="varatia_search_home.php" method="post" class="m-2">
                    <button type="submit" class="btn btn-success" name="request_flat" value=" <?php echo htmlspecialchars($request['id']);?> " >  Request  </button>
                    </form>
                </p>
                <div class="collapse" id="collapseExample">
                <div class="card details">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Address: <?php  echo htmlspecialchars($request['address']);?>,  Building No. <?php  echo htmlspecialchars($request['building_no']);?>,  Level: <?php  echo htmlspecialchars($request['floor']);?></li> 
                        <li class="list-group-item"><?php  echo htmlspecialchars($request['size']);?> SQFT</li>
                        <li class="list-group-item"><?php  echo htmlspecialchars($request['bedroom']);?> BEDROOM</li>
                        <li class="list-group-item"><?php  echo htmlspecialchars($request['bathroom']);?> BATHROOM</li>
                        <li class="list-group-item">Additional Facilities: <?php  echo htmlspecialchars($request['additional_facilities']);?></li>
                    </ul>
                </div>
            </div>            
        </div>          <br><br><br><br>

    <?php endforeach; ?> 
          

            <br><br>

        <!--=====  JS =====-->
        <script src="js/varatia_js.js"></script>
        <script src="js/city-list.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
       

    </body>
</html>