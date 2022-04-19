<!-- Bariwala HOME -->
<?php
	session_start();

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

        <title>Bariwala Search Varatia</title>
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
                        <a href="bariwala_search_varatia.php" class="nav__link active">
                            <i class='bx bxs-search nav__icon' ></i>
                            <span class="nav__name">Varatia Search</span>
                        </a>


                    </div>
                </div>

                <a href="bariwala_logout.php" class="nav__link">
                    <i class='bx bx-log-out nav__icon' ></i>
                    <span class="nav__name">Log Out</span>
                </a>
            </nav>
        </div>

       




        <div class="tab-content">

            <div id="inbox" class="tab-pane active jumbotron"><p></p>

                <h1 class="text-center" style="color: orangered; margin-bottom: 50px;">Write down the varatia NID: </h1>



                <form action="bariwala_search_varatia.php" method="POST">

                    <div class="container">

                        <div class="row">
                            
                            <div class="col">

                            <input type="text" class="form-control" id="search_form" placeholder="Enter NID of the varatia: " name="varatia_nid">
                            </div>

                        </div>

                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-success btn-lg" id="submit_button" name="bariwala_search_varatia">Submit</button>
                        <br> <br>
                    </div>


                </form>

                <div class="card mx-auto" style="width: 28rem;" id="profile-card">

                <div class="card-body">
                    <h4 class="card-title text-center" style="color:dodgerblue; font-size: 26px; font-weight: 700;">Varatia Details</h4>
                    <h5 class="card-title" style="color: black;"><?php searchDetailsOfTheMovie(); ?></h5>

                </div>

                </div>         

            </div>          

        </div>


        <?php

            function searchDetailsOfTheMovie(){

                if(isset($_POST['bariwala_search_varatia'])) {

                $servername = "localhost";
                $username = "root";
                $password = "190042106";
                $dbname = "vara_hobe";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);


                $varatia_nid = $_POST['varatia_nid'];

                $sql1 = "SELECT * FROM varatia V WHERE V.nid = '$varatia_nid'";

                $result1 = mysqli_query($conn, $sql1);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                if (mysqli_query($conn, $sql1)) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result1)) {
                        echo "<b>Name: </b>" .$row['nid'] ." <br> <br>";
                        echo "<b>Email: </b>" .$row['email'] ." <br> <br>";
                        echo "<b>NID: </b>" .$row['nid'] ." <br> <br>";

                        // echo "<b> Reg Date: </b>" .date("d M, Y", strtotime($row['reg_date']))." ";   //Not needed rn
                    }
                } else {
                    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
                }


                mysqli_close($conn);

            }
            }    

        ?>


    
        
        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>
    </body>
</html>