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

$sql = "INSERT INTO exemption(roll	,semester,	type_of_course,	academic_course_code,	academic_course_name,	academic_course_credit,	course_code,	course_credit,	course_name,	approve_status,	course_code2,	course_name2,	course_credit2	,used_credit1,	used_credit2) 
VALUES(:roll	,:semester	,:type_of_course	,:academic_course_code	,:academic_course_name	,:academic_course_credit	,:course_code	,:course_credit	,:course_name	,:approve_status	,:course_code2	,:course_name2	,:course_credit2	,:used_credit1	,:used_credit2	)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':roll', $user->roll);
$stmt->bindParam(':semester', $user->sem  );
$stmt->bindParam(':type_of_course', $user->type );
$stmt->bindParam(':academic_course_code', $user->code );
$stmt->bindParam(':academic_course_name', $user->name );
$stmt->bindParam(':academic_course_credit', $user->credit );
$stmt->bindParam(':course_credit', $user->credit1 );
$stmt->bindParam(':approve_status', $user->approve_status );
$stmt->bindParam(':course_name', $user->name1 );
$stmt->bindParam(':course_code', $user->code1 );
$stmt->bindParam(':used_credit1', $user->usedcredit1 );
$stmt->bindParam(':course_code2', $user->code2 );
$stmt->bindParam(':course_name2', $user->name2 );
$stmt->bindParam(':course_credit2', $user->credit2 );
$stmt->bindParam(':used_credit2', $user->usedcredit2 );

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);

