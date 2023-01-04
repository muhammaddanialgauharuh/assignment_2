<?php

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $host="localhost";
        $user="root";
        $password="";
        $db="digitalcardworld";


        $db = new mysqli($host,$user,$password,$db);

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
        $theme_css = $user["theme_name"];

        $card_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$id."&theme=".$theme_css; 
        
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


    }
    else{
        echo "close";
    }




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $theme_css ?>">

</head>
<body>

<body>


    <div class="container">
        
        <div class="card">
            <div class="cover"></div>
            <div class="dp"></div>
            <div class="bio">
                <h2><?php echo $display_name ?></h2>
                <p ><b><?php echo $job ?></b></p>
                <p style="font-size:small"><?php echo $bio ?></p>
            </div>
            
            <div class="contact">
                <center>
                    <div>
                    <form method="post">
                        <button name="facebook" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="<?php echo $facebook ?>" name="fb_link"><img src="asset/fb.png" width="50" height="50"/></a>
                        </button>
                        <button name="instagram" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="<?php echo $instagram ?>"><img src="asset/insta.png" width="50" height="50"/></a>
                        </button>
                        <button name="whatsapp" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>"><img src="asset/whatsapp.png" width="50" height="50"/></a>
                        </button>
                        <button name="linkedin" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="<?php echo $linkedin ?>"><img src="asset/linkedin.png" width="50" height="50"/></a>
                        </button>
                    </div>
                    <div>
                        <button name="mail" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="mailto:<?php echo $mail ?>"><img src="asset/gmail.png" width="50" height="50"/></a>
                        </button>
                        <button name="twitter" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="<?php echo $twitter ?>"><img src="asset/twitter.png" width="50" height="50"/></a>
                        </button>
                        <button name="youtube" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="<?php echo $youtube ?>"><img src="asset/youtube.png" width="50" height="50"/></a>
                        </button>
                        <button name="phone" style="background:transparent; border:none; width: 70px; padding:0px;">
                            <a href="tel:<?php echo $phone ?>"><img src="asset/phone.png" width="50" height="50"/></a>
                        </button>
                    </div>

                    <a href="vcf/Danial Gauhar.vcf" download><button type='button' style="width: 60%;"><b>Add to Contact</b></button></a>
                    </form>
                    <!-- <a href="vcf/Danial Gauhar.txt" download="vcf/Danial Gauhar.vcf"><button type='button' style="width: 40%;">Add to Contact</button></a> -->
                </center>
            </div>


        </div>

        

    </div>

    
</body>
    
</body>
</html>