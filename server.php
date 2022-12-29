<?php


$host="localhost";
$user="root";
$password="";
$db="digitalcardworld";


$db = new mysqli($host,$user,$password,$db);


// initializing variables
$username = "";
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
          $_SESSION['email'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: digital_card_profile.php');
        }else {
            array_push($errors, "Wrong username/password combination");
            array_push($errors,$query);
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
              VALUES('$email', '$password', '$first', '$last','$phone','$gender')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header('location: digital_card_profile.php');
}
 
}
  

?>