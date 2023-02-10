<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
 
include 'DbConnect.php';
$objDb = new DbConnect;
$conn = $objDb->connect();
$user = json_decode( file_get_contents('php://input'));
$sql = "SELECT * FROM college_courses WHERE offered_by=:email";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $user->email);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);