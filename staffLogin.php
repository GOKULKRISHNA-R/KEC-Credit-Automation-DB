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
		$email = $user->email ?? "none";
		$password = $user->password ?? "none";
		
    $sql = "SELECT * FROM staff WHERE email= '$email' AND password = '$password';";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($users);

	}

?>
