
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

	
	$get_value=$_POST['searchLco'];

	$query="SELECT * FROM cust_lco WHERE lco_code LIKE '$get_value' lIMIT 1 ";
	$result=$db->select($query);

	if ($result) {

		while ($value=$result->fetch_assoc()) {
			
			echo $value['lco_name'];
		}
	} else {

		echo "";
	}

	

 ?>


