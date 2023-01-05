<?php include('database_connection.php') ?>
<?php

session_start();

// $host="localhost";
// $user="root";
// $password="";
// $db="digitalcardworld";


// $db = new mysqli($host,$user,$password,$db);


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
        $user = mysqli_fetch_assoc($results);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $user['id'];
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

    $query = "SELECT * FROM registration WHERE email='$email' ";
    $results = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($results);
    $id = $user["id"];
    

    $card_link = 'http://'.$_SERVER['HTTP_HOST']."/Mobile_Computing_Assignment_2/card.php?id=".$id;
    // $card_link = 'http://'.$_SERVER['HTTP_HOST']."/card.php?id=".$id ;

    $query = "INSERT INTO profile(id,card_link) VALUES('$id','$card_link')";
    mysqli_query($db, $query);


    $query = "INSERT INTO dashboard(id) VALUES('$id')";
    mysqli_query($db, $query);



    // $_SESSION['email'] = $email;
    // $_SESSION['success'] = "You are now logged in";
    header('location: index.php');
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
    
    $id = $_SESSION['id'];
    $img_upload_path = "";
    $cover_img_upload_path = "";
    $display_name = mysqli_real_escape_string($db, $_POST['display_name']);
    $job = mysqli_real_escape_string($db, $_POST['job']);
    $bio = mysqli_real_escape_string($db, $_POST['bio']);
    $facebook = mysqli_real_escape_string($db, $_POST['facebook']);
    $instagram = mysqli_real_escape_string($db, $_POST['instagram']);
    $whatsapp = mysqli_real_escape_string($db, $_POST['whatsapp']);
    $linkedin = mysqli_real_escape_string($db, $_POST['linkedin']);
    $mail = mysqli_real_escape_string($db, $_POST['mail']);
    $twitter = mysqli_real_escape_string($db, $_POST['twitter']);
    $youtube = mysqli_real_escape_string($db, $_POST['youtube']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $website = mysqli_real_escape_string($db, $_POST['website']);

	// echo "<pre>";
	// print_r($_FILES['display_picture']);
    // print_r($_FILES['display_cover']);
	// echo "</pre>";

	$img_name = $_FILES['display_picture']['name'];
	$img_size = $_FILES['display_picture']['size'];
	$tmp_name = $_FILES['display_picture']['tmp_name'];
	$error = $_FILES['display_picture']['error'];

    $cover_img_name = $_FILES['display_cover']['name'];
	$cover_img_size = $_FILES['display_cover']['size'];
	$cover_tmp_name = $_FILES['display_cover']['tmp_name'];
	$cover_error = $_FILES['display_cover']['error'];

	if ($error === 0) {
		if ($img_size > 1000000) {
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
        // array_push($errors, $em);
	}

    if ($cover_error === 0) {
		if ($cover_img_size > 1000000) {
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
        // array_push($errors, $em);
	}

    if($img_upload_path != ""){
        // echo $img_upload_path;
        // echo $cover_img_upload_path;
        // echo $display_name;
        // echo $job;
        // echo $bio;
        // echo $fb;
        // echo $instagram;
        // echo $linkedin;
        // echo $mail;
        // echo $twitter;
        // echo $youtube;
        // echo $phone;

        // Update into Database
		// $sql = "UPDATE profile SET
        // cover = '$cover_img_upload_path', dp = '$img_upload_path',
        // display_name = '$display_name', job = '$job', bio = '$bio', facebook = '$facebook', instagram = '$instagram', whatsapp = '$whatsapp', linkedin = '$linkedin',
        // gmail = '$mail', twitter = '$twitter', youtube = '$youtube', phone = '$phone', website = '$website' where id = '$id' ";

        $sql = "UPDATE profile SET dp = '$img_upload_path' where id = '$id' ";

        echo $sql;

        mysqli_query($db, $sql);
    }

    if($cover_img_upload_path != ""){
        $sql = "UPDATE profile SET cover = '$cover_img_upload_path' where id = '$id' ";
        // echo $sql;
        mysqli_query($db, $sql);
    }
    if($display_name != ""){
        $sql = "UPDATE profile SET display_name = '$display_name' where id = '$id' ";
        // echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET display_name = '' where id = '$id' ";
        // echo $sql;
        mysqli_query($db, $sql);
    }

    if($job != ""){
        $sql = "UPDATE profile SET job = '$job' where id = '$id' ";
        // echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET job = '' where id = '$id' ";
        // echo $sql;
        mysqli_query($db, $sql);
    }


    if($bio != ""){
        $sql = "UPDATE profile SET bio = '$bio' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET bio = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }


    if($facebook != ""){
        $sql = "UPDATE profile SET facebook = '$facebook' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET facebook = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($instagram != ""){
        $sql = "UPDATE profile SET instagram = '$instagram' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET instagram = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($whatsapp != ""){
        $sql = "UPDATE profile SET whatsapp = '$whatsapp' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET whatsapp = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    
    if($linkedin != ""){
        $sql = "UPDATE profile SET linkedin = '$linkedin' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET linkedin = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($mail != ""){
        $sql = "UPDATE profile SET gmail = '$mail' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET gmail = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($twitter != ""){
        $sql = "UPDATE profile SET twitter = '$twitter' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET twitter = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($youtube != ""){
        $sql = "UPDATE profile SET youtube = '$youtube' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET youtube = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($phone != ""){
        $sql = "UPDATE profile SET phone = '$phone' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET phone = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    if($website != ""){
        $sql = "UPDATE profile SET website = '$website' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }else{
        $sql = "UPDATE profile SET website = '' where id = '$id' ";
        echo $sql;
        mysqli_query($db, $sql);
    }
    
}


  

?>