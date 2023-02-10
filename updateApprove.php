<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
 
include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();
 
$user = json_decode( file_get_contents('php://input') );

$sql = "UPDATE exemption SET approve_status = 1 WHERE roll=:roll";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':roll', $user->username);
if($stmt->execute()){
  echo "Success";
}
