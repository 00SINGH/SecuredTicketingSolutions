<?php include "inc/header.php"; ?>


	<hr>

	<p>Details of Work Order: <?php echo $_GET['view'] ?></p>

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
			echo "<script>window.open('view_hfiber_workorder.php?msg=Error occurred!','_self')</script>";
		}
		else
		{
			$view_id=$_GET['view'];

			$query="SELECT * FROM `cust_hfiber_workorder` WHERE hfiber_ttid='$view_id'";
			$result=$db->select($query);
			
			$value=$result->fetch_assoc();
			$date=$value['hfiber_creation_date'];		//1
			$creator=$value['hfiber_creator'];			//1
			$account=$value['hfiber_cust_account_no'];	//1 
			$lco_code=$value['hfiber_lco_code'];		//1
			$name=$value['hfiber_cust_name'];			//1
			$lco_name=$value['hfiber_lco_name'];		//1
			$con_no=$value['hfiber_cust_contact_no'];	//1
			$switch=$value['hfiber_cust_switch'];		//1
			$address=$value['hfiber_cust_address'];		//1
			$source=$value['hfiber_cust_source'];		//1
			$pin=$value['hfiber_cust_pin_code'];		//1
			$category=$value['hfiber_cust_category']; 	//1
			$status=$value['hfiber_cust_status'];		//1
			$team=$value['hfiber_cust_team'];			//1
			$mode=$value['hfiber_cust_mode'];			//1
			$engg=$value['hfiber_closure_engg']; 		//1
			$work_order=$value['hfiber_ttid'];			//1
			$c_date=$value['hfiber_closure_date']; 		//1
			$remarks=$value['hfiber_cust_remarks'];		//1
			$c_remarks=$value['hfiber_closure_remarks'];//1
			$c_cood=custSession::get('user_name');
		}

	 ?>

	<div class="table-responsive">

		<table class="table table-bordered">

			<tr>
				<th id="view">Creation Date :</th>
				<td id="content"><?php echo $date; ?></td>
				<td id="space"></td>
				<th id="view">Created BY :</th>
				<td id="content2"><?php echo $creator; ?></td>
			</tr>

			<tr>
				<th>Account No. :</th>
				<td><?php echo $account; ?></td>
				<td></td>
				<th>LCO Code :</th>
				<td><?php echo $lco_code; ?></td>
			</tr>

			<tr>
				<th>Customer Name :</th>
				<td><?php echo $name; ?></td>
				<td></td>
				<th>LCO Name :</th>
				<td><?php echo $lco_name; ?></td>
			</tr>

			<tr>
				<th>Contact No. :</th>
				<td><?php echo $con_no; ?></td>
				<td></td>
				<th>SWITCH :</th>
				<td><?php echo $switch; ?></td>
			</tr>

			<tr>
				<th>Customer Address :</th>
				<td><?php echo $address; ?></td>
				<td></td>
				<th>Complain Source :</th>
				<td><?php echo $source; ?></td>
			</tr>

			<tr>
				<th>Customer Pin Code :</th>
				<td><?php echo $pin; ?></td>
				<td></td>
				<th>Complain Category :</th>
				<td><?php echo $category; ?></td>
			</tr>

			<tr>
				<th>Complain Status :</th>
				<td><?php echo $status; ?></td>
				<td></td>
				<th>Assigned Team :</th>
				<td><?php echo $team; ?></td>
			</tr>

			<tr>
				<th>Complain Mode :</th>
				<td><?php echo $mode; ?></td>
				<td></td>
				<th>Assigned Engineer :</th>
				<td><?php echo $engg; ?></td>
			</tr>

			<tr>
				<th>Work Order No. :</th>
				<td><?php echo $work_order; ?></td>
				<td></td>
				<th>Closure Date :</th>
				<td><?php echo $c_date; ?></td>
			</tr>

			<tr>
				<th>CCE Remarks :</th>
				<td><?php echo $remarks; ?></td>
				<td></td>
				<th>Closure Remarks :</th>
				<td><?php echo $c_remarks; ?></td>

			</tr>
<!--
			<tr>
				<th> </th>
				<td><?php echo ""; ?></td>
				<td></td>
				<th>Co-Ordinator :</th>
				<td><?php echo $c_cood; ?></td>

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
-->

		</table>



	</div>

	<a href="hfiber_dashboard.php"><button type="button" class="btn btn-success">Back</button></a>
	
	
	<hr>
	
	
	
<?php include "inc/footer.php"; ?>