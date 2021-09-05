<?php
	$Name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$meassage = $_POST['message'];

	// Database connection
	$conn = new mysqli('sql200.epizy.com','epiz_28961581','326P2QKWT8W9','epiz_28961581_data');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into datasheet(name, email, subject, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Name, $email, $subject, $meassage);
		$execval = $stmt->execute();
		echo $execval;

		echo '<script>alert("Thankyou for the contact us!")</script>';

		$stmt->close();
        $conn->close();
    }
?>