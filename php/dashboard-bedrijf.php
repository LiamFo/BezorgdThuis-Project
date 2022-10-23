<?php
include_once("connection.php");
session_start();



$query2 = ("SELECT naambedrijf FROM bedrijf WHERE bedrijf_kvk = " . $_SESSION['kvk'] . "");
$result = mysqli_query($conn, $query2);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

    <div class="sidenav">
        <a href="logout.php" class="logout"><button>Logout</button></a>
        <a href="../php/dashboard-bedrijf.php">Home</a>
        <a href="../html/bedrijf-overzicht-producten.html">onze gerechten</a>
        <a href="../php/gerecht-toevoegen.php">gerecht toevoegen</a>
        <a href="../html/bedrijf-info.html">Bedrijf informatie</a>
        <a href="../html/bedrijf-account.html">Account</a>
    </div>

    <div class="header-bar">
        <?php  echo '<h1>Welkom ' . $_SESSION["naambedrijf"] . '</h1>'; ?>
    </div>

    <main>

        <label style="display: block; font-weight: bold";>Kies wat je wilt doen</label>
        <br>
        <div class="grid-vak">
            <a href="../php/gerecht-toevoegen.php">
                <div class="grid-item">
                    <img src="../images/gerecht.png">
                    <h2>Gerecht toevoegen</h2>
                </div>
            </a>
            <a href="#"">
                <div class="grid-item">
                    <img src="../images/voorraad-gerechen.png">
                    <h2>bekijk mijn gerechten</h2>
                </div>
            </a>
            <a href="#">
                <div class="grid-item">
                    <img src="../images/bedrijf-info.png">
                    <h2>bedrijf informatie</h2>
                </div>
            </a>
        </div>
    </main>
</body>
</html>