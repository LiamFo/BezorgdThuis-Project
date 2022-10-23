<?php

$sname= "localhost";
$unmae= "";
$password = "";
$db_name = "";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if ($conn) {
    if (!$conn) {
        echo "Connection failed!";
    }
}
