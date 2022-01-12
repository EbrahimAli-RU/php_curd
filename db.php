<?php
$servername = "sql6.freesqldatabase.com";
$username = "sql6465207";
$password = "SCLvvTmATh";
$dns = "mysql:host=$servername;dbname=sql6465207";
$conn;
try {
  $conn = new PDO($dns, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
