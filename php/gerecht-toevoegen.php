<?php
include_once("connection.php");
session_start();



$query2 = ("SELECT naambedrijf FROM bedrijf WHERE bedrijf_kvk = " . $_SESSION['kvk'] . "");
$result = mysqli_query($conn, $query2);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productnaam = $_POST['productnaam'];
  $prijs = $_POST['prijs'];
  $categorie = $_POST['categorie'];
  // $type = $_POST['check2'];
  $session = $_SESSION['kvk'];
      
  $q = "INSERT INTO gerechten (etennaam, prijs, categorie, bedrijf_kvk) VALUES('$productnaam', '$prijs', '$categorie', '$session')";
  mysqli_query($conn, $q);


  header('Location: ../php/gerecht-toevoegen.php?succus');
  exit();
}

?>


<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

  .succus {
    background: #90EE90;
    color: white;
    padding: 10px;
    width: 15%;
    animation: mymove 4s ease-out forwards;
  }

  @keyframes mymove {
    from {opacity: 1;}
    to {opacity: 0;}
  }
    
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
  } 
    


  .open-button {
    background-color: #555;
    color: white;
    padding: 1px 2px;
    border: none;
    cursor: pointer;
    opacity: 0.8;
    width: 100px;
  }


  .form-popup {
    display: none;
    position: fixed;
    bottom: 0;
    right: 15px;
    border: 3px solid #f1f1f1;
    z-index: 9;
    overflow-y: auto;
    max-height: 100%;
  }


  .form-container {
    max-width: 500px;
    padding: 10px;
    background-color: white;
  }


  .form-container input[type=text], .form-container input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
  }


  .form-container input[type=text]:focus, .form-container input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }


  .form-container .btn {
    background-color: #04AA6D;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    margin-bottom:10px;
    opacity: 0.8;
  }


  .form-container .cancel {
    background-color: red;
  }


  .form-container .btn:hover, .open-button:hover {
    opacity: 1;
  }
    
  #photo {
    padding: 20px;
    }
  </style>
  <link rel="stylesheet" href="../css/dashboard.css">

</head>
<body>x
  <div class="sidenav">
    <a href="../php/logout.php" class="logout"><button>Logout</button></a>
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
    <?php if (isset($_GET['succus'])) { ?>
      <p class="succus">succusvol toegevoegd<?php echo $_GET['succus'];?></p>
    <?php } ?>

    <label style="display: block; font-weight: bold;">Voeg een product toe</label>
    <button class="open-button" onclick="openForm()">Nieuw gerecht</button>


    <div class="form-popup" id="myForm">
      <form action="../php/gerecht-toevoegen.php" class="form-container" method="POST">
        <h1>Plaats product</h1>
  
        <label for="productnaam"><b>Naam:</b></label>
        <input type="text" placeholder="vul gerecht in" name="productnaam" required>
        
        <!-- <label for="psw"><b>Ingredienten:</b></label>
        <input type="text" placeholder="Voeg ingredienten toe" name="ingredienten" required> -->
        
        <label for="prijs"><b>Prijs in €:</b></label>
        <input type="text" placeholder="Voer Prijs in" name="prijs" required>
        
        <label for="categorie">Categorie:</label>
         
        <select name="categorie" id="categorie">
          <option name="check" value="pizza">Pizza</option>
          <option name="check" value="pasta">Pasta</option>
          <option name="check" value="snacks">Patat en snacks</option>
          <option name="check" value="italiaans">Italiaans eten</option>
        </select>
        
        <br>
  
        <!-- <div class="type-food" style="float: right; display: flex; flex-direction: column; text-align: center;">
          <input type="checkbox" name="check2" value="pizza" onclick="onlyOne(this)" style="float: left;">
          <label for="Vegetarisch" style="float: right">Vegetarisch</label><br>
          <input type="checkbox" name="check2" value="pasta" onclick="onlyOne(this)" style="float: left;">
          <label for="Vegan" style="float: right">Vegan</label><br>
          <input type="checkbox" name="check2" value="snacks" onclick="onlyOne(this)" style="float: left;">
          <label for="Biologisch" style="float: right">Biologisch</label>
          <br>
          <input type="checkbox" name="check2" value="Biologisch" onclick="onlyOne(this)" style="float: left;">
          <label for="Biologisch" name="check" value="Halal" style="float: right">Halal</label>
        </div> -->
  
        <br>
        <br>
        <br>
            
        <!-- <label for="photo">Kies een foto:</label>
  
        <input 
          type="file"
          id="photo" 
          name="photo"
          accept="image/*"
        > -->
        <br><br>
        <br>
        <br>
        <br>
    
  
        <button type="submit" name="add" class="btn">plaats product</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </main>

  

  

  <script>
    function onlyOne(checkbox) {
      var checkboxes = document.getElementsByName('check')
      checkboxes.forEach((item) => {
        if (item !== checkbox) item.checked = false
    })
}

    function openForm() {
      document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
      document.getElementById("myForm").style.display = "none";
    }
  </script>

</body>
</html>
