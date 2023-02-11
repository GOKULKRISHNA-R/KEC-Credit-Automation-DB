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

$sql = "UPDATE previous_records SET credit_used=(credit_used+:usedcredit),credit_balance= (credit_balance-:usedcredit) WHERE roll_no=:roll AND course_code = :code";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':usedcredit', $user->usedcredit);
$stmt->bindParam(':roll', $user->roll);
$stmt->bindParam(':code', $user->code);

if($stmt->execute()){
  echo "Success";
}

