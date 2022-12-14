<?php include('database_connection.php') ?>
<?php include('server.php') ?>

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
    }

body {
  background-color: #212121;
  color: #fff;
  font-family: monospace, serif;
  letter-spacing: 0.05em;
}

.container {
  width: 350px;
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

input[type="radio"]{
    padding: 20px;
    display: none;
}

label{
    position: relative;
    font-size: larger;
    padding: 20px;
}

input[type="radio"]:checked+label {
    color: #3b33c7;
    font-weight: bold;
    font-size: xx-large;
    transition: all 0.2s ease-in-out;
    letter-spacing: 3px;
}



    </style>
</head>
<body>
    <h1>
        <a href="index.php" style="padding: 20px;"> <-Back </a>
    </h1>

    <div class="container">
        <h1>Registration</h1>
        <center>
        <?php include('errors.php'); ?>
        <form method="post" action="registration.php">
            <input name='email' placeholder='Email' type='text'>
            <input name='password_1' placeholder='Password' type='password'>
            <input name='password_2' placeholder='Confrim Password' type='password'>
            <input name='first' placeholder='First Name' type='text'>
            <input name='last' placeholder='Last Name' type='text'>
            <input name='phone' placeholder='Phone No.' type='text'>
            <br/><br/>
            <input type="radio" id="male" name="gender" value="Male" checked>
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
            <br/><br/><br/>
            <button type='submit' name="registration">Registration</button>
        </form>
        </center>

    </div>
    
</body>
</html>