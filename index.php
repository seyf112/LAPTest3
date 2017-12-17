<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtaInventory";
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
$sql="SELECT * from tbl_login WHERE username='$uname' and password='$pword'";
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
echo '<center><div class="alert alert-danger">
<strong>Danger!</strong> You should <a href="#" class="alert-link">invalid username or password</a>.
</div></center>';
}
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ICT Login</title>

   <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="dist/css/customized.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 



</head>

<body>

      <div class="container-fluid">
   <div class="row">
       <div class="col-md-4 col-md-offset-4">  
              
          <div class=" panel panel-green login-panel ">
             <div class="panel-heading">Please Login</div>
  	 <div class="panel-body">
  
               <form  class="form-horizontal" action = "<?php $_PHP_SELF ?>" method = "POST" id="loginForm">

     	 <!-- ID Number Label and Text -->
<div class="form-group">
  <label class="control-label col-sm-2" for="name"> Username</label>
  <div class="col-sm-10">
  	  <input type="text" class="form-control" name="username" placeholder="Enter Your Username" required >
</div>
</div>

<!--Student Name Label and Text -->
<div class="form-group">
  	  <label class="control-label col-sm-2" for="Name">Password</label>
	   <div class="col-sm-10">
  	  <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
</div>
</div>



<!-- Submit and Reset Button -->
<div class="form-group" align="right">
<div class="col-sm-10 col-sm-offset-2">
  	  <button type="submit" class="btn btn-success btn-social" name="submit"><i class="fa fa-home"></i>Login Now
                            </button>
  <button type="clear" class="btn btn-success btn-social" name="reset"><i class="fa fa-trash-o"></i>Clear 
                            </button>
</div>

  	</form>
  
</div>
    <div class="panel-footer"> Please fill-up username and password</div>
</div>

      </div>
                
            </div>
            
        </div>
        
        
        <div class="row">
        <div class="col-md-4 col-md-offset-4">
        
       




        </div>
        </div>
        
    </div>
    
    
    


  <script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/metisMenu/metisMenu.min.js"></script>

<script src="dist/js/customized.js"></script>
</body>

</html>
