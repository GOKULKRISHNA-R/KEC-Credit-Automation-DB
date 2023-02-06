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

$sql = "INSERT INTO exemption(roll,semester,academic_course,credit_course) VALUES(:roll, :sem, :courses, :credit)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':roll', $user->roll);
$stmt->bindParam(':sem', $user->sem  );
$stmt->bindParam(':courses', $user->courses );
$stmt->bindParam(':credit', $user->credit );

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);