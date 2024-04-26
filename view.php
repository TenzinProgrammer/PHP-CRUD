<html>
<head>
	<style>
		table {
			border:1px solid red;
			border-collapse: collapse;
			padding:10px;
			width:100%;
			text-align: center;
		}
		th {
			border:1px solid red;
			text-align: left;
			background-color:#f2f2f2;
		}
		td {
			border: 1px solid red;
			padding:2px;
		}
	</style>
</head>
<body>
	<p><center><strong>Profile of People who are registered.</strong></center></p>
	<h5>we welcome everyone to be connected with us.
        <a href="edit_profile.php" style="text-decoration: none;"><button type="button">Add New User</button></a></h5>
</body>
</html>
<?php
 require_once("connect.php");
 $query = "select * from profile";
 $result = mysqli_query($connection, $query);
 if($result) {
 	echo '<table>';
 	echo '<thead>';
 	echo '<tr>';
 	echo '<th>First Name</th>';
 	echo '<th>Last Name</th>';
 	echo '<th>Gender</th>';
 	echo '<th>Birth Date</th>';
 	echo '<th>City</th>';
 	echo '<th>State</th>';
 	echo '<th>Image</th>';
 	echo '<th>Edit Data</th>';
 	echo '<th>Remove</th>';
 	echo '</tr>';
 	echo '</thead>';
 	while($row = mysqli_fetch_array($result)) {
 		echo '<tr>';
 		echo '<td>'.$row['fname'].'</td>';
 		echo '<td>'.$row['lname'].'</td>';
 		echo '<td>'.$row['gender'].'</td>';
 		echo '<td>'.$row['birth'].'</td>';
 		echo '<td>'.$row['city'].'</td>';
 		echo '<td>'.$row['state'].'</td>';
 		echo '<td><img src="'.htmlspecialchars($row['picture']) . '" alt="Profile Image" style="width:40px;height:30px;"></td>';
 		echo '<td>';
 		echo '<form method="post" action="edit.php">';
 		echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) .'">';
 		echo '<input type="submit" value="Edit Data">';
 		echo '</form>';
 		echo '</td>';
 		echo '<td>';
 		echo '<form method="post" action="delete.php">';
 		echo '<input type="hidden" name="id" value="' . htmlspecialchars($row['id']) .'">';
 		echo '<input type="submit" value="Delete">';
 		echo '</form>';
 		echo '</td>';
 		echo '</tr>';
 	}
 	echo '</table>';
 } else {
 	echo 'error';
 }
?>