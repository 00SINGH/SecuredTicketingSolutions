
			
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

				if(!isset($_GET['del']) || $_GET['del']==NULL) {

					echo "<script>window.open('view_users.php?msg=error detected!','_self')</script>";
					
				}else {

					$delete_id=$_GET['del'];

					$query="DELETE FROM cust_users WHERE id=$delete_id";
					$del_rec=$db->delete($query);

					if ($del_rec) {

						echo "<script>window.open('view_users.php?msg=Deleted successfully!','_self')</script>";
					} else {

						echo "<script>window.open('view_users.php?msg=Deletion failed!','_self')</script>";

					}
				}

			 ?>
