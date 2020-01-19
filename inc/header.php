<?php include "lib/custSession.php";
	custSession::checkSession();
?>


<?php
include "config/config.php";
include "lib/custData.php";
include "helper/custFormat.php";

$db = new custData();
$fm = new custFormat();
?>

<?php 

    if (isset($_GET['action']) AND $_GET['action']=='logout')
	{
        custSession::destroy();
    }

?>
 
 
<!DOCTYPE html>
<html>
<head>
	<title>Secured Ticketing Solutions</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css">
	<!--w3 css-->
    <link rel="stylesheet" type="text/css" href="css/w3.css">
    <link rel="stylesheet" type="text/css" href="css/body_style.css">
	<!--for jQuery-->
    <link rel="stylesheet" href="jquery-ui/jquery-ui.css">
    <script src="jquery-ui/jquery.js"></script>
    <script src="jquery-ui/jquery-ui.js"></script>
	<!--external css-->
</head>

<body>

        <?php 

           $user_tbl_id=custSession::get('id');

            $query="SELECT * FROM cust_users WHERE id='$user_tbl_id'";
            $ur=$db->select($query);

            $ud=$ur->fetch_assoc();

            $f_name         =$ud['user_full_name'];
            $user_name      =$ud['user_name'];
            $user_email     =$ud['user_email'];
            $user_contact   =$ud['user_contact'];
            $user_role      =$ud['user_role'];
            $user_level     =$ud['user_level'];
            $service_name   =$ud['service_name'];	
            $user_cr_date   =$ud['user_cr_date'];
            $user_pass      =$ud['user_pass'];
            $u_id           =$ud['id'];

		?>
		
		
		<ul class="w3-navbar w3-indigo">
		<li><a href="index.php"><span class="glyphicon glyphicon-home"></span> HOME </a></li>
		<li class="w3-dropdown-hover w3-hover-grey">
			
			<!-- HOME Option for All -->
			<!-- HOME Option for All -->
			<!-- HOME Option for All -->
			<!-- HOME Option for All -->
			<!-- HOME Option for All -->
			

<!---------------------H FIBER--------------------------->



	<!------------------------CS----------------------------->
<?php
if($service_name=='H-Fiber' AND $user_role=='CS' AND $user_level=='Agent')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create Workorder</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">Create New Connection</a>
	</div>
	</li>
<?php } ?>

<?php
if($service_name=='H-Fiber' AND $user_role=='CS' AND $user_level=='TL')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create Workorder</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">Create New Connection</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">Workorder Dashboard</a>
</div>
</li>

	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-list"></span> REPORTS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="index.php">GPON Workorder Reports</a>
	<a class="w3-border-bottom"href="hfiber_reports.php">H-Fiber Workorder Reports</a>
	<a class="w3-border-bottom"href="gpon_upload.php">Upload GPON Customer Base</a>
	<a class="w3-border-bottom"href="hfiber_upload.php">Upload H-Fiber Customer Base</a>
</div>
</li>

<?php } ?>
	<!------------------------CS----------------------------->

	
	<!------------------------FS----------------------------->
<?php
if($service_name=='H-Fiber' AND $user_role=='FS' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">Create New Connection</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------FS----------------------------->
	
	
	<!------------------------RF----------------------------->
<?php
if($service_name=='H-Fiber' AND $user_role=='RF' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="hfiber_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------RF----------------------------->	


<!---------------------H FIBER--------------------------->



<!-----------------------GPON---------------------------->
	<!------------------------CS----------------------------->
<?php
if($service_name=='GPON' AND $user_role=='CS' AND $user_level=='Agent')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create Workorder</a>
</div>
</li>
<?php } ?>

<?php
if($service_name=='GPON' AND $user_role=='CS' AND $user_level=='TL')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create Workorder</a>
	<a class="w3-border-bottom"href="gpon_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------CS----------------------------->

	
	<!------------------------FS----------------------------->
<?php
if($service_name=='GPON' AND $user_role=='FS' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------FS----------------------------->
	
	
	<!------------------------RF----------------------------->
<?php
if($service_name=='GPON' AND $user_role=='RF' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------RF----------------------------->	
	
	
	<!------------------------L2----------------------------->
<?php
if($service_name=='GPON' AND $user_role=='L2')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">Workorder Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------L2----------------------------->	
<!-----------------------GPON---------------------------->



<!------------------------ISP----------------------------->
	<!------------------------CS----------------------------->
<?php
if($service_name=='ISP' AND $user_role=='CS' AND $user_level=='TL')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create GPON Workorder</a>
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create H-Fiber Workorder</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">New H-Fiber Connection Workorder</a>
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
</div>
</li>


<?php } ?>

<?php
if($service_name=='ISP' AND $user_role=='CS' AND $user_level=='Agent')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create GPON Workorder</a>
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create H-Fiber Workorder</a>
</div>
</li>
<?php } ?>
	<!------------------------CS----------------------------->
	
	<!------------------------RF----------------------------->
<?php
if($service_name=='ISP' AND $user_role=='RF' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------RF----------------------------->	
	
	<!------------------------FS----------------------------->
<?php
if($service_name=='ISP' AND $user_role=='FS' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">Hfiber New Connection</a>
</div>
</li>
<?php } ?>
	<!------------------------FS----------------------------->
<!------------------------ISP----------------------------->


<!------------------------ALL----------------------------->
	<!------------------------CS----------------------------->
<?php
if($service_name=='ALL' AND $user_role=='CS' AND $user_level=='TL')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create GPON Workorder</a>
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create H-Fiber Workorder</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">New H-Fiber Connection Workorder</a>
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
</div>
</li>
<?php } ?>

<?php if($service_name=='ALL' AND $user_role=='CS' AND $user_level=='Agent')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create GPON Workorder</a>
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create H-Fiber Workorder</a>
</div>
</li>
<?php } ?>
	<!------------------------CS----------------------------->
	
	<!------------------------RF----------------------------->
<?php
if($service_name=='ALL' AND $user_role=='RF' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">	
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
</div>
</li>
<?php } ?>
	<!------------------------RF----------------------------->	
	
	<!------------------------FS----------------------------->
<?php
if($service_name=='ALL' AND $user_role=='FS' AND $user_level=='Co-Ordinator')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">Hfiber New Connection</a>
</div>
</li>
<?php } ?>
	<!------------------------FS----------------------------->
<!------------------------ALL----------------------------->


<!------------------------ADMIN----------------------------->
<?php
if($user_role=='ADMIN')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> WORK ORDERS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="gpon_workorder.php">Create GPON Workorder</a>
	<a class="w3-border-bottom"href="hfiber_workorder.php">Create H-Fiber Workorder</a>
	<a class="w3-border-bottom"href="hfiber_new_workorder.php">New H-Fiber Connection Workorder</a>
	<a class="w3-border-bottom"href="gpon_dashboard.php">GPON Dashboard</a>
	<a class="w3-border-bottom"href="hfiber_dashboard.php">H-Fiber Dashboard</a>
</div>
</li>

	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-list"></span> REPORTS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="index.php">GPON Workorder Reports</a>
	<a class="w3-border-bottom"href="hfiber_reports.php">H-Fiber Workorder Reports</a>
	<a class="w3-border-bottom"href="gpon_upload.php">Upload GPON Customer Base</a>
	<a class="w3-border-bottom"href="hfiber_upload.php">Upload H-Fiber Customer Base</a>
</div>
</li>

	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-list"></span> SETTINGS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="create_users.php">Create New Users</a>
	<a class="w3-border-bottom"href="index.php">Closed Workorder Report</a>
	<a class="w3-border-bottom"href="index.php">Pending Workorder Report</a>
	<a class="w3-border-bottom"href="gpon_upload.php">Upload GPON Customer Base</a>
	<a class="w3-border-bottom"href="hfiber_upload.php">Upload H-Fiber Customer Base</a>
</div>
</li>

<!------------------------ADMIN----------------------------->

<!-------------------------MIS------------------------------>
<?php
if($user_role=='MIS')
{ ?>
	<li class="w3-dropdown-hover w3-hover-grey">
	<a class="w3-hover-grey" href="#"><span class="glyphicon glyphicon-folder-open"></span> REPORTS</a>
	<div class="w3-dropdown-content w3-sand w3-card-2" style="z-index:9999;">
	<a class="w3-border-bottom"href="index.php">Created WorkOrder Report</a>
	<a class="w3-border-bottom"href="index.php">Closed Workorder Report</a>
	<a class="w3-border-bottom"href="index.php">Pending Workorder Report</a>
	<a class="w3-border-bottom"href="gpon_upload.php">Upload GPON Customer Base</a>
	<a class="w3-border-bottom"href="hfiber_upload.php">Upload H-Fiber Customer Base</a>
</div>
</li>
<!-------------------------MIS------------------------------>
<?php } ?>

<?php } ?>
<li class="w3-right"><a href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
<li class="w3-right"><a href="profile.php"><span class="glyphicon glyphicon-user"></span> Hello: <?php echo $f_name; ?></a></li>
</ul>	

<div class="container">