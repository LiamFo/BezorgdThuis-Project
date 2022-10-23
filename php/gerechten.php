<?php
session_start();
include_once("connection.php");

$query2 = ("SELECT etennaam, prijs, categorie, naambedrijf FROM gerechten INNER JOIN bedrijf ON gerechten.bedrijf_kvk = bedrijf.kvk");
$result = mysqli_query($conn, $query2);



?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/gerechten-page.css">
    <title>BezorgdThuis gerechten</title>
    <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/thuisbezorgd.svg" type="image">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
  <div class="Taskbar">

    <span class="menu_button TopButton" onclick="openNav()">&#9776; Menu</span>
    <div class="a">
      <h1 class="Title">Gerechten</h1>
      <i class="material-icons" style="font-size:50px;">dining</i>
    </div>

    <div id="Menu" class="menuside">
      <a class="menuclose" onclick="closeNav()">&times;</a>
      <i class="material-icons" style="margin-top: 10px;text-shadow:none;">person</i><a class="Aa" href="../html/loginals.html" style="margin-top: -40px;">Account</a>
      <i class="material-icons" style="margin-top: 30px;text-shadow:none;">house</i><a class="Aa" href="../index.php" style="margin-top: -40px;">Home</a>
      <i class="material-icons" style="margin-top: 30px;text-shadow:none;">trolley</i><a class="Aa" href="#" style="margin-top: -40px;">Winkelwagen</a>
    </div>

    
  

  

  </div>


  <div class="container-food_display">
    <div class="food_display">
      <?php
      foreach($result as $row) {
                echo '<div class="grid-item">
                <h1 class="FoodText">' . $row["etennaam"] .'</h1>
                <h1 class="RestaurantName">' . $row["naambedrijf"] . '</h1>
                <h1>' . $row["categorie"] . '</h1>
                <h1>€ ' . $row["prijs"] . '</h1>
                <button class="FoodButton">toevoegen</button>
                </div';
      }
      ?>



    </div>
  </div>
</body>
<script>
    function openNav(){
      document.getElementById("Menu").style.width = "250px";
    }
    
    function closeNav(){
      document.getElementById("Menu").style.width = "0";
    }
    </script>
</html>