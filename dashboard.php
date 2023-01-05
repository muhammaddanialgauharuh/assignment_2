<?php include('server.php') ?>
<?php include('profile_fetching.php') ?>

<?php


    $email = $_SESSION['email'];
    $id = $_SESSION['id'];


    $user_check_query = "SELECT * FROM dashboard WHERE id='$id' ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);


    $facebook_link = $user["facebook"];
    $instagram_link = $user["instagram"];
    $whatsapp_link = $user["whatsapp"];
    $linkedin_link = $user["linkedin"];
    $mail_link = $user["mail"];
    $twitter_link = $user["twitter"];
    $youtube_link = $user["youtube"];
    $phone_link = $user["phone"];
    
?>

<!DOCTYPE html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
            <a href="digital_card_profile.html"><button type='button'>View Profile</button></a>
            <a href="dashboard.html"><button type='button' class="active_button">Dashboard</button></a>
            <a href="setting.html"><button type='button'>Setting</button></a>
        
        

        <canvas id="myChart" style="width:100%;max-width:600px;"></canvas>

        <hr/>
        
        <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
        
        </center>
    </div>


    <script>
        var xValues = ["Facebook", "Instagram", "WhatsApp", "LinkedIn", "Mail","Twitter","Youtube","Phone"];
        var yValues = [<?php echo $facebook_link ?>, <?php echo $instagram_link ?>,<?php echo $whatsapp_link ?>,<?php echo $linkedin_link ?>,<?php echo $mail_link ?>, <?php echo $twitter_link ?>,<?php echo $youtube_link ?>,<?php echo $phone_link ?>];
        var barColors = ["#4267B2", "#F56040","#25D366","#0077B5","green","#1DA1F2","#FF0000","#0F9D58"];
        
        new Chart("myChart", {
            
          type: "horizontalBar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues,
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Clicking Record of Your Digital Card Profile"
            }
          }
        });
        </script>




<script>
        var xValues = ["Facebook", "Instagram", "WhatsApp", "LinkedIn", "Mail","Twitter","Youtube","Phone"];
        var yValues = [<?php echo $facebook_link ?>, <?php echo $instagram_link ?>,<?php echo $whatsapp_link ?>,<?php echo $linkedin_link ?>,<?php echo $mail_link ?>, <?php echo $twitter_link ?>,<?php echo $youtube_link ?>,<?php echo $phone_link ?>];
        var barColors = ["#4267B2", "#F56040","#25D366","#0077B5","green","#1DA1F2","#FF0000","#0F9D58"];

        new Chart("myChart1", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            title: {
            display: true,
            text: ""
            }
        }
        });
</script>
        
    
</body>
</html>