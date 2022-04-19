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



$con = mysqli_connect('localhost', 'root', '190042106', 'vara_hobe');

if (!$con) {
    echo 'connection error' . mysqli_connect_error();
}

$email = $_SESSION['email'];
$reg = " select nid from bariwala where email= '$email'";

$result1 = mysqli_query($con, $reg);


while($row = mysqli_fetch_assoc($result1)){
    $bariwala_nid = $row['nid'];
}

$sql = "SELECT *
FROM `flats` where bariwala_nid = $bariwala_nid";

$result = mysqli_query($con, $sql);

$requests = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="css/bariwala_style.css">

    <title>Bariwala Flat Info</title>
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
                        <i class='bx bxs-home nav__icon'></i>
                        <span class="nav__name">Home</span>
                    </a>

                    <a href="bariwala_profile.php" class="nav__link">
                        <i class='bx bxs-user nav__icon'></i>
                        <span class="nav__name">Profile</span>
                    </a>

                    <a href="bariwala_add_flat.php" class="nav__link">
                        <i class='bx bxs-folder-plus nav__icon'></i>
                        <span class="nav__name">Add Flat</span>
                    </a>

                    <a href="bariwala_flat_info.php" class="nav__link active">
                        <i class='bx bxs-home-heart nav__icon'></i>
                        <span class="nav__name">My Flat</span>
                    </a>

                    <a href="bariwala_flat_request.php" class="nav__link">
                            <i class='bx bxs-send nav__icon' ></i>
                            <span class="nav__name">Request</span>
                    </a>


                </div>
            </div>

            <a href="bariwala_logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>





    <div class="row">


        <?php foreach ($requests as $request) :  ?>

            <div class="col">

                <!-- <?php $a_id = $_SESSION['id'];
                        echo '$a_id';

                        ?> -->

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/home.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($request['location']); ?> ,<?php echo htmlspecialchars($request['block']); ?> flat</h5>
                        <p class="card-text"> BDT <?php echo htmlspecialchars($request['price']); ?> / MONTH </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo htmlspecialchars($request['size']); ?> SQFT</li>
                        <li class="list-group-item"><?php echo htmlspecialchars($request['bedroom']); ?> ROOM</li>
                        <li class="list-group-item"><?php echo htmlspecialchars($request['bathroom']); ?> BATHROOM</li>
                    </ul>
                    <div class="card-body">
                        <a href="bariwala_flat_details.php" class="card-link">Flat Details</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

        <!-- <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/home.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Banani flat</h5>
                        <p class="card-text"> BDT 180000 / MONTH </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">2700 SQFT</li>
                        <li class="list-group-item">3 ROOM</li>
                        <li class="list-group-item">4 BATHROOM</li>
                    </ul>
                    <div class="card-body">
                        <a href="bariwala_flat_details.php" class="card-link">Flat Details</a>
                    </div>
                </div>
            </div> -->
        <!-- <div class="col">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/home.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Gulshan-2 flat</h5>
                        <p class="card-text"> BDT 180000 / MONTH </p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">2700 SQFT</li>
                        <li class="list-group-item">3 ROOM</li>
                        <li class="list-group-item">4 BATHROOM</li>
                    </ul>
                    <div class="card-body">
                        <a href="bariwala_flat_details.php" class="card-link">Flat Details</a>
                    </div>
                </div>
            </div> -->
    </div>



    <!--=====  JS =====-->
    <script src="js/bariwala_js.js"></script>

</body>

</html>