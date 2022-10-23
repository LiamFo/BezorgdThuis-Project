<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  ob_start();
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
  
    $checkemail = "SELECT * FROM klant WHERE email='$email'";
    $result = mysqli_query($conn, $checkemail);
  
    if(mysqli_num_rows($result) > 0) {
      echo 'Sorry... email already taken'; 
    } else {
      $q = "INSERT INTO klant (naam, password, email, stad, straat, huisnummer) VALUES('$name', '$hashed', '$email', '$city', '$straat', '$hnummer')";
      mysqli_query($conn, $q);
      echo 'Saved!';
      header('Location: ../html/loginklant.html');
      exit();
    }

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
          <form class="flexbox" action="KlantRegistratie.php" method="POST">
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