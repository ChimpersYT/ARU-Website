<?php

$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "aru";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}

if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {

	function validate($data){
  $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
  $email = validate($_POST['email']);

	if (empty($username) || empty($password) || empty($email)) {
		header("Location: aru.html");
	}else {

		$sql = "INSERT INTO aru(username, password, email) VALUES('$username', '$password','$email')";
		$res = mysqli_query($conn, $sql);

		if ($res) {
			echo "Your message was sent successfully!";
      header("Location: aru11.html");
		}else {
			echo "Your message could not be sent!";
		}
	}

}else {
	header("Location: Login.html");
}
?>
