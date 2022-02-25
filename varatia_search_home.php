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



        <h1 class="text-center">Find your home</h1>

        <form name="search_form" id="form1" action="/action_page.php">
            City: <select name="city" id="city">
                <option value="" selected="selected">Select city</option>
            </select>
            <br><br>
            Location: <select name="location" id="location">
                <option value="" selected="selected">Please select city first</option>
            </select>
            <br><br>
            Area: <select name="area" id="area">
                <option value="" selected="selected">Please select location first</option>
            </select>
            <br><br>

            <label for="bed">Bed:</label>
            <select id="bed" name="bed">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>

            <br> <br>

            <label for="bath">Baths:</label>
            <select id="bath" name="bath">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br><br>

            <label for="price">Price Range:</label>
            <select id="bath" name="bath">
                <option value="1">0 - 5000</option>
                <option value="2">5001 - 10000</option>
                <option value="3">10001 - 15000</option>
                <option value="4">15001 - 20000</option>
                <option value="5">20001 - 25000</option>
            </select>

            <br><br>
            <input type="submit" value="Submit">  

           

        </form>





        




        <!--=====  JS =====-->
        <script src="js/varatia_js.js"></script>


        <script>
            var citytObject = {
                "Dhaka": {
                    "Gulshan": ["Gulshan-1", "Gulshan-2", "Gulshan-3"],
                    "Banani": ["Banani-1", "Banani-2", "Banani-3", "Banani-4"],
                    "Uttara": ["Sector-1", "Sector-2", "Sector-3", "Sector-4"]    
                },
                "Chattogram": {
                    "Khulshi": ["South Khulshi", "North Khulshi"],
                    "Patenga": ["South Patenga", "North Patenga"]
                }
            }

            window.onload = function() {
                var subjectSel = document.getElementById("city");
                var topicSel = document.getElementById("location");
                var chapterSel = document.getElementById("area");
                for (var x in citytObject) {
                    subjectSel.options[subjectSel.options.length] = new Option(x, x);
                }
                subjectSel.onchange = function() {
                     //empty Chapters- and Topics- dropdowns
                    chapterSel.length = 1;
                    topicSel.length = 1;
                    //display correct values
                    for (var y in citytObject[this.value]) {
                    topicSel.options[topicSel.options.length] = new Option(y, y);
                    }
                }
                topicSel.onchange = function() {
                    //empty Chapters dropdown
                     chapterSel.length = 1;
                    //display correct values
                    var z = citytObject[subjectSel.value][this.value];
                    for (var i = 0; i < z.length; i++) {
                    chapterSel.options[chapterSel.options.length] = new Option(z[i], z[i]);
                    }
                }
            }
        </script>


    </body>
</html>