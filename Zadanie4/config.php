<?php

$user = "root";
$pass = "";
$db = "reviews";

$db = new mysqli("localhost", $user, $pass, $db) or die("Unable to connect");

mysqli_set_charset($db, "utf8");


$sql = 'SELECT * FROM `reviews`';

$result = mysqli_query($db, $sql);




?>

