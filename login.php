<html>
<head>
	<style>
		form {
			border: 1px solid grey;
			padding: 10px;
			width: 40%;
		}
		label {
			margin: 5px;
		}
		.body {
			height:auto;
			width: 100%;
		}
	</style>
</head>
</head>
<body>
	<p>welcome to mismatch site:</p>
	<div class="body">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
	<label for="uname">UserName:</label><br>
	<input type="text" id="uname" name="uname"><br>
	<label for="pass">Password:</label><br>
	<input type="password" id="pass" name="pass"><br>
	<input type="submit" name="submit" value="LogIn"/>
	<input type="submit" name="reg" value="SignUp"/>
</form>
	</div>
<?php
 require_once("connect.php");
 session_start();
 if(isset($_POST['submit'])) {
 	$uname = mysqli_real_escape_string($connection, trim($_POST['uname']));
 	$pass = mysqli_real_escape_string($connection, trim($_POST['pass']));
 	if(empty($uname) || empty($pass)) {
 		echo 'Enter username and password.';
 	} else {
 		//retrieve user info from the database
 		$query = "select * from users where name= '$uname'";
 		$result = mysqli_query($connection, $query);
 		if(mysqli_num_rows($result) == 1) {
 			$row = mysqli_fetch_assoc($result);
 			$hashedPassword = password_hash($row['password'], PASSWORD_BCRYPT);
 			//verify password
 			if(password_verify($pass, $hashedPassword)) {
 				//session start
 				session_start();
 				$_SESSION['username'] = $uname;
 				header("Location: view.php");
 				exit();
 			} else {
 				echo 'wrong password.';
 			}
 		} else {
 			echo 'username does not exits.';
 		}
 	}
 }
?>
</body>
</html>