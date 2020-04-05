<?php

ob_start();

if (!isset($_SESSION)) {
  session_start();
  //create a new session
}

//php database file
$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'phpcrudtutorial';

$connection = mysqli_connect($host, $user, $password, $db_name);

if (!$connection) {
  die("CONNECTION TO DB FAILED.  " . mysqli_error($connection));
}
//echo 'Connection Successful!';

$sql = "CREATE DATABASE phpCrudDB";
$sql = "CREATE TABLE Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

)";

if(mysqli_query($connection, $sql)) {
    echo 'Table created successfully!!!';
}

mysqli_close($connection);
//end of php code
 ?>
