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

$username = $_GET["username"];
$password = $_GET["password"];

$sql = "SELECT * FROM aru WHERE username ='$username' AND  password = '$password'";
$result= mysqli_query($conn,$sql);

if(mysqli_num_rows($result) === 1) {
  $row=mysqli_fetch_assoc($result);
  if($row['username'] === $username && $row['password'] === $pass) {
    echo "logged on";
    header("location: aru11.html");
    exit();
  }
}
else {
  header("location: login.html")
  exit()
}

?>
