<?php
include_once("connection.php");
session_start();

$query2 = ("SELECT naam FROM klant WHERE klant_idklant = " . $_SESSION['idklant'] . "");
$result = mysqli_query($conn, $query2);

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/registratie.css">
    <title>BezorgdThuis</title>
    <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/thuisbezorgd.svg" type="image">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <svg id="fader"></svg>
  <div class="Taskbar">
    <span class="menu_button TopButton" onclick="openNav()">&#9776; Menu</span>
    <div class="title-and-icon">
      <h1 class="Title" style="text-align: center;">BezorgdThuis</h1>
      <i class="material-icons" style="font-size:50px;">dining</i>
    </div>
    <!-- <br>
    <br>
    <br>
    <br> -->
    <div class="profiel">
      <?php  echo '<h2>Welkom ' . $_SESSION["naam"] . '</h3>'; ?>
      <a href="./php/logout.php" class="logout"><button>Logout</button></a>
    </div>

    <div id="Menu" class="menuside">
      <a class="menuclose" onclick="closeNav()">&times;</a>
      <i class="material-icons" style="margin-top: 10px;text-shadow:none;">person</i><a class="Aa" href="../html/loginals.html" style="margin-top: -40px;">Account</a>
      <i class="material-icons" style="margin-top: 30px;text-shadow:none;">info</i><a class="Aa" onclick="ScrollView()" style="margin-top: -40px;">Informatie</a>
      <i class="material-icons" style="margin-top: 30px;text-shadow:none;">dining</i><a class="Aa" href="../php/gerechten.php" style="margin-top: -40px;">Gerechten</a>
      <i class="material-icons" style="margin-top: 30px;text-shadow:none;">trolley</i><a class="Aa" href="winkelwagen.html" style="margin-top: -40px;">Winkelwagen</a>
    </div>

  </div>
    
  <div class="icon-container">
    <div class="display-icons">

      <i class="material-icons lower" style="color:orange;font-size:150px;">info</i>
      

      <i class="material-icons lower" style="color:orange;font-size:150px;">dining</i>
      <i class="material-icons lower" style="color:orange;font-size:150px;">trolley</i>
      <a href="#infomatie" class="Bigtext Button upper">Informatie</a>
      <a href="../php/gerechten.php" class="Bigtext Button upper">Gerechten</a>

      
      <a href="winkelwagen.html"class="Bigtext Button upper"">Winkelwagen</a>
    </div>
  </div>
  
  

  <div class="eten-section">
    <div class="eten-container"> 
      <div class="eten-info">
        <h1 id="h1-eten">Welkom bij BezorgdThuis</h1>
        <i class="material-icons" style="color:white;font-size:100px;">home</i>
        <i class="material-icons" style="color:white;font-size:100px;">dining</i>
        <i class="material-icons" style="color:white;font-size:100px;">trolley</i>

        <a class="Smalltext" style="color:white;">Vul je locatie in</a>
        <a class="Smalltext" style="color:white;">Kies je gerecht</a>
        <a class="Smalltext" style="color:white;">Ontvang je eten</a>
      </div>
      <div class="ImageThing image2"></div>
    </div>
  </div>
  <br>
  <div class="whitespace"></div>

  <div class="info-section">
    <div class="info-container">
      <div class="info-text">
        <h3>BezorgdThuis is een bezorg website waarbij je jouw maaltijd makkelijk</h3>
        <h3>kan bestellen en ontvangen. Met over 100 restaurants en verschillende</h3>
        <h3>gerechten om uit te kiezen voor jouw perfecte maaltijd</h3>
        <h3>Heeft u een restaurant?</h3>
        <h3>Maak een account en voeg jouw eigen gerechten en menu's toe.</h3> 
      </div>
      <div class="ImageThing image"></div> 
    </div>
  </div>

  <div class="whitespace"></div>


  <!-- <div class="flip">
    <div class="ShapeThing"></div> 
    <div class="ImageThing image2"></div> 

    <div  class="TitleText" style="margin-top:-410px;margin-left:70px;float:left;transform:scaleX(-1);">Welkom bij BezorgdThuis</div>
    <div class="TitleLine" style="margin-left:560px;float:left;margin-top:-386px;width:450px;"></div>
    <div class="InfoText" >BezorgdThuis is een bezorg website waarbij je jouw maaltijd makkelijk
      <br>kan bestellen en ontvangen. Met over 100 restaurants en verschillende
      <br>gerechten om uit te kiezen voor jouw perfecte maaltijd.
      <br>Heeft u een restaurant?
      <br>Maak een account en voeg jouw eigen gerechten en menu's toe.  
    </div>

    <div class="ExtraExtraBar" style="margin-top:-40px;"></div>
    <div class="ExtraBar" style="height:150px;margin-top:-10px;"></div> white cube bottom
    <div class="ExtraBar" style="height:150px;width: 100%;background-color:rgb(243, 243, 243);"></div> <!--gray cube bottom-->
  <!-- </div> -->
  <script defer>
    function openNav(){
      document.getElementById("Menu").style.width = "250px";
    }
    
    function closeNav(){
      document.getElementById("Menu").style.width = "0";
    }

    function ScrollView(){
    const element = document.getElementById("intro_part");
    element.scrollIntoView();
    }

    fadeInPage();

    function fadeInPage() {
      if (!window.AnimationEvent) { return; }
      var fader = document.getElementById('fader');
      fader.classList.add('fade-out');
      fader.classlist.remove('fade-in');
    }
  </script>
</body>

  
</html>