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

$sql = "SELECT * FROM curriculam WHERE dept= :dept AND regulation=:regulation AND semester=:sem ";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':sem', $user->user_sem  );
$stmt->bindParam(':dept', $user->user_dept  );
$stmt->bindParam(':regulation', $user->user_regulation  );
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($users);

// approve_status

