<<<<<<< Updated upstream
<html>
    <style>
        body {
background-color: rgb(255, 128, 0);
}
        
    </style>
<body>

<?php
	$naam = $_POST['naam'];
	$ingredienten = $_POST['ingredienten'];
	$prijs = $_POST['prijs'];
	$categorie = $_POST['categorie'];
    
    $sname= "localhost";
$unmae= "id19625817_erkanlaimmike";
$password = "v5U6TPU#|lD?[-Hp";
$db_name = "id19625817_project_bezorgthuis";

$Product = array( "$name, $ingredienten, $prijs" );


	$conn = mysqli_connect($sname, $unmae, $password, $db_name);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
        
    }


      ?>
    
    <h4>Gelukt!</h4>
    <a href="RestaurantPagina.html">
    <h2>Klik hier om terug te gaan</h2>
        </a>
</body>
=======
<html> 
    <style> 
        body { 
background-color: rgb(255, 128, 0); 
} 
         
    </style> 
<body> 
 
<?php 
	$naam = $_POST['naam']; 
	$ingredienten = $_POST['ingredienten']; 
	$prijs = $_POST['prijs']; 
	$categorie = $_POST['categorie']; 
     
    $sname= "localhost"; 
    $unmae= "id19625817_erkanlaimmike"; 
    $password = "v5U6TPU#|lD?[-Hp"; 
    $db_name = "id19625817_project_bezorgthuis"; 
 
    $Product = array( "$name, $ingredienten, $prijs" ); 
 
 
	$conn = mysqli_connect($sname, $unmae, $password, $db_name); 
	if($conn->connect_error){ 
		echo "$conn->connect_error"; 
		die("Connection Failed : ". $conn->connect_error); 
	} else { 
         
    } 
 
 
      ?> 
     
    <h4>Gelukt!</h4> 
    <a href="RestaurantPagina.html"> 
    <h2>Klik hier om terug te gaan</h2> 
        </a> 
</body> 
>>>>>>> Stashed changes
</html>