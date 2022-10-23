<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        ob_start();
        session_start();
        include("connection.php");

        if(isset($_POST['rnaam']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['contactnaam']) && isset($_POST['stad']) && isset($_POST['straat']) && isset($_POST['huisnummer']) && isset($_POST['number']) && isset($_POST['kvk'])&& isset($_POST['btw'])) {
            
            $rnaam = $_POST['rnaam'];
            $name = $_POST['contactnaam'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $city = $_POST['stad'];
            $straat = $_POST['straat'];
            $hnummer = $_POST['huisnummer'];
            $number = $_POST['number'];
            $kvk = $_POST['kvk'];
            $btw = $_POST['btw'];
            
        
            
        
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            
        
            //  check kvk already exits
            $checkkvk = "SELECT kvk FROM bedrijf WHERE kvk='$email'";
            $result = mysqli_query($conn, $checkemail);
    
            // check of email already exists
            $checkemail = "SELECT email FROM bedrijf WHERE email='$email'";
            $result2 = mysqli_query($conn, $checkemail);
            
            if(mysqli_num_rows($result) > 0) {
                echo 'Sorry... kvk bestaat al';
            } else {
                if(mysqli_num_rows($result2) > 0) {
                    echo 'Sorry... email already taken'; 
                  } else {
                    $q = "INSERT INTO bedrijf (kvk, naambedrijf, stad, straat, huisnummer, contacttelefoon, contactemail, btwnummer, password) VALUES('$kvk', '$rnaam', '$city', '$straat', '$hnummer', '$number', '$email', '$btw', '$hashed')";
                    mysqli_query($conn, $q);
                    header('Location: ../html/loginbedrijf.html');
                    exit();
                  }
                }
            }
        
        
        } else {
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
            <form action="../php/registratiebedrijf.php" method="POST">
            <label for="rnaam">Naam Restaurant</label>
            <input type="text" id="rnaam" name="rnaam" required>

            <label style="margin-left:45px;" for="stad">Stad</label>
            <label style="margin-left:105px;" for="straat">Straat</label>
            <label style="margin-left:65px;" for="huisnummer">Huisnummer</label>

            <input style="width:150px;" type="text" id="stad" name="stad" required>
            <input style="width:150px;margin-left:20px;" type="text" id="straat" name="straat" required>
            <input style="width:150px;margin-left:20px;" type="text" id="huisnummer" name="huisnummer" required>
            <br>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="contactnaam">contact naam</label>
            <input type="text" id="contactnaam" name="contactnaam" required>

            <label for="email">Email contact persoon</label>
            <input type="email" id="email" name="email" required>

            <label for="number">Telefoon contact persoon</label>
            <input type="number" id="number" name="number" required>
            
            <label for="kvk">kvk nummer</label>
            <input type="number" id="kvk" name="kvk" required>

            <label for="btw">btw nummer</label>
            <input type="number" id="btw" name="btw" required>

        
            <input type="submit" name="submit" value="Submit">
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