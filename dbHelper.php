<?php
 require_once("connect.php");
 $query = "CREATE TABLE `match` (
    user_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    join_date DATE,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    gender VARCHAR(20),
    birthdate DATE,
    city VARCHAR(20),
    state VARCHAR(30),
    picture VARCHAR(60)
);";
 $result = mysqli_query($connection, $query);
 if($result) {
 	echo 'table create success.';
 } else {
 	echo 'table not created.';
 }
 mysqli_close($connection);
?>