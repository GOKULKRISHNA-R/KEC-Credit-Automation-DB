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

// $sql = "INSERT INTO exemption(roll,semester,type_of_course,academic_course_code,academic_course_name,academic_course_credit,course_code,course_credit,course_name,approve_status) VALUES(:roll, :sem, :type, :code,:name,:credit,:code1,:credit1,:name1,:approve_status)";
$sql = "UPDATE exemption SET approve_status = 1 WHERE roll=:roll";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':roll', $user->username);
if($stmt->execute()){
  echo "Success";
}

// $stmt->bindParam(':sem', $user->sem  );
// $stmt->bindParam(':type', $user->type );
// $stmt->bindParam(':code', $user->code );
// $stmt->bindParam(':name', $user->name );
// $stmt->bindParam(':credit', $user->credit );
// $stmt->bindParam(':code1', $user->code1 );
// $stmt->bindParam(':credit1', $user->credit1 );
// $stmt->bindParam(':name1', $user->name1 );
// $stmt->bindParam(':approve_status', $user->approve_status );
// if($stmt->execute()) {
//     $response = ['status' => 1, 'message' => 'Record created successfully.'];
// } else {
//     $response = ['status' => 0, 'message' => 'Failed to create record.'];
// }
// echo json_encode($response);