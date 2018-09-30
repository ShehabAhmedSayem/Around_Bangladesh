<!DOCTYPE html>
<html lang="en">
<head>
  <title>Around Bangladesh</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script
  src="http://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Dekko' rel='stylesheet'>
  <style>
  li.dropdown {
    display: inline-block;
  }
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #555;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
  </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">AROUND BANGLADESH</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'index.php#place';
                            else echo 'index.php'; ?>">PLACE TO VISIT</a></li>
        <li><a href="Route.php">ROUTE</a></li>
        <li><a href="Hotel.php">HOTELS</a></li>
        <li><a href="#about">ABOUT US</a></li>
        <?php if(basename($_SERVER['PHP_SELF'])=='place.php'){
                echo '<li class="dropdown">
          <a href="javascript:void(0)" class="dropbtn">NAVIGATE</a>
          <div class="dropdown-content">
            <a href="#overview">Overview</a>
            <a href="#how">How To Go</a>
            <a href="#where_stay">Where To Stay</a>
            <a href="#where_eat">Where To Eat</a>
          </div>
        </li>';
              }
        ?> 
         <!--

         <li> <a onclick="document.getElementById('logInUser').style.display='block'">USER</a></li>
         <li> <a onclick="document.getElementById('logIn').style.display='block'">ADMIN</a></li>
      
          -->
      </ul>
    </div>
  </div>
</nav>

<br/><br/>



<!--Log In Admin-->

<!--
<div class="w3-container">

  <div id="logIn" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('logIn').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="images/avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
      </div>

    </div>
  </div>
</div>

-->
<!--Log In User-->
<!--
<div class="w3-container">

  <div id="logInUser" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('logInUser').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="images/avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Login</button>
          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Remember me
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <span class="w3-right w3-padding w3-hide-small"><a href="#">Forgot password?</a></span>
        <label><b>Not Signed In Yet?</b></label>
        <button onclick="document.getElementById('logInUser').style.display='none';document.getElementById('signUp').style.display='block';" type="button" class="w3-button w3-red">Sign Up</button>
      </div>

    </div>
  </div>
</div>
-->

<!--Sign Up User-->

<!--
<div class="w3-container">

  <div id="signUp" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
        <span onclick="document.getElementById('signUp').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
        <img src="images/avatar.png" alt="Avatar" style="width:30%" class="w3-circle w3-margin-top">
      </div>

      <form class="w3-container" action="/action_page.php">
        <div class="w3-section">
          <label><b>First Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Firstname" name="firstname" required>
          <label><b>Last Name</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Lastname" name="lastname" required>
          <label><b>Username</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Enter Username" name="username" required>
          <label><b>Password</b></label>
          <input class="w3-input w3-border" type="password" placeholder="Enter Password" name="password" required>
          <label><b>Email</b></label>
          <input class="w3-input w3-border" type="email" placeholder="Enter Eamil" name="email" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">Sign Up</button>
          
        </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('signUp').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>
</div>

-->