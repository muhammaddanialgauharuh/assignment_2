<?php include('server.php') ?>
<?php include('profile_fetching.php') ?>

<?php

if(isset($_GET["Active_Theme"])){

    $theme = $_GET["Active_Theme"];
    $id = $_SESSION["id"];

    $sql = "UPDATE profile SET theme_name = $theme Where id = $id" ;
    mysqli_query($db, $sql);
    header('location: card.php?id='.$_SESSION['id']."&theme=".$theme);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?php echo $_GET["theme_name"] ?>">


</head>
<body>
    <br/>
    <h1>
        <a href="card_theme.php" style="padding: 20px 20px;"> <-Back </a>
    </h1>

    <div class="container">
        
        <div class="card">
            <div class="cover"></div>
            <div class="dp"></div>
            <div class="bio">
                <h2><?php echo $display_name ?></h2>
                <p><b><?php echo $job ?></b></p>
                <p style="font-size:small"><?php echo $bio ?></p>
            </div>
            
            <div class="contact">
                <center>
                    <div>
                        <a href="<?php echo $facebook ?>"><img src="asset/fb.png" width="50" height="50"/></a>
                        <a href="<?php echo $instagram ?>"><img src="asset/insta.png" width="50" height="50"/></a>
                        <a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp ?>"><img src="asset/whatsapp.png" width="50" height="50"/></a>
                        <a href="<?php echo $linkedin ?>"><img src="asset/linkedin.png" width="50" height="50"/></a>
                    </div>
                    <div>
                        <a href="mailto:<?php echo $mail ?>"><img src="asset/gmail.png" width="50" height="50"/></a>
                        <a href="<?php echo $twitter ?>"><img src="asset/twitter.png" width="50" height="50"/></a>
                        <a href="<?php echo $youtube ?>"><img src="asset/youtube.png" width="50" height="50"/></a>
                        <a href="tel:<?php echo $phone ?>"><img src="asset/phone.png" width="50" height="50"/></a>
                    </div>

                    <a href="vcf/Danial Gauhar.vcf" download><button type='button' style="width: 60%;"><b>Add to Contact</b></button></a>
                    <!-- <a href="vcf/Danial Gauhar.txt" download="vcf/Danial Gauhar.vcf"><button type='button' style="width: 40%;">Add to Contact</button></a> -->
                </center>
            </div>

            <center>
            <form method="get" action="card_selection.php">
                <button type='submit' name="Active_Theme" value = "<?php echo $_GET["theme_name_str"] ?>" style="width: 80%; background-color: crimson;"><b>Active This Theme</b></button>
            <form>
            </center>
        </div>
    </div>
    
</body>
</html>