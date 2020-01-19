
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

	$output="";

	if (isset($_POST['work_created_down']))
	{
		$date1=$_POST['date1'];
		$date2=$_POST['date2'];
		
		$query="";
		if(custSession::get('user_role')=='FS')
		{
			$query="SELECT * FROM cust_hfiber_workorder WHERE hfiber_cust_team='Field Support' AND hfiber_creation_date BETWEEN '$date1' AND '$date2' ORDER BY hfiber_id DESC";
		}
		elseif(custSession::get('user_role')=='RF')
		{
			$query="SELECT * FROM cust_hfiber_workorder WHERE hfiber_cust_team='Optical Team' AND hfiber_creation_date BETWEEN '$date1' AND '$date2' ORDER BY hfiber_id DESC";
		}
		else
		{
			$query="SELECT * FROM cust_hfiber_workorder WHERE hfiber_creation_date BETWEEN '$date1' AND '$date2' ORDER BY hfiber_id DESC";
		}
		
		$result=$db->download($query);
		

		if ($result->num_rows>=0)
		{
			$output.='

				<table class="table" border="1">
				<tr>
					<th>SL No</th>
					<th>Creation Date</th>
					<th>Work Order ID</th>
					<th>Creation ID</th>
					<th>Account No.</th>
					<th>Customer Name</th>	
					<th>Contact No</th>
					<th>Address</th>
					<th>PIN Code</th>
					<th>Switch</th>
					<th>LCO Code</th>
					<th>LCO Name</th>
					<th>Complain Source</th>
					<th>Assigned Team</th>
					<th>CATEGORY</th>
					<th>STATUS</th>
					<th>Complain Mode</th>
					<th>Caller Remarks</th>
					<th>Closure Date</th>
					<th>Closure Co-Ordinator</th>
					<th>Closure Engineer</th>
					<th>Closure Remarks</th>
				</tr>
			';
				$i=0;
				while ($value=$result->fetch_assoc()) 
				{
				$i++;
					$output.='

						<tr>
							<td>'.$i.'</td>
							<td>'.$value["hfiber_creation_date"].'</td>
							<td>'.$value["hfiber_ttid"].'</td>
							<td>'.$value["hfiber_creator"].'</td>
							<td>'.$value["hfiber_cust_account_no"].'</td>
							<td>'.$value["hfiber_cust_name"].'</td>
							<td>'.$value["hfiber_cust_contact_no"].'</td>
							<td>'.$value["hfiber_cust_address"].'</td>
							<td>'.$value["hfiber_cust_pin_code"].'</td>
							<td>'.$value["hfiber_cust_switch"].'</td>
							<td>'.$value["hfiber_lco_code"].'</td>
							<td>'.$value["hfiber_lco_name"].'</td>
							<td>'.$value["hfiber_cust_source"].'</td>
							<td>'.$value["hfiber_cust_team"].'</td>
							<td>'.$value["hfiber_cust_category"].'</td>
							<td>'.$value["hfiber_cust_status"].'</td>
							<td>'.$value["hfiber_cust_mode"].'</td>
							<td>'.$value["hfiber_cust_remarks"].'</td>
							<td>'.$value["hfiber_closure_date"].'</td>
							<td>'.$value["hfiber_closure_cood"].'</td>
							<td>'.$value["hfiber_closure_engg"].'</td>
							<td>'.$value["hfiber_closure_remarks"].'</td>
						</tr>

					';
					
				}

				$output.='</table>';
				header("Content-Type:application/vnd-ms-excel");
				header("Content-Disposition:attachment; filename=HFIBER_CREATED_WORK_ORDER.xls");

				echo "$output";
		}


	}


 ?>