<!-- Bariwala PHOTO -->

<?php

	$host ="localhost";
	$uname = "root";
	$pwd = '190042106';
	$db_name = "vara_hobe";

	/*--- we created a variables to display the error message on design page ------*/
	$error = "";

	if (isset($_POST["bariwala_update_profile"]) == "b_up_profile") {

		$file_tmp = $_FILES["bariwala_profile_pic"]["tmp_name"];
		$file_name = $_FILES["bariwala_profile_pic"]["name"];
        $email = $_SESSION['email'];

		//image directory where actual image will be store
		$file_path = "bariwala_profile_picture/".$file_name;	

	/*-------- now insertion of image section has start -------------*/


        $result = mysqli_connect($host, $uname, $pwd) or die("Connection error: ". mysqli_error());
        mysqli_select_db($result, $db_name) or die("Could not Connect to Database: ". mysqli_error());
        mysqli_query($result,"UPDATE bariwala SET img_path = '$file_path' WHERE email = '$email'") or die ("image not inserted". mysqli_error());
        move_uploaded_file($file_tmp, $file_path);
        $error = "<p align=center>File ".$_FILES["bariwala_profile_pic"]["name"].""."<br />Image saved into Table.";
        
    }
	
?>