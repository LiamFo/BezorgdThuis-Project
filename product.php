<html>
<body>

<?php
	$naam = $_POST['naam'];
	$ingredienten = $_POST['ingredienten'];
	$prijs = $_POST['prijs'];
	$categorie = $_POST['categorie'];

$Product = array( "$naam, $ingredienten, $prijs" );


	$conn = new mysqli('localhost','root',);
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} 


      ?>
    <h4>Gelukt!</h4>
    <a href="RestaurantPagina.html">
    <h2>Klik hier om terug te gaan</h2>
        </a>
</body>
</html>