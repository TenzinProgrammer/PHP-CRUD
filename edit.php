<?php
require_once("connect.php");

// Retrieve the profile ID from the POST request
if (isset($_POST['id'])) {
    $profile_id = intval($_POST['id']);
    $query = "select * from profile where id=".$profile_id;
    $result = mysqli_query($connection, $query);
    if($result && mysqli_num_rows($result) > 0) {
    	$profile = mysqli_fetch_assoc($result);

        // Display the form for editing the profile
        echo '<form method="post" action="save_edit.php">';
        echo '<input type="hidden" name="id" value="' . htmlspecialchars($profile['id']) . '">';
        echo '<label for="fname">First Name:</label>';
        echo '<br>';
        echo '<input type="text" name="fname" value="' . htmlspecialchars($profile['fname']) . '">';
        echo '<br>';
        echo '<label for="lname">Last Name:</label>';
        echo '<br>';
        echo '<input type="text" name="lname" value="' . htmlspecialchars($profile['lname']) . '">';
        echo '<br>';
        echo '<label for="gender">Gender:</label>';
        echo '<br>';
        echo '<input type="text" name="gender" value="'.htmlspecialchars($profile['gender']).'">';
        echo '<br>';
        echo '<label for="birth">Birth Place:</label>';
        echo '<br>';
        echo '<input type="text" id="birth" name="birth" value="'.htmlspecialchars($profile['birth']).'">';
        echo '<br>';
        echo '<label for="city">City:</label>';
        echo '<br>';
        echo '<input type="text" id="city" name="city" value="'.htmlspecialchars($profile['city']).'">';
        echo '<br>';
        echo '<label for="state">State:</label>';
        echo '<br>';
        echo '<input type="text" id="state" name="state" value="'.htmlspecialchars($profile['state']).'">';
        echo '<br>';
        echo '<label for="picture">Picture</label>';
        echo '<br>';
        echo '<input type="file" name="picture" accept="image/*">';
        echo '<br>';
        // Add more input fields for other profile details as necessary
        echo '<br>';
        echo '<input type="submit" value="Save Changes">';
        echo '</form>';
    } else {
        // Profile not found
        echo 'Profile not found';
    }

    // Close the prepared statement
    mysqli_free_result($result);
} else {
    // No profile ID provided
    echo 'No profile ID provided';
}

// Close the connection
mysqli_close($connection);
?>
