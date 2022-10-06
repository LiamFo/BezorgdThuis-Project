<?php
ob_start();
session_start();
include("connection.php");

if(isset($_POST['naam']) && isset($_POST['email']) && isset($_POST['password'])) {
    $name = $_POST['contactnaam'];
    $rnaam = $_POST['rnaam'];
    $email = $_POST['email'];
    $password = $_POST['wachtwoord'];

    $city = $_POST['stad'];
    $straat = $_POST['straat'];
    $hnummer = $_POST['huisnummer'];
    $number = $_POST['number'];
    

    

    $hashed = password_hash($password, PASSWORD_DEFAULT);
  
    $checkemail = "SELECT * FROM bedrijf WHERE email='$email'";
    $result = mysqli_query($conn, $checkemail);
  
    if(mysqli_num_rows($result) > 0) {
      echo 'Sorry... email already taken'; 
    } else {
      $q = "INSERT INTO klant (naambedrijf, wachtwoord, email, stad, straat, huisnummer, contacttelefoon) VALUES('$rnaam', '$hashed', '$email', '$city', '$straat', '$hnummer', '$number')";
      mysqli_query($conn, $q);
      echo 'Saved!';
      header('Location: ../html/loginbedrijf.html');
      exit();
    }

  }



?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/registratie.css">
    <link rel="stylesheet" href="../css/blank.css">
    <title>BezorgdThuis</title>
    <link rel="icon" href="https://cdn.worldvectorlogo.com/logos/thuisbezorgd.svg" type="image">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="BackgroundImage">
    <svg id="fader"></svg>

    <div class="Back">
        <a href="../html/loginals.html" style="text-decoration: none;color:#ff6a04;">&larr;Back</a>
    </div>

    <section class="form-container">
        <div class="FormBox">
            <form action="registratiebedrijf.php" method="POST">
            <label for="rnaam">Naam Restaurant</label>
            <input type="text" id="rnaam" name="rnaam" required>

            <label style="margin-left:45px;" for="stad">Stad</label>
            <label style="margin-left:105px;" for="straat">Straat</label>
            <label style="margin-left:65px;" for="huisnummer">Huisnummer</label>

            <input style="width:150px;" type="text" id="stad" name="stad" required>
            <input style="width:150px;margin-left:20px;" type="text" id="straat" name="straat" required>
            <input style="width:150px;margin-left:20px;" type="text" id="huisnummer" name="huisnummer" required>
            <br>

            <label for="wachtwoord">Password</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>

            <label for="email">Email contact persoon</label>
            <input type="email" id="email" name="email" required>

            <label for="number">Telefoon contact persoon</label>
            <input type="text" id="number" name="number" required>

        
            <input type="submit" value="Submit">
            </form>
        </div>
    </section>
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