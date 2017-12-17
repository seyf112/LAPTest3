
<?php 
session_start(); 
if(!isset($_SESSION["username"])) 
{ 
       header("Location: index.php"); 
} 
?> 
<!--End of Security--> 

<!--Using Procedural --> 
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
$UnitPrice= mysqli_real_escape_string($conn,$_POST['UnitPrice']);
         
   
$update_Prod = "Update tblProduct set ProdCode= '$ProdCode',ProdName='$ProdName', ProdDesc='$ProdDesc', Category='$Category',Quantity='$Quantity',UnitPrice='$UnitPrice' where ProdCode='$ProdCode' "; 
       
if (mysqli_query($conn, $update_Prod))  
{ 
echo '<div class="alert alert-success"> 
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
 <center> <strong>Success!</strong> record is updated successfully. </center>
</div> '; 
}  
else  
{ 
echo '<div class="alert alert-info"> 
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
  <strong>Warning!</strong> record is not Updated. 
</div> '; 
} 
} 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></marque> Inventory Registration System</marque> </title>
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

                <a class="navbar-brand" href=" index.php">Inventory Registration System</a>
            </div> 
           <!--end of header -->
<ul class="nav  navbar-top-links navbar-right"> <!-- start of Right Navbar -->


            
          


	</ul><!-- end of the Right NavBar-->


<!-- start of Sidebar-->
<div class="navbar-default sidebar" role="navigation">
     <div class="sidebar-nav navbar-collapse"><!-- start of Sidebar Collapse-->
	  <ul class="nav" id="side-menu"> <!-- start of Side Menu-->

<li>
                           <a href="main.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    
                    
                   

	</ul> <!-- endof Side Menu-->
</div> <!-- end of Sidebar Collapse-->
</div><!-- end of Sidebar-->




</nav><!--end of NavBar -->
 
 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10">
                    
                         <h2 class="page-header">Edit Inventory
                    </div>
                </div>
            </div>
             <!-- Insert the Panel Below -->
			 <!-- Start of the Panel--> 
   

			 <!-- Start of the Panel--> 
   <div class="container"> 
         <div class="row"> 
               <div class="col-md-8"> 
           
              <div class=" panel panel-green"> 
          <div class="panel-heading">Update products</div> 
          <div class="panel-body"> 
		 		   <form  class="form-horizontal"  action = "<?php $_PHP_SELF ?>" method = "POST">
		  <!--Using Procedural --> 
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
 
if (isset($_GET['ProdCode']) && is_numeric($_GET['ProdCode'])) 
{ 
$ProdCode=mysqli_real_escape_string($conn,$_GET['ProdCode']);

$sql = "SELECT ProdCode, ProdName,ProdDesc,Category,Quantity,UnitPrice from tblProduct WHERE ProdCode='$ProdCode'"; 
$result = mysqli_query($conn, $sql); 
 
if (mysqli_num_rows($result) > 0) { 
$row=mysqli_fetch_assoc($result); 
}
} 
?>

     
<!--StudentNumber Name Label and Text --> 
 <div class="form-group"> 
      <label class="control-label col-sm-2" for="Name"> Prod Code</label> 
     <div class="col-sm-10">
	 <input type="text" value="<?php  echo $row['ProdCode'] ?>"  class="form-control" name="ProdCode"   placeholder="Enter Contact Number" > 
</div> </div>
 
 
<div class="form-group"> 
      <label class="control-label col-sm-2" for="Name">Prod Name</label> 
	  <div class="col-sm-10">
      <input type="text" value="<?php  echo $row['ProdName'] ?>"  class="form-control" name="ProdName"   placeholder="Enter FathersName"> 
</div> </div> 
 
 
 <div class="form-group"> 
      <label class="control-label col-sm-2" for="Name">Prod Desc</label> 
      <div class="col-sm-10">
	  <input type="text"  value="<?php  echo $row['ProdDesc'] ?>" class="form-control" name="ProdDesc"   placeholder="Enter GivenName" > 
</div> </div>
 
 <div class="form-group">
        <label class="control-label col-sm-2" for="Department"> Category </label>
		<div class="col-sm-10"> 
        <select class="form-control" name="Category" required>
		<option> </option>
        <option>ICT Equipment</option>
        <option>Auto Equipment</option>
		<option>Manuf Equpmnt</option>
        <option>Const Equpmnt</option>
        <option>Other Equpmnt</option>
        </select>
        </div>
		</div>
 
 <div class="form-group"> 
      <label class="control-label col-sm-2" for="Name">Quantity</label> 
      <div class="col-sm-10">
	  <input type="text" value="<?php  echo $row['Quantity'] ?>" class="form-control" name="Quantity"   placeholder="Enter Department" > 
</div> </div>

 <div class="form-group"> 
      <label class="control-label col-sm-2" for="Name">UnitPrice</label> 
       <div class="col-sm-10">
	  <input type="text" value="<?php  echo $row['UnitPrice'] ?>"  class="form-control" name="UnitPrice"   placeholder="Enter MobileNo" > 
</div>  </div>

<!-- Submit and Reset Button --> 
<div class="form-group"> 
<div class="col-sm-10 col-sm-offset-2"> 
    <button type="submit" class="btn btn-danger btn-social" name="submit"><i class="fa fa-home"></i>Update Inventory </button> 
  <button type="reset" class="btn btn-danger btn-social" name="reset"><i class="fa fa-home"></i>Clear</button> 
</div>


             </form> 
             </div> 
			 
             <div class="panel-footer"> <center> <b>Please Fill-up all necessary Information </b> </center> </div> 
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
