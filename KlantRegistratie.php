<?php
session_start();
include("connection.php");

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['naam'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $city = $_POST['stad'];
    $straat = $_POST['straat'];
    $hnummer = $_POST['huisnummer'];
    

    $hashed = password_hash($password, PASSWORD_DEFAULT);
  
    $q = "INSERT INTO klant (naam, password, email, stad, straat, huisnummer) VALUES('$name', '$hashed', '$email', '$city', '$straat', '$hnummer')";
    
    $result = mysqli_query($conn, $q);
  
    if($result) {
      echo "registratie complete";
    } else {
      echo "Error registratie";
      echo mysqli_error($conn);
    }
  }



?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="registratie.css">
    <link rel="stylesheet" href="blank.css">
    <title>BezorgdThuis</title>
    <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/thuisbezorgd.svg" type="image">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="BackgroundImage">
    <svg id="fader"></svg>

    <div class="Back">
        <a href="LogInAs.html" style="text-decoration: none;color:#ff6a04;">&larr;Back</a>
    </div>

    <div class="FormBox">
        <form action="KlantRegistratie.php" method="POST">
          <label for="naam">Naam</label>
          <input type="text" id="naam" name="naam" required>

          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
      
          <label for="stad">Stad</label>
          <input style="width:150px;" type="text" id="stad" name="stad" required>

          <label for="straat">Straat</label>
          <input style="width:150px;" type="text" id="straat" name="straat" required>

          <label for="huisnummer">Huisnummer</label>
          <input style="width:150px;" type="text" id="huisnummer" name="huisnummer" required>

          <label for="pass">Password</label>
          <input type="password" id="password" name="password" required>
        
          <input type="submit" value="Submit">
        </form>
      </div>

</body>
<script>
    fadeInPage();

    function fadeInPage() {
        if (!window.AnimationEvent) { return; }
        var fader = document.getElementById('fader');
    fader.classList.add('fade-out');
    fader.classlist.remove('fade-in');
}
    </script>
</html>