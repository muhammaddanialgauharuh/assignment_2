<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="digitalcardworld";


$db = new mysqli($host,$user,$password,$db);


// initializing variables

$email    = "";
$errors = array(); 

// LOGIN USER
if(isset($_POST['sign'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['success'] = "You are now logged in";
          header('location: digital_card_profile.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }


// REGISTER USER
if (isset($_POST['registration'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_real_escape_string($db, $_POST['last']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($password_2)) { array_push($errors, "Confrim Password is required"); }
    if (empty($first)) { array_push($errors, "First Name is required"); }
    if (empty($last)) { array_push($errors, "Last Name is required"); }
    if (empty($phone)) { array_push($errors, "Phone No. is required"); }
    if (empty($gender)) { array_push($errors, "Gender is required"); }
    if ($password_1 != $password_2) {
      array_push($errors, "The two passwords do not match");
    }


    // first check the database to make sure  a user does not already exist with the same email
    $user_check_query = "SELECT * FROM registration WHERE email='$email' ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    if ($user) { // if user exists    
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }
      }

   // Finally, register user if there are no errors in the form
   if (count($errors) == 0) {

    $query = "INSERT INTO registration (email, password, first_name, last_name, phone_no, gender) 
              VALUES('$email', '$password_1', '$first', '$last','$phone','$gender')";
    mysqli_query($db, $query);

    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: digital_card_profile.php');
}
 
}


// forgot password
if (isset($_POST['forgot_password'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);    

    $user_check_query = "SELECT * FROM registration WHERE email='$email' ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    
    if ($user) { // if user exists    
        if ($user['email'] == $email) {
            $_SESSION['email'] = $email;
            $_SESSION['phone_no'] = $user['phone_no'];
            header('location: make_selection.php');
        }
    }
    else{
        array_push($errors, "Enter a Correct Email");
    }


}







// edit profile 


if (isset($_POST['save']) && isset($_FILES['display_picture']) && isset($_FILES['display_cover'])) {

    
    $img_upload_path = "";
    $cover_img_upload_path = "";

	echo "<pre>";
	print_r($_FILES['display_picture']);
    print_r($_FILES['display_cover']);
	echo "</pre>";

	$img_name = $_FILES['display_picture']['name'];
	$img_size = $_FILES['display_picture']['size'];
	$tmp_name = $_FILES['display_picture']['tmp_name'];
	$error = $_FILES['display_picture']['error'];

    $cover_img_name = $_FILES['display_cover']['name'];
	$cover_img_size = $_FILES['display_cover']['size'];
	$cover_tmp_name = $_FILES['display_cover']['tmp_name'];
	$cover_error = $_FILES['display_cover']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your Display Picture is too large.";
            array_push($errors, $em);
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

			}else {
				$em = "Display Picture : You can't upload files of this type";
                array_push($errors, $em);
			}
		}
	}else {
		$em = "unknown error occurred!";
        array_push($errors, $em);
	}

    if ($cover_error === 0) {
		if ($cover_img_size > 500000) {
			$em = "Sorry, your Display Cover is too large.";
            array_push($errors, $em);
		}else {
			$cover_img_ex = pathinfo($cover_img_name, PATHINFO_EXTENSION);
			$cover_img_ex_lc = strtolower($cover_img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($cover_img_ex_lc, $allowed_exs)) {
				$cover_new_img_name = uniqid("IMG-", true).'.'.$cover_img_ex_lc;
				$cover_img_upload_path = 'uploads/'.$cover_new_img_name;
				move_uploaded_file($cover_tmp_name, $cover_img_upload_path);

                // echo "<img src='$img_upload_path' alt = '$img_upload_path' />";
			}else {
				$em = "Display Cover : You can't upload files of this type";
                array_push($errors, $em);
			}
		}
	}else {
		$em = "unknown error occurred!";
        array_push($errors, $em);
	}

    if($img_upload_path != "" && $cover_img_upload_path != ""){
        echo $img_upload_path;
        echo $cover_img_upload_path;

    }

}


  

?>