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
	
	$get_value=$_POST['search_acc_no'];

	$query="SELECT base_lco_name FROM hfiber_customerbase WHERE base_lco_code LIKE '$get_value' lIMIT 1 "; //gets the row ID
	$result=$db->select($query);

	if ($result)
	{
		while ($value=$result->fetch_assoc())
		{	
			echo $value['base_lco_name'];
		}
	}
	else
	{
		echo "NOT FOUND !!!!";
	}

?>