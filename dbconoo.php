<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myDB";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn-> connect_error) {
die("Connection failed: " . $conn-> connect_error);
}
if (isset($_REQUEST['submit']))
{
extract($_REQUEST);
$uname = mysqli_real_escape_string($conn,$_POST['username']);
$pword= md5(mysqli_real_escape_string($conn, $_POST['password']));
$sql="SELECT * from tbllogin WHERE username='$uname' and password='$pword'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
$row = $result->fetch_assoc();
$_SESSION['ID'] = $row['ID'];
$_SESSION['username'] = $row['username'];
header("location: main.php");
}
else
{
echo 'Invalid Username or Password';
}
}
$conn->close();
?>