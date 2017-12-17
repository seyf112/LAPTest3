<?php
session_start();
if(!isset($_SESSION["username"]))
{
header("Location: index.php");
}
?>
<!--End of Security-->
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
<!-- DataTables CSS-->
<link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
<link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

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

<!-- About Menu -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Account
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                     
                        <li><a href="ChangePassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>  
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
                    
                
                        
                  </ul>
								
					
                    
                 
					

<li>
<a href="addInventory.php"><i class="fa fa-sitemap fa-fw"></i> Inventory<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                		<li>
                                    	<a href="listInventory.php">List of Inventory</a>
                                </li>
                                
                                <li>
                                    	<a href="addInventory.php">Add New Inventory</a>
                                </li>

</ul>
</li>





<!-- start of Menu with Dropdown-->
<li>
<a href="ChangePassword.php"><i class="glyphicon glyphicon-user fa-fw"></i> My Account<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
             		
                           <li>
                                    <a href="ChangePassword.php">ChangePassword</a>
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
 
 <<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
           
                         <h2 class="page-header">Edit Inventory</h2>
                    </div>
                </div>
            </div>
<div class="row">
<div class="col-sm-12">
<div class=" panel panel-green">
<div class="panel-heading">List of Inventory</div>
<div class="panel-body">
<!--Insert the Table Here-->
<!--Start of the Table -->
<table class="table  table-striped table-bordered table-hover " id="datatable">

<thead> <!--Start header of Table -->
<tr class="warning "> 
<th>Prod Code</th>
<th>Prod Name</th>
<th>Prod Descr</th>
<th>Category</th>
<th>Quantity</th>
<th> Unit Price</th>
<th> Total Price </th> 
<th> Operation </th>


</tr>
</thead> <!--End header of Table -->
<tbody>


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
$sql = "SELECT * FROM tblproduct";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
while($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td> <?php echo $row['ProdCode']; ?> </td>
<td> <?php echo $row['ProdName']; ?> </td>
<td> <?php echo $row['ProdDesc']; ?></td>
<td> <?php echo $row['Category']; ?> </td>
<td> <?php echo $row['Quantity']; ?> </td>
<td> <?php echo $row['UnitPrice']; ?> </td>
<td> <?php echo $row['UnitPrice'] * $row['Quantity']; ?> 
</td>
<div class="form-group">
<td>   <button type="button" class="btn btn-danger "  
onClick="window.location.href='invUpdate.php?ProdCode=<?php echo $row['ProdCode']; ?> ' "> Update</button> 
  <button type="button" class="btn btn-danger " onClick="javascript:delete_id(<?php echo $row['ProdCode']; ?>)" >Delete</button>   </td>
     <script type="text/javascript"> 
function delete_id(id) 
{ 
     if(confirm('Are you sure To Remove This Record ?')) 
     { 
            window.location.href='deleteInventory.php?ProdCode='+id; 
     } 
} 
</script>

<?php
}
}
?>
</tbody>
</table>
<!--End of the Table -->
		</div>
		</div>
		</div>
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
<!-- DataTables JavaScript -->
<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
$(document).ready(function() { 
        $('#datatable').DataTable({ 
            responsive: true 
        }); 
    }); 
</script>
</html>