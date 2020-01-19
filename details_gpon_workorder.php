<?php include "inc/header.php"; ?>


	<hr>

	<p>Details of Work Order:</p>

	<hr>

	<style type="text/css">
		
		th {

			color:  #1a5276 !important;
		}

	</style>


	<?php 

		if (!isset($_GET['view']) || $_GET['view']==NULL)
		{
			echo "WHAT JUST HAPPENED !!!";
			echo "<script>window.open('view_gpon_workorder.php?msg=Error occurred!','_self')</script>";
		}
		else
		{
			$view_id=$_GET['view'];

			$query="SELECT * FROM `cust_gpon_workorder` WHERE `gpon_cust_status` NOT LIKE 'RESOLVED'";
			$result=$db->select($query);

			$value=$result->fetch_assoc();
			$date=$value['gpon_creation_date'];
			$workorder=$value['gpon_ttid'];
			$acccount=$value['gpon_cust_account_no'];
			$entity_code=$value['w_en_code'];
			$entity_name=$value['w_en_name'];
			$contact=$value['w_con_no'];
			$state=$value['w_state'];
			$phase=$value['w_phase'];
			$mode=$value['w_mode'];
			$call_type=$value['w_calltype'];
			$complain=$value['w_complain'];
			$ticket=$value['w_ticket'];
			$resolution=$value['w_resolution'];
			$package=$value['w_package'];
			$tenure=$value['w_tenure'];
			$follow=$value['w_follow'];
			$timing=$value['w_timing'];
			$cc_name=$value['w_cc_name'];
			$start_time=$value['w_start_time'];
			$end_time=$value['w_end_time'];
			$notes=$value['w_notes'];
			$fl_notes=$value['w_fl_notes'];
			$fl_user=$value['w_fl_user'];
		}

	 ?>

	<div class="table-responsive">

		<table class="table table-bordered">

			<tr>
				<th id="view">Date</th>
				<td id="content"><?php echo $date; ?></td>
				<td id="space"></td>
				<th id="view">Work Order No</th>
				<td id="content2"><?php echo $workorder; ?></td>
			</tr>

			<tr>
				<th>Requested By</th>
				<td><?php echo $requester; ?></td>
				<td></td>
				<th>SMC No</th>
				<td><?php echo $smc; ?></td>
			</tr>

			<tr>
				<th>Account No</th>
				<td><?php echo $acccount; ?></td>
				<td></td>
				<th>NDS No</th>
				<td><?php echo $nds; ?></td>
			</tr>

			<tr>
				<th>STB No</th>
				<td><?php echo $stb; ?></td>
				<td></td>
				<th>Customer Type</th>
				<td><?php echo $cust_type; ?></td>
			</tr>

			<tr>
				<th>Entity Code</th>
				<td><?php echo $entity_code; ?></td>
				<td></td>
				<th>Entity Name</th>
				<td><?php echo $entity_name; ?></td>
			</tr>

			<tr>
				<th>Contact No</th>
				<td><?php echo $contact; ?></td>
				<td></td>
				<th>State</th>
				<td><?php echo $state; ?></td>
			</tr>

			<tr>
				<th>Phase</th>
				<td><?php echo $phase; ?></td>
				<td></td>
				<th>Mode</th>
				<td><?php echo $mode; ?></td>
			</tr>

			<tr>
				<th>Call Type</th>
				<td><?php echo $call_type; ?></td>
				<td></td>
				<th>Comp Category</th>
				<td><?php echo $complain; ?></td>
			</tr>

			<tr>
				<th>Ticket No</th>
				<td><?php echo $ticket; ?></td>
				<td></td>
				<th>Res Status</th>
				<td><?php echo $resolution; ?></td>
			</tr>

			<tr>
				<th>Pacakge Name</th>
				<td><?php echo $package; ?></td>
				<td></td>
				<th>Tenure</th>
				<td><?php echo $tenure; ?></td>

			</tr>

			<tr>
				<th>Follow Up</th>
				<td><?php echo $follow; ?></td>
				<td></td>
				<th>Shifting Time</th>
				<td><?php echo $timing; ?></td>

			</tr>

			<tr>
				<th>CCE Name</th>
				<td><?php echo $cc_name; ?></td>
				<td></td>
				<th>Start Time</th>
				<td><?php echo $start_time; ?></td>

			</tr>

			<tr>
				<th>End Time</th>
				<td><?php echo $end_time; ?></td>
				<td></td>
				<th>Notes</th>
				<td><?php echo $notes; ?></td>
			</tr>

			<tr>
				<th>Follow Up Notes</th>
				<td><?php echo $fl_notes; ?></td>
				<td></td>
				<th>Follow Up Done by</th>
				<td><?php echo $fl_user; ?></td>
				
			</tr>


		</table>



	</div>

	<a href="view_workorder.php"><button type="button" class="btn btn-success">Back</button></a>




	<hr>





<?php include "inc/footer.php"; ?>