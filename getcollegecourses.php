<?php 

	
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
	
	include 'DbConnect.php';
	$objDb = new DbConnect;
  $conn = $objDb->connect();

	if(mysqli_connect_error()){
		echo mysqli_connect_error();
		exit();
	}
	else{
    $user = json_decode( file_get_contents('php://input') );
	$name = $user->roll ?? "none";
    // echo "$name";
    $sql = "SELECT * FROM previous_records WHERE roll_no= '$name' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);
	}
?>
