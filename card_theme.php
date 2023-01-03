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

.card_theme{
    /* padding: 10px; */
    text-align: center;

}

.card_theme .theme{
    width: 100%;
    display: inline-block;
    transition: all 0.2s ease-in-out;
}

.card_theme .theme img{
    border: #3b33c7 solid 2px;
    width: 100%;
    
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
            <a href="dashboard.html"><button type='button'>Dashboard</button></a>
            <a href="setting.html"><button type='button'>Setting</button></a>
        </center>

        <h1>Card Themes</h1>
    <a href="card_selection.php?theme_name=dark.css">
        <div class="card_theme">
            <button style="width: 40%">
                <div class="theme">
                    <img src="asset/theme1.PNG" alt="asset//theme1.PNG"/>
                    <h2>Dark Theme</h2>
                </div>
    </a>

    <a href="card_selection.php?theme_name=light.css">
        <div class="card_theme">
            <button style="width: 40%">
                <div class="theme">
                    <img src="asset/theme2.PNG" alt="asset//theme2.PNG"/>
                    <h2>Light Theme</h2>
                </div>
    </a>
    
        </div>
    </form>

        <center>
            <a href="edit_profile.html"><button type='button' style="width: 40%;">Edit Profile</button></a>
            <a href="card_theme.html"><button type='button' style="width: 40%;" class="active_button">Card Theme</button></a>
        </center>

        

    </div>
    
</body>
</html>