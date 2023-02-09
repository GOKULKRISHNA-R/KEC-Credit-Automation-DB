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
$Array = $user->course_is_for;
sort($Array);
$str = implode(',',$Array);

echo $str ;

$sql = "INSERT INTO college_courses(course_code,course_name,course_duration,course_credit,course_is_for,offered_by,fee,faculty_type,faculty_name) VALUES(:code, :name, :weeks, :credits, :course_is_for, :email,:fee, :facultytype,:facultyname)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':code', $user->code);
$stmt->bindParam(':name', $user->name );
$stmt->bindParam(':weeks', $user->weeks );
$stmt->bindParam(':credits', $user->credits );
$stmt->bindParam(':course_is_for', $str );
$stmt->bindParam(':email', $user->email );
$stmt->bindParam(':fee', $user->fee );
$stmt->bindParam(':facultytype', $user->facultytype );
$stmt->bindParam(':facultyname', $user->facultyname );

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);


// ALTER TABLE `college_courses` ADD `marksheet` VARCHAR(500) NOT NULL AFTER `offered_by`;
// DELETE FROM college_courses WHERE `course_duration` = 44 ;
//ALTER TABLE `college_courses` ADD PRIMARY KEY(`course_code`);
// ALTER TABLE college_courses DROP COLUMN `marksheet`;