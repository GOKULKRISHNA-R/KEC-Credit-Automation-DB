<?php 

	
// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Methods: *");
	
// 	include 'DbConnect.php';
// 	$objDb = new DbConnect;
//   $conn = $objDb->connect();

// 	if(mysqli_connect_error()){
// 		echo mysqli_connect_error();
// 		exit();
// 	}
// 	else{
//     $user = json_decode( file_get_contents('php://input') );
//     echo "$user->roll";
//     $sql = "SELECT * FROM opted_in INNER JOIN college_courses ON opted_in.course_code=college_courses.course_code";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(':roll', $user->roll);
    
//     $stmt->execute();
//     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($users);
// 	}
?>
