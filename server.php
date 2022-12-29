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
    
  


}
  

?>