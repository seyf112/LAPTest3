
<?php
session_start();
if(!isset($_SESSION["username"]))
{
header("Location: index.php");
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

                <a class="navbar-brand" href=" index.php"> Inventory Registration System</a>
            </div> 
           <!--end of header -->
<ul class="nav  navbar-top-links navbar-right"> <!-- start of Right Navbar -->

<!-- About Menu -->
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> My Account
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                     
                        <li><a href="changepassword.php"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
              </ul>
          	</li>
            <!-- end of About  Menu-->
            
          


	</ul><!-- end of the Right NavBar-->


<!-- start of Sidebar-->
<div class="navbar-default sidebar" role="navigation">
     <div class="sidebar-nav navbar-collapse"><!-- start of Sidebar Collapse-->
	  <ul class="nav" id="side-menu"> <!-- start of Side Menu-->

<li>
                    

<!-- start of Menu with Multi Level Dropdown-->
<li>
<a href="#"><i class="fa fa-sitemap fa-fw"></i> Inventory Registration<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                		<li>
                                    	<a href="ListInventory.php">List of Inventory</a>
                                </li>
                </li>
                                
                                <li>
                                    	<a href="AddInventory.php">Add New Inventory</a>
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
                                    <a href="changepassword.php">Change Password</a>
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
                    <div class="col-sm-12">
                    <br>
					
					
                      
 <pre><h1  class="page-header"><center>FEDERAL TVET-INSTITUTE</center> <?php if(isset($_SESSION["username"]))?></h1>
                         <h1> DEPARTMENT OF ICT 1ST YEAR POST GRADUATE PROGRAM</h1>
						<center> <h2> <center> WELCOME TO INVENTORY REGISTERATION SYSTEM </center></h2>
					   <h2> <center>LAP TEST 3</center></h2>
			         <h3> PREPARED BY: SEFUDIN MOHAMMED LIBA </h3>
					        <h3> SUBMITED TO: INSTRUCTOR IRWIN CASENJO</h3>
		                  </center>
                    </div>
                </div>
				</pre>
            </div>
        </div> 
		
<!-- End of Page Content -->

</div> <!-- end of wrapper-->


</body>
<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<script src="vendor/metisMenu/metisMenu.min.js"></script>

<script src="dist/js/customized.js"></script>

</html>