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
    </style>
</head>
<body>
    <h1>
        <a href="index.html" style="padding: 20px;"> <-Back </a>
    </h1>
    
    <div class="container">
        <center>
            <img src="asset/forgot-password.png"/>
        
        <h2>Forgot Password</h2>
        <p>Provide your account's email for which you want to reset your password!</p>
        <form>
            <input name='username' placeholder='Username' type='text'>
            <br/><br/><br/>
            <a href="make_selection.html"><button type='button'>Next</button></a>
        </form>
        
        </center>

    </div>
    
</body>
</html>