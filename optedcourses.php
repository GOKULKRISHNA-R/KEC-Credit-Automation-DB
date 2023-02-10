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
if ($user === NULL) {
        return false;
    }
$array = $user->course_code;

$sql = "INSERT INTO opted_in(student_roll,course_id) VALUES(:code, :course)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':code', $user->student_id);
$stmt->bindParam(':course', $user->course_code);
try{if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {

    $response = ['status' => -1, 'message' => 'Failed to create record.'];
}}
catch(Exception $e){
        $response = ['status' => 0, 'message' => 'Failed to create record.'];
        
}
    

echo json_encode($response);


// ALTER TABLE `college_courses` ADD `marksheet` VARCHAR(500) NOT NULL AFTER `offered_by`;
// DELETE FROM college_courses WHERE `course_duration` = 44 ;
//ALTER TABLE `college_courses` ADD PRIMARY KEY(`course_code`);
