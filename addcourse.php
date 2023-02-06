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

$sql = "INSERT INTO college_courses(course_code,course_name,course_duration,course_credit,course_is_for,offered_by) VALUES(:code, :name, :weeks, :credits, :year,:email)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':code', $user->code);
$stmt->bindParam(':name', $user->name  );
$stmt->bindParam(':weeks', $user->weeks );
$stmt->bindParam(':credits', $user->credits );
$stmt->bindParam(':year', $user->year );
$stmt->bindParam(':email', $user->email );

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);