<html>
<head>
	<title>edit profile</title>
	<style>
		form {
			border: 1px solid teal;
			padding: 10px;
			max-width: 270px;
		}
		.form-group {
			margin-bottom: 10px;
            margin-top: 10px;
			overflow:hidden;
		}
		.form-group label {
			float:left;
			width: 90px;
			text-align:right;
			margin-right: 10px;
			line-height: 26px;
		}
		.form-group input[type="text"],
		.form-group input[type="date"],
		.form-group input[type="file"] {
			width: 150px;
			float:left;
		}
	</style>
</head>
<body>
	<h2>Edit Profile (MisMatch.com)</h2>
    <form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" id="fname" name="fname">
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname">
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="birth">Birth Date:</label>
            <input type="date" id="birth" name="birth">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" id="city" name="city">
        </div>
        <div class="form-group">
            <label for="state">State:</label>
            <input type="text" id="state" name="state">
        </div>
        <div class="form-group">
            <label for="pic">Picture:</label>
            <input type="file" id="pic" name="pic" accept=".jpeg, .jpg, .png, .pdf">
        </div><hr/>
        <div class="form-group">
            <input type="submit" name="submit" value="Save Profile">
        </div>
    </form>
    <?php
     require_once("connect.php");
     if(isset($_POST['submit'])) {
        //get data from the form into $_POST array
     	$fname = mysqli_real_escape_string($connection, trim($_POST['fname']));
        $lname = mysqli_real_escape_string($connection, trim($_POST['lname']));
        $gender = mysqli_real_escape_string($connection, trim($_POST['gender']));
        $birth = mysqli_real_escape_string($connection, trim($_POST['birth']));
        $city = mysqli_real_escape_string($connection, trim($_POST['city']));
        $state = mysqli_real_escape_string($connection, trim($_POST['state']));
        $picture = $_FILES['pic'];

        if(empty($fname) || empty($lname) || empty($gender) || empty($birth) || empty($city) || empty($state) || empty($picture['name'])) {
        echo 'Please fill all the required fields.';
        } else {
            $targetDirectory = "images/";
            $targetFile = $targetDirectory.basename($picture['name']);
            if(move_uploaded_file($picture['tmp_name'], $targetFile)) {
                $query = "insert into profile(fname, lname, gender, birth, city, state, picture) values ('$fname', '$lname', '$gender', '$birth', '$city', '$state', '$targetFile')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                echo 'insert operation failed.';
            }   else {
                echo 'well done ! record inserted.';
            }
          } else {
            echo 'sorry, there was an error uploading your file.';
          }
        }
     } else {
        echo 'form not submitted.';
     }
    ?>
</body>
</html>