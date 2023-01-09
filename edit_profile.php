<?php include('database_connection.php') ?>
<?php include('server.php') ?>
<?php include('profile_fetching.php') ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
    *, ::after, ::before {
    box-sizing: border-box;
    margin: 0;
    }

body {
  background-color: #212121;
  color: #fff;
  font-family: monospace, serif;
  letter-spacing: 0.05em;

}

.container {
  /* width: 360px; */
  padding: 64px 15px 24px;
  margin: 0 auto;
}
.container h1{
    letter-spacing: 6px;
    color: #fff;
}

input{
    font-size: small;
    color: #fff;
    width: 100%;
    border: none;
    border-bottom: 2px solid #3b33c7;
    background: transparent;
    letter-spacing: 2px;
    padding: 5px 10px;
    margin-top: 20px;
    transition: all 0.2s ease-in-out;
    text-align: center;
}
input:focus{
    outline: none;
    border-bottom: 2px solid grey;

}

button{
    background:  #3b33c7;
    margin: 10px 0px;
    width: 100%;
    padding: 10px;
    color: #fff;   
    transition: all 0.2s ease-in-out; 
    outline: none;
    letter-spacing: 2px;
}

button:hover{
    background: grey;
    color: #fff;
        
}

.forgot_password{
    margin-left: 40%;
}

a:link, a:visited{
    color: #fff;
}

a:hover{
    color: red;
}

button{
    width: 31%;
    font-size: 9px;
}

.card{
    /* height: 600px; */
    background-color: #212121;
    
}

.card .cover{
    width: 100%;
    height: 20vh;
    background-color: #3b33c7;
    background: url('asset/techmacover.jpg') center;
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
    background: url('asset/danial.jpg');
    background-position: 0 -10px;
    background-size: cover;
}

.card .bio{
    position: relative;
    margin-top:-10%;

}

.card .contact{
    width: 100%;
    height: 20%;

}

.card .contact img{
    margin: 10px;
}

.active_button{
    background: grey;
}

table td:first-child{
    width: 10%;
}


@media (min-width: 580px) {
.container {
  width: 580px;
  padding: 64px 15px 24px;
  margin: 0 auto;
}

.card .bio{
    position: relative;
    margin-top:-5%;

}



}



</style>
</head>
<body>

    <div class="container">
        <center>
            <a href="digital_card_profile.php"><button type='button'>View Profile</button></a>
            <a href="dashboard.php"><button type='button'>Dashboard</button></a>
            <a href="setting.php"></a><button type='button'>Setting</button></a>
        </center>
        
        <div class="card">
            <!-- <div class="cover"></div>
            <div class="dp"></div>
            <div class="bio">
                <h2>Danial Gauhar</h2>
                <p style="color: rgb(192, 191, 191);"><b>Data Scientist</b></p>
                <p style="color: rgb(192, 191, 191); font-size:small">An Enthusiastic & Passionate Trainer Currently Giving Training To 1000+ Trainees Through Different Platforms.</p>
            </div>
             -->

             
            <div class="contact">
                <?php include('errors.php'); ?>
            <form method="post" enctype="multipart/form-data" action="edit_profile.php">
                    <table width="100%">
                        <tr>
                            <td><img src="asset/cover.png" width="50" height="50"/></td>
                            <td><input name='display_cover' placeholder='Display Cover' type='file'></td>
                        </tr>
                        <tr>
                            <td><img src="asset/dp.png" width="50" height="50"/></td>
                            <td><input name='display_picture' placeholder='Display Picture' type='file'></td>
                        </tr>
                        <tr>
                            <td><img src="asset/name.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='display_name' placeholder='Display Name' type='text' value='$display_name' ></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/job.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='job' placeholder='Job Position' type='text' value='$job'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/bio.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='bio' placeholder='Bio' type='text' value='$bio'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/fb.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='facebook' placeholder='Facebook' type='text' value='$facebook'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/insta.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='instagram' placeholder='Instagram' type='text' value='$instagram'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/whatsapp.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='whatsapp' placeholder='+92 333 0376076' type='text' value='$whatsapp'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/linkedin.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='linkedin' placeholder='Linkedin' type='text' value='$linkedin'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/gmail.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='mail' placeholder='Gmail' type='text' value='$mail'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/twitter.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='twitter' placeholder='Twitter' type='text' value='$twitter'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/youtube.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='youtube' placeholder='Youtube' type='text' value='$youtube'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/phone.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='phone' placeholder='+92 333 0376076' type='text' value='$phone'></td>" ?>
                        </tr>
                        <tr>
                            <td><img src="asset/website.png" width="50" height="50"/></td>
                            <?php echo "<td><input name='website' placeholder='www.company_website.com' type='text' value='$website'></td>" ?>
                        </tr>
                    </table>
                    <center>
                        <button type='submit' style="width: 50%;" name="save">Save</button>
                    </center>
                </form>

            
            </div>

        </div>

        <center>
            <button type='button' style="width: 40%;" class="active_button">Edit Profile</button>
            <a href="card_theme.php"><button type='button' style="width: 40%;">Card Theme</button></a>
        </center>


    </div>
    
</body>
</html>