<?php include "inc/header.php"; ?>

<?php if(isset($_POST["Import"]))
{
	echo $filename=$_FILES["file"]["tmp_name"];
	if($_FILES["file"]["size"] > 1)
	{
	  	$file = fopen($filename, "r");
		fgetcsv($file);
		while(($emapData = fgetcsv($file, 1000000, ",")) !== FALSE)
		{
			//It will insert a row to our subject table from our csv file`
			//$query = "INSERT into hfiber_customerbase (`base_account_no`, `base_name`, `base_contact_no`, `base_address`,`base_pin_code`, `base_switch`,`base_lco_code`,`base_lco_name`) values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
			$seconds=4000;
			set_time_limit ($seconds);
			$query = "INSERT IGNORE INTO hfiber_customerbase (`base_account_no`, `base_name`, `base_contact_no`, `base_address`,`base_pin_code`, `base_switch`,`base_lco_code`,`base_lco_name`) VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]')";
			
			//$query = "INSERT INTO hfiber_customerbase (`base_account_no`, `base_name`, `base_contact_no`, `base_address`,`base_pin_code`, `base_switch`,`base_lco_code`,`base_lco_name`) VALUES ('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]') ON DUPLICATE KEY UPDATE (`base_name` = '$emapData[1]', `base_contact_no` = '$emapData[2]', `base_address` = '$emapData[3]', `base_pin_code` = '$emapData[4]', `base_switch` = '$emapData[5]', `base_lco_code` = '$emapData[6]' , `base_lco_name` = '$emapData[7]')";
			
			
			//we are using mysql_query function. it returns a resource on true else False on error
			//$result = mysql_query($db->link, $sql);
			$post=$db->insert($query);
			if(!$post)
			{
				echo"<script type=\"text/javascript\">
						alert(\"Invalid File:Please Upload CSV File.\");
						
					</script>";
			}
		}
		fclose($file);
		//throws a message if data successfully imported to mysql database from excel file
		echo "<script type=\"text/javascript\">
				alert(\"CSV File has been successfully Imported.\");
				window.open('hfiber_upload.php?msg=CSV File has been successfully Imported!','_self');
			</script>";
	}
}	 
?>