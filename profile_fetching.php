<?php include('database_connection.php') ?>
<?php

    // $host="localhost";
    // $user="root";
    // $password="";
    // $db="digitalcardworld";


    $email = $_SESSION['email'];
    $id = $_SESSION['id'];

    // $db = new mysqli($host,$user,$password,$db);


    $user_check_query = "SELECT * FROM profile WHERE id='$id' ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    $dp = $user["dp"];
    $cover = $user["cover"];
    $display_name = $user["display_name"];
    $job = $user["job"];
    $bio = $user["bio"];
    $facebook = $user["facebook"];
    $instagram = $user["instagram"];
    $whatsapp = $user["whatsapp"];
    $linkedin = $user["linkedin"];
    $mail = $user["gmail"];
    $twitter = $user["twitter"];
    $youtube = $user["youtube"];
    $website = $user["website"];
    $phone = $user["phone"];
    $card_link = $user["card_link"];
    

    // printf($job);

?>
