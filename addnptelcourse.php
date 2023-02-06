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
echo "user";
echo "$user->roll";
$sql = "INSERT INTO nptel_course(course_code,course_name,type_of_certificate,weeks,credits,assignment_score,exam_score,final_score,certificate,student_roll) VALUES(null, :name, :type,:weeks, :credits,:assignment_score,:exam_score,:final_score,:proof,:roll)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':name', $user->name  );
$stmt->bindParam(':type', $user->type  );
$stmt->bindParam(':weeks', $user->weeks );
$stmt->bindParam(':credits', $user->credits );
$stmt->bindParam(':assignment_score', $user->assignment_score );
$stmt->bindParam(':exam_score', $user->exam_score );
$stmt->bindParam(':final_score', $user->final_score );
$stmt->bindParam(':proof', $user->proof );
$stmt->bindParam(':roll', $user->roll );

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);