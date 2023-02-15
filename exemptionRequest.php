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

echo "hiii";


$roll = $user->roll ?? null ;
$sem = $user->sem ?? null ;
$type = $user->type ?? null ;
$code = $user->code ?? null ;
$name = $user->name ?? null ;
$credit = $user->credit ?? null ;
$course_code0 = $user->course_code0 ?? null ;
$tot_credit0 = $user->tot_credit0 ?? null ;
$course_name0 = $user->course_name0 ?? null ;
$approve_status = $user->approve_status ?? null ;
$course_code1 = $user->course_code1 ?? null ;
$course_name1 = $user->course_name1 ?? null ;
$tot_credit1 = $user->tot_credit1 ?? null ;
$used_credit0 = $user->used_credit0 ?? null ;
$used_credit1 = $user->used_credit1 ?? null ;
$course_name2 = $user->course_name2 ?? null ;
$course_code2 = $user->course_code2 ?? null ;
$tot_credit2 = $user->tot_credit2 ?? null ;
$used_credit2 = $user->used_credit2 ?? null ;

echo $roll , "\n" ;
echo $sem , "\n" ;
echo $type , "\n" ;
echo $code , "\n" ;
echo $name , "\n" ;
echo $credit , "\n" ;
echo $course_code0 , "\n" ;
echo $tot_credit0 , "\n" ;
echo $course_name0 , "\n" ;
echo $approve_status , "\n" ;
echo $course_code1 , "\n" ;
echo $course_name1 , "\n" ;
echo $tot_credit1 , "\n" ;
echo $used_credit0 , "\n" ;
echo $used_credit1 , "\n" ;
echo $course_name2 , "\n" ;
echo $course_code2 , "\n" ;
echo $tot_credit2 , "\n" ;
echo $used_credit2 , "\n" ;

 $sql = "INSERT INTO exemption(
         roll,	
         semester,	
         type_of_course,	
         academic_course_code,	
         academic_course_name,	
         academic_course_credit,	
         course_code,	
         course_credit,	
         course_name,	
         approve_status,	
         course_code2,	
         course_name2,	
         course_credit2,	
         used_credit1,	
         used_credit2,	
         request_id,	
         course_name3,	
         course_code3,	
         course_credit3,	
         used_credit3) 
     VALUES( '$roll',
             '$sem',
             '$type',
             '$code',
             '$name',
             '$credit',
             '$course_code0',
             '$tot_credit0',
             '$course_name0',
             '$approve_status',
             '$course_code1',
             '$course_name1',
             '$tot_credit1',
             '$used_credit0',
             '$used_credit1',
             null,
             '$course_name2',
             '$course_code2',
             '$tot_credit2',
             '$used_credit2')";

$stmt = $conn->prepare($sql);

if($stmt->execute()) {
    $response = ['status' => 1, 'message' => 'Record created successfully.'];
} else {
    $response = ['status' => 0, 'message' => 'Failed to create record.'];
}
echo json_encode($response);

