<?php 
 $db_name = "api_importer";
 $db_host = "localhost";
 $db_user = "root";
 $db_pass = "1234";

$conn = new PDO("mysql:dbname=" .$db_name . ";host=" .$db_host, $db_user,$db_pass);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);