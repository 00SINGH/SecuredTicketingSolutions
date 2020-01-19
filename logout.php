
<?php include "lib/custSession.php";
	
	custSession::checkSession();

 ?>


<?php 

	if (isset($_GET['action']) && $_GET['action']=='logout') {

		custSession::destroy();
	}

 ?>