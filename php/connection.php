<?php

$sname= "localhost";
$unmae= "id19625817_erkanlaimmike";
$password = "v5U6TPU#|lD?[-Hp";
$db_name = "id19625817_project_bezorgthuis";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn) {
    if (!$conn) {
        echo "Connection failed!";
    }
}