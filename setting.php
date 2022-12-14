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
    font-size: medium;
    color: #fff;
    width: 90%;
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
    width: 100%;
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
            <a href="setting.php"><button type='button' class="active_button">Setting</button></a>
        
        
            <br/><br/><br/>
            <h2>Your Digital Card URL</h2>
            <br/>
            <a href="<?php echo $card_link; ?>"><?php echo $card_link; ?></a>
            <br/><br/><br/>
            <a href="index.php"><button type='button' style="width: 60%;">Logout</button></a>
        </center>
        

    </div>
    
</body>
</html>