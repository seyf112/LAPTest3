<!--Using Object Oriented-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtaInventory";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$ProdCode=mysqli_real_escape_string($conn,$_GET['ProdCode']);
$sql = "DELETE FROM tblproduct WHERE ProdCode = '$ProdCode'";
if ($conn->query($sql) === TRUE) 
{
header("Location: listInventory.php");
} 
else 
{
echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>