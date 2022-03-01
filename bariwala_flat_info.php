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

                        <a href="bariwala_add_flat.php" class="nav__link">
                            <i class='bx bxs-folder-plus nav__icon' ></i>
                            <span class="nav__name">Add Flat</span>
                        </a>
                        
                        <a href="bariwala_flat_info.php" class="nav__link active">
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



      <button class="btn btn-primary btn-rounded mb-4" data-toggle="modal" data-target="#modalContactForm">Create</button>

        
              <!--add apartment modal starts-->
              <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Write to us</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="form34" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form34">Your name</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="form29" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form29">Your email</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-tag prefix grey-text"></i>
          <input type="text" id="form32" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form32">Subject</label>
        </div>

        <div class="md-form">
          <i class="fas fa-pencil prefix grey-text"></i>
          <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
          <label data-error="wrong" data-success="right" for="form8">Your message</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>
  </div>
</div>



                <!--add apartment modal ends-->







       <div class="row">
           <div class="col">

                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/home.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Uttara sector-2 flat</h5>
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
            </div>
           <div class="col">
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
            </div>
           <div class="col">
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
            </div>
        </div>

        
        
        <!--=====  JS =====-->
        <script src="js/bariwala_js.js"></script>

    </body>
</html>