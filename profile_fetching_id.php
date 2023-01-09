<?php

if(isset($_GET["id"])){
    $id = $_GET["id"];

    // $host="localhost";
    // $user="root";
    // $password="";
    // $db="digitalcardworld";


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
    $phone = $user["phone"];
    $website = $user["website"];
    $theme_css = $user["theme_name"];

    // $card_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$id."&theme=".$theme_css;
    
    $card_link = 'http://'.$_SERVER['HTTP_HOST']."/DW/card.php?id=".$id; 
    
    // echo "<a href=".$card_link.">hello</a>";
    $query = "UPDATE profile SET card_link='$card_link' WHERE id=$id";
    mysqli_query($db, $query);


    /* */
    $query_dashboard = "SELECT * FROM dashboard WHERE id='$id' ";
    $result_dashboard = mysqli_query($db, $query_dashboard);
    $data_dashboard = mysqli_fetch_assoc($result_dashboard);


    $facebook_link = $data_dashboard["facebook"];
    $instagram_link = $data_dashboard["instagram"];
    $whatsapp_link = $data_dashboard["whatsapp"];
    $linkedin_link = $data_dashboard["linkedin"];
    $mail_link = $data_dashboard["mail"];
    $twitter_link = $data_dashboard["twitter"];
    $youtube_link = $data_dashboard["youtube"];
    $phone_link = $data_dashboard["phone"];
    $website_link = $data_dashboard["website"];

    
    if(isset($_POST["facebook"])){
    $facebook_link += 1;
    $sql = "UPDATE dashboard SET facebook = $facebook_link where id = $id";
    mysqli_query($db, $sql);
    header("location:$facebook");
    }

    if(isset($_POST["instagram"])){
        $instagram_link += 1;
        $sql = "UPDATE dashboard SET instagram = $instagram_link where id = $id";
        mysqli_query($db, $sql);
        header("location:$instagram");
    }

    if(isset($_POST["whatsapp"])){
        $whatsapp_link += 1;
        $sql = "UPDATE dashboard SET whatsapp = $whatsapp_link where id = $id";
        mysqli_query($db, $sql);
        header("location:https://api.whatsapp.com/send?phone=$whatsapp");
    }

    if(isset($_POST["linkedin"])){
        $linkedin_link += 1;
        $sql = "UPDATE dashboard SET linkedin = $linkedin_link where id = $id";
        mysqli_query($db, $sql);
        header("location:$linkedin");
    }

    if(isset($_POST["mail"])){
        $mail_link += 1;
        $sql = "UPDATE dashboard SET mail = $mail_link where id = $id";
        mysqli_query($db, $sql);
        header("location:mailto:$mail");
    }

    if(isset($_POST["twitter"])){
        $twitter_link += 1;
        $sql = "UPDATE dashboard SET twitter = $twitter_link where id = $id";
        mysqli_query($db, $sql);
        header("location:$twitter");
    }    

    if(isset($_POST["youtube"])){
        $youtube_link += 1;
        $sql = "UPDATE dashboard SET youtube = $youtube_link where id = $id";
        mysqli_query($db, $sql);
        header("location:$youtube");
    }
    
    if(isset($_POST["phone"])){
        $phone_link += 1;
        $sql = "UPDATE dashboard SET phone = $phone_link where id = $id";
        mysqli_query($db, $sql);
        header("location:tel:$phone");
    }
    if(isset($_POST["website"])){
        $webiste_link += 1;
        $sql = "UPDATE dashboard SET website = $webiste_link where id = $id";
        mysqli_query($db, $sql);
        header("location:$website");
    }


}
else{
    echo "close";
}




?>