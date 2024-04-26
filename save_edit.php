<?php
 require_once('connect.php');
 if(!empty($_POST['fname']) || !empty($_POST['lname']) || !empty($_POST['gender']) || !empty($_POST['birth']) || !empty($_POST['city']) || !empty($_POST['state']) || !empty($_FILES['picture'])) {

 	$fname = $_POST['fname'];
 	$lname = $_POST['lname'];
 	$gender = $_POST['gender'];
 	$birth = $_POST['birth'];
 	$city = $_POST['city'];
 	$state = $_POST['state'];
 	$picture = $_FILES['picture'];
 	//transfer the image file in the folder
 	$targetDirectory = "images/";
 	$targetFile = $targetDirectory.basename($picture['name']);

 	if(move_uploaded_file($picture['tmp_name'], $targetFile)) {
 		$query = "insert into profile(fname, lname, gender, birth, city, state, picture) values('$fname', '$lname', '$gender', '$birth', '$city', '$state', '$targetFile')";
 		$result = mysqli_query($connection, $query);
 		if($result) {
 		echo 'record saved.';
 	} else {
 		echo 'record not saved.';
 	}
  } 	
 } else {
 	echo 'fill the form.';
 }
 mysqli_close($connection);
?>