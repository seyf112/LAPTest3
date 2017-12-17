
<?php
session_start();
if(!isset($_SESSION["username"]))
{
header("Location: index.php");
}
?>
<!--End of Security-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtaInventory";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
$uid = $_SESSION['ID'];
if (isset($_REQUEST['submit']))
{
extract($_REQUEST);
$password= md5(mysqli_real_escape_string($conn, $_POST['currentpass']));
$newpass= md5(mysqli_real_escape_string($conn, $_POST['newpass']));
$newpass2= md5(mysqli_real_escape_string($conn, $_POST['newpass2']));
if ($newpass!=$newpass2)
{
echo 'Your New Password is not the same with the Confirmation Password';
}
else
{
$sql = "SELECT ID from tbl_login WHERE ID='$uid' and password='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0)
{
$row=mysqli_fetch_assoc($result);
$update = "update tbl_login SET password='$newpass' where ID='$uid'";
if (mysqli_query($conn, $update))
{
echo '<center>Your Password Successfully Updated</center>';
}
}
else
{
echo 'Your Current Password is not Correct';
}
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inventory Registration System</title>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
<link href="vendor/bootstrap-social/bootstrap-social.css" rel="stylesheet">
<link href="dist/css/customized.css" rel="stylesheet">
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"> 

</head>

<body>



<div class="wrapper"> <!--start of wrapper-->

<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0"> <!--start NavBar -->

<!-- Header -->
            <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
</button>

                <a class="navbar-brand" href=" index.php">Inventory registration System</a>
            </div> 
           <!--end of header -->
<ul class="nav  navbar-top-links navbar-right"> <!-- start of Right Navbar -->

<!-- About Menu -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Account
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                     
                        <li><a href="changePassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </ul>
          	</li>
            <!-- end of About  Menu-->
            
          


	</ul><!-- end of the Right NavBar-->


<!-- start of Sidebar-->
<div class="navbar-default sidebar" role="navigation">
     <div class="sidebar-nav navbar-collapse"><!-- start of Sidebar Collapse-->
	  <ul class="nav" id="side-menu"> <!-- start of Side Menu-->

<li>
                           <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

<!-- start of Menu with Multi Level Dropdown-->
<li>
<a href="#"><i class="fa fa-sitemap fa-fw"></i> Inventory Registration<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                		<li>
                                    	<a href="listInventory.php">List of  Inventory</a>
                                </li>
                                
                                <li>
                                    	<a href="addInventory.php">Add New Inventory</a>
                                </li>
                                
                             
                             <!-- start of Menu with Multi Level Dropdown-->

           
</ul>                           
</li>
<!-- end of Menu with Multi Level Dropdown-->

<!-- start of Menu with Dropdown-->
<li>
<a href="#"><i class="glyphicon glyphicon-user fa-fw"></i> My Account<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
             		
                           <li>
                                    <a href="ChangePassword.php">Change Password</a>
                           </li>
                           <li>
                                    <a href="Logout.php">Logout</a>
                           </li>
</ul>          
</li>
<!-- end of Menu with Dropdown-->

	</ul> <!-- endof Side Menu-->
</div> <!-- end of Sidebar Collapse-->
</div><!-- end of Sidebar-->




</nav><!--end of NavBar -->
 
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                         <h2 class="page-header">Change Password</h2>
                    </div>
                </div>
            </div>
             <!-- Insert the Panel Below -->
             <!-- Start of the Panel-->
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-2 ">
<div class=" panel panel-green">
<div class="panel-heading">Change Password</div>
<div class="panel-body">
<form class="form-horizontal" action = "<?php $_PHP_SELF ?>" method = "POST">
<!--Current Password-->
<div class="form-group">
<label class="control-label col-sm-2" for="name">Current Password</label>
<div class="col-sm-10">
<input type="password" value ="" class="form-control" name="currentpass" required>
</div>
</div>
<!--New Password-->
<div class="form-group">
<label class="control-label col-sm-2" for="name">New Password </label>
<div class="col-sm-10">
<input type="password" value ="" class="form-control" name="newpass" required>
</div>
</div>
<!--Confirm Password-->
<div class="form-group">
<label class="control-label col-sm-2" for="name"> Confirm New Password </label>
<div class="col-sm-10">
<input type="password" value ="" class="form-control" name="newpass2" required>
</div>
</div>
<!--Update and Reset Button-->
<div class="form-group"> 
<div class="col-sm-10 col-sm-offset-2"> 
    <button type="submit" class="btn btn-danger btn-social" name="submit"><i class="fa fa-home"></i>Update  </button> 
  <button type="reset" class="btn btn-danger btn-social" name="reset"><i class="fa fa-home"></i>Clear</button> 
</div>
</form>
</div>
<div class="panel-footer"> Type your Current and New Password</div>
</div>
</div>
</div>
</div>
<!-- End of the Panel-->
             
        </div> 
<!-- End of Page Content -->

 
 


</div> <!-- end of wrapper-->






</body>
<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/metisMenu/metisMenu.min.js"></script>

<script src="dist/js/customized.js"></script>

</html>