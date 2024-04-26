<?php
 require_once("connect.php");
 if($_SERVER['REQUEST_METHOD'] = 'POST') {
 	//retrieve the id from post
 	$id = $_POST['id'];
 	$query = "delete from profile where id=".(int)$id;
 	$result = mysqli_query($connection, $query);
 	if($result) {
 		echo 'User has been deleted.';
 		header("Location: view.php");
 		exit();
 	} else {
 		echo 'User has not been deleted.';
 	}
 } else {
 	echo 'invalid request.';
 }
 mysqli_close($connection);
?>