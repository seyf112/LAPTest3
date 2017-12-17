
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
if (isset($_REQUEST['submit']))
{
extract($_REQUEST);
//$EmpID=mysqli_real_escape_string($conn,$_POST['EmpID']);
$ProdCode=mysqli_real_escape_string($conn,$_POST['ProdCode']);
$ProdName = mysqli_real_escape_string($conn,$_POST['ProdName']);
$ProdDesc=mysqli_real_escape_string($conn,$_POST['ProdDesc']);
$Category=mysqli_real_escape_string($conn,$_POST['Category']);
$Quantity=mysqli_real_escape_string($conn,$_POST['Quantity']);
$UnitPrice = mysqli_real_escape_string($conn,$_POST['UnitPrice']);

$insert_Prod = "insert into tblproduct set  ProdCode= '$ProdCode', ProdName='$ProdName', ProdDesc='$ProdDesc', Category='$Category', Quantity='$Quantity', UnitPrice='$UnitPrice'";
if (mysqli_query($conn, $insert_Prod))
{
echo '<center> The record is added or inserted Successfully </center>';
}
else
{
echo 'ProdCode is already exist';
}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Personnel Information System</title>
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

         <a class="navbar-brand" href=" index.php"> Inventory Registration Information System</a>
            </div> 
           <!--end of header -->
<ul class="nav  navbar-top-links navbar-right"> <!-- start of Right Navbar -->

<!-- About Menu -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Account
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                     
                        <li><a href="ChangePassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
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
<a href="addInventory.php"><i class="fa fa-sitemap fa-fw"></i>Inventory Registration<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                		<li>
                                    	<a href="listInventory.php">List of Inventory</a>
                                </li>
                                
                                <li>
                                    	<a href="addInventory.php">Add New Inventory</a>
                                </li>
                                
                             
                             <!-- start of Menu with Multi Level Dropdown-->

                               
                                

</ul>
                           
</li>
<!-- end of Menu with Multi Level Dropdown-->


<li>
<a href="Logout.php"><i class="glyphicon glyphicon-user fa-fw"></i> My Account<span class="fa arrow"></span></a>
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
                    
                         <h2 class="page-header">Add Inventory </h2>
                    </div>
                </div>
            </div>
             <!-- Insert the Panel Below -->
          <!-- Start of the Panel-->
<div class="container">
<div class="row">
<div class="col-md-8">
<div class=" panel panel-green">
<div class="panel-heading"> Inventory Registration Form</div>
<div class="panel-body">

<form  class="form-horizontal"  action = "<?php $_PHP_SELF ?>" method = "POST">

<div class="form-group">
<label class="control-label col-sm-2" for="name">ProdCode</label>
<div class="col-sm-10">
<input type="number" class="form-control" name="ProdCode" placeholder="Enter ProdCode"required>
</div>
</div>

<!--Department Name Label and Text -->
<div class="form-group">
<label class="control-label col-sm-2" for="Name">ProdName</label>
<div class="col-sm-10">
<input type="text" class="form-control" pattern=".{1,25}",minlength="1", maxlength="25"name="ProdName" placeholder="Enter your Product Name" required>
</div>
</div>
<!--Contact NumberLabel and Text -->
<div class="form-group">
<label class="control-label col-sm-2" for="Name">ProdDesc</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="ProdDesc" placeholder="Enter your Product Description(optional)">
</div>
</div>
<!-- Department ID Label and Text -->
<div class="form-group">
        <label class="control-label col-sm-2" for="Department"> Category </label>
		<div class="col-sm-10"> 
        <select class="form-control" name="Category" required>
        <option>ICTEqupmnt</option>
        <option>AutoEqupmnt</option>
		<option>ManufEqupmnt</option>
        <option>ConstrEqupmnt</option>
        <option>OtherEqupmnt</option>
        </select>
        </div>
		</div>
		
<div class="form-group">
<label class="control-label col-sm-2" for="Name">Quantity</label>
<div class="col-sm-10">
<input type="number" class="form-control" name="Quantity" min="0"  max="100" placeholder="Enter Quantity" required>
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-2"for="Name">Unit Price</label>
<div class="col-sm-10">
<input type="number" class="form-control" name="UnitPrice" placeholder="Enter Unit Price" required>
</div>
</div>

<!-- Submit and Reset Button -->
<div class="form-group">
<div class="col-sm-10 col-sm-offset-2">
<button type="submit" class="btn btn-danger btn-social" name="submit"><i class="fa fa-home"></i>Add Inventory</button>
<button type="reset" class="btn btn-danger btn-social" name="reset"><i class="fa fa-trash-o"></i>Clear All</button>
</div>
</div>
</form>
</div>
<div class="panel-footer"> Please Fill-up all necessary Information of Items</div>
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