<?php include('database_connection.php') ?>
<?php include('profile_fetching_id.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo $theme_css ?>">
    <style>
    
    .card .cover{
    width: 100%;
    height: 20vh;
    background-color: #3b33c7;
    /* background: url('asset/techmacover.jpg') center; */
    background: url('<?php echo $cover ?>') center;
    background-size: cover;
    border-radius: 10px;

}
.card .dp{
    width: 100px;
    height: 100px;
    background-color: gray;
    border-radius: 360px;
    position: relative;
    top: -50px;
    left: 5%;
    /* background: url('asset/danial.jpg'); */
    background: url('<?php echo $dp ?>');
    background-position: 0 -10px;
    background-size: cover;
}

    </style>

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

                    <button name="website" style="width: 60%;">
                            <a href="<?php echo $website ?>" style="text-decoration: none;">Contact Us</a>
                    </button>

                    <!-- <a href="vcf/Danial Gauhar.vcf" download><button type='button' style="width: 60%;"><b>Add to Contact</b></button></a> -->
                    </form>
                    <!-- <a href="vcf/Danial Gauhar.txt" download="vcf/Danial Gauhar.vcf"><button type='button' style="width: 40%;">Add to Contact</button></a> -->
                </center>
            </div>


        </div>

        

    </div>

    
</body>
    
</body>
</html>