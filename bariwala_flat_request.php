<?php
session_start();



global $bariwala_nid;

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

global $bariwala_nid, $accept_flag, $reject_flag;

while($row = mysqli_fetch_assoc($result1)){
    $bariwala_nid = $row['nid'];
}



 $sql = "select * from varatia_request_flat inner join flats where varatia_request_flat.flat_id= flats.id and flats.bariwala_nid = '$bariwala_nid' and varatia_request_flat.approved='No'";
 $result = mysqli_query($con, $sql);

 $requests = mysqli_fetch_all($result, MYSQLI_ASSOC);
 mysqli_free_result($result);



 if(isset($_POST['accept'])){

   $accepted_request_id= $_POST['accept'];

   $sql3 = "UPDATE varatia_request_flat  SET approved='Yes' WHERE request_id='$accepted_request_id'";
   $accept_query= mysqli_query($con,$sql3);

   if($accept_query){
       //echo "Success";
       $accept_flag = 1;
   }
   else{
       echo "error";
   }


   $sql4 ="select flat_id from varatia_request_flat where request_id='$accepted_request_id' ";
   $get_flat_id = mysqli_query($con,$sql4);

   while($row4=mysqli_fetch_assoc($get_flat_id)){
    $flat_id = $row4['flat_id'];
  }
  
   $sql5= "UPDATE flats SET flat_status='Filled' WHERE id='$flat_id'";
   $flat_query= mysqli_query($con, $sql5);


}



if(isset($_POST['reject'])){

    $rejected_request_id= $_POST['reject'];
   
  
   $sql6= "DELETE FROM varatia_request_flat WHERE request_id='$rejected_request_id'";
   $reject_query= mysqli_query($con,$sql6);

   if($reject_query){
       //echo "Success";
       $reject_flag = 1;
   }
   else{
       echo "error";
   } 


}



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

                    <a href="bariwala_flat_info.php" class="nav__link">
                        <i class='bx bxs-home-heart nav__icon'></i>
                        <span class="nav__name">My Flat</span>
                    </a>

                    <a href="bariwala_flat_request.php" class="nav__link active">
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



    <h1 class="text-center">The requests for your flats are: </h1>


    <div class="row">


        <?php foreach ($requests as $request) :  ?>

            <div class="col">

                <div class="card" style="width: 22rem;">
                   
                    <div class="card-body">
                        <h5 class="card-title text-center"> <b> Varatia Request </b> </h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> Request for flat: <?php echo htmlspecialchars($request['flat_id']); ?></li>
                        <li class="list-group-item"> Request from varatia having NID: <?php echo htmlspecialchars($request['varatia_nid']); ?></li>
                        <li class="list-group-item"> Request Time: <?php echo htmlspecialchars($request['request_time']); ?> </li>
                    </ul>

                  <form action="bariwala_flat_request.php" method="post">
                    <div class="card-body">
                        <button type="submit" class="btn btn-success" name="accept" value=" <?php echo htmlspecialchars($request['request_id']);?> ">Accept</button>
                        <button type="submit" class="btn btn-danger" name="reject"  value=" <?php echo htmlspecialchars($request['request_id']);?> ">Reject</button>
                    </div>
                   </form>

                </div>
            </div>

         <div>

           
         </div>


        <?php endforeach; ?>

            
    </div>


    <?php if($accept_flag == 1): ?>

        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                You have successfully accepted the request
            </div>
        </div>

        <?php $accept_flag = 0; ?>
    
    <?php endif; ?> 
    
    
    <?php if($reject_flag == 1): ?>

        <div class="alert alert-danger d-flex align-items-center" role="alert">
         <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>
            You have successfully rejected the request
            </div>
        </div>

        <?php $reject_flag = 0; ?>
    
    <?php endif; ?>   




    <!--=====  JS =====-->
    <script src="js/bariwala_js.js"></script>

</body>

</html>