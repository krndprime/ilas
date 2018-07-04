
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Login Page</title>
    
<meta name="description" content="" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="http://azadcreative.com/wp-content/themes/Instinct/style.css" />
<link rel="stylesheet" type="text/css" media="all" href="http://azadcreative.com/wp-content/themes/Instinct/css/grid.css" />
<!--link rel="stylesheet" type="text/css" media="all" href="http://azadcreative.com/wp-content/themes/Instinct/css/screen.css" /-->

<style type="text/css">
body
{
   width: 100%;
   height:100%;
   margin: auto;
   margin-top: 20px;
   margin-bottom: 20px;    
   background-image: url("../../images/background1.jpg");
   background-color:#FBFBF7;
}

#catalog2{
  background-color:#0F0923;
  height:300px;
  width:530px;
  font-family:Geneva, Arial, Helvetica, sans-serif;
   color:#4D4D4D;
  margin-left:30%;
  margin-top:0px;
  -moz-border-radius: 0.5em 0.5em 0.5em 0.5em;
      border-radius: 0.5em 0.5em 0.5em 0.5em;
    box-shadow:
  rgba(0,0,0,0.3)
  0px 1px 1px 1px;
  Box color at top:red;
  Box color at bottom:white;
  Gradient height in pixels: 60px;  
Gradient angle (degrees):   80;
background-image:url("../../images/logina33.png")
  }
  #catalog1{
  background-color:#0F0923;
  margin-left:50%;
  height:40px;
  width:400px;
  color:#FFFFFF;
  margin-top:100px;
  -moz-border-radius: 1em 1em 0em 0em;
      border-radius: 1em 1em 0em 0em; 
  }
 input#username{
   background-image: url("images/username.png");
   background-repeat:no-repeat;
   border:1px solid #DADADA;
   padding-left:46px;
    height:30px;

 }  
 input#password{
   background-image: url("images/passwordkey.png");
   background-repeat:no-repeat;
   border:1px solid #DADADA;
   padding-left:46px;
    height:30px;

 }
  input#login{
  
    height:27px;
  width:80px;
  

 }
      
</style>


</head>
<body>
<br><br><br><br><br>
         
         <div id="catalog2">  
     <br><br><br><br><br>
    <center>
  <table>
  <tr>
    <td>
<body class="login-page">

<?php $this->beginBody() ?>

    <?= $content ?>

<?php $this->endBody() ?>
</body>
    </center>
   

      </div>
          
  </div>
  <br>
        
</body>
</html>

