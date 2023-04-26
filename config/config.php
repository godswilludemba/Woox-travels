<?php

try {
//host
define("HOST", "localhost");

//dbName
define("DBNAME", "wooxtravel");

//username
define("USER", "root");

//password
define("PASS", "");

// this is a door for managing DB
$conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME."", USER, PASS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// if($conn == true){
//   echo "db connected successfully";
// } else {
//   echo "db not connected";
// }
} catch( PDOException $Exception ) {
  echo $Exception->getMessage();
}